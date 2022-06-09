<div class="container px-4 px-lg-5">
    <div class="row  justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle text-truncate">{!! $post->content !!}</h3>
                    </a>
                    <p class="post-meta">
                        Posted <span>{{ $post->created_at->diffForHumans() }}</span>
                    </p>
                </div>
                <hr class="my-4" />
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>
