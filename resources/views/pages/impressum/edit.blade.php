@extends('layouts.auth')


@section('content')

<div class="container">
    {{ Form::open(array('route' => 'impressum.update')) }}
    <form>
        <div class="row">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="item_content" name="content" class="form-control form-control-alternative" rows="3"
                        placeholder="Write a large text here ...">{!! html_entity_decode($item->content)!!}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-primary btn-round" type="submit">Update</button>
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

</script>

@endsection