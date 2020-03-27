<header>
    <nav id="nav" class="navbar">
        <div class="container">
            @include('frontend.components.nav-menu')
        </div>
    </nav>

    <div class="header-wrapper sm-padding bg-grey">
        <div class="container text-center">
            <h2>@yield('header_title')</h2>
        </div>
    </div>
</header>