<div id="events" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
        @foreach($events as $event)
            @include('frontend.components.event-card',['event' => $event])
        @endforeach
        </div>
        <div class="text-center"> {{ $events->links('vendor.pagination.default') }}</div>
    </div>
</div>