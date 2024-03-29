<div class="masonry-grid white-bar m-1 p-2">
    <img src="{{asset('storage/users/portfolios/'.$portfolio->images)}}" class="img-responsive" alt="{{$portfolio->caption}}">
    <h3 class="m-2">{{$portfolio->caption}}</h3>
    <p class="m-2">{!!$portfolio->post!!}</p>
    <ul class="ul-meta">
        @if($portfolio->user->id == auth()->id())
        <li><i class="fa fa-edit"></i> <a href="{{route('user.profile.edit.portfolio',['id' => $portfolio->id])}}">@lang('Edit')</a></li>
        @endif
        <li><i class="fa fa-clock-o"></i> @lang('Posted'): {{\Carbon\Carbon::parse($portfolio->created_at)->format('d F, Y')}}</li>
        @if($portfolio->user->id == auth()->id())
        <li><i class="fa fa-trash"></i> <a href="#" class="delete-port" data-pid="{{$portfolio->id}}">@lang('Delete')</a></li>
        @endif
    </ul>
</div>
