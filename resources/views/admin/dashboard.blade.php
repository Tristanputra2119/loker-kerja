@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <h2>Navigation</h2>
    <ul>
        <!-- Tampilkan link berdasarkan role -->
        @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a href="{{ route('companies.index') }}">Manage Companies</a></li>
        @elseif(auth()->user()->role === 'company')
            <li><a href="{{ route('companies.index') }}">Company Dashboard</a></li>
        @else
            <li><a href="{{ route('users.index') }}">User Dashboard</a></li>
        @endif
    </ul>
</div>
 @endsection
