<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostMedia;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        # code...
        $posts = Post::get();
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        # code...
        $cats = Category::get();
        $user = Auth::user();
        $tags = Tag::get();
        return view('post.create', compact(['cats', 'user', 'tags']));
    }
    public function store(StorePostRequest $request)
    {
        # code...

        $description = $request->description;
        $imageMedia = $request->imageMedia;
        $image = $request->image;
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(base_path('public/uploads'), $filename);
            $path = 'uploads/' . $filename;
            $post = Post::create([
                "tittle" => $request->tittle,
                "image" => $path,
                "cat_id" => $request->cat_id,
                "content" => $request->content,
                "user_id" => $request->user_id,
            ]);
        }
        $post->Tag()->sync($request->tag);
        if ($post && $imageMedia) {
            for ($i = 0; $i < count($imageMedia); $i++) {
                if ($imageMedia[$i]) {
                    $filename2 = $imageMedia[$i]->getClientOriginalName();
                    $imageMedia[$i]->move(base_path('public/uploads'), $filename2);
                    $path2 = 'uploads/' . $filename2;
                    $postmedia = PostMedia::create([
                        'description' => $description[$i],
                        'imageMedia' => $path2,
                        'post_id' => $post->id,

                    ]);
                }
            }
        }
        return redirect('post');
    }
    public function delete($id)
    {
        # code...
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect('post');
    }
    public function update($id)
    {
        # code...
        $post = Post::with('PostMedia')->where('id', $id)->first();
        $tags = Tag::get();
        $cats = Category::get();
        $post->image = asset($post->image);
        foreach ($post->PostMedia as $PostMedia) {
            # code...
            $PostMedia->imageMedia = asset($PostMedia->imageMedia);
        }
        return view('post.update', compact(['post', 'tags', 'cats']));
    }
    public function edit(EditPostRequest $request, $id)
    {
        # code...
        $description = $request->description;
        $imageMedia = $request->imageMedia;
        $post = Post::where('id', $id)->first();
        $image = $request->image;
        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(base_path('public/uploads'), $filename);
            $path = 'uploads/' . $filename;
            $post->update([
                'tittle' => $request->tittle,
                'cat_id' => $request->cat_id,
                'image' => $path,
            ]);
        } else {
            $post->update([
                'tittle' => $request->tittle,
                'cat_id' => $request->cat_id,
            ]);
        }
        $post->Tag()->sync($request->tag);
        if ($imageMedia) {
            for ($i = 0; $i < count($imageMedia); $i++) {
                if ($imageMedia[$i]) {
                    $filename2 = $imageMedia[$i]->getClientOriginalName();
                    $imageMedia[$i]->move(base_path('public/uploads'), $filename2);
                    $path2 = 'uploads/' . $filename2;
                    $postmedia = PostMedia::create([
                        'description' => $description[$i],
                        'imageMedia' => $path2,
                        'post_id' => $id,

                    ]);
                }
            }
        }
        return redirect('post');
    }
    public function views($id)
    {
        # code...
        $post = Post::with('PostMedia')->where('id',$id)->first();
        if($post) {
            $post->viewsCount = $post->viewsCount + 1;
            $post->save();
            return view('post.viewpost',compact('post'));
        }


    }
}
