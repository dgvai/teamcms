<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="white-bar">
                    <h3 class="m-3 p-3 text-center">@lang('Update Portfolio')</h3>
                    <form class="side-form m-2 p-2" action="{{route('user.profile.edit.portfolio.edit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pid" value="{{$portfolio->id}}">
                        <label>@lang('Post Title')</label>
                        <input type="text" class="input" name="caption" placeholder="@lang('Post Title')" value="{{$portfolio->caption}}">
                        <label>@lang('Image')</label>
                        <input type="file" class="input" name="image" placeholder="@lang('Image')">
                        <label>@lang('Post Text')</label>
                        <textarea class="input" placeholder="@lang('Write about your success...')" name="text" rows="5">{{$portfolio->post}}</textarea>
                        <a class="btn outline-btn mt-3" href="{{url()->previous()}}">@lang('Cancel')</a>
                        <input type="submit" class="btn main-btn mt-3" value="@lang('Update Portfolio')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

