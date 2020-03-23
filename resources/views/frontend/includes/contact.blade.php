<?php 

?>

<div id="contact" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('home.cntus')}}</h2>
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
                    <form class="base-form">
                        <input type="text" class="input" placeholder="Name">
                        <input type="email" class="input" placeholder="Email">
                        <input type="text" class="input" placeholder="Subject">
                        <textarea class="input" placeholder="Message"></textarea>
                        <button class="main-btn">Send message</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
