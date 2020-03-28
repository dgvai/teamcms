<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',__('Reset Password').' - '.$site->name)
@section('nav')
@section('header-title',__('Reset Password'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
<div class="row my-5 py-5">
    <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{__('Reset Your Password')}}</h3>
             </div>
              <div class="panel-body">
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email Address')}}" name="email" type="text" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('New Password')}}" name="password" value="{{ old('password') }}" required autocomplete="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{__('Confirm Password')}}" name="password_confirmation"  value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input class="btn-lg main-btn btn-block m-0 mb-2" type="submit" value="{{__('Reset')}}">
                </fieldset>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
