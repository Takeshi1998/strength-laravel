<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    protected $fillable = ['user_id', 'comment_id'];

   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function item()
   {
       return $this->belongsTo('App\Comment');
   }

   public static function checkLike($comment_id){
       $id=Auth::id();
        $like=Like::where('comment_id',$comment_id)->where('user_id',$id)->first();
        if($like!=null){
            $like=true;
        }else{
            $like=false;
        }
        return $like;
    }

    // いいね作成
    public static function createLike($comment_id){
        $id=Auth::id();
        $new_like=new Like();
        $data=['user_id'=>$id,'comment_id'=>$comment_id];
        $new_like->fill($data);
        $new_like->save();
}

    // いいね消去
    public static function deleteLike($comment_id){
        $id=Auth::id();
        $like=Like::where('comment_id',$comment_id)->where('user_id',$id)->delete();
    }


}
