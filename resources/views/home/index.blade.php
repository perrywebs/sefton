@extends('layouts.base')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[85vh] flex items-center justify-center bg-slate-950 overflow-hidden py-20 lg:py-0">
    <!-- Real Human Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=2000&q=80" 
             alt="People reviewing finances together" 
             class="w-full h-full object-cover object-center filter brightness-[0.45] contrast-105"
             loading="eager">
        <!-- Subtle warm gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-650/80 to-transparent"></div>
    </div>
    
    <!-- Content Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <!-- Hero Content -->
            <div class="lg:col-span-7 text-white text-center lg:text-left">
                {{-- <div class="inline-flex items-center space-x-2 px-3 py-1 bg-green-500/10 border border-green-500/30 rounded-full mb-6"> --}}
                    {{-- <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> --}}
                    {{-- <span class="text-xs font-medium text-green-300 uppercase tracking-wider">Human-Centered Banking</span> --}}
                {{-- </div> --}}

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight leading-[1.15] mb-6">
                    Built around <span class="underline decoration-amber-500/80 underline-offset-8">real people</span>, not algorithms.
                </h1>
                
                <p class="text-lg sm:text-xl text-slate-300 mb-8 max-w-xl leading-relaxed font-normal mx-auto lg:mx-0">
                    At {{ $settings->site_name }}, we combine human warmth with modern tools to help you manage, save, and grow your money effortlessly.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-7 py-4 bg-primary-600 hover:bg-primary-500 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-primary-900/40">
                        <span>Open an Account</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-7 py-4 bg-slate-800/80 hover:bg-slate-800 text-white font-medium rounded-xl border border-slate-700 backdrop-blur-sm transition-all duration-200">
                        Sign In to Banking
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="mt-12 pt-8 border-t border-slate-800/80 flex flex-wrap items-center justify-center lg:justify-start gap-8 text-slate-400 text-xs">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>FDIC Insured Up To $250,000</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>24/7 Dedicated Human Support</span>
                    </div>
                </div>
            </div>

            <!-- Authentic Photo Card overlay on Hero Desktop -->
            <div class="hidden lg:block lg:col-span-5">
                <div class="relative mx-auto max-w-sm">
                    <div class="rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-slate-900/90 p-3">
                        <img src="https://images.unsplash.com/photo-1716635174919-e6aec2d1c45a?q=80" alt="Financial Advisor" class="rounded-xl object-cover h-80 w-full mb-4">
                        <div class="p-3">
                            <p class="text-xs text-amber-400 font-semibold tracking-wider uppercase">Direct Support</p>
                            <h3 class="text-lg font-bold text-white">Speak with an advisor</h3>
                            <p class="text-xs text-slate-400 mt-1">Our team members are available to assist you with every milestone step.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats / Rates Band -->
<section class="py-12 bg-slate-900 text-white border-y border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center md:text-left">
            <div class="p-4 border-l-2 border-primary-500">
                <p class="text-xs text-slate-400 uppercase tracking-wider">High-Yield Savings</p>
                <p class="text-3xl font-bold text-white mt-1">3.75% <span class="text-xs font-normal text-slate-400">APY*</span></p>
            </div>
            <div class="p-4 border-l-2 border-emerald-500">
                <p class="text-xs text-slate-400 uppercase tracking-wider">18-Mo Certificate</p>
                <p class="text-3xl font-bold text-white mt-1">3.65% <span class="text-xs font-normal text-slate-400">APY*</span></p>
            </div>
            <div class="p-4 border-l-2 border-amber-500">
                <p class="text-xs text-slate-400 uppercase tracking-wider">Credit Card APR</p>
                <p class="text-3xl font-bold text-white mt-1">4.00% <span class="text-xs font-normal text-slate-400">APR*</span></p>
            </div>
            <div class="p-4 border-l-2 border-indigo-500">
                <p class="text-xs text-slate-400 uppercase tracking-wider">Personal Loans</p>
                <p class="text-3xl font-bold text-white mt-1">15.49% <span class="text-xs font-normal text-slate-400">APR*</span></p>
            </div>
        </div>
    </div>
</section>

<!-- Main Features with Genuine Human Photography -->
<section class="py-20 lg:py-28 bg-stone-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Feature 1: Real People Working Together -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-24">
            <div>
                <div class="relative rounded-3xl overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1000&q=80" 
                         alt="Financial consultation in progress" 
                         class="w-full h-[420px] object-cover">
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md p-4 rounded-2xl shadow-lg border border-slate-100 dark:border-slate-800">
                        <div class="flex items-center space-x-3">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" alt="Client" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <p class="text-xs font-bold text-slate-900 dark:text-white">Personal Guidance</p>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400">Meet with real advisors online or at local branches.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <span class="text-xs font-bold text-primary-600 dark:text-primary-400 tracking-wider uppercase">Welcome Offer</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                    Get $200* when you open a checking account with us.
                </h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    Financial progress isn't built by software alone — it's built with real people who care about your goals. Join {{ $settings->site_name }} today and enjoy zero minimum balance fees.
                </p>
                
                <ul class="space-y-3 pt-2 text-slate-700 dark:text-slate-300 text-sm">
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>No hidden fee structures or maintenance costs</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Instant online account setup in under 5 minutes</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Direct human support via chat, phone, or branch</span>
                    </li>
                </ul>

                <div class="pt-4">
                    <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3.5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-semibold rounded-xl hover:bg-slate-800 transition-colors">
                        Get Started
                    </a>
                </div>
            </div>
        </div>

        <!-- Feature 2: Everyday Life & Small Business -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="order-2 lg:order-1 space-y-6">
                <span class="text-xs font-bold text-amber-600 dark:text-amber-400 tracking-wider uppercase">Community Focused</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white tracking-tight leading-tight">
                    Designed for real lives, families, and growing businesses.
                </h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    Whether buying your first home, growing a local business, or saving for retirement, {{ $settings->site_name }} gives you straightforward tools and real experts to help guide the way.
                </p>

                <div class="grid sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700/60 shadow-sm">
                        <h3 class="font-bold text-slate-900 dark:text-white mb-1">Checking & Savings</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Flexible daily accounts designed to help you save effortless money every month.</p>
                    </div>
                    <div class="p-4 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700/60 shadow-sm">
                        <h3 class="font-bold text-slate-900 dark:text-white mb-1">Mortgages & Loans</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Transparent rates with customized repayment schedules that suit your lifestyle.</p>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <img src="https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=600&q=80" alt="Small business owner using card payment" class="rounded-2xl h-52 w-full object-cover shadow-md">
                        <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" alt="Friends laughing together" class="rounded-2xl h-40 w-full object-cover shadow-md">
                    </div>
                    <div class="space-y-4 pt-6">
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=600&q=80" alt="Team planning strategy" class="rounded-2xl h-40 w-full object-cover shadow-md">
                        <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" alt="Happy family outdoors" class="rounded-2xl h-52 w-full object-cover shadow-md">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Authentic Human Testimonials -->
<section class="py-20 bg-white dark:bg-slate-950 border-t border-slate-100 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Trusted by people like you</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Here is what real members have to say about banking with {{ $settings->site_name }}.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Review 1 -->
            <div class="p-6 bg-stone-50 dark:bg-slate-900 rounded-2xl border border-stone-200/80 dark:border-slate-800 flex flex-col justify-between">
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6">
                    "Switching my primary checking account over was painless. Whenever I need support, I get connected to a real person within seconds."
                </p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=120&q=80" alt="Elena Rostova" class="w-11 h-11 rounded-full object-cover">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Elena Rostova</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Member since 2022</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="p-6 bg-stone-50 dark:bg-slate-900 rounded-2xl border border-stone-200/80 dark:border-slate-800 flex flex-col justify-between">
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6">
                    "The high-yield savings rate helped us put aside enough for our home down payment. Simple, reliable, and transparent."
                </p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=120&q=80" alt="Marcus Chen" class="w-11 h-11 rounded-full object-cover">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Marcus Chen</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Small Business Owner</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="p-6 bg-stone-50 dark:bg-slate-900 rounded-2xl border border-stone-200/80 dark:border-slate-800 flex flex-col justify-between">
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6">
                    "The mobile web app works smoothly even when traveling. It feels good knowing my finances are in safe hands."
                </p>
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=120&q=80" alt="Amina Bello" class="w-11 h-11 rounded-full object-cover">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">Amina Bello</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Personal Banking</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mobile App / PWA Banner -->
<section class="py-16 bg-slate-900 text-white border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 p-8 sm:p-12 rounded-3xl border border-slate-700/80 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="space-y-3 text-center lg:text-left max-w-xl">
                <span class="text-xs font-semibold text-primary-400 uppercase tracking-wider">Mobile Web Application</span>
                <h2 class="text-2xl sm:text-3xl font-bold">Bank anytime, anywhere on any device.</h2>
                <p class="text-slate-300 text-sm leading-relaxed">Install our official web app directly to your phone or desktop for instant access without visiting an app store.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                <button id="installPWA" class="px-6 py-3.5 bg-primary-600 hover:bg-primary-500 text-white font-semibold rounded-xl transition-colors text-sm text-center">
                    Install {{ $settings->site_name }} App
                </button>
                <a href="{{ route('login') }}" class="px-6 py-3.5 bg-slate-700 hover:bg-slate-600 text-white font-medium rounded-xl transition-colors text-sm text-center">
                    Open Web Banking
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact & Info Footer Strip -->
<section class="py-12 bg-stone-100 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-2">Branch Support</h4>
                <p>Monday – Friday: 9 AM – 5 PM</p>
                <p>Saturday: 9 AM – 1 PM</p>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-2">Routing Number</h4>
                <p class="font-mono text-slate-900 dark:text-slate-200 font-bold">251480576</p>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-2">Direct Contact</h4>
                <p>Phone: 1-800-BANKING</p>
                <p>Email: {{ $settings->contact_email }}</p>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-2">Main Headquarters</h4>
                <p>123 Financial Plaza</p>
                <p>Suite 400, New York, NY</p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // PWA Installation script
    let deferredPrompt;
    const installButton = document.getElementById('installPWA');

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
    });

    if (installButton) {
        installButton.addEventListener('click', async () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                if (outcome === 'accepted') {
                    installButton.innerText = 'App Installed';
                }
                deferredPrompt = null;
            } else {
                alert('App installation is already complete or not supported on this browser.');
            }
        });
    }
</script>
@endsection