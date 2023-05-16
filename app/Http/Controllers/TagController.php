<?php

namespace App\Http\Controllers;

use App\Http\Requests\editTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        # code...
        $tags = Tag::get();
        return view('tag.index',compact('tags'));
    }
    public function store(StoreTagRequest $request)
    {
        # code...
        Tag::create([
            'name' => $request->name,
        ]);
        return redirect('tag');

    }
    public function delete($id)
    {
        # code...
        $tag = Tag::where('id',$id)->first();
        $tag->delete();
        return redirect('tag');
    }
    public function update($id)
    {
        # code...
        $tag = Tag::where('id',$id)->first();
        return view('tag.update',compact('tag'));
    }
    public function edit(editTagRequest $request,$id)
    {
        # code...
        $tag = Tag::where('id',$id)->first();
        $tag->update([
            'name' => $request->name,
        ]);
        return redirect('tag');

    }
    public function active(Request $request)
    {
        # code...

        $tag = Tag::where('id',$request->id)->first();
        $tag->active = $request->active;
       $tag->save();
       return $tag;

    }



}
