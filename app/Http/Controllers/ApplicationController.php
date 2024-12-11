<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application status updated successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
