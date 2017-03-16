@extends('layouts.master')

@section('title')
    Post Event Resources | MangoHacks '17
@endsection

@section('header-content')
    @include('partials.theme_headmeta')
    <style>
        .tracks-wrap:after {
            background: rgba(32, 176, 86, 0.9);
        }
        @media (min-width: 490px){
            .tracks-wrap {
                padding: 100px 0;
            }
        }
        .table {
            font-size: 14px !important;
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
            <h1 class="heading">Attendees List and Resume Book</h1>
            <a style="font-size: 14px; padding: 2px 32px; color: white;" class="button global-accent-bg" href="/files/mangohacks_attendee_report.csv">Download List as .csv</a>
            <a style="font-size: 14px; padding: 2px 32px; color: white;" class="button global-accent-bg" href="/files/mangohacks_resumes.zip">Download All Resumes as .zip</a>
            <a style="font-size: 14px; padding: 2px 32px; color: white;" class="button global-accent-bg" href="http://expo.mangohacks.com">Project List</a>
        </div>
    </section>
    <section class="section extra-padding">
        <div class="container">
            <h4>School Count: {{count($counts)}}</h4>
            <table class="table">
                <thead> 
                    <tr> 
                        <th>School Name</th> 
                        <th>Attendee Count</th> 
                    </tr> 
                </thead> 
                <tbody>
                    @foreach($counts as $count)
                    <tr> 
                        <td>{{$count->school_name}}</td>
                        <td>{{$count->attendee_count}}</td>
                    </tr>
                    @endforeach 
                 </tbody> 
            </table>
            <br>
            <hr>
            <h3>Total Attendees: {{count($attendees)}}</h3>
            <table class="table">
                <thead> 
                    <tr> 
                        <th>Name</th> 
                        <th>Email</th> 
                        <th>School</th> 
                        <th>Year</th>
                        <th>Major</th>
                        <th>Resume</th>
                    </tr> 
                </thead> 
                <tbody>
                    @foreach($attendees as $attendee)
                    <tr> 
                        <td>{{$attendee['first_name'].' '.$attendee['last_name']}}</td> 
                        <td>{{$attendee['email']}}</td> 
                        <td>{{$attendee['school_name']}}</td> 
                        <td>{{$attendee['school_year']}}</td>
                        <td>{{$attendee['school_major']}}</td>
                        <td>
                            @if($attendee['resume_url'] != 'late')
                            <a style="color: white;" class="button global-accent-bg" href="https://s3.amazonaws.com/{{env('AWS_BUCKET')}}/{{$attendee['resume_url']}}"}}">
                                Download 
                            </a>
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                 </tbody> 
             </table>
            
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