@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h4 class="mb-0">Edit Job: {{ $job->title }}</h4>
                <span class="badge bg-info">ID: #{{ $job->id }}</span>
            </div>
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $job->title) }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $job->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Job Type</label>
                            <select name="job_type" class="form-select @error('job_type') is-invalid @enderror">
                                <option value="full-time" {{ old('job_type', $job->job_type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ old('job_type', $job->job_type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                            </select>
                            @error('job_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" 
                                   value="{{ old('location', $job->location) }}">
                            @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" 
                                   value="{{ old('salary', $job->salary) }}">
                            @error('salary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="open" {{ old('status', $job->status) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills Required</label>
                        <div class="d-flex flex-wrap gap-3 p-3 border rounded bg-light">
                            @foreach($skills as $skill)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}" 
                                        id="skill{{ $skill->id }}"
                                        {{ in_array($skill->id, old('skills', $job->skills->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Description</label>
                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $job->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success w-100">Update Job Posting</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary w-25">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection