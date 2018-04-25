@extends('layouts.admin')

@section('page_title', 'Daftar Admin')

@section('content')

                <div class="card">
                    <div class="card-header">Daftar Admin</div>

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
                              @foreach ($admins as $admin)
                                <tr>
                                  <td>{{ $admin->id }}</td>
                                  <td>{{ $admin->name }}</td>
                                  <td>{{ $admin->email }}</td>
                                  <td>{{ App\AdminType::find($admin->type)->name }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                    </div>
                </div>

@endsection
