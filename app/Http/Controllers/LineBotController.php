<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
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
        try{
            // LINE Messaging APIの署名を取得
            $signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
            $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
            foreach ($events as $event) {
                $user_id=$event->source->userId;
                $token=$event->getReplyToken();
                $response = $bot->replyMessage(
                    $token,new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($user_id)
                );
            }
        }catch(Exception $e){
            'エラー';
        }
    }



}
