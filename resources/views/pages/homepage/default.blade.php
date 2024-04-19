@extends('layouts.default')

@section('content')

@include('sections.content.insight')

@include('sections.listing.slick_profile')

@include(('sections.content.contact'))

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    
</script>
@endsection