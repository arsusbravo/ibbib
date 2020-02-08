<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Theme Region">
         <meta name="description" content="">
  
      <title>{{ config('app.name', 'ARSUS manager') }}</title>
  
         <!-- CSS -->
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/bootstrap.min.css') }}" >
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/jquery-te.css') }}">
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/slick.css') }}">  
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/main.css') }}">
      <link rel="stylesheet" href="{{ url('themes/frontpage/css/responsive.css') }}">
      
      <!-- font -->
      <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  
  
      <!-- icons -->
      <link rel="icon" href="{{ url('themes/frontpage/images/ico/favicon.png') }}">	
      <link rel="apple-touch-icon" sizes="144x144" href="{{ url('themes/frontpage/images/ico/apple-touch-icon-144-precomposed.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{ url('themes/frontpage/images/ico/apple-touch-icon-114-precomposed.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{ url('themes/frontpage/images/ico/apple-touch-icon-72-precomposed.png') }}">
      <link rel="apple-touch-icon" sizes="57x57" href="{{ url('themes/frontpage/images/ico/apple-touch-icon-57-precomposed.png') }}">
      <!-- icons -->
  
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
      <![endif]-->
      @yield('script-top')
    </head>
    <body class="homepage-2">
      <header class="tr-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{ url('themes/frontpage/images/logo-xs.png') }}" alt="Logo"></a>
                </div>
                <!-- /.navbar-header -->
                @if (\Auth::check())
                    @if (\Auth::user()->role->slug == 'customer')
                        @include('client.includes.nav')
                    @elseif(\Auth::user()->role->slug == 'crew')
                        @include('user.includes.nav')
                    @else
                        @include('front.includes.nav')
                    @endif
                @else
                    @include('front.includes.nav')
                @endif
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
      </header><!-- /.tr-header -->
      @yield('content-top')
        @if (session('status'))
            <div class="tr-cta">
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session('success_msg'))
            <div class="tr-cta">
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {{ session('success_msg') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session('error_msg'))
            <div class="tr-cta">
                <div class="container">
                    <div class="alert alert-danger" role="alert">
                        {{ session('error_msg') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session('info_msg'))
            <div class="tr-cta">
                <div class="container">
                    <div class="alert alert-info" role="alert">
                        {{ session('info_msg') }}
                    </div>
                </div>
            </div>
        @endif
      @yield('content')
  
      @include('front.includes.footer')
  
  
      <!-- JS -->
      <script src="{{ url('themes/frontpage/js/jquery.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/popper.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/bootstrap.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/inview.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/counterup.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/waypoints.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/slick.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/jquery-te.min.js') }}"></script>
      <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
      <script src="{{ url('themes/frontpage/js/gmaps.min.js') }}"></script>
      <script src="{{ url('themes/frontpage/js/main.js') }}"></script>
      @yield('script-bottom')
    </body>
</html>