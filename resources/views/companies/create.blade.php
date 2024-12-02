@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Company</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Company Name</th>
                <td>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
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
                <th>Address</th>
                <td>
                    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                </td>
            </tr>
            <tr>
                <th>Industry</th>
                <td>
                    <input type="text" name="industry" class="form-control" value="{{ old('industry') }}">
                </td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Create Company</button>
    </form>
</div>
@endsection
