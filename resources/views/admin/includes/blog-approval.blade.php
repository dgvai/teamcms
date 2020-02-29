<table class="table">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Title</th>
            <th>Posted By</th>
            <th style="width: 40px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $i => $blog)
        <tr>
            <td>{{$i + 1}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->author->full_name}}</td>
            <td><button class="btn btn-info btn-sm view-blog" data-bid="{{$blog->id}}">View</button></td>
            <td><button class="btn btn-success btn-sm approve-blog" data-bid="{{$blog->id}}">Approve</button></td>
            <td><button class="btn btn-danger btn-sm remove-blog" data-bid="{{$blog->id}}">Delete</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $(function(){
            $('.view-blog').click(function(){
                let id = $(this).data('bid');
                $.post("{{route('blogs.view.signed')}}",{id:id},function(response){
                    window.open(response,'_blank');
                })
            })
            $('.approve-blog').click(function(){
                let id = $(this).data('bid');
                $.post("{{route('blogs.approve')}}",{id : id},function(response){
                    if(response.success) {
                        Toast.fire({type: 'success',title: 'The blog post was approved!'});
                        reload(500)
                    }
                });
            })
            $('.remove-blog').click(function(){
                let id = $(this).data('bid');
                $.post("{{route('blogs.reject')}}",{id : id},function(response){
                    if(response.success) {
                        Toast.fire({type: 'info',title: 'The blog post was rejected and removed!'});
                        reload(500);
                    }
                });
            })
        })
    </script>
@endsection