@extends('layouts.admin')

@section('page_title', 'Admin List')

@section('content')

<button class="btn btn-info m-b-10"><i class="fa fa-plus"></i> Add Admin</button>
<div class="card">
    <div class="card-body">

        <div class="table-responsive color-table muted-table">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
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
