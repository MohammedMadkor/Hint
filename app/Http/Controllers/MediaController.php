<?php

namespace App\Http\Controllers;

use App\Models\PostMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function list()
    {
        # code...
        $medias = PostMedia::get();
        foreach ($medias as $media) {
            # code...
            $media->imageMedia = asset($media->imageMedia);
        }
        return view('media.index',compact('medias'));

    }
    public function delete($id)
    {
        # code...
        $media = PostMedia::where('id',$id)->first();
        $media->delete();
        return redirect('media');
    }
}
