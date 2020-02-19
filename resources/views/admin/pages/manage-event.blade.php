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
            @include('admin.widgets.info-box',['bg' => 'primary', 'title' => 'Upcoming Events', 'data' => $upcomings->count(), 'icon' => 'fas fa-calendar-alt'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'success', 'title' => 'All Events', 'data' => $events->count(), 'icon' => 'fas fa-calendar-alt'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Manage Events'])
                @include('admin.includes.manage-events',['events' => $events->sortBy('id')])
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
        });

        
    </script>
@endsection