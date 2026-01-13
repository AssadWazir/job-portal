<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the CURRENTLY logged-in user
        $user = Auth::user(); 

        // Redirect based on the role stored in our database
        if ($user->role == 'admin') {
            return $this->adminDashboard();
        } elseif ($user->role == 'employer') {
            return $this->employerDashboard($user);
        } else {
            return $this->candidateDashboard($user);
        }
    }

    private function adminDashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_jobs' => Job::count(),
            'total_applications' => Application::count(),
            'total_companies' => Company::count(),
        ];
        return view('dashboards.admin', compact('stats'));
    }



    private function employerDashboard($user)
{
    $company = Company::where('user_id', $user->id)->first();

    if (!$company) {
        return view('dashboards.employer', ['company' => null, 'myJobs' => collect(), 'applicantsCount' => 0]);
    }

    $myJobs = Job::where('company_id', $company->id)->with('category')->get();

    // 1. Get all Job IDs owned by this company
    $jobIds = $myJobs->pluck('id');

    // 2. Count applications for these jobs
    $applicantsCount = Application::whereIn('job_id', $jobIds)->count();
    
    return view('dashboards.employer', compact('company', 'myJobs', 'applicantsCount'));
}

    private function candidateDashboard($user)
    {
        // Fetch applications with job and company details
        $myApplications = Application::where('user_id', $user->id)
            ->with(['job.company'])
            ->latest()
            ->get();
        
        return view('dashboards.candidate', compact('myApplications'));
    }
}