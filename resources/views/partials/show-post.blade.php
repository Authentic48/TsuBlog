<article>
    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="mb-4" style="text-align: center">
                    <h1 class="post-show-title">{{ $post->title }}</h1>
                    <div>
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-secondary badge-pill"> {{ $tag->name }}  </span>
                        @endforeach
                     </div>
                     <div>
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="post-show-img">
                    <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="img-responsive">
                </div>
                <div>
                    <p>{!! $post->content !!}</p>
                </div>
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

