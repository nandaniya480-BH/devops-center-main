@extends('layouts.sub_pages')

@section('content')

<div class="wrapper">
    <div class="page-header page-header-blog">
        <div class="page-header-image bg-secondary"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="display-2">{{ $item->item_title }}</h2>
                </div>
            </div>
            <div class="row row-floating">
                <div class="floating-box bg-default col-12">
                    <div class="box text-center">
                        <div class="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                    <blockquote class="blockquote text-center mt-4" style="border-left: 0">
                        @if($item->created_at)
                            <p class="mb-0 text-white">
                                <i class="fas fa-clock"></i>
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                        @endif

                        @if($item->item_location)
                            <span class="meta text-white d-inline-block m-2">
                                <i class="fas fa-map-marker"></i>
                                {{ $item->item_location }}
                            </span>
                        @endif

                        @if($item->item_type)
                            <div class="meta text-white d-inline-block m-2">
                                <i class="fas fa-business-time"></i>
                                {{ $item->item_type }}
                            </div>
                        @endif
                        @if($item->item_contact_email)
                            <div class="meta text-white d-inline-block m-2">
                                <a class="description-link"
                                    href="mailto:{{ $item->item_contact_email }}?subject=Bewerbung: {{ $item->item_title }}">
                                    <i class="fas fa-envelope-open-text"></i>
                                    {{ __('job_description_page')['apply_now']}}
                                </a>
                            </div>
                        @endif
                        <br>
                        @if($item->item_social_linkedin)
                            <div class="meta d-inline-block m-2">
                                <a class="btn-tooltip" target="_blank" href="{{ $item->item_social_linkedin }}" data-toggle="tooltip"
                                    data-placement="top" title="{{ __('job_description_page')['social_tooltip_linkedin']}}" data-container="body"
                                    data-animation="true">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        @endif
                        @if($item->item_social_xing)
                            <div class="meta d-inline-block m-2">
                                <a class="text-success" target="_blank" href="{{ $item->item_social_linkedin }}" data-toggle="tooltip"
                                    data-placement="top" title="{{ __('job_description_page')['social_tooltip_xing']}}" data-container="body"
                                    data-animation="true">
                                    <i class="fab fa-xing"></i>
                                </a>
                            </div>
                        @endif
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 mx-auto" style="font-weight: 300">
                {!! html_entity_decode($item->item_content)!!}
            </div>
        </div>
        <div class="row">
            @if ($item->item_tags != "" && $item->item_tags != null)
                <div class="col-12 col-md-10 mx-auto text-left mt-5">
                    <span class="title"><strong>Topics:</strong> </span>
                    @foreach($item->item_tags as $topics) 
                        <a href="/career/topics/jobs/{{ $topics }}" class="badge badge-pill badge-default">{{ $topics }}</a>
                    @endforeach
                </div>
            @endif
            <div class="col-12 col-md-10 text-left mx-auto">
                <hr>
                <h4 class="title">{{ __('job_description_page')['contact_person'] }}</h4>
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
                    Email: 
                    <a
                        href="mailto:jobs@devops-center.ch?subject=Bewerbung: {{ $item->item_title }}">
                        
                        jobs@devops-center.ch
                    </a>
                </span>
                <br>

                <span class="mr-4">
                    Tel: 
                    <a href="tel: +41 43 589 67 97">
                        +41 43 589 67 97
                    </a>
                </span>
                <br>
            </div>

            <div class="col-12 col-md-10 text-left mt-3 mx-auto">
                @if($item->item_social_linkedin)
                    <a class="btn btn-primary btn-round mt-3" target="_blank" href="{{ $item->item_social_linkedin }}">
                        {{ __('job_description_page')['apply_on_linkedin'] }} <i class="fab fa-linkedin"></i>
                    </a>
                @endif
                @if($item->item_social_xing)
                    <a class="btn btn-success btn-round mt-3" target="_blank" href="{{ $item->item_social_xing }}">
                        {{ __('job_description_page')['apply_on_xing'] }}  <i class="fab fa-xing"></i> 
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

@include('sections.listing.related_jobs')

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection