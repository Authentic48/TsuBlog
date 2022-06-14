<div class="container px-4 px-lg-5">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <h3 style="padding: 2rem 2rem">Category</h3>
                <div class="list-group list-group-flush">
                    @foreach ($categories as $category)
                    <a class="list-group-item list-group-item-action" href="{{ route('posts.category', $category->name) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="post-item justify-content-center">
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
            {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>