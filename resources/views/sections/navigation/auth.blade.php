<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-xl-6">
        <div class="navbar-translate">
            <a class="navbar-brand mr-lg-1" href="/">
                <img style="height: 20px; mix-blend-mode: multiply" class="img-fluid"
                    src="{{ asset('img/logo/logo-primary.jpeg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-header-6"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse  justify-content-between pl-xl-6" id="example-header-6">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a>
                            DevOps <span> Center </span>
                        </a>
                    </div>
                    <div class="col-6 collapse-close text-right">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#example-header-6" aria-controls="navigation-index" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav mx-auto">
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @php
                        $user=Auth::user();
                    @endphp
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="fas fa-user"></i>
                            <span class="nav-link-inner--text"><?php echo e($user->name); ?> <i
                                    class="fas fa-angle-down"></i></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin">
                                <i class="fas fa-columns"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="/get-language-json/en">
                                <i class="fas fa-language"></i>
                                Language EN
                            </a>
                            <a class="dropdown-item" href="/get-language-json/de">
                                <i class="fas fa-language"></i>
                                Language DE
                            </a>
                            <a class="dropdown-item" href="/get-language-json/tech">
                                <i class="fas fa-cogs"></i>
                                Tech Stack
                            </a>
                            <a class="dropdown-item" href="/logout">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">
                            <i class="fas fa-user"></i>
                            <span class="nav-link-inner--text">Account</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
