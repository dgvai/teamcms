<?php 
	$dis = (isset($dismissable)) ? $dismissable : false;
	switch($type)
	{
		case 'info' : $icon = 'info' ; break;
		case 'warning' : $icon = 'exclamation-triangle' ; break;
		case 'success' : $icon = 'check' ; break;
		case 'danger' : $icon = 'ban' ; break;
	}
?>
<div class="alert alert-{{$type}} {{($dis) ? 'alert-dismissible' : ''}}">
    @if($dis)
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif
    
    <h5><i class="icon fas fa-{{$icon}}"></i> {{$title}}</h5>
    {{$data}}
  </div>