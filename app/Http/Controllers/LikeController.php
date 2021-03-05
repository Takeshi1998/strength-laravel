<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
// todo  $idが働いてない
    public function index($comment_id){
            Like::createLike($comment_id);
    }
    // いいね消去
    public function delete($comment_id){
            Like::deleteLike($comment_id);
    }




}
