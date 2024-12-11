<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi untuk gambar
        ]);

        $user = Auth::user();

        // Periksa apakah ada gambar baru
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture && file_exists(storage_path('app/public/' . $user->profile_picture))) {
                unlink(storage_path('app/public/' . $user->profile_picture));
            }

            // Simpan gambar baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Update data lainnya
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
