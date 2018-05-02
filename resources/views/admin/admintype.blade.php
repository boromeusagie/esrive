@extends('layouts.admin')

@section('page_title', 'Admin Type')

@section('content')

<button class="btn btn-info m-b-10"><i class="fa fa-plus"></i> Add Admin Type</button>
<div class="card">
    <div class="card-body">

        <div class="table-responsive color-table muted-table">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Admin Category</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($types as $type)
                <tr>
                  <td>{{ $type->id }}</td>
                  <td>{{ $type->name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>

@endsection
