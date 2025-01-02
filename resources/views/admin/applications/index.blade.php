@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Applications</h2>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left font-medium text-gray-700">Job Title</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-700">User</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-700">Status</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-700">Applied At</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-700">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="py-4 px-4 text-gray-800">{{ $application->job->title }}</td>
                        <td class="py-4 px-4 text-gray-800">{{ $application->user->name }}</td>
                        <td class="py-4 px-4 text-gray-800">{{ $application->status }}</td>
                        <td class="py-4 px-4 text-gray-800">{{ $application->applied_at->diffforHumans()}}</td>
                        <td class="py-4 px-4 space-x-3">
                            <!-- View Button -->
                            <a href="{{ route('applications.show', $application->id) }}" class="text-blue-600 hover:text-blue-800 font-medium px-4 py-2 rounded-md border border-transparent bg-transparent hover:bg-blue-50 transition">View</a>

                            <!-- Status Dropdown Form -->
                            <form action="{{ route('applications.update', $application->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 bg-white text-gray-700 hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    <option value="Pending" {{ $application->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Accepted" {{ $application->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="Rejected" {{ $application->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </form>

                            <!-- Delete Button -->
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium px-4 py-2 rounded-md border border-transparent bg-transparent hover:bg-red-50 transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
