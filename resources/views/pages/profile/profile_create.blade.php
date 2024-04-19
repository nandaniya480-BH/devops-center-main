@extends('layouts.auth')


@section('content')

<div class="container">
    <h1>New profile item </h1>
    {{ Form::open(array('route' => 'profile.store')) }}
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_name" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_last_name" class="form-control"
                        placeholder="Lastname">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_profile_title" class="form-control"
                        placeholder="Profile position title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_available_from_date" class="flatpickr flatpickr-input form-control"
                        placeholder="Developer available from date ...">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_location" class="form-control"
                        placeholder="Location">
                </div>
            </div>
            <div class="col-md-12 mb-3">

                <select id="profile_tags" name='item_skill_tags[]' placeholder="This is a search placeholder" class="form-control tag-choices" data-trigger multiple >
                    <option disabled value="">{{ __('profile_search_page')['tags_input_placeholder']  }}</option>
                    @foreach($tag_options as $profile_tags)
                    <option value="{{$profile_tags->name}}">{{$profile_tags->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">

                <select id="profile_tags" name='item_language[]' placeholder="This is a search placeholder" class="form-control language-choices" data-trigger multiple >
                    <option disabled value="">Choose Languages</option>
                    @foreach($langauge_options as $profile_languages)
                        <option value="{{$profile_languages->name}}">{{$profile_languages->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <select class="form-control experience-choices" data-trigger name="item_experience" id="profile_experience_level">
                    <option disabled selected value=""># Level of Experience</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Junior">Junior</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Senior">Senior</option>
                </select>
            </div>
            <div class="col-md-12 custom-control custom-checkbox ml-3 mb-3">
                <input value="0" name="item_is_active" type="hidden">
                <input class="custom-control-input" checked value="1" name="item_is_active" id="item_is_active" type="checkbox">
                <label class="custom-control-label" for="item_is_active">Profile is active ?</label>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="item_content_teaser" required name="item_content_teaser" class="form-control form-control-alternative" rows="3"
                        placeholder="Some teaser text about the Developer ..."></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="item_content" name="item_content" class="form-control form-control-alternative" rows="3"
                        placeholder="Write a large text here ..."></textarea>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-primary btn-round" type="submit">Save</button>
            </div>
        </div>
    </form>
    {{ Form::close() }}
</div>

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
                focusable: true
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