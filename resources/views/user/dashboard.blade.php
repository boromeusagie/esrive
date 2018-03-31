@extends('auth.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      {{ $message }}
                    </div>
                  @endif

                    You are logged in, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
