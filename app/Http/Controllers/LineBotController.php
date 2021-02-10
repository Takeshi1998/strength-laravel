<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Comment;
use App\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\SignatureValidator;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineBotController extends Controller
{
    public function callback(){

        $json_string = file_get_contents('php://input');
        if($json_string){
            $json_object = json_decode($json_string);
            $userId = $json_object->{"events"}[0]->{"source"}->{"userId"};
            $replyToken = $json_object->{"events"}[0]->{"replyToken"};        //返信用トークン
            $message_type = $json_object->{"events"}[0]->{"message"}->{"type"};    //メッセージタイプ
            $message_text = $json_object->{"events"}[0]->{"message"}->{"text"};
                     //返信メッセージ
                     $return_message_text = "「" . $message_text . "」なの？";

                     //返信実行
                     $this->sending_messages(env('LINE_ACCESS_TOKEN'), $replyToken, $message_type, $return_message_text);
        }else{
            exit();
        }

    }

    public function message(){
             // $now=new DateTime('now');
        // $two_weeks_ago=$now->modify('-2 weeks');
        // $now2=new DateTime('now');
        // $four_days_ago=$now2->modify('-4 days');


        // users 2週間以内にはしているが、4以内に筋トレをしてない人
        // $users=User::whereHas('comments',function(Builder $query) use($two_weeks_ago){
        //     $query->where('zikan','>',$two_weeks_ago);
        // })->whereDoesntHave('comments', function (Builder $query) use($four_days_ago){
        //     $query->where('zikan','>',$four_days_ago);
        // });

        // if($users->count()==0){
        //     return ;
        // }

        // $userが>0のとき
        // $names=[];
        // foreach($users->get() as $user){
        //     $names[]=$user->name;
        // }
        // $text=null;
        // foreach($names as $name){
        //     if($text==null){
        //         $text=$name;
        //     }else{
        //         $text=$text.','.$name;
        //     }
        // }
        // $text=$text.':筋トレの間隔空きすぎ';
        // $receive = json_encode($text,JSON_UNESCAPED_UNICODE);

        // dd($receive);
        // $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        // $bot = new LINEBot($httpClient, ['channelSecret' =>env('LINE_CHANNEL_SECRET')]);
        // $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
        // $response = $bot->pushMessage('<to>', $textMessageBuilder);
        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

        return ;
    }

    private function sending_messages($accessToken, $replyToken, $message_type, $return_message_text){
        //レスポンスフォーマット
        $response_format_text = [
            "type" => $message_type,
            "text" => $return_message_text
        ];

        //ポストデータ
        $post_data = [
            "replyToken" => $replyToken,
            "messages" => [$response_format_text]
        ];

        //curl実行
        $ch = curl_init("https://api.line.me/v2/bot/message/reply");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charser=UTF-8',
            'Authorization: Bearer ' . $accessToken
        ));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
