@extends('layouts.sub_pages')

@section('content')

<div class="container mt-5">

    <div class="row mt-5">
        <div class="col-md-12 mx-auto text-center">
            <h1 class="service-header-h1">{{ __('services')['services_section_title']  }}</h1>
            <hr>
            <p class="description opacity-8 text-left">
                {{-- {!! html_entity_decode(__('services')['services_section_description'])!!} --}}
            </p>
        </div>
    </div>
    <div class="row justify-content-center mb-5 mt-3">
        <div class="col-12 col-md-6 col-lg-4 d-flex mb-3">
            <div class="p-4 text-center bg-gradient-primary flex-fill card-hover-animation" style="border-radius: 5px;">
                <div class="icon icon-lg icon-shape icon-shape-primary bg-white text-primary shadow rounded-circle">
                    <i class="fas fa-users"></i>
                </div>
                {{-- <h6 class=" text-white text-uppercase text-primary mt-2" style="font-size: 15px;">{!! html_entity_decode(__('services')['services_section_first_list_item_title'])!!}</h6> --}}
                <ul class="description text-white text-left" style="list-style-type: circle;">
                    @foreach(__('services')['services_section_first_list'] as $firstListItems)
                        {!! html_entity_decode($firstListItems)!!}
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex mb-3">
            <div class="p-4 text-center bg-gradient-info flex-fill card-hover-animation" style="border-radius: 5px;">
                <div class="icon icon-lg icon-shape icon-shape-success bg-white text-info shadow rounded-circle">
                    <i class="fas fa-building"></i>
                </div>
                {{-- <h6 class="text-white text-uppercase text-success mt-2" style="font-size: 15px;">{{ __('services')['services_section_second_list_item_title'] }}</h6>
                <p class="description text-white">{{ __('services')['services_section_second_list_item_content'] }}</p> --}}
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex mb-3">
            <div class="p-4 text-center bg-gradient-success flex-fill card-hover-animation" style="border-radius: 5px;">
                <div class="icon icon-lg icon-shape icon-shape-warning bg-white text-success shadow rounded-circle">
                    <i class="fas fa-tools"></i>
                </div>
                {{-- <h6 class="text-white text-uppercase text-warning mt-2" style="font-size: 15px;">{{ __('services')['services_section_third_list_item_title'] }}</h6>
                <p class="description text-white">{{ __('services')['services_section_third_list_item_content'] }}</p> --}}
            </div>
        </div>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-12">
            {{-- <h2 class="service-header-h2 text-center mb-3">{{ __('services')['models_section_title'] }}</h2> --}}
            <hr>
            <p class="description opacity-8">
                {{-- {!! html_entity_decode(__('services')['models_section_description'])!!} --}}
            </p>
            <ul class="description text-left opacity-8" style="font-weight: 300;">
                @foreach(__('services')['models_section_description_list'] as $firstListItems)
                    {!! html_entity_decode($firstListItems)!!}
                @endforeach
            </ul>
        </div>

        <div class="col-12 row">
            <div class="col-12 col-md-6">
                <h5 class="title opacity-8 mt-2">
                    <i class="fas fa-project-diagram"></i>    
                    {{ __('services')['models_section_first_item_list_title'] }}
                </h5>
                <div class="row d-flex">
                    <div class="col-12 mb-5 justify-content-start align-self-start">
                        <img src="{{ asset('img/about-us/agile_pod_teams.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-11 mx-auto mb-5 justify-content-center align-self-center">
                        <div> <div class="blue-line"></div> <span class="display-5">Your Agile Team</span> </div>
                        <div> <div class="violet-line"></div> <span class="display-5">Our Experts</span> </div>
                        <h2></h2>
                        <p class="display-5">* Staff augmentation through specific roles (we have experts for each role)</p>
                    </div>
                </div>
                
                
            </div>
            <div class="col-12 col-md-6">
                <h5 class="title opacity-8 mt-2">
                    <i class="fas fa-project-diagram"></i>    
                    {{ __('services')['models_section_second_item_list_title'] }}
                </h5>
                
                <div class="row d-flex">
                    <div class="col-12 mb-5 justify-content-start align-self-start">
                        <img src="{{ asset('img/about-us/individual_experts.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-11 mx-auto mb-5 justify-content-center align-self-center">
                        <div> <div class="blue-line"></div> <span class="display-5">Your Expert</span> </div>
                        <div> <div class="violet-line"></div> <span class="display-5">Our Agile Pod Team</span> </div>
                        <h2></h2>
                        <p class="display-5">* Staff augmentation through a complete Agile Pod (we have experts for each role)</p>
                        <ul class="description text-left opacity-8">
                            @foreach(__('services')['models_section_second_item_list'] as $firstListItems)
                                {!! html_entity_decode($firstListItems)!!}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12 mx-auto">
            <h2 class="service-header-h2 text-center mb-2">{{ __('services')['nearshore_section_title'] }}</h2>
            <hr>
            <p class="description opacity-8 text-left">
                {!! html_entity_decode(__('services')['nearshore_section_description'])!!}
            </p>
            <ul class="description list-inline text-left opacity-8">
                @foreach(__('services')['nearshore_section_list'] as $firstListItems)
                    {!! html_entity_decode($firstListItems)!!}
                @endforeach
            </ul>
        </div>
        <div class="col-md-12 mx-auto">
            <h3 class="display-4 text-left mb-2 mt-3">{{ __('services')['nearshore_section_2_title'] }}</h3>
            <p class="description opacity-8 text-left">
                {!! html_entity_decode(__('services')['nearshore_section_2_description'])!!}
            </p>
        </div>

        <div class="col-12">
            <div class="row justify-content-center mb-3 mt-3">
                @foreach($data as $item)
                <div class="col-md-4 col-10 mb-3 d-flex">
                    <div class="info bg-gradient-{{ $item['color'] }} flex-fill card-hover-animation">
                        <div class="icon icon-lg icon-shape icon-shape-primary bg-white text-{{ $item['color'] }} shadow rounded-circle">
                            {!! html_entity_decode($item['icon_class'])!!}
                        </div>
                        <h6 class="info-title text-white">
                            {{ $item['name'] }}
                        </h6>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
        </div>

        <div class="col-md-12 mx-auto text-center mt-4">
            <h1 class="service-header-h1 mb-4">{{ __('services')['services_section_subtitle']  }}</h1>
            <div class="row justify-content-center">
                @foreach(__('services')['services_section_subtitle_list'] as $item)
                <div class="col-lg-4 col-md-6 col-10 d-flex">
                    <div class="bg-gradient-{{ $item['color'] }} flex-fill m-1 p-1 pt-2 pb-2 text-lg-center text-left card-hover-animation" style="border-radius: 5px">
                        <div class="icon icon-sm icon-shape icon-shape-primary bg-white text-{{ $item['color'] }} shadow rounded-circle">
                            {!! html_entity_decode($item['icon_class'])!!}
                        </div>
                        <span class="text-sm text-white" style="font-size: 14px;">
                            {{ $item['name'] }}
                        </span>
                    </div>
                </div> 
                @endforeach
            </div>
            <hr>
        </div>
        
        <div class="col-md-12 mx-auto">
            <h1 class="service-header-h2 text-left mb-2 mt-3">{{ __('services')['nearshore_section_3_title'] }}</h1>
            <p class="description opacity-8 text-left">
                @foreach($tags as $item)
                    <span class="badge badge-pill badge-secondary" style="margin: 1px 2.5px;">{{ $item->name }}</span>
                @endforeach
            </p>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@endsection