<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');

    }

    public function Update(Request $request){
        $id=$request->id;
        $tweet=Comment::find($id);
        $request->session()->put('uid',$id);
        return view('str.update',['tweet'=>$tweet]);
    }

    public function UpdateTweet(Request $request){
        $id=$request->session()->pull('uid','default');

        $tweet=$request->tweet;
        $updatetweet=Comment::find($id);
        unset($request->_token);
        $updatetweet->tweet=$tweet;
        $updatetweet->save();
        return redirect('/home');
    }
}
