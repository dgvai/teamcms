<div id="profile" class="section sm-padding bg-grey-deep">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mainframe white-bar m-0 p-2 mb-2">
                            <div class="photo">
                                <img class="img-responsive" src="{{asset('img')}}/team3.jpg" alt="">
                            </div>
                            <div class="text-center my-4">
                                <h3 class="text-uppercase">DG Shinoda</h3>
                                <h6>Web Developer</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sideframe white-bar m-0 p-2 mb-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('terms.infos')</h3>
                            <table class="table">
                                <tr>
                                    <th>@lang('auth.placeholders.yfname')</th><th>@lang('auth.placeholders.ylname')</th>
                                </tr>
                                <tr>
                                    <td>DG</td><td>Shinoda</td>
                                </tr>
                                <tr>
                                    <th>@lang('terms.birthdate')</th><th>@lang('terms.dept')</th>
                                </tr>
                                <tr>
                                    <td>24/10/1996</td><td>Mechatronics</td>
                                </tr>
                                <tr>
                                    <th colspan="2">@lang('terms.email')</th>
                                </tr>
                                <tr>
                                    <td colspan="2">dgvai.hridoy@gmail.com</td>
                                </tr>
                                <tr>
                                    <th colspan="2">@lang('terms.phone')</th>
                                </tr>
                                <tr>
                                    <td colspan="2">+88 01684 197772</td>
                                </tr>
                            </table>
                            <div class="social-links">
                                <a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-github"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-medium"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-bar mx-0 mb-2 p-2">
                            <h3 class="text-center text-uppercase mt-3">@lang('terms.extr_info')</h3>
                            <table class="table">
                                <tr>
                                    <th colspan="2">Extra Term 1</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Lorem ipsum dolor sit amet</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 2</th>
                                </tr>
                                <tr>
                                    <td colspan="2">consectetur adipiscing elit</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 3</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Ut enim ad minim veniam</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Extra Term 4</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-bar mx-0 mb-2 p-2 text-center">
                    <a href="#" class="btn main-btn"><i class="fa fa-edit"></i> @lang('Edit Profile')</a>
                    <a href="#!" class="btn main-btn"><i class="fa fa-plus"></i> @lang('Add Portfolio')</a>
                    <a href="#" class="btn main-btn"><i class="fa fa-cog"></i> @lang('Settings')</a>
                </div>
                <div class="postfram white-bar m-0 p-2 mb-2">
                    <div class="alert alert-warning mb-0">@lang('lines.nopost')</div>
                </div>
                @for($i = 0; $i<4; $i++)
                    @include('frontend.components.portfolio-card',['i' => $i])
                @endfor
            </div>
        </div>
    </div>
</div>

