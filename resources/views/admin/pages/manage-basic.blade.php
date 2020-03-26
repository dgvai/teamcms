<?php 
use App\Models\Entities\SiteBasics;
use App\Models\Entities\SiteAbout;
$site = SiteBasics::first();
$about = SiteAbout::first()->about;
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
                <form role="form" class="row" action="{{route('change.basic.meta')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="home">Home Page</label>
                        <input type="text" id="home" name="home" class="form-control" value="{{$site->meta_titles->home}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="committee">Committee page</label>
                        <input type="text" id="committee" name="committee" class="form-control" value="{{$site->meta_titles->committee}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="members">Members page</label>
                        <input type="text" id="members" name="members" class="form-control" value="{{$site->meta_titles->members}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alumnis">Alumnis page</label>
                        <input type="text" id="alumnis" name="alumnis" class="form-control" value="{{$site->meta_titles->alumnis}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="events">Events page</label>
                        <input type="text" id="events" name="events" class="form-control" value="{{$site->meta_titles->events}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blogs">Blogs page</label>
                        <input type="text" id="blogs" name="blogs" class="form-control" value="{{$site->meta_titles->blogs}}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="about">About page</label>
                        <input type="text" id="about" name="about" class="form-control" value="{{$site->meta_titles->about}}" />
                    </div>
                    <div class="col-md-12">
                    <input type="submit" class="btn btn-info" value="Update">
                    </div>
                </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Contact Info'])
                <form role="form" action="{{route('change.basic.contact')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{$site->contact_data->phone}}" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{$site->contact_data->email}}" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{$site->contact_data->address}}" />
                    </div>
                    <input type="submit" class="btn btn-info" value="Update">
                </form>
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Site Social Links'])
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="{{route('add.site.link')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Social Link Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="url">Social Link Url (with protocol)</label>
                                <input type="text" id="url" name="url" class="form-control"  placeholder="https://"/>
                            </div>
                            <div class="form-group">
                                <label>Select Icon</label>
                                <select class="form-control select2" style="width: 100%;" name="icon">
                                    <option selected disabled>Choose icon</option>
                                    @foreach($icons as $icon)
                                    <option value="{{$icon->icon}}" data-icon="{{$icon->icon}}">{{ucfirst($icon->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-info" value="Add" />
                        </form>
                    </div>
                    <div class="col-md-12">
                        <h3 class="mt-3">Links List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($links as $link)
                                <tr>
                                    <td><i class="fab {{$link->icon}}"></i> {{$link->name}}</td>
                                    <td><i class="fas fa-edit text-primary mx-1 edit" data-id="{{$link->id}}" data-url="{{$link->url}}"></i> <i class="fas fa-times text-danger mx-1 remove" data-id="{{$link->id}}"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            @endcomponent
        </div>
        <div class="col-md-8">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'About Us (Our Story)'])
                <form role="form" action="{{route('save.about')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="about_us">Our Story</label>
                        <textarea class="summernote" name="about" id="about_us">{!!$about!!}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Save" />
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
    <div class="modal fade" id="edit_link">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Link</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.site.link')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="dg-id">
                        <div class="form-group">
                            <label for="url-2">URL</label>
                            <input type="text" id="url-2" name="url" class="form-control" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update Link" />
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
    <script>
        $(()=>{
            bsCustomFileInput.init();

            function iformat(icon) {
                var originalOption = icon.element;
                return $('<span><i class="fab ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '</span>');
            }
            $('.select2').select2({
                templateSelection: iformat,
                templateResult: iformat,
                allowHtml: true
            });

            $('.edit').click(function(){
                $('.dg-id').val($(this).data('id'));
                $('#url-2').val($(this).data('url'));
                $('#edit_link').modal('show');
            })

            $('.remove').click(function(){
                let id = $(this).data('id');
                $.post("{{route('delete.site.link')}}",{id:id},function(r){
                    if(r.success) {
                        Toast.fire({type: 'success',title: 'Removed!'});
                        reload(500);
                    }
                })
            })

            $('#about_us').summernote({
                placeholder: 'Write a beautiful story for the section...',
                height: 600,
                fontNames: ['Montserrat', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Impact', 'Open Sans', 'Ubuntu', 'Rajdhani']
            });
        })
    </script>
@endsection