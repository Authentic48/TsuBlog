@extends('pages.admin.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="mr-auto">
                <a class="btn btn-outline-primary" href="{{ route('post.create') }}" >Create</a>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card" >
                    <img src="{{ asset('storage/app/images/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body flex-body">
                      <a href="{{ route('post.show', $post->id) }}" class="card-title" style="text-decoration: none">{{ $post->title }}</a>
                      <p  class="card-text" style="max-width: 100%">{{ $post->content }}</p>
                      <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary btm-sm">edit</a>

                      <a  href="{{ route('post.delete', $post->id) }}" class="btn btn-outline-danger " onclick="event.preventDefault();
                        document.getElementById('post').submit();">delete</a>
                         <form id="post" action="{{ route('post.delete', $post->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
