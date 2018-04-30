@extends('layouts.auth')

@section('page_title', 'Register')

@section('content')
  <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
    @csrf
      <div class="text-center m-t-20">
        <h3>REGISTER</h3>
      </div>

      @if ($message = Session::get('error'))
        <div class="alert alert-danger">
          <p>{{ $message }}</p>
        </div>
      @endif

      <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
      </div>
      <div class="form-group ">
          <div class="col-xs-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

            @if ($errors->has('email'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
      </div>
      <div class="form-group ">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
      </div>
      <div class="form-group">
          <div class="col-xs-12">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>

              @if ($errors->has('password_confirmation'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-12">
              <div class="checkbox checkbox-primary p-t-0">
                  <input id="checkbox-signup" type="checkbox" required>
                  <label for="checkbox-signup"> Saya setuju dengan <a href="#">S&K</a></label>
              </div>
          </div>
      </div>
      <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
          </div>
      </div>
      <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
              <p>Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a></p>
          </div>
      </div>
  </form>
@endsection
