@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Edit Company</h1>

    @if (session('success'))
    <div class="alert alert-success bg-green-500 text-white p-4 rounded-md mb-6">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- User Selection Dropdown -->
        <div class="mb-6">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
            <select name="user_id" id="user_id" class="mt-2 p-3 border border-gray-300 rounded-md w-full">
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $company->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
                @endforeach
            </select>
        </div>

        <!-- Company Name -->
        <div class="mb-6">
            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="mt-2 p-3 border border-gray-300 rounded-md w-full" value="{{ old('company_name', $company->company_name) }}" required>
        </div>

        <!-- Industry -->
        <div class="mb-6">
            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
            <input type="text" name="industry" id="industry" class="mt-2 p-3 border border-gray-300 rounded-md w-full" value="{{ old('industry', $company->industry) }}">
        </div>

        <!-- Website -->
        <div class="mb-6">
            <label for="website" class="block text-sm font-medium text-gray-700">Website (Optional)</label>
            <input type="url" name="website" id="website" class="mt-2 p-3 border border-gray-300 rounded-md w-full" value="{{ old('website', $company->website) }}">
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-2 p-3 border border-gray-300 rounded-md w-full" rows="4">{{ old('description', $company->description) }}</textarea>
        </div>

        <!-- Logo (optional) with Preview -->
        <div class="mb-6">
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" name="logo" id="logo" class="mt-2 p-3 border border-gray-300 rounded-md w-full" onchange="previewLogo()">

            <!-- Preview image -->
            @if($company->logo)
            <div class="mt-4">
                <label class="text-sm text-gray-600">Current Logo</label>
                <img class="w-24 h-24 object-cover mt-2" src="{{ asset('storage/' . $company->logo) }}" alt="Logo Preview">
            </div>
            @endif

            <div id="logo-preview-container" class="mt-4">
                <img id="logo-preview" class="hidden w-24 h-24 object-cover border border-gray-300 rounded-md" src="" alt="Logo Preview">
            </div>
        </div>

        <!-- Address -->
        <div class="mb-6">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" id="address" class="mt-2 p-3 border border-gray-300 rounded-md w-full" rows="4">{{ old('address', $company->address) }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-all duration-200">Update Company</button>
        </div>
    </form>
    <a href="{{ route('companies.index') }}" class="text-blue-600 mt-4 inline-block">Back to User List</a>
</div>

<script>
    function previewLogo() {
        const file = document.getElementById('logo').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            document.getElementById('logo-preview').src = reader.result;
            document.getElementById('logo-preview').classList.remove('hidden');
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection