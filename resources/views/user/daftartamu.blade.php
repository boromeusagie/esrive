@extends('layouts.user')

@section('page_title', 'Daftar Tamu')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              This is some text within a card block.
              <br>
              Anda daftar pada tanggal {{ date("j M Y H:i", strtotime($user->created_at)) }}.
              <br>
              <i class="fa fa-bluetooth"></i>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
