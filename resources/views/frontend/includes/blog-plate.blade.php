<div id="blog" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="white-bar p-2">
                    <form class="side-form">
                        <label>@lang('Blog Title')</label>
                        <input type="text" class="input" name="title" value="" placeholder="@lang('Blog Title')">
                        <label>@lang('Blog Featured Image')</label>
                        <input type="file" class="input" name="image" value="" placeholder="@lang('Blog Featured Image')">
                        <label>@lang('Blog Post')</label>
                        @include('frontend.components.text-editor',['class' => 'input summernote',
                                                                    'name' => 'blog_post',
                                                                    'height' => 500,
                                                                    'placeholder' => 'Write Blog, Format your blog...'])
                        <input type="submit" class="btn main-btn my-3" value="Add/Update">
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>