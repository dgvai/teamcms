<?php 

?>
<!-- Counters -->
<div id="numbers" class="section sm-padding">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('{{asset('storage/sitebasics')}}/default-home-counter-bg.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-users"></i>
                    <h3 class="white-text"><span class="counter">451</span></h3>
                    <span class="white-text">{{__('home.cnt.mem')}}</span>
                </div>
            </div>
            <!-- /number -->
            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-graduation-cap"></i>
                    <h3 class="white-text"><span class="counter">12</span></h3>
                    <span class="white-text">{{__('home.cnt.alm')}}</span>
                </div>
            </div>
            <!-- /number -->
            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-rss"></i>
                    <h3 class="white-text"><span class="counter">154</span></h3>
                    <span class="white-text">{{__('home.cnt.blg')}}</span>
                </div>
            </div>
            <!-- /number -->
            <!-- number -->
            <div class="col-sm-3 col-xs-6">
                <div class="number">
                    <i class="fa fa-file"></i>
                    <h3 class="white-text"><span class="counter">45</span></h3>
                    <span class="white-text">{{__('home.cnt.evn')}}</span>
                </div>
            </div>
            <!-- /number -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Counters -->

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
