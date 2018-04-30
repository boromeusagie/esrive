@extends('layouts.auth')

@section('page_title', 'Login')

@section('content')

  <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
    @csrf
      <div class="text-center m-t-20">
        <h3>LOGIN</h3>
      </div>

      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          {{ $message }}
        </div>
      @endif

      @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
          {{ $message }}
        </div>
      @endif

      @if ($message = Session::get('error'))
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @endif

      <div class="form-group m-t-40{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="col-xs-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
          </div>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-12">
              <div class="checkbox checkbox-primary pull-left p-t-0">
                  <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="checkbox-signup"> Remember me </label>
              </div>
              <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
      </div>
      <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button>
          </div>
      </div>
      {{-- <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
              <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
      </div> --}}
      <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
              Don't have an account? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Sign Up</b></a>
          </div>
      </div>
  </form>
  <form class="form-horizontal m-t-20" id="recoverform" method="POST" action="{{ route('password.email') }}">
    @csrf
      <div class="form-group">
          <div class="col-xs-12">
              <div class="row">
                <div class="col-10">
                  <h3>Recover Password</h3>
                </div>
                <div class="col-2">
                  <a href="javascript:void(0)" id="to-login" class="text-dark pull-right"><i class="fa fa-window-close"></i></a>
                </div>
              </div>
              <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
      </div>
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="col-xs-12">
            <input id="emailRecover" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
          </div>
      </div>
      <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
              <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
      </div>
  </form>

@endsection

@section('scripts')

  <!--Custom JavaScript -->
  <script type="text/javascript">
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $('#to-recover').on("click", function() {
          $("#loginform").slideUp();
          $("#recoverform").fadeIn();
      });
      $('#to-login').on("click", function() {
          $("#loginform").slideDown();
          $("#recoverform").fadeOut();
      });
  </script>

@endsection
