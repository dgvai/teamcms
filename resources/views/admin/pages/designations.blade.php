<?php 
use App\Models\Entities\SiteBasics;
use App\Models\Entities\UserDesignations;
$site = SiteBasics::first();
$member_rank = ($site->member_rank == null) ? 'Unassigned' : UserDesignations::find($site->member_rank)->name;
?>

@extends('adminlte::page')
@section('title','Dashboard - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'info', 'title' => 'Total Designations', 'data' => $total->count(), 'icon' => 'fas fa-user-tag'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'success', 'title' => 'Active Designations', 'data' => $active->count(), 'icon' => 'fas fa-user-tag'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'danger', 'title' => 'Inactive Designations', 'data' => $total->count()-$active->count(), 'icon' => 'fas fa-user-tag'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'secondary', 'title' => 'General Member Designation', 'data' => $member_rank, 'icon' => 'fas fa-user-tag'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'info', 'title' => 'New Designation'])
                        @include('admin.includes.new-designation-form')
                    @endcomponent
                </div>
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'info', 'title' => 'Select General Members Designation'])
                        @include('admin.includes.select-general',['ranks' => $active])
                    @endcomponent
                </div>
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'danger', 'title' => 'All Designations'])
                        @include('admin.includes.all-designations',['items' => $total->sortBy('value')])
                    @endcomponent
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'success', 'title' => 'Active Designations'])
                @include('admin.includes.active-designations')
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