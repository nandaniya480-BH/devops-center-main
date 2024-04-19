@extends('layouts.auth')

@section('content')

<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                <h3 class="text-center">Skill Tags</h3>
                @include('blocks.table.tags')
                <div class="col-md-12 text-right mt-3">
                    <button type="button" class="btn btn-default btn-round" data-toggle="modal" data-target="#createTagsModal">
                    Create new Tag
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')


@endsection

