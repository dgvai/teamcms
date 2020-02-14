<?php 

    use App\Models\Entities\SiteBasics;
    $site = SiteBasics::first();

?>
<!-- Header -->
<header>

    <!-- Nav -->
    <nav id="nav" class="navbar">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="index.html">
                        <img class="logo" src="{{asset('storage/sitebasics')}}/{{$site->logo}}" alt="logo">
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

    <!-- header wrapper -->
    <div class="header-wrapper sm-padding bg-grey">
        <div class="container text-center">
            <h2>@yield('header-title')</h2>
        </div>
    </div>
    <!-- /header wrapper -->

</header>
<!-- /Header -->