<section class="blogs-3 bg-secondary mb-5">
    <div class="container-fluid">
        <div class="row">
            @include('blocks.list.topic_profiles')

            <div class="col-lg-10 text-right mx-auto mb-2">
                <a class="btn btn-simple" href="/profile-list"> {{ __('profile_lists')['see_all_profiles_button'] }} <i class="fas fa-angle-double-right"></i> </a>
            </div>
        </div>
    </div>
</section>