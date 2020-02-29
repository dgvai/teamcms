<table class="table">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Roll ID</th>
            <th style="width: 40px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $i => $user)
        <tr>
            <td>{{$i + 1}}</td>
            <td>{{$user->full_name}}</td>
            <td>{{$user->roll_id}}</td>
            <td><button class="btn btn-danger btn-sm manage-user" data-userid="{{$user->id}}">Manage</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="member-manage-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Name</label>
                        <h3 id="name"></h3>
                    </div>
                    <div class="col-md-12">
                        <label>Roll ID</label>
                        <h4 id="roll_id"></h4>
                    </div>
                    <div class="col-md-12">
                        <label>Email</label>
                        <h4 id="email"></h4>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success act-approve">Approve</button>
                            <button type="button" class="btn btn-danger act-reject">Reject</button>
                            <button type="button" class="btn btn-warning act-delete">Mark Spam & Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    <script>
        $(function(){
            let uid;
            $('.manage-user').click(function(){
                uid = $(this).data('userid');
                $.post("{{route('user.get')}}",{uid : uid}, function(user){
                    $('#name').text(user.details.first_name+' '+user.details.last_name);
                    $('#roll_id').text(user.roll_id);
                    $('#email').text(user.email);
                    $('#member-manage-modal').modal('show');
                })
            })

            $('#member-manage-modal').on('shown.bs.modal', function(){
                $('.act-reject').click(function(){
                    $.post("{{route('user.reject')}}",{uid : uid}, function(response){
                        if(response.success) {
                            Toast.fire({type: 'success',title: 'Member Was Rejected'});
                            reload(500)
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                })
                $('.act-delete').click(function(){
                    $.post("{{route('user.delete')}}",{uid : uid}, function(response){
                        if(response.success) {
                            Toast.fire({type: 'info',title: 'That request was deleted permanently!'});
                            reload(500)
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                })
                $('.act-approve').click(function(){
                    $.post("{{route('user.approve')}}",{uid : uid}, function(response){
                        if(response.success) {
                            Toast.fire({type: 'success',title: 'Member Was Approved'});
                            reload(500)
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                })
            })
        })
    </script>
@endsection