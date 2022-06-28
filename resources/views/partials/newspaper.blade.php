<div class="container px-4 px-lg-5">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($newspapers as $newspaper)
                <div class="post-item justify-content-center">
                    <div class="post-image">
                        <a href="{{ route('newspapers.show', $newspaper->id) }}"><img src="{{ asset('images/' . $newspaper->image) }}" class="img-responsive"></a>
                    </div>
                    <div class="post-date">
                        {{ $newspaper->created_at->diffForHumans() }}
                    </div>
                    <div class="post-title">
                        <a href="{{ route('newspapers.show', $newspaper->id) }}" >{{ $newspaper->title }}</a>
                    </div>
                </div>
            @endforeach
            {{ $newspapers->links() }}
            </div>
        </div>
    </div>
</div>