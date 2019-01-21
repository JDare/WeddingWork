@extends('layouts.dashboard')

@section('head')
<script type="text/javascript" src="/js/dashboard/GuestApp.js" defer></script>
@endsection

@section('content')
<div class="container">
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="row row-cards row-deck">
    <div class="col-12">
        <div id="guest-app-container"></div>
    </div>
</div>
@endsection
