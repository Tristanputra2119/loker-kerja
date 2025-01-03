<?php

namespace App\Http\Controllers;

use App\Models\Jobs; // Use the correct model name
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobs extends Controller
{
    public function index()
    {
        $jobs = Jobs::with('company', 'category')
            ->where('company_id', Auth::user()->company->id)
            ->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        return view('admin.jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary' => 'nullable|string',
            'location' => 'nullable|string',
            'job_category_id' => 'nullable|exists:job_categories,id',
        ]);

        Jobs::create([
            'company_id' => Auth::user()->company->id,
            'job_category_id' => $request->job_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'location' => $request->location,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Jobs $job)
    {
        $this->authorizeJob($job);

        $categories = JobCategory::all();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, Jobs $job)
    {
        // Validasi secara manual
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary' => 'nullable|string',
            'location' => 'nullable|string',
            'job_category_id' => 'nullable|exists:job_categories,id',
        ]);

        // Update data secara manual
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->salary = $request->input('salary');
        $job->location = $request->input('location');
        $job->job_category_id = $request->input('job_category_id');

        // Simpan perubahan
        $job->save();

        // Redirect atau beri feedback
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Jobs $job)
    {
        $this->authorizeJob($job);

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    private function authorizeJob(Jobs $job)
    {
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
