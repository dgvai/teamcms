<?php 

    use App\Models\Entities\SiteBasics;
    $site = SiteBasics::first();

?>

<header>
    <nav id="nav" class="navbar">
        <div class="container">
            @include('frontend.components.nav-menu')
        </div>
    </nav>
</header>
