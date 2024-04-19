@extends('layouts.auth')


@section('content')

<div class="container">
    <h3>{{ $item->item_title }} </h3>
    {{ Form::open(array('route' => 'profile.update')) }}
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_name" class="form-control"
                        placeholder="Name" value="{{ $item->item_name }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_last_name" class="form-control"
                        placeholder="Lastname" value="{{ $item->item_last_name }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_profile_title" class="form-control"
                        placeholder="Profile title" value="{{ $item->item_profile_title }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_available_from_date" class="flatpickr flatpickr-input form-control"
                        placeholder="Developer available from date ..." value="{{ $item->item_available_from_date }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_location" class="form-control"
                        placeholder="Location" value="{{ $item->item_location }}">
                </div>
            </div>
            <div class="col-md-12 mb-3">

                <select id="profile_tags" name='item_skill_tags[]' placeholder="This is a search placeholder" class="form-control tag-choices" data-trigger multiple >
                    <option disabled value="">{{ __('profile_search_page')['tags_input_placeholder']  }}</option>
                    @foreach($tag_options as $profile_tags)
                    @if($item->item_skill_tags != [])
                        <option value="{{$profile_tags->name}}" @if(in_array($profile_tags['name'], $item->item_skill_tags)) selected @endif>{{$profile_tags->name}} </option>
                    @else
                    <option value="{{$profile_tags->name}}">{{$profile_tags->name}} </option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">

                <select id="profile_tags" name='item_language[]' placeholder="This is a search placeholder" class="form-control language-choices" data-trigger multiple >
                    <option disabled value="">Choose Languages</option>
                    @foreach($langauge_options as $profile_languages)
                    @if($item->item_language != [])
                        <option value="{{$profile_languages->name}}" @if(in_array($profile_languages['name'], $item->item_language)) selected @endif>{{$profile_languages->name}} </option>
                    @else
                        <option value="{{$profile_languages->name}}">{{$profile_languages->name}} </option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <select class="form-control experience-choices" data-trigger name="item_experience" id="profile_experience_level">
                    <option disabled selected value=""># Level of Experience</option>
                    <option @if($item->item_experience == 'Beginner') selected @endif value="Beginner">Beginner</option>
                    <option @if($item->item_experience == 'Junior') selected @endif value="Junior">Junior</option>
                    <option @if($item->item_experience == 'Intermediate') selected @endif value="Intermediate">Intermediate</option>
                    <option @if($item->item_experience == 'Senior') selected @endif value="Senior">Senior</option>
                </select>
            </div>
            <div class="col-md-12 custom-control custom-checkbox ml-3 mb-3">
                <input value="0" name="item_is_active" value="0" type="hidden">
                <input class="custom-control-input" @if($item->item_is_active == 1) checked @endif value="1" name="item_is_active" id="item_is_active" type="checkbox">
                <label class="custom-control-label" for="item_is_active">Profile is active ?</label>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="item_content_teaser" name="item_content_teaser" class="form-control form-control-alternative" rows="3"
                        placeholder="Some teaser text about the Developer ...">{{ $item->item_content_teaser }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="item_content" name="item_content" class="form-control form-control-alternative" rows="3"
                        placeholder="Write a large text here ...">{!! html_entity_decode($item->item_content)!!}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <input type="hidden" value="{{ $item->id }}" name="id" />
                <button 
                data-value="{{ $item->id }}" 
                data-slug="/profile" 
                data-message="Are you sure want to remove the Profile of {{ $item->name }} {{ $item->last_name }} ?"
                rel="tooltip" 
                class="btn btn-danger btn-round remove-profile" 
                data-toggle="modal"
                type="button"
                data-target="#removeProfileModal">
                    Remove
                </button>
                <button class="btn btn-primary btn-round" type="submit">Update</button>
            </div>
        </div>
    </form>
    {{ Form::close() }}
</div>

@include('blocks.modal.default');


@endsection

@section('javascript')

<script>
    (function () {
        $(function () {
            var $preview, editor, toolbar;
            Simditor.locale = 'en-US';
            toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|',
                'ol', 'ul', 'blockquote', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent',
                'alignment'
            ];

            editor = new Simditor({
                textarea: $('#item_content'),
                placeholder: 'Item content here ...',
                toolbar: toolbar,
                pasteImage: false,
            });
        });

    }).call(this);


    $(document).ready(function(){

        const tagsElement = document.querySelector('.tag-choices');
        const tagChoices = new Choices(tagsElement, {
            removeItemButton: true,
        });

        const languageElement = document.querySelector('.language-choices');
        const languageChoices = new Choices(languageElement, {
            removeItemButton: true,
        });

        const experienceElement = document.querySelector('.experience-choices');
        const experienceChoices = new Choices(experienceElement);

        window.FontAwesomeConfig = {
            searchPseudoElements: true
        };
    });
    
</script>

@endsection