<table id="blogs" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Posted By</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->author->full_name}}</td>
            <td>
                <a href="{{route('blog.show',['slug' => $blog->slug])}}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                <button class="btn btn-sm btn-danger delete" data-id="{{$blog->id}}"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $('#blogs').DataTable({
            pageLength: 5,
            order : [[0, 'desc']]
        });

        $('#blogs tbody').on('click','.delete',function(){
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This blog will be permanently deleted. Are you confirmed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.value) {
                    $.post("{{route('blogs.delete')}}",{id : id}, function(response){
                        if(response.success) {
                            Swal.fire('Deleted!','The blog was deleted.','success');
                            reload(500)
                        } else {
                            Toast.fire({type: 'error',title: 'Something Went Wrong'});
                        }
                    })
                }
            })
        });
    </script>
@endsection