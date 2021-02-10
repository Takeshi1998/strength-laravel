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
        $jsonString = file_get_contents('php://input'); error_log($jsonString);
        $jsonObj = json_decode($jsonString);
        $replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
        
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        $bot = new LINEBot($httpClient, ['channelSecret' =>env('LINE_CHANNEL_SECRET')]);
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
        $response = $bot->replyMessage($replyToken, $textMessageBuilder);
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

}
