<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationListingController extends Controller
{
    public function index()
    {
        // We use "Dot Notation" to load nested relationships
        // job.company means: Load the job, then load that job's company
        $applications = Application::with(['user', 'job.company', 'job.category'])
            ->latest()
            ->paginate(15);

        return view('admin.applications.index', compact('applications'));
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return back()->with('success', 'Application record deleted.');
    }
}