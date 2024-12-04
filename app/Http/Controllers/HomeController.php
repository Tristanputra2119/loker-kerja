<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the dashboard based on role.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Redirect based on role
        if ($user->role === 'admin' || $user->role === 'company') {
            return view('admin.dashboard', ['message' => "Hello {$user->role}"]);
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

        // Check if the role is admin or company and redirect to dashboard
        if ($user->role === 'admin' || $user->role === 'company') {
            return redirect()->route('dashboard');
        }

        // Default message for regular users
        return view('home', ['message' => 'Hello User']);
    }
}
