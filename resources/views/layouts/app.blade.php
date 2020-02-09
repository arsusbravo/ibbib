<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>
            {{ config('app.name', 'ARSUS manager') }}
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/jquery-te.css') }}">
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/slick.css') }}">  
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/main.css') }}">
        <link rel="stylesheet" href="{{ url('themes/frontpage/css/responsive.css') }}">
        
        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    
    
        <!-- icons -->
        <link rel="icon" href="{{ url('themes/frontpage/images/ico/favicon.ico') }}">	
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
        <!-- Template Developed By ThemeRegion -->
    </head>
    <body>
        <header class="tr-header">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{ url('themes/frontpage/images/logo-xs.png') }}" alt="Logo"></a>
                    </div>
                    @include('front.includes.nav')
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
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="{{ url('themes/frontpage/js/gmaps.min.js') }}"></script>
        <script src="{{ url('themes/frontpage/js/main.js') }}"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
          ga('create', 'UA-73239902-1', 'auto');
          ga('send', 'pageview');
        </script> 
    </body>
</html>