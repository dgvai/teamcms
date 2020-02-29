<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{$item->value}}</td>
            <td>{{$item->name}}</td>
            <td>
                @if($item->active == 1)
                    <button class="btn btn-sm btn-warning deact" data-id="{{$item->id}}">Inactive</button>
                @else
                    <button class="btn btn-sm btn-info active" data-id="{{$item->id}}">Active</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('js')
    @parent
    <script>
        $('.deact').click(function(){
            let did = $(this).data('id');
            $.post("{{route('deactive')}}",{did: did},function(response){
                if(response.success) {
                    Toast.fire({type: 'success',title: 'Deativated!'});
                    reload(500);
                } else {
                    Toast.fire({type: 'error',title: 'Can not deactivate!'});
                }
            })
        });
        $('.active').click(async function(){
            let did = $(this).data('id');
            const {value: rank} = await Swal.fire({
                title: 'Enter Rank',
                input: 'text',
                inputPlaceholder: 'Enter the rank value it will be'
            });
            if (rank) {
                $.post("{{route('active')}}",{did: did, rank : rank},function(response){
                    if(response.success) {
                        Toast.fire({type: 'success',title: 'Activated!'});
                        reload(500);
                    } else {
                        Toast.fire({type: 'error',title: 'Can not activate!'});
                    }
                });
            }
        });
    </script>
@endsection
