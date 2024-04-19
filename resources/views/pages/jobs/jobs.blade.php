@extends('layouts.auth')


@section('content')
<div class="container mt-5 mb-5">
    <h2>DevOps Center open Positions</h2>
    @include('blocks.table.jobs')

    <div class="row">
        <div class="col-md-12 text-right">
            <a class="btn btn-default btn-round mt-5" href="/jobs/create">Create new Job item</a>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection