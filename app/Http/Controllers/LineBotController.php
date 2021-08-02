<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Line;
use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\SignatureValidator;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;


class LineBotController extends Controller
{

    // strength公式ラインからのwebhookイベントに対する処理
    public function callback(Request $request)
    {
        \Log::error("公式ラインのwebhook");
        $lineAccessToken = env('LINE_ACCESS_TOKEN', "");
        $lineChannelSecret = env('LINE_CHANNEL_SECRET', "");
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($lineAccessToken);
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $lineChannelSecret]);
        // 共通処理（token,type）
        try {
            $json_string = file_get_contents('php://input');
            $json_obj = json_decode($json_string);
            $token = $json_obj->{"events"}[0]->{"replyToken"};
            $type = $json_obj->{"events"}[0]->{"type"};
            \Log::error($type);
            switch ($type) {
                case "message":
                    $this->message($bot, $token);
                    break;
                case "follow":
                    $this->userId($json_obj, $token, $bot);
                    break;
                default:
                    break;
            }
        } catch (Exception $e) {
            return;
        }
    }

    // 初回登録時にuserIdを取得し、dbに保存する。
    public function userId($json_obj, $token, $bot)
    {
        $userId = $json_obj->{"events"}[0]->{"source"}->{"userId"};
        $line = Line::createUserId($userId);
        $response = $bot->replyMessage(
            $token,
            new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('筋トレを４日以上してない人を通知します。みんなで催促しましょう!')
        );
    }

    // テーブルを消してしまったときの対策
    // public function getId($json_obj,$token,$bot){
    //     $message = $json_obj->{"events"}[0]->{"message"}->{"text"};
    //     if($message!='id追加'){
    //         return;
    //     }
    //     $userId = $json_obj->{"events"}[0]->{"source"}->{"userId"};
    //     $line=Line::createUserId($userId);
    //     $response = $bot->replyMessage(
    //         $token,new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Line idを登録しました。')
    //     );
    // }

    // メッセージに対する応答
    public function message($bot, $token)
    {
        \Log::error("message関数実行");
        $response = $bot->replyMessage(
            $token,
            new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('近日サプリ予約機能追加')
        );
        \Log::error($response);
    }

    // コマンド:php arrisan lazy pushでこの関数が呼び出される
    // 直近4日間の記録がない人を晒すためのtextを作成
    public static function noticeLazy()
    {
        \Log::error("daily通知機能を実行");
        $lazy_person = Line::getLazyPerson();
        // さぼりがいない時
        if (empty($lazy_person)) {
            return;
        } else {
            \Log::error("line　api実行");
            \Log::error($lazy_person);
            try {
                // useridをdbから取り出して、コンマでつなげる
                $userId = Line::get('line_id')->toArray();
                $line_ids = [];
                for ($i = 0; $i < count($userId); $i++) {
                    array_push($line_ids, $userId[$i]['line_id']);
                }
                $lineAccessToken = env('LINE_ACCESS_TOKEN', "");
                $lineChannelSecret = env('LINE_CHANNEL_SECRET', "");
                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($lineAccessToken);
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $lineChannelSecret]);
                $response = $bot->multicast($line_ids, new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('テストメッセージ'));
                // 一人だけテスト
                // $response = $bot->pushMessage('Uc558080f176eda4608a594c7f5d36ac7',new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('origin'));
            } catch (Exception $e) {
                \Log::error($e);
            }
        }
    }
}
