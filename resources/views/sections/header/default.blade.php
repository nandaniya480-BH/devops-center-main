<header class="header">
    @include('sections.navigation.default')
    <div class="page-header skew-separator" style="background-color: #edeef4;">
        <div class="container">
            <div class="row align-items-center text-left">
                <div class="col-lg-6 col-12">
                    <h1 class="display-3">
                        {{__('header')['header_title']}}
                    </h1>
                    <h5 class="text-primary">
                        {!! html_entity_decode(__('header')['header_subtitle'])!!}
                    </h5>
                    <p class="pb-4" style="font-size: 1.05rem; line-height: 1.6">{!! html_entity_decode(__('header')['header_description'])!!}</p>
                </div>
                <div class="col-lg-6 col-12 pl-0">
                    <object data="{{ asset('img/devops-banner_animated_infitine.svg') }}" type="image/svg+xml">
                        <img class="ml-lg-5" src="{{ asset('img/devops-banner_animated_infitine.svg') }}">
                    </object>
                </div>
            </div>
        </div>
    </div>
</header>