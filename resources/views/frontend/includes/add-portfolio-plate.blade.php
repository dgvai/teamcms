<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="white-bar">
                    <h3 class="m-3 p-3 text-center">@lang('Add Portfolio')</h3>
                    <form class="side-form m-2 p-2">
                        <label>@lang('Post Title')</label>
                        <input type="text" class="input" name="title" placeholder="@lang('Post Title')">
                        <label>@lang('Image')</label>
                        <input type="file" class="input" name="image" placeholder="@lang('Image')">
                        <label>@lang('Post Text')</label>
                        @include('frontend.components.text-editor',['class' => 'input summernote',
                                                                    'name' => 'text',
                                                                    'height' => 200,
                                                                    'placeholder' => 'Write about your success...'])
                        <a class="btn outline-btn mt-3" href="#!">@lang('Cancel')</a>
                        <input type="reset" name="reset" class="btn outline-btn mt-3" value="@lang('Reset Form')">
                        <input type="submit" name="add" class="btn main-btn mt-3" value="@lang('Post Portfolio')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

