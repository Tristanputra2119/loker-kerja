@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600">Welcome back! Here's an overview of the latest updates.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @if(auth()->user()->role === 'admin')
            <!-- Total Users Card -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">{{ $UserTotal }}</p>
            </div>
            <!-- Total Companies Card -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Companies</h2>
                <p class="text-4xl font-bold text-green-600 mt-2">{{ $CompanyTotal }}</p>
            </div>
        @endif

        @if(auth()->user()->role === 'company')
    <!-- Company Details Card -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Company Details</h2>
        <p class="mt-2"><strong>Name:</strong> {{ auth()->user()->company->company_name ?? 'N/A' }}</p>
        <p class="mt-1"><strong>Address:</strong> {{ auth()->user()->company->address ?? 'N/A' }}</p>
        <p class="mt-1"><strong>Email:</strong> {{ auth()->user()->email ?? 'N/A' }}</p>
        <p class="mt-1"><strong>Phone:</strong> {{ auth()->user()->company->phone ?? 'N/A' }}</p>
    </div>
@endif

    </div>

    <!-- Recent Users Table -->
    @if(auth()->user()->role === 'admin')
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800">Recent Users</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left text-gray-600">Name</th>
                        <th class="py-2 px-4 text-left text-gray-600">Email</th>
                        <th class="py-2 px-4 text-left text-gray-600">Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Recent as $user)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
