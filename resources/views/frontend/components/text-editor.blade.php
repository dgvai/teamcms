@section('additional-css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('additional-js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
@endsection

    <textarea class="{{$class}}" name="{{$name}}"></textarea>

@section('scripts')
<script>
    $(function(){
        $('.summernote').summernote({
            placeholder: '{{$placeholder}}',
            height: {{$height}},
            fontNames: ['Montserrat', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Impact', 'Open Sans', 'Ubuntu', 'Rajdhani']
        });
    })
</script>
@append