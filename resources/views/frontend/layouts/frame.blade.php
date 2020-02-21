<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{asset('frontends/css/bootstrap.min.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontends/css/owl.carousel.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontends/css/owl.theme.default.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('frontends/css/magnific-popup.css')}}" />
    @yield('additional-css')
	<link rel="stylesheet" href="{{asset('frontends/css/font-awesome.css')}}">
	<link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">

    @include('frontend.css.style')

</head>

<body>
    @yield('nav')
    @yield('container')

    @include('frontend.includes.footer')

    <!-- Back to top -->
    <div id="back-to-top"></div>
    <!-- /Back to top -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->
</body>


<!-- jQuery Plugins -->
<script type="text/javascript" src="{{asset('frontends/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontends/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontends/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontends/js/jquery.magnific-popup.js')}}"></script>
<script type="text/javascript" src="{{asset('frontends/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('frontends/js/main.js')}}"></script>
@include('sweetalert::alert')
@yield('additional-js')
</html>
@yield('scripts')

