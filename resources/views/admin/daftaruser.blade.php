@extends('layouts.admin')

@section('page_title', 'Daftar Pengguna')

@section('content')

                <div class="card">
                    <div class="card-header">Daftar Pengguna</div>

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
                              @foreach ($users as $user)
                                <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ App\UserType::find($user->type)->name }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                    </div>
                </div>

@endsection
