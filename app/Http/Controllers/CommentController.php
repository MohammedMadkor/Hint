<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        # code...
        $comments = comment::get();
        return view('comment.index',compact('comments'));
    }
    public function delete($id)
    {
        # code...
        $comment = Comment::where('id',$id)->first();
        $comment->delete();
        return redirect('comment');
    }
}
