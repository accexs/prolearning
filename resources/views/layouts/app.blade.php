<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Prolearning</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <!--bootstrap-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!--loading bar-->
    <link rel="stylesheet" type="text/css" href="css/loading-bar.css">
    <!--datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" >
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/adm') }}">
                    Prolearning
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/adm') }}">Home</a></li>
                    <li><a href="{{ url('/ciudad') }}" title="">Paises y Ciudades</a></li>
                    <li><a href="{{ url('/instituto') }}" title="">Institutos</a></li>
                    <li><a href="{{ url('/programa') }}" title="">Programas y Cursos</a></li>
                    <li><a href="{{ url('/promo') }}" title="">Promociones</a></li>
                    <li><a href="{{ url('/testimonio') }}" title="">Testimionios</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
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
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <!--jquery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--bootstrap-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    
    <!--tinymce-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!--AngularJS-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <script src="js/app.js"></script>
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/angular-datatables/angular-datatables.js"></script>
    <script src="js/ng-file-upload.js"></script>
    <script src="js/tinymce.js"></script>
    <script src="js/loading-bar.js"></script>

    <!--CONTROLLERS-->
    <script src="js/controllers/paisCtrl.js"></script>
    <script src="js/controllers/ciudadCtrl.js"></script>
    <script src="js/controllers/institutoCtrl.js"></script>
    <script src="js/controllers/programaCtrl.js"></script>
    <script src="js/controllers/tipoCtrl.js"></script>
    <script src="js/controllers/cursoCtrl.js"></script>
    <script src="js/controllers/promoCtrl.js"></script>
    <!--SERVICES-->
    <script src="js/services/paisService.js"></script>
    <script src="js/services/ciudadService.js"></script>
    <script src="js/services/institutoService.js"></script>
    <script src="js/services/programaService.js"></script>
    <script src="js/services/tipoService.js"></script>
    <script src="js/services/cursoService.js"></script>
    <script src="js/services/promoService.js"></script>
</body>
</html>
