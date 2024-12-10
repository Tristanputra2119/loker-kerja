@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Jobs Management</h1>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('jobs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Job
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Location</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $job->title }}</td>
                    <td class="border px-4 py-2">{{ $job->category->name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $job->location ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('jobs.edit', $job) }}" class="text-blue-500 hover:underline">Edit</a> |
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
