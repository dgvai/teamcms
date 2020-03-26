<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Send Mails - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Send Email to Specific Members'])
            <form role="form" action="{{route('mail.specific')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="target">Select Target</label>
                    <select id="target" class="form-control select2" style="width: 100%;" name="target">
                        <option value="1">All Current Members</option>
                        <option value="2">All Current Committee</option>
                        <option value="3">All Alumni Members</option>
                        <option value="4">All General Members</option>
                        <option value="5">Custom</option>
                    </select>
                </div>
                <div class="form-group" id="custom_div">
                    <label for="custom">Select Custom</label>
                    <select id="custom" class="form-control select2" style="width: 100%;" name="custom[]" multiple>
                        @foreach($members as $member)
                        <option value="{{$member->email}}">{{$member->roll_id}} - {{$member->full_name}} - {{$member->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="body">Mail Body</label>
                    <textarea id="body" name="body" class="form-control" rows="12" placeholder="Markdown formatting is enabled"></textarea>
                </div>
                <div class="form-group text-center">
                    <input class="btn btn-primary" type="submit" value="Send" />
                </div>
            </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Send Email to All Members'])
            @endcomponent
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
    <script>
        $(()=>{
            $('#custom').select2();
            $('#custom_div').hide();
            $('#target').change(function(){
                let val = $(this).val();
                if(val == 5) {
                    $('#custom_div').show();
                } else {
                    $('#custom_div').hide();
                }
            });
        })
    </script>
@endsection