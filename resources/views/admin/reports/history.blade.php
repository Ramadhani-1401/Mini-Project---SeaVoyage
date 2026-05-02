@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rental History</h1>
        <a href="{{ route('admin.reports.printHistory', request()->query()) }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-print fa-sm text-white-50"></i> Print History
        </a>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.reports.history') }}" method="GET" class="form-inline d-flex align-items-center gap-3">
                <label for="status" class="mr-2">Filter Status:</label>
                <select name="status" id="status" class="form-select w-auto">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
                @if(request()->has('status') && request()->status != '')
                    <a href="{{ route('admin.reports.history') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Bookings</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Ship</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->ship->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</td>
                            <td>{{ format_idr((int) $booking->total_price) }}</td>
                            <td>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($booking->status == 'approved')
                                    <span class="badge bg-primary">Approved</span>
                                @elseif($booking->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @elseif($booking->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No history found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
