@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="space-y-2">
                <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $user->name }}" required>
            </div>

            <!-- Email Field -->
            <div class="space-y-2">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $user->email }}" required>
            </div>

            <!-- Profile Picture -->
            <div class="space-y-2">
                <label for="profile_picture" class="block text-lg font-medium text-gray-700">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($user->profile_picture)
                    <div class="mt-3">
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full">
                    </div>
                @endif
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update User</button>
        </form>
    </div>
@endsection
