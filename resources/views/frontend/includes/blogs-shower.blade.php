<div id="team" class="section sm-padding bg-grey-deep">
    <div class="container">
        @if(auth()->user() && !auth()->user()->is_root_user)
        <a href="{{route('blog.new')}}" class="btn main-btn mb-3"><i class="fa fa-plus"></i> @lang('New Blog Post')</a>
        @endif
        <div class="row">
            @foreach($blogs as $blog)
            @include('frontend.components.blog-card',['blog' => $blog])
            @endforeach
        </div>
        <div class="text-center"> {{ $blogs->links('vendor.pagination.default') }}</div>
    </div>
</div>