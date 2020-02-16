<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li {!! \Request::path() == '/' ? 'class="active"': null !!}><a href="{{ url('/') }}">Home</a></li>
        <li {!! \Request::path() == 'translator' ? 'class="active"': null !!}><a href="{{ url('translator') }}">{{ __('Translator') }}</a></li>
        <li {!! \Request::path() == 'agency' ? 'class="active"': null !!}><a href="{{ url('agency') }}">{{ __('Agency') }}</a></li>
        <li {!! \Request::path() == 'about' ? 'class="active"': null !!}><a href="{{ url('about') }}">{{ __('About IBBIB jobs') }}</a></li>
        <li {!! \Request::path() == 'contact' ? 'class="active"': null !!}><a href="{{ url('contact') }}">{{ __('Contact') }}</a></li>
    </ul>
</div>

<div class="navbar-right">			
    {{-- <div class="dropdown tr-change-dropdown">
        <i class="fa fa-globe"></i>
        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">United Kingdom</span><i class="fa fa-angle-down"></i></a>
        <ul class="dropdown-menu tr-change tr-list">
            <li><a href="#">United Kingdom</a></li>
            <li><a href="#">United States</a></li>
        </ul>								
    </div>			 --}}		
    <ul class="sign-in tr-list">
        <li><i class="fa fa-user"></i></li>
        @if (\Auth::check())
            <li><a href="{{ url('admin') }}">{{ __('Admin') }}</a></li>
            @if (\Auth::user()->role->slug == 'master' || \Auth::user()->role->slug == 'admin' || \Auth::user()->role->slug == 'worker')
                <li><a href="{{ url('admin') }}">{{ __('Admin') }}</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li {!! \Request::path() == 'login' ? 'class="active"': null !!}><a href="{{ route('login') }}">{{ __('Sign In') }} </a></li>
            <li {!! \Request::path() == 'register' ? 'class="active"': null !!}><a href="{{ route('register') }}">{{ __('Sign Up') }}</a></li>
        @endif
    </ul><!-- /.sign-in -->					
</div><!-- /.nav-right -->