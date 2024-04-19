@if(count($topics) != 0)

    <div class="col-lg-10 col-md-8 mx-auto">
        <h3 class="display-3 text-center mb-5">
           Topic:  {{ $topic_title }}</h3>

        @foreach($topics as $item)
            <div class="card card-nav-tabs">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/career/jobs/{{ $item->item_slug }}">{{ $item->item_title }}</a>
                    </h4>
                    <p class="card-text">
                        {!! html_entity_decode(Str::limit($item->item_content, 250))!!}
                        <a class="read-more-link" href="/career/jobs/{{ $item->item_slug }}">
                            {{ __('jobs_lists')['read_more'] }} <i
                                class="fas fa-angle-double-right"></i></a>
                    </p>
                    <div class="card-footer text-left">
                        @if($item->created_at)
                            <span class="meta d-inline-block m-2">
                                <i class="fas fa-clock"></i>
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                        @endif
                        @if($item->item_location)
                            <span class="meta d-inline-block m-2">
                                <i class="fas fa-map-marker"></i>
                                {{ $item->item_location }}
                            </span>
                        @endif
                        @if($item->item_type)
                            <div class="meta d-inline-block m-2">
                                <i class="fas fa-business-time"></i>
                                {{ $item->item_type }}
                            </div>
                        @endif
                        @if($item->item_contact_email)
                            <div class="meta d-inline-block m-2">
                                <a
                                    href="mailto:{{ $item->item_contact_email }}?subject=Bewerbung: {{ $item->item_title }}">
                                    <i class="fas fa-envelope-open-text"></i>
                                    {{ __('jobs_lists')['apply_now_text'] }}
                                </a>
                            </div>
                        @endif
                        @if($item->item_social_linkedin)
                            <div class="meta d-inline-block m-2">
                                <a class="btn-tooltip" target="_blank" href="{{ $item->item_social_linkedin }}" data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ __('jobs_lists')['social_tooltip_linkedin'] }}"
                                    data-container="body" data-animation="true">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        @endif
                        @if($item->item_social_xing)
                            <div class="meta d-inline-block m-2">
                                <a class="text-success" target="_blank" href="{{ $item->item_social_linkedin }}" data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ __('jobs_lists')['social_tooltip_xing'] }}"
                                    data-container="body" data-animation="true">
                                    <i class="fab fa-xing"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endif
