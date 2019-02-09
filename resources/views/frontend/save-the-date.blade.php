@extends('layouts.frontend')

@section('css')
    @parent
    <link href="/css/static/content/styles.css" rel="stylesheet">
    <link href="/css/static/content/responsive.css" rel="stylesheet">
@endsection

@section('content')

<div class="main-slider">
    <div class="display-table center-text">
        <div class="display-table-cell">
            <div class="slider-content">

                <h1 class="title">Save the Date</h1>
                {{--<a href="01-homepage.html"><i class="icon icon-home"></i>Home</a>--}}
                {{--<a href="01-homepage.html"><i class="icon icon-right-open-big"></i>Archive</a>--}}
                {{--<a href="#"><i class="icon icon-right-open-big"></i>Regular Page</a>--}}

            </div><!-- slider-content-->
        </div><!--display-table-cell-->
    </div><!-- display-table-->
</div><!-- main-slider -->

<section class="regular-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-wrapper"><img src="/images/26th-october.png" alt="Saturday 26th October 2019"/></div>
                        </div><!-- col-sm-6 -->
                        <div class="col-sm-5 offset-1">
                            <h3 class="margin-top-btm" style="margin-top:20px;">Dove Canyon Courtyard</h3>
                            <p class="margin-top-btm">31981 Dove Canyon Drive, Dove Canyon<br/>California, 92679, USA</p>
                            <iframe width="100%" height="350" frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJffJCGRbr3IARVYnZEwul26s&key=AIzaSyCvEJQp55Fb0PhcC1Gd3wzrml4cMvbaKdQ&zoom=10" allowfullscreen></iframe>
                        </div><!-- col-sm-6 -->
                    </div><!-- row -->
                    {{--<h4 class="margin-top-btm">Shooting Flowers and Bouquets</h4>--}}

                    {{--<p class="margin-top-btm">Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
                        {{--quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt--}}
                        {{--ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation--}}
                        {{--ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,--}}
                        {{--consectetur adipisicing elit.</p>--}}

                    {{--<div class="quoto-area margin-top-btm">--}}
                        {{--<h3 class="quoto"><i class="icon icon-quote"></i>--}}
                            {{--“Love recognizes no barriers. It jumps hurdles, leaps fences, penetrates walls to--}}
                            {{--arrive at its destination full of hope.”</h3>--}}
                        {{--<h5 class="name">Maya Angeluo</h5>--}}
                    {{--</div>--}}



                    {{--<h4 class="margin-top-btm">Quick Note About the Gifts</h4>--}}

                    {{--<p class="desc">Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
                        {{--quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt--}}
                        {{--ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation--}}
                        {{--ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,--}}
                        {{--consectetur adipisicing elit.</p>--}}

                    {{--<div class="img-wrapper"><img src="../images/regular-content-4-1000x650.jpg" alt="Content Image"></div>--}}

                    {{--<h4 class="margin-top-btm">Quick Note About the Gifts</h4>--}}

                    {{--<ul class="braidmaids-name">--}}
                        {{--<li>Braidsmaids: Tricia Brandy (Maid of Honor)</li>--}}
                        {{--<li>Mandy Castro</li>--}}
                        {{--<li>Daniel Dulon</li>--}}
                        {{--<li>Megan Hines</li>--}}
                        {{--<li>Katie Johnson</li>--}}
                        {{--<li>Katie Lugan</li>--}}
                    {{--</ul>--}}
                </div><!-- content -->

            </div><!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->
@endsection