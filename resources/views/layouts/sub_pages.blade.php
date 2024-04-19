<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <meta property="og:image" content="{{ asset('img/about-us/og_image.png') }}">
    <meta property="og:image:type" content="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>{{ config('app.name', 'DevOps Center') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/core/choices.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    <div id="app">

        @include('sections.header.sub_pages')

        @yield('content')

        @include('sections.footer.default')

    </div>

    @yield('scripts')
    
</body>

</html>
