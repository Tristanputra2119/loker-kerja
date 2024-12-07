@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6 space-y-6">
    <div class="flex flex-col items-center space-y-6">
        <!-- Gambar Profil -->
        <div class="relative">
            @if ($user->profile_picture) <!-- Pastikan nama kolom sesuai dengan yang di database -->
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Photo"
                class="h-24 w-24 rounded-full object-cover">
            @else
            <img src="https://via.placeholder.com/150" alt="Default Profile"
                class="h-24 w-24 rounded-full object-cover">
            @endif
            <!-- Tombol untuk Mengganti Foto -->
            <label for="profile_photo"
                class="absolute bottom-0 right-0 bg-blue-500 text-white text-xs px-3 py-1 rounded-full cursor-pointer hover:bg-blue-600">
                Ubah
            </label>
            <input type="file" id="profile_photo" name="profile_picture" accept="image/*" class="hidden">
        </div>

        <!-- Form Edit Profil -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="w-full space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-500 shadow-sm">
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea id="address" name="address" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('address', $user->address) }}</textarea>
                @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone_number" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('phone_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="profile_picture" class="block text-gray-700 font-medium mb-2">Foto Profil</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection