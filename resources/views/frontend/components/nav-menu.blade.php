<div class="navbar-header">
    <div class="navbar-brand">
        <a href="{{route('home')}}">
            <img class="logo" src="{{asset('storage/sitebasics')}}/{{$site->logo}}" alt="logo">
            <img class="logo-alt" src="{{asset('storage/sitebasics')}}/{{$site->logo_alt}}" alt="logo">
        </a>
    </div>

    <div class="nav-collapse">
        <span></span>
    </div>
</div>

<ul class="main-nav nav navbar-nav navbar-right">
    <li><a href="#home">{{__('layout.home')}}</a></li>
    <li class="has-dropdown"><a href="#!">{{__('layout.members')}}</a>
        <ul class="dropdown">
            <li><a href="{{route('members.committee')}}">{{__('layout.commem')}}</a></li>
            <li><a href="{{route('members.current')}}">{{__('layout.curmem')}}</a></li>
            <li><a href="{{route('members.alumni')}}">{{__('layout.oldmem')}}</a></li>
        </ul>
    </li>
    <li><a href="#">{{__('layout.events')}}</a></li>
    <li><a href="#">{{__('layout.blogs')}}</a></li>
    <li><a href="#">{{__('layout.about')}}</a></li>
    <li class="has-dropdown"><a href="#!"><i class="fa fa-plus"></i></a>
        <ul class="dropdown">
            <li><a href="#">{{__('auth.login')}}</a></li>
            <li><a href="#">{{__('auth.signup')}}</a></li>
        </ul>
    </li>
</ul>
