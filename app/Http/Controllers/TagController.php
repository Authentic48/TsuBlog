<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth']);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
      return view('pages.admin.tags.create', ['post' => $post]);
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
            'name' => ['required'],
        ],$messages);

        $tag = new Tag(); 

        $tag->name = $request->name;
        $tag->post_id = $request->post_id;
        $tag->save();

        return redirect()->route('admin.post.show', $request->post_id)->with(['status' => 'tag created successfully.']);
    }

    public function destroy($id)
    {
      $tag = Tag::findOrFail($id);
      $tag->delete();
      return redirect()->back()->with(['status' => 'tag delete successfully']);
    }


}
