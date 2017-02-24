@extends('layouts.master')

@section('title')
    Register | MangoHacks. A Hackathon at Florida Intenational University
@endsection

@section('header-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    @include('partials.theme_headmeta')
@endsection

@section('body-class', 'class=register')

@section('menu')
    <div class="nav">
        <div class="nav-content">
            <a href="/" class="logo">
                <img class="responsive-image" src="/img/logo.png" alt="MangoHacks">
            </a>
            <div class="menu mangoReveal">
                <a href="#about">About</a>
                <a href="/#faq">FAQs</a>
                <a href="/#schedule">Schedule</a>
                <a href="/#sponsors">Sponsors</a>
            </div>
            <a class="mobile-trigger active" href="#" id="small-menu"><i class="fa fa-bars"></i></a>
            <a class="mobile-close" href="#"><i class="fa fa-times"></i></a>
        </div>
    </div>
@endsection

@section('content')
    <section class="section jumbo global-base-gradient">
        <div class="container">
            <h1>Register</h1>
        </div>
    </section>

    <section class="section form extra-padding">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register-late" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <h1 class="heading global-secondary-color generalReveal">Basics</h1>

                <div class="form-group generalReveal">
                    <label for="first_name">First Name <sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="John" name="first_name" id="first_name" value="{{ old('first_name') }}">
                </div>

                <div class="form-group generalReveal">
                    <label for="last_name">Last Name <sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="John" name="last_name" id="last_name" value="{{ old('last_name') }}">
                </div>

                <div class="form-group generalReveal">
                    <label for="email">Email <sup>*</sup></label>
                    <input class="form-control" required type="email" placeholder="ada@lovelace.edu" value="{{ old('email') }}" name="email" id="email">
                </div>

                <br>
                <h1 class="heading global-secondary-color generalReveal">Education Details</h1>

                <div class="form-group generalReveal">
                    <label for="school_name">What school do/did you attend? <sup>*</sup></label>
                    <select class="form-control school-select" name="school_name" id="school_name">
                        <option value="">Select your school</option>
                        @include('partials.schools_options')
                    </select>
                </div>

                <div class="form-group generalReveal">

                    <label for="school_year">Current Year? <sup>*</sup></label>
                    <select class="form-control" name="school_year" id="school_year">
                        <option {{ old('school_year') == "freshman" ? "selected" : "" }} value="freshman">Freshman</option>
                        <option {{ old('school_year') == "sophomore" ? "selected" : "" }} value="sophomore">Sophomore</option>
                        <option {{ old('school_year') == "junior" ? "selected" : "" }} value="junior">Junior</option>
                        <option {{ old('school_year') == "senior" ? "selected" : "" }} value="senior">Senior</option>
                        <option {{ old('school_year') == "seniorplus" ? "selected" : "" }} value="seniorplus">"Super Senior"</option>
                        <option {{ old('school_year') == "gradstudent" ? "selected" : "" }} value="gradstudent">Grad Student</option>
                        <option {{ old('school_year') == "graduated" ? "selected" : "" }} value="graduated">Gratuated recently</option>
                    </select>
                </div>

                <div class="form-group generalReveal">
                    <label for="school_major">Major/Concentration <sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="Computer Science" name="school_major" id="school_major" value="{{ old('school_major') }}">
                </div>

                <br>
                <h1 class="heading global-secondary-color generalReveal">About you</h1>

                <div class="form-group generalReveal">
                    <label>Will this be your first hackathon? <sup>*</sup></label>
                    <div class="radio-group">
                        <label class="radio-inline">
                            <input type="radio" name="first_hackathon" value="yes" id="yes">
                            Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="first_hackathon" value="no" id="no">
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group generalReveal">
                    {{ old('shirt_shite') }}
                    <label for="shirt_size">Shirt Size <sup>*</sup></label>
                    <select class="form-control" name="shirt_size" required>
                        <option value="" disabled></option>
                        <option {{ old('shirt_size') == "m-s" ? "selected" : "" }} value="m-s">Men's Small</option>
                        <option {{ old('shirt_size') == "m-m" ? "selected" : "" }} value="m-m">Men's Medium</option>
                        <option {{ old('shirt_size') == "m-l" ? "selected" : "" }} value="m-l">Men's Large</option>
                        <option {{ old('shirt_size') == "m-xl" ? "selected" : "" }} value="m-xl">Men's XL</option>
                        <option {{ old('shirt_size') == "m-2xl" ? "selected" : "" }} value="m-2xl">Men's XXL</option>
                        <option {{ old('shirt_size') == "m-3xl" ? "selected" : "" }} value="m-3xl">Men's XXXL</option>
                        <option {{ old('shirt_size') == "w-s" ? "selected" : "" }} value="w-s">Women's Small</option>
                        <option {{ old('shirt_size') == "w-m" ? "selected" : "" }} value="w-m">Women's Medium</option>
                        <option {{ old('shirt_size') == "w-l" ? "selected" : "" }} value="w-l">Women's Large</option>
                        <option {{ old('shirt_size') == "w-xl" ? "selected" : "" }} value="w-xl">Women's XL</option>
                    </select>
                </div>

                <div class="form-group generalReveal">
                    <label for="dietary">Dietary Restrictions</label>
                    <textarea class="form-control" type="text" placeholder="Please explain your food allergies or unique dietary needs here." name="dietary" id="dietary" value="{{ old('dietary') }}"></textarea>
                </div>

                <br>
                <h1 class="heading global-secondary-color generalReveal">Legal Stuff</h1>

                <div class="form-group generalReveal mb-lg">
                    <label>MLH Code of Conduct <sup>*</sup></label>
                    <div class="checkbox">
                        <label>
                            <input required type="checkbox" name="mlh_coc" value="yes" id="yes">
                            I will abide by the <a target="_blank" href="https://static.mlh.io/docs/mlh-code-of-conduct.pdf">MLH Code of Conduct</a> for the duration of this event.
                        </label>
                    </div>
                </div>

                <div class="form-group generalReveal mb-lg">
                    <label>MLH Terms And Conditions <sup>*</sup></label>
                    <div class="checkbox">
                        <label>
                            <input required type="checkbox" name="mlh_privacy" value="yes" id="yes">
                            I agree to the terms of both the <a target="_blank" href="https://github.com/MLH/mlh-policies/tree/master/prize-terms-and-conditions">MLH Contest Terms and Conditions</a>
                            and the <a target="_blank" href="https://mlh.io/privacy">MLH Privacy Policy</a>. Please note that you may receive pre and
                            post-event informational e-mails and occasional messages about hackathons from MLH as per the MLH Privacy Policy.
                        </label>
                    </div>
                </div>

                <button style="font-size: 1.2em; color: white;" class="button btn global-accent-bg" type="submit">Register</button>
            </form>

        </div>
    </section>

@endsection

@section('footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/js/register.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var $nav = $('.nav .menu');

            $('.nav').sticky();

            $(".school-select").select2({
                placeholder: "Select your school"
            });

            $('.mobile-trigger').on('click',function (e) {
                e.preventDefault();
                if(!$nav.hasClass('active')){
                    $nav.addClass('active');
                    $('.mobile-trigger').removeClass('active');
                    $('.mobile-close').addClass('active');
                }
            });

            $('.mobile-close').on('click', function(e){
                e.preventDefault();
                if($nav.hasClass('active')){
                    $nav.removeClass('active');
                    $('.mobile-trigger').addClass('active');
                    $('.mobile-close').removeClass('active');
                }
            });

            $(document).on('change', ':file', function() {
                var input = $(this),
                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            $(':file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
        });
    </script>
@endsection