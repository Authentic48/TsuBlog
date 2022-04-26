<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;


class PostAdminController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        
        return view('pages.admin.posts.index', compact('posts'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        $posts = Post::latest()->where('id','!=', $post->id)->take(3)->get();
        return view('pages.admin.posts.show', compact('post', 'posts'));
    }

}
