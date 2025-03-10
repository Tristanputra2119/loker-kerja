<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Tampilkan dashboard berdasarkan role pengguna.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Jika pengguna adalah admin, arahkan ke dashboard admin
        if ($user->role === "admin") {
            return $this->adminDashboard();
        }

        // Jika pengguna adalah perusahaan, arahkan ke dashboard perusahaan
        if ($user->role === "company") {
            return $this->companyDashboard();
        }

        // Role lainnya diarahkan ke halaman home
        return redirect()->route("home");
    }

    /**
     * Dashboard untuk role Admin.
     *
     * @return \Illuminate\Contracts\View\View
     */
    private function adminDashboard()
    {
        // Data untuk admin
        $UserTotal = User::count();
        $CompanyTotal = Company::count();
        $Recent = User::orderBy("created_at", "desc")->take(5)->get();

        return view(
            "admin.dashboard.admin",
            compact("UserTotal", "CompanyTotal", "Recent")
        );
    }

    /**
     * Dashboard untuk role Company.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    private function companyDashboard()
    {
        $user = Auth::user();
        $company = $user->company;

        // Validasi jika user tidak terhubung dengan perusahaan
        if (!$company) {
            return redirect()
                ->route("home")
                ->with(
                    "error",
                    "Anda tidak terkait dengan perusahaan mana pun."
                );
        }

        // Data untuk perusahaan
        $totalJobs = $company->jobs()->count();
        $totalApplicants = Application::whereHas("job", function ($query) use (
            $company
        ) {
            $query->where("company_id", $company->id);
        })->count();

        $recentApplicants = Application::whereHas("job", function ($query) use (
            $company
        ) {
            $query->where("company_id", $company->id);
        })
            ->with(["user", "job"])
            ->orderBy("created_at", "desc")
            ->take(5)
            ->get();

        $jobs = $company->jobs()->with("category")->get();

        return view(
            "admin.dashboard.company",
            compact("totalJobs", "totalApplicants", "recentApplicants", "jobs")
        );
    }

    /**
     * Halaman Home untuk pengguna umum.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        $user = Auth::user();
        $categories = JobCategory::all();

        // Jika role adalah admin atau perusahaan, arahkan ke dashboard
        if ($user && ($user->role === "admin" || $user->role === "company")) {
            return redirect()->route("dashboard");
        }

        $locations = ["Bali", "Jakarta", "Yogyakarta", "Surabaya"];
        // Tampilan untuk user biasa
        return view("home", compact("categories"))->with(
            "message",
            "Selamat datang di aplikasi kami."
        );
    }
}
