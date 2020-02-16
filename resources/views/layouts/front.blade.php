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
      @if (\Auth::check())
          <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
          <style>
              .select2-container { margin-bottom: 20px }
              .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple { border: 1px solid #e8e6e8; background-color: #faf7fa }
              .select2-container .select2-selection--multiple { min-height: 45px }
              .select2-container .select2-selection--single { height:45px }
              .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 45px }
              .select2-container--default .select2-selection--single .select2-selection__arrow { height: 45px }
          </style>
      @endif
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
      @include('front.includes.alerts')
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
      <script src="{{ url('themes/frontpage/js/main.js') }}"></script>
      @if (\Auth::check())
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $('.select2').select2();
        </script>
      @endif
      @yield('script-bottom')
    </body>
</html>