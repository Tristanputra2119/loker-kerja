<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data lokasi untuk filter
        $locations = Jobs::select('location')->distinct()->pluck('location');

        $query = Jobs::query();

        // Filter berdasarkan lokasi
        if ($request->has('location') && !empty($request->location)) {
            $query->where('location', $request->location);
        }

        // Filter berdasarkan tanggal posting
        if ($request->has('posting') && !empty($request->posting)) {
            if ($request->posting === '24') {
                $query->where('created_at', '>=', now()->subDay());
            } elseif ($request->posting === '7hari') {
                $query->where('created_at', '>=', now()->subDays(7));
            }
        }

        // Filter berdasarkan waktu pekerjaan
        if ($request->has('waktu') && is_array($request->waktu)) {
            $query->whereIn('type', $request->waktu);
        }

        // Ambil data pekerjaan yang sudah difilter
        $jobs = $query->with(['category', 'company'])->latest()->paginate(10);

        // Menampilkan data ke view
        return view('user.job.index', compact('jobs', 'locations'));
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
            'type' => 'required|string|in:fulltime,freelance',
            'job_category_id' => 'required|exists:job_categories,id',
        ]);

        Jobs::create([
            'title' => $request->title,
            'company_id' => Auth::user()->company->id,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'location' => $request->location,
            'type' => $request->type,
            'job_category_id' => $request->job_category_id,
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
        $this->authorizeJob($job);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary' => 'nullable|string',
            'location' => 'nullable|string',
            'type' => 'required|string|in:fulltime,freelance',
            'job_category_id' => 'required|exists:job_categories,id',
        ]);

        $job->update($request->all());

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
        // Ensure the job belongs to the user's company
        if ($job->company_id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $categoryId = $request->input('category');

        // Fetch all job categories for the filter
        $categories = JobCategory::all();

        // Build query dynamically with optional filters
        $jobs = Jobs::join('job_categories', 'jobs.job_category_id', '=', 'job_categories.id')
            ->select('jobs.*', 'job_categories.name as category_name')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('jobs.title', 'like', "%{$query}%")
                    ->orWhere('jobs.description', 'like', "%{$query}%");
            })
            ->when($categoryId, function ($queryBuilder) use ($categoryId) {
                return $queryBuilder->where('jobs.job_category_id', $categoryId);
            })
            ->get();

        return view('user.job.search', compact('jobs', 'categories'));
    }

    public function show(Jobs $job)
    {
        return view('user.job.search', compact('jobs'));
    }
}
