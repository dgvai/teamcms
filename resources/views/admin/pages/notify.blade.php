<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Send Mails - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Send Email to Specific Members'])
            <form role="form" action="" method="POST">
                
            </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Send Email to All Members'])
            @endcomponent
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>

@endsection