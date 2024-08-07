<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Fortrigge</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css')}}" type="text/css" />
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <!-- Header -->
    @include('layout.header')
    
    <!-- Main Content -->
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layout.sidebar')
        
        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('layout.footer')
    
         <!-- JAVASCRIPT -->
         <script src="{{('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{('assets/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{('assets/libs/pace-js/pace.min.js')}}"></script>
        <!-- apexcharts -->
        <script src="{{('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <!-- Plugins js-->
        <script src="{{('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- dashboard init -->
        <script src="{{('assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{('assets/js/app.js')}}"></script>
    
    <!-- @yield('scripts') -->
    @stack('scripts')
  