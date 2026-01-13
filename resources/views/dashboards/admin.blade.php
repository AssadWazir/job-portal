@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid">
    <div class="row">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">Admin Control Panel</h2>
            </div>

            <div class="row text-center text-white">
                <div class="col-md-3 mb-3">
                    <div class="card bg-primary shadow border-0 p-3">
                        <h3>{{ $stats['total_users'] }}</h3>
                        <p class="mb-0">Users</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-success shadow border-0 p-3">
                        <h3>{{ $stats['total_jobs'] }}</h3>
                        <p class="mb-0">Active Jobs</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-warning shadow border-0 p-3 text-dark">
                        <h3>{{ $stats['total_applications'] }}</h3>
                        <p class="mb-0">Applications</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-danger shadow border-0 p-3">
                        <h3>{{ $stats['total_companies'] }}</h3>
                        <p class="mb-0">Companies</p>
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection