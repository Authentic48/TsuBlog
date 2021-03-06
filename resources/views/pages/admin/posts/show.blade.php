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
                <a class="btn btn-outline-primary" href="{{ route('admin.post.index') }}">Go back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-2">
                <img src="{{ asset('images/'.$post->image) }}" class="img-fluid">
                <h1 class="display-one">{{ $post->title }}</h1>
                <p>{!! $post->content !!}</p>
                <hr>
                <div class="d-flex">
                    @foreach ($post->tags as $tag)
                    <span class="mr-4">
                        {{ $tag->name }}<a  href="{{ route('admin.tags.delete',[ 'post' => $post->id, 'id' => $tag->id]) }}" class="btn btn-outline-danger " onclick="event.preventDefault();
                            document.getElementById('post').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </span>
                         <form id="post" action="{{ route('admin.tags.delete', ['post' => $post->id, 'id' => $tag->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                @endforeach
                </div>

                <hr>
                <a href="{{ route('admin.tags.create', $post->id) }}" class="btn btn-outline-primary btn-sm">Add tags</a>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/'.$post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}">
                        <div class="card-body">
                            <a href="{{ route('admin.post.show', ['post' => $post->id]) }}" class="card-title">{{ $post->title }}</a>
                            <p class="card-text text-truncate">{{ $post->content }}</p>
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary btm-sm">edit</a>

                            <a href="{{ route('posts.destroy', ['post' => $post->id]) }}" class="btn btn-outline-danger " onclick="event.preventDefault();
                                document.getElementById('post').submit();">delete</a>
                            <form id="post" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
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
