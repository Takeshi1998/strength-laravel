<?php

use App\Enums\OrderType;

return [

    OrderType::class => [
        OrderType::Canceled=>'キャンセル',
        OrderType::Undelivered=>'受け取り待ち',
        OrderType::Delivered=>'受け取り済み'
    ],

];
