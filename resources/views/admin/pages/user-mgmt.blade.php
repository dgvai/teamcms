<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Dashboard - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'danger', 'title' => 'New Member Approval', 'data' => $newUsers->count(), 'icon' => 'fas fa-user-plus'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'info', 'title' => 'Current Members', 'data' => '2', 'icon' => 'fas fa-users'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'warning', 'title' => 'Committee Members', 'data' => '1', 'icon' => 'fas fa-users-cog'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'success', 'title' => 'Alumni Members', 'data' => '10', 'icon' => 'fas fa-user-tie'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'danger', 'title' => 'New Member Approval'])
                @if($newUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No New Members', 'data' => 'Currently no new memebers has requested to Join.'])
                @else
                @include('admin.includes.member-requests',['users' => $newUsers])
                @endif
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'warning', 'title' => 'Rejected Members'])
                @if($rejectedUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members Rejected', 'data' => 'Currently no new memebers has requested to Join.'])
                @else
                @include('admin.includes.member-requests',['users' => $rejectedUsers])
                @endif
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script>
        let Toast;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $(function(){
            Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        })
    </script>
@endsection

