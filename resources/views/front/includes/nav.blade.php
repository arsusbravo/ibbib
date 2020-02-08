<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li class="tr-dropdown active"><a href="#">Home</a>
            <ul class="tr-dropdown-menu left tr-list fadeInUp" role="menu">
                <li><a href="index.html">Home Page V-1</a></li>
                <li class="active"><a href="index1.html">Home Page V-2</a></li>
            </ul>
        </li>
        <li><a href="job-post.html">Post A Job</a></li>
        <li><a href="listing.html">Job List</a></li>
        <li><a href="job-details.html">Job Details</a></li>
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
            <li><a href="{{ route('login') }}">Sign In </a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endif
    </ul><!-- /.sign-in -->					

    <a href="{{ url('job-post') }}" class="btn btn-primary">Post Job</a>
</div><!-- /.nav-right -->