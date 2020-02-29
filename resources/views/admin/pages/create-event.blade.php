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
<form role="form" action="{{route('events.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Event Data'])
                        <div class="form-group">
                            <label for="ev-name">Event Title</label>
                            <input type="text" class="form-control" id="ev-name" name="title" placeholder="Name of the event" required>
                        </div>
                        <div class="form-group">
                            <label for="ev-poster">Event Poster</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ev-poster" name="poster">
                                    <label class="custom-file-label" for="ev-poster">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="multiday">Multiday Event?</label>
                            <input type="checkbox" id="multiday" name="multi" data-toggle="toggle">
                        </div>
                        <div class="form-group" id="single-day-event">
                            <label for="datetime">Event Date & Time</label>
                            <input type="text" class="form-control datetimepicker-input" id="datetimepicker-single" name="date_single" data-toggle="datetimepicker" data-target="#datetimepicker-single"/>
                        </div>
                        <div class="row" id="multi-day-event">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datetime">Event Start Date & Time</label>
                                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker-start" name="date_start" data-toggle="datetimepicker" data-target="#datetimepicker-start"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datetime">Event End Date & Time</label>
                                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker-end" name="date_end" data-toggle="datetimepicker" data-target="#datetimepicker-end"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ev-place">Event Place/Location</label>
                            <input type="text" class="form-control" id="ev-place" name="place" placeholder="Place or location of the event" required>
                        </div>
                    @endcomponent
                </div>
                <div class="col-md-12">
                    @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Event Links'])
                        <input type="hidden" name="links" id="links-object">
                        <div id="result-of-links" class="my-2"></div>
                        <button type="button" class="btn btn-primary" id="add-links" data-toggle="modal" data-target="#add-links-modal">Add Event Links</button>
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Event Details'])
                <div class="form-group">
                    <label for="ev-body">Event Details</label>
                    @include('admin.widgets.text-editor',['class' => 'input summernote','name' => 'text','id' => 'ev-body','height' => 500,'placeholder' => 'Write the event body post...'])
                </div>
            @endcomponent
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <input type="submit" class="btn btn-primary btn-lg btn-block mx-5 my-5" value="Create Event">
        </div>
    </div>
</form>

<div class="modal fade" id="add-links-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Links</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link-name">Link Name</label>
                            <input type="text" class="form-control" id="link-name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link-url">Link Url</label>
                            <input type="text" class="form-control" id="link-url">
                        </div>
                    </div>
                    <div class="col-md-12" id="result-lists"></div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="button" id="add-more-btn" class="btn btn-success"><i class="fas fa-plus"></i> Add Another</button>
                    </div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="button" id="complete-btn" class="btn btn-primary"><i class="fas fa-check"></i> Complete</button>
                    </div>
                </div>
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
        $(function(){
            let linkObj = [];
            
            $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, { icons: { time: 'fas fa-clock', date: 'fas fa-calendar', up: 'fas fa-arrow-up', down: 'fas fa-arrow-down', previous: 'fas fa-caret-left', next: 'fas fa-caret-right', today: 'far fa-calendar-check-o', clear: 'far fa-trash', close: 'far fa-times' } });
            $('#datetimepicker-single').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});
            $('#datetimepicker-start').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});
            $('#datetimepicker-end').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});

            bsCustomFileInput.init()

            $('#multi-day-event').hide();
            $('#multiday').change(function(){
                if($(this).prop('checked')) {
                    $('#multi-day-event').show();
                    $('#single-day-event').hide();
                } else {
                    $('#multi-day-event').hide();
                    $('#single-day-event').show();
                }
            });

            $('#add-links-modal').on('shown.bs.modal',function(){
                $('#result-of-links').html('');
                $('#add-more-btn').click(function() {
                    if($('#link-name').val() != '' && $('#link-url').val() != '') {
                        let link = {name : null, url: null};
                        link.name = $('#link-name').val();
                        link.url = $('#link-url').val();

                        linkObj.push(link);
                        $('#link-name').val('');
                        $('#link-url').val('');
                        $('#result-lists').append('<p class="small m-1 p-0">'+link.name+' : '+link.url+'</p>')
                    } 
                });
                $('#complete-btn').click(function(){
                    $('#add-links-modal').modal('hide');
                })
            });

            $('#add-links-modal').on('hidden.bs.modal',function(){
                $('#links-object').val(JSON.stringify(linkObj));
                $.each(linkObj,function(k,v){
                    $('#result-of-links').append(`<kbd class="mr-1">${v.name}</kbd>`)
                });
            });
        });

        
    </script>
@endsection