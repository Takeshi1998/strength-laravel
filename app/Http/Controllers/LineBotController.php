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

    public function callback (Request $request){
        $lineAccessToken = env('LINE_ACCESS_TOKEN', "");
        $lineChannelSecret = env('LINE_CHANNEL_SECRET', "");
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($lineAccessToken );
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' =>$lineChannelSecret]);
        // 共通処理（token,type）
            try{
                $json_string = file_get_contents('php://input');
                $json_obj = json_decode($json_string);
                $token=$json_obj->{"events"}[0]->{"replyToken"};
                $type=$json_obj->{"events"}[0]->{"type"};
                switch($type){
                    case "message":
                        $this->message($bot,$token);
                        break;
                    case "follow":
                        $this->userId($json_obj,$token,$bot);
                        break;
                    default:
                        break;
                }
            }catch(Exception $e){
                return ;
            }
    }

    // 初回登録時にuserIdを取得し、dbに保存する。
    public function userId($json_obj,$token,$bot){
        $userId = $json_obj->{"events"}[0]->{"source"}->{"userId"};
        $line=Line::createUserId($userId);
        $response = $bot->replyMessage(
            $token,new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('筋トレを４日以上してない人を通知します。みんなで催促しましょう!')
        );
    }

    // メッセージに対する応答
    public function message($bot,$token){
        $response = $bot->replyMessage(
            $token,new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('test')
        );
    }

    //  直近4日間の記録がない人を晒すためのtextを作成
    public function test(){
        $lazy_person=Line::getLazyPerson();
        // さぼりがいない時
        if(empty($lazy_person)){
            dd($lazy_person);
        }
    }



}
