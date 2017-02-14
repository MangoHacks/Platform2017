@extends('layouts.master')

@section('title')
    Confirm your spot | MangoHacks '16
@endsection

@section('header-content')
    @include('partials.theme_headmeta')
@endsection

@section('head_actions')
    <style>
        .tracks-wrap:after {
            background: rgba(32, 176, 86, 0.9);
        }
        @media (min-width: 490px){
            .tracks-wrap {
                padding: 100px 0;
            }
        }
    </style>
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
            <h1 class="heading">Boom! You're coming to MangoHacks {{ $attendee['first_name'] }}!</h1>
        </div>
    </section>
    <section class="section extra-padding">
        <div class="container">
            <h3>
                We can't wait to have you here!
            </h3>

            <h3>Keep an eye for updates on your email as we get closer to the event.</h3>

            <h3>
                If you haven't already done it, join the other hackers in the
                <a href="https://www.facebook.com/groups/1714565285540802/">MangoHacks '17 Attendees Facebook group.</a>
            </h3>

            <h3>See you soon!</h3>
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