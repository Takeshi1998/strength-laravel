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
            $json_string = file_get_contents('php://input');
            $json_obj = json_decode($json_string);
            $token=$json_obj->{"events"}[0]->{"replyToken"};
            $userId = $json_obj->{"events"}[0]->{"source"}->{"userId"};
                $response = $bot->replyMessage(
                    $token,new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($userId)
                );
        }catch(Exception $e){
            'エラー';
        }
    }



}
