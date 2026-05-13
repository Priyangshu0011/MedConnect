@extends('layouts.app')

@section('title', 'Patient Dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2>Welcome, {{ $user->name }}</h2>
    <a href="{{ route('doctors.index') }}" class="btn-primary">Book New Appointment</a>
</div>

<div class="glass-card">
    <h3 style="margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1rem;">My Appointments</h3>

    @if($user->appointments->isEmpty())
        <p style="color: var(--text-muted); text-align: center; padding: 2rem 0;">You have no appointments scheduled.</p>
    @else
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.1); color: var(--text-muted);">
                        <th style="padding: 1rem;">Doctor</th>
                        <th style="padding: 1rem;">Department</th>
                        <th style="padding: 1rem;">Date</th>
                        <th style="padding: 1rem;">Time</th>
                        <th style="padding: 1rem;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->appointments as $appointment)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 1rem; font-weight: 500;">Dr. {{ $appointment->doctor->user->name }}</td>
                        <td style="padding: 1rem; color: var(--text-muted);">{{ $appointment->doctor->department->name }}</td>
                        <td style="padding: 1rem;">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                        <td style="padding: 1rem;">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                        <td style="padding: 1rem;">
                            <span style="padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.875rem; font-weight: 500;
                                @if($appointment->status == 'confirmed') background: rgba(16,185,129,0.2); color: #34D399;
                                @elseif($appointment->status == 'pending') background: rgba(245,158,11,0.2); color: #FBBF24;
                                @else background: rgba(107,114,128,0.2); color: #9CA3AF;
                                @endif
                            ">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
