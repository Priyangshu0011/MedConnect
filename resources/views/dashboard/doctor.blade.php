@extends('layouts.app')

@section('title', 'Doctor Dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2>Dr. {{ $user->name }}'s Schedule</h2>
</div>

<div class="glass-card">
    <h3 style="margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1rem;">Upcoming Appointments</h3>

    @php
        $appointments = \App\Models\Appointment::where('doctor_id', $user->doctorProfile->id)->with('patient')->orderBy('appointment_date')->orderBy('appointment_time')->get();
    @endphp

    @if($appointments->isEmpty())
        <p style="color: var(--text-muted); text-align: center; padding: 2rem 0;">You have no upcoming appointments.</p>
    @else
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.1); color: var(--text-muted);">
                        <th style="padding: 1rem;">Patient</th>
                        <th style="padding: 1rem;">Date & Time</th>
                        <th style="padding: 1rem;">Notes</th>
                        <th style="padding: 1rem;">Status</th>
                        <th style="padding: 1rem;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 1rem; font-weight: 500;">{{ $appointment->patient->name }}</td>
                        <td style="padding: 1rem;">
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d') }} at 
                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                        </td>
                        <td style="padding: 1rem; color: var(--text-muted); max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $appointment->notes ?: 'None' }}
                        </td>
                        <td style="padding: 1rem;">
                            <span style="padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.875rem; font-weight: 500;
                                @if($appointment->status == 'confirmed') background: rgba(16,185,129,0.2); color: #34D399;
                                @elseif($appointment->status == 'pending') background: rgba(245,158,11,0.2); color: #FBBF24;
                                @elseif($appointment->status == 'completed') background: rgba(79,70,229,0.2); color: #818CF8;
                                @else background: rgba(107,114,128,0.2); color: #9CA3AF;
                                @endif
                            ">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td style="padding: 1rem;">
                            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" style="display: flex; gap: 0.5rem;">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control" style="padding: 0.25rem; height: auto;" onchange="this.form.submit()">
                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Complete</option>
                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
