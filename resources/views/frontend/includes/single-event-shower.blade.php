@section('meta_seo')
    <meta name="description" content="{{$event->seo->text}}">
    <meta name="keywords" content="{{str_replace(' ',',',$event->seo->title)}}">
    <meta property="og:title" content="{{$event->seo->title}}" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="{{route('home')}}" />
    <meta property="article:published_time" content="{{\Carbon\Carbon::parse($event->created_at)->format(DateTime::ISO8601)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('storage/events')}}/{{$event->poster}}" />
@endsection

<div id="event" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-8 white-bar m-0 p-0">
                <div class="poster" style="background-image: url('{{asset('storage/events')}}/{{$event->poster}}')">
                    @if($event->is_upcoming)
                    <div class="ribbon">{{__('Upcoming')}}</div>
                    @endif
                </div>
                <div class="details m-4 p-2">
                    <h2>{{$event->title}}</h2>
                    <div>{!!$event->post!!}</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row fixed-div">
                    <div class="col-md-12 my-4">
                        <div class="event-accordion owl-carousel owl-theme" id="accordion">
                            @if($event->multi == 0)
                            <div>
                                <p>@lang('Event Date')</p>
                                <h2>{{\Carbon\Carbon::parse($event->single_time)->toFormattedDateString()}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Time')</p>
                                <h2>{{\Carbon\Carbon::parse($event->single_time)->format('h:i A')}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Place')</p>
                                <h2>{{$event->place}}</h2>
                            </div>
                            @else 
                            <div>
                                <p>@lang('Event Starts From')</p>
                                <h2>{{\Carbon\Carbon::parse($event->multi_start_time)->toFormattedDateString()}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Starts From')</p>
                                <h2>{{\Carbon\Carbon::parse($event->multi_start_time)->format('h:i A')}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Ends')</p>
                                <h2>{{\Carbon\Carbon::parse($event->multi_end_time)->toFormattedDateString()}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Ends')</p>
                                <h2>{{\Carbon\Carbon::parse($event->multi_end_time)->format('h:i A')}}</h2>
                            </div>
                            <div>
                                <p>@lang('Event Place')</p>
                                <h2>{{$event->place}}</h2>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="bottom-link mb-4">
                            <h3> @lang('Event Links') </h3>
                            @foreach(json_decode($event->links) as $link)
                            <span style="display:block"> {{$link->name}} <a href="{{$link->url}}" style="float:right" target="_blank"> {{__('Browse')}} <i class="fa fa-external-link"></i></a> </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!$event->is_upcoming)
            @if($event->has_post)
            <div class="row my-4">
                <div class="col-md-8 white-bar m-0 p-0">
                    <h3 class="m-4 p-2">@lang('Post Event News')</h3>
                    <div class="owl-carousel owl-theme" id="post-slider">
                        @foreach(json_decode($event->postevent->images) as $i=>$img)
                            <div class="item"><img src="{{asset('storage/events/post')}}/{{$img}}" alt="{{$event->title}}"></div>
                        @endforeach
                    </div>
                    <div class="details m-4 p-2">
                        {!!$event->postevent->post!!}
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>

@section('scripts')
<script>
    $(function(){
        $('#accordion').owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            autoplay: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                640: {
                    items: 1
                },
                980: {
                    items: 1
                }
            }
        });

        $('#post-slider').owlCarousel({
            loop: true,
            margin: 15,
            dots: true,
            autoplay: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                640: {
                    items: 1
                },
                980: {
                    items: 1
                }
            }
        });
    })
</script>
@append