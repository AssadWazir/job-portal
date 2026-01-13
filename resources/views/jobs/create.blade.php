@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white"><h4>Post a New Job</h4></div>
    <div class="card-body">


          @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. Senior Laravel Developer" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Job Type</label>
                    <select name="job_type" class="form-select">
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" placeholder="e.g. Remote or City" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Salary (Annual)</label>
                    <input type="number" name="salary" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label>Skills Required</label><br>
                <div class="d-flex flex-wrap gap-3 p-2 border rounded bg-light">
                    @foreach($skills as $skill)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}" id="skill{{ $skill->id }}">
                            <label class="form-check-label" for="skill{{ $skill->id }}">{{ $skill->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label>Job Description</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Post Job</button>
        </form>
    </div>
</div>
@endsection