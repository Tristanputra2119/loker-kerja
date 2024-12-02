<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created company in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'industry' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'industry' => $request->industry,
            'description' => $request->description,
        ]);

        return redirect()->route('companies.create')->with('success', 'Company successfully created.');
    }
}
