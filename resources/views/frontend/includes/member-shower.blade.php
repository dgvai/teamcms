<div id="team" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            @for($i = 0; $i< 10; $i++)
            @include('frontend.components.member-card',['i' => $i])
            @endfor
        </div>
    </div>
</div>