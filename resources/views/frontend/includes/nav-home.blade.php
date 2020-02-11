<?php 

    use App\Models\Entities\SiteBasics;
    $site = SiteBasics::first();

?>
<!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('{{asset('public/storage/sitebasics')}}/{{$site->home_banner}}');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="{{route('home')}}">
                        <img class="logo" src="{{asset('public/storage/sitebasics')}}/{{$site->logo}}" alt="logo">
                        <img class="logo-alt" src="{{asset('public/storage/sitebasics')}}/{{$site->logo_alt}}" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>

            <!--  Main navigation  -->
            <ul class="main-nav nav navbar-nav navbar-right">
                <li><a href="#home">{{__('layout.home')}}</a></li>
                <li class="has-dropdown"><a href="#!">{{__('layout.members')}}</a>
                    <ul class="dropdown">
                        <li><a href="#">{{__('layout.commem')}}</a></li>
                        <li><a href="#">{{__('layout.curmem')}}</a></li>
                        <li><a href="#">{{__('layout.oldmem')}}</a></li>
                    </ul>
                </li>
                <li><a href="#">{{__('layout.events')}}</a></li>
                <li><a href="#">{{__('layout.blogs')}}</a></li>
                <li><a href="#">{{__('layout.about')}}</a></li>
                <li class="has-dropdown"><a href="#!"><i class="fa fa-plus"></i></a>
                    <ul class="dropdown">
                        <li><a href="#">{{__('auth.login')}}</a></li>
                        <li><a href="#">{{__('auth.signup')}}</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">{{$site->fullname}}</h1>
                        <p class="white-text">{{$site->short_description}}</p>
                        <button class="main-btn">{{__('layout.learn')}}</button>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<!-- /Header -->