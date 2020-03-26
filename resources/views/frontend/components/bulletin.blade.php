<?php 
use App\Models\Entities\SiteBulletines;
$bullets = SiteBulletines::active()->get();
?>
<div class="container-fluid bullete">
    <div class="bullete-box text-center p-1">
        <span class="m-0 p-1">News Bulletin</span>
    </div>
    <div class="bullete-rail p-1">
        <marquee class="news" direction="left">
            @foreach($bullets as $i => $bullet)
            {{$bullet->news}} {!!($i+1 < count($bullets)) ? '&bull;' : ''!!}
            @endforeach
        </marquee>
    </div>
</div>