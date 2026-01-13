@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5 mb-5 rounded-3 shadow-lg" style="background: linear-gradient(45deg, #0d6efd 0%, #0dcaf0 100%);">
    <div class="container text-center py-4">
        <h1 class="display-4 fw-bold mb-3">Find Your Dream Career 🚀</h1>
        <p class="lead mb-4">Discover thousands of opportunities from top-rated companies around the world.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group input-group-lg shadow-lg rounded-pill overflow-hidden">
                        <span class="input-group-text bg-white border-0"><i class="bi bi-search text-primary"></i></span>
                        <input type="text" name="search" class="form-control border-0" placeholder="Job title, keywords or company..." value="{{ request('search') }}">
                        <button class="btn btn-dark px-4 fw-bold" type="submit">Search Jobs</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 20px;">
                <div class="card-header bg-white fw-bold py-3 border-bottom-0">
                    <i class="bi bi-funnel me-2"></i>Categories
                </div>
                <div class="list-group list-group-flush px-2 pb-3">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action rounded {{ !request('category') ? 'active' : '' }} border-0 mb-1">
                        All Industries
                    </a>
                    @foreach($categories as $category)
                        <a href="?category={{ $category->id }}" class="list-group-item list-group-item-action rounded border-0 mb-1 d-flex justify-content-between align-items-center {{ request('category') == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                            <span class="badge {{ request('category') == $category->id ? 'bg-white text-primary' : 'bg-light text-dark' }} rounded-pill">
                                {{ $category->jobs_count }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark">Recent Opportunities</h4>
                <div class="text-muted small">Showing {{ $jobs->count() }} jobs</div>
            </div>
            
            @forelse($jobs as $job)
                <div class="card mb-4 border-0 shadow-sm job-card transition">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="fw-bold text-primary mb-0 me-3">{{ $job->title }}</h5>
                                    <span class="badge bg-soft-primary text-primary border-0 px-3">{{ $job->job_type }}</span>
                                </div>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-building me-1"></i> {{ $job->company->name }} 
                                    <span class="mx-2 text-silver">|</span>
                                    <i class="bi bi-geo-alt me-1"></i> {{ $job->location }}
                                </p>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($job->skills as $skill)
                                        <span class="badge bg-light text-secondary fw-normal border" style="font-size: 0.7rem;">
                                            #{{ $skill->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <div class="h5 fw-bold text-success mb-3">${{ number_format($job->salary) }}</div>
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white shadow-sm rounded">
                    <i class="bi bi-emoji-frown display-1 text-muted"></i>
                    <h5 class="mt-3 text-muted">We couldn't find any jobs matching that.</h5>
                    <a href="{{ route('home') }}" class="btn btn-link">Clear all filters</a>
                </div>
            @endforelse

            <div class="mt-5 d-flex justify-content-center">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .job-card {
        transition: all 0.3s ease;
        border-left: 5px solid transparent !important;
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
        border-left: 5px solid #0d6efd !important;
    }
    .bg-soft-primary {
        background-color: #e7f1ff;
    }
    .text-silver {
        color: #dee2e6;
    }
    .transition {
        transition: 0.3s;
    }
</style>
@endsection