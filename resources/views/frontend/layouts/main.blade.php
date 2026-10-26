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
            border-left: 5px solid #0d6efd;
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
