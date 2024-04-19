<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <meta property="og:image" content="{{ asset('img/favicon.png') }}">
    <meta property="og:image:type" content="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevOps Center') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.9.0/jsoneditor.css" integrity="sha512-NGELF6nbKCOKdzzfnY/DOKS5W25MVV5iZb92NK3fIwnKpL1OEUXibeepvzxAEgQtWgXGOzllOUpCybmenKDeRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/otheme.min.css') }}" rel="stylesheet">

     <!-- Scripts -->
     <script type="text/javascript" src="{{ asset('js/otheme.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/core/choices.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/core/datatables.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/simditor/module.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/simditor/hotkeys.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/simditor/simditor.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.9.0/jsoneditor.min.js" integrity="sha512-WuimD+3eJ3qkskeMQiQZesaYjwyBiTN2Xg2tI60IDp5jx402/u8lLZAqCgAei92NInz0Jn+xYqJKYCbxic4hIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div id="app">

        @include('sections.header.auth')

        @yield('content')

        @include('sections.footer.default')

    </div>

    @yield('javascript')


</body>

</html>
