<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class LikeController extends Controller
{
    public function check($comment_id){
        $like=Comment::checkLike($comment_id);
        return $like;
    }
}
