@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2>Admin Dashboard</h2>
</div>

<div class="glass-card">
    <p>Welcome to the Admin control panel, {{ $user->name }}.</p>
    <p style="color: var(--text-muted); margin-top: 1rem;">Here you can manage all doctors, departments, and monitor hospital statistics.</p>
</div>
@endsection
