<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Post()
    {
        # code...
        return $this->belongsTo(Post::class,'post_id','id');
    }
}
