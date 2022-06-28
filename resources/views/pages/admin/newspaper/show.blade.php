@extends('layouts.app')

@section('content')
<article>
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="mb-4" style="text-align: center">
                    <h1 class="post-show-title">{{ $newspaper->title }}</h1>
                     <div>
                        {{ $newspaper->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="post-show-img">
                    <img src="{{ asset('images/' . $newspaper->image) }}" alt="{{ $newspaper->title }}" class="img-responsive">
                </div>
                <div>
                    <p>{!! $newspaper->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</article>
<div class="container px-4 px-lg-5">
    <div class="row">
        @foreach ($newspaper->news as $post)
            <div class="post-item col-md-4 justify-content-center">
                <div class="post-image">
                    <a href="{{ route('posts.show', $post->id) }}"><img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="img-responsive"></a>
                </div>
                <div class="post-date">
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <div class="post-title">
                    <a href="{{ route('posts.show', $post->id) }}" >{{ $post->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection