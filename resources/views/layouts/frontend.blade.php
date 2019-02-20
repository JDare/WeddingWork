<!DOCTYPE HTML>
<html lang="en">
<head>
@if(env('GTM_ID'))
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ env('GTM_ID') }}');</script>
<!-- End Google Tag Manager -->
@endif
    <title>{{ config('wedding.bride.name') }} & {{ config('wedding.groom.name') }}'s Wedding {{ Carbon\Carbon::parse(config('wedding.date'))->format('Y') }} @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

@section('css')
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="/css/static/bootstrap.css" rel="stylesheet">

    <link href="/css/static/fluidbox.min.css" rel="stylesheet">

    <link href="/css/static/font-icon.css" rel="stylesheet">
    <link href="/css/static/main.css" rel="stylesheet">
@show

</head>
<body>
@if (env('GTM_ID'))
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GTM_ID') }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@endif
<header>

    <div class="container">

        <a class="logo" href="/"><img src="../../images/logo-white.png" alt="{{ config('wedding.bride.name') }} and {{ config('wedding.groom.name') }}'s Wedding"></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="icon icon-bars"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="/">HOME</a></li>
            {{--<li class="drop-down"><a href="#!">OUR STORIES<i class="icon icon-caret-down"></i></a>

                <ul class="drop-down-menu">
                    <li><a href="#">FEATURED</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li class="drop-down"><a href="#!">CATEGORIES<i class="icon icon-caret-right"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="#">FEATURED</a></li>
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#">CATEGORIES</a></li>
                        </ul>
                    </li>
                </ul>

            </li>--}}
            <li><a href="/save-the-date">SAVE THE DATE</a></li>
        </ul><!-- main-menu -->

    </div><!-- container -->
</header>
@yield('content')
<footer>
    <div class="container center-text">

        <div class="logo-wrapper">
            <a class="logo" href="#"><img src="../../images/logo-black.png" alt="Logo Image"></a>
            <i class="icon icon-star"></i>
        </div>

        {{--<div class="newsletter">
            <h4 class="title">RECEIVE NEWS IN YOUR EMAIL</h4>
            <p>Join our mailing list to receive news and announcements</p>
            <div class="email-area">
                <form>
                    <input class="email-input" type="text" placeholder="Your Email">
                    <button class="submit-btn" type="submit"><i class="icon icon-email-plane"></i></button>
                </form>
            </div><!-- email-area -->
        </div><!-- newsletter -->
        --}}

        {{--<ul class="social-icons">--}}
            {{--<li><a href="#"><i class="icon icon-heart"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon icon-twitter"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon icon-instagram"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon icon-pinterest"></i></a></li>--}}
            {{--<li><a href="#"><i class="icon icon-tripadvisor"></i></a></li>--}}
        {{--</ul>--}}

        <ul class="footer-links">
            <li><a href="/">HOME</a></li>
            <li><a href="/save-the-date">SAVE THE DATE</a></li>
        </ul>

        <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

    </div><!-- container -->
</footer>


<!-- SCRIPTS -->

<script src="/js/static/jquery-3.1.1.min.js"></script>

<script src="/js/static/tether.min.js"></script>

<script src="/js/static/bootstrap.js"></script>

<script src="/js/static/jquery.countdown.min.js"></script>

<script src="/js/static/jquery.fluidbox.min.js"></script>

<script src="/js/static/scripts.js"></script>

</body>
</html>
