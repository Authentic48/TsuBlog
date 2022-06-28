<header class="hero" style="background-image: url({{ asset('assets/img/gallery.jpg') }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form action="{{ route('search') }}" method="post">
                    @METHOD('POST')
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('term') is-invalid @enderror"
                            placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" name="term">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        @error('term')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
