@extends('layouts.sub_pages')

@section('content')

<div class="wrapper">
    <div class="page-header page-header-blog">
        <div class="page-header-image bg-secondary"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="display-2">{{ $item->item_experience }} {{ $item->item_profile_title }}</h2>
                    <h3 class="display-2">
                        #{{ $item->item_profile_number }}
                    </h3>
                    @if($item->item_available_from_date)
                        <small class="d-block">
                            @if ($item->item_available_from_date <=  \Carbon\Carbon::today())
                            {{ __('profile_lists')['profile_available_now']  }}
                            @else
                            {{ __('profile_lists')['profile_available_future']  }}
                            <span
                                style="text-decoration: underline;">{{ \Carbon\Carbon::parse($item->item_available_from_date)->diffForHumans() }}!
                            </span>
                            @endif
                        </small>
                    @endif
                    @if($item->item_location)
                        <h3 class="text-default mb-3 mt-3"><i class="fas fa-map-marker"></i> {{ $item->item_location}}</h3>
                    @endif
                </div>
            </div>
            <div class="row row-floating">
                <div class="floating-box bg-default col-12">
                    <div class="box text-center">
                        <div class="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <blockquote class="blockquote text-center mt-4" style="border-left: 0">
                        @if($item->created_at)
                            <p class="mb-0 text-white">
                                <i class="fas fa-clock"></i>
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                        @endif
                        @if($item->item_content_teaser)
                            <div class="text-white d-inline-block m-2">
                                Quick introduction: <br>
                                <small class="text-white" style="font-weight: 300">{{ $item->item_content_teaser }}</small>
                            </div>
                        @endif
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto" style="font-weight: 300">
            {!! html_entity_decode($item->item_content)!!}
        </div>

        
            @if ($item->item_skill_tags != "" && $item->item_skill_tags != null)
                <div class="col-12 col-md-10 mx-auto text-left mt-5">
                    <span class="title"><strong>Topics:</strong> </span>
                    @foreach($item->item_skill_tags as $topics) 
                        <a href="/profile/topics/{{ $topics }}"
                            class="badge badge-pill badge-default">{{ $topics }}</a>
                    @endforeach
                </div>
            @endif

            <div class="col-12 col-md-10 text-left mx-auto">
                <hr>
                <h4 class="title">
                    {{ __('job_description_page')['contact_person'] }}
                </h4>
                <span class="mr-4">
                    DevOps Center & Co. AG
                </span>
                <br>
                <span class="mr-4">
                    HR Services
                </span>
                <br>
                <span class="mr-4">
                    Gewerbestrasse 9
                </span>
                <br>
                <span class="mr-4">
                    6330 Cham
                </span>
                <br>
                <span class="mr-4">
                    Zug / Switzerland
                </span>
                <br>
                <span class="mr-4">
                    <a
                        href="mailto:info@devops-center.ch?subject=Anfrage: {{ $item->item_profile_title }} | Nr: {{ $item->item_profile_number }}">
                        Email: 
                        info@devops-center.ch
                    </a>
                </span>
                <br>

                <span class="mr-4">
                    <a href="tel: +41 43 589 67 97">
                        +41 43 589 67 97
                    </a>
                </span>
                <br>
                <span class="mr-4">
                    <small>
                        <i class="fas fa-info-circle"></i>
                        {{ __('profile_description_page')['in_case_of_contacting_info'] }}
                    </small>
                </span>
            </div>

            @include('blocks.mail.default')
        
    </div>
</div>

@include('sections.listing.related_profiles')

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection