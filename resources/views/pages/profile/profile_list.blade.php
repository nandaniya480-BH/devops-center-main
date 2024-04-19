@extends('layouts.sub_pages')

@section('content')

<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            @include('blocks.list.filter_profile')

            <div class="col-lg-10 col-md-8 mx-auto text-right">
                <ul class="pagination justify-content-end">
                    {{ $profile->links("pagination::bootstrap-4") }}
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script>

$(document).ready(function(){
    const tagsElement = document.querySelector('.tag-choices');
    const tagChoices = new Choices(tagsElement, {
        removeItemButton: true,
    });

    const experienceElement = document.querySelector('.experience-choices');
    const experienceChoices = new Choices(experienceElement);

    window.FontAwesomeConfig = {
        searchPseudoElements: true
    }
});
    
</script>

@endsection

