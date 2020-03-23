<?php 
    use App\Models\Team\User;
    use App\Models\Blogs\Blogs;
    use App\Models\Events\Events;
?>
<div id="numbers" class="section sm-padding">
    <div class="bg-img" style="background-image: url('{{asset('storage/sitebasics/'.$site->home_counter_bg)}}');">
        <div class="overlay"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-users"></i>
                    <h3 class="white-text"><span class="counter">{{User::current()->count()}}</span></h3>
                    <span class="white-text">{{__('Current Members')}}</span>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-graduation-cap"></i>
                    <h3 class="white-text"><span class="counter">{{User::alumnis()->count()}}</span></h3>
                    <span class="white-text">{{__('Alumni Members')}}</span>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-rss"></i>
                    <h3 class="white-text"><span class="counter">{{Blogs::active()->count()}}</span></h3>
                    <span class="white-text">{{__('Blog Posts')}}</span>
                </div>
            </div>

            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-file"></i>
                    <h3 class="white-text"><span class="counter">{{Events::all()->count()}}</span></h3>
                    <span class="white-text">{{__('Events Arranged')}}</span>
                </div>
            </div>


        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="{{asset('frontends/js/counterup2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        jQuery(function ($) {
            "use strict";
            var counterUp = window.counterUp["default"]; 
            var $counters = $(".counter");

            $counters.each(function (ignore, counter) {
                var waypoint = new Waypoint({
                    element: $(this),
                    handler: function () {
                        counterUp(counter, {
                            duration: 2000,
                            delay: 16
                        });
                        this.destroy();
                    },
                    offset: 'bottom-in-view',
                });
            });
        });
    });
</script>
@append
