<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'TsuBlog') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('welcome') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('posts') }}">News</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('newspapers') }}">Newspaper</a></li>
                @if (Auth::check() && Auth::user()->hasRole('admin'))
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('home') }}">Admin</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
