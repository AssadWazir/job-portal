@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section text-white position-relative overflow-hidden mb-5">
    <div class="container position-relative z-2 py-5">
        <div class="row align-items-center py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <span class="badge bg-white text-primary fw-bold px-3 py-2 rounded-pill mb-3 shadow-sm">🚀 #1 Job Board for Developers</span>
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Find Your <span class="text-warning">Dream Job</span> Today</h1>
                <p class="lead mb-4 opacity-75 animate__animated animate__fadeInUp">Connect with thousands of top-tier companies and kickstart your career. Your future starts here.</p>
                
                <form action="{{ route('home') }}" method="GET" class="bg-white p-2 rounded-pill shadow-lg animate__animated animate__fadeInUp delay-100">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0 ps-3"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-0 form-control-lg" placeholder="Job title or keyword..." value="{{ request('search') }}">
                        <button class="btn btn-primary rounded-pill px-5 fw-bold" type="submit">Search</button>
                    </div>
                </form>
                
                <div class="mt-4 animate__animated animate__fadeInUp delay-200">
                    <small class="text-white-50">Popular: </small>
                    <a href="?search=Developer" class="text-white text-decoration-none border-bottom border-white border-opacity-25 ms-1">Developer</a>,
                    <a href="?search=Designer" class="text-white text-decoration-none border-bottom border-white border-opacity-25 ms-1">Designer</a>,
                    <a href="?search=Manager" class="text-white text-decoration-none border-bottom border-white border-opacity-25 ms-1">Manager</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center animate__animated animate__fadeInRight">
                 <!-- Illustration or 3D element placeholder -->
                 <img src="https://img.freepik.com/free-vector/job-hunt-concept-illustration_114360-449.jpg" class="img-fluid rounded-4 shadow-lg floating-img" style="max-width: 80%; opacity: 0.9;" alt="Job Search">
            </div>
        </div>
    </div>
    <!-- Background Abstract Shapes -->
    <div class="position-absolute top-0 end-0 bg-white opacity-10 rounded-circle" style="width: 300px; height: 300px; transform: translate(50%, -50%);"></div>
    <div class="position-absolute bottom-0 start-0 bg-warning opacity-10 rounded-circle" style="width: 200px; height: 200px; transform: translate(-30%, 30%);"></div>
</div>

<!-- Stats Counter -->
<div class="container mb-5">
    <div class="row g-4 text-center">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm py-4 hover-lift">
                <div class="display-6 fw-bold text-primary mb-1">{{ number_format($stats['jobsCount']) }}+</div>
                <div class="text-muted small fw-bold text-uppercase tracking-wider">Live Jobs</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm py-4 hover-lift">
                <div class="display-6 fw-bold text-danger mb-1">{{ number_format($stats['companiesCount']) }}+</div>
                <div class="text-muted small fw-bold text-uppercase tracking-wider">Companies</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm py-4 hover-lift">
                <div class="display-6 fw-bold text-success mb-1">{{ number_format($stats['candidatesCount']) }}+</div>
                <div class="text-muted small fw-bold text-uppercase tracking-wider">Candidates</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm py-4 hover-lift">
                <div class="display-6 fw-bold text-info mb-1">{{ number_format($stats['applicationsCount']) }}+</div>
                <div class="text-muted small fw-bold text-uppercase tracking-wider">Applications</div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Jobs Carousel -->
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">🔥 Featured Opportunities</h3>
        <a href="#" class="text-decoration-none fw-bold">View All <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row flex-nowrap overflow-auto pb-4 scroll-hidden">
        @foreach($featuredJobs as $job)
        <div class="col-10 col-md-4">
            <div class="card h-100 border-0 shadow-sm card-hover-effect">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="bg-light rounded p-2 text-primary">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                        <span class="badge bg-soft-primary text-primary align-self-start">{{ $job->job_type }}</span>
                    </div>
                    <h5 class="fw-bold mb-2 text-truncate">{{ $job->title }}</h5>
                    <p class="text-muted small mb-3">{{ $job->company->name }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-success fw-bold">${{ number_format($job->salary) }}</span>
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-sm btn-outline-primary rounded-pill">Apply</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- How It Works -->
<div class="bg-light py-5 mb-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">How It Works</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100 step-card">
                    <div class="icon-box bg-soft-primary text-primary mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-person-plus fs-2"></i>
                    </div>
                    <h5 class="fw-bold">1. Create Account</h5>
                    <p class="text-muted">Sign up as a candidate and create your professional profile in minutes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100 step-card">
                    <div class="icon-box bg-soft-success text-success mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-file-earmark-text fs-2"></i>
                    </div>
                    <h5 class="fw-bold">2. Upload Resume</h5>
                    <p class="text-muted">Upload your CV to let our matching algorithm find the best jobs for you.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100 step-card">
                    <div class="icon-box bg-soft-danger text-danger mx-auto mb-4 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-check-circle fs-2"></i>
                    </div>
                    <h5 class="fw-bold">3. Get Hired</h5>
                    <p class="text-muted">Apply to dream jobs and track your application status in real-time.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Job List (Existing) -->
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 20px; z-index: 1;">
                <div class="card-header bg-white fw-bold py-3 border-bottom-0">
                    <i class="bi bi-funnel me-2"></i>Filter by Category
                </div>
                <!-- Categories -->
                <div class="list-group list-group-flush px-2 pb-3">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action rounded {{ !request('category') ? 'active-filter' : '' }} border-0 mb-1">
                        All Industries
                    </a>
                    @foreach($categories as $category)
                        <a href="?category={{ $category->id }}" class="list-group-item list-group-item-action rounded border-0 mb-1 d-flex justify-content-between align-items-center {{ request('category') == $category->id ? 'active-filter' : '' }}">
                            {{ $category->name }}
                            <span class="badge {{ request('category') == $category->id ? 'bg-primary' : 'bg-light text-dark' }} rounded-pill">
                                {{ $category->jobs_count }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Job List -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark">Latest Openings</h4>
            </div>
            
            @forelse($jobs as $job)
                <div class="card mb-3 border-0 shadow-sm job-card-horizontal overflow-hidden hover-shadow">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-1 text-center d-none d-md-block">
                                <div class="avatar bg-light text-primary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 50px; height: 50px;">
                                    <i class="bi bi-building fs-4"></i>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5 class="fw-bold text-primary mb-1">
                                    <a href="{{ route('jobs.show', $job->id) }}" class="text-decoration-none text-dark stretched-link">{{ $job->title }}</a>
                                </h5>
                                <div class="d-flex align-items-center text-muted small mb-2">
                                    <span class="me-3"><i class="bi bi-building me-1"></i> {{ $job->company->name }}</span>
                                    <span><i class="bi bi-geo-alt me-1"></i> {{ $job->location }}</span>
                                </div>
                                <div class="d-flex flex-wrap gap-2 position-relative" style="z-index: 2;">
                                    @foreach($job->skills->take(3) as $skill)
                                        <span class="badge bg-light text-secondary border fw-normal">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <div class="h5 fw-bold text-success mb-2">${{ number_format($job->salary) }}</div>
                                <span class="badge bg-soft-primary text-primary px-3 py-2 rounded-pill">{{ $job->job_type }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white shadow-sm rounded">
                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486777.png" width="80" alt="No data" class="mb-3 opacity-50">
                    <h5 class="text-muted">No jobs found matching your criteria.</h5>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary mt-2">Clear Filters</a>
                </div>
            @endforelse

            <div class="mt-5 d-flex justify-content-center">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
    }
    .floating-img {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    /* Utilities */
    .bg-soft-primary { background-color: rgba(13, 110, 253, 0.1); }
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
    .bg-soft-danger { background-color: rgba(220, 53, 69, 0.1); }
    .text-justify { text-align: justify; }

    /* Cards */
    .hover-lift { transition: transform 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); }
    
    .card-hover-effect { transition: all 0.3s ease; }
    .card-hover-effect:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; 
    }

    /* Horizontal Scroller */
    .scroll-hidden::-webkit-scrollbar { display: none; }
    .scroll-hidden { -ms-overflow-style: none; scrollbar-width: none; }

    /* Filters */
    .active-filter {
        background-color: #0d6efd !important;
        color: white !important;
    }
    
    /* Job Card Horizontal */
    .job-card-horizontal {
        transition: all 0.2s ease-in-out;
        border-left: 4px solid transparent;
    }
    .job-card-horizontal:hover {
        transform: translateX(5px);
        border-left: 4px solid #0d6efd;
    }
</style>
@endsection