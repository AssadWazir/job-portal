@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Recent Applicants</h3>

    <div class="card shadow">
        <div class="card-body">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Candidate</th>
                        <th>Applied For</th>
                        <th>Resume</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applicants as $app)
                    <tr>
                        <td>
                            <strong>{{ $app->user->name }}</strong><br>
                            <small class="text-muted">{{ $app->user->email }}</small>
                        </td>
                        <td>{{ $app->job->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $app->resume) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                📄 View PDF
                            </a>
                        </td>
                        <td>{{ $app->created_at->format('M d, Y') }}</td>

                        @if ($app->status == 'pending')
                            
     <td>
    <div class="d-flex gap-2">
        <form action="{{ route('applications.updateStatus', $app->id) }}" method="POST">
            @csrf
            <input type="hidden" name="status" value="accepted">
            <button type="submit" class="btn btn-sm btn-success {{ $app->status == 'accepted' ? 'disabled' : '' }}">
                Accept
            </button>
        </form>

        <form action="{{ route('applications.updateStatus', $app->id) }}" method="POST">
            @csrf
            <input type="hidden" name="status" value="rejected">
            <button type="submit" class="btn btn-sm btn-danger {{ $app->status == 'rejected' ? 'disabled' : '' }}">
                Reject
            </button>
        </form>
    </div>
</td>
                            
                        @else

                       <td> 

                        <span class="badge {{ $app->status == 'accepted' ? 'bg-success' : 'bg-danger' }}">
            {{ ucfirst($app->status) }}
        </span>
                       </td>
                            
                        @endif
                     
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No applications received yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection