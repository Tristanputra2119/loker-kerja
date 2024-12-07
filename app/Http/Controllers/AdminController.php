<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;

class AdminController extends Controller
{
    public function index()
    {
        $UserTotal = User::count();
        $CompanyTotal = Company::count();
        $Recent = User::latest()->take(5)->get();

        // Mengirimkan data ke tampilan dengan cara array
        return view('admin.dashboard', [
            'UserTotal' => $UserTotal,
            'CompanyTotal' => $CompanyTotal,
            'Recent' => $Recent
        ]);
    }
}
