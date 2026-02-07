<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch Sidebar Data
        $categories = Category::withCount('jobs')->get(); // Shows how many jobs per category
        $skills = Skill::all();

        // 2. Fetch Stats for Home Page
        $stats = [
            'jobsCount' => Job::where('status', 'open')->count(),
            'companiesCount' => \App\Models\Company::count(),
            'candidatesCount' => \App\Models\User::where('role', 'candidate')->count(),
            'applicationsCount' => \App\Models\Application::count(),
        ];

        // 3. Featured Jobs (Simulated for now by getting latest 5)
        $featuredJobs = Job::with('company', 'category')->where('status', 'open')->latest()->take(5)->get();

        // 4. Start the Job Query with Eager Loading (Company)
        // We only show 'open' jobs to the public.
        $query = Job::with('company', 'category', 'skills')->where('status', 'open');

        // 5. FILTERING LOGIC (Step 6)
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 6. Get the results with Pagination
        $jobs = $query->latest()->paginate(6);

        return view('welcome', compact('jobs', 'categories', 'skills', 'stats', 'featuredJobs'));
    }
}