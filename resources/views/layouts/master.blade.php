<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MangoHacks | A Hackathon at Florida Intenational University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('header-content')
</head>
<body class="home">
    @yield('menu')
    @yield('content')
    <div class="footer global-accent-bg">
        <div class="container">
            <div class="social_media">
                <a target="_blank" href="https://www.facebook.com/MangoHacks">
                    <i class="fa fa-facebook-official"></i>
                </a>
                <a target="_blank" href="https://twitter.com/fiumangohacks">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
            &copy; MangoHacks.com
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@3.3.2/dist/scrollreveal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script type="text/javascript" src="/vendor/jquery.sticky.js"></script>
    <script type="text/javascript" src="/vendor/DrawSVGPlugin.js"></script>
    <script src="/js/app.js" type="text/javascript"></script>
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
</body>
</html>
