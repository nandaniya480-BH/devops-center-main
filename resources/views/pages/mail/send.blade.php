@extends('layouts.auth')

@section('content')

<section class="blogs-3 bg-secondary pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-left">
                <h3 class="text-center mb-3 display-3">Send an E-mail</h3>
                <div id="contact-form" class="card bg-secondary opacity-8 p-3">
                    <div id="loader" hidden style="min-height: 100%; display: flex; align-items: center" class="row justify-content-center">
                        <div class="col-2">
                            <img src="{{ asset('img/loader.gif') }}" class="img-fluid"
                                alt="loader">
                        </div>
                    </div>
                    <div id="form-container">
                        <form id="contact-us">
                            <div class="form-group">
                                <label>E-mail Subject:</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="subject" id="subject" required 
                                    class="form-control" placeholder="Type your Mail Subject here ...">
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
                                <div class="col-md-6 ml-auto">
                                    <button id="submit"
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
</section>


<script>
    $(document).ready(function () {
        
        $('#contact-us').submit(function (e) {
            e.preventDefault();
            var subject = $('#subject').val();
            var email = $('#email').val();
            var emailMessage = $('#email-message').val();
            var contactFormHeight = $('#contact-form').outerHeight();
            $('#loader').attr('hidden', false);
            $('#form-container').hide();
            $('#loader').height(contactFormHeight);

            $.post("/admin/mail/send",
            {
                "_token": "{{ csrf_token() }}",
                "subject": subject,
                "email": email,
                "email_message": emailMessage
            },
            function(result){
                $('#contact-form').html(result);
            });
        });
    });
</script>

@endsection


