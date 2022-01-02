<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\Builder;

class Line extends Model
{
    protected $table='lines';
    protected $fillable = ['line_id'];

    public static function createUserId($userId){
        $line=new Line();
        $line->line_id=$userId;
        $line->save();
        return;
    }

    // 4日以内の筋トレレコードがnullの人のuserを取得して、Lineで送信するtextを作成
    public static function getLazyPerson(){
        $now=new DateTime('now');
        $two_weeks_ago=$now->modify('-2 weeks');
        $now2=new DateTime('now');
        $four_days_ago=$now2->modify('-4 days');


        // users 2週間以内にはしているが、4以内に筋トレをしてない人
        $users=User::whereHas('comments',function(Builder $query) use($two_weeks_ago){
            $query->where('zikan','>',$two_weeks_ago);
        })->whereDoesntHave('comments', function (Builder $query) use($four_days_ago){
            $query->where('zikan','>',$four_days_ago);
        });

        if($users->count()==0){
            return ;
        }


        //　開発アカウントは除外
        $names=[];
        foreach($users->get()->except([31]) as $user){
            $names[]=$user->name;
        }
        if(empty($names)){
            return ;
        }

        $text=null;
        foreach($names as $name){
            if($text==null){
                $text=$name;
            }else{
                $text=$text.','.$name;
            }
        }
        $text=$text.':4日間も筋トレしやんと何してるん？';
        // dbのユーザーnameの名字と名前の間の空白を消去
        $text=preg_replace("/( |　)/", "", $text);
        return $text;
    }
}
