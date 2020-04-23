<?php 
use App\Models\Entities\SiteBasics;
use App\Models\Entities\UserDesignations;

$ranks = UserDesignations::where('active',1)->get();
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
            @include('admin.widgets.info-box',['bg' => 'info', 'title' => 'Current Members', 'data' => $currentMembers->count(), 'icon' => 'fas fa-users'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'warning', 'title' => 'Committee Members', 'data' => ($committeeUsers == null) ? 0 :$committeeUsers->count(), 'icon' => 'fas fa-users-cog'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'success', 'title' => 'Alumni Members', 'data' => $alumniUsers->count(), 'icon' => 'fas fa-user-tie'])
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
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members Rejected', 'data' => 'Currently no new memebers has requested to join.'])
                @else
                @include('admin.includes.member-requests',['users' => $rejectedUsers])
                @endif
            @endcomponent
        </div>
        <div class="col-md-12">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Assign Designation'])
                @if($unassignedUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No New Members', 'data' => 'Currently no new memeber left assign!'])
                @else
                @include('admin.includes.member-assign',['users' => $unassignedUsers, 'ranks' => $ranks])
                @endif
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'success', 'title' => 'Promote Members'])
                @if($memberUsers == null || $memberUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members', 'data' => 'Currently no memebers assigned!'])
                @else
                @include('admin.includes.member-promote',['users' => $memberUsers, 'ranks' => $ranks])
                @endif
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'success', 'title' => 'Manage Committee'])
                @if($committeeUsers == null || $committeeUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members', 'data' => 'Currently no memebers assigned!'])
                @else
                @include('admin.includes.manage-committee',['users' => $committeeUsers, 'ranks' => $ranks])
                @endif
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'warning', 'title' => 'Move to Alumni'])
                @if($currentMembers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members', 'data' => 'Currently no memebers assigned!'])
                @else
                @include('admin.includes.move-alumni',['users' => $currentMembers])
                @endif
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'warning', 'title' => 'Alumni Manager'])
                @if($alumniUsers->count() == 0)
                @include('admin.widgets.alert',['type' => 'light', 'title' => 'No Members', 'data' => 'Currently no memebers assigned!'])
                @else
                @include('admin.includes.manage-alumni',['users' => $alumniUsers])
                @endif
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
@endsection

