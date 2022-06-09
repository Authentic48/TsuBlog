@extends('pages.admin.app')

@section('content')
    <div class="container px-4 px-lg-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row  justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-4">Admin Panel</h3>
                <ul class="list-group list-group-flush mb-5">
                    @foreach ($posts as $post)
                        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $post->title }}
                            <p>
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                    class="btn btn-outline-dark">Edit</a>
                                <a href="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                    class="btn btn-outline-danger " onclick="event.preventDefault();
                                        document.getElementById('post').submit();"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>
                            </p>
                        </li>
                        <form id="post" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
                </ul>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
