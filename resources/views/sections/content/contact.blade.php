<div id="contact-us"  class="contactus-1 bg-white">
    <div class="container pt-5 pb-5">
        {{-- <h2 class="display-1 text-center mb-5">{{ __('homepage')['contact_section_header'] }}</h2> --}}
        <div class="row">
            <div class="col-lg-4 col-md-5 d-flex justify-content-center flex-column mb-3">
                <h2 class="title">{{ __('homepage')['contact_section_title'] }}</h2>
                <h4 class="description">
                    {{ __('homepage')['contact_section_description'] }}
                </h4>
                <div class="info info-horizontal">
                    <div class="icon icon-shape icon-shape-primary shadow rounded-circle text-white ">
                        <i class="fas fa-map text-primary"></i>
                    </div>
                    <div class="description">
                        {{-- <h4 class="info-title">{{ __('homepage')['contact_section_address_label'] }}</h4> --}}
                        <p class="description ml-3">
                            {!! html_entity_decode(__('homepage')['contact_section_address'])!!}
                        </p>
                    </div>
                    <hr class="m-0 p-0">
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-shape icon-shape-primary shadow rounded-circle text-white">
                        <i class="fas fa-mobile-alt text-primary"></i>
                    </div>
                    <div class="description">
                        {{-- <h4 class="info-title ">{{ __('homepage')['contact_section_telephone_label'] }}</h4> --}}
                        <p class="description ml-3">
                            <a href="tel:">
                                <i class="fas fa-phone "></i>
                                {{ __('homepage')['contact_section_telephone'] }}
                            </a>
                        </p>
                    </div>
                    <hr class="m-0 p-0">
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-shape icon-shape-primary shadow rounded-circle text-white">
                        <i class="fas fa-envelope text-primary"></i>
                    </div>
                    <div class="description">
                        {{-- <h4 class="info-title ">{{ __('homepage')['contact_section_email_label'] }}</h4> --}}
                        <p class="description ml-3">
                            <a href="mailto:info@devops-center.ch">
                                <i class="fas fa-envelope-open-text"></i>
                                {{ __('homepage')['contact_section_email'] }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 ml-auto mr-auto">
                <div id="contact-form" class="card bg-secondary opacity-8 p-3">
                    <div id="loader" hidden style="min-height: 100%; display: flex; align-items: center" class="row justify-content-center">
                        <div class="col-2">
                            <img src="{{ asset('img/loader.gif') }}" class="img-fluid"
                                alt="loader">
                        </div>
                    </div>
                    <div id="form-container">
                        <form id="contact-us">
                            <input type="hidden" id="profile_number" name="profile_number"
                                value="{{ Crypt::encryptString('E-mail directly from Homepage') }}">
                            <div class="form-group">
                                {{-- <label>{{ __('profile_description_page')['contact_form_name_label'] }}</label> --}}
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" id="name" required class="form-control" placeholder="{{ __('profile_description_page')['contact_form_name_placeholder'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('profile_description_page')['contact_form_email_label'] }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" name="email" id="email" required class="form-control" placeholder="{{ __('profile_description_page')['contact_form_email_placeholder'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('profile_description_page')['contact_form_email_message_label'] }}</label>
                                <textarea name="email_message" class="form-control form-control-alternative"
                                    id="email-message" rows="10" required placeholder="{{ __('profile_description_page')['contact_form_email_message_placeholder'] }}"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ml-auto">
                                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-type="image" data-sitekey="6LfTfRkhAAAAACuwJvNQFyefUWfy_IxVPI5x9Why"></div>
                                     <small>Please verify that you're not a robot!</small> <br><br>
                                </div>
                                <div class="col-lg-6 ml-auto">
                                    <button id="submit" disabled
                                        type="submit"
                                        class="btn btn-default pull-right">
                                        {{ __('profile_description_page')['contact_form_submit_button_text'] }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function recaptchaCallback() {
        $('#submit').removeAttr('disabled');
    };
    $(document).ready(function () {
        

        $('#contact-us').submit(function (e) {
            e.preventDefault();
            var encryptedProfileNr = $('#profile_number').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var emailMessage = $('#email-message').val();
            var contactFormHeight = $('#contact-form').outerHeight();
            $('#loader').attr('hidden', false);
            $('#form-container').hide();
            $('#loader').height(contactFormHeight);

            $.post("/contact-us",
            {
                "_token": "{{ csrf_token() }}",
                "profile_number": '"' + encryptedProfileNr + '"',
                "subject": "New Message",
                "name": name,
                "email": email,
                "email_message": emailMessage
            },
            function(result){
                $('#contact-form').html(result);
            });
        });
    });
</script>
