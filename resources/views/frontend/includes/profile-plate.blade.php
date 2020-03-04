<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mainframe white-bar m-0 p-2 mb-2">
                            <div class="photo">
                                <img class="img-responsive" src="{{asset('storage/users/avatars/'.$user->display_photo)}}" alt="{{$user->full_name}}">
                            </div>
                            <div class="text-center my-4">
                                <h3 class="text-uppercase">{{$user->full_name}}</h3>
                                <h6>{{$user->desig->name}}</h6>
                                <p>{{$user->about}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sideframe white-bar m-0 p-2 mb-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Informations')</h3>
                            <table class="table">
                                <tr>
                                    <th>@lang('First Name')</th><th>@lang('Last Name')</th>
                                </tr>
                                <tr>
                                    <td>{{$user->details->first_name}}</td><td>{{$user->details->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>@lang('Birthdate')</th><th>@lang('Department')</th>
                                </tr>
                                <tr>
                                    <td>{{$user->details->birthdate}}</td><td>{{$user->details->department}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">@lang('Email')</th>
                                </tr>
                                <tr>
                                    <td colspan="2">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">@lang('Phone')</th>
                                </tr>
                                <tr>
                                    <td colspan="2">{{$user->details->phone}}</td>
                                </tr>
                            </table>
                            <div class="social-links">
                                @foreach($user->connections as $link)
                                <a href="{{$link->url}}" data-toggle="tooltip" data-placement="bottom" title="{{$link->name}}" target="_blank"><i class="{{$link->icon}}"></i></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-bar mx-0 mb-2 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Extra Informatons')</h3>
                            <table class="table">
                                <tr>
                                    <th colspan="2">Extra Term 1</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Lorem ipsum dolor sit amet</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 2</th>
                                </tr>
                                <tr>
                                    <td colspan="2">consectetur adipiscing elit</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 3</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Ut enim ad minim veniam</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 4</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(auth()->user() == $user)
                <div class="white-bar mx-0 mb-2 p-2 text-center">
                    <a href="#" class="btn main-btn"><i class="fa fa-edit"></i> @lang('Edit Profile')</a>
                    <a href="#!" class="btn main-btn"><i class="fa fa-plus"></i> @lang('Add Portfolio')</a>
                    <a href="#" class="btn main-btn"><i class="fa fa-cog"></i> @lang('Settings')</a>
                </div>
                @endif
                @if($user->portfolios->count() == 0)
                <div class="postfram white-bar m-0 p-2 mb-2">
                    <div class="alert alert-warning mb-0">@lang('User have not posted any portfolio yet!')</div>
                </div>
                @else 
                    @foreach($user->portfolios as $portfolio)
                        @include('frontend.components.portfolio-card',['portfolio' => $portfolio])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

