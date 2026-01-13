<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request, $jobId)
    {
        // 1. VALIDATION
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048', // Max 2MB
            'cover_letter' => 'nullable|string|min:10',
        ]);

        // 2. FILE HANDLING
        if ($request->hasFile('resume')) {
            $fileName = time() . '_' . Auth::id() . '.' . $request->resume->extension();
            $path = $request->file('resume')->storeAs('resumes', $fileName, 'public');
        }

        // 3. SAVE TO DATABASE
        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $jobId,
            'resume' => $path,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Application submitted successfully!');
    }

    public function updateStatus(Request $request, $id)
{
    // 1. Find the application
    $application = Application::findOrFail($id);

    // 3. Validate the incoming status
    $request->validate([
        'status' => 'required|in:accepted,rejected,pending'
    ]);

    // 4. Update the status
    $application->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Candidate status updated to ' . $request->status);
}
}