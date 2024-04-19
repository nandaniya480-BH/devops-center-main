@extends('layouts.auth')


@section('content')

<div class="container">
    <h3>{{ $item->item_title }} </h3>
    {{ Form::open(array('route' => 'jobs.update')) }}
    <form>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_title" class="form-control"
                        placeholder="Job title" value="{{ $item->item_title }}">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_location" class="form-control"
                        placeholder="Job location" value="{{ $item->item_location }}">
                </div>
            </div>
            <div class="col-md-10 mb-3">
                <select class="form-control" data-trigger name="item_type" id="choices-single-default">
                    <option disabled>Employment type</option>
                    <option @if($item->item_type == 'Part-time') selected @endif value="Part-time">Part-time</option>
                    <option @if($item->item_type == 'Full-time') selected @endif value="Full-time">Full-time</option>
                </select>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_social_linkedin" class="form-control"
                        placeholder="LinkedIn Url" value="{{ $item->item_social_linkedin }}">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_social_xing" class="form-control"
                        placeholder="Xing Url" value="{{ $item->item_social_xing }}">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_contact_full_name" class="form-control"
                        placeholder="Contact name" value="{{ $item->item_contact_full_name }}">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_contact_email" class="form-control"
                        placeholder="Contact E-mail" value="{{ $item->item_contact_email }}">
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="item_contact_phone" class="form-control"
                        placeholder="Contact phone number" value="{{ $item->item_contact_phone }}">
                </div>
            </div>
            <div class="col-md-10 mb-3">

                <select id="profile_tags" name='item_tags[]' placeholder="This is a search placeholder" class="form-control tag-choices" data-trigger multiple >
                    <option disabled value="">{{ __('profile_search_page')['tags_input_placeholder']  }}</option>
                    @foreach($tag_options as $profile_tags)
                    @if($item->item_tags != [])
                        <option value="{{$profile_tags->name}}" @if(in_array($profile_tags['name'], $item->item_tags)) selected @endif>{{$profile_tags->name}} </option>
                    @else
                    <option value="{{$profile_tags->name}}">{{$profile_tags->name}} </option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 custom-control custom-checkbox ml-3 mb-3">
                <input value="0" name="item_is_active" value="0" type="hidden">
                <input class="custom-control-input" @if($item->item_is_active == 1) checked @endif value="1" name="item_is_active" id="item_is_active" type="checkbox">
                <label class="custom-control-label" for="item_is_active">Job is active ?</label>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <textarea id="item_content" name="item_content" class="form-control form-control-alternative" rows="3"
                        placeholder="Write a large text here ...">{!! html_entity_decode($item->item_content)!!}</textarea>
                </div>
            </div>
            <div class="col-md-10 text-right">
                <input type="hidden" value="{{ $item->id }}" name="id" />
                <button 
                data-value="{{ $item->id }}" 
                data-slug="/jobs" 
                data-message="Are you sure want to remove the Job with title:  # {{ $item->item_title }} ?"
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

@include('blocks.modal.default')

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