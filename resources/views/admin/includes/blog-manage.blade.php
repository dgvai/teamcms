<table id="blogs" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th style="width: 40%">Title</th>
        <th style="width: 20%">Posted By</th>
        <th style="width: 20%">Posted At</th>
        <th style="width: 15%">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->author->full_name}}</td>
            <td>{{\Carbon\Carbon::parse($blog->updated_at)->toFormattedDateString()}}</td>
            <td>
                <button class="btn btn-sm btn-success seo" data-id="{{$blog->id}}">Manage SEO</button>
                <a href="{{route('blog.show',['slug' => $blog->slug])}}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                <button class="btn btn-sm btn-danger delete" data-id="{{$blog->id}}"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="seo_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage SEO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('blogs.update.seo')}}" method="POST">
                    @csrf 
                    <input type="hidden" id="bsid" name="id">
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="seo_body">SEO Description</label>
                        <textarea class="form-control" id="seo_body" name="text" placeholder="max: 156 letters" rows="5"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
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

        $('#blogs tbody').on('click','.seo',function(){
            let id = $(this).data('id');
            $.get("{{route('blogs.get.seo')}}",{id: id},function(response){
                $('#bsid').val(response.id);
                $('#seo_title').val(response.title);
                $('#seo_body').text(response.text);
                $('#seo_modal').modal('show');
            })
        });
    </script>
@endsection