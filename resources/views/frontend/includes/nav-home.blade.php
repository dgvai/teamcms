<?php 

    use App\Models\Entities\SiteBasics;
    $site = SiteBasics::first();

?>
<header id="home">
    <div class="bg-img" style="background-image: url('{{asset('storage/sitebasics')}}/{{$site->home_banner}}');">
        <div class="overlay"></div>
    </div>

    <nav id="nav" class="navbar nav-transparent">
        <div class="container">
            @include('frontend.components.nav-menu')
        </div>
    </nav>

    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">{{$site->fullname}}</h1>
                        <p class="white-text">{{$site->short_description}}</p>
                        <button class="main-btn">{{__('layout.learn')}}</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</header>
