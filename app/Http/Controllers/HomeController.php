<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Newspaper;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'about', 'postByCategory', 'postIndex']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $newspapers = Newspaper::all();
        return view('home',compact('categories', 'newspapers'));
    }

    public function welcome() {
        $posts = Post::latest()->paginate(6);
       
        return view('welcome', compact('posts'));
    }

    public function postIndex() {
       $posts = Post::latest()->paginate(6);
       $categories = Category::all();
       return view('pages.posts.index', compact('posts', 'categories')); 
    }

    public function postByCategory($category){
        $categories = Category::all();
        $posts = Post::where('category', $category)->latest()->paginate(5);
       return view('pages.posts.index', compact('posts', 'categories')); 
    }

    public function about() {
        return view('pages.posts.about');
    }

    public function addNews(Newspaper $newspaper){
        $posts = Post::all();
        return view('pages.admin.newspaper.addnews', ['newspaper' => $newspaper, 'posts' => $posts]);
    }

    public function storeNewsToNewspaper(Request $request, Newspaper $newspaper){
        
        $post_id = $request->post_id;
        // $newspaper_id = $request->newspaper_id;
        $post = Post::findOrFail($post_id);
        // $newspaper = Newspaper::findOrFail($newspaper_id);
        $post->newspaper()->attach($newspaper);
        return redirect()->route('home');
    }
}