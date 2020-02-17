<div id="blog" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <main id="main" class="col-md-9">
                <div class="blog-single">
                    <div class="blog-img">
                        <img class="img-responsive" src="{{asset('img')}}/blog-post.jpg" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i>John doe</li>
                            <li><i class="fa fa-clock-o"></i>18 Oct</li>
                        </ul>
                        <h3>Demo Blog Title</h3>
                        <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
                        <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
                        <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>
                    </div>

                    <div class="blog-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('img')}}/author.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>Joe Doe</h3>
                                    <a href="#">Author's Profile <i class="fa fa-external-link"></i></a>
                                    <div class="author-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </div>
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

                    <div class="widget-post">
                        <a href="#">
                            <img src="{{asset('img')}}/post1.jpg" alt=""> Blog title goes here
                        </a>
                        <ul class="blog-meta">
                            <li>Oct 18, 2017</li>
                        </ul>
                    </div>

                    <div class="widget-post">
                        <a href="#">
                            <img src="{{asset('img')}}/post2.jpg" alt=""> Blog title goes here
                        </a>
                        <ul class="blog-meta">
                            <li>Oct 18, 2017</li>
                        </ul>
                    </div>

                    <div class="widget-post">
                        <a href="#">
                            <img src="{{asset('img')}}/post3.jpg" alt=""> Blog title goes here
                        </a>
                        <ul class="blog-meta">
                            <li>Oct 18, 2017</li>
                        </ul>
                    </div>

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