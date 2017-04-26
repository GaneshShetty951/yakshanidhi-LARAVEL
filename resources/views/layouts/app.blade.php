<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yakshnidhi</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tech crab solutions.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="\spirits/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="\spirits/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="\spirits/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="\spirits/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="\spirits/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="\spirits/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"  href="\frontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="\bootstrap-social/css/bootstrap-social.css">

    <!-- Slider
    ================================================== -->
    <link href="\spirits/css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="\spirits/css/owl.theme.css" rel="stylesheet" media="screen">



    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="\spirits/css/style.css">
    <link rel="stylesheet" type="text/css" href="\spirits/css/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .flex-container {
            display: -webkit-flex;
            display: flex;  
            -webkit-flex-flow: row wrap;
            flex-flow: row wrap;
            text-align: center;
            position: relative;
            background-color: #000;
            color: #fff;
        }
        table
        {
            table-layout: fixed;
        }
        tr
        {
            border: solid 1px;
        }
        .show
        {
            border: solid 0px;
            padding: 0px;
            margin: 0px;
            font-size: 30px;
        }
        .mela_images
        {
            width: 200px;
            position: absolute;
            align-content: left;
        }
        .flex-container > * {
            padding: 15px;
            -webkit-flex: 1 100%;
            flex: 1 100%;
            position: relative;
        }

        .article {
            text-align: left;
        }

        header {background: black;color:white;}
        footer {background: #000000;color:white;}
        .nav-sidemenu {
            border: solid 1px;
            background:#000000;
            color: #fff;
        }
        .item 
        {
            background: #000;
            color: #fff;
            padding: 10px;
            border-bottom: solid 1px;
        }
        .card_tab
        {
            vertical-align:baseline;
            padding: 10px;
        }
        table { 
            vertical-align:baseline;
            border-spacing: 10px;
            border-collapse: separate;
        }
        .mela_image
        {
            position:absolute;
            top:50px;
            right:50px;
            width: 300px;
            height: 200px;
            padding: 20px;
            border:solid 1px;
            object-fit: cover;
            align-self: right;
        }
        .nav-sidemenu ul {
            list-style-type: none;
            padding: 10px;
        }
        .nav-sidemenu ul a {
            color: #fff;
            text-decoration: none;
        }

        @media all and (min-width: 768px) {
            .nav-sidemenu {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
            .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
            footer {-webkit-order:3;order:3;}
        }
    </style>

    <!-- material design -->
    <!-- ================================= -->
    <!-- <link rel="stylesheet" type="text/css" href="material/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="material/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="\material/css/mdb.css">
    <!-- <link rel="stylesheet" type="text/css" href="material/css/mdb.min.css"> -->
    <link rel="stylesheet" type="text/css" href="\material/css/style.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="\build/css/bootstrap-social.css">

    <script type="text/javascript" src="\spirits/js/modernizr.custom.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- <style type="text/css" href="css/style.css" rel="stylesheet"></style> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
</head>
<body>

<!-- <body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div> -->

           <!--  <div class="collapse navbar-collapse" id="app-navbar-collapse">
           <!-- Left Side Of Navbar -->
                <!-- <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <!-- <ul class="nav navbar-nav navbar-right"> -->
                    <!-- Authentication Links
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul> -->
                <!-- </div> -->
                <!-- </div> --> 
                <!-- </nav> --> 



                <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/home')}}">Yakshanidhi</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}" class="page-scroll">Home</a></li>
                    <li class="dropdown dropdown-toggle">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Mela</span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu" role="menu">
                            @foreach($mela as $m)
                            <li><a style="font-size: 12px;" href="\mela/{{$m}}#mela">{{$m}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- <li><a href="#tf-mela" class="page-scroll">Mela</a></li> -->
                    <li class="dropdown dropdown-toggle">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Famous Artists</span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu" role="menu">
                        <li><a style="font-size: 12px;" href="{{ url('/mela/bhagavataru') }}#artist">Bhagavataru</a></li>
                            <li><a style="font-size: 12px;" href="{{ url('/mela/vesha') }}#artist">Veshadhari</a></li>
                            <li><a style="font-size: 12px;" href="{{ url('/mela/chande') }}#artist">Chande</a></li>
                            <li><a style="font-size: 12px;" href="{{ url('/mela/maddale') }}#artist">Maddale</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/Todays_show')}}#show" class="page-scroll">Todays Show</a></li>
                    <li><a href="{{ url('/prasangha')}}#story" class="page-scroll">Prasangha</a></li>

                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown dropdown-toggle">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu" role="menu">
                            @if(Auth::user()->hasRole('admin'))
                            <li><a style="font-size: 12px;" href="{{ url('/admin') }}"><i class="fa pull-right fa-wrench"></i>Admin</a></li>
                            @endif
                            @if(Auth::user()->hasRole('manager'))
                            <li><a style="font-size: 12px;" href="{{ url('/admin') }}"><i class="fa pull-right fa-wrench"></i>Manager</a></li>
                            @endif
                            <li><a style="font-size: 12px;" href="{{ url('/logout') }}"><i class="fa pull-right fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    @endif

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div id="tf-home" class="text-center">
            <div class="container">
                <div class="overlay">
                    <div class="content">
                        <h1>Welcome to <strong><span class="color">Yakshanidhi</span></strong></h1>
                        <p class="lead"><strong>Yakshagana is    </strong> Aaradhana     <strong>  kale   </strong></p>
                        <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

        <!-- JavaScripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script type="text/javascript" src="\spirits/js/jquery.1.11.1.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="\spirits/js/bootstrap.js"></script>
        <script type="text/javascript" src="\spirits/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="\spirits/js/jquery.isotope.js"></script>

        <script src="\spirits/js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="\spirits/js/main.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
