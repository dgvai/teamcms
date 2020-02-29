<table id="members" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#Roll ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Signed Up At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->roll_id}}</td>
            <td>{{$user->full_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{\Carbon\Carbon::parse($user->created_at)->format('h:i a - d F, Y')}}</td>
            <td>
                <button class="btn btn-sm btn-primary assign" data-id="{{$user->id}}">Assign</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="member-assign-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.assign')}}" method="POST">
                    @csrf 
                    <input type="hidden" id="uid" name="uid">
                    <div class="form-group">
                        <label>Select Rank</label>
                        <select class="form-control select2" style="width: 100%;" name="rank">
                            <option selected disabled>Select Designations</option>
                            @foreach($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Assign">
                </form>
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
        $('.select2').select2();

        $('#members').DataTable({
            "pageLength": 5
        });

        $('#members tbody').on('click','.assign',function(){
            let id = $(this).data('id');
            $('#uid').val(id);
            $('#member-assign-modal').modal('show');
        });
    </script>
@endsection