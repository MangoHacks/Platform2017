@extends('layouts.master')

@section('title')
    MangoHacks | A Hackathon at Florida Intenational University
@endsection

@section('header-content')
    @include('partials.theme_headmeta')
@endsection

@section('body-class', 'class=home')

@section('menu')
<div class="nav">
    <div class="nav-content">
        <a href="#" class="logo">
            <img class="responsive-image" src="/img/logo.png" alt="MangoHacks">
        </a>
        <div class="menu mangoReveal">
            <a href="#about">About</a>
            <a href="#faq">FAQs</a>
            <a href="#schedule">Schedule</a>
            <a href="#sponsors">Sponsors</a>
            <a href="/register">Register</a>
        </div>
        <a class="mobile-trigger active" href="#" id="small-menu"><i class="fa fa-bars"></i></a>
        <a class="mobile-close" href="#"><i class="fa fa-times"></i></a>
    </div>
</div>
@endsection

@section('content')

    <section class="hero">
        <svg width="1024" height="640" viewBox="0 0 1024 640" id="duotone" preserveAspectRatio="xMidYMid slice">
            <defs>
                <filter id="duotone-filter">
                    <feColorMatrix
                            type="matrix"
                            id="duoToneMatrix"
                            values="1  0  0  0  0
                        1  0  0  0  0
                        1  0  0  0  0
                        0  0  0  1  0"/>
                </filter>
            </defs>
        </svg>
        <div class="hero-image-wrap">
            <img class="hero-image" style="-webkit-filter: url('#duotone-filter'); filter: url('#duotone-filter');" src="/img/heros/{{$hero["filename"]}}" />
        </div>
        <div class="hero-overlay__tint global-accent-bg"></div>
        <div class="hero__circles">
            <div class="hero__circle global-hero-bg circle__1"></div>
            <div class="hero__circle global-hero-bg circle__2"></div>
            <div class="hero__circle global-hero-bg circle__3"></div>
        </div>
        <div class="hero-overlay">
            <div class="event-info">
                <div class="top">
                <div class="logo">
                    <svg id="the-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 270.6 198">
                        <style type="text/css">
                            .body{fill:none;stroke:rgb({{ $colors['mango-color'][0] }});stroke-width:18;stroke-linecap:round;stroke-miterlimit:10;}
                            .leaf{fill:none;stroke:rgb({{ $colors['mango-color'][0] }});stroke-width:18;stroke-linecap:round;stroke-miterlimit:10;}
                            .line{fill:none;stroke:rgb({{ $colors['mango-color'][0] }});stroke-width:17;stroke-linecap:round;stroke-miterlimit:10;}
                            .dot{fill:rgb({{ $colors['mango-color'][0] }});}
                            .st2{fill:none;stroke:rgb({{ $colors['mango-color'][0] }});stroke-width:8;stroke-linecap:round;stroke-miterlimit:10;}
                        </style>
                        <defs>
                            <filter id="goo" height="300%" y="-100%">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur" />
                                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 17 -7"/>
                            </filter>
                        </defs>
                        <g id="mangoGroup">
                            <path id="logo__leaf" class="leaf" d="M240.6,167.4c0,0-16.3-5.6-33-32.5C223,114.2,227,92,220.8,70c-3.1-11.1-7.6-20.9-13.1-29.2
                                c2.1-1.1,4.3-2,6.6-2.5c19.2-4.2,40.7,11.1,46.2,44C267.3,123,240.6,167.4,240.6,167.4z"/>
                            <path id="logo__body" class="body" d="M207.5,134.9c-8.5,11.3-20.4,22.2-36,32.3c-19.7,12.8-41.9,19.3-87.3,21.8
                                c-20.8,1.2-60.6-13.1-72.6-40.3c-4.2-9.5-3.9-24.2,4.4-30.1C51.4,93.4,80.8,22.6,126.9,11.7c34.9-8.3,63.4,3,80.8,29.2
                                c5.5,8.3,9.9,18.1,13.1,29.2C227,92,223,114.2,207.5,134.9z"/>
                            <path id="logo__line" class="line" d="M71.6,157.1c0,0,65.9,2.3,98-30.6"/>
                            <path id="logo__dot" class="dot" d="M184.8,115c9.7,0,9.7-15,0-15C175.2,100,175.2,115,184.8,115L184.8,115z"/>
                        </g>
                        <g id="splatLineGroup" filter="url(#goo)">
                            <line class="st2" x1="184.8" y1="107.5" x2="184.8" y2="56.6"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="220.5" y2="71.8"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="235.7" y2="107.5"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="221" y2="143.7"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="184.8" y2="158.6"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="149.1" y2="143.3"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="135.4" y2="107.5"/>
                            <line class="st2" x1="184.8" y1="107.5" x2="148.5" y2="71.2"/>
                        </g>
                    </svg>
                </div>
                <h1 class="name mangoReveal global-mango-color">MangoHacks</h1>
                <div class="when mangoReveal global-mango-color">
                    Florida International University / February 24-26, 2017
                </div>
                </div>
                <div class="action-buttons mangoReveal">
                    <a class="button global-hero-bg global-hero-color primary" href="/register">Register</a>
                    <a class="button secondary" href="mailto:team@mangohacks.com">Sponsor Us</a>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="section extra-padding about">
        <div class="container">
            <h1 class="heading global-accent-color generalReveal">About</h1>
            <p class="generalReveal">
                MangoHacks is a place for discovery. It is a 36 hour hackathon that encourages learning, collaboration, growth, innovation, and fun. We will welcome 250+ students from Florida and across the country, amazing mentors, and wonderful sponsors to create amazing things. MangoHacks is organized by students for students.
            </p>
        </div>
    </section>

    <section class="section what extra-padding global-base-gradient">
        <div class="container">
            <h1 class="heading global-secondary-color generalReveal">What is <br />MangoHacks?</h1>

            <p class="generalReveal">
                MangoHacks is a chance to meet new people, learn something, make something, dream along, and have fun.
            </p>
            <p class="generalReveal">
                Everyone is welcomed - from the most experienced hackers, designers, and builders to the thinkers and the curious who have never heard of a hackathon. Regardless of your experience, there is something for you at MangoHacks.
            </p>
            <p class="generalReveal">
                We’d love for you to come learn something new, take the things you love (sports, art, traveling, dogs!) or care about (poverty, sea level rise, hunger) and combine them with techonology to make something different, something cool, or something to improve the world.
            </p>
            <p class="generalReveal">
                It'll be sweet. We Promise.
            </p>
        </div>
        <span class="home--decoration home--decoration_what global-secondary-gradient"></span>
    </section>

    <section id="faq" class="section faqs">
        <div class="container">
            <h1 class="heading global-accent-color">FAQs</h1>
            <div class="faqs-cont">
                <div class="faq fw generalReveal">
                    <h3>What is a Hackathon?</h3>
                    <p>
                        Don’t worry, this is not the kind of place where you break into a bank or do something illegal.
                    </p>
                    <p>
                        A hackathon is a creative coding and invention marathon. Students come together with an idea or a passion, get into teams, and build that idea into something tangible in 36 hours. At the end of the hackathon, the teams will show what they built to judges and other participants.
                    </p>
                    <p>
                        A hackathon is an awesome place to push yourself, learn new skills, and meet amazing people
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>When and where?</h3>
                    <p>
                        MangoHacks ’17 will take place at Florida International University’s
                        PG6 Tech Station from February 24th to 26th. <a href="https://goo.gl/maps/iNav35kcQAN2">Get Directions</a>
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>How long is it?</h3>
                    <p>
                        People will arrive between 6pm and 8pm on Friday, February 24th. Hacking will
                        start at 10pm on Friday and go until 8am on Sunday, February 26th. Closing
                        ceremony will end by 1pm on Sunday.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Who can come?</h3>
                    <p>
                        Anyone who is currently a college student or who graduated in the past
                        year is welcome to participate. If it has been a while since you were a
                        student you can still participate as a mentor for the attendees.
                        <br>
                        <a targer="_blank" href="https://goo.gl/forms/wCSrsV6CP9ADeOgj2">Sign up to be a mentor</a>
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Food? Oh yeah</h3>
                    <p>
                        Lots of it. Free, too! We’ll make you feel right at home. Enough food to
                        keep you going for the entire 36 hours and then some. Caffeine, energy drinks,
                        snacks and all. We’ve got you. If you have special needs, it’s all good too.
                        Did we mention there’ll be lots of food?
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>How much does it cost?</h3>
                    <p>
                        ZERO! FREE! Nada. Zip. $0. Everything we provide will be free, so
                        you only need to worry about what you’ll achieve during the weekend.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>What do I need to bring?</h3>
                    <p>
                        You’ll need an ID and the stuff you’ll need throughout the weekend.
                        Laptop, chargers, phone, the basics. You’ll probably also want to bring
                        some basic hygiene products (toothbrush/toothpase, deodorant, a change
                        of clothes) and anything to keep you fresh through the weekend. A sleeping
                        bag might be cool, too, if you plan on getting some sleep.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>How much experience do I need?</h3>
                    <p>
                        Don’t be afraid if you don’t think you have enough experience, a team or an idea.
                        A hackathon is a great place for learning. We’ll have great mentors and tools to help you with
                        development, ideas, and everything in between as well as tons of workshops where you can
                        pick up all kinds of skills.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>What’s the deal with teams?</h3>
                    <p>
                        It’s no biggie. You can hack solo, but the more the merrier.
                        You can join a team of up to four people. You don’t need to have a team
                        ready before the event - there will be amazing people who you can join at
                        the event. If you have some friends in mind though, you’re more than welcome
                        to stay together.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>How do I get there?</h3>
                    <p>
                        Driving, Flying, Swimming… however you can! We’d love to have anyone who really
                        wants to come, and if you need help figuring out a way that works, let us know at <a href="mailto:team@mangohacks.com">team@mangohacks.com</a>.
                    </p>
                    <p>
                        Unfortunately, we will <strong>not</strong> be able provide individual travel reimbursements this year.
                    </p>
                    <p>
                        We encourage car pooling and a good ol' read tip. However, keep an eye out for info on buses coming to North Florida schools. Schools with the most registrations
                        are more likely to get a bus, so get your friends to apply too.
                        <!-- <strong>However,</strong>
                        we are sending a bus to schools in North Florida and will make stops at the schools with
                        the most hackers, so get your friends to apply too. We also encourage car
                        pooling because who doesn’t love a road trip? -->
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Can I submit an older project?</h3>
                    <p>
                        We want MangoHacks to be a fair opportunity for everyone, so we ask that
                        no code that will be part of a project is written before the event. You’re
                        are welcome to come with an idea and a plan, though. Plus, making something
                        completely new is pretty sweet.
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Registration Process?</h3>
                    <p>
                        After you register we’ll send out confirmation emails in a rolling basis for you to reserve a spot.
                    </p>
                    <p>
                        Registration will be open until <strong>February 26th</strong>.
                    </p>
                </div>


                <div class="faq generalReveal">
                    <h3>Code of Conduct?</h3>
                    <p>
                        Bottom line? Be cool to people around you. <a target="_blank" href="http://static.mlh.io/docs/mlh-code-of-conduct.pdf">Read more.</a>
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Wait! What about...? </h3>
                    <p>
                        If you have any other questions, hit us up.
                        <a href="mailto:team@mangohacks.com">team@mangohacks.com</a>
                    </p>
                </div>

                <div class="faq generalReveal">
                    <h3>Soo, why Mango?</h3>
                    <p>
                        Mangoes are pretty sweet, and so are we.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="schedule" class="section schedule extra-padding global-base-gradient">
        <div class="container">
            <h1 class="heading global-secondary-color generalReveal">Schedule</h1>
            <div class="days">
                <div class="day generalReveal">
                    <h3>Friday</h3>
                    <ul class="times">
                        <li><span class="time global-accent-color">6:00pm</span> Registration</li>
                        <li><span class="time global-accent-color">8:00pm</span> Sponsorship Fair/Snack</li>
                        <li><span class="time global-accent-color">9:30pm</span> Opening Ceremony</li>
                        <li><span class="time global-accent-color">10:00pm</span> Hacking Begins</li>
                    </ul>
                </div>
                <div class="day generalReveal">
                    <h3>Saturday</h3>
                    <ul class="times">
                        <li><span class="time global-accent-color">12:00am</span> Midnight Snack</li>
                        <li><span class="time global-accent-color">8:00am</span> Breakfast</li>
                        <li><span class="time global-accent-color">12:30pm</span> Lunch</li>
                        <li><span class="time global-accent-color">6:00pm</span> Dinner</li>
                    </ul>
                </div>
                <div class="day generalReveal">
                    <h3>Sunday</h3>
                    <ul class="times">
                        <li><span class="time global-accent-color">6:30am</span> Breakfast</li>
                        <li><span class="time global-accent-color">8:00am</span> Submissions Due</li>
                        <li><span class="time global-accent-color">9:00am</span> Hacking Ends<li>
                        <li><span class="time global-accent-color">10:00am</span> Expo Begins</li>
                        <li><span class="time global-accent-color">1:00pm</span> Closing Ceremony</li>
                    </ul>
                </div>
            </div>
            <div class="day workshops generalReveal">
                <h2>Workshop/Events</h2>
                <ul class="times">
                    <li>Soylent Pong, Cup Stacking, and more announced soon.</li>
                    <!-- <li>Relay For Life Events</li> -->
                </ul>
            </div>
        </div>

        <span class="home--decoration home--decoration_schedule global-secondary-gradient"></span>
    </section>

    <section id="sponsors" class="section sponsors">
        <div class="container">
            <h1 class="heading global-accent-color generalReveal">Sponsors</h1>

            <h2 class="interest generalReveal">Interested in Sponsoring Us? </h2>
            <p class="sell generalReveal">Email us at <a href="mailto:team@mangohacks.com">team@mangohacks.com</a> for more information!</p>

            <div class="grid generalReveal">
                <div class="row">
                    <div class="col-12">
                        <a class="logo-wrap" target="_blank" href="http://ibm.com">
                            <img style="padding: 10px 80px;" src="/img/logos/ibm.png" alt="IBM" class="logo">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a class="logo-wrap" target="_blank" href="http://statefarm.com">
                            <img class="logo" src="/img/logos/state_farm.png" alt="State Farm">
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="logo-wrap" target="_blank" href="http://careers.jpmorgan.com/careers/divisions/technology">
                            <img style="padding: 20px 30px;" class="logo" src="/img/logos/JPMC_logo.png" alt="JPMorgan Chase">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <a class="logo-wrap" target="_blank" href="http://cis.fiu.edu">
                            <img class="logo" src="/img/logos/scis.jpg" alt="FIU SCIS">
                        </a>
                    </div>
                    <div class="col-4">
                        <a class="logo-wrap" target="_blank" href="http://www.ultimatesoftware.com/">
                            <img class="logo" src="/img/logos/ultimate.jpg" alt="Soylent">
                        </a>
                    </div>
                    <div class="col-4">
                        <a class="logo-wrap" target="_blank" href="http://honors.fiu.edu/">
                            <img class="logo" src="/img/logos/fiuhonors.jpg" alt="FIU Honors College">
                        </a>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-4">--}}
                        {{--<a class="logo-wrap" target="_blank" href="http://www.ultimatesoftware.com/">--}}
                            {{--<img class="logo" src="/img/logos/ultimate.jpg" alt="Ultimate Software">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-4">--}}
                        {{--<a class="logo-wrap" target="_blank" href="https://ultrapress.com/">--}}
                            {{--<img class="logo" src="/img/logos/ultrapress.png" alt="Ultra Press">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>

    <section class="section partners">
        <div class="container generalReveal">
            <h1 class="heading global-accent-color">Partners</h1>
            <div class="grid">
                <div class="row">
                    <div class="col-6">
                        <a href="https://mlh.io/seasons/na-2017/events">
                            <img class="logo" style="max-width: 140px;" src="https://s3.amazonaws.com/logged-assets/trust-badge/2017/white.svg" alt="MLH">
                        </a>
                    </div>
                    <div class="col-6">
                        <img style="max-width: 200px;" class="logo" src="/img/logos/acm-logo.png" alt="ACM">
                    </div>
                    {{--<div class="col-4">--}}
                        {{--<img class="logo" src="/img/logos/upe.png" alt="Upsilon Pi Epsilon">--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>

    <section class="section register-cta">
        <div class="container">
            <h1 class="heading global-accent-color">Register</h1>
            <p>
                It's time. <a href="/register">Register today</a>.
            </p>
        </div>
    </section>
@endsection

@section('footer-scripts')
<script src="/js/home.js" type="text/javascript"></script>
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