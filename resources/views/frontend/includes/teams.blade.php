<?php 

?>

<!-- Team -->
<div id="team" class="section md-padding">
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">{{__('layout.commem')}}</h2>
            </div>
            <!-- /Section header -->
            <div id="team-carousel" class="team-carousel">
                <div class="item">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('public')}}/img/team1.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h3>John Doe</h3>
                            <span>Web Designer</span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive" src="{{asset('public')}}/img/team1.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h3>John Doe</h3>
                            <span>Web Designer</span>
                        </div>
                    </div>
                </div>
                
            </div>
            


        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
</div>
<!-- /Team -->

@section('scripts')
<script>
$(document).ready(()=>{
	console.log('ready');
    $('#team-carousel').owlCarousel({
        /*loop:true,
        margin:10,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            480:{
                items:3,
                nav:true
            },
            768:{
                items:5,
                nav:true
            }
        }*/
		items : 10,
		lazyLoad : true,
		navigation : true
    })
})

</script>
@endsection

