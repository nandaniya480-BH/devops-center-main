<section class="blogs-3 bg-secondary mb-5">
    <div class="container-fluid">
        <div class="row">
            @include('blocks.list.slick_profile')

            <div class="col-lg-10 text-right mx-auto mb-2">
                <a class="btn btn-simple" href="/profile-list"> {{ __('homepage')['profile_list_see_all_button_text'] }} <i class="fas fa-angle-double-right"></i> </a>
            </div>
        </div>
    </div>
</section>