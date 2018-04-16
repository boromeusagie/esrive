@extends('layouts.admin')

@section('page_title', 'Admin Dashboard')

@section('content')

                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in, {{ $admin->name }}!
                    </div>
                </div>

@endsection
