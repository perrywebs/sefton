<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false, mobileMenuOpen: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">

<head>
    <title>@yield('title') - {{ $settings->site_name }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{ $settings->site_name }}">
    <meta name="application-name" content="{{ $settings->site_name }}">
    <meta name="description"
        content="Swift and Secure Money Transfer to any UK bank account will become a breeze with {{ $settings->site_name }}.">
    <link rel="shortcut icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}">

    <!-- Dark mode initialization -->
    <script>
        const isDarkMode = localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        }
    </script>



    <!-- Tailwind CSS with custom color variables -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { // Dynamic primary colors from appearance settings
                            50: '{{ isset($appearanceSettings->primary_color_50) ? $appearanceSettings->primary_color_50 : '#f0f9ff' }}',
                            100: '{{ isset($appearanceSettings->primary_color_100) ? $appearanceSettings->primary_color_100 : '#e0f2fe' }}',
                            200: '{{ isset($appearanceSettings->primary_color_200) ? $appearanceSettings->primary_color_200 : '#bae6fd' }}',
                            300: '{{ isset($appearanceSettings->primary_color_300) ? $appearanceSettings->primary_color_300 : '#7dd3fc' }}',
                            400: '{{ isset($appearanceSettings->primary_color_400) ? $appearanceSettings->primary_color_400 : '#38bdf8' }}',
                            DEFAULT: '{{ isset($appearanceSettings->primary_color) ? $appearanceSettings->primary_color : '#0ea5e9' }}',
                            500: '{{ isset($appearanceSettings->primary_color) ? $appearanceSettings->primary_color : '#0ea5e9' }}',
                            600: '{{ isset($appearanceSettings->primary_color_600) ? $appearanceSettings->primary_color_600 : '#0284c7' }}',
                            700: '{{ isset($appearanceSettings->primary_color_700) ? $appearanceSettings->primary_color_700 : '#0369a1' }}',
                            foreground: '{{ isset($appearanceSettings->primary_color_foreground) ? $appearanceSettings->primary_color_foreground : '#ffffff' }}',
                        },
                        secondary: { // Dynamic secondary colors from appearance settings
                            50: '{{ isset($appearanceSettings->secondary_color_50) ? $appearanceSettings->secondary_color_50 : '#f8fafc' }}',
                            100: '{{ isset($appearanceSettings->secondary_color_100) ? $appearanceSettings->secondary_color_100 : '#f1f5f9' }}',
                            200: '{{ isset($appearanceSettings->secondary_color_200) ? $appearanceSettings->secondary_color_200 : '#e2e8f0' }}',
                            300: '{{ isset($appearanceSettings->secondary_color_300) ? $appearanceSettings->secondary_color_300 : '#cbd5e1' }}',
                            400: '{{ isset($appearanceSettings->secondary_color_400) ? $appearanceSettings->secondary_color_400 : '#94a3b8' }}',
                            DEFAULT: '{{ isset($appearanceSettings->secondary_color) ? $appearanceSettings->secondary_color : '#64748b' }}',
                            500: '{{ isset($appearanceSettings->secondary_color) ? $appearanceSettings->secondary_color : '#64748b' }}',
                            600: '{{ isset($appearanceSettings->secondary_color_600) ? $appearanceSettings->secondary_color_600 : '#475569' }}',
                            700: '{{ isset($appearanceSettings->secondary_color_700) ? $appearanceSettings->secondary_color_700 : '#334155' }}',
                            foreground: '{{ isset($appearanceSettings->secondary_color_foreground) ? $appearanceSettings->secondary_color_foreground : '#0f172a' }}',
                        },
                        accent: { // Dynamic accent colors from appearance settings
                            50: '{{ isset($appearanceSettings->accent_color_50) ? $appearanceSettings->accent_color_50 : '#fdf2f8' }}',
                            100: '{{ isset($appearanceSettings->accent_color_100) ? $appearanceSettings->accent_color_100 : '#fce7f3' }}',
                            200: '{{ isset($appearanceSettings->accent_color_200) ? $appearanceSettings->accent_color_200 : '#fbcfe8' }}',
                            300: '{{ isset($appearanceSettings->accent_color_300) ? $appearanceSettings->accent_color_300 : '#f9a8d4' }}',
                            400: '{{ isset($appearanceSettings->accent_color_400) ? $appearanceSettings->accent_color_400 : '#f472b6' }}',
                            DEFAULT: '{{ isset($appearanceSettings->accent_color) ? $appearanceSettings->accent_color : '#ec4899' }}',
                            500: '{{ isset($appearanceSettings->accent_color) ? $appearanceSettings->accent_color : '#ec4899' }}',
                            600: '{{ isset($appearanceSettings->accent_color_600) ? $appearanceSettings->accent_color_600 : '#db2777' }}',
                            700: '{{ isset($appearanceSettings->accent_color_700) ? $appearanceSettings->accent_color_700 : '#be185d' }}',
                            foreground: '{{ isset($appearanceSettings->accent_color_foreground) ? $appearanceSettings->accent_color_foreground : '#ffffff' }}',
                        },
                        background: '{{ isset($appearanceSettings->background_color) ? $appearanceSettings->background_color : '#f8fafc' }}',
                        foreground: '{{ isset($appearanceSettings->foreground_color) ? $appearanceSettings->foreground_color : '#1e293b' }}',
                        card: {
                            DEFAULT: '{{ isset($appearanceSettings->card_color) ? $appearanceSettings->card_color : '#ffffff' }}',
                            foreground: '{{ isset($appearanceSettings->card_foreground_color) ? $appearanceSettings->card_foreground_color : '#1e293b' }}',
                        },
                        muted: {
                            DEFAULT: '{{ isset($appearanceSettings->muted_color) ? $appearanceSettings->muted_color : '#f1f5f9' }}',
                            foreground: '{{ isset($appearanceSettings->muted_foreground_color) ? $appearanceSettings->muted_foreground_color : '#64748b' }}',
                        },
                        border: '{{ isset($appearanceSettings->border_color) ? $appearanceSettings->border_color : '#e2e8f0' }}',
                        input: '{{ isset($appearanceSettings->input_color) ? $appearanceSettings->input_color : '#e2e8f0' }}',
                        ring: '{{ isset($appearanceSettings->ring_color) ? $appearanceSettings->ring_color : '#0ea5e9' }}',

                        // Specific colors from original design for gradients/highlights
                        'gradient-pink-from': '{{ isset($appearanceSettings->gradient_pink_from) ? $appearanceSettings->gradient_pink_from : '#ec4899' }}',
                        'gradient-purple-via': '{{ isset($appearanceSettings->gradient_purple_via) ? $appearanceSettings->gradient_purple_via : '#a855f7' }}',
                        'gradient-indigo-to': '{{ isset($appearanceSettings->gradient_indigo_to) ? $appearanceSettings->gradient_indigo_to : '#4f46e5' }}',

                        'mobile-header-bg': '#1e293b', // Dark slate for mobile top section
                        'mobile-header-text': '#f1f5f9', // Light text for mobile top section

                        'yellow-action': '{{ isset($appearanceSettings->yellow_action) ? $appearanceSettings->yellow_action : '#facc15' }}',
                        'green-positive': '{{ isset($appearanceSettings->green_positive) ? $appearanceSettings->green_positive : '#22c55e' }}',
                        'red-negative': '{{ isset($appearanceSettings->red_negative) ? $appearanceSettings->red_negative : '#ef4444' }}',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'top': '0 -4px 12px -1px rgba(0,0,0,0.05), 0 -2px 8px -1px rgba(0,0,0,0.03)',
                    },
                    borderRadius: {
                        lg: '0.75rem',
                        xl: '0.75rem',
                        '2xl': '1rem',
                        '3xl': '1.5rem',
                    },
                    keyframes: {
                        pulse: {
                            '0%, 100%': {
                                transform: 'scale(1)',
                                boxShadow: '0 0 0 0 rgba(14, 165, 233, 0.4)'
                            }, // primary color
                            '50%': {
                                transform: 'scale(1.05)',
                                boxShadow: '0 0 0 10px rgba(14, 165, 233, 0)'
                            },
                        },
                        shine: {
                            '0%': {
                                transform: 'translateX(-100%) translateY(-100%) rotate(45deg)'
                            },
                            '100%': {
                                transform: 'translateX(100%) translateY(100%) rotate(45deg)'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                        'float-delayed': {
                            '0%, 100%': {
                                transform: 'translateY(0px) rotate(0deg)'
                            },
                            '50%': {
                                transform: 'translateY(-15px) rotate(180deg)'
                            },
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 2.5s infinite',
                        'shine-once': 'shine 1.5s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
                        'float-delayed': 'float-delayed 4s ease-in-out infinite',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/aquawolf04/font-awesome-pro@5cd1511/css/all.css">

    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @if (isset($appearanceSettings) && $appearanceSettings->custom_css)
        <style>
            {!! $appearanceSettings->custom_css !!}
        </style>
    @endif

    @if (isset($appearanceSettings) && $appearanceSettings->disable_animations)
        <style>
            * {
                animation: none !important;
                transition: none !important;
            }
        </style>
    @endif



    <style>
        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: theme('colors.background');
            color: theme('colors.foreground');
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }

        /* slate-200 */
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }

        /* slate-400 */
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* slate-500 */

        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }

        /* gray-700 */
        .dark ::-webkit-scrollbar-thumb {
            background: #6b7280;
        }

        /* gray-500 */
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        /* gray-400 */

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        /* slate-300 */
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* slate-400 */

        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #6b7280;
        }

        /* gray-500 */
        .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        /* gray-400 */

        .shine-effect-container {
            position: relative;
            overflow: hidden;
        }

        .shine-effect {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.5s;
        }

        .shine-effect-container:hover .shine-effect {
            opacity: 1;
            animation: shine-once 1.5s ease-in-out;
        }

        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating elements animation */
        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .floating-slow {
            animation: float 6s ease-in-out infinite;
        }

        .floating-slower {
            animation: float 8s ease-in-out infinite;
        }

        /* Float keyframes */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Float with delay */
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 1s;
        }

        /* Interactive elements */
        .input-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within {
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: #94a3b8;
            transition: color 0.3s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--primary-color);
        }

        input:focus+.input-toggle {
            color: var(--primary-color);
        }

        .dark .input-icon {
            color: #6b7280;
        }

        /* Dark mode toggle button styling */
        .dark-mode-toggle {
            transition: all 0.3s ease;
        }

        .dark-mode-toggle:hover {
            transform: scale(1.1);
        }

        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
        }

        .gradient-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        }



        /* Mobile Fixed Buttons */
        .mobile-fixed-buttons {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            z-index: 50;
            display: flex;
        }

        @media (min-width: 1024px) {
            .mobile-fixed-buttons {
                display: none;
            }
        }
    </style>
    @laravelPWA
</head>

<body class="font-sans bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">


    <!-- Mobile Fixed Floating Action Bar -->
    <div class="fixed bottom-4 inset-x-4 z-50 lg:hidden">
        <div
            class="flex items-center gap-2 p-1.5 bg-white/80 dark:bg-gray-900/80 backdrop-blur-2xl rounded-full border border-gray-200/80 dark:border-gray-800/80 shadow-xl shadow-gray-900/10">
            <a href="{{ route('login') }}"
                class="flex-1 py-2.5 px-4 text-center text-sm font-semibold text-gray-700 dark:text-gray-200 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-all active:scale-95">
                <i class="fa-solid fa-right-to-bracket mr-1.5 text-xs"></i>
                Login
            </a>
            <a href="{{ route('register') }}"
                class="flex-1 py-2.5 px-4 text-center text-sm font-semibold text-white bg-primary-600 hover:bg-primary-500 rounded-full shadow-md shadow-primary-600/30 transition-all active:scale-95">
                <i class="fa-solid fa-user-plus mr-1.5 text-xs"></i>
                Register
            </a>
        </div>
    </div>

    <!-- Navigation Header -->
    <nav
        class="sticky top-0 z-40 w-full bg-white/80 dark:bg-gray-950/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800/60 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="relative flex items-center justify-center">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                            alt="{{ $settings->site_name }}"
                            class="h-9 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div
                    class="hidden lg:flex items-center space-x-1 bg-gray-100/60 dark:bg-gray-900/60 p-1.5 rounded-full border border-gray-200/50 dark:border-gray-800/50">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-400 rounded-full transition-colors">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-400 rounded-full transition-colors">
                        About
                    </a>

                    <!-- Dropdown Trigger -->
                    <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                        <button @mouseenter="open = true" @click="open = !open"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-400 rounded-full transition-colors inline-flex items-center gap-1.5">
                            <span>Services</span>
                            <i class="fa-solid fa-chevron-down text-[10px] opacity-60 transition-transform duration-200"
                                :class="{ 'rotate-180': open }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute left-0 mt-2 w-56 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-xl shadow-gray-900/10 p-1.5 z-50">

                            <a href="{{ route('personal') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800/60 rounded-xl transition-colors">
                                <i class="fa-solid fa-user text-primary-500 text-xs w-4"></i>
                                Personal Banking
                            </a>
                            <a href="{{ route('business') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800/60 rounded-xl transition-colors">
                                <i class="fa-solid fa-briefcase text-blue-500 text-xs w-4"></i>
                                Business Banking
                            </a>
                            <a href="{{ route('loans') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800/60 rounded-xl transition-colors">
                                <i class="fa-solid fa-handshake text-emerald-500 text-xs w-4"></i>
                                Loans & Credit
                            </a>
                            <a href="{{ route('cards') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800/60 rounded-xl transition-colors">
                                <i class="fa-solid fa-credit-card text-purple-500 text-xs w-4"></i>
                                Cards
                            </a>
                            <a href="{{ route('grants') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800/60 rounded-xl transition-colors">
                                <i class="fa-solid fa-hand-holding-dollar text-amber-500 text-xs w-4"></i>
                                Grants & Aid
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-400 rounded-full transition-colors">
                        Contact
                    </a>
                </div>

                <!-- Desktop Right Actions -->
                <div class="hidden lg:flex items-center space-x-3">
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="p-2.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <i class="fa-solid fa-sun text-base" x-show="darkMode"></i>
                        <i class="fa-solid fa-moon text-base" x-show="!darkMode"></i>
                    </button>

                    <!-- Auth Buttons -->
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-500 rounded-full shadow-md shadow-primary-600/20 transition-all hover:scale-[1.02] active:scale-[0.98]">
                        Open Account
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2.5 text-gray-600 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <i class="fa-solid text-lg" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden border-b border-gray-200 dark:border-gray-800 bg-white/95 dark:bg-gray-950/95 backdrop-blur-xl">

            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="{{ route('home') }}"
                    class="flex items-center px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                    <i class="fa-solid fa-house w-6 text-gray-400"></i> Home
                </a>
                <a href="{{ route('about') }}"
                    class="flex items-center px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                    <i class="fa-solid fa-circle-info w-6 text-gray-400"></i> About
                </a>

                <!-- Mobile Submenu -->
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                        <span class="flex items-center"><i class="fa-solid fa-layer-group w-6 text-gray-400"></i>
                            Services</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform"
                            :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" class="pl-10 pr-4 py-1 space-y-1">
                        <a href="{{ route('personal') }}"
                            class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600">Personal
                            Banking</a>
                        <a href="{{ route('business') }}"
                            class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600">Business
                            Banking</a>
                        <a href="{{ route('loans') }}"
                            class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600">Loans &
                            Credit</a>
                        <a href="{{ route('cards') }}"
                            class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600">Cards</a>
                        <a href="{{ route('grants') }}"
                            class="block py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-primary-600">Grants &
                            Aid</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}"
                    class="flex items-center px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                    <i class="fa-solid fa-envelope w-6 text-gray-400"></i> Contact
                </a>
                <a href="{{ route('apps') }}"
                    class="flex items-center px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                    <i class="fa-solid fa-mobile-screen w-6 text-gray-400"></i> Mobile App
                </a>

                <div class="pt-4 mt-2 border-t border-gray-100 dark:border-gray-800">
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="flex items-center justify-between w-full px-4 py-3 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-900 rounded-xl">
                        <span class="flex items-center">
                            <i class="fa-solid w-6"
                                :class="darkMode ? 'fa-sun text-amber-500' : 'fa-moon text-indigo-500'"></i>
                            <span x-text="darkMode ? 'Light Theme' : 'Dark Theme'"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Enhanced Footer -->
    <footer
        class="relative bg-slate-950 text-slate-300 py-16 mb-20 lg:mb-0 overflow-hidden border-t border-slate-800/80">
        <!-- Ambient background glows -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-24 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl animate-pulse">
            </div>
            <div class="absolute top-1/2 -right-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1.5s;"></div>
            <div class="absolute -bottom-24 left-1/3 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 3s;"></div>

            <!-- Geometric accents -->
            <div class="absolute top-12 right-1/4 w-3 h-3 bg-slate-700/50 rotate-45 animate-bounce"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-1/3 left-1/4 w-2.5 h-2.5 bg-emerald-500/30 rounded-full animate-bounce"
                style="animation-delay: 1.5s;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">

                <!-- Brand & Info -->
                <div class="lg:col-span-1 space-y-5">
                    <div class="inline-block">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                            alt="{{ $settings->site_name }}" class="h-10 w-auto object-contain">
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Building financial strength together with personalized banking solutions for every member. Your
                        trusted partner in financial growth.
                    </p>

                    <!-- Social Links -->
                    <div class="flex items-center space-x-2.5 pt-2">
                        <a href="#" aria-label="Facebook"
                            class="w-9 h-9 bg-slate-900 border border-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition-all duration-200">
                            <i class="fa-brands fa-facebook-f text-xs"></i>
                        </a>
                        <a href="#" aria-label="Twitter"
                            class="w-9 h-9 bg-slate-900 border border-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition-all duration-200">
                            <i class="fa-brands fa-x-twitter text-xs"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn"
                            class="w-9 h-9 bg-slate-900 border border-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition-all duration-200">
                            <i class="fa-brands fa-linkedin-in text-xs"></i>
                        </a>
                        <a href="#" aria-label="Instagram"
                            class="w-9 h-9 bg-slate-900 border border-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition-all duration-200">
                            <i class="fa-brands fa-instagram text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4
                        class="text-sm font-semibold tracking-wider text-slate-100 uppercase mb-5 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Quick Links
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('about') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-emerald-400 transition-colors"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('personal') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-emerald-400 transition-colors"></i>
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('grants') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-emerald-400 transition-colors"></i>
                                Grants & Aid
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-emerald-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-emerald-400 transition-colors"></i>
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4
                        class="text-sm font-semibold tracking-wider text-slate-100 uppercase mb-5 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-500"></span>
                        Services
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('personal') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-cyan-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-cyan-400 transition-colors"></i>
                                Personal Banking
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('business') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-cyan-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-cyan-400 transition-colors"></i>
                                Business Banking
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('loans') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-cyan-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-cyan-400 transition-colors"></i>
                                Loans & Credit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cards') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-cyan-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-cyan-400 transition-colors"></i>
                                Cards
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Member Services -->
                <div>
                    <h4
                        class="text-sm font-semibold tracking-wider text-slate-100 uppercase mb-5 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                        Member Services
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('login') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-blue-400 transition-colors"></i>
                                Online Banking
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('apps') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-blue-400 transition-colors"></i>
                                Mobile App
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-blue-400 transition-colors"></i>
                                ATM Locations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('verify') }}"
                                class="group inline-flex items-center text-slate-400 hover:text-blue-400 transition-colors duration-200">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] mr-2.5 text-slate-600 group-hover:text-blue-400 transition-colors"></i>
                                Security Center
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-800/80 pt-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                    <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-6">
                        <p>© {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
                        <div
                            class="flex items-center gap-3 text-slate-400 border-t sm:border-t-0 sm:border-l border-slate-800 pt-2 sm:pt-0 sm:pl-6">
                            <span class="inline-flex items-center gap-1.5">
                                <i class="fa-solid fa-shield-halved text-emerald-400"></i> FDIC Insured
                            </span>
                            <span class="text-slate-700">•</span>
                            <span class="inline-flex items-center gap-1.5">
                                <i class="fa-solid fa-lock text-cyan-400"></i> 256-bit SSL
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center gap-5">
                        <a href="{{ route('privacy') }}" class="hover:text-slate-200 transition-colors">Privacy
                            Policy</a>
                        <a href="{{ route('terms') }}" class="hover:text-slate-200 transition-colors">Terms of
                            Service</a>
                        <a href="{{ route('contact') }}"
                            class="hover:text-slate-200 transition-colors">Accessibility</a>
                        <a href="{{ route('home') }}" class="hover:text-slate-200 transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Additional Scripts -->
    @yield('scripts')

    <!-- Language Translation Script -->
    <script type="text/javascript">
        let currentLanguage = 'en';

        function changeLanguage(langCode) {
            if (langCode === currentLanguage) return;

            currentLanguage = langCode;
            updateFlagDisplay(langCode);

            // Store language preference
            localStorage.setItem('selectedLanguage', langCode);

            // Use Microsoft Translator (more reliable than Google)
            if (langCode === 'en') {
                // Reset to original language
                location.reload();
            } else {
                // Redirect to Microsoft Translator
                const currentUrl = encodeURIComponent(window.location.href);
                const translateUrl = `https://www.microsofttranslator.com/bv.aspx?from=en&to=${langCode}&a=${currentUrl}`;
                window.open(translateUrl, '_blank');
            }
        }

        function updateFlagDisplay(langCode) {
            const flags = {
                'en': '🇺🇸',
                'es': '🇪🇸',
                'fr': '🇫🇷',
                'de': '🇩🇪',
                'it': '🇮🇹',
                'pt': '🇵🇹'
            };

            // Update desktop flag
            const desktopFlag = document.querySelector('.relative.group button span');
            if (desktopFlag && flags[langCode]) {
                desktopFlag.textContent = flags[langCode];
            }

            // Update mobile flag  
            const mobileFlag = document.querySelector('[x-data*="languageOpen"] .bg-gradient-to-br span');
            if (mobileFlag && flags[langCode]) {
                mobileFlag.textContent = flags[langCode];
            }
        }

        // Simple client-side translation using MyMemory API (free)
        async function translatePage(langCode) {
            if (langCode === 'en') {
                location.reload();
                return;
            }

            try {
                // Show loading indicator
                showTranslationLoading();

                // Get all translatable text elements
                const textElements = document.querySelectorAll(
                    'h1, h2, h3, h4, h5, h6, p, span:not(.no-translate), button:not(.no-translate), a:not(.no-translate), div:not(.no-translate)'
                );
                const textsToTranslate = [];

                textElements.forEach(element => {
                    const text = element.textContent.trim();
                    // Skip if empty, is a number, contains only symbols, or is marked as no-translate
                    if (text &&
                        text.length > 1 &&
                        !element.classList.contains('no-translate') &&
                        !element.closest('.no-translate') &&
                        !/^[\d\s\$\€\£\¥\+\-\*\/\=\(\)\[\]\{\}\<\>\|\\\^\~\`\!\@\#\%\&\_\?\.\,\;\:\"\']+$/.test(
                        text) &&
                    !element.querySelector('input, select, textarea, img, svg') &&
                    element.children.length === 0) {

                    textsToTranslate.push({
                        element: element,
                        originalText: text
                    });
                }
            });

            // Translate in batches to avoid API limits
            const batchSize = 10;
            for (let i = 0; i < textsToTranslate.length; i += batchSize) {
                const batch = textsToTranslate.slice(i, i + batchSize);
                await translateBatch(batch, langCode);

                // Small delay between batches
                if (i + batchSize < textsToTranslate.length) {
                    await new Promise(resolve => setTimeout(resolve, 500));
                }
            }

            hideTranslationLoading();

        } catch (error) {
            console.error('Translation error:', error);
            hideTranslationLoading();
            alert('Translation service is currently unavailable. Please try again later.');
        }
    }

    async function translateBatch(batch, langCode) {
        for (const item of batch) {
            try {
                const translatedText = await translateText(item.originalText, langCode);
                if (translatedText && translatedText !== item.originalText) {
                    item.element.textContent = translatedText;
                }
            } catch (error) {
                console.error('Error translating text:', error);
                // Continue with next item if one fails
            }
        }
    }

    async function translateText(text, targetLang) {
        try {
            // Use MyMemory API (free, no API key required)
            const response = await fetch(
                `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=en|${targetLang}`
            );
            const data = await response.json();

            if (data.responseStatus === 200 && data.responseData && data.responseData.translatedText) {
                return data.responseData.translatedText;
            }

            // Fallback: try LibreTranslate if MyMemory fails
            return await translateWithLibre(text, targetLang);

        } catch (error) {
            console.error('Translation API error:', error);
            // Fallback to basic dictionary for common words
            return translateBasic(text, targetLang);
        }
    }

    async function translateWithLibre(text, targetLang) {
        try {
            // LibreTranslate public instance (backup)
            const response = await fetch('https://libretranslate.com/translate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    q: text,
                    source: 'en',
                    target: targetLang,
                    format: 'text'
                })
            });

            const data = await response.json();
            return data.translatedText || text;

        } catch (error) {
            console.error('LibreTranslate error:', error);
            return text;
        }
    }

    function translateBasic(text, targetLang) {
        // Basic dictionary for common banking terms
        const dictionary = {
            'es': {
                'Home': 'Inicio',
                'About': 'Acerca de',
                'Services': 'Servicios',
                'Contact': 'Contacto',
                'Login': 'Iniciar Sesión',
                'Register': 'Registrarse',
                'Open Account': 'Abrir Cuenta',
                'Banking': 'Banca',
                'Personal Banking': 'Banca Personal',
                'Business Banking': 'Banca Empresarial',
                'Loans': 'Préstamos',
                'Cards': 'Tarjetas',
                'Language': 'Idioma'
            },
            'fr': {
                'Home': 'Accueil',
                'About': 'À propos',
                'Services': 'Services',
                'Contact': 'Contact',
                'Login': 'Connexion',
                'Register': 'S\'inscrire',
                'Open Account': 'Ouvrir un Compte',
                'Banking': 'Banque',
                'Personal Banking': 'Banque Personnelle',
                'Business Banking': 'Banque d\'Entreprise',
                'Loans': 'Prêts',
                'Cards': 'Cartes',
                'Language': 'Langue'
            },
            'de': {
                'Home': 'Startseite',
                'About': 'Über uns',
                'Services': 'Dienstleistungen',
                'Contact': 'Kontakt',
                'Login': 'Anmelden',
                'Register': 'Registrieren',
                'Open Account': 'Konto Eröffnen',
                'Banking': 'Banking',
                'Personal Banking': 'Privatkundengeschäft',
                'Business Banking': 'Firmenkundengeschäft',
                'Loans': 'Kredite',
                'Cards': 'Karten',
                'Language': 'Sprache'
            },
            'it': {
                'Home': 'Casa',
                'About': 'Chi siamo',
                'Services': 'Servizi',
                'Contact': 'Contatto',
                'Login': 'Accedi',
                'Register': 'Registrati',
                'Open Account': 'Apri Conto',
                'Banking': 'Banking',
                'Personal Banking': 'Banking Personale',
                'Business Banking': 'Banking Aziendale',
                'Loans': 'Prestiti',
                'Cards': 'Carte',
                'Language': 'Lingua'
            },
            'pt': {
                'Home': 'Início',
                'About': 'Sobre',
                'Services': 'Serviços',
                'Contact': 'Contato',
                'Login': 'Entrar',
                'Register': 'Registrar',
                'Open Account': 'Abrir Conta',
                'Banking': 'Bancário',
                'Personal Banking': 'Banco Pessoal',
                'Business Banking': 'Banco Empresarial',
                'Loans': 'Empréstimos',
                'Cards': 'Cartões',
                'Language': 'Idioma'
            }
        };

        return dictionary[targetLang] && dictionary[targetLang][text] ? dictionary[targetLang][text] : text;
    }

    function getLanguageName(code) {
        const names = {
            'es': 'Spanish',
            'fr': 'French',
            'de': 'German',
            'it': 'Italian',
            'pt': 'Portuguese'
        };
        return names[code] || code;
    }

    function showTranslationLoading() {
        // Create loading overlay
        const overlay = document.createElement('div');
        overlay.id = 'translation-loading';
        overlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
        overlay.innerHTML = `
                             <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center">
                                 <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary-600 mx-auto mb-4"></div>
                                 <p class="text-gray-700 dark:text-gray-300">Translating page...</p>
                             </div>
                         `;
            document.body.appendChild(overlay);
        }

        function hideTranslationLoading() {
            const overlay = document.getElementById('translation-loading');
            if (overlay) {
                overlay.remove();
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved language preference
            const savedLanguage = localStorage.getItem('selectedLanguage');
            if (savedLanguage && savedLanguage !== 'en') {
                currentLanguage = savedLanguage;
                updateFlagDisplay(savedLanguage);
            }
        });

        // Update the changeLanguage function to use the new approach
        window.changeLanguage = function(langCode) {
            currentLanguage = langCode;
            updateFlagDisplay(langCode);
            localStorage.setItem('selectedLanguage', langCode);

            if (langCode === 'en') {
                location.reload();
            } else {
                translatePage(langCode);
            }
        };
    </script>


    @include('layouts.livechat')
</body>

</html>
