@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Leads List</h2>

        <div class="table-responsive"> {{-- 👈 Add this wrapper --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Business Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leads as $lead)
                        <tr>
                            <td>{{ $lead->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($lead->date)->format('d M Y') }}</td>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->business_name }}</td>
                            <td>{{ $lead->mobile }}</td>
                            <td>{{ $lead->email ?? '-' }}</td>
                            <td>{{ $lead->address }}</td>
                            <td>
                                <span
                                    class="badge 
                                    @if ($lead->status == 'new') bg-primary 
                                    @elseif($lead->status == 'in_progress') bg-warning 
                                    @else bg-success @endif">
                                    {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                                </span>
                            </td>
                            <td>{{ $lead->user->name ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No leads found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> {{-- 👈 Close the responsive wrapper --}}
    </div>
@endsection
