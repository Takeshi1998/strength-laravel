<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Comment;
use App\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class LineBotController extends Controller
{
    public function callback(){
        $now=new DateTime('now');
        $two_weeks_ago=$now->modify('-2 weeks');
        $now2=new DateTime('now');
        $four_days_ago=$now2->modify('-4 days');
        $now3=new DateTime('now');

        // users 2週間以内にはしているが、4以内に筋トレをしてない人
        $users=User::whereHas('comments',function(Builder $query) use($two_weeks_ago){
            $query->where('zikan','>',$two_weeks_ago);
        })->whereDoesntHave('comments', function (Builder $query) use($now2){
            $query->where('zikan','>',$now2);
        });

        if(empty($users->get)){
            dd('空');
        }
        return $users->get();

    }
}
