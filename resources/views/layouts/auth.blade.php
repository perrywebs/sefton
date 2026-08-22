<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Authentication') - {{ $settings->site_name ?? 'App' }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/app/public/' . ($settings->favicon ?? 'favicon.ico')) }}" type="image/x-icon">
    
    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* ============================================================
                   ROOT VARIABLES - Light Green & White Theme
                   ============================================================ */
        :root {
            --primary: #10B981;
            --primary-light: #34D399;
            --primary-dark: #059669;
            --primary-bg: #ECFDF5;
            --primary-gradient: linear-gradient(135deg, #10B981 0%, #059669 100%);
            
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -1px rgba(0, 0, 0, 0.04);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            
            --radius: 16px;
            --radius-sm: 10px;
            --radius-full: 9999px;
            
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-50);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* ============================================================
                   LOADER
                   ============================================================ */
        .auth-loader {
            position: fixed;
            inset: 0;
            background: var(--white);
            z-index: 99999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }

        .auth-loader.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .auth-loader-spinner {
            width: 36px;
            height: 36px;
            border: 3px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ============================================================
                   AUTH CARD
                   ============================================================ */
        .auth-card {
            width: 100%;
            max-width: 420px;
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-xl);
            padding: 40px 36px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================================
                   HEADER
                   ============================================================ */
        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .auth-logo img {
            height: 40px;
            width: 40px;
            object-fit: contain;
            border-radius: var(--radius-sm);
        }

        .auth-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-bg);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 20px;
        }

        .auth-logo span {
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: -0.5px;
        }

        .auth-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .auth-header p {
            font-size: 14px;
            color: var(--gray-500);
            font-weight: 400;
        }

        /* ============================================================
                   ALERTS
                   ============================================================ */
        .auth-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .auth-alert i {
            font-size: 14px;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .auth-alert-success {
            background: #F0FDF4;
            color: #065F46;
            border-color: #BBF7D0;
        }

        .auth-alert ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .auth-alert ul li {
            margin-bottom: 2px;
        }

        .auth-alert ul li:last-child {
            margin-bottom: 0;
        }

        /* ============================================================
                   FORM
                   ============================================================ */
        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-group label i {
            color: var(--gray-400);
            font-size: 12px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 14px;
            transition: var(--transition);
            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            padding: 11px 12px 11px 40px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: var(--gray-800);
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-sm);
            transition: var(--transition);
            outline: none;
        }

        .input-wrapper input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.10);
        }

        .input-wrapper input:focus ~ .input-icon,
        .input-wrapper input:focus + .input-icon {
            color: var(--primary);
        }

        .input-wrapper input::placeholder {
            color: var(--gray-400);
            font-size: 13px;
        }

        .input-wrapper .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: 4px;
            transition: var(--transition);
            font-size: 14px;
        }

        .input-wrapper .toggle-password:hover {
            color: var(--gray-600);
        }

        /* ============================================================
                   FORM OPTIONS
                   ============================================================ */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2px 0;
        }

        .form-options .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 13px;
            color: var(--gray-600);
            font-weight: 500;
            user-select: none;
        }

        .form-options .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            border-radius: 4px;
            cursor: pointer;
            border: 2px solid var(--gray-300);
            transition: var(--transition);
        }

        .form-options .forgot-link {
            font-size: 13px;
            font-weight: 500;
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .form-options .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ============================================================
                   SUBMIT BUTTON
                   ============================================================ */
        .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            color: var(--white);
            background: var(--primary-gradient);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 2px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.30);
        }

        .submit-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .submit-btn i {
            transition: var(--transition);
        }

        .submit-btn:hover i {
            transform: translateX(3px);
        }

        /* ============================================================
                   DIVIDER
                   ============================================================ */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 2px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray-200);
        }

        .divider span {
            font-size: 12px;
            font-weight: 500;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        /* ============================================================
                   SOCIAL BUTTONS
                   ============================================================ */
        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .social-btn {
            padding: 10px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            background: var(--white);
            color: var(--gray-700);
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .social-btn:hover {
            border-color: var(--gray-300);
            background: var(--gray-50);
            transform: translateY(-1px);
        }

        .social-btn i {
            font-size: 16px;
        }

        .social-btn.google i {
            color: #EA4335;
        }

        .social-btn.apple i {
            color: #000;
        }

        /* ============================================================
                   ALTERNATE ACTION
                   ============================================================ */
        .alternate-action {
            text-align: center;
            font-size: 14px;
            color: var(--gray-600);
            font-weight: 500;
        }

        .alternate-action a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .alternate-action a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .auth-footer {
            margin-top: 24px;
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .auth-footer a {
            font-size: 12px;
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .auth-footer a:hover {
            color: var(--gray-600);
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 480px) {
            .auth-card {
                padding: 28px 20px;
                border-radius: var(--radius-sm);
            }

            .auth-header h1 {
                font-size: 20px;
            }

            .auth-logo span {
                font-size: 17px;
            }

            .auth-logo img,
            .auth-logo-icon {
                height: 32px;
                width: 32px;
            }

            .social-buttons {
                grid-template-columns: 1fr;
            }

            .form-options {
                flex-wrap: wrap;
                gap: 8px;
            }

            .submit-btn {
                padding: 10px;
                font-size: 14px;
            }

            .auth-footer {
                gap: 12px;
            }
        }

        /* ============================================================
                   DARK MODE SUPPORT
                   ============================================================ */
        @media (prefers-color-scheme: dark) {
            :root {
                --gray-50: #1F2937;
                --gray-100: #374151;
                --gray-200: #4B5563;
                --gray-300: #6B7280;
                --gray-400: #9CA3AF;
                --gray-500: #D1D5DB;
                --gray-600: #E5E7EB;
                --gray-700: #F3F4F6;
                --gray-800: #F9FAFB;
                --gray-900: #FFFFFF;
                
                --white: #111827;
                --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            }

            .auth-card::before {
                background: var(--primary-gradient);
            }

            .auth-loader {
                background: var(--white);
            }

            .auth-alert {
                background: rgba(254, 242, 242, 0.08);
                color: #FCA5A5;
                border-color: rgba(252, 165, 165, 0.2);
            }

            .auth-alert-success {
                background: rgba(240, 253, 244, 0.08);
                color: #6EE7B7;
                border-color: rgba(107, 231, 183, 0.2);
            }

            .social-btn {
                background: var(--gray-50);
                color: var(--gray-700);
                border-color: var(--gray-200);
            }

            .social-btn:hover {
                background: var(--gray-100);
                border-color: var(--gray-300);
            }

            .social-btn.apple i {
                color: var(--gray-700);
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- ============================================================
    PRELOADER
    ============================================================ -->
    <div class="auth-loader" id="authLoader">
        <div class="auth-loader-spinner"></div>
    </div>

    <!-- ============================================================
    AUTH CARD
    ============================================================ -->
    <div class="auth-card" id="authCard">

        <!-- Header -->
        <div class="auth-header">
            <a href="/" class="auth-logo">
                @if(isset($settings) && $settings->logo)
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name ?? 'Logo' }}" style="object-fit: contain; width: 100px; height: 100px;">
                @else
                    <div class="auth-logo-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                @endif
            </a>
            <h1>@yield('form_title', 'Welcome Back')</h1>
            <p>@yield('form_subtitle', 'Sign in to your account')</p>
        </div>

        <!-- Alerts -->
        @if (Session::has('status'))
            <div class="auth-alert auth-alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="auth-alert" role="alert">
                <i class="fas fa-exclamation-circle"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Content -->
        @yield('auth_form')


    </div>

    <!-- ============================================================
    SCRIPTS
    ============================================================ -->
    <script>
        // ============================================================
        // PRELOADER
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const loader = document.getElementById('authLoader');
                if (loader) {
                    loader.classList.add('hidden');
                }
            }, 500);
        });

        // ============================================================
        // TOGGLE PASSWORD VISIBILITY
        // ============================================================
        function togglePasswordVisibility(button) {
            const wrapper = button.closest('.input-wrapper');
            const input = wrapper.querySelector('input');
            const icon = button.querySelector('i');
            
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

        // ============================================================
        // RIPPLE EFFECT ON BUTTONS
        // ============================================================
        document.querySelectorAll('.submit-btn, .social-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: ${this.classList.contains('submit-btn') ? 'rgba(255,255,255,0.2)' : 'rgba(16,185,129,0.15)'};
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
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
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
        // INPUT FOCUS EFFECT
        // ============================================================
        document.querySelectorAll('.input-wrapper input').forEach(input => {
            const wrapper = input.closest('.input-wrapper');
            const icon = wrapper.querySelector('.input-icon');
            
            input.addEventListener('focus', function() {
                if (icon) {
                    icon.style.color = 'var(--primary)';
                }
            });
            
            input.addEventListener('blur', function() {
                if (!this.value && icon) {
                    icon.style.color = 'var(--gray-400)';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>