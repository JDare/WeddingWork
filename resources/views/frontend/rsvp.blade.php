@extends('layouts.frontend')

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
@if(Session::has('rsvp_message'))
    <section class="section">
        <div class="container">
            <div class="row">

    @if(Session::get("rsvp_message") == "success")
                    <div class="col-12 alert alert-success">
        @if($party->isAttending())
            RSVP confirmed, thank you for being there on our special day!
        @else
            RSVP confirmed, thank you for letting us know you're unable to make it.
        @endif
                    </div>
    @endif
    @if(Session::get("rsvp_message") == "cutoff")
            <div class="col-12 alert alert-danger">
        Sorry, you can no longer modify your RSVP online. Please reach out to us if you need to make any further changes.
            </div>
    @endif
            </div>
        </div>
    </section>
@endif
<section class="section contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="contact-form margin-bottom">
                    <h4 class="pre-title">Please select your attendance and dietary preferences</h4>
                    <form method="post">
                        @csrf
                        @foreach($party->guests as $guest)
                        <div class="row guest">
                            <div class="col-sm-6">
                                <h4>@if($guest->unknown)
                                    <em>Your Guest</em>
                                    @else
                                    {{$guest->name}}
                                    @endif
                                </h4>
                            </div>
                            <div class="col-sm-6">
                                <select id="attending-{{$guest->id}}" name="guests[{{$guest->id}}][attending]" required>
                                    <option value="" disabled hidden @if($guest->attending_updated_at == null) selected @endif>Select...</option>
                                    <option value="true" @if($guest->attending_updated_at != null && $guest->attending) selected @endif>Kindly Accept</option>
                                    <option value="false" @if($guest->attending_updated_at != null && !$guest->attending) selected @endif>Politely Decline</option>
                                </select><br/>
                                {{--<label for="attending-{{$guest->id}}">Attending?</label>--}}
                                {{--<input type="checkbox" name="guests[{{$guest->id}}][attending]" id="attending-{{$guest->id}}" value="true" @if($guest->attending)checked="checked"@endif><br/>--}}
                                <label for="veg-{{$guest->id}}">Vegetarian?</label>
                                <input type="checkbox" name="guests[{{$guest->id}}][vegetarian]" id="veg-{{$guest->id}}" value="true" @if($guest->vegetarian)checked="checked"@endif>
                            </div>
                        </div>
                        @endforeach
                        <h4 class="pre-title">Comments or extra dietary information</h4>
                        <textarea name="comments" class="col-sm-12" rows="6">{{$party->comment}}</textarea>
                        <div class="col-sm-12 center-text">
                            <button class="btn"><b>RSVP</b></button>
                        </div>
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