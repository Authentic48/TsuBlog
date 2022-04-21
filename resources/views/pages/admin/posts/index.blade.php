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
    </div>
@endsection
