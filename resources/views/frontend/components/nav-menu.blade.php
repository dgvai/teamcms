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
    <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
    <li class="has-dropdown"><a href="#!">{{__('Members')}}</a>
        <ul class="dropdown">
            <li><a href="{{route('members.committee')}}">{{__('Committe Members')}}</a></li>
            <li><a href="{{route('members.current')}}">{{__('Current Members')}}</a></li>
            <li><a href="{{route('members.alumni')}}">{{__('Alumni Members')}}</a></li>
        </ul>
    </li>
    <li><a href="{{route('events')}}">{{__('Events')}}</a></li>
    <li><a href="{{route('blogs')}}">{{__('Blogs')}}</a></li>
    <li><a href="{{route('about')}}">{{__('About')}}</a></li>
    @if(!Auth::user())
    <li class="has-dropdown"><a href="#!"><i class="fa fa-sign-in"></i></a>
        <ul class="dropdown">
            <li><a href="{{route('login')}}">{{__('Login')}}</a></li>
            <li><a href="{{route('register')}}">{{__('Sign Up')}}</a></li>
        </ul>
    </li>
    @else
    <li class="has-dropdown"><a href="#!"><i class="fa fa-user"></i></a>
        <ul class="dropdown">
            @hasanyrole('root|admin|mod')
            <li><a href="{{route('admin.dashboard')}}">@lang('Admin Panel')</a></li>
            @endrole
            <li><a href="#">@lang('User Profile')</a></li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">@lang('Logout')</a></li>
        </ul>
    </li>
    @endif
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
