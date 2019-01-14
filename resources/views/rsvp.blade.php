@extends('layout')

@section('css')
    @parent
    <link href="/css/static/rsvp/styles.css" rel="stylesheet">
    <link href="/css/static/rsvp/responsive.css" rel="stylesheet">
@endsection

@section('content')

<div class="main-slider">
    <div class="display-table center-text">
        <div class="display-table-cell">
            <div class="slider-content">

                <h3 class="pre-title">RSVP</h3>
                <h1 class="title">Be Our Guest</h1>

            </div><!-- slider-content-->
        </div><!--display-table-cell-->
    </div><!-- display-table-->
</div><!-- main-slider -->


<section class="section contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="contact-form margin-bottom">
                    <h2 class="center-text">Are you attending?</h2>
                    <h4 class="pre-title center-text">RSVP HERE!</h4>
                    <form method="post">
                        <div class="row">

                            <div class="col-sm-12 margin-bottom">
                                <label>Full Name</label>
                                <input class="name-input" type="text" >
                            </div>
                            <div class="col-sm-12 margin-bottom">
                                <label>Email</label>
                                <input class="email-input" type="text" >
                            </div>
                            <div class="col-sm-6 margin-bottom">
                                <label>Guest</label>
                                <select class="event-select" name="option">
                                    <option value="1"><span>00</span></option>
                                    <option value="2">01</option>
                                    <option value="3">02</option>
                                    <option value="3">03</option>
                                    <option value="3">04</option>
                                </select>
                            </div>
                            <div class="col-sm-6 margin-bottom">
                                <label>Event</label>
                                <select class="event-select" name="option">
                                    <option value="1">All Events</option>
                                    <option value="3">Option 1</option>
                                    <option value="3">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                            <div class="col-sm-12 center-text">
                                <button class="btn"><b>I AM ATTENDING</b></button>
                            </div>

                        </div><!-- row -->
                    </form>
                </div><!-- contact-form -->
            </div><!-- col-sm-6 -->

        </div><!-- row -->
    </div><!-- container -->
</section><!-- section -->

{{--<div class="map-area">--}}
    {{--<div id="map" style="height:100%;"></div>--}}
{{--</div><!-- map-area -->--}}
{{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>--}}

@endsection