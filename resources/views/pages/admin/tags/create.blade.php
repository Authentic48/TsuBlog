@extends('pages.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Tag</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.tags.store', $post->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <label for="name" class="col-md-4 col-form-label">name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="text" class="invisible" name="post_id" value="{{ old('post_id', $post->id) }}">
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
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