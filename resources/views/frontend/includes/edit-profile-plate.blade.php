<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="white-bar my-2 mx-0 p-2">
                    <h3 class="text-center text-uppercase mt-3">@lang('Basic Informations')</h3>
                    <form class="base-form" style="text-align:left" action="{{route('user.profile.edit.basic')}}" method="POST">
                        @csrf
                        <input type="hidden" name="roll_id" value="{{$user->roll_id}}">
                        <label for="fname" class="mx-3 mt-2">@lang('First Name')</label>
                        <input type="text" id="fname" name="first_name" class="form" placeholder="@lang('First Name')" value="{{$user->details->first_name}}">

                        <label for="lname" class="mx-3 mt-2">@lang('Last Name')</label>
                        <input type="text" id="lname" name="last_name" class="form" placeholder="@lang('Last Name')" value="{{$user->details->last_name}}">

                        <label for="bdate" class="mx-3 mt-2">@lang('Birthdate')</label>
                        <input type="date" id="bdate"name="birthdate"  class="form" placeholder="@lang('Birthdate')" value="{{$user->details->birthdate}}">
                        {{-- <input type="checkbox" class="input ml-3" name="bday-privacy"> @lang('Keep hidden from public?')<br> --}}

                        <label for="dept" class="mx-3 mt-2">@lang('Department')</label>
                        <input type="text" id="dept" name="department" class="form" placeholder="@lang('Department')" value="{{$user->details->department}}">

                        <label for="email" class="mx-3 mt-2">@lang('Email')</label>
                        <input type="text" id="email" name="email" class="form" placeholder="@lang('Email')" value="{{$user->email}}" disabled>

                        <label for="phone" class="mx-3 mt-2">@lang('Phone')</label>
                        <input type="text" id="phone" name="phone" class="form" placeholder="@lang('Phone')" value="{{$user->details->phone}}">

                        <label for="summary" class="mx-3 mt-2">@lang('About Yourself')</label>
                        <textarea class="form" id="summary" name="about" placeholder="@lang('Write about yourself, upto 500 chars...')"></textarea>

                        <input type="submit" class="btn main-btn my-3" value="@lang('Update Profile')">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-bar my-2 mx-0 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Profile Avatar')</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="{{asset('storage/users/avatars/'.$user->display_photo)}}">
                                </div>
                                <div class="col-md-8">
                                    <form class="base-form" style="text-align:left; margin-top:0" action="{{route('user.profile.edit.dp')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="" for="fileup">@lang('Upload new avatar')</label>
                                        <input type="file" id="fileup" name="avatar" class="input">
                                        <input type="submit" class="main-btn btn" value="@lang('Upload')">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="white-bar my-2 mx-0 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Extra Informations')</h3>
                            <form class="base-form" style="text-align:left" action="{{route('user.profile.edit.extra')}}" method="POST">
                                @csrf
                                @foreach($extra as $i=>$ex)
                                <label for="{{$ex->key}}" class="mx-3 mt-2">{{$ex->name}}</label>
                                <input type="text" id="{{$ex->key}}" class="form" name="{{$ex->key}}" placeholder="Enter {{$ex->name}}" value="{{ isset($user->extras[$i]->value) ? $user->extras[$i]->value : '' }}">
                                @endforeach
                                <input type="submit" class="btn main-btn my-3" value="@lang('Update Profile')">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="white-bar my-2 mx-0 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Social Links')</h3>
                            <form class="base-form" style="text-align:left" action="{{route('user.profile.edit.socials')}}" method="POST">
                                @csrf
                                @foreach($social as $i=>$ex)
                                <label for="{{$ex->name}}" class="mx-3 mt-2">{{deslugify($ex->name,'_')}}</label>
                                <input type="text" id="{{$ex->name}}" class="form" name="{{$ex->name}}%{{$ex->icon}}" placeholder="Enter {{$ex->name}} url" value="{{ isset($user->connections[$i]->value) ? $user->connections[$i]->value : '' }}">
                                @endforeach
                                <input type="submit" class="btn main-btn my-3" value="@lang('Update Profile')">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>