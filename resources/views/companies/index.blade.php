@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Companies</h1>

        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add New Company</a>

        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Industry</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->industry }}</td>
                    <td>{{ $company->description }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
