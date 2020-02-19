<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Dashboard - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

{{-- @section('content_header')
    <h1> @lang('Dashboard') </h1>
@endsection --}}

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.widgets.small-box',['bg' => 'danger', 'title' => 'New Member Approval', 'data' => $count->new_members, 'url' => route('admin.users'), 'icon' => 'fas fa-user-plus'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.small-box',['bg' => 'info', 'title' => 'New Blog Approval', 'data' => '2', 'url' => '#', 'icon' => 'fas fa-rss'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.small-box',['bg' => 'warning', 'title' => 'Upcoming Events', 'data' => $count->upcoming_events, 'url' => route('admin.events.create'), 'icon' => 'fas fa-calendar-alt', 'urlText' => 'Create Event'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.small-box',['bg' => 'success', 'title' => 'Site Health', 'data' => '100% OK', 'url' => '#', 'icon' => 'fas fa-heartbeat'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Member Informations'])
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'info', 'icon' => 'fas fa-user-friends', 'title' => 'Total Members', 'data' => $count->total_members])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'success', 'icon' => 'fas fa-users', 'title' => 'Current Members', 'data' => $count->current_members])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'warning', 'icon' => 'fas fa-users-cog', 'title' => 'Committee Members', 'data' => $count->committee_members])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'secondary', 'icon' => 'fas fa-user-tie', 'title' => 'Alumni Members', 'data' => $count->alumni_members])
                    </div>
                </div>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'success', 'title' => 'Content Informations'])
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'info', 'icon' => 'fas fa-rss', 'title' => 'Total Blogs', 'data' => 0])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'success', 'icon' => 'fas fa-calendar-alt', 'title' => 'Total Events', 'data' => $count->total_events])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'warning', 'icon' => 'fas fa-rss-square', 'title' => 'Total Bulletins', 'data' => 0])
                    </div>
                    <div class="col-md-6">
                        @include('admin.widgets.info-box',['bg' => 'secondary', 'icon' => 'fas fa-images', 'title' => 'Total Gallery', 'data' => 0])
                    </div>
                </div>
            @endcomponent
        </div>
    </div>
@endsection


@section('js')
    
@endsection
