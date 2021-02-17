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
        $data=['line_id'=>$userId];
        $line->fill($data);
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

        // さぼりが存在する時
        $names=[];
        foreach($users->get() as $user){
            $names[]=$user->name;
        }
        $text=null;
        foreach($names as $name){
            if($text==null){
                $text=$name;
            }else{
                $text=$text.','.$name;
            }
        }
        $text=$text.':筋トレの間隔空きすぎ';
        return $text;
    }
}
