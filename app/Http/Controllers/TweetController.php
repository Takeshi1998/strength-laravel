<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('str.tweet');
    }

    public function post(Request $request){
        return redirect()->route('home')->with('flash_message', 'サーバーを移行しました！');
        $comment=new Comment();
        $comment->tweet=$request->tweet;
        $user=Auth::user();
        $comment->talker_id=$user->id;
        $comment->name=$user->name;
        $comment->zikan=Now();
        unset($request->_token);
        $comment->save();

        return redirect('/home');
    }
}
