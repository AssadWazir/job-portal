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

        // 2. Start the Job Query with Eager Loading (Company)
        // We only show 'open' jobs to the public.
        $query = Job::with('company', 'category', 'skills')->where('status', 'open');

        // 3. FILTERING LOGIC (Step 6)
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 4. Get the results with Pagination
        $jobs = $query->latest()->paginate(6);

        return view('welcome', compact('jobs', 'categories', 'skills'));
    }
}