<div class="col-12 pb-5 pt-5">
    <h3 class="display-3 text-center mb-5">{{ __('profile_lists')['homepage_profile_title'] }}</h3>
    <div class="carousel">
        @if($profile->count() != 0)
            @foreach($profile as $item)
                <div>

                    <div class="card card-blog">
                        <div class="card-body">
                            <h6 class="card-category text-danger">
                                <i class="fas fa-code"></i> {{ $item->item_experience }}
                            </h6>
                            <h5 class="card-title">
                                <a href="/profile/item/{{ $item->item_slug }}">{{ $item->item_profile_title }}</a>
                            </h5>
                            <hr class="mb-2 mt-2">
                            <div class="card-description" style="line-height: 1rem;">
                                <small>
                                    {{ Str::limit($item->item_content_teaser, 200) }}
                                    <a class="read-more-link" href="/profile/item/{{ $item->item_slug }}">
                                        {{ __('jobs_lists')['read_more'] }}
                                        <i class="fas fa-angle-double-right"></i></a>
                                </small>
                                @if($item->item_language)
                                    <div class="d-block mt-4">
                                        @foreach($item->item_language as $language_item)
                                            <span class="badge badge-pill badge-secondary mt-1 mr-1">{{ $language_item }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <hr class="mb-2 mt-2">
                                @if($item->item_skill_tags)
                                    <div class="d-block mt-1">
                                        @foreach($item->item_skill_tags as $tags_item)
                                            <a href="/profile/topics/{{ $tags_item }}" class="badge badge-pill badge-default mt-1 mr-1">{{ $tags_item }}</a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="card-footer">

                            @if($item->item_location)
                            <span class="text-default"><i class="fas fa-map-marker"></i> {{ $item->item_location}}</span>
                            @endif
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
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="text-center">There are no profile yet</h5>
        @endif
    </div>
</div>