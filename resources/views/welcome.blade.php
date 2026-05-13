@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="text-align: center; padding: 5rem 0;">
    <h1 style="font-size: 4rem; margin-bottom: 1.5rem;" class="page-title">{{ __('messages.welcome_title') }}</h1>
    <p style="font-size: 1.2rem; color: var(--text-muted); max-width: 600px; margin: 0 auto 3rem auto;">
        {{ __('messages.welcome_subtitle') }}
    </p>
    
    <div style="display: flex; justify-content: center; gap: 1rem;">
        @auth
            <a href="{{ route('dashboard') }}" class="btn-primary" style="font-size: 1.2rem; padding: 1rem 2rem;">Go to Dashboard</a>
        @else
            <a href="{{ route('register') }}" class="btn-primary" style="font-size: 1.2rem; padding: 1rem 2rem;">Book an Appointment</a>
            <a href="{{ route('login') }}" class="btn-primary" style="background: transparent; border: 2px solid var(--primary); font-size: 1.2rem; padding: 1rem 2rem;">Doctor Login</a>
        @endauth
    </div>

    <div class="grid grid-cols-3" style="margin-top: 5rem; text-align: left;">
        <div class="glass-card">
            <h3>Optimize Availability</h3>
            <p style="color: var(--text-muted)">AI-driven appointment allocation ensures minimal waiting times for patients.</p>
        </div>
        <div class="glass-card">
            <h3>Specialized Doctors</h3>
            <p style="color: var(--text-muted)">Connect with highly qualified professionals from various departments.</p>
        </div>
        <div class="glass-card">
            <h3>Secure & Private</h3>
            <p style="color: var(--text-muted)">Your medical data and appointment schedules are encrypted and secure.</p>
        </div>
    </div>
</div>
@endsection
