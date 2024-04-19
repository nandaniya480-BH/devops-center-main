@extends('layouts.auth')


@section('content')

<div class="container">
    <h1>New Job item </h1>
    {{ Form::open(array('route' => 'jobs.store')) }}
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_title" class="form-control"
                        placeholder="Job title">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_location" class="form-control"
                        placeholder="Job location">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <select class="form-control" data-trigger name="item_type" id="choices-single-default">
                    <option disabled selected>Employment type</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Full-time">Full-time</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_social_linkedin" class="form-control"
                        placeholder="LinkedIn Url">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="item_social_xing" class="form-control"
                        placeholder="Xing Url">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_contact_full_name" class="form-control"
                        placeholder="Contact name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_contact_email" class="form-control"
                        placeholder="Contact E-mail">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" required name="item_contact_phone" class="form-control"
                        placeholder="Contact phone number">
                </div>
            </div>
            <div class="col-md-12 mb-3">

                <select id="profile_tags" name='item_tags[]' placeholder="This is a search placeholder" class="form-control tag-choices" data-trigger multiple >
                    <option disabled value="">{{ __('profile_search_page')['tags_input_placeholder']  }}</option>
                    @foreach($tag_options as $profile_tags)
                    <option value="{{$profile_tags->name}}">{{$profile_tags->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 custom-control custom-checkbox ml-3 mb-3">
                <input value="0" name="item_is_active" type="hidden">
                <input class="custom-control-input" checked value="1" name="item_is_active" id="item_is_active" type="checkbox">
                <label class="custom-control-label" for="item_is_active">Job is active ?</label>
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
            });
        });

    }).call(this);

    $(document).ready(function(){

        const tagsElement = document.querySelector('.tag-choices');
        const tagChoices = new Choices(tagsElement, {
            removeItemButton: true,
        });

        window.FontAwesomeConfig = {
            searchPseudoElements: true
        };
    });

</script>

@endsection