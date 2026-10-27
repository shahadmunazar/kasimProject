<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('meta_title', 'TC Smart Technology - Leading Innovation in Automation & Embedded Systems')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keywords', 'Industrial Automation, Embedded Systems, TC Smart Technology')" name="keywords">
    <meta content="@yield('meta_description', 'TC Smart Technology provides cutting-edge solutions in Embedded Systems, Industrial Automation, and Software Development.')" name="description">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:title" content="@yield('meta_title', 'TC Smart Technology - Leading Innovation in Automation & Embedded Systems')">
    <meta property="og:description" content="@yield('meta_description', 'TC Smart Technology provides cutting-edge solutions in Embedded Systems, Industrial Automation, and Software Development.')">
    <meta property="og:site_name" content="TC Smart Technology">
    <meta property="og:image" content="{{ asset('favicon.png') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('canonical_url', url()->current())">
    <meta name="twitter:title" content="@yield('meta_title', 'TC Smart Technology - Leading Innovation in Automation & Embedded Systems')">
    <meta name="twitter:description" content="@yield('meta_description', 'TC Smart Technology provides cutting-edge solutions in Embedded Systems, Industrial Automation, and Software Development.')">
    <meta name="twitter:image" content="{{ asset('favicon.png') }}">
    
    <!-- Google Indexing & Verification -->
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="google593c6f0cacafc57c">

    <!-- Schema.org Organization Structured Data -->
    <script type="application/ld+json">
    {!! json_encode([
        '@' . 'context' => 'https://schema.org',
        '@' . 'type' => 'Organization',
        'name' => 'TC Smart Technology',
        'url' => url('/'),
        'logo' => asset('favicon.png'),
        'description' => 'Leading provider of Embedded Systems, Industrial Automation, HVAC Solutions, and Software Development.',
        'telephone' => '+91-7065122884',
        'email' => 'info@tcsmarttechnology.com',
        'address' => [
            '@' . 'type' => 'PostalAddress',
            'streetAddress' => 'D-364, Pocket 11, DDA Janta Flat, Jasola Vihar',
            'addressLocality' => 'New Delhi',
            'postalCode' => '110025',
            'addressCountry' => 'IN'
        ],
        'sameAs' => [
            'https://www.facebook.com/share/12L536bcJdV/?mibextid=wwXIfr',
            'https://www.instagram.com/tc_smart_technology?igsh=a2s2MWNoNGNvdTU1',
            'https://www.linkedin.com/company/tc-smart-technology/',
            'https://youtube.com/@tcsmarttechnology?si=_YxgASgXOfdBwFgY'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('schema')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('favicon.png') }}" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom Notification Alert Toast Styles -->
    <style>
        .custom-alert-container {
            position: fixed;
            top: 25px;
            right: 25px;
            z-index: 10999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            pointer-events: none;
            max-width: 400px;
            width: calc(100% - 40px);
        }
        .custom-alert-toast {
            pointer-events: auto;
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 14px;
            padding: 14px 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 5px solid #df9b15;
            font-family: inherit;
            color: #1e293b;
            animation: customAlertSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .custom-alert-toast.hiding {
            animation: customAlertSlideOut 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .custom-alert-toast .alert-icon-wrap {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
            flex-shrink: 0;
            font-size: 1.15rem;
        }
        .custom-alert-toast.alert-success {
            border-left-color: #10b981;
        }
        .custom-alert-toast.alert-success .alert-icon-wrap {
            background: #ecfdf5;
            color: #10b981;
        }
        .custom-alert-toast.alert-info {
            border-left-color: #0ea5e9;
        }
        .custom-alert-toast.alert-info .alert-icon-wrap {
            background: #f0f9ff;
            color: #0ea5e9;
        }
        .custom-alert-toast.alert-warning {
            border-left-color: #f59e0b;
        }
        .custom-alert-toast.alert-warning .alert-icon-wrap {
            background: #fffbeb;
            color: #f59e0b;
        }
        .custom-alert-toast.alert-error {
            border-left-color: #ef4444;
        }
        .custom-alert-toast.alert-error .alert-icon-wrap {
            background: #fef2f2;
            color: #ef4444;
        }
        .custom-alert-content {
            flex-grow: 1;
            padding-right: 10px;
        }
        .custom-alert-title {
            font-weight: 700;
            font-size: 0.92rem;
            margin-bottom: 2px;
            color: #0f172a;
        }
        .custom-alert-message {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.4;
            margin: 0;
        }
        .custom-alert-close {
            background: none;
            border: none;
            color: #94a3b8;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 4px;
            line-height: 1;
            transition: color 0.15s ease;
            margin-left: 6px;
        }
        .custom-alert-close:hover {
            color: #334155;
        }
        .custom-alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(0, 0, 0, 0.08);
            width: 100%;
        }
        .custom-alert-progress-bar {
            height: 100%;
            width: 100%;
            background: currentColor;
            animation: customAlertProgress linear forwards;
        }
        @keyframes customAlertSlideIn {
            from { transform: translateX(110%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes customAlertSlideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(110%); opacity: 0; }
        }
        @keyframes customAlertProgress {
            from { width: 100%; }
            to { width: 0%; }
        }

        /* =========================================================
           1. UNIFIED BRAND COLORS & WCAG HIGH-CONTRAST TYPOGRAPHY
           ========================================================= */
        :root {
            --bs-primary: #df9b15;
            --bs-primary-rgb: 223, 155, 21;
            --bs-dark: #0f172a;
            --bs-dark-rgb: 15, 23, 42;
            --bs-body-color: #1e293b;
            --bs-body-bg: #ffffff;
            --bs-link-color: #df9b15;
            --bs-link-hover-color: #b4780a;
        }

        /* Universal HTML & Body Safeguards against horizontal overflow */
        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            position: relative;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }

        /* Body Typography: deep, crisp slate for effortless reading everywhere */
        body {
            color: #1e293b;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.95rem;
            line-height: 1.68;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Headings: deep rich slate-900 with sharp contrast */
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            color: #0f172a;
            font-family: 'Roboto', 'Poppins', -apple-system, sans-serif;
            font-weight: 700;
            letter-spacing: -0.015em;
        }
        .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            color: #0f172a;
            font-family: 'Roboto', 'Poppins', -apple-system, sans-serif;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        /* Global Text Contrast Enhancements: No faded or washed-out fonts */
        .text-dark {
            color: #0f172a !important;
        }
        .text-secondary {
            color: #334155 !important; /* Deep Slate-700 */
        }
        .text-muted {
            color: #475569 !important; /* Slate-600: strong contrast against white & light-gray */
            font-weight: 500;
        }
        p.lead, .lead {
            color: #334155 !important;
            line-height: 1.75;
        }

        /* Contrast overrides for Dark Containers (Hero dark card, Footer, bg-dark) */
        .bg-dark, footer.footer, .card.bg-dark, .modal-dark {
            color: #f1f5f9;
        }
        .bg-dark h1, .bg-dark h2, .bg-dark h3, .bg-dark h4, .bg-dark h5, .bg-dark h6,
        footer h1, footer h2, footer h3, footer h4, footer h5, footer h6,
        .card.bg-dark h1, .card.bg-dark h2, .card.bg-dark h3, .card.bg-dark h4, .card.bg-dark h5, .card.bg-dark h6 {
            color: #ffffff !important;
        }
        .bg-dark p, footer p, .card.bg-dark p {
            color: #cbd5e1;
        }
        .bg-dark .text-muted, footer .text-muted, .card.bg-dark .text-muted,
        .bg-dark .text-secondary, footer .text-secondary, .card.bg-dark .text-secondary,
        .text-light-50, .text-white-50 {
            color: #cbd5e1 !important;
        }
        footer .footer-links a {
            color: #cbd5e1 !important;
            transition: color 0.2s ease, padding-left 0.2s ease;
        }
        footer .footer-links a:hover {
            color: #df9b15 !important;
            padding-left: 4px;
        }

        /* Global Form Controls & Labels: Crisp visibility */
        .form-label, label {
            color: #0f172a !important;
            font-weight: 600;
            font-size: 0.88rem;
            margin-bottom: 0.35rem;
        }
        .form-control, .form-select {
            color: #0f172a !important;
            font-weight: 500;
            border: 1.5px solid #cbd5e1;
            background-color: #ffffff;
            border-radius: 8px;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        .form-control::placeholder, .form-select::placeholder {
            color: #64748b !important;
            opacity: 1;
        }
        .form-control:focus, .form-select:focus {
            color: #0f172a !important;
            background-color: #ffffff;
            border-color: #df9b15 !important;
            box-shadow: 0 0 0 0.2rem rgba(223, 155, 21, 0.22) !important;
        }
        .input-group-text {
            color: #475569;
            font-weight: 600;
            background-color: #f8fafc;
            border: 1.5px solid #cbd5e1;
        }

        /* Buttons: Solid Brand Consistency & Contrast */
        .btn-primary {
            background-color: #df9b15 !important;
            border-color: #df9b15 !important;
            color: #ffffff !important;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.12);
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #b4780a !important;
            border-color: #b4780a !important;
            color: #ffffff !important;
        }
        .btn-outline-primary {
            color: #df9b15 !important;
            border-color: #df9b15 !important;
            font-weight: 600;
        }
        .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active {
            background-color: #df9b15 !important;
            border-color: #df9b15 !important;
            color: #ffffff !important;
        }
        .btn-secondary {
            background-color: #475569 !important;
            border-color: #475569 !important;
            color: #ffffff !important;
        }
        .btn-outline-secondary {
            color: #334155 !important;
            border-color: #cbd5e1 !important;
            font-weight: 600;
        }
        .btn-outline-secondary:hover {
            background-color: #f1f5f9 !important;
            border-color: #94a3b8 !important;
            color: #0f172a !important;
        }
        .btn-light {
            background-color: #ffffff !important;
            color: #1e293b !important;
            border-color: #cbd5e1 !important;
        }
        .btn-light:hover {
            background-color: #f8fafc !important;
            color: #0f172a !important;
            border-color: #94a3b8 !important;
        }
        .text-primary {
            color: #df9b15 !important;
        }
        .bg-primary {
            background-color: #df9b15 !important;
        }
        .bg-primary-subtle {
            background-color: rgba(223, 155, 21, 0.12) !important;
        }
        .border-primary {
            border-color: #df9b15 !important;
        }
        .form-check-input:checked {
            background-color: #df9b15 !important;
            border-color: #df9b15 !important;
        }
        .page-item.active .page-link {
            background-color: #df9b15 !important;
            border-color: #df9b15 !important;
            color: #ffffff !important;
        }

        /* Badges: High Contrast & Accessible */
        .badge {
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .badge.bg-light {
            background-color: #f1f5f9 !important;
            color: #0f172a !important;
            border: 1px solid #cbd5e1 !important;
        }
        .badge.bg-secondary-subtle {
            background-color: #f1f5f9 !important;
            color: #1e293b !important;
            border: 1px solid #cbd5e1 !important;
        }
        .badge.bg-primary-subtle {
            background-color: rgba(223, 155, 21, 0.12) !important;
            color: #9c6806 !important;
            border: 1px solid rgba(223, 155, 21, 0.25) !important;
        }
        .badge.bg-info-subtle {
            background-color: #e0f2fe !important;
            color: #0369a1 !important;
            border: 1px solid #bae6fd !important;
        }
        .badge.bg-warning-subtle {
            background-color: #fef3c7 !important;
            color: #92400e !important;
            border: 1px solid #fde68a !important;
        }
        .badge.bg-success-subtle {
            background-color: #dcfce7 !important;
            color: #15803d !important;
            border: 1px solid #bbf7d0 !important;
        }
        .badge.bg-danger-subtle {
            background-color: #fee2e2 !important;
            color: #b91c1c !important;
            border: 1px solid #fecaca !important;
        }

        /* Cards & Breadcrumbs */
        .card {
            border-color: #e2e8f0;
        }
        .card-title {
            color: #0f172a !important;
            font-weight: 700;
        }
        .breadcrumb-item a {
            color: #df9b15;
            text-decoration: none;
            font-weight: 600;
        }
        .breadcrumb-item a:hover {
            color: #b4780a;
            text-decoration: underline;
        }
        .breadcrumb-item.active {
            color: #0f172a !important;
            font-weight: 700;
        }
        .list-group-item.active {
            background-color: #df9b15 !important;
            border-color: #df9b15 !important;
            color: #ffffff !important;
        }
        .hover-primary:hover {
            color: #df9b15 !important;
        }

        /* Media Responsiveness & Fluid Containers */
        img, svg, video, canvas, audio, iframe {
            max-width: 100%;
            height: auto;
        }
        .container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
            max-width: 100%;
        }

        /* =========================================================
           2. RESPONSIVE MEDIA QUERIES (TABLETS & MOBILE DEVICES)
           ========================================================= */

        /* Tablets (768px - 991.98px) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .display-1 { font-size: 3.5rem !important; }
            .display-2 { font-size: 3.0rem !important; }
            .display-3 { font-size: 2.5rem !important; }
            .display-4 { font-size: 2.2rem !important; }
            .display-5 { font-size: 1.95rem !important; }
            .display-6, h1, .h1 { font-size: 1.8rem !important; }
            h2, .h2 { font-size: 1.55rem !important; }
            h3, .h3 { font-size: 1.35rem !important; }
            .page-header .bg-white {
                padding: 2.5rem 2rem !important;
            }
        }

        /* Mobile Viewports (< 768px) */
        @media (max-width: 767.98px) {
            /* Fluid Headings for Mobile */
            .display-1 { font-size: 2.5rem !important; line-height: 1.15 !important; }
            .display-2 { font-size: 2.2rem !important; line-height: 1.15 !important; }
            .display-3 { font-size: 1.95rem !important; line-height: 1.2 !important; }
            .display-4 { font-size: 1.8rem !important; line-height: 1.2 !important; }
            .display-5 { font-size: 1.6rem !important; line-height: 1.25 !important; }
            .display-6, h1, .h1 { font-size: 1.5rem !important; line-height: 1.25 !important; }
            h2, .h2 { font-size: 1.35rem !important; line-height: 1.3 !important; }
            h3, .h3 { font-size: 1.2rem !important; line-height: 1.35 !important; }
            h4, .h4 { font-size: 1.08rem !important; }
            h5, .h5 { font-size: 0.98rem !important; }
            h6, .h6 { font-size: 0.88rem !important; }
            .lead { font-size: 0.98rem !important; line-height: 1.7 !important; }

            /* Mobile Form Usability: Strictly 16px to prevent iOS Safari auto-zoom */
            .form-control, .form-select, input[type="text"], input[type="email"], input[type="tel"], input[type="password"], input[type="number"], select, textarea {
                font-size: 16px !important;
            }

            /* Touch targets: min 42px height for mobile buttons */
            .btn {
                min-height: 42px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .btn-sm {
                min-height: 34px;
            }

            /* Card padding on mobile to prevent cramped contents */
            .auth-card .card-body,
            .card-body.p-5,
            .card.p-5,
            .card.p-lg-5 {
                padding: 1.5rem 1.2rem !important;
            }

            /* Page header responsive padding */
            .page-header .bg-white {
                padding: 1.75rem 1.25rem !important;
            }
            .page-header {
                padding-top: 1.5rem !important;
                margin-bottom: 2.5rem !important;
            }

            /* Table responsive wrapper touch scrolling */
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            /* Back to top button position */
            .back-to-top {
                right: 16px !important;
                bottom: 16px !important;
                width: 44px !important;
                height: 44px !important;
                font-size: 1.1rem !important;
            }

            /* Navbar links spacing & mobile highlight */
            .navbar .navbar-nav .nav-link {
                margin-right: 0 !important;
                padding: 10px 14px !important;
                color: #0f172a !important;
                font-weight: 600;
                border-radius: 6px;
            }
            .navbar .navbar-nav .nav-link:hover,
            .navbar .navbar-nav .nav-link.active {
                color: var(--bs-primary) !important;
                background-color: rgba(223, 155, 21, 0.08);
            }
        }
    </style>

    @stack('styles') <!-- Optional custom styles -->
    
    
</head>

<body>

    <!-- Spinner -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <!-- Layout Components -->
    @include('frontend.layouts.topbar')
    @include('frontend.layouts.navbar')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.cookie-consent')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
     
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Custom Alert Notification Function
        function showCustomAlert(type, message, title) {
            let container = document.getElementById('customAlertContainer');
            if (!container) {
                container = document.createElement('div');
                container.id = 'customAlertContainer';
                container.className = 'custom-alert-container';
                document.body.appendChild(container);
            }

            const alertType = type || 'info';
            let iconHtml = '<i class="fa fa-info-circle"></i>';
            let defaultTitle = 'Notification';

            if (alertType === 'success') {
                iconHtml = '<i class="fa fa-check-circle"></i>';
                defaultTitle = 'Success';
            } else if (alertType === 'warning') {
                iconHtml = '<i class="fa fa-exclamation-triangle"></i>';
                defaultTitle = 'Already Added / Notice';
            } else if (alertType === 'error') {
                iconHtml = '<i class="fa fa-times-circle"></i>';
                defaultTitle = 'Error';
            } else if (alertType === 'info') {
                iconHtml = '<i class="fa fa-info-circle"></i>';
                defaultTitle = 'Information';
            }

            const alertEl = document.createElement('div');
            alertEl.className = `custom-alert-toast alert-${alertType}`;
            alertEl.innerHTML = `
                <div class="alert-icon-wrap">
                    ${iconHtml}
                </div>
                <div class="custom-alert-content">
                    <div class="custom-alert-title">${title || defaultTitle}</div>
                    <p class="custom-alert-message">${message}</p>
                </div>
                <button type="button" class="custom-alert-close" aria-label="Close">&times;</button>
                <div class="custom-alert-progress">
                    <div class="custom-alert-progress-bar" style="animation-duration: 3500ms;"></div>
                </div>
            `;

            container.appendChild(alertEl);

            const removeToast = () => {
                if (alertEl.classList.contains('hiding')) return;
                alertEl.classList.add('hiding');
                setTimeout(() => {
                    if (alertEl.parentNode) alertEl.parentNode.removeChild(alertEl);
                }, 300);
            };

            alertEl.querySelector('.custom-alert-close').addEventListener('click', removeToast);
            const timer = setTimeout(removeToast, 3500);

            alertEl.addEventListener('mouseenter', () => clearTimeout(timer));
            alertEl.addEventListener('mouseleave', () => setTimeout(removeToast, 1200));
        }
        window.showCustomAlert = showCustomAlert;

        // Bridge server session messages to Custom Alert
        @if(session('success'))
            showCustomAlert('success', "{{ session('success') }}", 'Success');
        @endif

        @if(session('error'))
            showCustomAlert('error', "{{ session('error') }}", 'Error');
        @endif

        @if(session('info'))
            showCustomAlert('info', "{{ session('info') }}", 'Notice');
        @endif

        @if(session('warning'))
            showCustomAlert('warning', "{{ session('warning') }}", 'Attention');
        @endif
    </script>

    <!-- OFFCANVAS SHOPPING CART DRAWER -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel" style="width: 380px; max-width: 90vw;">
        <div class="offcanvas-header bg-light border-bottom py-3">
            <h5 class="offcanvas-title fw-bold text-dark d-flex align-items-center" id="offcanvasCartLabel">
                <i class="fa fa-shopping-cart text-primary me-2"></i> Shopping Cart
                <span class="badge bg-primary rounded-pill ms-2 cart-count-badge" style="font-size: 0.75rem;">0</span>
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 d-flex flex-column" id="offcanvasCartBody">
            <div class="d-flex align-items-center justify-content-center p-5 text-muted">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span> Loading Cart...
            </div>
        </div>
    </div>

    <!-- GLOBAL CART & WISHLIST JQUERY SCRIPT -->
    <script>
        // Global Cart & Wishlist API Helper Functions
        function refreshCartBadge(count) {
            $('.cart-count-badge').text(count !== undefined ? count : 0);
        }

        function refreshWishlistBadge(count) {
            $('.wishlist-count-badge').text(count !== undefined ? count : 0);
        }

        function loadMiniCart() {
            $.ajax({
                url: "{{ route('cart.mini') }}",
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if (res && res.html) {
                        $('#offcanvasCartBody').html(res.html);
                        refreshCartBadge(res.count);
                    }
                }
            });
        }

        function addToCart(productId, quantity, btnEl) {
            var $btn = $(btnEl);
            var originalHtml = $btn.html();
            $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

            $.ajax({
                url: "{{ route('cart.add') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    quantity: quantity || 1
                },
                success: function(res) {
                    refreshCartBadge(res.count);
                    if (res.already_in_cart) {
                        showCustomAlert('warning', res.message || 'Product is already in your cart (quantity updated)!', 'Already in Cart');
                    } else {
                        showCustomAlert('success', res.message || 'Product added to cart!', 'Added to Cart');
                    }

                    // Automatically load mini-cart and open offcanvas drawer
                    loadMiniCart();
                    var cartDrawer = new bootstrap.Offcanvas(document.getElementById('offcanvasCart'));
                    cartDrawer.show();
                },
                error: function(err) {
                    var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'Could not add product to cart.';
                    showCustomAlert('error', msg, 'Cart Error');
                },
                complete: function() {
                    $btn.prop('disabled', false).html(originalHtml);
                }
            });
        }

        function updateCartItemQty(itemId, newQty) {
            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    item_id: itemId,
                    quantity: newQty
                },
                success: function(res) {
                    if (res.html) {
                        $('#offcanvasCartBody').html(res.html);
                        refreshCartBadge(res.count);
                    }
                },
                error: function(err) {
                    var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'Cannot add more. Stock limit reached.';
                    showCustomAlert('warning', msg, 'Stock Limit');
                    if (err.responseJSON && err.responseJSON.html) {
                        $('#offcanvasCartBody').html(err.responseJSON.html);
                        refreshCartBadge(err.responseJSON.count);
                    }
                }
            });
        }

        function removeCartItem(itemId) {
            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    item_id: itemId
                },
                success: function(res) {
                    if (res.html) {
                        $('#offcanvasCartBody').html(res.html);
                        refreshCartBadge(res.count);
                    }
                    showCustomAlert('info', res.message || 'Item removed from cart', 'Cart Updated');
                }
            });
        }

        function toggleWishlist(productId, btnEl) {
            var $btn = $(btnEl);
            var $icon = $btn.find('i');
            
            // Subtle pop animation
            $icon.css('transform', 'scale(1.3)');

            $.ajax({
                url: "{{ route('wishlist.toggle') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(res) {
                    refreshWishlistBadge(res.count);

                    if (res.status === 'added') {
                        $icon.removeClass('text-muted').addClass('text-danger');
                        showCustomAlert('success', res.message || 'Added to wishlist!', 'Wishlist');
                    } else {
                        $icon.removeClass('text-danger').addClass('text-muted');
                        showCustomAlert('warning', res.message || 'Product is already in your wishlist (removed)!', 'Already in Wishlist');
                    }
                },
                error: function(err) {
                    var msg = (err.responseJSON && err.responseJSON.message) ? err.responseJSON.message : 'Unable to update wishlist.';
                    showCustomAlert('error', msg, 'Wishlist Error');
                },
                complete: function() {
                    setTimeout(function() {
                        $icon.css('transform', 'scale(1)');
                    }, 200);
                }
            });
        }

        // Initialize header counts & offcanvas event on page load
        $(function() {
            // Initial counts
            $.get("{{ route('cart.count') }}", function(data) {
                if (data && data.count !== undefined) {
                    refreshCartBadge(data.count);
                }
            });

            $.get("{{ route('wishlist.count') }}", function(data) {
                if (data && data.count !== undefined) {
                    refreshWishlistBadge(data.count);
                }
            });

            // Listen to offcanvas opening event to refresh contents
            var offcanvasEl = document.getElementById('offcanvasCart');
            if (offcanvasEl) {
                offcanvasEl.addEventListener('show.bs.offcanvas', function () {
                    loadMiniCart();
                });
            }
        });
    </script>

    @stack('scripts') <!-- Optional custom scripts -->
</body>

</html>
