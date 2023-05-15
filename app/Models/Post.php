<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Tag()
    {
        # code...
        return $this->belongsToMany(Tag::class,'post_tags');
    }
    public function Comment()
    {
        # code...
        return $this->hasMany(comment::class,'post_id','id');
    }
    public function Auther()
    {
        # code...
        return $this->belongsTo(User::class,'user_id');
    }
    public function Category()
    {
        # code...
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function PostMedia()
    {
        # code...
        return $this->hasMany(PostMedia::class,'post_id','id');
    }
}
