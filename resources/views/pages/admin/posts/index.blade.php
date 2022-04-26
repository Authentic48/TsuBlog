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
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ $post->content }}</p>
                      <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary btm-sm">edit</a>

                      <button type="button" class="btn btn-outline-danger ">delete</button>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
