<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Tag()
    {
        # code...
        return $this->belongsTo(Tag::class,'tag_id');
    }
    public function Post()
    {
        # code...
        return $this->belongsTo(Post::class,'post_id');
    }
}
