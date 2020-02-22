<?php 

?>

<div id="blog" class="section md-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('home.rcevs')}}</h2>
            </div>
            <div id="event-carousel" class="owl-carousel owl-theme">
                @for($i = 0; $i< 1; $i++)
                @include('frontend.components.event-card',['i' => $i])
                @endfor
            </div>

        </div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('#event-carousel').owlCarousel({
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
				items: 1
            },
            980 : {
                items: 1
            }
		}
	});
})

</script>
@append