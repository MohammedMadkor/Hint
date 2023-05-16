<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
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
    public function store(StoreCommentRequest $request)
    {
        # code...
       comment::create([
        'post_id' => $request->post_id,
        'comment' => $request->comment,
        'name' => $request->name,
        'email' => $request->email,

       ]);
       return redirect('comment');
    }
}
