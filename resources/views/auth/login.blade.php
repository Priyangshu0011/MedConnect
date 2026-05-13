@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="glass-card" style="width: 100%; max-width: 400px;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Welcome Back</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="color: var(--text-muted); cursor: pointer;">Remember Me</label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Login</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; color: var(--text-muted);">
            Don't have an account? <a href="{{ route('register') }}" style="color: var(--primary);">Register here</a>
        </p>
    </div>
</div>
@endsection
