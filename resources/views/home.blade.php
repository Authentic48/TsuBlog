@extends('pages.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
           <h3 class="mb-4">Admin Panel</h3> 
           <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $category->name }}
                <p><a href="{{ route('admin.post.index') }}" class="btn btn-outline-primary">View</a>
                <a href="{{ route('posts.create') }}" class="btn btn-outline-success">Create</a></p>
            </li>
            @endforeach
          </ul>
        </div>
    </div>
</div>
@endsection
