<form action="{{route('new.designation')}}" method="post" role="form">
    @csrf
    <div class="form-group">
        <label for="name">Designation Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Vice-President">
    </div>
    <div class="form-group">
        <label for="value">Rank Value</label>
        <input type="number" class="form-control" id="value" name="value" placeholder="Rank: The highest position is 1, lowest has no limit...">
    </div>
    <div class="form-group">
        <input type="reset" class="btn btn-secondary" value="Reset">
        <input type="submit" class="btn btn-info" value="Add Designation">
    </div>
</form>