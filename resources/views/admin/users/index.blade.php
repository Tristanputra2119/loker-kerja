@extends('layouts.admin')

@section('title', 'User List')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar User</h2>

    <!-- Pesan sukses -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Tambah User</a>
    </div>

    <!-- Tabel Daftar User -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Foto Profil</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $user->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $user->email }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-12 h-12 rounded-full">
                        @else
                        <span class="text-gray-500">No Picture</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a> |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection