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
    		'posts'=>Post::simplePaginate(2), 
    		'tags'=>Tag::all()
    	]);
    }
    public function category(Category $category){
    	return view('blog.index',[
    		'categories'=>Category::all(), 
    		'posts'=>$category->posts()->simplePaginate(2), 
    		'tags'=>Tag::all()
    	]);
    }

     public function tag(Tag $tag){
    	return view('blog.index',[
    		'categories'=>Category::all(), 
    		'posts'=>$tag->posts()->simplePaginate(2), 
    		'tags'=>Tag::all()
    	]);
    }
}
