@extends('pages.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <label for="title" class="col-md-4 col-form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="category" class="col-md-4 col-form-label">Category</label>
                                        <select class="form-control @error('category') is-invalid @enderror" name="category" value={{ old('category') }}>
                                            <option>Choose One...</option>
                                            @foreach ($categories as $category)
                                                <option>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <label for="image" class="col-md-4 col-form-label">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="category" class="col-md-4 col-form-label">Content</label>
                                        <textarea id="tinymce" name="content" class="form-control"> {{ old('content') }} </textarea>
                                        @error('content')
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
