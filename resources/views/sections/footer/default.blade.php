<div class="mt-5">
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12 text-center mb-3">
                    <div class="navbar-translate">
                        <a class="navbar-brand mr-lg-1" href="/">
                            <img style="height: 20px; mix-blend-mode: multiply" src="{{ asset('img/logo/logo-primary.jpeg') }}">
                        </a>
                    </div>
                    <div class="col-md-12 mb-3 mt-4">
                        <ul class="nav nav-footer justify-content-center">
                            <li class="nav-item">
                                <a href="/" class="nav-link">{{ __('navigation')['homepage'] }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/about-us" class="nav-link">{{ __('navigation')['about_us'] }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/profile-list" class="nav-link">{{ __('navigation')['profile'] }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/career/jobs/list" class="nav-link">{{ __('navigation')['career'] }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/impressum" class="nav-link" >{{ __('navigation')['impressum'] }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="/cookie-policy" class="nav-link" >{{ __('navigation')['cookie-policy'] }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 text-center mb-3">
                        <div class="description opacity-8">
                        {!! html_entity_decode(__('footer')['description'])!!}
                    </div>
                        <ul class="nav nav-footer justify-content-center mt-3 opacity-7">
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="https://www.linkedin.com/company/devops-center/">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="d-md-none d-xs-block col-12 text-left justity-content-center">
                            <div class="text-center d-flex flex-column mt-5">
                                <span class="mr-6" style="font-weight: 600; font-size: 14px">Mitgliedschaft</span>
                                <a target="_blank" href="https://www.swissict.ch/"><img style="height: 75px; mix-blend-mode: multiply" src="{{ asset('img/about-us/swissict-logo.svg') }}"></a>
                            </div>
                        </div>
                        <div class="copyright">
                            <hr style="width: 100%">
                            &copy; <span id="current-date"></span> <a href="" target="_blank">DevOps-Center</a>.
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 d-none d-md-flex d-lg-flex  text-left align-items-center">
                    <div class="col-12">
                        <span style="font-weight: 600; font-size: 14px">Mitgliedschaft</span><br>
                        <a target="_blank" href="https://www.swissict.ch/"><img class="img-fluid" style="mix-blend-mode: multiply" src="{{ asset('img/about-us/swissict-logo.svg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div id="cookie_banner" hidden="true" class="cookie-banner container">
    <div class="row">
        <div id="consent_popup" class="cookie-banner alert alert-default col-md-12 col-11" role="alert">
            <div class="col-12 text-right">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row justify-content-center d-flex">
                <span class="alert-inner--text col-md-10 col-12">
                    {!! html_entity_decode(__('cookie_policy')['message'])!!}
                </span>
                <div class="justify-content-start mt-2 align-self-center text-left col-12 col-md-2">
                    <button type="button" onclick="storeConsent()" class="btn btn-sm accept align-middle"  data-dismiss="alert" aria-label="Close">
                        {!! __('cookie_policy')['button'] !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Cookie Popup -->
<script>
    $(document).ready(function(){
       var currentDate =  new Date($.now());

       $('#current-date').html(currentDate.getFullYear());
    });
    function storeConsent() {
        sessionStorage.setItem("cookie_consent", true);
    }
    $(document).ready(function() {
        console.log('Session: ', sessionStorage.getItem("cookie_consent"));
        if(sessionStorage.getItem("cookie_consent") == 'false' || sessionStorage.getItem("cookie_consent") == null){
            $('#cookie_banner').attr('hidden', false);
        }
    });

</script>