@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Company Dashboard</h1>
        <p class="text-gray-600">Manage your job postings and view applicant information here.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Job Postings -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Total Job Postings</h2>
            <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalJobs }}</p>
        </div>
        <!-- Total Applicants -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700">Total Applicants</h2>
            <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalApplicants }}</p>
        </div>
    </div>

    <!-- Job Postings -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800">Your Job Postings</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left text-gray-600">Title</th>
                        <th class="py-2 px-4 text-left text-gray-600">Category</th>
                        <th class="py-2 px-4 text-left text-gray-600">Applicants</th>
                        <th class="py-2 px-4 text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $job->title }}</td>
                        <td class="py-2 px-4">{{ $job->category->name ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ $job->applicants_count ?? 0 }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('jobs.edit', $job->id) }}" class="text-yellow-500 hover:text-yellow-600">Edit</a>
                            |
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No job postings available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Applicants -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800">Recent Applicants</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left text-gray-600">Name</th>
                        <th class="py-2 px-4 text-left text-gray-600">Job Applied</th>
                        <th class="py-2 px-4 text-left text-gray-600">Email</th>
                        <th class="py-2 px-4 text-left text-gray-600">Applied At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $applicant)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $applicant->name }}</td>
                        <td class="py-2 px-4">{{ $applicant->job->title ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ $applicant->email }}</td>
                        <td class="py-2 px-4">{{ $applicant->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No applicants found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
