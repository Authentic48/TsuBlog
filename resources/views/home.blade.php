@extends('pages.admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Admin Panel</h3> 
    <div class="row justify-content-md-center">
        <div class="col-md-6">
           <h5 class="mb-4">Posts</h5> 
           <a href="{{ route('posts.create') }}" class="btn btn-outline-success">Create</a>
           <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $category->name }}
                <p><a href="{{ route('admin.post.index', $category->name) }}" class="btn btn-outline-primary">View</a>
                </p>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-6">
            <h5 class="mb-4">Newspaper</h5> 
            <a href="{{ route('newspapers.create') }}" class="btn btn-outline-success">Create</a></p>
            <ul class="list-group list-group-flush">
             @foreach ($newspapers as $newspaper)
             <li class="list-group-item d-flex justify-content-between align-items-center">{{ $newspaper->title }}
                 <p><a href="{{ route('newspapers.show', $newspaper->id) }}" class="btn btn-outline-primary">View</a>
                    <a href="{{ route('newspaper.post', $newspaper->id) }}" class="btn btn-outline-primary">Add News</a>
                 <a href="{{ route('newspapers.edit', $newspaper->id) }}" class="btn btn-outline-success">edit</a>
                 <a href="{{ route('newspapers.destroy',  $newspaper->id) }}"
                  class="btn btn-outline-danger " onclick="event.preventDefault();
                      document.getElementById('post').submit();"><i class="fa fa-trash"
                      aria-hidden="true"></i></a></p>
             </li>
             @endforeach
             <form id="post" action="{{ route('newspapers.destroy', $newspaper->id) }}" method="POST">
              @method('DELETE')
              @csrf
          </form>
           </ul>
         </div>
    </div>
</div>
@endsection
