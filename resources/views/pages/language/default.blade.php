@extends('layouts.auth')

@section('content')

{{ Form::open(array('route' => 'language.save')) }}

<div class="container-fluid mt-5">
    <h3 class="display-3 text-center">
            @if ($lang == 'en')
                Edit language Json File for: English
            @elseif($lang == 'de')
                Edit language Json File for: German
            @elseif($lang == 'tech')
                Edit the Tech Stack
            @endif
    </h3>
    <p class="description opacity-8 text-center mb-3">Please Check your JSON before saving it!</p>
    @if($lang == 'tech')
        <p class="description text-center mb-3">
             Types of Colors: 
             <i class="fas fa-circle text-default"></i> default 
             <i class="fas fa-circle text-primary"></i> primary
             <i class="fas fa-circle text-info"></i> info
             <i class="fas fa-circle text-warning"></i> warning
             <i class="fas fa-circle text-danger"></i> danger
             <i class="fas fa-circle text-success"></i> success
        </p>
        <p class="description text-center mb-3">
             Get Icon codes here: 
             <a href="https://fontawesome.com/v5/search?m=free&s=solid%2Cbrands" target="_blank">
                <i class="fas fa-link"></i> Font Awesome
            </a>
        </p>
    @endif
    <div class="row justify-content-center">
            <div id="jsoneditor" class="col-12 mb-5" style="height: 600px;"></div>
            <div class="col-10 mb-5">
                <textarea id="json_display" hidden name="json" class="form-control" rows="35" placeholder="Write a large text here ...">{!! $jsonString !!}</textarea>
            </div>

            <input type="hidden" name="lang" value="{{ $lang }}">

            <div class="col-10 text-right">
                <div id="check_message" class="mr-3 mb-3">Get JSON Changes</div>
                <button type="button" id="update_json" class="btn btn-outline-default btn-round">Get JSON Changes</button>
                <button type="button" id="check_json" disabled class="btn btn-outline-default btn-round">Check JSON</button>
                <button type="submit" id="store_language_json" disabled class="btn btn-default btn-round">Save language changes</button>
            </div>

    </div>
</div>
{{ Form::close() }}



@endsection

@section('javascript')
<script>
     $(document).ready(function(){

         // create the editor
         const container = document.getElementById("jsoneditor")
        const options = {}
        const editor = new JSONEditor(container, options)

        // set json
        const initialJson = {!! $jsonString !!}
        editor.set(initialJson)

        $('#update_json').on('click', function(){
            // get json
            const updatedJson = editor.get();
            $('#json_display').val(JSON.stringify(updatedJson, null, "\t"));
            $('#check_json').attr('disabled', false);
            $("#check_message").html('<span class="text-default">JSON is Updated, please Check JSON Validifty now </span>');
            $('#store_language_json').attr('disabled', true);
        });
       


        $('#check_json').click(function(){
            var json = $('#json_display').val();
            

            $.post("/check-language-json",
            {
                "_token": "{{ csrf_token() }}",
                "json": json
            },
            function(result){
                if(result){
                    $("#check_message").html('<span class="text-success">JSON is Valid and ready to go! <i class="fas fa-check-circle text-success"></i></span>');
                    $('#store_language_json').attr('disabled', false);
                } else {
                    $("#check_message").html('<span class="text-danger">JINVALID! Please check your JSON. <i class="fas fa-times-circle text-danger"></i></span>');
                    $('#store_language_json').attr('disabled', true);
                }
            });
        });
    });

</script>
@endsection