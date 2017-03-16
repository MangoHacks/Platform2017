@extends('layouts.master')

@section('title')
    Live Updates | MangoHacks '17
@endsection

@section('header-content')
    @include('partials.theme_headmeta')
<style>
.countdown-container {
    text-align: center;
    font-size: 1.2em;
}
.countdown-container h1.heading {
    font-size: 2.5em;
    margin: 10px 0 30px;
}
.section.links a.button{
    color: white;
    padding: 5px 50px;
    margin-bottom: 10px;    
}
</style>
@endsection

@section('body-class', 'class=live')

@section('menu')
    <div class="nav">
        <div class="nav-content">
            <a href="/" class="logo">
                <img class="responsive-image" src="/img/logo.png" alt="MangoHacks">
            </a>
            <div class="menu">
                <a href="#about">Home</a>
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
<div id="app">
    <section class="section jumbo global-base-gradient">
        <div class="container countdown-container">
            <h1 class="countdown heading">0:00</h1>
                <p class="countdown-sub">
                    @{{ subtitle }}
                </p>
                <a style="color: white;" class="button global-accent-bg" href="http://expo.mangohacks.com">Table Assignment</a>
        </div>
    </section>
    <div class="section links">
        <div class="container">
            {{-- <a href="#reminders" class="button global-accent-bg">Reminders</a> --}}
            {{-- <a href="#map" class="button global-accent-bg">Venue Map</a> --}}
            <a href="http://slack.mangohacks.com" target="_blank" class="button global-accent-bg">Request Slack Invite</a>
            <a href="http://mangohacks17.devpost.com/" target="_blank" class="button global-accent-bg secondary">Devpost</a>
            <a href="https://www.facebook.com/groups/1714565285540802/" target="_blank" class="button global-accent-bg secondary">Facebook Group</a>
            <a href="http://hardware.mlh.io" target="_blank" class="button global-accent-bg secondary">MLH Hardware Request</a>
        </div>
    </div>
    <section class="section extra-padding">
        <div class="container">
            <div class="grid">
                <div class="row">
                    <div class="col-6 updates">
                        <h2 class="global-accent-bg">Updates</h2>
                        <div class="updates-wrap">
                            <div v-for="update in updates" class="update-item">
                                <h3 class="title">@{{ update.title }}</h3>
                                <h5 class="date">@{{ update.starttime.format('MMM DD, LT') }}</h5>
                                <p>
                                    @{{ update.subtitle }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 schedule">
                        <h2 class="global-accent-bg">Schedule</h2>
                        <div class="program-wrap">
                            <div v-for="entry in schedule_entries" class="schedule-item">
                                <div class="global-accent-color time">
                                    @{{ entry.starttime.format('MMM DD') }} <br>
                                    @{{ entry.starttime.format('LT') }}
                                </div>
                                <div class="dets">
                                    <h3 class="title">@{{ entry.title }}</h3>
                                    <h5 class="location">@{{ entry.subtitle }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container" id="map">
            <br><br><br>
            <h2 class="heading mb-lg">Venue Map</h2>
            <a href="/img/map2.jpg"><img class="responsive-image" src="/img/map2.jpg" alt=""></a>
        </div> --}}
    </section>
    </div>
@endsection


@section('footer-scripts')
    <script src="/js/live.js" type="text/javascript"></script>
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
