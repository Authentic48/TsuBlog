<article>
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="mb-4">
                    <h1 class="post-show-title">{{ $post->title }}</h1>
                </div>
                <div class="post-show-img">
                    <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}" class="img-responsive">
                </div>
                <p>{!! $post->content !!}</p>

                <div class="post-show-tag a-tag">
                    <span>Tags: </span>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-secondary"> {{ $tag->name }}  </span>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</article>

<!-- <header class="show-post-img" style="background-image: url()">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="sub-heading"> <a href="{{ route('posts.category', $post->category) }}" style="text-decoration: none;">{{ $post->category }}</a></h2>
                    <span class="meta">
                        Posted {{ $post->created_at->diffForHumans() }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

