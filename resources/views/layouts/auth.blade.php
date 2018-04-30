<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="{{ config('app.name') }} @version('esrive')" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/img/esrive/logo-box-dark-36x36px.png') }}">
    <title>@yield('page_title') | {{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('user/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweet-alert/dist/sweetalert.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/pages/login-register-lock.css') }}">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('user/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('user/css/user.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div id="app">
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
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url({{ asset('storage/img/8.jpg') }});">
      <div class="login-box card">
          <div class="card-body">

            <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('storage/img/esrive/logo-full-dark.png') }}" class="img-responsive" alt="Home" /></a>

            @yield('content')

          </div>
      </div>

    </section>
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
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/sweet-alert/dist/sweetalert.min.js') }}"></script>

    @include('sweet::alert')

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

    @yield('scripts')

</body>

</html>
