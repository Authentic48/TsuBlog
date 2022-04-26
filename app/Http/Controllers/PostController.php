<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth',['except' => ['index', 'show', 'welcome']],);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::latest()->paginate(6);

        return view('pages.posts.index', compact('posts'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = 
        [
          'required' => 'This field is required',
        ];
        $request->validate([
            'title' => ['required', 'unique:posts'],
            'category' => ['required'],
            'content' => ['required'],
            'image' => ['required','mimes:jpeg,png,jpg,gif|max:2048']
        ],$messages);

        $post = new Post();
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->user_id =  Auth::user()->id;
        $post->slug = Str::slug($request->input('title'), '-');

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = $request->file('image')->getClientOriginalName();
            $folder = '/images'; 
            // $filePath = Storage::disk('local')->putFileAs($folder, , $name);
            $filePath = $request->file('image')->storeAs($folder, $name);
            $post->image = $name;
            // dd($post->image);
        }
        $post->save();
        return redirect()->route('post.index')->with(['status' => 'post created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('pages.posts.show', compact('post'));
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('pages.admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = 
        [
          'required' => 'This field is required',
        ];
        $request->validate([
            'title' => ['required'],
            'category' => ['required'],
            'content' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif|max:2048']
        ], $messages);

        $post = Post::where('id', $id)->first();
        $post->slug = Str::slug(($request->input('title')), '-');
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/images'; 
            $filePath = Storage::disk('local')->putFileAs($folder, $image, $name, 'public');
            $post->image = $filePath;
        }

        $post->save();
        return redirect()->route('post.index')->with(['status' => 'post updated successfully.']);

    }

    public function destroy($id)
    {
      $post = Post::where('id', $id)->first();
      $post->delete();
      return redirect()->route('post.index')->with(['status' => 'post delete successfully']);
    }


    public function welcome() {
        $posts = Post::latest()->paginate(6);
        $categories = Category::all();

        return view('welcome', compact('posts', 'categories'));
    }

}
