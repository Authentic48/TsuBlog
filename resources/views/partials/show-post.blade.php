<header class="hero" style="background-image: url({{ asset('images/'.$post->image) }})">
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
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{!! $post->content !!}</p>
                <div class="">
                    <span>Tags: </span>
                    @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary"> {{ $tag->name }}  </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</article>

