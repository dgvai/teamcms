<div class="team {{isset($home) ? '' : 'col-md-3'}}">
    <div class="team-img">
        <img class="img-responsive" src="{{asset('storage/users/avatars')}}/{{$user->display_photo}}" alt="{{$user->full_name}}">
    </div>
    <div class="team-content">
        <h3>{{$user->full_name}}</h3>
        <span>{{$user->current_designation}}</span>
    </div>
    <div class="team-social">
        <a href="{{route('user.profile',['roll_id' => $user->roll_id])}}" data-toggle="tooltip" data-placement="bottom" title="@lang('View Profile')"><i class="fa fa-external-link"></i></a>
        @foreach($user->connections as $link)
        <a href="{{$link->url}}" data-toggle="tooltip" data-placement="bottom" title="{{$link->name}}" target="_blank"><i class="fa {{$link->icon}}"></i></a>
        @endforeach
    </div>
</div>