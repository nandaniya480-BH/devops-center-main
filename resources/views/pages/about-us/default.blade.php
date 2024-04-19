@extends('layouts.sub_pages')
@section('meta')
<meta name="robots" content="noindex">
@endsection

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h1 text-center mb-4">{{ __('about-us')['about_us_section_title']  }}</h1>
            <p class="description opacity-8 text-left">
                {!! html_entity_decode(__('about-us')['about_us_section_description'])!!}
            </p>
            <hr>
        </div>
    </div>

    <!-- Our mission section -->
    <div class="row mt-2">
        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h1 text-center mb-4">{{ __('about-us')['about_us_mission_title']  }}</h1>
            <p class="description opacity-8 text-left">
                {!! html_entity_decode(__('about-us')['about_us_mission_description'])!!}
            </p>
            <hr>
        </div>
    </div>

    <!-- Our Vision section -->
    <div class="row mt-2">
        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h1 text-center mb-4">{{ __('about-us')['about_us_vision_title']  }}</h1>
            <div class="row col-12 mx-auto p-0">
                <div class="col-lg-3 col-md-4 col-12 mb-md-2 mb-5 text-left p-0">
                    <img src="{{ asset('img/about-us/co-founder.png') }}" class="img-fluid col-md-8 col-6 mb-md-2 mb-2 p-0 co-founder-img" style="border-radius: 5px;" alt="">
                    <h5 class="mt-2 mb-1 text-left"><strong>Dinë Hereqi</strong></h5>
                    <div class="description opacity-8 text-left" style="font-weight: 400">
                        <span>Managing Partner <br> Senior IT Consultant</span><br>
                        <span>MSc. Wirtschaftsinformatik</span><br>
                        <span>MSc. Betriebswirtschaftslehre</span><br>
                        <span>BSc. Wirtschaftsinformatik</span><br>
                        <span>EFZ. Informatik</span><br>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12 d-flex align-items-start px-0">
                    <q class="display-4 opacity-8 text-left pl-2" style="font-weight: 300; border-left: 3px solid #113459">
                        {!! html_entity_decode(__('about-us')['about_us_vision_description'])!!}
                    </q>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- References, Mandates & Partners section -->
    <div class="row mt-2">
        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h1 text-center mb-4">{{ __('about-us')['about_us_references_title']  }}</h1>
            <p class="description opacity-8 text-left">
                {!! html_entity_decode(__('about-us')['about_us_references_description'])!!}
            </p>
        </div>
        <div class="col-md-12 mx-auto row p-md-0 p-2 mb-6">
            <div class="col-md-3 col-6 mt-4 d-flex align-items-center">
                <img src="{{ asset('img/about-us/ch_eidgenossenschaft.svg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-3 col-6 mt-4 d-flex align-items-center">
                <img src="{{ asset('img/about-us/oniko.svg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-3 col-6 mt-4 d-flex align-items-center">
                <img src="{{ asset('img/about-us/arma-suisse.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-3 col-6 mt-4 d-flex align-items-center">
                <img src="{{ asset('img/about-us/cybrius.svg') }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h1 text-center mb-2">{{ __('about-us')['about_us_mandates_title']  }}</h1>
        </div>

        <div class="col-md-12 row justify-content-center mb-5 mt-4 mx-auto">
            @foreach(__('about-us')['about_us_mandates_list'] as $item)
                <div class="col-12 col-md-6 col-lg-4 d-flex mb-5">
                    <div class="px-2 py-4 text-center bg-gradient-{{ $item['color'] }} flex-fill card-hover-animation" style="border-radius: 5px;">
                        <div class="icon icon-lg icon-shape icon-shape-{{ $item['color'] }} bg-white text-{{ $item['color'] }} shadow rounded-circle">
                        {!! html_entity_decode($item['icon'])!!}
                        </div>
                        <h6 class=" text-white text-uppercase text-{{ $item['color'] }} mt-2" style="font-size: 15px; font-weight: 800">{{ $item['client'] }}</h6>
                        <ul class="text-white text-left" style="list-style-type: circle;">
                            @foreach($item['mandates'] as $mandate)
                                <li>{{$mandate}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>


@endsection

@section('scripts')
@endsection