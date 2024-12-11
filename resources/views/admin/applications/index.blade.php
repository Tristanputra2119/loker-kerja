@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Applications</h2>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border border-gray-300">Job Title</th>
                    <th class="py-2 px-4 border border-gray-300">User</th>
                    <th class="py-2 px-4 border border-gray-300">Status</th>
                    <th class="py-2 px-4 border border-gray-300">Applied At</th>
                    <th class="py-2 px-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td class="py-2 px-4 border border-gray-300">{{ $application->job->title }}</td>
                        <td class="py-2 px-4 border border-gray-300">{{ $application->user->name }}</td>
                        <td class="py-2 px-4 border border-gray-300">{{ $application->status }}</td>
                        <td class="py-2 px-4 border border-gray-300">{{ $application->applied_at->format('Y-m-d H:i') }}</td>
                        <td class="py-2 px-4 border border-gray-300">
                            <a href="{{ route('applications.show', $application->id) }}" class="text-blue-500">View</a>
                            <form action="{{ route('applications.update', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Pending" {{ $application->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Accepted" {{ $application->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="Rejected" {{ $application->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </form>
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
