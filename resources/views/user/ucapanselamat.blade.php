@extends('layouts.user')

@section('page_title', 'Ucapan Selamat')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
  @foreach($guests as $guest)
    <div class="col-md-4 col-sm-12">

      <div class="card card-inverse {{ $guest->rsvp == true ? "card-info" : "card-danger" }} text-white">
        <div class="card-header">
          <h4 class="m-b-0 text-white">{{ $guest->name }}</h4>
        </div>
        <div class="card-body">
          <div class="card-text">{{ $guest->comment }}</div>
        </div>
      </div>

    </div>
  @endforeach
</div>

{{ $guests->links() }}
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
