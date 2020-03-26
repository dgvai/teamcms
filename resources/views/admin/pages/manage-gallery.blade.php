<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Site Gallery Management - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Current Gallery'])
            <div class="row d-flex justify-content-center">
                @foreach($galleries as $image)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('storage/gallery/'.$image->image)}}">
                        <div class="card-body">
                            <h5 class="card-title">Caption</h5>
                            <p class="card-text">{{$image->caption}}</p>
                            <a href="#" class="text-primary edit card-link" data-id="{{$image->id}}" data-cap="{{$image->caption}}"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="text-danger delete card-link" data-id="{{$image->id}}"><i class="fas fa-times"></i> Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Add New Gallery Image'])
            <form role="form" action="{{route('add.gallery')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="images[]" multiple>
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="caption">Image Caption</label>
                    <input type="text" id="caption" name="caption" class="form-control" />
                </div>
                <input type="submit" class="btn btn-info" value="Add"/>
            </form>
            @endcomponent
        </div>
    </div>
    <div class="modal fade" id="edit_caption">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Caption</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.gallery')}}" method="POST">
                        @csrf 
                        <input type="hidden" class="dg-id" name="id">
                        <div class="form-group">
                            <label for="caption-2">Caption</label>
                            <input type="text" class="form-control" id="caption-2" name="caption">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update">
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
            $('.edit').click(function(){
                $('.dg-id').val($(this).data('id'));
                $('#caption-2').val($(this).data('cap'));
                $('#edit_caption').modal('show');
            });

            $('.delete').click(function(){
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This image will be permanently deleted. Are you confirmed?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        $.post("{{route('delete.gallery')}}",{id : id}, function(response){
                            if(response.success) {
                                Swal.fire('Deleted!','The image was deleted.','success');
                                reload(500)
                            } else {
                                Toast.fire({type: 'error',title: 'Something Went Wrong'});
                            }
                        })
                    }
                })
            });
        });
    </script>
@endsection