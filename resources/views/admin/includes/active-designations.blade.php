<table id="rankTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $(function(){
            let did;
            let btns = '<button class="btn btn-sm mx-1 px-2 btn-success uprank"><i class="fas fa-caret-up"></i></button><button class="btn btn-sm mx-1 px-2 btn-danger downrank"><i class="fas fa-caret-down"></i></button>';
            
            let table = $('#rankTable').DataTable({
                "ajax" : {
                    "url" : "{{route('get.designations')}}",
                    "type" : "GET",
                    "dataSrc" : ""
                },
                "columns" : [{data:'value'}, {data:'name'},{data: null, defaultContent : btns}],
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
            });

            $('#rankTable tbody').on('click','.uprank',function(){
                did = table.row($(this).parents('tr')).data().id;
                uprank();
            })

            $('#rankTable tbody').on('click','.downrank',function(){
                did = table.row($(this).parents('tr')).data().id;
                downrank();
            })

            function uprank() {
                $.post("{{route('uprank')}}",{did : did},function(response){
                    if(response.success) {
                        table.ajax.reload();
                    } else {
                        Toast.fire({type: 'error',title: 'It is the highest'});
                    }
                })
            }

            function downrank() {
                $.post("{{route('downrank')}}",{did : did},function(response){
                    if(response.success) {
                        table.ajax.reload();
                    } else {
                        Toast.fire({type: 'error',title: 'It is the lowest'});
                    }
                })
            }
        });
    </script>
@endsection