<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Site Basic Management - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Basic Informations'])
                <form role="form" action="{{route('change.basic.text')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Site Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$site->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="fullname">Site Fullname</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="{{$site->fullname}}" />
                    </div>
                    <div class="form-group">
                        <label for="tagline">Site Tagline</label>
                        <input type="text" id="tagline" name="tagline" class="form-control" value="{{$site->tagline}}" />
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea id="short_description" name="short_description" class="form-control" rows="3">{{$site->short_description}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-info" value="Update">
                </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Site Logo'])
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{asset('storage/sitebasics/'.$site->logo)}}" class="img-responsive" width="100%"/>
                        <p class="text-center">Site Logo</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('storage/sitebasics/'.$site->logo_alt)}}" class="img-responsive" width="100%"/>
                        <p class="text-center">Site Logo-alt</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="{{asset('storage/sitebasics/'.$site->favicon)}}" class="img-responsive"/>
                        <p class="text-center">Favicon</p>
                    </div>
                </div>
                <form role="form" action="{{route('change.basic.image')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                <label class="custom-file-label" for="logo">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo_alt">Logo (Alt)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo_alt" name="logo_alt">
                                <label class="custom-file-label" for="logo_alt">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="favicon" name="favicon">
                                <label class="custom-file-label" for="favicon">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" value="Change">
                </form>
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
@endsection