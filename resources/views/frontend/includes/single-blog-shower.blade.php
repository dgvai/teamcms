<?php 
    $randomBlogs = App\Models\Blogs\Blogs::inRandomOrder()->get()->take(5);
?>
<div id="blog" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <main id="main" class="col-md-9">
                <div class="blog-single">
                    <div class="blog-img">
                        <img class="img-responsive" style="width:100%" src="{{asset('storage/blogs')}}/{{$blog->banner}}" alt="{{$blog->title}}">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>{{$blog->author->full_name}}</li>
                            <li><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($blog->created_at)->format('d F, Y')}}</li>
                        </ul>
                        <h3>{{$blog->title}}</h3>
                        {!!$blog->post!!}
                    </div>

                    <div class="blog-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('storage/users/avatars')}}/{{$blog->author->display_photo}}" alt="{{$blog->author->full_name}}">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>{{$blog->author->full_name}}</h3>
                                    <a href="#">Author's Profile <i class="fa fa-external-link"></i></a>
                                    @if(count($blog->author->connections) > 0)
                                    <div class="author-social">
                                        @foreach($blog->author->connections as $link)
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <aside id="aside" class="col-md-3">
                <a href="#!" class="btn btn-primary mb-3"><i class="fa fa-edit"></i> @lang('Edit Blog')</a>
                <a href="#!" class="btn btn-danger mb-3"><i class="fa fa-trash"></i> @lang('Delete')</a>
                <div class="widget">
                    <h3 class="title">Other Posts</h3>
                    @foreach($randomBlogs as $rblog)
                    <div class="widget-post">
                        <a href="{{route('blog.show',['slug'=>$rblog->slug])}}" class="text-justift">
                            <img class="img-responsive" width="120px" src="{{asset('storage/blogs')}}/{{$rblog->banner}}" alt="{{$rblog->title}}"> {{mb_substr($rblog->title,0,100).'...'}}
                        </a>
                        <ul class="blog-meta">
                            <li>{{\Carbon\Carbon::parse($rblog->created_at)->toFormattedDateString()}}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </aside>


        </div>
    </div>
</div>

@section('scripts')
<script>
    $(function(){
        
    })
</script>
@append