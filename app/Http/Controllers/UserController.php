<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUserCompanies()
    {
        $user = Auth::user();
        $companies = $user->companies; // Jika ada relasi satu ke banyak

        return view('user.companies', compact('companies'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'role' => 'required|in:company,user',
        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            // Store the file in the public disk (storage/app/public)
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePicturePath,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto profil
        ]);

        // Perbarui data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Cek jika ada file foto profil yang diunggah
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Simpan foto baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function destroy(User $user)
    {
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
