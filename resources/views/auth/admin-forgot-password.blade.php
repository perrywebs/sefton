@extends('layouts.auth')

@section('title', 'Admin Forgot Password - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Admin Password Reset')
@section('form_subtitle', 'Enter your admin email to receive a reset link')

@section('auth_form')
    <form method="POST" action="{{ route('sendpasswordrequest') }}" class="auth-form">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input 
                    id="email"
                    type="email" 
                    name="email" 
                    placeholder="admin@example.com"
                    value="{{ old('email') }}"
                    required 
                    autocomplete="email"
                    autofocus
                >
            </div>
            @if ($errors->has('email'))
                <p style="color: #EF4444; font-size: 12px; margin-top: 4px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first('email') }}
                </p>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-btn">
            <span>Send Reset Link</span>
            <i class="fas fa-paper-plane"></i>
        </button>

        <!-- Back to Admin Login -->
        <div class="alternate-action">
            Remember your password? <a href="{{ route('adminloginform') }}">Admin Login</a>
        </div>
    </form>
@endsection