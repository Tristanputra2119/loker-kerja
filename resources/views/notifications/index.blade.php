{{-- resources/views/notifications/index.blade.php --}}

@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Notifications</h2>

    <!-- Menampilkan daftar notifikasi -->
    <ul class="space-y-4">
        @foreach ($notifications as $notification)
        <li class="flex items-center p-4 bg-gray-50 border-l-4 
                    {{ $notification->status == 'complete' ? 'border-green-500' : 'border-blue-500' }}">
            <i class="fas fa-bell text-blue-500 mr-4"></i>
            <div class="flex-1">
                <p class="text-gray-700">{{ $notification->message }}</p>
                <span class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
            </div>

            <!-- Tombol untuk menandai notifikasi sebagai complete -->
            @if($notification->status != 'complete')
            <form action="{{ route('notifications.update', $notification->id) }}" method="POST" class="ml-4">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                    Mark as complete
                </button>
            </form>
            @else
            <span class="text-sm text-gray-500 ml-4">Completed</span>
            @endif
        </li>
        @endforeach
    </ul>

    <!-- Menampilkan pagination -->
    <div class="mt-4">
        {{ $notifications->links() }} <!-- Pagination links -->
    </div>
</div>
@endsection
