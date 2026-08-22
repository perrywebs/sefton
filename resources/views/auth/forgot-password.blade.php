@extends('layouts.auth')

@section('title', 'Forgot Password - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Reset Password')
@section('form_subtitle', 'We\'ll send you a link to reset your password')

@section('auth_form')
    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
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
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required 
                    autocomplete="email"
                    autofocus
                >
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-btn">
            <span>Send Reset Link</span>
            <i class="fas fa-paper-plane"></i>
        </button>

        <!-- Back to Login -->
        <div class="alternate-action">
            Remember your password? <a href="{{ route('login') }}">Sign In</a>
        </div>
    </form>
@endsection