@extends('layouts.sub_pages')

@section('content')

<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            {!! html_entity_decode($item->content)!!}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection