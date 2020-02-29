
<table id="members-alumni" class="table table-bordered table-hover">
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
            <td>{{$user->full_name}}</td>
            <td>Former {{$user->desig->name}}</td>
            <td>
                <button class="btn btn-sm btn-warning moveback" data-id="{{$user->id}}">Move Back</button>
                <button class="btn btn-sm btn-danger delete" data-id="{{$user->id}}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $('.select2').select2();

        $('#members-alumni').DataTable({
            "pageLength": 5
        });

        $('#members-alumni tbody').on('click','.moveback',function(){
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This member will become a member again for this Team/Organisation. Are you confirmed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, move back!'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('user.moveback')}}",{uid : id}, function(response){
                        if(response.success) {
                            Swal.fire('Moved!','The Member was moved to the Members Section.','success');
                            reload(500);
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                }
            })
        });

        $('#members-alumni tbody').on('click','.delete',function(){
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This member will be permanently deleted. Are you confirmed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('user.delete')}}",{uid : id}, function(response){
                        if(response.success) {
                            Swal.fire('Deleted!','The Member was deleted.','success');
                            reload(500);
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                }
            })
        });
    </script>
@endsection