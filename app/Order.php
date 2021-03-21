<?php

namespace App;

use App\Enums\OrderType as EnumsOrderType;
use Illuminate\Database\Eloquent\Model;
use BenSampo\Enum\Traits\CastsEnums;
use BenSampo\Enum\Tests\Enums\OrderType;

class Order extends Model
{
    use CastsEnums;
    protected $casts=[
        'status'=>OrderType::class,
    ];

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
