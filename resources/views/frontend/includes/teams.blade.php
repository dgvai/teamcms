<?php 

?>
<div id="team" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('layout.commem')}}</h2>
            </div>
            <div id="team-carousel" class="owl-carousel owl-theme">
                <div class="team">
                    <div class="team-img">
                        <img class="img-responsive" src="{{asset('img/team1.jpg')}}" alt="">
                    </div>
                    <div class="team-content">
                        <h3>John Doe</h3>
                        <span>Web Designer</span>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-external-link"></i></a>
                    </div>
                    
                </div>
                <div class="team">
                    <div class="team-img">
                        <img class="img-responsive" src="{{asset('img/team1.jpg')}}" alt="">
                    </div>
                    <div class="team-content">
                        <h3>John Doe</h3>
                        <span>Software and Web Developer</span>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-external-link"></i></a>
                    </div>
                </div>
                <div class="team">
                    <div class="team-img">
                        <img class="img-responsive" src="{{asset('img/team1.jpg')}}" alt="">
                    </div>
                    <div class="team-content">
                        <h3>John Doe</h3>
                        <span>Software and Web Developer</span>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-external-link"></i></a>
                    </div>
                </div>
                <div class="team">
                    <div class="team-img">
                        <img class="img-responsive" src="{{asset('img/team1.jpg')}}" alt="">
                    </div>
                    <div class="team-content">
                        <h3>John Doe</h3>
                        <span>Freelancer Programmer</span>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-external-link"></i></a>
                    </div>
                </div>
                
            </div>
            


        </div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('#team-carousel').owlCarousel({
		loop:true,
		margin:15,
		dots : true,
        autoplay : true,
        nav : true,
		responsive:{
			0: {
				items: 1
			},
			640:{
				items: 2
            },
            980 : {
                items: 4
            }
		}
	});
})

</script>
@append

