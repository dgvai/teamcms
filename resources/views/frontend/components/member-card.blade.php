<div class="team {{isset($home) ? '' : 'col-md-3'}}">
    <div class="team-img">
        <img class="img-responsive" src="{{asset('storage/users/avatars')}}/{{$user->display_photo}}" alt="{{$user->full_name}}">
    </div>
    <div class="team-content">
        <h3>{{$user->full_name}}</h3>
        <span>{{$user->desig->name}}</span>
    </div>
    <div class="team-social">
        <a href="#"><i class="fa fa-facebook-f"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook-f"></i></a>
        <a href="#"><i class="fa fa-external-link"></i></a>
    </div>
</div>