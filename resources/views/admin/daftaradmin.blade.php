@extends('layouts.admin')

@section('page_title', 'Daftar Admin')

@section('content')

                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">

                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($daftaradmins as $daftaradmin)
                                <tr>
                                  <td>{{ $daftaradmin->id }}</td>
                                  <td>{{ $daftaradmin->name }}</td>
                                  <td>{{ $daftaradmin->email }}</td>
                                  <td>{{ $daftaradmin->admin_type }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                    </div>
                </div>

@endsection
