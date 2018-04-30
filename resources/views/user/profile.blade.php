@extends('layouts.user')

@section('page_title', 'Profil Saya')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-md-5 col-lg-4 col-xlg-3">
    <div class="card">
      <div class="card-body">
        <center class="m-t-30">
          <upload-user-profile :user="{{ $user }}"></upload-user-profile>
          @if ($user->type == 1)
            <h3 class="user-type-free m-t-20 p-10">Free User</h3>
          @else
            <h3 class="user-type-premium m-t-20 p-10">Premium</h3>
          @endif

        </center>
      </div>
    </div>
  </div>
  <div class="col-md-7 col-lg-8 col-xlg-9">
    <div id="dataProfile">
      <button id="editProfile1" class="btn btn-outline-info m-b-20" type="button">Edit Profil</button>
      <div class="card card-outline-esrive">
        <div class="card-header">
          <h4 class="m-b-0 text-white">Profil Pengguna</h4>
        </div>
        <div class="card-body">
          <small class="text-muted">Nama</small>
          <h6 class="m-t-5">{{ $user->name }}</h6>
          <hr>
          <small class="text-muted">Email</small>
          <h6 class="m-t-5">{{ $user->email }}</h6>
          <hr>
          <small class="text-muted">Tipe Pengguna</small>
          <h6 class="m-t-5">{{ App\UserType::find($user->type)->name }}</h6>
          <hr>
        </div>
      </div>
    </div>

    <div id="editProfile">
      <div class="card card-outline-warning">
          <div class="card-header">
            <h4 class="m-b-0 text-white">Edit Profil</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('user.editprofile') }}" method="POST" class="form-material" enctype="multipart/form-data">
              @csrf
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-b 40">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user->name) ? $user->name : "" }}" required>
                @if ($errors->has('name'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b 40">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ isset($user->email) ? $user->email : "" }}" disabled>
              </div>
              <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} m-b 40">
                <label for="type">Tipe Pengguna</label>
                @if ($user->type == 1)
                  <div class="input-group">
                    <input type="text" class="form-control" id="type" name="type" value="{{ isset(App\UserType::find($user->type)->name) ? App\UserType::find($user->type)->name : "" }}" disabled>
                    <span class="input-group-btn" style="cursor: pointer;">
                      <a class="btn btn-sm btn-danger" href="#">Upgrade PREMIUM</a>
                    </span>
                  </div>
                @else
                  <input type="text" class="form-control" id="type" name="type" value="{{ isset(App\UserType::find($user->type)->name) ? App\UserType::find($user->type)->name : "" }}" disabled>
                @endif
              </div>
              <button id="cancelProfile" class="btn btn-danger" type="button">Cancel</button>
              <button class="btn btn-success" type="submit">Simpan</button>
            </form>
          </div>
      </div>
    </div>

    <div class="card card-outline-esrive">
      <div class="card-header">
        <h4 class="m-b-0 text-white">Ganti Password</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('user.changepassword') }}" method="POST" class="form-material" enctype="multipart/form-data">
          @csrf
          <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }} m-b 40">
            <label for="oldpassword">Password Lama</label>
            <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
            @if ($errors->has('oldpassword'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('oldpassword') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-b 40">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} m-b 40">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <button class="btn btn-success" type="submit">Ganti Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')

  <script type="text/javascript">
    $(function() {
      $('#editProfile1').on('click', function () {
        $('#dataProfile').slideUp();
        $('#editProfile').fadeIn();
      });

      $('#cancelProfile').on('click', function () {
        $('#dataProfile').slideDown();
        $('#editProfile').fadeOut();
      });
    });
  </script>

@endsection
