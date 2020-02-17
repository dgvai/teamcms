<?php 
	$cols = (isset($collapsed)) ? $collapsed : false;
	$rmvb = (isset($removable)) ? $removable : false;
	$mxmb = (isset($maximizable)) ? $maximizable : false;
?>
<div class="card card-{{$bg}} {{($cols) ? 'collapsed-card' : ''}}">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>

      <div class="card-tools">
        @if($cols)
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
			</button>
			@if($rmvb)
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
			</button>
			@endif
			@if($mxmb)
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			</button>
			@endif
        @else
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
			</button>
			@if($rmvb)
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
			</button>
			@endif
			@if($mxmb)
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			</button>
			@endif
        @endif
        
      </div>

    </div>

    <div class="card-body">
      {{$slot}}
    </div>

  </div>