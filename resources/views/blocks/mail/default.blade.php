<div class="col-12 col-md-10 text-left mx-auto mt-3">
    <div class="accordion" id="accordionExample">
        <div class="row">
            <div class="col-12" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-default btn-round text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ __('profile_description_page')['contact_us_button_text'] }}
                        <i class="fas fa-envelope"></i>
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse col-12" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class=" opacity-8">
                    <div class="row pt-3">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <span class="badge badge-default">
                                {{ __('profile_description_page')['contact_form_badge'] }}
                            </span>
                            <h1 class="title mb-3">{{ __('profile_description_page')['contact_form_title'] }}</h1>
                        </div>
                    </div>
                    <div id="contact-form" class="card bg-secondary p-3">
                        <div id="loader" hidden style="min-height: 100%; display: flex; align-items: center" class="row justify-content-center">
                            <div class="col-2">
                                <img src="{{ asset('img/loader.gif') }}" class="img-fluid"
                                    alt="loader">
                            </div>
                        </div>
                        <div id="form-container">
                            <form id="contact-us">
                                @if(isset($item))
                                <input type="hidden" id="profile_number" name="profile_number"
                                    value="{{ Crypt::encryptString($item->item_profile_number ) }}">
                                @endif
                                <div class="form-group">
                                    <label>{{ __('profile_description_page')['contact_form_name_label'] }}</label>
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
                                        <small>Please verify that you're not a robot!</small><br><br>
                                    </div>
                                    <div class="col-lg-6 ml-auto">
                                        <button id="submit" disabled
                                            type="submit"
                                            class="btn btn-default pull-right g-recaptcha">
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
                "subject": "New Profile Pod Request",
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