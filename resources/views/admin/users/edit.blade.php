@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="space-y-2">
            <label for="name" class="block text-lg font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $user->name }}" required>
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="space-y-2">
            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $user->email }}" required>
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Profile Picture -->
        <div class="space-y-2">
            <label for="profile_picture" class="block text-lg font-medium text-gray-700">Foto Profil</label>
            <input type="file" name="profile_picture" id="profile_picture" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            @if($user->profile_picture)
            <div class="mt-3">
                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full">
            </div>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update User</button>
    </form>
    <a href="{{ route('users.index') }}" class="text-blue-600 mt-4 inline-block">Back to User List</a>
</div>
@endsection