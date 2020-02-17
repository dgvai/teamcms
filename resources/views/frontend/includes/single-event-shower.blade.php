<div id="event" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-8 white-bar m-0 p-0">
                <div class="poster" style="background-image: url('{{asset('img/blog1.jpg')}}')">
                    <div class="ribbon">{{__('terms.upcoming')}}</div>
                </div>
                <div class="details m-4 p-2">
                    <h2>Demo Event Name</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row fixed-div">
                    <div class="col-md-6 col-sm-12 div">
                        <div class="content">
                            <h2 class="date"> 09 </h2>
                            <p class="month"> september </p>
                            <p class="year"> 2020 </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 div">
                        <div class="content">
                            <h2 class="time"> 09:00 </h2>
                            <p class="am-pm"> am </p>
                            <p class="location"> Rajshahi </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="bottom-link mb-4">
                            <h3> Event Links </h3>
                            <span style="display:block"> Ticket Link <a href="#!"> Browse </a> </span>
                            <span style="display:block"> Ticket Link <a href="#!"> Browse </a> </span>
                            <span style="display:block"> Ticket Link <a href="#!"> Browse </a> </span>
                            <span style="display:block"> Ticket Link <a href="#!"> Browse </a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-8 white-bar m-0 p-0">
                <h3 class="m-4 p-2">Post Event News</h3>
                <div class="owl-carousel owl-theme" id="owl-slider">
                    <div class="item"><img src="{{asset('img/blog1.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/blog2.jpg')}}" alt=""></div>
                    <div class="item"><img src="{{asset('img/about2.jpg')}}" alt=""></div>
                </div>
                <div class="details m-4 p-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(function(){
        $("#owl-slider").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        autoplay: true,
        items : 1, 
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false
        });
    })
</script>
@append