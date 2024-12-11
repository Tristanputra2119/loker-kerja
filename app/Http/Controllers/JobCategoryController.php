<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobCategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories, or filter them if necessary
        $categories = JobCategory::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:job_categories,slug',
        ]);

        JobCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('job_categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(JobCategory $jobCategory)
    {
        return view('admin.categories.edit', compact('jobCategory'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:job_categories,slug,' . $jobCategory->id,
        ]);

        $jobCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('job_categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();

        return redirect()->route('job_categories.index')->with('success', 'Category deleted successfully.');
    }
}
