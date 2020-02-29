<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Blogs - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'info', 'title' => 'New Blogs', 'data' => $new->count(), 'icon' => 'fas fa-rss'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'success', 'title' => 'Total Blogs', 'data' => $blogs->count(), 'icon' => 'fas fa-rss'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'New Blog Approvals'])
                @if($new->count() == 0)
                    @include('admin.widgets.alert',['type' => 'light', 'title' => 'No New Blogs', 'data' => 'Currently no new blogs has been posted.'])
                @else
                    @include('admin.includes.blog-approval',['blogs' => $new])
                @endif
            @endcomponent
        </div>
        <div class="col-md-12">
            @component('admin.widgets.card',['bg' => 'success', 'title' => 'Manage Blogs'])
                @include('admin.includes.blog-manage',['blogs' => $blogs])
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
@endsection