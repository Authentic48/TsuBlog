<div class="container px-4 px-lg-5">
    <div class="row">
        @foreach ($posts as $post)
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
