
@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-4">Daftar Perusahaan</h2>

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Perusahaan</a>
    </div>

    <!-- Tabel Daftar Perusahaan -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">ID</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Nama Perusahaan</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Industri</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Website</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $company->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $company->company_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $company->industry }}</td>
                        <td class="px-4 py-2 border-b">{{ $company->website }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
