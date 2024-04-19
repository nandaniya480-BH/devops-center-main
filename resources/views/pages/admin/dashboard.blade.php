@extends('layouts.auth')

@section('content')

<div class="container pt-5 pb-5">
    <h3 class="display-3 text-center">Hello, {{ Auth::user()['name'] }}!</h3>

    <div class="row justify-content-center pt-5">
       
        <a href="/jobs/show" class="col-md-4 mb-3 d-flex">
            <div class="info bg-gradient-primary flex-fill">
                <div class="icon icon-lg icon-shape icon-shape-primary bg-white text-primary shadow rounded-circle">
                    <i class="fas fa-th-list"></i>
                </div>
                <h6 class="info-title text-white">
                    Jobs
                </h6>
                <small class="text-white"><strong>DevOps Jobs:</strong> list, filter, edit, create, delete.</small>
            </div>
        </a>

        <a href="/profile/show" class="col-md-4 mb-3 d-flex">
            <div class="info bg-gradient-info flex-fill">
                <div class="icon icon-lg icon-shape icon-shape-info bg-white text-info shadow rounded-circle">
                    <i class="fas fa-users"></i>
                </div>
                <h6 class="info-title text-white">
                    Profile Pods
                </h6>
                <small class="text-white"><strong>Profile Pods:</strong> list, filter, edit, create, delete.</small>
            </div>
        </a>

        <a href="/tags/show" class="col-md-4 mb-3 d-flex">
            <div class="info bg-gradient-success flex-fill">
                <div class="icon icon-lg icon-shape icon-shape-success bg-white text-success shadow rounded-circle">
                    <i class="fas fa-tags"></i>
                </div>
                <h6 class="info-title text-white">
                    Skill Tags
                </h6>
                <small class="text-white"><strong>Skill Tags:</strong> list, filter, edit, create, delete.</small>
            </div>
        </a>

        @if($impressum != null)
            <a href="/impressum/edit/{{ $impressum->id }}" class="col-md-4 mb-3 d-flex">
                <div class="info bg-gradient-default flex-fill">
                    <div class="icon icon-lg icon-shape icon-shape-default bg-white text-default shadow rounded-circle">
                        <span class="display-3">&sect;</span> 
                    </div>
                    <h6 class="info-title text-white">
                        Impressum
                    </h6>
                    <small class="text-white"><strong>Impressum page:</strong> Edit</small>
                </div>
            </a>
            @else
            <a href="/impressum/create" class="col-md-4 mb-3 d-flex">
                <div class="info bg-gradient-default flex-fill">
                    <div class="icon icon-lg icon-shape icon-shape-default bg-white text-default shadow rounded-circle">
                        <span class="display-3">&sect;</span> 
                    </div>
                    <h6 class="info-title text-white">
                        Impressum
                    </h6>
                    <small class="text-white"><strong>Impressum page:</strong> Create, Edit</small>
                </div>
            </a>
        @endif
        
        @if($cookie != null)
            <a href="/cookie-policy/edit/{{ $cookie->id }}" class="col-md-4 mb-3 d-flex">
                <div class="info bg-gradient-warning flex-fill">
                    <div class="icon icon-lg icon-shape icon-shape-warning bg-white text-warning shadow rounded-circle">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h6 class="info-title text-white">
                        Data-Cookie Policy
                    </h6>
                    <small class="text-white"><strong>Data-Cookie Policy page:</strong> Edit</small>
                </div>
            </a>
            @else
            <a href="/cookie-policy/create" class="col-md-4 mb-3 d-flex">
                <div class="info bg-gradient-warning flex-fill">
                    <div class="icon icon-lg icon-shape icon-shape-warning bg-white text-warning shadow rounded-circle">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h6 class="info-title text-white">
                        Create Data-Cookie Policy Page
                    </h6>
                    <small class="text-white"><strong>Data-Cookie Policy page:</strong> Create, Edit</small>
                </div>
            </a>
        @endif

        <a href="/language/show" class="col-md-4 mb-3 d-flex">
            <div class="info bg-gradient-danger flex-fill">
                <div class="icon icon-lg icon-shape icon-shape-danger bg-white text-danger shadow rounded-circle">
                    <i class="fas fa-language"></i>
                </div>
                <h6 class="info-title text-white">
                    Languages
                </h6>
                <small class="text-white"><strong>Languages:</strong> list, edit, create, delete.</small>
            </div>
        </a>

        <a href="/admin/mail" class="col-md-4 mb-3 d-flex">
            <div class="info bg-gradient-info flex-fill">
                <div class="icon icon-lg icon-shape icon-shape-info bg-white text-info shadow rounded-circle">
                    <i class="fas fa-envelope"></i>
                </div>
                <h6 class="info-title text-white">
                    Send E-Mail
                </h6>
                <small class="text-white"><strong>Email:</strong> Send E-mail to Company</small>
            </div>
        </a>

    </div>
</div>

@endsection