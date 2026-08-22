@extends('layouts.auth')

@section('title', 'Create Account - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'Get Started')
@section('form_subtitle', 'Create your account in minutes')

@section('auth_form')
    <div id="register-app">
        
        <!-- Progress Steps -->
        <div class="register-progress">
            <div class="progress-steps">
                <div class="progress-step active" data-step="1">
                    <div class="step-circle">1</div>
                    <span class="step-label">Personal</span>
                </div>
                <div class="progress-step" data-step="2">
                    <div class="step-circle">2</div>
                    <span class="step-label">Contact</span>
                </div>
                <div class="progress-step" data-step="3">
                    <div class="step-circle">3</div>
                    <span class="step-label">Account</span>
                </div>
                <div class="progress-step" data-step="4">
                    <div class="step-circle">4</div>
                    <span class="step-label">Security</span>
                </div>
            </div>
            <div class="progress-bar-track">
                <div class="progress-bar-fill" id="progressFill" style="width: 25%;"></div>
            </div>
        </div>

        <form action="{{ route('register') }}" method="post" id="registration-form" novalidate>
            @csrf

            <!-- Step 1: Personal Information -->
            <div class="register-step" id="step-1">
                <div class="step-header">
                    <div class="step-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="step-title">Personal Information</h3>
                    <p class="step-desc">Tell us about yourself</p>
                </div>
                
                <div class="form-grid">
                    <div class="form-field">
                        <label for="name">First Name <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-user field-icon"></i>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                data-required="true"
                                placeholder="John"
                            >
                        </div>
                    </div>
                    
                    <div class="form-field">
                        <label for="lastname">Last Name <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-user field-icon"></i>
                            <input 
                                type="text" 
                                id="lastname" 
                                name="lastname" 
                                value="{{ old('lastname') }}"
                                data-required="true"
                                placeholder="Smith"
                            >
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="middlename">Middle Name</label>
                        <div class="field-wrapper">
                            <i class="fas fa-user field-icon"></i>
                            <input 
                                type="text" 
                                id="middlename" 
                                name="middlename" 
                                value="{{ old('middlename') }}"
                                placeholder="David"
                            >
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="username">Username <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-at field-icon"></i>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                value="{{ old('username') }}"
                                data-required="true"
                                placeholder="johnsmith123"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Contact Information -->
            <div class="register-step" id="step-2" style="display: none;">
                <div class="step-header">
                    <div class="step-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="step-title">Contact Information</h3>
                    <p class="step-desc">How can we reach you?</p>
                </div>
                
                <div class="form-grid">
                    <div class="form-field full-width">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-envelope field-icon"></i>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                data-required="true"
                                placeholder="john@example.com"
                            >
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-phone field-icon"></i>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                data-required="true"
                                placeholder="+1 (234) 567-8901"
                            >
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="country">Country <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-globe field-icon"></i>
                            <select 
                                id="country" 
                                name="country" 
                                data-required="true"
                            >
                                <option value="" disabled selected>Select Country</option>
                                @include('auth.countries')
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Account Setup -->
            <div class="register-step" id="step-3" style="display: none;">
                <div class="step-header">
                    <div class="step-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="step-title">Account Setup</h3>
                    <p class="step-desc">Choose your account preferences</p>
                </div>
                
                <div class="form-grid">
                    <div class="form-field full-width">
                        <label for="curr">Currency <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-dollar-sign field-icon"></i>
                            <select 
                                id="curr" 
                                name="curr" 
                                data-required="true"
                            >
                                <option value="" disabled selected>Select Currency</option>
                                @include('partials.currencies')
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="accounttype">Account Type <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-university field-icon"></i>
                            <select 
                                id="accounttype" 
                                name="accounttype" 
                                data-required="true"
                            >
                                <option value="" disabled selected>Select Account Type</option>
                                <option value="Checking Account">Checking Account</option>
                                <option value="Savings Account">Savings Account</option>
                                <option value="Fixed Deposit Account">Fixed Deposit Account</option>
                                <option value="Current Account">Current Account</option>
                                <option value="Business Account">Business Account</option>
                                <option value="Investment Account">Investment Account</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="pin">Transaction PIN <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-key field-icon"></i>
                            <input 
                                type="password" 
                                id="pin" 
                                name="pin" 
                                data-required="true"
                                placeholder="4-digit PIN" 
                                maxlength="4"
                            >
                            <button 
                                type="button" 
                                class="toggle-field"
                                onclick="toggleFieldVisibility(this)"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4: Security -->
            <div class="register-step" id="step-4" style="display: none;">
                <div class="step-header">
                    <div class="step-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="step-title">Security Setup</h3>
                    <p class="step-desc">Secure your account</p>
                </div>
                
                <div class="form-grid">
                    <div class="form-field full-width">
                        <label for="password">Password <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-lock field-icon"></i>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                data-required="true"
                                placeholder="Create strong password"
                            >
                            <button 
                                type="button" 
                                class="toggle-field"
                                onclick="toggleFieldVisibility(this)"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength" id="passwordStrength">
                            <span class="strength-bar"></span>
                            <span class="strength-bar"></span>
                            <span class="strength-bar"></span>
                            <span class="strength-bar"></span>
                            <span class="strength-text">Enter a password</span>
                        </div>
                    </div>
                    
                    <div class="form-field full-width">
                        <label for="password_confirmation">Confirm Password <span class="required">*</span></label>
                        <div class="field-wrapper">
                            <i class="fas fa-check-circle field-icon"></i>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                data-required="true"
                                placeholder="Confirm your password"
                            >
                            <button 
                                type="button" 
                                class="toggle-field"
                                onclick="toggleFieldVisibility(this)"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-field full-width terms-field">
                        <label class="checkbox-label">
                            <input 
                                type="checkbox" 
                                id="terms" 
                                name="terms" 
                                data-required="true"
                            >
                            <span class="checkmark"></span>
                            <span class="terms-text">
                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Hidden Currency Symbol -->
            <input type="hidden" name="s_curr" id="s_curr">

            <!-- Navigation -->
            <div class="register-nav">
                <button type="button" id="prevBtn" class="nav-btn prev-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back</span>
                </button>
                
                <button type="button" id="nextBtn" class="nav-btn next-btn">
                    <span>Continue</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                
                <button type="submit" id="submitBtn" class="nav-btn submit-btn">
                    <i class="fas fa-user-plus"></i>
                    <span>Create Account</span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="register-footer">
                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
        </form>

        <!-- Hidden CSRF for fallback -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </div>

    <style>
        /* ============================================================
                   REGISTER APP - Pure CSS
                   ============================================================ */

        #register-app {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 4px 0;
        }

        /* ============================================================
                   PROGRESS STEPS
                   ============================================================ */
        .register-progress {
            margin-bottom: 28px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            padding: 0 4px;
            margin-bottom: 6px;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            flex: 1;
            cursor: default;
            position: relative;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #E5E7EB;
            color: #9CA3AF;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid transparent;
        }

        .progress-step.active .step-circle {
            background: #10B981;
            color: #FFFFFF;
            border-color: #10B981;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            transform: scale(1.05);
        }

        .progress-step.completed .step-circle {
            background: #10B981;
            color: #FFFFFF;
            border-color: #10B981;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .step-label {
            font-size: 10px;
            font-weight: 500;
            color: #9CA3AF;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .progress-step.active .step-label {
            color: #10B981;
            font-weight: 600;
        }

        .progress-step.completed .step-label {
            color: #10B981;
        }

        .progress-bar-track {
            width: 100%;
            height: 4px;
            background: #E5E7EB;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 4px;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #10B981, #059669);
            border-radius: 4px;
            transition: width 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            width: 25%;
        }

        /* ============================================================
                   STEP CONTENT
                   ============================================================ */
        .register-step {
            animation: fadeSlide 0.4s ease;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .step-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 12px;
            background: linear-gradient(135deg, #ECFDF5, #D1FAE5);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #10B981;
        }

        .step-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-800);
            margin: 0 0 4px 0;
        }

        .step-desc {
            font-size: 13px;
            color: var(--gray-500);
            margin: 0;
        }

        /* ============================================================
                   FORM FIELDS
                   ============================================================ */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-field.full-width {
            grid-column: 1 / -1;
        }

        .form-field label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-field label .required {
            color: #EF4444;
            font-weight: 700;
        }

        .field-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .field-wrapper .field-icon {
            position: absolute;
            left: 12px;
            color: #9CA3AF;
            font-size: 13px;
            transition: color 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .field-wrapper input,
        .field-wrapper select {
            width: 100%;
            padding: 11px 12px 11px 38px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: var(--gray-800);
            background: var(--gray-50);
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            transition: all 0.3s ease;
            outline: none;
            appearance: none;
        }

        .field-wrapper select {
            padding-right: 36px;
            cursor: pointer;
            background-image: none;
        }

        .field-wrapper select option {
            color: var(--gray-800);
            background: var(--white);
        }

        .field-wrapper .select-arrow {
            position: absolute;
            right: 12px;
            color: #9CA3AF;
            font-size: 11px;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .field-wrapper select:focus ~ .select-arrow {
            transform: rotate(180deg);
        }

        .field-wrapper input:focus,
        .field-wrapper select:focus {
            border-color: #10B981;
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.08);
        }

        .field-wrapper input:focus ~ .field-icon,
        .field-wrapper select:focus ~ .field-icon {
            color: #10B981;
        }

        .field-wrapper input.error,
        .field-wrapper select.error {
            border-color: #EF4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.08);
        }

        .field-wrapper input::placeholder {
            color: #9CA3AF;
            font-size: 13px;
        }

        .field-wrapper .toggle-field {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            color: #9CA3AF;
            cursor: pointer;
            padding: 4px;
            transition: color 0.3s ease;
            font-size: 14px;
        }

        .field-wrapper .toggle-field:hover {
            color: var(--gray-600);
        }

        /* ============================================================
                   PASSWORD STRENGTH
                   ============================================================ */
        .password-strength {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            padding: 0 2px;
        }

        .strength-bar {
            flex: 1;
            height: 3px;
            background: #E5E7EB;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .strength-bar.weak {
            background: #EF4444;
        }
        .strength-bar.medium {
            background: #F59E0B;
        }
        .strength-bar.strong {
            background: #10B981;
        }
        .strength-bar.very-strong {
            background: #059669;
        }

        .strength-text {
            font-size: 10px;
            color: #9CA3AF;
            font-weight: 500;
            min-width: 80px;
            text-align: right;
        }

        .strength-text.weak { color: #EF4444; }
        .strength-text.medium { color: #F59E0B; }
        .strength-text.strong { color: #10B981; }
        .strength-text.very-strong { color: #059669; }

        /* ============================================================
                   TERMS CHECKBOX
                   ============================================================ */
        .terms-field {
            margin-top: 4px;
        }

        .checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
            position: relative;
            padding-left: 0;
        }

        .checkbox-label input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .checkbox-label .checkmark {
            width: 18px;
            height: 18px;
            min-width: 18px;
            border: 2px solid #D1D5DB;
            border-radius: 5px;
            background: var(--white);
            transition: all 0.3s ease;
            position: relative;
            margin-top: 1px;
        }

        .checkbox-label input[type="checkbox"]:checked + .checkmark {
            background: #10B981;
            border-color: #10B981;
        }

        .checkbox-label input[type="checkbox"]:checked + .checkmark::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #FFFFFF;
            font-size: 10px;
        }

        .checkbox-label .terms-text {
            font-size: 12px;
            color: var(--gray-600);
            line-height: 1.5;
        }

        .checkbox-label .terms-text a {
            color: #10B981;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .checkbox-label .terms-text a:hover {
            color: #059669;
            text-decoration: underline;
        }

        /* ============================================================
                   NAVIGATION BUTTONS
                   ============================================================ */
        .register-nav {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
        }

        .nav-btn {
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
        }

        .nav-btn:active {
            transform: scale(0.96);
        }

        .prev-btn {
            background: #F3F4F6;
            color: var(--gray-700);
            flex: 0.5;
        }

        .prev-btn:hover {
            background: #E5E7EB;
            transform: translateX(-2px);
        }

        .next-btn {
            background: linear-gradient(135deg, #10B981, #059669);
            color: #FFFFFF;
            flex: 1;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.2);
        }

        .next-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .submit-btn {
            background: linear-gradient(135deg, #10B981, #059669);
            color: #FFFFFF;
            flex: 1;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.2);
            display: none;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .nav-btn.hidden {
            display: none;
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .register-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--gray-600);
        }

        .register-footer a {
            color: #10B981;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-footer a:hover {
            color: #059669;
            text-decoration: underline;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 480px) {
            .register-progress {
                margin-bottom: 20px;
            }

            .step-circle {
                width: 28px;
                height: 28px;
                font-size: 11px;
            }

            .step-label {
                font-size: 9px;
            }

            .form-grid {
                gap: 12px;
            }

            .field-wrapper input,
            .field-wrapper select {
                padding: 10px 12px 10px 36px;
                font-size: 13px;
                border-radius: 10px;
            }

            .field-wrapper .field-icon {
                font-size: 12px;
                left: 10px;
            }

            .step-icon {
                width: 44px;
                height: 44px;
                font-size: 18px;
            }

            .step-title {
                font-size: 16px;
            }

            .nav-btn {
                padding: 10px 16px;
                font-size: 13px;
                border-radius: 10px;
            }

            .register-nav {
                gap: 8px;
                padding-top: 16px;
            }

            .checkbox-label .terms-text {
                font-size: 11px;
            }

            .password-strength {
                gap: 4px;
            }
        }

        @media (max-width: 380px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .progress-steps {
                gap: 4px;
            }

            .step-label {
                font-size: 8px;
            }
        }

        /* ============================================================
                   DARK MODE
                   ============================================================ */
        @media (prefers-color-scheme: dark) {
            .step-circle {
                background: #374151;
                color: #6B7280;
            }

            .progress-step.active .step-circle {
                background: #10B981;
                color: #FFFFFF;
            }

            .progress-step.completed .step-circle {
                background: #10B981;
                color: #FFFFFF;
            }

            .progress-bar-track {
                background: #374151;
            }

            .step-icon {
                background: rgba(16, 185, 129, 0.15);
            }

            .step-title {
                color: #F9FAFB;
            }

            .step-desc {
                color: #9CA3AF;
            }

            .form-field label {
                color: #D1D5DB;
            }

            .field-wrapper input,
            .field-wrapper select {
                background: #1F2937;
                border-color: #374151;
                color: #F9FAFB;
            }

            .field-wrapper input:focus,
            .field-wrapper select:focus {
                background: #1F2937;
                border-color: #10B981;
            }

            .field-wrapper input::placeholder {
                color: #6B7280;
            }

            .field-wrapper .field-icon {
                color: #6B7280;
            }

            .field-wrapper .toggle-field {
                color: #6B7280;
            }

            .checkbox-label .checkmark {
                background: #1F2937;
                border-color: #4B5563;
            }

            .checkbox-label input[type="checkbox"]:checked + .checkmark {
                background: #10B981;
                border-color: #10B981;
            }

            .checkbox-label .terms-text {
                color: #9CA3AF;
            }

            .prev-btn {
                background: #374151;
                color: #D1D5DB;
            }

            .prev-btn:hover {
                background: #4B5563;
            }

            .register-nav {
                border-top-color: #374151;
            }

            .register-footer {
                color: #9CA3AF;
            }

            .strength-bar {
                background: #374151;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ============================================================
            // REGISTER APP - Pure JavaScript
            // ============================================================
            
            const App = {
                currentStep: 1,
                totalSteps: 4,
                form: document.getElementById('registration-form'),
                nextBtn: document.getElementById('nextBtn'),
                prevBtn: document.getElementById('prevBtn'),
                submitBtn: document.getElementById('submitBtn'),
                progressFill: document.getElementById('progressFill'),
                steps: [],
                fields: {},

                init() {
                    this.steps = [
                        document.getElementById('step-1'),
                        document.getElementById('step-2'),
                        document.getElementById('step-3'),
                        document.getElementById('step-4')
                    ];

                    this.collectFields();
                    this.bindEvents();
                    this.updateUI();
                    this.initPasswordStrength();
                },

                collectFields() {
                    this.fields = {};
                    this.steps.forEach((step, index) => {
                        const inputs = step.querySelectorAll('[data-required="true"]');
                        this.fields[index + 1] = inputs;
                    });
                },

                bindEvents() {
                    // Next button
                    this.nextBtn.addEventListener('click', () => {
                        if (this.validateStep(this.currentStep)) {
                            if (this.currentStep < this.totalSteps) {
                                this.currentStep++;
                                this.updateUI();
                            }
                        }
                    });

                    // Previous button
                    this.prevBtn.addEventListener('click', () => {
                        if (this.currentStep > 1) {
                            this.currentStep--;
                            this.updateUI();
                        }
                    });

                    // Form submit
                    this.form.addEventListener('submit', (e) => {
                        if (!this.validateStep(4)) {
                            e.preventDefault();
                        }
                    });

                    // Real-time validation on input
                    document.querySelectorAll('input, select').forEach(el => {
                        el.addEventListener('input', () => this.clearFieldError(el));
                        el.addEventListener('change', () => this.clearFieldError(el));
                    });

                    // PIN input restriction
                    const pinInput = document.getElementById('pin');
                    if (pinInput) {
                        pinInput.addEventListener('input', function() {
                            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
                        });
                    }

                    // Currency symbol sync
                    const currSelect = document.getElementById('curr');
                    if (currSelect) {
                        currSelect.addEventListener('change', function() {
                            const selected = this.options[this.selectedIndex];
                            const symbol = selected.getAttribute('data-symbol');
                            if (symbol) {
                                document.getElementById('s_curr').value = symbol;
                            }
                        });
                    }
                },

                validateStep(step) {
                    let isValid = true;
                    const fields = this.fields[step] || [];

                    fields.forEach(field => {
                        if (field.type === 'checkbox') {
                            if (!field.checked) {
                                this.markFieldError(field);
                                isValid = false;
                            } else {
                                this.clearFieldError(field);
                            }
                        } else {
                            if (!field.value || field.value.trim() === '') {
                                this.markFieldError(field);
                                isValid = false;
                            } else {
                                this.clearFieldError(field);
                            }
                        }
                    });

                    // Password confirmation check
                    if (step === 4) {
                        const pass = document.getElementById('password');
                        const confirmPass = document.getElementById('password_confirmation');
                        if (pass && confirmPass && pass.value !== confirmPass.value) {
                            this.markFieldError(confirmPass);
                            isValid = false;
                        }
                    }

                    return isValid;
                },

                markFieldError(field) {
                    const wrapper = field.closest('.field-wrapper');
                    if (wrapper) {
                        wrapper.querySelector('input, select')?.classList.add('error');
                    }
                },

                clearFieldError(field) {
                    const wrapper = field.closest('.field-wrapper');
                    if (wrapper) {
                        wrapper.querySelector('input, select')?.classList.remove('error');
                    }
                },

                updateUI() {
                    // Show/hide steps
                    this.steps.forEach((step, index) => {
                        const stepNum = index + 1;
                        if (stepNum === this.currentStep) {
                            step.style.display = 'block';
                        } else {
                            step.style.display = 'none';
                        }
                    });

                    // Update progress
                    const progress = (this.currentStep / this.totalSteps) * 100;
                    this.progressFill.style.width = progress + '%';

                    // Update step circles
                    document.querySelectorAll('.progress-step').forEach(el => {
                        const stepNum = parseInt(el.dataset.step);
                        el.classList.remove('active', 'completed');
                        if (stepNum === this.currentStep) {
                            el.classList.add('active');
                        } else if (stepNum < this.currentStep) {
                            el.classList.add('completed');
                        }
                    });

                    // Update navigation buttons
                    if (this.currentStep === 1) {
                        this.prevBtn.style.display = 'none';
                    } else {
                        this.prevBtn.style.display = 'flex';
                    }

                    if (this.currentStep === this.totalSteps) {
                        this.nextBtn.style.display = 'none';
                        this.submitBtn.style.display = 'flex';
                    } else {
                        this.nextBtn.style.display = 'flex';
                        this.submitBtn.style.display = 'none';
                    }
                },

                initPasswordStrength() {
                    const passwordInput = document.getElementById('password');
                    if (!passwordInput) return;

                    const strengthBars = document.querySelectorAll('.strength-bar');
                    const strengthText = document.querySelector('.strength-text');

                    passwordInput.addEventListener('input', function() {
                        const password = this.value;
                        const strength = App.checkPasswordStrength(password);

                        // Update bars
                        strengthBars.forEach((bar, index) => {
                            bar.className = 'strength-bar';
                            if (index < strength.level) {
                                bar.classList.add(strength.class);
                            }
                        });

                        // Update text
                        strengthText.textContent = strength.label;
                        strengthText.className = 'strength-text ' + strength.class;
                    });
                },

                checkPasswordStrength(password) {
                    if (password.length === 0) {
                        return { level: 0, class: '', label: 'Enter a password' };
                    }

                    let score = 0;
                    if (password.length >= 8) score++;
                    if (password.length >= 12) score++;
                    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
                    if (/\d/.test(password)) score++;
                    if (/[^a-zA-Z0-9]/.test(password)) score++;

                    const levels = [
                        { level: 1, class: 'weak', label: 'Weak' },
                        { level: 2, class: 'weak', label: 'Weak' },
                        { level: 3, class: 'medium', label: 'Medium' },
                        { level: 4, class: 'strong', label: 'Strong' },
                        { level: 5, class: 'very-strong', label: 'Very Strong' }
                    ];

                    const result = levels[Math.min(score, 4)] || levels[0];
                    return {
                        level: result.level,
                        class: result.class,
                        label: result.label
                    };
                }
            };

            // Initialize app
            App.init();

            // ============================================================
            // TOGGLE PASSWORD VISIBILITY
            // ============================================================
            window.toggleFieldVisibility = function(button) {
                const wrapper = button.closest('.field-wrapper');
                const input = wrapper.querySelector('input');
                const icon = button.querySelector('i');

                if (input && icon) {
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                }
            };

            // ============================================================
            // RIPPLE EFFECT ON BUTTONS
            // ============================================================
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255,255,255,0.2);
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        pointer-events: none;
                        transform: scale(0);
                        animation: rippleEffect 0.6s linear forwards;
                    `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Inject ripple keyframes
            if (!document.getElementById('rippleStyles')) {
                const style = document.createElement('style');
                style.id = 'rippleStyles';
                style.textContent = `
                    @keyframes rippleEffect {
                        to {
                            transform: scale(4);
                            opacity: 0;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
        });
    </script>

    @stack('scripts')
@endsection