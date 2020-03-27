<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-1">
                <div class="white-bar m-0 p-2 mb-2">
                    <div class="photo">
                        <img class="img-responsive" src="{{asset('storage/users/avatars/'.$user->display_photo)}}" alt="{{$user->full_name}}">
                    </div>
                    <div class="text-center my-4">
                        <h3 class="text-uppercase">{{$user->full_name}}</h3>
                        <h6>{{$user->desig->name}}</h6>
                    </div>
                    <div class="social-links">
                        @foreach($user->connections as $link)
                        <a href="{{$link->url}}" data-toggle="tooltip" data-placement="bottom" title="{{$link->name}}" target="_blank"><i class="fa {{$link->icon}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-8 p-1">
                <div class="white-bar m-0 p-2 mb-2">
                    <h3 class="text-center main-color text-uppercase m-2">@lang('Informations')</h3>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('First Name')</b>:
                            <span>{{$user->details->first_name}}</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('Last Name')</b>:
                            <span>{{$user->details->last_name}}</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('Birthdate')</b>:
                            <span>{{$user->details->birthdate}}</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('Department')</b><br>
                            <span>{{$user->details->department}}</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('Email Address')</b><br> 
                            <span>{{$user->email}}</span>
                        </div>
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>@lang('Phone')</b><br> 
                            <span>{{$user->details->phone}}</span>
                        </div>
                    </div>
                    @if(count(($user->extras)) > 0)
                    <h3 class="text-center main-color text-uppercase m-2">@lang('Extra Informations')</h3>
                    <div class="row">
                        @foreach($user->extras as $ext)
                        <div class="col-sm-4 col-xs-12 p-1 m-0 text-center">
                            <b>{{deslugify($ext->key,'_')}}</b><br> 
                            <span>{{$ext->value}}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="">
                    @if(auth()->user() &&(auth()->id() == $user->id))
                    <div class="white-bar mx-0 mb-2 p-2 text-center">
                        <a href="{{route('user.profile.edit',['roll_id' => $user->roll_id])}}" class="btn main-btn btn-sm"><i class="fa fa-edit"></i> @lang('Edit Profile')</a>
                        <a href="{{route('user.profile.add.portfolio')}}" class="btn main-btn btn-sm"><i class="fa fa-plus"></i> @lang('Add Portfolio')</a>
                        <a href="{{route('user.profile.settings',['id' => auth()->user()->roll_id])}}" class="btn main-btn btn-sm"><i class="fa fa-cog"></i> @lang('Settings')</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if($user->portfolios->count() == 0)
        <div class="postfram white-bar m-0 p-2 mb-2">
            <img src="{{asset('frontends/imgs/empty.png')}}" class="img-responsive" style="opacity: 0.5" width="100%" />
            <span class="overlay-message">@lang('No Portfolio Posted!')</span>
        </div>
        @else 
        <div class="masonry">
            @foreach($user->portfolios->sortByDesc('id') as $portfolio)
                @include('frontend.components.portfolio-card',['portfolio' => $portfolio])
            @endforeach
        </div>
        @endif
    </div>
</div>

@section('additional-js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.all.min.js"></script>
@endsection

@section('scripts')
    @parent
    <script>
        $('.delete-port').click(function(){
            let pid = $(this).data('pid');
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                $.post("{{route('user.profile.delete.portfolio')}}",{pid:pid,_token:'{{csrf_token()}}'},function(r){
                    if(r.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Deleted'
                        });
                        setTimeout(function(){
                            window.location.reload();
                        },500);
                    }
                })
            })
        })

        $('.masonry').masonry({
            itemSelector: '.masonry-grid',
        });
    </script>
@endsection



