@extends('layouts.auth')

@section('title', 'Admin Login - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Admin Portal')
@section('form_subtitle', 'Secure access to administration panel')

@section('auth_form')
    <form method="POST" action="{{ route('adminlogin') }}" class="auth-form">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" type="email" name="email" placeholder="admin@example.com"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> Password
            </label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" type="password" name="password" placeholder="Enter admin password" required
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
            <a href="{{ route('admin.forgetpassword') }}" class="forgot-link">
                Forgot password?
            </a>
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-btn">
            <span>Access Admin Panel</span>
            <i class="fas fa-arrow-right"></i>
        </button>

        <!-- Back to User Login -->
        <div class="alternate-action">
            User login? <a href="{{ route('login') }}">Sign In as User</a>
        </div>
    </form>
@endsection
