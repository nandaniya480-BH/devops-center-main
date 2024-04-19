<div class="section feature-insight">
    <div class="container">
        <div class="col-12 text-center mt-2">
            <p class="pb-4">{!! html_entity_decode(__('header')['header_sub_description'])!!}</p>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                {{-- <span class="badge badge-primary badge-pill mb-3">{{ __('services')['services_section_badge']  }}</span> --}}
                <h3 class="display-3">DevOps Center</h3>
                <p>
                    {{-- {!! html_entity_decode(__('services')['services_section_description'])!!} --}}
                </p>
            </div>
        </div>
        <div class="row justify-content-center ">
        <div class="col-12 col-md-6 col-lg-4 d-flex mb-3">
            <div class="p-4 text-center bg-gradient-primary flex-fill card-hover-animation" style="border-radius: 5px;">
                <div class="icon icon-lg icon-shape icon-shape-primary bg-white text-primary shadow rounded-circle">
                    <i class="fas fa-users"></i>
                </div>
                {{-- <h6 class=" text-white text-uppercase text-primary mt-2" style="font-size: 15px;">{!! html_entity_decode(__('services')['services_section_first_list_item_title'])!!}</h6> --}}
                <ul class="description text-white text-left" style="list-style-type: circle">
                    {{-- @foreach(__('services')['services_section_first_list'] as $firstListItems)
                        {!! html_entity_decode($firstListItems)!!}
                    @endforeach --}}
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex mb-3">
            <div class="p-4 text-center bg-gradient-info flex-fill card-hover-animation" style="border-radius: 5px;">
                <div class="icon icon-lg icon-shape icon-shape-success bg-white text-info shadow rounded-circle">
                    <i class="fas fa-building"></i>
                </div>
                {{-- <h6 class="text-white text-uppercase text-success mt-2" style="font-size: 15px;">{{ __('services')['services_section_second_list_item_title'] }}</h6>
                <p class="description text-white ">{{ __('services')['services_section_second_list_item_content'] }}</p> --}}
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
    </div>
</div>