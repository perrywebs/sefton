<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="2FxdVZ1e0pMgOZpWqJMcCkeq4w2J73GGb2LrrvMLDEA" />
    <!-- Standard & Search Engine Description -->
    <meta name="description" content="{{ $settings->description }}">

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings->site_title }}">
    <meta property="og:description" content="{{ $settings->description }}">
    <meta property="og:image" content="{{ asset('storage/app/public/' . $settings->logo) }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $settings->site_title }}">
    <meta name="twitter:description" content="{{ $settings->description }}">
    <meta name="twitter:image" content="{{ asset('storage/app/public/' . $settings->logo) }}">

    <title>{{ $settings->site_title }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href={{ asset('storage/app/public/' . $settings->favicon) }} type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/bootstrap.min-1.css') }}">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/fontawesome.min-1.css') }}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/flaticon-1.css') }}">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/owl.carousel.min-1.css') }}">
    <!-- owl carousel theme css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/owl.theme.default.min-1.css') }}">
    <!-- slicknav css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/slicknav-1.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/style-1.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ URL('home-assets/css/responsive-1.css') }}">
    <!-- jquery js -->
    <script src="{{ URL('home-assets/js/jquery-3.3.1.min-1.js') }}"></script>

    <style>
        /* =========================================================
        MOBILE HEADER FIX
        Bootstrap 4.2.1
        ========================================================= */

        @media (max-width: 991.98px) {

            /* Header */
            .header-area {
                position: absolute;
                width: 100%;
                left: 0;
                top: 0;
                z-index: 999;
            }

            .header-area .container {
                width: 100%;
                max-width: 100%;
                padding-left: 15px;
                padding-right: 15px;
            }

            /* Top support bar */
            .support-bar-area {
                padding: 10px 0;
            }

            .support-contact-info {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                font-size: 12px;
                line-height: 1.5;
            }

            .support-contact-info .address,
            .support-contact-info .phone {
                display: block;
                max-width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            /* Navigation */
            .header-navbar {
                padding: 12px 0;
            }

            .logo-wrapper {
                display: flex;
                align-items: center;
                height: 45px;
            }

            .logo-wrapper img {
                max-width: 150px;
                height: auto;
            }

            /* Hide normal desktop menu */
            .main-menu {
                display: none !important;
            }

            /* If your theme's mobile menu is generated here */
            #mobileMenu {
                display: block;
            }

        }


        /* =========================================================
        SMALL MOBILE DEVICES
        ========================================================= */

        @media (max-width: 575.98px) {

            .header-area {
                background: rgba(0, 0, 0, 0.20);
            }

            .support-bar-area {
                padding: 7px 0;
            }

            .support-contact-info {
                font-size: 10px;
                gap: 2px;
            }

            .header-navbar {
                padding: 8px 0 12px;
            }

            .logo-wrapper img {
                max-width: 125px;
            }

            /* Give the mobile menu button enough room */
            #mobileMenu {
                min-height: 40px;
            }

        }


        /* =========================================================
        HERO SECTION - MOBILE FIX
        ========================================================= */

        .hero-area {
            position: relative;
            min-height: 700px;

            /* Make sure the background is actually displayed */
            background-size: cover !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;

            display: flex;
            align-items: center;

            overflow: hidden;
        }


        /*
        Make sure the overlay stays behind the text.
        */
        .hero-area-overlay {
            position: absolute;
            inset: 0;
            z-index: 1;
        }


        /*
        Hero content must stay above the overlay.
        */
        .hero-area .container {
            position: relative;
            z-index: 2;
        }

        .hero-txt {
            position: relative;
            z-index: 2;
        }


        /* Desktop */
        @media (min-width: 992px) {

            .hero-area {
                min-height: 750px;
                background-size: cover !important;
                background-position: center center !important;
            }

        }


        /* Tablet */
        @media (max-width: 991.98px) {

            .hero-area {
                min-height: 680px;

                /*
         * Important for mobile/tablet:
         * keep the image visible instead of allowing
         * the desktop background positioning to crop it badly.
         */
                background-size: cover !important;
                background-position: center center !important;
            }

            .hero-txt {
                padding-top: 100px;
                padding-bottom: 50px;
            }

            .hero-txt span {
                font-size: 14px;
            }

            .hero-txt h1 {
                font-size: 42px;
                line-height: 1.2;
            }

        }


        /* Phones */
        @media (max-width: 575.98px) {

            .hero-area {
                min-height: 680px;

                /*
         * This is important if your image is being cropped
         * badly on phones.
         */
                background-size: cover !important;
                background-position: center center !important;
            }

            .hero-txt {
                padding: 160px 15px 60px;
            }

            .hero-txt span {
                display: inline-block;
                margin-bottom: 12px;
                font-size: 12px;
                line-height: 1.5;
            }

            .hero-txt h1 {
                font-size: 30px;
                line-height: 1.25;
                margin-bottom: 25px;
            }

            .hero-boxed-btn {
                display: inline-block;
                padding: 12px 22px;
                font-size: 13px;
            }

        }


        /* Very small phones */
        @media (max-width: 375px) {

            .hero-area {
                min-height: 650px;
            }

            .hero-txt {
                padding-top: 145px;
            }

            .hero-txt h1 {
                font-size: 27px;
            }

        }

        /* ==========================================
        Custom Logo Preloader
        ========================================== */

        .loader-container {
            position: fixed;
            inset: 0;
            background: #ffffff;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-content {
            text-align: center;
        }

        .loader-logo {
            width: 110px;
            height: 110px;
            margin: 0 auto 22px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .12);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulseLogo 1.8s infinite;
        }

        .loader-logo img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            animation: zoomLogo 1.8s ease-in-out infinite;
        }

        .loader-spinner {
            width: 34px;
            height: 34px;
            margin: 0 auto 12px;
            border: 3px solid #e9ecef;
            border-top-color: #0d6efd;
            border-radius: 50%;
            animation: spin .8s linear infinite;
        }

        .loader-text {
            font-size: 13px;
            color: #6c757d;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes zoomLogo {

            0%,
            100% {
                transform: scale(.95);
            }

            50% {
                transform: scale(1.08);
            }
        }

        @keyframes pulseLogo {
            0% {
                box-shadow: 0 0 0 0 rgba(13, 110, 253, .35);
            }

            70% {
                box-shadow: 0 0 0 18px rgba(13, 110, 253, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
            }
        }
    </style>
</head>

<body>


    <!--   header area start   -->
    <div class="header-area header-absolute">
        <div class="container">
            <div class="support-bar-area">
                <div class="row">
                    <div class="col-lg-6 support-contact-info">
                        <span class="address"><i class="flaticon-placeholder"></i>{{ $settings->address }}</span>
                        <span class="phone"><i class="flaticon-chat"></i> {{ $settings->contact_email }}</span>
                    </div>
                </div>
            </div>
            <div class="header-navbar">
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <div class="logo-wrapper">
                            <a href="index-1.html"><img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-6 text-right position-static">
                        <ul class="main-menu" id="mainMenu">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/login" class="boxed-btn">Login</a></li>
                            <li><a href="/register" class="boxed-btn">Make Appointment</a></li>
                        </ul>
                        <div id="mobileMenu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   header area end   -->

    @yield('content')

    <!--    footer section start   -->
    <footer class="footer-section">
        <div class="container">
            <div class="top-footer-section">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="footer-logo-wrapper">
                            <a href="index-1.html">
                                <img src="assets/img/logo-1.png" alt="">
                            </a>
                        </div>
                        <p class="footer-txt">Our entire business is centred on you and your goals. Financial planning
                            is not about money, it’s about finding ways to help you achieve your goals through careful
                            and thoughtful planning and execution.</p>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h4>Useful Links</h4>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About us</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h4>Solutions</h4>
                        <ul class="footer-links">
                            <li><a href="#">Invest Panning</a></li>
                            <li><a href="#">Taxe & Business</a></li>
                            <li><a href="#">Risk Manegment</a></li>
                            <li><a href="#">Finance</a></li>
                            <li><a href="#">Life & Insurance</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4>Contact Us</h4>
                        <div class="footer-contact-info">
                            <ul>
                                <li><i class="fa fa-home"></i><span>{{ $settings->address }}</span>
                                </li>
                                <li><i class="far fa-envelope"></i><span>{{ $settings->contact_email }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-section">
                <div class="row">
                    <div class="col-sm-7">
                        <p class="text-left">© Copyrights 2019 {{ $settings->site_name }}. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--    footer section end   -->


    <!-- Preloader -->
    <div class="loader-container" id="preloader">
        <div class="loader-content">
            <div class="loader-logo">
                <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}">
            </div>
        </div>
    </div>


    <!-- back to top area start -->
    <div class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!-- back to top area end -->


    <!-- Additional Scripts -->
    @yield('scripts')

    <!-- popper js -->
    <script src="{{ URL('home-assets/js/popper.min-1.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ URL('home-assets/js/bootstrap.min-1.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ URL('home-assets/js/owl.carousel.min-1.js') }}"></script>
    <!-- slicknav js -->
    <script src="{{ URL('home-assets/js/jquery.slicknav.min-1.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ URL('home-assets/js/isotope.pkgd.min-1.js') }}"></script>
    <!-- particle js -->
    <script src="{{ URL('home-assets/js/particles.min-1.js') }}"></script>
    <!-- jquery ripples js -->
    <script src="{{ URL('home-assets/js/jquery.ripples-min-1.js') }}"></script>
    <!-- ytplayer js -->
    <script src="{{ URL('home-assets/js/YTPlayer.min-1.js') }}"></script>
    <!-- parallax js -->
    <script src="{{ URL('home-assets/js/parallax.min-1.js') }}"></script>
    <!-- main js -->
    <script src="{{ URL('home-assets/js/main-1.js') }}"></script>


    @include('layouts.livechat')
</body>

</html>
