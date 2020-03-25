<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','App Configurations - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Change Mail Configurations'])
            <form action="{{route('mail.config')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="MAIL_DRIVER">MAIL_DRIVER</label>
                    <input type="text" id="MAIL_DRIVER" name="MAIL_DRIVER" class="form-control" value="{{config('mail.driver')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_HOST">MAIL_HOST</label>
                    <input type="text" id="MAIL_HOST" name="MAIL_HOST" class="form-control" value="{{config('mail.host')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_PORT">MAIL_PORT</label>
                    <input type="text" id="MAIL_PORT" name="MAIL_PORT" class="form-control" value="{{config('mail.port')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_USERNAME">MAIL_USERNAME</label>
                    <input type="text" id="MAIL_USERNAME" name="MAIL_USERNAME" class="form-control" value="{{config('mail.username')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_PASSWORD">MAIL_PASSWORD</label>
                    <input type="text" id="MAIL_PASSWORD" name="MAIL_PASSWORD" class="form-control" value="{{config('mail.password')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_ENCRYPTION">MAIL_ENCRYPTION</label>
                    <input type="text" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" class="form-control" value="{{config('mail.encryption')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_FROM_ADDRESS">MAIL_FROM_ADDRESS</label>
                    <input type="text" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" class="form-control" value="{{config('mail.from.address')}}"/>
                </div>
                <div class="form-group">
                    <label for="MAIL_FROM_NAME">MAIL_FROM_NAME</label>
                    <input type="text" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" class="form-control" value="{{config('mail.from.name')}}"/>
                </div>
                <input type="submit" class="btn btn-primary" value="Update Configuration" />
            </form>
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>

@endsection