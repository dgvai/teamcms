<div id="team" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            @foreach($members as $member)
                @include('frontend.components.member-card',['user' => $member])
            @endforeach
        </div>
    </div>
</div>