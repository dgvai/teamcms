<div class="row">
    <div class="col-md-12">
        <form role="form" action="{{route('profile.extra.add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="attr_name">Attribute</label>
                <input type="text" class="form-control" id="attr_name" name="attr_name" placeholder="Name of the info attribute. Eg: University, Hometown" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Add Attribute">
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <p><b>Available Attributes</b></p>
        @if(count($exts) > 0)
        <table id="ext_info" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Attribute</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($exts as $i=>$ext)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$ext->name}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger delete" data-key="{{$i}}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@section('js')
    @parent
    <script>

        $('#ext_info').DataTable({
            pageLength: 5
        });

        $('#ext_info tbody').on('click','.delete',function(){
            let key = $(this).data('key');
            Swal.fire({
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('profile.extra.delete')}}", {key: key}, function (response) {
                        if (response.success) {
                            Swal.fire('Deleted!', 'The option was deleted!', 'success');
                            reload(500)
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: 'Something Went Wrong'
                            });
                        }
                    })
                }
            })
        });
    </script>
@endsection