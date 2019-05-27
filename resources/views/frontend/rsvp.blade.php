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
                                <input type="hidden" name="guest[]" value="{{ $guest->id }}"/>
                                <label for="attending-{{$guest->id}}">Attending?</label>
                                <input type="checkbox" name="attending[]" id="attending-{{$guest->id}}" value="{{ $guest->attending }}"><br/>
                                {{--<select name="attending[]">--}}
                                    {{--<option>Attending</option>--}}
                                    {{--<option>Not able to make it</option>--}}
                                {{--</select>--}}
                                <label for="veg-{{$guest->id}}">Vegetarian?</label>
                                <input type="checkbox" name="vegetarian[]" id="veg-{{$guest->id}}" value="{{ $guest->attending }}">
                            </div>
                        </div>
                        @endforeach
                        <h4 class="pre-title">Comments and Song Requests</h4>
                        <textarea name="comments" class="col-sm-12" rows="6"></textarea>
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