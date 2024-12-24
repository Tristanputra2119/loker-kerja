@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Manajemen Lowongan Pekerjaan</h2>

    <!-- Pesan sukses -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Tambah Lowongan (Hanya Admin atau Perusahaan) -->
    <div class="mb-4">
        <a href="{{ route('jobs.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
            Tambah Lowongan
        </a>
    </div>

    <!-- Tabel Daftar Lowongan -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($jobs as $job)
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $job->title }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $job->category->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $job->location ?? 'N/A' }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ route('jobs.edit', $job->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                        |
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada lowongan pekerjaan tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
