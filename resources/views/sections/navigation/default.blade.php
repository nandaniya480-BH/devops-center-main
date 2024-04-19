<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-xl-6">
        <div class="navbar-translate">
            <a class="navbar-brand mr-lg-1" href="/">
                <img style="height: 20px; mix-blend-mode: multiply; margin-top: -7px" class="img-fluid" src="{{ asset('img/logo/logo-primary.jpeg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-header-6"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-between pl-xl-6" id="example-header-6">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-8 collapse-brand">
                        <a class="navbar-brand mr-lg-1" href="/">
                            <img style="height: 20px; mix-blend-mode: multiply; margin-top: -7px" class="img-fluid" src="{{ asset('img/logo/logo-primary.jpeg') }}">
                        </a>
                    </div>
                    <div class="col-4 collapse-close text-right">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#example-header-6" aria-controls="navigation-index" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        {{ __('navigation')['homepage'] }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">
                        {{ __('navigation')['services'] }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile-list">
                        {{ __('navigation')['profile'] }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">
                        {{ __('navigation')['about_us'] }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/career/jobs/list">
                        {{ __('navigation')['career'] }}
                    </a>
                </li>
                <li class="nav-item">
                    <a id="contact-us-btn" class="nav-link" href="/#contact-us">
                        {{ __('navigation')['contact'] }}
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://www.linkedin.com/company/devops-center/">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fab fa-xing"></i>
                    </a>
                </li> -->
                <li class="nav-item">
                    @if(Config::get('app.locale') == 'en')
                        <a class="nav-link" href="/change-language/de">
                            <img src="{{ asset('img/flag/ch-de.svg') }}" alt="" class="img-fluid" style="width: 17.5px; height: 15px; margin-top: -2px" />
                            CH <small>(DE)</small>
                        </a>
                    @else
                        <a class="nav-link" href="/change-language/en">
                            <img src="{{ asset('img/flag/uk.svg') }}" alt="" class="img-fluid" style="width: 17.5px; height: 15px; margin-top: -2px" />
                            EN
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>