<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        // We load 'company' and 'category' relationships to show names in the table
        $jobs = Job::with(['company', 'category'])
                    ->latest()
                    ->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return back()->with('success', 'Job posting removed successfully.');
    }
}