<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['job', 'user'])
            ->whereHas('job.company', function ($query) {
                $query->where('id', Auth::user()->company->id);
            })
            ->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function show($id)
    {
        // Fetch the application with the given ID
        $application = Application::findOrFail($id);

        // Pass the application data to the view
        return view('admin.applications.show', compact('application'));
    }


    public function update(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        try {
            $application->update([
                'status' => $request->status,
            ]);

            return redirect()->route('applications.index')
                ->with('success', 'Application status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('applications.index')
                ->with('error', 'Failed to update application status.');
        }
    }


    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }

    public function showap(Application $application)
    {
        if ($application->job->company->id !== Auth::user()->company->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.applications.show', compact('application'));
    }

    public function store(Request $request, $jobId)
    {
        // Validasi request
        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        // Ambil pekerjaan yang dilamar
        $job = Jobs::findOrFail($jobId);

        // Cek apakah pekerjaan tersebut ada
        if (!$job) {
            return redirect()->back()->with('error', 'Pekerjaan tidak ditemukan.');
        }

        // Buat lamaran
        $application = new Application();
        $application->user_id = Auth::id();
        $application->job_id = $job->id;
        $application->status = 'Pending';  // Status awal lamaran
        $application->message = $request->message;
        $application->save();


        return redirect()->route('jobs.index')->with('success', 'Lamaran telah dikirim!');
    }

    public function canSubmitTestimonial($jobId, $userId)
    {
        $application = Application::where('job_id', $jobId)
            ->where('user_id', $userId)
            ->where('status', 'Accepted') // Pastikan hanya status 'Accepted'
            ->first();

        return $application !== null; // True jika user diterima
    }
}
