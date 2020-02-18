
<table id="manage-member" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#Roll ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->roll_id}}</td>
            <td>{{$user->details->first_name}} {{$user->details->last_name}}</td>
            <td>{{$user->desig->name}}</td>
            <td>
                <button class="btn btn-sm btn-primary cmanage" data-id="{{$user->id}}">Manage</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="member-cmanage-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.manage')}}" method="POST">
                    @csrf 
                    <input type="hidden" id="muid" name="uid">
                    <div class="form-group">
                        <label>Select Rank</label>
                        <select class="form-control select2" style="width: 100%;" name="rank">
                            <option selected disabled>Select Designations</option>
                            @foreach($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Manage">
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

        $('#manage-member').DataTable({
            "pageLength": 5
        });

        $('#manage-member tbody').on('click','.cmanage',function(){
            let id = $(this).data('id');
            $('#muid').val(id);
            $('#member-cmanage-modal').modal('show');
        });
    </script>
@endsection