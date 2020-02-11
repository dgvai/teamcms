<?php 

?>
<div class="row my-5 py-5">
    <div class="col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{__('auth.pluc')}}</h3>
             </div>
              <div class="panel-body">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="{{__('auth.placeholders.email')}}" name="email" type="text" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" placeholder="{{__('auth.placeholders.pass')}}" name="password" type="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox"> {{__('auth.placeholders.remb')}}
                        </label>
                    </div>
                    <input class="btn-lg main-btn btn-block m-0 mb-2" type="submit" value="{{__('auth.login')}}">
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('auth.fgp') }}
                            </a>
                        </div>
                    @endif
                </fieldset>
                  </form>
            </div>
        </div>
    </div>
</div>