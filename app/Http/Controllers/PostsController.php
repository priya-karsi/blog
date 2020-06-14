<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['verifyCategoriesCount'])->only('create','store');
        $this->middleware(['validateAuthor'])->only('edit','update','destroy','trash');


    }

    public function index()
    {
        //
        if(!auth()->user()->isAdmin()){
            $posts=Post::withoutTrashed()->where('user_id',auth()->id())->paginate(10);
        }else{
            $posts=Post::paginate(10);
        }
        
        return view('posts.index', compact([
            'posts'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        $categories=Category::all();
        return view('posts.create', compact([
            'categories', 
            'tags'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        $image=$request->file('image')->store('posts');

        //create post
        //dd($request->category_select);
        $post=Post::create([
'title'=>$request->title,
'category_id'=>$request->category_id,
'excerpt'=>$request->excerpt,
'content'=>$request->content,
'image'=>$image,
'user_id'=>auth()->id(),
'published_at'=>$request->published_at
        ]);

    $post->tags()->attach($request->tags);

    session()->flash('success', 'Post Created Successfully!');

    return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //$posts=Post::firstOrFail($post);
        $categories=Category::all();
        $tags=Tag::all();
        //
        //return view('posts.edit')->withPost($post);
        return view('posts.edit',compact([
            'post', 
            'tags',
            'categories'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        $data= $request->only(['title', 'excerpt','content', 'published_at','category_id']);
        if($request->hasFile('image')){
            $image=$request->image->store('posts');
            $post->deleteImage();
            $data['image']=$image;
        }
        $post->update($data);
    
            $post->tags()->sync($request->tags);
        
        session()->flash('success','post updated succesfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post =Post::onlyTrashed()->findOrFail($id);
        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success', 'Post deleted successfully!');
        return redirect()->back();

    }

    public function trash(Post $post){
        $post->delete();
        session('success','post trashed successfully!');
        return redirect(route('posts.index'));
    }

    public function trashed(){
        $trashed = Post::onlyTrashed()->paginate(10);
        return view('posts.trashed')->with('posts', $trashed);
    }



    public function restore($id){
        $trashedPost = Post::onlyTrashed()->findOrFail($id);
        $trashedPost->restore();
        session()->flash('success','post restored');
        return redirect(route('posts.index'));
    }

}
