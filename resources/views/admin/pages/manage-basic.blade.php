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
                        <img src="{{asset('storage/sitebasics/'.$site->favicon)}}" class="img-responsive" width="32px"/>
                        <p class="text-center">Favicon</p>
                    </div>
                </div>
                <form role="form" action="{{route('change.basic.image')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="logo">Logo (668px x 160px)</label>
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
                        <label for="logo_alt">Logo-Alt (668px x 160px)</label>
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
                        <label for="favicon">Favicon (32px x 32px)</label>
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
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Meta Page Titles'])
                <form role="form" action="{{route('change.basic.meta')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="home">Home Page</label>
                        <input type="text" id="home" name="home" class="form-control" value="{{$site->meta_titles->home}}" />
                    </div>
                    <div class="form-group">
                        <label for="committee">Committee page</label>
                        <input type="text" id="committee" name="committee" class="form-control" value="{{$site->meta_titles->committee}}" />
                    </div>
                    <div class="form-group">
                        <label for="members">Members page</label>
                        <input type="text" id="members" name="members" class="form-control" value="{{$site->meta_titles->members}}" />
                    </div>
                    <div class="form-group">
                        <label for="alumnis">Alumnis page</label>
                        <input type="text" id="alumnis" name="alumnis" class="form-control" value="{{$site->meta_titles->alumnis}}" />
                    </div>
                    <div class="form-group">
                        <label for="events">Events page</label>
                        <input type="text" id="events" name="events" class="form-control" value="{{$site->meta_titles->events}}" />
                    </div>
                    <div class="form-group">
                        <label for="blogs">Blogs page</label>
                        <input type="text" id="blogs" name="blogs" class="form-control" value="{{$site->meta_titles->blogs}}" />
                    </div>
                    <div class="form-group">
                        <label for="about">About page</label>
                        <input type="text" id="about" name="about" class="form-control" value="{{$site->meta_titles->about}}" />
                    </div>
                    <input type="submit" class="btn btn-info" value="Update">
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
            bsCustomFileInput.init();
        })
    </script>
@endsection