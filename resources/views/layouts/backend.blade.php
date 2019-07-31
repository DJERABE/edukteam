<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <title>@yield('title')</title>
    
    @yield('css')
     <link href="/node_modules/datatables/media/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/css/style.min.css" rel="stylesheet">
   {{--  <link href="/css/pages/dashboard1.css" rel="stylesheet">
 --}}

    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fixed-layout skin-blue" style="zoom: 1;">
{{--     <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-school</p>
        </div>
    </div> --}}
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <b>
                            <img src="/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="hidden-xs">IBSA</span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                       <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="...">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar scroll-sidebar" >
  <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Str::limit(Auth::user()->nom." ".Auth::user()->prenoms, 10) }} <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="{{ route('profil.show') }}" class="dropdown-item"><i class="ti-user"></i> Mon Profil</a>
                                <!-- text-->
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Deconnexion</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="sidebar-nav">
                    @include('components._menu')
                </nav>
            </div>

              <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="/images/Logo-IBSA.png" alt="user-img" class="img-circle"></div>
              
                    </div>
                </div>

        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
        @include('components._footer')
    </div>
    @yield('js')
</body>

</html>