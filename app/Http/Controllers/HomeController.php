<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }

    public function welcome() {
        $posts = Post::latest()->paginate(6);
       
        return view('welcome', compact('posts'));
    }

    public function postIndex() {
       $posts = Post::latest()->paginate(6);
       return view('pages.posts.index', compact('posts')); 
    }

    public function postByCategory($category){
        $categories = Category::all();
        $posts = Post::where('category', $category)->latest()->paginate(5);
       return view('pages.posts.index', compact('posts', 'categories')); 
    }

    public function about() {
        return view('pages.posts.about');
    }
}