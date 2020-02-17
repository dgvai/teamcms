<div class="small-box bg-{{$bg}}">
    <div class="inner">
      <h3>{{$data}}</h3>

      <p>{{$title}}</p>
    </div>
    <div class="icon">
      <i class="{{$icon}}"></i>
    </div>
    <a href="{{$url}}" class="small-box-footer"> {{(isset($urlText)) ? $urlText : 'More Info'}} <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>