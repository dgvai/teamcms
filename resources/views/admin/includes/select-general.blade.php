<form action="{{route('general.assign')}}" method="POST">
    @csrf 
    <div class="form-group">
        <label>Select Rank</label>
        <select class="form-control select2" style="width: 100%;" name="rank">
            <option selected disabled>Select Designation</option>
            @foreach($ranks as $rank)
            <option value="{{$rank->id}}">{{$rank->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Assign General">
</form>

@section('js')
    @parent
    <script>
        $('.select2').select2();
    </script>
@endsection