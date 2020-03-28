<div id="blog" class="section md-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('Recent Blogs')}}</h2>
            </div>
            @foreach($blogs as $blog)
            @include('frontend.components.blog-card',['blog' => $blog])
            @endforeach
        </div>
    </div>
</div>