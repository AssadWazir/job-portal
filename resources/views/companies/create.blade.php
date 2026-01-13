@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-dark text-white"><h4>Setup Company Profile</h4></div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card-body">
                <form action="{{ route('companies.store') }}" method="POST">
                    @csrf 
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Website (Optional)</label>
                        <input type="url" name="website" class="form-control" placeholder="https://example.com" value="{{ old('website') }}">
                    </div>

                    <div class="mb-3">
                        <label>Company Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Save Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection