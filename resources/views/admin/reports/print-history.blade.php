<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental History Print</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { margin: 0; padding: 0; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px; cursor: pointer;">Print Document</button>
        <button onclick="window.close()" style="padding: 10px; cursor: pointer;">Close</button>
    </div>

    <div class="header">
        <h1>Sea Voyage</h1>
        <h3>Rental History Report</h3>
        <p>Generated on: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
        @if(request()->has('status') && request()->status != '')
            <p>Filtered by Status: <strong>{{ ucfirst(request()->status) }}</strong></p>
        @endif
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Ship</th>
                <th>Period</th>
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
                <td>
                    {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} - 
                    {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}
                </td>
                <td>{{ format_idr((int) $booking->total_price) }}</td>
                <td>{{ ucfirst($booking->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No history found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
