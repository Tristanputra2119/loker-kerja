@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            @if (Auth::check() && Auth::user()->role == 'admin')
                Hello Admin
            @elseif (Auth::check() && Auth::user()->role == 'company')
                Hello Company
            @else
                Hello User
            @endif
        </h1>
    </div>
@endsection
