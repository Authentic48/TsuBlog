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
    public function index($category)
    {
        $posts = Post::where('category', $category)->latest()->paginate(5);
        return view('pages.admin.posts.index', compact('posts'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::latest()->where('id','!=', $post->id)->take(3)->get();
        return view('pages.admin.posts.show', ['post' => $post, 'posts' => $posts]);
    }

}
