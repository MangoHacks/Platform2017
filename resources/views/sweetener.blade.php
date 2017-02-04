@extends('layouts.master')

@section('title')
    Sweetener | MangoHacks. A Hackathon at Florida Intenational University
@endsection

@section('header-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    @include('partials.theme_headmeta')
    <style>
        canvas {
            width: 600px;
            height: 600px;
            display: block;
            box-shadow: 0 0 0px 3px #fff, 0 0 1px 4px #b3b3b3;
        }
        .controls {
            margin-top: 40px;
            max-width: 600px;
        }
        .color_btn {
            width: 70px;
            height: 70px;
            display: inline-block;
            margin-right: 15px;
            cursor: pointer;
            border: none;
            box-shadow: 0 0 0px 3px #fff, 0 0 1px 4px #b3b3b3;
            border-radius: 5px;
        }

        #theme_1 {
            background: linear-gradient(180deg, rgb(240, 14, 46) 0, rgb(25, 37, 80) 80%);
        }

        #theme_2 {
            background: linear-gradient(180deg, rgb(240, 55, 165) 0, rgb(49, 70, 185) 80%);
        }

        #theme_3 {
            background: linear-gradient(180deg, rgb(239, 211, 135) 0, rgb(232, 35, 99) 80%);
        }

        #theme_4 {
            background: linear-gradient(180deg, rgb(75, 23, 167) 0, rgb(245, 204, 128) 80%);
        }

        #theme_5 {
            background: linear-gradient(180deg, rgb(255, 105, 57) 0, rgb(255, 198, 99) 80%);
        }

        .download-btn {
            visibility: hidden;
        }
        .download-btn.active {
             visibility: visible;
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
                <a href="/">Home</a>
                <a href="/#about">About</a>
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
            <h1>Sweeten your profile pic!</h1>
        </div>
    </section>

    <section class="section form extra-padding">
        <div class="container">
            <div class="form-group mb-lg">
                <label for="image">1. Choose an image</label>
                <div class="input-group">
                    <label class="input-group-btn">
                                <span style="color: white;" class="btn global-accent-bg">
                                    Browse&hellip; <input id="image_upload" required name="image" type="file" style="display: none;">
                                </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div>
                     <span class="help-block">
                         Square images work best
                    </span>
            </div>
            <canvas id="canvas"></canvas>
            <div class="controls">
                <label for="image">2. Choose an style</label>
                <div class="form-group">

                    <button
                            class="color_btn" id="theme_1"></button>
                    <button
                            class="color_btn" id="theme_2"></button>
                    <button
                            class="color_btn" id="theme_3"></button>
                    <button
                            class="color_btn" id="theme_4"></button>
                    <button
                            class="color_btn" id="theme_5"></button>
                </div>
            </div>
            <br />

            <a target="_blank" style="font-size: 1.2em; color: white;" class="button btn global-accent-bg download-btn">3. Download</a>
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

        (function () {
            var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
            window.requestAnimationFrame = requestAnimationFrame;
        })();

        var color_pairs = [{
            highlight_color: "rgb(240, 14, 46)",
            shadow_color: "rgb(25, 37, 80)"
        }, {
            highlight_color: "rgb(255,55,165)",
            shadow_color: "rgb(49,30,160)"
        }, {
            highlight_color: "rgb(239,211,135)",
            shadow_color: "rgb(232,35,99)"
        }, {
            shadow_color: "rgb(75,40,180)",
            highlight_color: "rgb(239,211,135)"
        }, {
            shadow_color: "rgb(255,105,20)",
            highlight_color: "rgb(222,200,99)"
        }];

        var highlight_color = color_pairs[0].highlight_color;
        var shadow_color = color_pairs[0].shadow_color;

        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');
        var fileinput = document.getElementById('image_upload');
        var downloadbtn = document.querySelector('.download-btn');
        var theme1 = document.getElementById('theme_1');
        var theme2 = document.getElementById('theme_2');
        var theme3 = document.getElementById('theme_3');
        var theme4 = document.getElementById('theme_4');
        var theme5 = document.getElementById('theme_5');

        canvas.width = 800;
        canvas.height = 800;

        var img = document.createElement('img');

        fileinput.addEventListener('change', handleImage, false);
        theme1.addEventListener('click', function (event) {
            highlight_color = color_pairs[0].highlight_color;
            shadow_color = color_pairs[0].shadow_color;
        }, false);
        theme2.addEventListener('click', function (event) {
            highlight_color = color_pairs[1].highlight_color;
            shadow_color = color_pairs[1].shadow_color;
        }, false);
        theme3.addEventListener('click', function (event) {
            highlight_color = color_pairs[2].highlight_color;
            shadow_color = color_pairs[2].shadow_color;
        }, false);
        theme4.addEventListener('click', function (event) {
            highlight_color = color_pairs[3].highlight_color;
            shadow_color = color_pairs[3].shadow_color;
        }, false);
        theme5.addEventListener('click', function (event) {
            highlight_color = color_pairs[4].highlight_color;
            shadow_color = color_pairs[4].shadow_color;
        }, false);

        function drawColorLayer(deg) {
            // ctx.arc(512- offset* Math.cos(deg / 180 * Math.PI), 340 - offset * Math.sin(deg / 180 * Math.PI), 200, 0, Math.PI*2, true);
            ctx.rect(0, 0, canvas.width, canvas.height);
            ctx.closePath();
            ctx.fill();
        }

        function handleImage(e) {
            var reader = new FileReader();
            reader.onload = function (event) {
                var upload_img = new Image();
                upload_img.onload = function () {
                    img = upload_img;
                    downloadbtn.classList.add('active');
                    step();
                };
                upload_img.src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }

        function step() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.globalCompositeOperation = 'source-over';
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

            // Desaturate colors (black and white)
            ctx.globalCompositeOperation = "saturation";
            ctx.fillStyle = 'rgb(0, 0, 0)';
            ctx.beginPath();
            drawColorLayer();

            // Highlights color
            ctx.globalCompositeOperation = "darken";
            ctx.fillStyle = highlight_color;
            ctx.beginPath();
            drawColorLayer();

            // Shadows color
            ctx.globalCompositeOperation = "lighten";
            ctx.fillStyle = shadow_color;
            ctx.beginPath();
            drawColorLayer();

            downloadbtn.href = canvas.toDataURL();

            requestAnimationFrame(step);
        }

    </script>
@endsection