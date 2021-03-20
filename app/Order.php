<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // status 商品を渡したか渡してないか
    // display 商品をキャンセルした際に、0にする。デフォルトでは1(キャンセル時にレコードを消すと、注文後に消去された際に困るから)
    protected $fillable=[
        'user_id',
        'product_name',
        'status',
        'display',
    ];

    public static function getOrders($user){
        $orders=Order::where('user_id',$user->id)->orderBy('id','DESC')->get();
        return $orders;
    }

}
