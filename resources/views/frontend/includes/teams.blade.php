<div id="team" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('Committee Members')}}</h2>
            </div>
            <div id="team-carousel" class="owl-carousel owl-theme">
                @foreach($members as $member)
                @include('frontend.components.member-card',['user' => $member, 'home' => true])
                @endforeach
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

