<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        //CurlHTTPClientとシークレットを使いLINEBotをインスタンス化
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' =>$lineChannelSecret]);

        // LINE Messaging APIがリクエストに付与した署名を取得
        $signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

        //署名をチェックし、正当であればリクエストをパースし配列へ、不正であれば例外処理
        $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

        foreach ($events as $event) {
            // メッセージを返信
            $response = $bot->replyMessage(
                $event->getReplyToken(), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($event->getText())
            );
        }
    }



}
