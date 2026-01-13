@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Employer Dashboard</h2>
        @if($company)
            <a href="{{ route('jobs.create') }} " class="btn btn-primary">Post a New Job</a>
        @endif
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2>Welcome, {{ $company->name }}</h2>
            <a href="{{ route('employer.applicants') }}" class="btn btn-warning position-relative">
                View Applicants
                @if($applicantsCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $applicantsCount }}
                    </span>
                @endif
            </a>
        </div>
    </div>

    {{-- Company Info Section --}}
    @if($company)
        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1">{{ $company->name }}</h5>
                    @if($company->website)
                        <p class="mb-0"><small class="text-muted">{{ $company->website }}</small></p>
                    @endif
                    @if($company->description)
                        <p class="mt-2">{{ Str::limit($company->description, 120) }}</p>
                    @endif
                </div>
                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-outline-dark">Edit Profile</a>
            </div>
        </div>
    @endif

    {{-- No Company Message --}}
    @if(!$company)
        <div class="alert alert-warning shadow-sm">
            <h4 class="alert-heading">Welcome!</h4>
            <p>You haven't set up your company profile yet. You need a company profile to post jobs.</p>
            <a href="{{ route('companies.create') }}" class="btn btn-dark">Create Company Profile</a>
        </div>
    @endif

    {{-- Jobs Table --}}
    @if($company)
        <div class="card shadow-sm">
            <div class="card-header bg-white font-weight-bold">
                Your Posted Jobs
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myJobs as $job)
                        <tr>
                            <td><strong>{{ $job->title }}</strong></td>
                            <td>{{ $job->category->name }}</td>
                            <td>
                                @if($job->status == 'open')
                                    <span class="badge bg-success">{{ ucfirst($job->status) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($job->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $job->created_at->format('M d, Y') }}</td>

                            <td>
    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
    
    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this job?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No jobs posted yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
