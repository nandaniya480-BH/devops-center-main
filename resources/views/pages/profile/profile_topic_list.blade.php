@extends('layouts.sub_pages')

@section('content')

<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            @include('sections.listing.topic_profiles')
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection