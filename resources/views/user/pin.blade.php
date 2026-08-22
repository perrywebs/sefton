@extends('layouts.auth')

@section('title', 'PIN Verification - ' . ($settings->site_name ?? 'SecureApp'))
@section('form_title', 'PIN Verification')
@section('form_subtitle', 'Enter your 4-digit PIN to continue')

@section('auth_form')
    <div id="pin-app">
        
        <!-- User Avatar & Info -->
        <div class="text-center mb-2">
            <div class="relative inline-block mb-3">
                <div class="avatar-container">
                    <img src="{{ asset('storage/app/public/photos/' . Auth::user()->profile_photo_path) }}"
                        alt="{{ Auth::user()->name }}"
                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=10B981&background=ECFDF5';"
                        class="avatar-image">
                    <div class="avatar-badge">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>
            </div>

            <p class="user-name">{{ Auth::user()->name }}</p>
            <p class="user-hint">Enter your PIN to access your account</p>
        </div>

        <!-- Security Badge -->
        <div class="security-badge">
            <i class="fas fa-lock"></i>
            Secure PIN Verification
        </div>

        <!-- PIN Dots -->
        <div class="pin-dots" id="pinDots">
            <span class="pin-dot" data-index="0"></span>
            <span class="pin-dot" data-index="1"></span>
            <span class="pin-dot" data-index="2"></span>
            <span class="pin-dot" data-index="3"></span>
        </div>

        <!-- Error Message -->
        <div class="error-message" id="errorMessage" style="display: none;">
            <i class="fas fa-exclamation-triangle"></i>
            <span id="errorText">Invalid PIN. Please try again.</span>
        </div>

        <!-- Success Message -->
        <div class="success-message" id="successMessage" style="display: none;">
            <i class="fas fa-check-circle"></i>
            <span>PIN Verified! Redirecting...</span>
        </div>

        <!-- Keypad -->
        <div class="keypad">
            <!-- Numbers 1-9 -->
            <button type="button" class="keypad-btn" data-digit="1">1</button>
            <button type="button" class="keypad-btn" data-digit="2">2</button>
            <button type="button" class="keypad-btn" data-digit="3">3</button>
            <button type="button" class="keypad-btn" data-digit="4">4</button>
            <button type="button" class="keypad-btn" data-digit="5">5</button>
            <button type="button" class="keypad-btn" data-digit="6">6</button>
            <button type="button" class="keypad-btn" data-digit="7">7</button>
            <button type="button" class="keypad-btn" data-digit="8">8</button>
            <button type="button" class="keypad-btn" data-digit="9">9</button>

            <!-- Sign Out -->
            <form method="POST" action="{{ route('logout') }}" class="keypad-action">
                @csrf
                <button type="submit" class="keypad-action-btn keypad-logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>

            <!-- Number 0 -->
            <button type="button" class="keypad-btn" data-digit="0">0</button>

            <!-- Backspace -->
            <button type="button" class="keypad-btn keypad-backspace" id="backspaceBtn">
                <i class="fas fa-backspace"></i>
            </button>
        </div>

        <!-- Submit Button -->
        <button type="button" class="verify-btn" id="verifyBtn" disabled>
            <span class="verify-btn-text">Verify PIN</span>
            <span class="verify-btn-loader" style="display: none;">
                <span class="loader-spinner"></span>
                Verifying...
            </span>
        </button>

        <!-- Security Notice -->
        <div class="security-notice">
            <i class="fas fa-shield-alt"></i>
            Your PIN is encrypted and secure
        </div>

        <!-- Account Status Warning -->
        @if (Auth::user()->status == 'blocked')
            <div class="account-blocked">
                <div class="account-blocked-content">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <p class="account-blocked-title">Account Blocked</p>
                        <p class="account-blocked-text">Your account has been blocked for security reasons. Please contact support.</p>
                        <a href="mailto:{{ $settings->contact_email ?? 'support@example.com' }}" class="account-blocked-link">
                            <i class="fas fa-envelope"></i>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Hidden CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" id="pinValue" value="">
        <input type="hidden" id="verifyUrl" value="{{ route('pinstatus') }}">
        <input type="hidden" id="redirectUrl" value="{{ route('dashboard') }}">
    </div>

    <style>
        /* ============================================================
                   PIN APP - Pure CSS
                   ============================================================ */

        #pin-app {
            width: 100%;
            max-width: 340px;
            margin: 0 auto;
            padding: 4px 0;
        }

        /* ============================================================
                   AVATAR
                   ============================================================ */
        .avatar-container {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #10B981;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.15);
            transition: transform 0.3s ease;
        }

        .avatar-image:hover {
            transform: scale(1.05);
        }

        .avatar-badge {
            position: absolute;
            bottom: -4px;
            right: -4px;
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            border-radius: 50%;
            border: 2px solid #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 12px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .user-name {
            font-size: 15px;
            font-weight: 600;
            color: var(--gray-800);
            margin-top: 8px;
            margin-bottom: 2px;
        }

        .user-hint {
            font-size: 12px;
            color: var(--gray-500);
            font-weight: 400;
        }

        /* ============================================================
                   SECURITY BADGE
                   ============================================================ */
        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 14px;
            background: #ECFDF5;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 500;
            color: #059669;
            margin: 8px auto 12px;
            border: 1px solid #A7F3D0;
            justify-content: center;
        }

        .security-badge i {
            font-size: 11px;
        }

        /* ============================================================
                   PIN DOTS
                   ============================================================ */
        .pin-dots {
            display: flex;
            justify-content: center;
            gap: 16px;
            padding: 8px 0 12px;
            min-height: 40px;
            align-items: center;
        }

        .pin-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #E5E7EB;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-block;
        }

        .pin-dot.active {
            background: #10B981;
            transform: scale(1.2);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
        }

        .pin-dot.success {
            background: #10B981;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.4);
            animation: dotSuccess 0.5s ease;
        }

        .pin-dot.error {
            background: #EF4444;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
            animation: dotError 0.5s ease;
        }

        @keyframes dotSuccess {
            0% { transform: scale(1); }
            50% { transform: scale(1.4); }
            100% { transform: scale(1.1); }
        }

        @keyframes dotError {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        .pin-dots.shake {
            animation: shakeDots 0.5s ease;
        }

        @keyframes shakeDots {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-6px); }
            80% { transform: translateX(6px); }
        }

        /* ============================================================
                   ERROR & SUCCESS MESSAGES
                   ============================================================ */
        .error-message,
        .success-message {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            animation: slideMessage 0.3s ease;
        }

        .error-message {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .error-message i {
            color: #EF4444;
            font-size: 14px;
        }

        .success-message {
            background: #F0FDF4;
            color: #065F46;
            border: 1px solid #BBF7D0;
        }

        .success-message i {
            color: #10B981;
            font-size: 14px;
        }

        .error-message.show,
        .success-message.show {
            display: flex;
        }

        @keyframes slideMessage {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================================
                   KEYPAD
                   ============================================================ */
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            max-width: 300px;
            margin: 0 auto;
        }

        .keypad-btn {
            height: 58px;
            border-radius: 14px;
            background: #F9FAFB;
            border: 2px solid #E5E7EB;
            color: #1F2937;
            font-size: 20px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            user-select: none;
            touch-action: manipulation;
        }

        .keypad-btn:hover:not(:disabled) {
            background: #F3F4F6;
            border-color: #10B981;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
        }

        .keypad-btn:active:not(:disabled) {
            transform: scale(0.95);
            background: #ECFDF5;
            border-color: #10B981;
        }

        .keypad-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            transform: none !important;
        }

        .keypad-backspace {
            background: #10B981;
            border-color: #10B981;
            color: #FFFFFF;
            font-size: 18px;
        }

        .keypad-backspace:hover:not(:disabled) {
            background: #059669;
            border-color: #059669;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.25);
        }

        .keypad-backspace:active:not(:disabled) {
            background: #047857;
            border-color: #047857;
        }

        .keypad-action {
            height: 58px;
        }

        .keypad-action-btn {
            width: 100%;
            height: 100%;
            border-radius: 14px;
            border: 2px solid #FECACA;
            background: #FEF2F2;
            color: #DC2626;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .keypad-action-btn:hover {
            background: #FEE2E2;
            border-color: #FCA5A5;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.1);
        }

        .keypad-action-btn:active {
            transform: scale(0.95);
        }

        /* ============================================================
                   VERIFY BUTTON
                   ============================================================ */
        .verify-btn {
            width: 100%;
            max-width: 300px;
            margin: 10px auto 0;
            padding: 14px;
            border-radius: 14px;
            border: none;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: #FFFFFF;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.2);
            position: relative;
            overflow: hidden;
        }

        .verify-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .verify-btn:active:not(:disabled) {
            transform: scale(0.97);
        }

        .verify-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .verify-btn .loader-spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #FFFFFF;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            margin-right: 6px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ============================================================
                   SECURITY NOTICE
                   ============================================================ */
        .security-notice {
            text-align: center;
            margin-top: 12px;
            font-size: 11px;
            color: var(--gray-400);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .security-notice i {
            color: #10B981;
            font-size: 12px;
        }

        /* ============================================================
                   ACCOUNT BLOCKED
                   ============================================================ */
        .account-blocked {
            margin-top: 16px;
            padding: 14px 16px;
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 12px;
        }

        .account-blocked-content {
            display: flex;
            gap: 10px;
        }

        .account-blocked-content > i {
            color: #EF4444;
            font-size: 18px;
            margin-top: 2px;
        }

        .account-blocked-title {
            font-size: 13px;
            font-weight: 600;
            color: #991B1B;
            margin: 0 0 2px 0;
        }

        .account-blocked-text {
            font-size: 12px;
            color: #7F1D1D;
            margin: 0 0 6px 0;
        }

        .account-blocked-link {
            font-size: 12px;
            font-weight: 500;
            color: #DC2626;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s ease;
        }

        .account-blocked-link:hover {
            color: #B91C1C;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 400px) {
            .keypad {
                gap: 8px;
            }

            .keypad-btn,
            .keypad-action-btn {
                height: 50px;
                font-size: 17px;
                border-radius: 12px;
            }

            .avatar-container {
                width: 64px;
                height: 64px;
            }

            .avatar-badge {
                width: 24px;
                height: 24px;
                font-size: 10px;
            }

            .pin-dots {
                gap: 12px;
            }

            .pin-dot {
                width: 12px;
                height: 12px;
            }

            .verify-btn {
                padding: 12px;
                font-size: 14px;
            }
        }

        /* ============================================================
                   DARK MODE OVERRIDES
                   ============================================================ */
        @media (prefers-color-scheme: dark) {
            .keypad-btn {
                background: #374151;
                border-color: #4B5563;
                color: #F9FAFB;
            }

            .keypad-btn:hover:not(:disabled) {
                background: #4B5563;
                border-color: #10B981;
            }

            .keypad-btn:active:not(:disabled) {
                background: #1F2937;
            }

            .keypad-backspace {
                background: #10B981;
                border-color: #10B981;
            }

            .keypad-backspace:hover:not(:disabled) {
                background: #059669;
                border-color: #059669;
            }

            .keypad-action-btn {
                background: rgba(254, 242, 242, 0.08);
                border-color: rgba(252, 165, 165, 0.2);
                color: #FCA5A5;
            }

            .keypad-action-btn:hover {
                background: rgba(254, 242, 242, 0.15);
                border-color: rgba(252, 165, 165, 0.3);
            }

            .user-name {
                color: #F9FAFB;
            }

            .user-hint {
                color: #9CA3AF;
            }

            .security-badge {
                background: rgba(16, 185, 129, 0.15);
                border-color: rgba(16, 185, 129, 0.2);
                color: #34D399;
            }

            .pin-dot {
                background: #4B5563;
            }

            .pin-dot.active {
                background: #10B981;
            }

            .error-message {
                background: rgba(254, 242, 242, 0.08);
                color: #FCA5A5;
                border-color: rgba(252, 165, 165, 0.2);
            }

            .error-message i {
                color: #F87171;
            }

            .success-message {
                background: rgba(240, 253, 244, 0.08);
                color: #6EE7B7;
                border-color: rgba(107, 231, 183, 0.2);
            }

            .success-message i {
                color: #34D399;
            }

            .security-notice {
                color: #6B7280;
            }

            .account-blocked {
                background: rgba(254, 242, 242, 0.08);
                border-color: rgba(252, 165, 165, 0.2);
            }

            .account-blocked-title {
                color: #FCA5A5;
            }

            .account-blocked-text {
                color: #FCA5A5;
            }

            .account-blocked-link {
                color: #F87171;
            }

            .account-blocked-link:hover {
                color: #FCA5A5;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ============================================================
            // PIN APP - Pure JavaScript
            // ============================================================
            
            const pinApp = {
                pin: '',
                maxLength: 4,
                isProcessing: false,
                dots: [],
                verifyBtn: null,
                errorMessage: null,
                successMessage: null,
                errorText: null,

                init() {
                    this.dots = document.querySelectorAll('.pin-dot');
                    this.verifyBtn = document.getElementById('verifyBtn');
                    this.errorMessage = document.getElementById('errorMessage');
                    this.successMessage = document.getElementById('successMessage');
                    this.errorText = document.getElementById('errorText');

                    // Keypad buttons
                    document.querySelectorAll('.keypad-btn[data-digit]').forEach(btn => {
                        btn.addEventListener('click', () => this.addDigit(btn.dataset.digit));
                    });

                    // Backspace
                    document.getElementById('backspaceBtn').addEventListener('click', () => this.removeDigit());

                    // Verify button
                    this.verifyBtn.addEventListener('click', () => this.submitPin());

                    // Keyboard support
                    document.addEventListener('keydown', (e) => {
                        if (e.key >= '0' && e.key <= '9') {
                            this.addDigit(e.key);
                        } else if (e.key === 'Backspace') {
                            this.removeDigit();
                        } else if (e.key === 'Enter') {
                            this.submitPin();
                        }
                    });

                    // Focus the keypad area
                    document.querySelector('.keypad').focus();
                },

                updateDots() {
                    const length = this.pin.length;
                    this.dots.forEach((dot, index) => {
                        dot.className = 'pin-dot';
                        if (index < length) {
                            dot.classList.add('active');
                        }
                    });
                    // Update verify button state
                    this.verifyBtn.disabled = length !== this.maxLength;
                },

                addDigit(digit) {
                    if (this.isProcessing) return;
                    if (this.pin.length >= this.maxLength) return;
                    
                    this.pin += digit;
                    this.updateDots();
                    
                    // Clear any previous error
                    this.hideError();
                    
                    // Haptic feedback
                    if (window.navigator && window.navigator.vibrate) {
                        window.navigator.vibrate(10);
                    }

                    // Auto-submit when PIN is complete
                    if (this.pin.length === this.maxLength) {
                        setTimeout(() => this.submitPin(), 300);
                    }
                },

                removeDigit() {
                    if (this.isProcessing) return;
                    if (this.pin.length === 0) return;
                    
                    this.pin = this.pin.slice(0, -1);
                    this.updateDots();
                    this.hideError();
                },

                showError(message) {
                    this.errorText.textContent = message || 'Invalid PIN. Please try again.';
                    this.errorMessage.classList.add('show');
                    this.successMessage.classList.remove('show');
                    
                    // Shake animation on dots
                    const dotsContainer = document.querySelector('.pin-dots');
                    dotsContainer.classList.add('shake');
                    setTimeout(() => dotsContainer.classList.remove('shake'), 500);
                },

                hideError() {
                    this.errorMessage.classList.remove('show');
                },

                showSuccess() {
                    this.successMessage.classList.add('show');
                    this.errorMessage.classList.remove('show');
                },

                async submitPin() {
                    if (this.isProcessing) return;
                    if (this.pin.length !== this.maxLength) {
                        this.showError('Please enter all 4 digits');
                        return;
                    }

                    this.isProcessing = true;
                    this.verifyBtn.disabled = true;
                    
                    // Show loading state
                    const btnText = this.verifyBtn.querySelector('.verify-btn-text');
                    const btnLoader = this.verifyBtn.querySelector('.verify-btn-loader');
                    btnText.style.display = 'none';
                    btnLoader.style.display = 'flex';

                    try {
                        const response = await fetch(document.getElementById('verifyUrl').value, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                            },
                            body: JSON.stringify({
                                pin: this.pin
                            })
                        });

                        const result = await response.json();

                        if (result.success) {
                            // Success animation
                            this.dots.forEach((dot, index) => {
                                setTimeout(() => {
                                    dot.className = 'pin-dot success';
                                }, index * 100);
                            });

                            this.showSuccess();

                            setTimeout(() => {
                                window.location.href = document.getElementById('redirectUrl').value;
                            }, 1200);
                        } else {
                            this.showError(result.message || 'Invalid PIN. Please try again.');
                            this.pin = '';
                            this.updateDots();
                        }
                    } catch (error) {
                        this.showError('An error occurred. Please try again.');
                        this.pin = '';
                        this.updateDots();
                    } finally {
                        this.isProcessing = false;
                        this.verifyBtn.disabled = this.pin.length !== this.maxLength;
                        
                        // Reset button state
                        const btnText = this.verifyBtn.querySelector('.verify-btn-text');
                        const btnLoader = this.verifyBtn.querySelector('.verify-btn-loader');
                        btnText.style.display = 'flex';
                        btnLoader.style.display = 'none';
                    }
                }
            };

            // Initialize
            pinApp.init();

            // ============================================================
            // RIPPLE EFFECT ON KEYPAD BUTTONS
            // ============================================================
            document.querySelectorAll('.keypad-btn, .keypad-action-btn, .verify-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(16, 185, 129, 0.2);
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

            // ============================================================
            // PREVENT DEFAULT KEYBOARD ZOOM ON IOS
            // ============================================================
            document.querySelectorAll('.keypad-btn, .keypad-action-btn, .verify-btn').forEach(btn => {
                btn.addEventListener('touchstart', function(e) {
                    // Prevent double-tap zoom
                }, { passive: true });
            });
        });
    </script>
@endsection