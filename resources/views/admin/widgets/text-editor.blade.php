
    <textarea class="{{$class}}" name="{{$name}}" id="{{(isset($id)) ? $id : null}}"></textarea>

@section('js')
@parent
<script>
    $(function(){
        $('.summernote').summernote({
            placeholder: '{{$placeholder}}',
            height: {{$height}},
            fontNames: ['Montserrat', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Impact', 'Open Sans', 'Ubuntu', 'Rajdhani']
        });
    })
</script>
@endsection