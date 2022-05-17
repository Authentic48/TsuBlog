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
       $this->middleware('auth',['except' => ['index', 'show']],);
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
            $name = time(). '.'.$request->image->extension();
            $folder = 'images'; 
            // $filePath = Storage::disk('public')->putFileAs($folder, $image, $name);
            $request->image->move(public_path($folder), $name);
            $post->image = $name;
        }
        // dd(Storage::disk('local')->url($filePath));
        $post->save();
        return redirect()->route('admin.post.index')->with(['status' => 'post created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('pages.posts.show',['post' => $post, 'categories' => $categories]);
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('pages.admin.posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
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

        $post->slug = Str::slug(($request->input('title')), '-');
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = time().'.'. $request->image->extension();
            $folder = '/images'; 
            $request->image->move(public_path($folder), $name);
            $post->image = $name;
        }

        $post->save();
        return redirect()->route('admin.post.index')->with(['status' => 'post updated successfully.']);

    }

    public function destroy($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect()->route('admin.post.index')->with(['status' => 'post delete successfully']);
    }

}
