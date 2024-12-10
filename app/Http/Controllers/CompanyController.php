<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Menampilkan daftar perusahaan
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    // Menampilkan form untuk membuat perusahaan baru
    public function create()
    {
        // Menampilkan semua user dengan role 'company'
        $users = User::where('role', 'company')->get();
        return view('admin.companies.create', compact('users'));
    }

    // Menyimpan perusahaan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Pastikan user_id ada di tabel users
            'company_name' => 'required|string|max:255',
            'industry' => 'nullable|string',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $company = new Company();
        $company->user_id = $request->user_id; // Menyimpan user_id yang dipilih oleh admin
        $company->company_name = $request->company_name;
        $company->industry = $request->industry;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->address = $request->address;
        $company->phone = $request->phone;

        // Menyimpan logo jika ada
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->route('admin.companies.index')->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit perusahaan
    public function edit($id)
    {
        // Menampilkan semua user dengan role 'company' dan data perusahaan untuk diedit
        $users = User::where('role', 'company')->get();
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company', 'users'));
    }

    // Menyimpan perubahan perusahaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string|max:255',
            'industry' => 'nullable|string',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $company = Company::findOrFail($id);
        $company->user_id = $request->user_id;
        $company->company_name = $request->company_name;
        $company->industry = $request->industry;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->address = $request->address;
        $company->phone = $request->phone;

        // Menyimpan logo baru jika ada
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($company->logo && file_exists(storage_path('app/public/' . $company->logo))) {
                unlink(storage_path('app/public/' . $company->logo));
            }

            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->route('admin.companies.index')->with('success', 'Perusahaan berhasil diperbarui!');
    }

    // Menghapus perusahaan
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        // Hapus logo jika ada
        if ($company->logo && file_exists(storage_path('app/public/' . $company->logo))) {
            unlink(storage_path('app/public/' . $company->logo));
        }
        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Perusahaan berhasil dihapus!');
    }
}
