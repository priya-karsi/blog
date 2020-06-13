<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    protected $fillable = [
'title',
'category_id',
'excerpt',
'content',
'image',
'published_at'
    ];
    public function category(){
    	return $this->belongsTo(Category::class);
    }


    /*
	helper functions!
    */
    public function deleteImage(){
    	Storage::delete($this->image);
    }
}
