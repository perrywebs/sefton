@extends('layouts.auth')

@section('title', 'Sign In - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Welcome Back')
@section('form_subtitle', 'Sign in to your account')

@section('auth_form')
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" type="email" name="email" placeholder="you@example.com" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> Password
            </label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" type="password" name="password" placeholder="Enter your password" required
                    autocomplete="current-password">
                <button type="button" class="toggle-password" onclick="togglePasswordVisibility(this)"
                    aria-label="Toggle password visibility">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- Options -->
        <div class="form-options">
            <label class="remember-me">
                <input type="checkbox" name="remember_me" {{ old('remember_me') ? 'checked' : '' }}>
                Remember me
            </label>
            <a href="{{ route('password.request') }}" class="forgot-link">
                Forgot password?
            </a>
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-btn">
            <span>Sign In</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <!-- Divider -->
        <div class="divider">
            <span>or continue with</span>
        </div>

        <!-- Create Account -->
        <div class="alternate-action">
            New here? <a href="{{ route('register') }}">Create an account</a>
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* Login-specific overrides if needed */
        .auth-header h1 {
            color: var(--gray-900);
        }
    </style>
@endpush
