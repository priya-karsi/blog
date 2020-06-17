<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class WelcomeController extends Controller
{
    //
    public function index(){
    	return view('blog.index',[
    		'categories'=>Category::all(), 
    		'posts'=>Post::search()->published()->simplePaginate(2), 
            //'posts'=>Post::simplePaginate(2),
    		'tags'=>Tag::all()
    	]);
    }



    public function show(Post $post){
        $categories=Category::all();
        $tags=Tag::all();
        return view('blog.post',compact([
            'post', 'tags','categories'
        ]));
    }
    public function category(Category $category){
    	return view('blog.index',[
    		'categories'=>Category::all(), 
            'posts'=>$category->posts()->search()->published()->simplePaginate(2), 
    		//'posts'=>$category->posts()->simplePaginate(2), 
    		'tags'=>Tag::all()
    	]);
    }

     public function tag(Tag $tag){
    	return view('blog.index',[
    		'categories'=>Category::all(), 
            'posts'=>$tag->posts()->search()->published()->simplePaginate(2), 
    		//'posts'=>$tag->posts()->simplePaginate(2), 
    		'tags'=>Tag::all()
    	]);
    }
}
