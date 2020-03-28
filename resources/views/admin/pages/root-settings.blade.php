<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Root Settings - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Change Password'])
            <form action="{{route('root.password')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" id="old_password" name="old_password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="new_password2">Confirm Password</label>
                    <input type="password" id="new_password2" name="new_password2" class="form-control"/>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Change"/>
                </div>
            </form>
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
    <script>
        $(()=>{
            
        })
    </script>
@endsection