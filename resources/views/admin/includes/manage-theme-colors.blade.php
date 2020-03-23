<div class="row">
    <div class="col-md-12">
        <form role="form" action="{{route('change.theme')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Primary Color</label>
                <div class="input-group" id="primary-color-picker">
                    <input type="text" class="form-control" name="primary_color" id="primary_color" value="{{$site->theme_color_primary}}">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Secondary Color</label>
                <div class="input-group" id="secondary-color-picker">
                    <input type="text" class="form-control" name="secondary_color" id="secondary_color" value="{{$site->theme_color_secondary}}">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Change Theme" />
        </form>
    </div>
</div>

@section('js')
    @parent 
    <script>
        $(()=>{
            $('#primary-color-picker').colorpicker();
            $('#primary-color-picker .fa-square').css('color', $('#primary_color').val());
            $('#primary-color-picker').on('colorpickerChange', function(event) {
                $('#primary-color-picker .fa-square').css('color', event.color.toString());
            });
            $('#secondary-color-picker').colorpicker();
            $('#secondary-color-picker .fa-square').css('color', $('#secondary_color').val());
            $('#secondary-color-picker').on('colorpickerChange', function(event) {
                $('#secondary-color-picker .fa-square').css('color', event.color.toString());
            });
        })
    </script>
@endsection