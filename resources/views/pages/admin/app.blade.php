<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TsuBlog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
       @include('pages.admin.includes.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('pages.admin.includes.footer')
    </div>

     <!-- Scripts -->
     <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
</body>
</html>
