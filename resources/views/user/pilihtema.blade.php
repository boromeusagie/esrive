@extends('layouts.user')

@section('page_title', 'Pilih Tema Undangan')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
  <div class="row">
      <div class="col-12 col-md-12">
          <div class="card card-outline-esrive">
              <div class="card-header">
                <h4 class="m-b-0 text-white">Tema Saya</h4>
              </div>
              <div class="card-body">
                <div class="row justify-content-center">
            			<div class="col-md-6 text-center">
            				<div class="web-preview">
            					<div class="display">
            						<img src="{{ asset('storage/theme/' . $theme->preview) }}" alt="" class="img-fluid">
            					</div>
            				</div>
                    <h3>{{ $theme->name }}</h3>
                    <span class="text-muted">Author: {{ $theme->author }}</span>
            			</div>
                </div>

                <div class="row" style="margin-top:20px">
                  <div class="col-12 text-center">
                    <a href="{{ route('user.edittema') }}" class="btn btn-info">Edit Tema</a>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-12">
      <div class="card card-outline-esrive">
        <div class="card-header">
          <h4 class="m-b-0 text-white">Pilih Tema</h4>
        </div>
      </div>
    </div>
  </div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
