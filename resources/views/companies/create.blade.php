@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Create Company</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- User Selection Dropdown -->
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
            <select name="user_id" id="user_id" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                <option value="" disabled selected>Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <!-- Company Name -->
        <div class="mb-4">
            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="mt-2 p-2 border border-gray-300 rounded-md w-full" value="{{ old('company_name') }}" required>
        </div>

        <!-- Industry -->
        <div class="mb-4">
            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
            <input type="text" name="industry" id="industry" class="mt-2 p-2 border border-gray-300 rounded-md w-full" value="{{ old('industry') }}">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-2 p-2 border border-gray-300 rounded-md w-full" rows="4">{{ old('description') }}</textarea>
        </div>

        <!-- Logo (optional) with Preview -->
        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" name="logo" id="logo" class="mt-2 p-2 border border-gray-300 rounded-md w-full" onchange="previewLogo()">

            <!-- Preview image -->
            <div id="logo-preview-container" class="mt-2">
                <img id="logo-preview" class="hidden w-24 h-24 object-cover border border-gray-300 rounded-md" src="" alt="Logo Preview">
            </div>
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" id="address" class="mt-2 p-2 border border-gray-300 rounded-md w-full" rows="4">{{ old('address') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Company</button>
    </form>
</div>
@endsection
