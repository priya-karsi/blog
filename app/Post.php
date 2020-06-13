<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
'title',
'excerpt',
'content',
'image',
'published_at'
    ];
}
