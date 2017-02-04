@extends('layouts.master')

@section('title')
    You've Registered | MangoHacks. A Hackathon at Florida Intenational University
@endsection

@section('header-content')
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
            <h1>You've registered!</h1>
        </div>
    </section>

    <section class="section form extra-padding">
        <div class="container">
            @if (session('name'))
                <h1>Thanks {{session('name', '')}}!</h1>

                <h2>
                    You've successful registered. We'll be sending out confirmations soon.
                    So for now keep an eye on your email or you can also <a href="/sweetener"><strong>sweeten yourself</strong></a>.
                </h2>

                <a href="/">Return home &rarr;</a>
            @endif
        </div>
    </section>

@endsection

@section('footer-scripts')
    <script src="/js/register.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var $nav = $('.nav .menu');

            $('.nav').sticky();

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
        });
    </script>
@endsection