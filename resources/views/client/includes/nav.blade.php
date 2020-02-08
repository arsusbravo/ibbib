<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li {!! \Request::path() == '/' ? 'class="active"': '' !!}><a href="{{ url('/') }}">Home</a></li>
        <li {!! \Request::path() == 'client' ? 'class="active"': '' !!}><a href="{{ url('client') }}">{{ __('Post A Project for free') }}</a></li>
        <li {!! \Request::path() == 'translators' ? 'class="active"': '' !!}><a href="{{ url('translators') }}">{{ __('Translator List') }}</a></li>
        <li {!! \Request::path() == 'contact' ? 'class="active"': '' !!}><a href="{{ url('contact') }}">{{ __('Contact') }}</a></li>
    </ul>
</div>

<div class="navbar-right">
    <ul class="sign-in tr-list">
        <li><i class="fa fa-user"></i></li>
        <li><a href="{{ url('account') }}">{{ __('Account') }}</a></li>
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

    <a href="{{ url('user/search') }}" class="btn btn-primary">{{ __('Post A Job') }}</a>
</div><!-- /.nav-right -->