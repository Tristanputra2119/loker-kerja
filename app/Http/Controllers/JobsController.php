<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Jobs;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data lokasi untuk filter
        $locations = Jobs::distinct()->pluck('location');
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

        // Jika ada pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Jika ada kategori yang dipilih
        if ($request->has('category') && !empty($request->category)) {
            $query->where('job_category_id', $request->category);
        }

        // Ambil data pekerjaan yang sudah difilter
        $jobs = $query->with(['category', 'company'])->latest()->paginate(10);

        // Ambil semua kategori pekerjaan untuk filter
        $categories = JobCategory::all();

        // Menampilkan data ke view
        return view('user.job.index', compact('jobs', 'locations', 'categories'));
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

        // Menampilkan data ke view
        return view('user.job.index', compact('jobs', 'categories'));
    }

    public function show($id)
    {
        $job = Jobs::findOrFail($id);
        $company = $job->company;
        $company = $job->company;

        $acceptedUsers = $job->acceptedUsers;
        // Cari status lamaran pengguna untuk pekerjaan ini
        $application = Application::where('job_id', $job->id)
            ->where('user_id', Auth::id())
            ->first();

        // Tentukan status lamaran, jika tidak ada lamaran, set null
        $applicationStatus = $application ? $application->status : null;

        $testimonials = $job->testimonials()->paginate(5);

        // Kirim data ke view
        return view('user.job.detail', compact('job', 'company', 'applicationStatus', 'acceptedUsers', 'testimonials'));
    }


    // Method untuk melamar pekerjaan

    public function apply(Request $request, $jobId)
    {

        $job = Jobs::findOrFail($jobId);


        // Cek apakah pengguna sudah melamar pekerjaan ini
        $existingApplication = Application::where('job_id', $jobId)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingApplication) {
            return redirect()->route('job.show', $jobId)->with('status', 'Lamaran Anda sudah diajukan dan sedang diperiksa.');
        }

        // Validasi input
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email|max:255',
            'message' => 'nullable|string',
        ]);

        // Ambil objek model Application
        $app = new Application();

        // Set properti untuk objek model
        $app->job_id = $jobId;
        $app->user_id = Auth::id();
        $app->applicant_name = $validated['applicant_name'];
        $app->applicant_email = $validated['applicant_email'];
        $app->message = $validated['message'];
        $app->status = 'pending'; // Nilai default
        $app->applied_at = now(); // Tanggal saat ini

        // Simpan data ke database
        $app->save();


        // Redirect dengan pesan sukses
        return redirect()->route('job.index', $jobId)->with('success', 'Lamaran Anda berhasil dikirim.');
    }

    public function showTestimonialForm($jobId)
    {
        $userId = Auth::user()->id;

        // Periksa apakah user diterima di job ini
        $application = Application::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->where('status', 'Accepted')
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Anda belum diterima di pekerjaan ini, sehingga tidak dapat memberikan testimonial.');
        }

        $job = Jobs::findOrFail($jobId);
        return view('job.testimonial-form', compact('job'));
    }


    public function submitTestimonial(Request $request, $jobId)
    {
        $userId = Auth::id();

        // Periksa apakah user diterima di job ini
        $application = Application::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->where('status', 'Accepted')
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Anda tidak berhak memberikan testimonial untuk pekerjaan ini.');
        }

        // Validasi input
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Simpan testimonial
        Testimonial::create([
            'job_id' => $jobId,
            'user_name' => Auth::user()->name,
            'message' => $request->message,
        ]);

        return redirect()->route('job.show')->with('success', 'Testimonial berhasil dikirim!');
    }
}
