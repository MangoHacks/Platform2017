<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta property="og:image" content="http://mangohacks.com/img/fb_splash17.jpg">
    <meta property="og:site_name" content="MangoHacks">
    <meta property="og:url" content="http://mangohacks.com" />
    <meta name="description" content="MangoHacks is a 36-hour Hackathon at Florida International University">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('header-content')
</head>
<body @yield('body-class')>
    @yield('menu')
    @yield('content')
    <div class="footer global-secondary-bg">
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
    @yield('footer-scripts')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-70426794-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
