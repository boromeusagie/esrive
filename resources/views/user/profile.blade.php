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
          <upload-user-profile :user="{{ auth()->user() }}"></upload-user-profile>
          <h3 class="user-type-free m-t-20 p-10">Free User</h3>
        </center>
      </div>
    </div>
  </div>
  <div class="col-md-7 col-lg-8 col-xlg-9">
    <div class="card">
      <div class="car-body">

      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
