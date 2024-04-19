@extends('layouts.sub_pages')

@section('content')

<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            @include('blocks.list.jobs')

            <div class="col-lg-10 col-md-8 mx-auto text-right">
                <ul class="pagination justify-content-end">
                    {{ $jobs->links("pagination::bootstrap-4") }}
                </ul>
            </div>
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