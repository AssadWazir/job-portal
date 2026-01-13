@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow p-4">
            <h2>{{ $job->title }}</h2>
            <p class="text-muted">{{ $job->category->name }} • {{ $job->location }}</p>
            <hr>
            <h5>Description</h5>
            <p>{{ $job->description }}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-3 border-primary">
            <h5>Interested?</h5>
            <p class="small text-muted">Post Date: {{ $job->created_at->diffForHumans() }}</p>
            
            @auth
                @if(Auth::user()->role == 'candidate')
                    <a href="{{ route('jobs.apply', $job->id) }}" class="btn btn-success w-100">Apply Now</a>
                @else
                    <button class="btn btn-secondary w-100" disabled>Only Candidates can Apply</button>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-warning w-100">Login to Apply</a>
            @endauth
        </div>
    </div>
</div>
@endsection