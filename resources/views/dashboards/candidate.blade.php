@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Applications</h2>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-borderless">
                <thead class="border-bottom">
                    <tr>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Applied On</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($myApplications as $app)
                    <tr class="align-middle">
                        <td><strong>{{ $app->job->title }}</strong></td>
                        <td>{{ $app->job->company->name }}</td>
                        <td>{{ $app->created_at->format('M d, Y') }}</td>
                        <td>
                            @if($app->status == 'accepted')
                                <span class="badge bg-success">Accepted</span>
                            @elseif($app->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">You haven't applied for any jobs yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection