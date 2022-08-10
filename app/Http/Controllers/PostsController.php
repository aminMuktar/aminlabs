<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth',['except' => ['index','show','projects','home']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post=Post::all();
        // dd($post);
        return view('blog') -> with('posts',Post::orderBy('updated_at','DESC')->get());
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'title'=>'required',
            'seo_tag'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $newImageName=uniqId() . '-' . $request->title . '.' . $request->image->extension();
        // 
        $request->image->move(public_path('images'),$newImageName);
    
        // dd($slug);
        Post::create([
            'title'=>$request->input('title'),
            'seo_tag'=>$request->input('seo_tag'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class,'slug',$request->title),
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
        ]);
        return redirect('/blog')->with('message','post successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        return view('blogdetail')->with('post',Post::where('slug',$slug)->first());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        return view('editblog')->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $request->validate([
            'title'=>'required',
            'seo_tag'=>'required',
            'description'=>'required',
        ]);
        Post::where('slug',$slug)->update([
            'title'=>$request->input('title'),
            'seo_tag'=>$request->input('seo_tag'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class,'slug',$request->title),
            'user_id'=>auth()->user()->id
        ]);
        return redirect('/blog')->with('message','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $post=Post::where('slug',$slug);
        $post->delete();
        return redirect('/blog')->with('message','You has been deleted successfully');
    }
}
