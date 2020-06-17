<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $dates=['published_at'];
    //
    protected $fillable = [
'title',
'category_id',
'excerpt',
'content',
'image',
'published_at',
'user_id',
    ];
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    /*
	helper functions!
    */
    public function deleteImage(){
    	Storage::delete($this->image);
    }

    public function hasTag($tag_id){
        return in_array($tag_id, $this->tags->pluck('id')->toArray());
    }

    /*
    Query Scopes
    */

    public function scopePublished($query){
        return $query->where('published_at','<=',now());
    }

    public function scopeSearch($query){
        $search=request('search');
        if($search){
            return $query->where('title','like',"%$search%");
        }
        return $query;

    }
}
