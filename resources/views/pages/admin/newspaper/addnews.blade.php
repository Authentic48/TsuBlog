@extends('pages.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Newspaper</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('newspaperpost.store', $newspaper->id) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="category" class="col-md-4 col-form-label">Post</label>
                                    <select class="form-control @error('post') is-invalid @enderror" name="post_id">
                                        <option>Choose One...</option>
                                        @foreach ($posts as $post)
                                            <option value={{ $post->id }}>{{ $post->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('post')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection