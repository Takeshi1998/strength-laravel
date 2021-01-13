<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    protected $table='comments';
    public $timestamps = false;

    protected $guarder=array(
        'id',
        'name'

    );

    protected $fillable = ['tweet','zikan'];

    public static function checkLike($comment_id){
        // likes_countが1ならいいね済み
        $like=Comment::where('id',$comment_id)->withCount(['likes' => function (Builder $query) {
            $query->where('user_id',1);
        }])->get();

        return ($like[0]->likes_count);
        }
}
