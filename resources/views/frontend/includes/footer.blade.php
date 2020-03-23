<?php 
    use App\Models\Entities\SiteBasics;
    use App\Models\Entities\SiteSocials;
    $site = SiteBasics::first();
    $links = SiteSocials::all();

?>

<footer id="footer" class="sm-padding bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{asset('storage/sitebasics')}}/{{$site->logo_alt}}" alt="logo"></a>
                        <p>{{$site->short_description}}</p>
                    </div>
                </div>
                <div class="col-md-3 footer-heading">
                    <p>{{__('Quick Links')}}</p>
                    <ul>
                        <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li><a href="#">{{__('Upcoming Events')}}</a></li>
                        <li><a href="{{route('events')}}">{{__('All Events')}}</a></li>
                        <li><a href="{{route('blogs')}}">{{__('Blogs')}}</a></li>
                        <li><a href="#">{{__('About')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-heading">
                    <p>{{__('Teams')}}</p>
                    <ul>
                        <li><a href="{{route('members.current')}}">{{__('Current Members')}}</a></li>
                        <li><a href="{{route('members.committee')}}">{{__('Committee Members')}}</a></li>
                        <li><a href="{{route('members.alumni')}}">{{__('Alumnis')}}</a></li>
                        <li><a href="{{route('login')}}">{{__('Login')}}</a></li>
                        <li><a href="{{route('register')}}">{{__('Registration')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer-follow">
                        @foreach($links as $link)
                        <li><a href="{{$link->url}}"><i class="fa {{$link->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                    <div class="footer-copyright">
                        <p>Copyright © {{date('Y')}} {{$site->name}}. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</footer>