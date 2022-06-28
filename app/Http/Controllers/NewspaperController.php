<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newspaper;
use Illuminate\Support\Str;

class NewspaperController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newspapers = Newspaper::latest()->paginate(6);
        return view('pages.admin.newspaper.index', compact('newspapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.newspaper.create');
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
            'description' => ['required'],
            'image' => ['required','mimes:jpeg,png,jpg,gif|max:2048']
        ],$messages);

        $newspaper = new Newspaper();
        
        $newspaper->title = $request->title;
        $newspaper->description = $request->description;
        $number = rand();
        $newspaper->number = $number;
        

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = time(). '.'.$request->image->extension();
            $folder = 'images'; 
            $request->image->move(public_path($folder), $name);
            $newspaper->image = $name;
        }
        $newspaper->save();
        return redirect()->route('home')->with(['status' => 'newspaper created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Newspaper $newspaper)
    {

        return view('pages.admin.newspaper.show',['newspaper' => $newspaper]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Newspaper $newspaper)
    {
        return view('pages.admin.newspaper.edit',['newspaper' => $newspaper]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newspaper $newspaper)
    {
        $messages = 
        [
          'required' => 'This field is required',
        ];
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif|max:2048']
        ],$messages);

        $newspaper->title = $request->title;
        $newspaper->description = $request->description;
        

        if ($request->has('image'))
        {
            $image = $request->file('image');
            $name = time(). '.'.$request->image->extension();
            $folder = 'images'; 
            $request->image->move(public_path($folder), $name);
            $newspaper->image = $name;
        }
        $newspaper->save();
        return redirect()->route('home')->with(['status' => 'newspaper created successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $newspaper = Newspaper::findOrFail($id);
      $newspaper->delete();
      return redirect()->route('home')->with(['status' => 'newspaper delete successfully']);
    }
}
