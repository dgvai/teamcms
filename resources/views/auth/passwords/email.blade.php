<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('frontend.layouts.frame')
@section('title',__('Forget Password').' - '.$site->name)
@section('nav')
@section('header-title',__('Forget Password'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
<div class="row my-5 py-5">
    <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{__('auth.pluc')}}</h3>
             </div>
              <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="{{__('Email Address')}}" name="email" type="text" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input class="btn-lg main-btn btn-block m-0 mb-2" type="submit" value="{{__('Send Password Reset Link')}}">
                </fieldset>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection