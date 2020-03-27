<div class="row m-4 event">
    <div class="col-md-4 px-0 mx-0">
        <img class="img-responsive card-image" src="{{asset('storage/events')}}/{{$event->poster}}">
        @if($event->is_upcoming)
        <div class="ribbon">{{__('Upcoming')}}</div>
        @endif
        
    </div>
    <div class="col-md-8 p-4">
        <a href="{{route('event.show',['slug' => $event->slug])}}"><h3>{{$event->title}}</h3></a>
        <p>{!!mb_substr(strip_tags($event->post),0,150).'...'!!}</p>
        <ul class="event-meta">
            @if($event->is_upcoming)
            <li><i class="fa fa-star"></i>{{__('Upcoming')}}</li>
            @endif
            <li><i class="fa fa-clock-o"></i>{{($event->multi == 0) ? \Carbon\Carbon::parse($event->single_time)->toFormattedDateString() : \Carbon\Carbon::parse($event->multi_start_time)->toFormattedDateString() .' to '. \Carbon\Carbon::parse($event->multi_end_time)->toFormattedDateString()}}</li>
        </ul>
        <div class="event-links">
            <a href="{{route('event.show',['slug' => $event->slug])}}">@lang('Browse Event') <i class="fa fa-arrow-right"></i></a>
            @foreach(json_decode($event->links) as $link)
            <a href="{{$link->url}}" target="_blank">{{$link->name}} <i class="fa fa-external-link"></i></a>
            @endforeach
        </div>
    </div>
</div>