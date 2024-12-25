<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Application;
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

        // Jika pengguna adalah admin, redirect ke dashboard admin
        if ($user->role === 'admin') {
            return $this->adminDashboard($user);
        }

        // Jika pengguna adalah perusahaan, tampilkan dashboard perusahaan
        if ($user->role === 'company') {
            return $this->companyDashboard($user);
        }

        // Redirect ke home untuk role lain
        return redirect()->route('home');
    }

    /**
     * Show the dashboard for Admin role.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    private function adminDashboard(User $user)
    {
        // Mendapatkan total pengguna dan perusahaan
        $UserTotal = User::count();
        $CompanyTotal = Company::count();

        // Mendapatkan 5 pengguna terbaru
        $Recent = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('UserTotal', 'CompanyTotal', 'Recent'));
    }

    /**
     * Show the dashboard for Company role.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    private function companyDashboard(User $user)
    {
        $user = Auth::user();
        $company = $user->company; // Mendapatkan data perusahaan yang terkait dengan user login

        if (!$company) {
            return redirect()->route('home')->with('error', 'You are not associated with a company.');
        }

        // Mendapatkan total pekerjaan yang dibuat oleh perusahaan
        $totalJobs = $company->jobs()->count();

        // Mendapatkan total pelamar untuk semua pekerjaan perusahaan
        $totalApplicants = Application::whereHas('job', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->count();

        // Mendapatkan 5 pelamar terbaru
        $recentApplicants = Application::whereHas('job', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->with(['user', 'job'])->orderBy('created_at', 'desc')->take(5)->get();

        // Mendapatkan semua pekerjaan yang dibuat oleh perusahaan
        $jobs = $company->jobs()->with('category')->get();

        return view('admin.dashboard', compact('totalJobs', 'totalApplicants', 'recentApplicants', 'jobs'));
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

        // Cek apakah role user adalah admin atau company dan arahkan ke dashboard
        if ($user->role === 'admin' || $user->role === 'company') {
            return redirect()->route('dashboard');
        }

        // Tampilan untuk user biasa
        return view('home', compact('categories'))->with('message', 'Hello User');
    }
}
