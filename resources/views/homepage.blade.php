@extends('layout')

@section('css')
@parent
<link href="/css/homepage/styles.css" rel="stylesheet">
<link href="/css/homepage/responsive.css" rel="stylesheet">
@endsection

@section('content')
<div class="main-slider">
    <div class="display-table center-text">
        <div class="display-table-cell">
            <div class="slider-content intro">

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
@endsection
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
