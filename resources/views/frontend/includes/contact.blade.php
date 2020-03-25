<div id="contact" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('Contact Us')}}</h2>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="col-sm-12">
                        <div class="contact">
                            <i class="fa fa-phone"></i>
                            <p>{{$site->contact_data->phone}}</p>
                        </div>
                    </div>
        
                    <div class="col-sm-12">
                        <div class="contact">
                            <i class="fa fa-envelope"></i>
                            <p>{{$site->contact_data->email}}</p>
                        </div>
                    </div>
        
                    <div class="col-sm-12">
                        <div class="contact">
                            <i class="fa fa-map-marker"></i>
                            <p>{{$site->contact_data->address}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <form class="base-form" action="{{route('contact')}}" method="POST">
                        <input type="text" class="input" name="name" placeholder="@lang('Name')">
                        <input type="email" class="input" name="email" placeholder="@lang('Email')">
                        <input type="text" class="input" name="subject" placeholder="@lang('Subject')">
                        <textarea class="input" name="message" placeholder="@lang('Message')"></textarea>
                        @csrf
                        <button class="main-btn">@lang('Send message')</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
