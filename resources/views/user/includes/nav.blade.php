<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li {!! \Request::path() == '/' ? 'class="active"': null !!}><a href="{{ url('/') }}">Home</a>
        </li>
        <li {!! \Request::path() == 'user' ? 'class="active"': null !!}><a href="{{ url('user') }}">{{ __('Job List') }}</a></li>
        <li {!! \Request::path() == 'user/account' ? 'class="active"': null !!}><a href="{{ url('user/account') }}">{{ __('Your resume') }}</a></li>
        <li {!! \Request::path() == 'contact' ? 'class="active"': null !!}><a href="{{ url('contact') }}">{{ __('Contact') }}</a></li>
    </ul>
</div>

<div class="navbar-right">
    <ul class="sign-in tr-list">
        <li><i class="fa fa-user"></i></li>
        <li><a href="{{ url('user/account') }}">{{ __('Account') }}</a></li>
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
    </ul><!-- /.sign-in -->					

    <a href="{{ url('user') }}" class="btn btn-primary">{{ __('Find Projects') }}</a>
</div><!-- /.nav-right -->