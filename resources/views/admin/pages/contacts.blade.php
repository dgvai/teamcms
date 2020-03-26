<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Contact Requests - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'warning', 'title' => 'New Request', 'data' => $new->count(), 'icon' => 'fas fa-mail-bulk'])
        </div>
        <div class="col-md-3">
            @include('admin.widgets.info-box',['bg' => 'info', 'title' => 'All Requests', 'data' => $all->count(), 'icon' => 'fas fa-mail-bulk'])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'contacts'])
                <table class="table table-bordered table-hover" id="contact_table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Subject</td>
                            <td>Read</td>
                            <td>Sent</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all->sortByDesc('id') as $contact)
                        <tr class="{{$contact->seen ? '' : 'bg-secondary'}}">
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->subject}}</td>
                            <td><button class="btn btn-sm btn-success view" data-sub="{{$contact->subject}}" data-msg="{{$contact->message}}" data-id="{{$contact->id}}"><i class="fas fa-eye"></i>  view message</button></td>
                            <td>{{\Carbon\Carbon::parse($contact->created_at)->toDayDateTimeString()}}</td>
                            <td><button class="btn btn-sm btn-primary reply" data-id="{{$contact->id}}" data-sub="{{$contact->subject}}"><i class="fas fa-reply"></i>  reply</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endcomponent
        </div>
    </div>

    <div class="modal fade" id="view_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sender Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 id="sub"></h2>
                    <p id="msg"></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reply_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Send Reply</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('contact.reply')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="dg-id">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Send Reply" />
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
            $('#contact_table').DataTable({
                autoWidth : false
            });

            $('#contact_table tbody').on('click','.view',function(){
                let id = $(this).data('id');
                let sub = $(this).data('sub');
                let msg = $(this).data('msg');
                $.post("{{route('contact.read')}}",{id:id},function(r){
                    if(r.success) {
                        $('#sub').text(sub);
                        $('#msg').text(msg);
                        $('#view_modal').modal('show');
                    }
                })
            });

            $('#contact_table tbody').on('click','.reply',function(){
                let id = $(this).data('id');
                $('.dg-id').val(id);
                $('#subject').val('Re: '+$(this).data('sub'));
                $('#reply_modal').modal('show');
            });
        });
    </script>
@endsection