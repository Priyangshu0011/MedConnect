@extends('layouts.app')

@section('title', 'Find a Doctor')

@section('content')
<div style="margin-bottom: 2rem;">
    <h2 class="page-title">Find a Specialist</h2>
    
    <div class="glass-card" style="margin-bottom: 2rem;">
        <form action="{{ route('doctors.index') }}" method="GET" style="display: flex; gap: 1rem; align-items: flex-end;">
            <div class="form-group" style="flex: 1; margin-bottom: 0;">
                <label for="department" class="form-label">Filter by Department</label>
                <select name="department_id" id="department" class="form-control">
                    <option value="">All Departments</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-primary" style="height: 46px;">Filter</button>
        </form>
    </div>

    <div class="grid grid-cols-3">
        @forelse($doctors as $doctor)
            <div class="glass-card" style="text-align: center;">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--secondary)); margin: 0 auto 1rem auto; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold;">
                    {{ substr($doctor->user->name, 0, 1) }}
                </div>
                <h3 style="margin-bottom: 0.5rem;">{{ $doctor->user->name }}</h3>
                <p style="color: var(--primary); font-weight: 600; margin-bottom: 0.5rem;">{{ $doctor->department->name }}</p>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1rem;">{{ $doctor->qualification }}</p>
                
                <div style="background: rgba(0,0,0,0.2); padding: 0.5rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.85rem;">
                    <span style="color: var(--text-muted);">Available:</span> {{ $doctor->available_days }}
                </div>

                <a href="{{ route('appointments.create', $doctor->id) }}" class="btn-primary" style="display: inline-block; width: 100%;">Book Appointment</a>
            </div>
        @empty
            <div style="grid-column: span 3; text-align: center; padding: 3rem; color: var(--text-muted);">
                No doctors found in this department.
            </div>
        @endforelse
    </div>
</div>
@endsection
