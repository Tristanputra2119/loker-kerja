<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the dashboard based on role.
     *
     * @return \Illuminate\Contracts\View\View
     */

     public function index()
     {
         // Ambil semua kategori
         $categories = JobCategory::all();
 
         // Kirim data kategori ke tampilan
         return view('home', compact('categories'));
     }
    public function dashboard()
    {
        $user = Auth::user();

        // Mendapatkan total pengguna
        $UserTotal = User::count();

        // Mendapatkan total perusahaan
        $CompanyTotal = Company::count();

        // Mendapatkan 5 pengguna terbaru
        $Recent = User::orderBy('created_at', 'desc')->take(5)->get();

        // Redirect based on role
        if ($user->role === 'admin' || $user->role === 'company') {
            return view('admin.dashboard', compact('UserTotal', 'CompanyTotal', 'Recent'));
        }

        // Redirect to home for other roles
        return redirect()->route('home');
    }

    /**
     * Show the home page for general users.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        $user = Auth::user();

        $categories = JobCategory::all();

        // Check if the role is admin or company and redirect to dashboard
        if ($user->role === 'admin' || $user->role === 'company') {
            return redirect()->route('dashboard');
        }

        // Default message for regular users
        return view('home', compact('categories'))->with('message', 'Hello User');
    }
}
