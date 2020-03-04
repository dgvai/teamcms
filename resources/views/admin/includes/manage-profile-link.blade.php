<div class="row">
    <div class="col-md-12">
        <form role="form" action="{{route('profile.link.add')}}" method="POST">
            @csrf
            {{-- <div class="form-group">
                <label for="link_name">Link Name</label>
                <input type="text" class="form-control" id="link_name" name="name" placeholder="Eg. Facebook, Instagram, LinkedIn..." required>
            </div> --}}
            <input type="hidden" id="icon-name" name="icon_name">
            <div class="form-group">
                <label>Select Icon</label>
                <select class="form-control select2" style="width: 100%;" name="icon">
                    <option selected disabled>Choose icon</option>
                    @foreach($icons as $icon)
                    <option value="{{$icon->icon}}" data-icon="{{$icon->icon}}">{{ucfirst($icon->name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Add Attribute">
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <p><b>Available Attributes</b></p>
        @if(count($links) > 0)
        <table id="ext_link" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Attribute</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($links as $i=>$link)
                <tr>
                    <td>{{$i+1}}</td>
                    <td><i class="fab {{$link->icon}}"> </i> {{$link->name}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger delete-link" data-key="{{$i}}">Delete</button>
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
        function iformat(icon) {
            var originalOption = icon.element;
            return $('<span><i class="fab ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '</span>');
        }
        $('.select2').select2({
            templateSelection: iformat,
            templateResult: iformat,
            allowHtml: true
        });

        $('.select2').change(function(){
            let data = $(this).select2('data');
            $('#icon-name').val(data[0].text);
        });
        $('#ext_link').DataTable({
            pageLength: 5
        });

        $('#ext_link tbody').on('click','.delete-link',function(){
            let key = $(this).data('key');
            Swal.fire({
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('profile.link.delete')}}", {key: key}, function (response) {
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