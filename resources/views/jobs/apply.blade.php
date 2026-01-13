@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white"><h4>Apply for: {{ $job->title }}</h4></div>
            <div class="card-body">
                <form action="{{ route('jobs.apply.store', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label>Upload Resume (PDF only)</label>
                        <input type="file" name="resume" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Cover Letter (Optional)</label>
                        <textarea name="cover_letter" class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection