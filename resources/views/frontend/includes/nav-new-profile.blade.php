<header id="home">
    <div class="bg-img" style="background-image: url('{{asset('storage/users/covers')}}/{{$user->cover_photo}}');">
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
                        <h1 class="white-text">{{$user->full_name}}</h1>
                        <p class="white-text">{{$user->about}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>