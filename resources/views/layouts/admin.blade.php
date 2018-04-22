<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="{{ config('app.name') }} @version('esrive')" />
    <meta name="description" content="">
    <meta name="author" content="Boromeus Agie">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/img/esrive/logo-box-dark-36x36px.png') }}">
    <title>@yield('page_title') | {{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('admin/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('admin/css/user.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <img src="{{ asset('storage/loader.gif') }}" alt="">
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --><b>
                            <img src="{{ asset('storage/img/esrive/logo-box-dark-36x36px.png') }}" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <img src="{{ asset('storage/img/esrive/text-dark-36px.png') }}" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-menu"></i>
                          </a>
                        </li>
                        <!-- This is  -->
                        <li class="nav-item">
                          <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-menu"></i>
                          </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" href="#" class="nav-link dropdown-toggle waves-effect waves-dark" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ asset('storage/admin/img/' . $admin->admin_pic) }}" alt="user" class="profile-pic" /></a><span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                              <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset('storage/admin/img/' . $admin->admin_pic) }}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ $admin->name }}</h4>
                                                <p class="text-muted">{{ $admin->email }}</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                          <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span>
                          </a>
                        </li>
                        <li>
                          <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-account-check"></i><span class="hide-menu">Member Admin</span>
                          </a>
                          <ul class="collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.daftaradmin') }}">Daftar Admin</a></li>
                            <li><a href="#">Kategori Admin</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            <span class="hide-menu">Pengguna</span>
                          </a>
                          <ul class="collapse" aria-expanded="false">
                            <li><a href="#">Daftar Pengguna</a></li>
                            <li><a href="#">Kategori Pengguna</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-table"></i>
                            <span class="hide-menu">Table</span>
                          </a>
                          <ul class="collapse" aria-expanded="false">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Profile</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="waves-effect waves-dark" href="icon-material.html" aria-expanded="false">
                            <i class="mdi mdi-emoticon"></i><span class="hide-menu">Icons</span>
                          </a>
                        </li>
                        <li>
                          <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false">
                            <i class="mdi mdi-earth"></i><span class="hide-menu">Map</span>
                          </a>
                        </li>
                        <li>
                          <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false">
                            <i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Blank</span>
                          </a>
                        </li>
                        <li>
                          <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false">
                            <i class="mdi mdi-help-circle"></i><span class="hide-menu">404</span>
                          </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">@yield('page_title')</h3>
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <div class="float-right">© {{ date('Y') }} {{ config('app.name') }} @version('esrive')</div>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>

    @yield('scripts')



    {!! Toastr::render() !!}

    @yield('hidden-div')
</body>

</html>
