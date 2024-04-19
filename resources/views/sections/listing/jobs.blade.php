<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            @include('blocks.list.jobs')

            <div class="col-lg-10 text-right mx-auto">
                <a class="btn btn-simple" href="/career/jobs/list"> {{ __('job_section_list')['see_all_jobs']}} <i class="fas fa-angle-double-right"></i> </a>
            </div>
        </div>
    </div>
</section>