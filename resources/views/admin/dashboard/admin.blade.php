@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-600">Welcome back! Here's an overview of the latest updates.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
        <!-- Recent Users Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Recent Users</h2>
            <ul class="mt-2 space-y-1">
                @foreach ($Recent as $user)
                <li class="text-gray-600">{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Recent Users Table -->
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
</div>
@endsection
