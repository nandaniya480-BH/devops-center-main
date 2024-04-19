<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('img/favicon.ico') }}"  type="image/x-icon">
    <meta property="og:image" content="{{ asset('img/about-us/og_image.png') }}">
    <meta property="og:image:type" content="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevOps Center') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{{ asset('css/theme.min.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/theme.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
    <div id="app">

        @include('sections.header.default')

        @yield('content')

        @include('sections.footer.default')

    </div>

    @yield('scripts')

    <script>
        $("#contact-us-btn").click(function(e) {
            e.preventDefault();
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#contact-us").offset().top
            }, 1000);
        });

        $(document).ready(function(){

            $('.carousel').slick({
                dots: false,
                infinite: false,
                speed: 300,
                arrows: true,
                slidesToShow: 4,
                prevArrow: '<button class="btn btn-sm btn-default prevArrowBtn slide-arrow prev-arrow"><i class="fas fa-caret-left"></i></button>',
                nextArrow: '<button class="btn btn-sm btn-default nextArrowBtn slide-arrow next-arrow"><i class="fas fa-caret-right"></i></button>',
                responsive: [
                    {
                    breakpoint: 1124,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                    },
                    {
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                    {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    ]
                })
                .on('setPosition', function (event, slick) {
                    slick.$slides.css('height', slick.$slideTrack.height() + 'px');
                });
            });
    </script>

    

</body>

</html>
