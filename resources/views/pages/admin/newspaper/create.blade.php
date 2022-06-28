@extends('pages.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Newspaper</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('newspapers.store') }}" enctype="multipart/form-data">
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
                                    <label for="category" class="col-md-4 col-form-label">description</label>
                                    <textarea id="tinymce" name="description" class="form-control @error('description') is-invalid @enderror"> {{ old('description') }} </textarea>
                                    @error('description')
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