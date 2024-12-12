<!DOCTYPE html>
<html lang="en">
    <head>
        @include('header')
        <link rel="stylesheet" href="{{ asset('css/reports.css') }}">
        <title>Reports</title>
    </head>
    @include('nav')
    <body>
        <div class="reports-container">
            <div class="reports-list">
                @if($reports->isEmpty())
                    <p>No reports available.</p>
                @else
                    <table class="reports-table">
                    
                        <thead>
                            <tr>
                                <th>Report Title</th>
                                <th>Bounty</th>
                                <th>Submitted By</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            @if(auth('company')->check() && auth('company')->id() === $report->bounty->company_id || auth('web')->check())
                            <tr>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->bounty->title }}</td>
                                
                                @if(auth()->id() === $report->user_id)
                                    <td style="color:cyan">{{ $report->user->name ?? 'N/A' }}</td>
                                @else
                                    <td>{{ $report->user->name ?? 'N/A' }}</td>
                                @endif
                                
                                <td>{{ $report->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('reports.show', ['id' => $report->id]) }}" class="view-link">View Details</a>
                                </td>
                            </tr>
                            @endif
                            
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </body>
    @include('footer')
</html>
