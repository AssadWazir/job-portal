<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;


class JobController extends Controller
{
    // 1. Show form to create a job
    public function create()
    {
        $categories = Category::all();
        $skills = Skill::all();
        
        // We check if the user has a company first
        $company = Company::where('user_id', Auth::id())->first();
        if (!$company) {
            return redirect()->route('companies.create')->with('error', 'Create a company profile first!');
        }

        return view('jobs.create', compact('categories', 'skills'));
    }

    // 2. Save the Job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric',
            'job_type' => 'required|in:full-time,part-time',
            'skills' => 'required|array', // Must select at least one skill
        ]);

        $company = Company::where('user_id', Auth::id())->first();

        // Create the Job
        $job = Job::create([
            'company_id' => $company->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'status' => 'open',
        ]);

        // ATTACH SKILLS (Many-to-Many)
    
        $job->skills()->attach($request->skills);

        return redirect()->route('dashboard')->with('success', 'Job Posted Successfully!');
    }


  

public function edit($id)
{
    // FindOrFail ensures we don't get a 'null' error
    $job = Job::with('skills')->findOrFail($id);
    
    // SECURITY: Ensure the logged-in employer owns the company that owns this job
    $company = Company::where('user_id', Auth::id())->first();
    if ($job->company_id !== $company->id) {
        abort(403, 'You do not own this job posting.');
    }

    $categories = Category::all();
    $skills = Skill::all();
    
    return view('jobs.edit', compact('job', 'categories', 'skills'));
}

public function update(Request $request, $id)
{
    $job = Job::findOrFail($id);
    
    // Validation
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'job_type' => 'required',
        'skills' => 'required|array',
    ]);

    // Update main fields
    $job->update($request->only(['title', 'category_id', 'description', 'location', 'salary', 'job_type', 'status']));

    // UPDATE RELATIONSHIPS
    $job->skills()->sync($request->skills);

    return redirect()->route('dashboard')->with('success', 'Job updated successfully!');
}

public function destroy($id)
{
    $job = Job::findOrFail($id);
    
    // Security check
    $company = Company::where('user_id', Auth::id())->first();
    if ($job->company_id !== $company->id) {
        abort(403);
    }

    $job->delete();

    return redirect()->route('dashboard')->with('success', 'Job deleted successfully!');
}


public function show($id)
{
    // Eager load everything needed for the details page
    // We load 'company' for the sidebar and 'skills' for the badges
    $job = Job::with(['company', 'category', 'skills'])->findOrFail($id);
    
    return view('jobs.show', compact('job'));
}

public function showApplyForm($id)
{
    $job = Job::findOrFail($id);
    return view('jobs.apply', compact('job'));
}

public function viewApplicants()
{
    $user = auth()->user();
    // Logic: Get the company owned by this user, then get all jobs, then all applications.
    $company = Company::where('user_id', $user->id)->first();
    
    // We use with('job', 'user') to avoid N+1 query issues.
    $applicants = Application::whereIn('job_id', $company->jobs->pluck('id'))
                  ->with(['job', 'user'])
                  ->get();

    return view('employer.applicants', compact('applicants'));
}


}