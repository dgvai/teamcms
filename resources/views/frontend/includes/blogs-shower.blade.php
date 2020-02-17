<div id="team" class="section sm-padding bg-grey-deep">
    <div class="container">
        <a href="#!" class="btn main-btn mb-3"><i class="fa fa-plus"></i> @lang('New Blog Post')</a>
        <div class="row">
            @for($i = 0; $i< 10; $i++)
            @include('frontend.components.blog-card',['i' => $i])
            @endfor
        </div>
        {{-- {{ $paginator->links('view.name') }} --}}
    </div>
</div>