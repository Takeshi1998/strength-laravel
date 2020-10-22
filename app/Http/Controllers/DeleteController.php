<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function delete(Request $request){
        $id=$request->id;
        Comment::find($id)->delete();
        return redirect('person');
    }
}
