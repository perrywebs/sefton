@extends('layouts.auth')

@section('title', 'Admin Reset Password - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Admin Password Reset')
@section('form_subtitle', 'Enter the token and set a new password')

@section('auth_form')
    <form method="POST" action="{{ route('restpass') }}" class="auth-form">
        @csrf

        <!-- Email (Readonly) -->
        <div class="form-group">
            <label for="email">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" readonly required>
            </div>
            @error('email')
                <p style="color: #EF4444; font-size: 12px; margin-top: 4px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Token -->
        <div class="form-group">
            <label for="token">
                <i class="fas fa-key"></i> Reset Token
            </label>
            <div class="input-wrapper">
                <i class="fas fa-key input-icon"></i>
                <input id="token" type="number" name="token" placeholder="Enter your reset token" required>
            </div>
            @error('token')
                <p style="color: #EF4444; font-size: 12px; margin-top: 4px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> New Password
            </label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" type="password" name="password" placeholder="Min 8 characters" required
                    autocomplete="new-password">
                <button type="button" class="toggle-password" onclick="togglePasswordVisibility(this)"
                    aria-label="Toggle password visibility">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password')
                <p style="color: #EF4444; font-size: 12px; margin-top: 4px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">
                <i class="fas fa-check-circle"></i> Confirm Password
            </label>
            <div class="input-wrapper">
                <i class="fas fa-check-circle input-icon"></i>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Confirm your password" required autocomplete="new-password">
            </div>
            @error('password_confirmation')
                <p style="color: #EF4444; font-size: 12px; margin-top: 4px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-btn">
            <span>Reset Password</span>
            <i class="fas fa-redo"></i>
        </button>

        <!-- Back to Admin Login -->
        <div class="alternate-action">
            Remember your password? <a href="{{ route('adminloginform') }}">Admin Login</a>
        </div>
    </form>
@endsection
