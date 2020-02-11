<?php 

    use App\Models\Entities\SiteBasics;
    $site = SiteBasics::first();

?>

<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{asset('public/storage/sitebasics')}}/{{$site->logo_alt}}" alt="logo"></a>
                        <p>{{$site->short_description}}</p>
                    </div>
                </div>
                <div class="col-md-3 footer-heading">
                    <p>{{__('layout.linkgroup1')}}</p>
                    <ul>
                        <li><a href="#">{{__('layout.home')}}</a></li>
                        <li><a href="#">{{__('layout.upevs')}}</a></li>
                        <li><a href="#">{{__('layout.allevs')}}</a></li>
                        <li><a href="#">{{__('layout.blogs')}}</a></li>
                        <li><a href="#">{{__('layout.about')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-heading">
                    <p>{{__('layout.linkgroup2')}}</p>
                    <ul>
                        <li><a href="#">{{__('layout.curmem')}}</a></li>
                        <li><a href="#">{{__('layout.commem')}}</a></li>
                        <li><a href="#">{{__('layout.oldmem')}}</a></li>
                        <li><a href="#">{{__('auth.login')}}</a></li>
                        <li><a href="#">{{__('auth.signup')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer-follow">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                    <div class="footer-copyright">
                        <p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
</footer>
<!-- /Footer -->