<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="white-bar my-2 mx-0 p-2">
                    <h3 class="text-center text-uppercase mt-3">@lang('Basic Informations')</h3>
                    <form class="base-form" style="text-align:left">

                        <label for="fname" class="mx-3 mt-2">@lang('First Name')</label>
                        <input type="text" id="fname" class="form" placeholder="@lang('First Name')">

                        <label for="lname" class="mx-3 mt-2">@lang('Last Name')</label>
                        <input type="text" id="lname" class="form" placeholder="@lang('Last Name')">

                        <label for="bdate" class="mx-3 mt-2">@lang('Birthdate')</label>
                        <input type="date" id="bdate" class="form" placeholder="@lang('Birthdate')">
                        <input type="checkbox" class="input ml-3" name="bday-privacy"> @lang('Keep hidden from public?')<br>

                        <label for="dept" class="mx-3 mt-2">@lang('Department')</label>
                        <input type="text" id="dept" class="form" placeholder="@lang('Department')">

                        <label for="email" class="mx-3 mt-2">@lang('Email')</label>
                        <input type="text" id="email" class="form" placeholder="@lang('Email')">

                        <label for="phone" class="mx-3 mt-2">@lang('Phone')</label>
                        <input type="text" id="phone" class="form" placeholder="@lang('Phone')">

                        <input type="reset" class="btn outline-btn my-3" value="Reset Form">
                        <input type="submit" class="btn main-btn my-3" value="Update Profile">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-bar my-2 mx-0 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Profile Avatar')</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="{{asset('img')}}/team1.jpg">
                                </div>
                                <div class="col-md-8">
                                    <form class="base-form" style="text-align:left; margin-top:0">
                                        <label class="" for="fileup">Upload new avatar</label>
                                        <input type="file" id="fileup" name="avatar" class="input">
                                        <input type="submit" class="main-btn btn" value="Upload">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="white-bar my-2 mx-0 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('Extra Informations')</h3>
                            <form class="base-form" style="text-align:left">

                                <label for="fname" class="mx-3 mt-2">@lang('First Name')</label>
                                <input type="text" id="fname" class="form" placeholder="@lang('First Name')">
        
                                <label for="lname" class="mx-3 mt-2">@lang('Last Name')</label>
                                <input type="text" id="lname" class="form" placeholder="@lang('Last Name')">
        
                                <label for="bdate" class="mx-3 mt-2">@lang('Birthdate')</label>
                                <input type="date" id="bdate" class="form" placeholder="@lang('Birthdate')">
                                <input type="checkbox" class="input ml-3" name="bday-privacy"> @lang('Keep hidden from public?')<br>
        
                                <label for="dept" class="mx-3 mt-2">@lang('Department')</label>
                                <input type="text" id="dept" class="form" placeholder="@lang('Department')">
        
                                <label for="email" class="mx-3 mt-2">@lang('Email')</label>
                                <input type="text" id="email" class="form" placeholder="@lang('Email')">
        
                                <label for="phone" class="mx-3 mt-2">@lang('Phone')</label>
                                <input type="text" id="phone" class="form" placeholder="@lang('Phone')">
        
                                <input type="reset" class="btn outline-btn my-3" value="Reset Form">
                                <input type="submit" class="btn main-btn my-3" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>