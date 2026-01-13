@extends('layouts.admin')

@section('admin_content')
<h2 class="h3 mb-4">All Job Applications</h2>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Candidate</th>
                    <th>Job & Category</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Applied Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                <tr>
                    <td>
                        <strong>{{ $app->user->name }}</strong><br>
                        <small class="text-muted">{{ $app->user->email }}</small>
                    </td>
                    <td>
                        {{ $app->job->title }}<br>
                        <span class="badge bg-light text-dark border">
                            {{ $app->job->category->name }}
                        </span>
                    </td>
                    <td>{{ $app->job->company->name }}</td>
                    <td>
                        @php
                            $color = [
                                'pending' => 'bg-warning text-dark',
                                'accepted' => 'bg-success',
                                'rejected' => 'bg-danger'
                            ][$app->status] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $color }}">{{ ucfirst($app->status) }}</span>
                    </td>
                    <td>{{ $app->created_at->format('M d, Y') }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" onsubmit="return confirm('Remove this application record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-link text-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $applications->links() }}
</div>
@endsection