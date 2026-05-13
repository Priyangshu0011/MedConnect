@extends('layouts.app')

@section('title', 'Book Appointment')

@section('content')
<div style="display: flex; justify-content: center; min-height: 70vh;">
    <div class="glass-card" style="width: 100%; max-width: 600px;">
        <h2 style="margin-bottom: 2rem;">Book Appointment with {{ $doctor->user->name }}</h2>

        <div style="background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 8px; margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem;">
                {{ substr($doctor->user->name, 0, 1) }}
            </div>
            <div>
                <p style="font-weight: 600;">{{ $doctor->department->name }} Specialist</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Available: {{ $doctor->available_days }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            
            <div class="grid grid-cols-2">
                <div class="form-group">
                    <label for="appointment_date" class="form-label">Preferred Date</label>
                    <input type="date" id="appointment_date" name="appointment_date" class="form-control" value="{{ old('appointment_date') }}" min="{{ date('Y-m-d') }}" required>
                    @error('appointment_date')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="appointment_time" class="form-label">Preferred Time</label>
                    <input type="time" id="appointment_time" name="appointment_time" class="form-control" value="{{ old('appointment_time') }}" required>
                    @error('appointment_time')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="notes" class="form-label">Additional Notes (Optional)</label>
                <textarea id="notes" name="notes" class="form-control" rows="4">{{ old('notes') }}</textarea>
                @error('notes')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Confirm Booking</button>
        </form>
    </div>
</div>
@endsection
