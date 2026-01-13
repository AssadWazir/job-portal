@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-dark text-white"><h4>Edit Company Profile</h4></div>
            <div class="card-body">
                <form action="{{ route('companies.update', $company->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}">
                    </div>

                    <div class="mb-3">
                        <label>Website</label>
                        <input type="url" name="website" class="form-control" value="{{ old('website', $company->website) }}">
                    </div>

                    <div class="mb-3">
                        <label>Company Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $company->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection