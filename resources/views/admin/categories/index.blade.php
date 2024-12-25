@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Kategori Pekerjaan</h2>

    <!-- Pesan Sukses -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('job_categories.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Tambah Kategori</a>
    </div>

    <!-- Tabel Kategori -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Nama Kategori</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($category as $item)
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $item->id }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $item->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $item->slug }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ route('job_categories.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                        <form action="{{ route('job_categories.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada kategori ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
