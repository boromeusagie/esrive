<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="{{ config('app.name') }} @version('esrive')" />
    <meta name="description" content="User Panel of Esrive Invitation">
    <meta name="author" content="Boromeus Agie">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/img/esrive/logo-box-dark-36x36px.png') }}">
    <title>@yield('page_title') | {{ config('app.name') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('user/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweet-alert/dist/sweetalert.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('user/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('user/css/user.css') }}" rel="stylesheet">
    @yield('style')
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-kf4l0INstiI8dku1"></script>
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
    <div id="app">
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
                              <i class="ti-angle-left"></i>
                            </a>
                          </li>
                      </ul>
                      <!-- ============================================================== -->
                      <!-- User profile and search -->
                      <!-- ============================================================== -->
                      <ul class="navbar-nav my-lg-0">

                          <!-- Profile -->
                          <!-- ============================================================== -->
                          <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link waves-effect waves-dark">
                              <img src="{{ asset($userimg) }}" alt="user" class="profile-pic profile-circle" /><span> Akun Saya</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #EF9A9A" onMouseOver="this.style='color:#D50000';" onMouseOut="this.style='color:#EF9A9A';" data-toggle="tooltip" data-placement="bottom" title="Log Out"><i class="fa fa-power-off"></i></a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
                            <a class="waves-effect waves-dark" href="{{ route('user.dashboard') }}" aria-expanded="false">
                              <i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span>
                            </a>
                          </li>
                          <li>
                            <a class="waves-effect waves-dark" href="{{ route('user.data') }}" aria-expanded="false">
                              <i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Data Undangan</span>
                            </a>
                          </li>
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                              <i class="mdi mdi-eye"></i><span class="hide-menu">Tampilan Undangan</span>
                            </a>
                            <ul class="collapse" aria-expanded="false">
                              <li><a href="{{ route('user.pilihtema') }}">Pilih Tema</a></li>
                              <li><a href="{{ route('user.edittema') }}">Edit Tema</a></li>
                            </ul>
                          </li>
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                              <i class="mdi mdi-book-open-page-variant"></i>
                              <span class="hide-menu">Buku Tamu</span>
                            </a>
                            <ul class="collapse" aria-expanded="false">
                              <li><a href="{{ route('user.daftartamu') }}">Daftar Tamu</a></li>
                              <li><a href="{{ route('user.ucapanselamat') }}">Ucapan Selamat</a></li>
                            </ul>
                          </li>
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                              <i class="mdi mdi-table"></i>
                              <span class="hide-menu">Laporan Undangan</span>
                            </a>
                            <ul class="collapse" aria-expanded="false">
                              <li><a href="#">Home</a></li>
                              <li><a href="#">Profile</a></li>
                            </ul>
                          </li>
                          <li>
                            <a class="waves-effect waves-dark" href="{{ route('user.daftartransaksi') }}" aria-expanded="false">
                              <i class="mdi mdi-book-multiple"></i><span class="hide-menu">Daftar Transaksi</span>
                            </a>
                          </li>
                          <li>
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                              <i class="mdi mdi-qrcode"></i><span class="hide-menu">Scan QR Code</span>
                            </a>
                          </li>
                          <li class="nav-devider"></li>
                      </ul>
                      <div class="text-center">
                        <a href="{{ url($wedding->wedding_url) }}" target="_blank" class="btn waves-effect waves-light btn-info hidden-md-down">
                          <i class="mdi mdi-monitor"></i> Lihat Undangan
                        </a>
                      </div>
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
                      <div class="col-md-7 align-self-center">
                        @if($user->type == 1)
                          <a href="{{ route('user.belipaket') }}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Upgrade</a>
                        @endif
                      </div>
                  </div>

                  @if ($user->type == 0)
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- banner lebar -->
                    <ins class="adsbygoogle"
                       style="display:inline-block;width:728px;height:90px"
                       data-ad-client="ca-pub-9748545430269591"
                       data-ad-slot="3793183278"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                  @endif

                  @yield('content')

                  @if ($user->type == 0)
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- banner lebar -->
                    <ins class="adsbygoogle"
                       style="display:inline-block;width:728px;height:90px"
                       data-ad-client="ca-pub-9748545430269591"
                       data-ad-slot="3793183278"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                  @endif

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
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="{{ asset('user/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('user/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('user/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('user/js/waves.js') }}"></script>

    <!--Menu sidebar -->
    <script src="{{ asset('user/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/sweet-alert/dist/sweetalert.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('user/js/custom.min.js') }}"></script>

    @include('sweet::alert')
    {!! Toastr::render() !!}

    @yield('scripts')

    @yield('hidden-div')
</body>

</html>
