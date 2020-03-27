<div class="col-md-4">
    <div class="blog">
        <div class="blog-img">
            @if($blog->is_new)
            <div class="ribbon">{{__('New')}}</div>
            @endif
            <img class="img-responsive card-image" src="{{asset('storage/blogs')}}/{{$blog->banner}}" alt="{{$blog->title}}">
        </div>
        <div class="blog-content">
            <ul class="blog-meta">
                <li><i class="fa fa-user"></i>{{$blog->author->full_name}}</li>
                <li><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($blog->created_at)->format('d F, Y')}}</li>
            </ul>
            <a href="{{route('blog.show',['slug' => $blog->slug])}}"><h3 style="font-size:16px">{{mb_substr($blog->title,0,50).'...'}}</h3></a>
            <p style="overflow:hidden">{!!mb_substr(strip_tags($blog->post),0,100).'...'!!}</p>
            <a href="{{route('blog.show',['slug' => $blog->slug])}}">{{__('Read more')}} <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</div>