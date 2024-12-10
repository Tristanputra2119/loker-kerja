<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Untuk role admin, tampilkan statistik
            $UserTotal = User::count();
            $CompanyTotal = Company::count();
            $Recent = User::latest()->take(5)->get();

            return view('admin.dashboard', [
                'UserTotal' => $UserTotal,
                'CompanyTotal' => $CompanyTotal,
                'Recent' => $Recent
            ]);
        } elseif ($user->role === 'company') {
            // Untuk role company, tampilkan detail perusahaan
            $company = Company::where('user_id', $user->id)->first();
            if (!$company) {
                return redirect()->route('home')->with('error', 'Company details not found.');
            }

            return view('company.dashboard', [
                'company' => $company,
                'email' => $user->email,
                'phone' => $user->phone
            ]);
        } else {
            // Jika bukan admin atau perusahaan, arahkan ke halaman lain
            return redirect()->route('home');
        }
    }
}
