<table id="eventsTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Poster</th>
        <th>Title</th>
        <th>Date</th>
        <th>Place</th>
        <th>Manage</th>
    </tr>
    </thead>
    <tbody>
        @foreach($events as $i => $event)
        <tr class="{{($event->is_upcoming) ? 'bg-light' : ''}}">
            <td>{{$i+1}}</td>
            <td style="width: 100px"><img class="img-responsive" src="{{asset('storage/events')}}/{{$event->poster}}" width="100%"></td>
            <td>{{$event->title}}</td>
            <td>{{($event->multi == 0) ? \Carbon\Carbon::parse($event->single_time)->format('h:i A - d F, Y') : \Carbon\Carbon::parse($event->multi_start_time)->format('h:i A - d-m-Y') .' to '. \Carbon\Carbon::parse($event->multi_end_time)->format('h:i A - d-m-Y')}}</td>
            <td>{{$event->place}}</td>
            <td class="text-center">
                <button class="btn btn-sm btn-info info" data-id="{{$event->id}}"><i class="fas fa-edit"></i> Info</button>
                <button class="btn btn-sm btn-info links" data-id="{{$event->id}}"><i class="fas fa-edit"></i> Links</button>
                <button class="btn btn-sm btn-info body" data-id="{{$event->id}}"><i class="fas fa-edit"></i> Details</button>
                @if(!$event->is_upcoming)
                    @if($event->has_post)
                    <button class="btn btn-sm btn-success editpostevent" data-id="{{$event->id}}"><i class="fas fa-edit"></i> Post Event</button>
                    @else 
                    <button class="btn btn-sm btn-success addpostevent" data-id="{{$event->id}}"><i class="fas fa-plus"></i> Post Event</button>
                    @endif
                @endif
                <button class="btn btn-sm btn-danger delete-event" data-id="{{$event->id}}"><i class="fas fa-trash"></i> Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="edit-info-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('events.edit.info')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" class="evid" name="evid">
                    <div class="form-group">
                        <label for="ev-name">Event Title</label>
                        <input type="text" class="form-control" id="ev-name" name="title">
                    </div>
                    <div class="form-group">
                        <label for="ev-poster">Event Poster</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ev-poster" name="poster">
                                <label class="custom-file-label" for="ev-poster">Choose file to update or leave it</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="multiday">Multiday Event?</label>
                        <input type="checkbox" id="multiday" name="multi" data-toggle="toggle" data-size="mini" data-on="." data-off=".">
                    </div>
                    <div class="form-group" id="single-day-event">
                        <label for="datetime">Event Date & Time</label>
                        <input type="text" class="form-control datetimepicker-input" id="datetimepicker-single" name="date_single" data-toggle="datetimepicker" data-target="#datetimepicker-single"/>
                    </div>
                    <div class="row" id="multi-day-event">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetime">Event Start Date & Time</label>
                                <input type="text" class="form-control datetimepicker-input" id="datetimepicker-start" name="date_start" data-toggle="datetimepicker" data-target="#datetimepicker-start"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datetime">Event End Date & Time</label>
                                <input type="text" class="form-control datetimepicker-input" id="datetimepicker-end" name="date_end" data-toggle="datetimepicker" data-target="#datetimepicker-end"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ev-place">Event Place</label>
                        <input type="text" class="form-control" id="ev-place" name="place">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-link-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Links</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('events.edit.link.add')}}" method="POST">
                    @csrf
                    <input type="hidden" class="evid" name="evid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link-name">Link Name</label>
                                <input type="text" class="form-control" id="link-name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link-url">Link Url</label>
                                <input type="text" class="form-control" id="link-url" name="url">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block"  value="Add">
                            </div>
                        </div>
                    </div>
                </form>
                    <div id="exst-links">
                    </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-details-modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('events.edit.details')}}" method="POST">
                    @csrf
                    <input type="hidden" class="evid" name="evid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.widgets.text-editor',['class' => 'input summernote','name' => 'text','id' => 'editor-body','height' => 500,'placeholder' => 'Write the event body post...'])
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Update">
                </form>              
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-postev-modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Post-event Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('events.edit.postevent')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="evid" name="evid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ep-pe-pics">Post-event Photos</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ep-pe-pics" name="images[]" multiple>
                                        <label class="custom-file-label" for="ep-pe-pics">Add more images or leave it</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @include('admin.widgets.text-editor',['class' => 'input summernote','name' => 'text','id' => 'ep-post-editor-body','height' => 500,'placeholder' => 'Write the post-event memories...'])
                        </div>
                        <div class="col-md-12">
                            <table id="ep-pe-exst-pics" class="table"></table>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                </form>              
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-postev-modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Post-event Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('events.add.postevent')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="evid" name="evid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pe-pics">Post-event Photos</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pe-pics" name="images[]" multiple>
                                        <label class="custom-file-label" for="pe-pics">Choose multiple images</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @include('admin.widgets.text-editor',['class' => 'input summernote','name' => 'text','id' => 'post-editor-body','height' => 500,'placeholder' => 'Write the post-event memories...'])
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Add">
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

        $(function(){
             $('#eventsTable').DataTable({
                "pageLength": 10
            });
            bsCustomFileInput.init();
            $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, { icons: { time: 'fas fa-clock', date: 'fas fa-calendar', up: 'fas fa-arrow-up', down: 'fas fa-arrow-down', previous: 'fas fa-caret-left', next: 'fas fa-caret-right', today: 'far fa-calendar-check-o', clear: 'far fa-trash', close: 'far fa-times' } });
            $('#datetimepicker-single').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});
            $('#datetimepicker-start').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});
            $('#datetimepicker-end').datetimepicker({format : "YYYY-MM-DD HH:mm:ss"});

            $('#eventsTable tbody').on('click','.info',function(){
                let id = $(this).data('id');
                $.post("{{route('event.get')}}",{eid:id},function(event){
                    $('#ev-name').val(event.title);
                    $('#ev-place').val(event.place);
                    if(event.multi == 0) {
                        $('#multi-day-event').hide();
                        $('#datetimepicker-single').val(event.single_time)
                    } else {
                        $('#single-day-event').hide();
                        $('#multiday').bootstrapToggle('on');
                        $('#datetimepicker-start').val(event.multi_start_time);
                        $('#datetimepicker-end').val(event.multi_end_time);
                    }
                    $('.evid').val(id);
                    $('#edit-info-modal').modal('show');
                })
            });

            $('#edit-info-modal').on('shown.bs.modal',function(){
                $('#multiday').change(function(){
                    if($(this).prop('checked')) {
                        $('#multi-day-event').show();
                        $('#single-day-event').hide();
                    } else {
                        $('#multi-day-event').hide();
                        $('#single-day-event').show();
                    }
                });
            });

            $('#edit-info-modal').on('hidden.bs.modal',function(){
                $('#multi-day-event').show();
                $('#multiday').bootstrapToggle('off');
                $('#single-day-event').show();
            });

            $('#eventsTable tbody').on('click','.links',function(){
                let id = $(this).data('id');
                $.post("{{route('event.get')}}",{eid:id},function(event){
                    let extslinks = JSON.parse(event.links);
                    $.each(extslinks, function(k,v){
                        $('#exst-links').append(`<div class="row"><div class="col-md-4">${v.name}</div><div class="col-md-6">${v.url}</div><div class="col-md-2 delink" data-index="${k}" data-evid="${event.id}"><i class="fas fa-times"></i></div></div>`);
                    });
                    $('.evid').val(id);
                    $('#edit-link-modal').modal('show');
                })
            });

            $('#edit-link-modal').on('hidden.bs.modal',function(){
                $('#exst-links').html('');
            });

            $('#eventsTable tbody').on('click','.body',function(){
                let id = $(this).data('id');
                $.post("{{route('event.get')}}",{eid:id},function(event){
                    $('#editor-body').summernote('code',event.post);
                    $('.evid').val(id);
                    $('#edit-details-modal').modal('show');
                })
            });

            $('#eventsTable tbody').on('click','.addpostevent',function(){
                let id = $(this).data('id');
                $('.evid').val(id);
                $('#add-postev-modal').modal('show');
            });

            $('#eventsTable tbody').on('click','.editpostevent',function(){
                let id = $(this).data('id');
                $.post("{{route('events.edit.get')}}",{evid:id},function(pe){
                    $('#ep-post-editor-body').summernote('code',pe.post);
                    let images = JSON.parse(pe.images);
                    $.each(images,function(k,v){
                        console.log(v);
                        let img = `<img class="img-responsive" width="100px" src="{{asset('storage/events/post')}}/${v}" >`;
                        let btn = `<i class="fas fa-times delpepic" data-index="${k}" data-evid="${id}"></i>`;
                        $('#ep-pe-exst-pics').append(`<tr><td style="width:20%">${img}</td><td style="width:80%; text-align:right">${btn}</td></tr>`)
                    });
                })
                $('.evid').val(id);
                $('#edit-postev-modal').modal('show');
            });

            $('#eventsTable tbody').on('click','.delete-event',function(){
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This event will be permanently deleted. Are you confirmed?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.value) {
                        $.post("{{route('event.delete')}}",{eid : id}, function(response){
                            if(response.success) {
                                Swal.fire('Deleted!','The event was deleted.','success');
                                setTimeout(function () {
                                    window.location.reload();
                                })
                            } else {
                                Toast.fire({type: 'error',title: 'Something Went Wrong'});
                            }
                        })
                    }
                })
            });
            
        });

        $('body').on('click','.delink',function(){
            let index = $(this).data('index');
            let evid = $(this).data('evid');
            let div = $(this).parent();
            $.post("{{route('events.edit.link.remove')}}",{evid : evid, index : index}, function(response){
                if(response.success) {
                    div.hide();
                }
            });
        });

        $('body').on('click','.delpepic',function(){
            let index = $(this).data('index');
            let evid = $(this).data('evid');
            let div = $(this).parent().parent();
            $.post("{{route('events.pe.img.remove')}}",{evid : evid, index : index}, function(response){
                if(response.success) {
                    div.hide();
                }
            });
        });

       
    </script>
@endsection