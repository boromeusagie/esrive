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

              <div class="table-responsive color-table muted-table">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>RSVP</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($guests as $guest)
                      <tr>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->email }}</td>
                        <td>{{ $guest->phone }}</td>
                        <td>@if ($guest->rsvp == true)
                          Datang
                        @else
                          Tidak Datang
                        @endif</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              {{ $guests->links() }}

              {{-- <div class="row">
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

              {{ $guests->links() }} --}}

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
