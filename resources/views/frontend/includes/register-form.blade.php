<?php 

?>
<div class="row my-5 py-5">
    <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{__('auth.pluc')}}</h3>
             </div>
              <div class="panel-body">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="{{__('auth.placeholders.ymail')}}" name="email" type="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('rid') is-invalid @enderror" placeholder="{{__('auth.placeholders.yrid')}}" name="rid" type="text" value="{{ old('rid') }}" required>
                        @error('rid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('fname') is-invalid @enderror" placeholder="{{__('auth.placeholders.yfname')}}" name="fname" type="text" value="{{ old('fname') }}" required>
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('lname') is-invalid @enderror" placeholder="{{__('auth.placeholders.ylname')}}" name="lname" type="text" value="{{ old('lname') }}" required>
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" placeholder="{{__('auth.placeholders.pass')}}" name="password" type="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__('auth.placeholders.passcon')}}" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <input class="btn-lg main-btn btn-block m-0 mb-2" type="submit" value="{{__('auth.sign')}}">
                    @if (Route::has('login'))
                        <div class="text-center">
                            <a class="" href="{{ route('login') }}">
                                {{ __('auth.aul') }}
                            </a>
                        </div>
                    @endif
                </fieldset>
                  </form>
            </div>
        </div>
    </div>
</div>