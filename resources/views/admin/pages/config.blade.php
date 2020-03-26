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
            <div class="row">
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'primary', 'title' => 'App Configurations'])
                    <form action="{{route('app.config')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="APP_NAME">APP_NAME</label>
                            <input type="text" id="APP_NAME" name="APP_NAME" class="form-control" value="{{config('app.name')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="APP_DEBUG">APP_DEBUG</label>
                            <select id="APP_DEBUG" class="form-control select2" style="width: 100%;" name="APP_DEBUG">
                                <option value="true" {{config('app.debug') ? 'selected' : ''}}>True</option>
                                <option value="false" {{!config('app.debug') ? 'selected' : ''}}>False</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update Configuration" />
                    </form>
                    @endcomponent
                </div>
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Database Configurations'])
                    <form action="{{route('db.config')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="DB_HOST">DB_HOST</label>
                            <input type="text" id="DB_HOST" name="DB_HOST" class="form-control" value="{{config('database.connections.mysql.host')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="DB_PORT">DB_PORT</label>
                            <input type="text" id="DB_PORT" name="DB_PORT" class="form-control" value="{{config('database.connections.mysql.port')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="DB_DATABASE">DB_DATABASE</label>
                            <input type="text" id="DB_DATABASE" name="DB_DATABASE" class="form-control" value="{{config('database.connections.mysql.database')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="DB_USERNAME">DB_USERNAME</label>
                            <input type="text" id="DB_USERNAME" name="DB_USERNAME" class="form-control" value="{{config('database.connections.mysql.username')}}"/>
                        </div>
                        <div class="form-group">
                            <label for="DB_PASSWORD">DB_PASSWORD</label>
                            <input type="text" id="DB_PASSWORD" name="DB_PASSWORD" class="form-control" value="{{config('database.connections.mysql.password')}}"/>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update Configuration" />
                    </form>
                    @endcomponent
                </div>
            </div>
        </div>
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