<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="white-bar">
                    <h3 class="m-3 p-3 text-center">@lang('User Settings')</h3>
                    <form class="side-form m-2 p-2">
                        <h4>Change Password</h4>
                        <label>@lang('Old Password')</label>
                        <input type="password" class="input" name="old_password" placeholder="@lang('Old Password')">
                        <label>@lang('New Password')</label>
                        <input type="password" class="input" name="new_password" placeholder="@lang('New Password')">
                        <label>@lang('Confirm Password')</label>
                        <input type="password" class="input" name="new_password2" placeholder="@lang('Confirm Password')">
                        <a class="btn outline-btn mt-3" href="#!">@lang('Cancel')</a>
                        <input type="submit" name="add" class="btn main-btn mt-3" value="@lang('Update Settings')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

