<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Site Bulletin Management - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Add Bulletin'])
            <form role="form" action="{{route('add.site.bulletin')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="news">News Headline</label>
                    <input type="text" id="news" name="news" class="form-control" />
                </div>
                <input type="submit" class="btn btn-info" value="Add"/>
            </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'info', 'title' => 'Bulletins'])
            <table id="bulletins_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td style="width:60%">News</td>
                        <td style="width:10%">Status</td>
                        <td style="width:30%">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bullets as $bullet)
                    <tr>
                        <td>{{mb_substr($bullet->news,0,50).'...'}}</td>
                        <td>{!!($bullet->state) ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-secondary">inactive</span>'!!}</td>
                        <td>{!!($bullet->state) ? '<button class="btn btn-sm btn-warning deactive" data-id="'.$bullet->id.'">Deactive</button>' : '<button class="btn btn-sm btn-primary active" data-id="'.$bullet->id.'">Active</button>'!!} <button class="btn btn-sm btn-danger delete" data-id="{{$bullet->id}}">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endcomponent
        </div>
    </div>
@endsection

@section('js')
@include('sweetalert::alert')
    <script> $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});</script>
    <script>
        $(()=>{
            $('#bulletins_table').DataTable({
                pageLength: 5,
                autoWidth : false
            });

            $('#bulletins_table tbody').on('click','.active',function(){
                let id = $(this).data('id');
                $.post("{{route('active.bulletin')}}",{id:id},function(r){
                    if(r.success) {
                        Toast.fire({type: 'success',title: 'Activated!'});
                        reload(500);
                    }
                })
            });

            $('#bulletins_table tbody').on('click','.deactive',function(){
                let id = $(this).data('id');
                $.post("{{route('deactive.bulletin')}}",{id:id},function(r){
                    if(r.success) {
                        Toast.fire({type: 'success',title: 'De-activated!'});
                        reload(500);
                    }
                })
            });

            $('#bulletins_table tbody').on('click','.delete',function(){
                let id = $(this).data('id');
                $.post("{{route('delete.bulletin')}}",{id:id},function(r){
                    if(r.success) {
                        Toast.fire({type: 'success',title: 'Deleted!'});
                        reload(500);
                    }
                })
            });
        })
    </script>
@endsection