<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>TITLE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="/css/bootstrap.css" rel="stylesheet">


    <link href="/css/fluidbox.min.css" rel="stylesheet">

    <link href="/css/font-icon.css" rel="stylesheet">


    <link href="/css/styles.css" rel="stylesheet">

    <link href="/css/responsive.css" rel="stylesheet">

</head>
<body>

<header>

    <div class="container">

        <a class="logo" href="#"><img src="images/logo-white.png" alt="Logo"></a>

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
            <li><a href="/about">THE WEDDING</a></li>
        </ul><!-- main-menu -->

    </div><!-- container -->
</header>


<div class="main-slider">
    <div class="display-table center-text">
        <div class="display-table-cell">
            <div class="slider-content">

                <i class="small-icon icon icon-tie"></i>
                <h5 class="date">{{ Carbon\Carbon::parse(config('wedding.date'))->format('jS F Y') }}</h5>
                <h3 class="pre-title">Save The Date</h3>
                <h1 class="title">Lilly <i class="icon icon-heart"></i> Jeremy</h1>

            </div><!-- slider-content-->
        </div><!--display-table-cell-->
    </div><!-- display-table-->
</div><!-- main-slider -->


<section class="section story-area center-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <div class="heading">
                    <h2 class="title">Our Story</h2>
                    <span class="heading-bottom"><i class="icon icon-star"></i></span>
                </div>

                <p class="desc margin-bottom">Every bride and groom wants an incomparable wedding combined with fantasy
                    and style. We create stunning, one-of-a-kind events produced and styled to perfection.
                    From traditional to modern, elegant and relaxed, we focus on any event we plan.</p>

            </div><!-- col-sm-10 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->

<section class="section counter-area center-text">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="heading">
                    <h2 class="title">Don't miss it!</h2>
                    <span class="heading-bottom"><i class="color-white icon icon-star"></i></span>
                </div>
            </div>

            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="remaining-time">
                    <div id="clock" data-countdown="{{ config('wedding.date') }}"></div>
                </div><!-- remaining-time -->
            </div><!-- col-sm-10 -->

        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->

{{-- <section class="section w-details-area center-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <div class="heading">
                    <h2 class="title">Wedding Details</h2>
                    <span class="heading-bottom"><i class="icon icon-star"></i></span>
                </div>

                <div class="wedding-details margin-bottom">

                    <div class="w-detail right">
                        <i class="icon icon-ciurclke"></i>
                        <h4 class="title">CEREMONY</h4>
                        <p>Look at the most passionate ceremony ever. We wish happiness to the wedding couple.</p>
                    </div><!-- w-detail -->

                    <div class="w-detail left">
                        <i class="icon icon-wine-glass"></i>
                        <h4 class="title">TOAST & DINNER</h4>
                        <p>Look at the most passionate ceremony ever. We wish happiness to the wedding couple.</p>
                    </div><!-- w-detail -->

                    <div class="w-detail right">
                        <i class="icon icon-cake"></i>
                        <h4 class="title">WEDDING CAKE</h4>
                        <p>Look at the most passionate ceremony ever. We wish happiness to the wedding couple.</p>
                    </div><!-- w-detail -->

                    <div class="w-detail left">
                        <i class="icon icon-camera"></i>
                        <h4 class="title">PHOTOGRAPHY</h4>
                        <p>Look at the most passionate ceremony ever. We wish happiness to the wedding couple.</p>
                    </div><!-- w-detail -->

                </div><!-- wedding-details -->

            </div><!-- col-sm-10 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->

<section class="section ceremony-area center-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="heading">
                    <h2 class="title">Wedding & Ceremonies</h2>
                    <span class="heading-bottom"><i class="color-white icon icon-star"></i></span>
                </div>

                <div class="ceremony margin-bottom">
                    <p class="desc">We assist our clients in creating memorable, magical
                        celebrations that exceed expectations. Our personal approach ensures the weddings we
                        plan are meaningful and truly reflect our clients as individuals, as couples, and states
                        something about their shared values and sense of style.</p>

                    <a class="border-btn" href="#">LEARN MORE</a>
                </div>

            </div><!-- col-sm-10 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->



<section class="section galery-area center-text">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <div class="heading">
                    <h2 class="title">Our Gallery</h2>
                    <span class="heading-bottom"><i class="icon icon-star"></i></span>
                </div>

                <div class="image-gallery">
                    <div class="row">

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-1-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-1-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-2-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-2-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-3-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-3-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-4-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-4-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-5-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-5-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                        <div class="col-md-4 col-sm-6">
                            <a href="images/gallery-1-600x400.jpg" data-fluidbox><img class="margin-bottom" src="images/gallery-1-600x400.jpg" alt="Gallery Image"></a>
                        </div><!-- col-sm-4 -->

                    </div><!-- row -->

                    <a class="btn-2 margin-bottom gallery-btn" href="#">VIEW ALL GALLERY</a>

                </div><!-- image-gallery -->

            </div><!-- col-sm-10 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->


<section class="contact-area">
    <div class="contact-wrapper section float-left">
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>

                <div class="col-sm-10">
                    <div class="heading">
                        <h3 class="title">Contact Us</h3>
                        <i class="icon icon-star"></i>
                    </div>

                    <div class="margin-bottom">
                        <p>On the 25 September 2017</p>
                        <p>Join us as we celebrate life and love.</p>
                        <h4><a href="tel:784-412-0646" class="phone">784-412-0646</a></h4>
                        <p>14 Baria street 133/2, New York City, US</p>

                    </div><!-- margin-bottom -->
                </div><!-- col-sm-10 -->

            </div><!-- row -->
        </div><!-- container -->
    </div><!-- float-left -->

    <div class="map-area">
        <div id="map" style="height:100%;"></div>
    </div><!-- map-area -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>

</section><!-- section -->
--}}

<footer>
    <div class="container center-text">

        <div class="logo-wrapper">
            <a class="logo" href="#"><img src="images/logo-black.png" alt="Logo Image"></a>
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

        <ul class="social-icons">
            <li><a href="#"><i class="icon icon-heart"></i></a></li>
            <li><a href="#"><i class="icon icon-twitter"></i></a></li>
            <li><a href="#"><i class="icon icon-instagram"></i></a></li>
            <li><a href="#"><i class="icon icon-pinterest"></i></a></li>
            <li><a href="#"><i class="icon icon-tripadvisor"></i></a></li>
        </ul>

        <ul class="footer-links">
            <li><a href="#">HOME</a></li>
            <li><a href="#">OUR STORIES</a></li>
            <li><a href="#">THE WEDDING</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>

        <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

    </div><!-- container -->
</footer>


<!-- SCRIPTS -->

<script src="/js/jquery-3.1.1.min.js"></script>

<script src="/js/tether.min.js"></script>

<script src="/js/bootstrap.js"></script>

<script src="/js/jquery.countdown.min.js"></script>

<script src="/js/jquery.fluidbox.min.js"></script>

<script src="/js/scripts.js"></script>

</body>
</html>