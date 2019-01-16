<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wedding Work') }} - Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://fonts.googleapis.com/css?family=Playball%7CBitter" rel="stylesheet">
    <script src="/tabler/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>

    <!-- Dashboard Core -->
    <link href="/tabler/css/dashboard.css" rel="stylesheet" />
    <script src="/tabler/js/dashboard.js" defer></script>
    <!-- c3.js Charts Plugin -->
    <link href="/tabler/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="/tabler/plugins/charts-c3/plugin.js" defer></script>
    <!-- Google Maps Plugin -->
    <link href="/tabler/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="/tabler/plugins/maps-google/plugin.js" defer></script>
    <!-- Input Mask Plugin -->
    <script src="/tabler/plugins/input-mask/plugin.js" defer></script>

    @section('head')

    @show
</head>
<body>
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="{{ route('dashboard.index') }}">
                        <h1 style="margin:0;padding:0;font-family:'playball'">{{ config('app.name', 'Wedding Work') }}</h1>
                    </a>
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                <span class="avatar avatar-placeholder"></span>
                                <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{ Auth::user()->email }}</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-settings"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://github.com/JDare/WeddingWork" target="_blank">
                                    <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                                </a>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 ml-auto">
                        <form class="input-icon my-3 my-lg-0">
                            <input type="search" class="form-control header-search" placeholder="Search Guests&hellip;" tabindex="1">
                            <div class="input-icon-addon">
                                <i class="fe fe-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.index') }}" class="nav-link @if (Request::routeIs('dashboard.index')) {{'active'}} @endif"><i class="fe fe-home"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.guests') }}" class="nav-link @if (Request::routeIs('dashboard.guests')) {{'active'}} @endif"><i class="fe fe-users"></i> Guests</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <main class="my-3 my-md-5">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-auto ml-lg-auto">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item"><a href="https://github.com/JDare/WeddingWork/blob/master/readme.md" target="_blank">Documentation</a></li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a href="https://github.com/JDare/WeddingWork" class="btn btn-outline-primary btn-sm" target="_blank">Source code</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                        Powered By <a href="https://github.com/JDare/WeddingWork">Wedding Work</a> - Dashboard Theme by <a href="https://github.com/tabler/tabler" target="_blank">Tabler</a>.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>