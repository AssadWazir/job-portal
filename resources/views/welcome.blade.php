@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">Filter by Category</div>
            <ul class="list-group list-group-flush">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action">All Categories</a>
                @foreach($categories as $category)
                    <a href="?category={{ $category->id }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                        {{ $category->name }}
                        <span class="badge bg-secondary rounded-pill">{{ $category->jobs_count }}</span>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-9">
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Search for job titles..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search Jobs</button>
            </div>
        </form>

        <h3 class="mb-3">Latest Job Openings</h3>
        
        @forelse($jobs as $job)
            <div class="card mb-3 shadow-sm hover-shadow transition">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-primary fw-bold">{{ $job->title }}</h5>
                        <span class="badge bg-light text-dark border">{{ $job->job_type }}</span>
                    </div>
                    <h6 class="text-muted">{{ $job->company->name }} | {{ $job->location }}</h6>
                    
                    <div class="my-2">
                        @foreach($job->skills as $skill)
                            <span class="badge bg-info text-dark" style="font-size: 0.75rem;">{{ $skill->name }}</span>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-success fw-bold">${{ number_format($job->salary) }} / Year</span>
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">No jobs found matching your criteria.</div>
        @endforelse

        <div class="mt-4">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection