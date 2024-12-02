@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input type="password" name="password" class="form-control" required>
                </td>
            </tr>
            <tr>
                <th>Confirm Password</th>
                <td>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <select name="role" class="form-control" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Create User</button>
    </form>
</div>
@endsection
