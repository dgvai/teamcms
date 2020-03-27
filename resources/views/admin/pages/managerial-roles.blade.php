<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Managerial Roles - '.$site->name)

@section('css')
    <link rel="shortcut icon" href="{{asset('storage/sitebasics')}}/{{$site->favicon}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Assign Role'])
            <form role="form" action="{{route('assign.role')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user">Choose User</label>
                    <select id="user" class="form-control select2" style="width: 100%;" name="user">
                        <option selected disabled>Choose member</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->roll_id}} &middot; {{$user->full_name}} &middot; {{$user->current_designation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Choose role</label>
                    <select id="role" class="form-control select2" style="width: 100%;" name="role">
                        <option value="admin" >Admin</option>
                        <option value="mod" >Moderator</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Assign Role" />
                </div>
            </form>
            @endcomponent
        </div>
        <div class="col-md-6">
            @component('admin.widgets.card',['bg' => 'primary', 'title' => 'Manage Role'])
            <table id="user_table" class="table table-bordered table-hoverable">
                <thead>
                    <tr>
                        <td>Roll ID</td>
                        <td>Designation</td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($power_users as $user)
                    <tr>
                        <td>{{$user->roll_id}}</td>
                        <td>{{$user->current_designation}}</td>
                        <td>{{$user->full_name}}</td>
                        <td>
                            @foreach($user->roles as $role)
                            <span class="badge badge-warning">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td><button class="btn btn-sm btn-danger remove" data-id="{{$user->id}}">remove</button></td>
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
            $('.select2').select2();

            $('#user_table').DataTable({
                autoWidth : false,
                pageLength: 5
            });

            $('#user_table tbody').on('click','.remove',function(){
                let id = $(this).data('id');
                $.post("{{route('remove.role')}}",{id:id},function(r){
                    if(r.success) {
                        Toast.fire({type: 'success',title: 'Removed from assigned role!'});
                        reload(500);
                    }
                })
            });
        })
    </script>
@endsection