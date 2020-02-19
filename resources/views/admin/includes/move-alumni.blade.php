
<table id="members-move" class="table table-bordered table-hover">
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
            <td>{{$user->desig->name}}</td>
            <td>
                <button class="btn btn-sm btn-warning move" data-id="{{$user->id}}">Move</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $('.select2').select2();

        $('#members-move').DataTable({
            "pageLength": 5
        });

        $('#members-move tbody').on('click','.move',function(){
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This member will become an Alumni for this Team/Organisation. Are you confirmed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, move!'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('user.move')}}",{uid : id}, function(response){
                        if(response.success) {
                            Swal.fire('Moved!','The Member was moved to the Alumni Section.','success');
                            setTimeout(function () {
                                window.location.reload();
                            })
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                }
            })
        });
    </script>
@endsection