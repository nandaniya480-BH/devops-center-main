@extends('layouts.auth')


@section('content')
<div class="container mt-5 mb-5">
    <h2>DevOps Center profile</h2>
    @include('blocks.table.profile')

    <div class="row">
        <div class="col-md-12 text-right">
            <a class="btn btn-default btn-round mt-5" href="/profile/create">Create new Profile item</a>
        </div>
    </div>
</div>

@include('blocks.modal.default')
@endsection

