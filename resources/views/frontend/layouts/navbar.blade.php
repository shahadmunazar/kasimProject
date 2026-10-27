<style>
    /* Style for dropdown-submenu */
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu > .dropdown-menu {
    top: 0 !important;
    left: 100%;
    margin-top: 0 !important;
    position: absolute;
    transform: translateY(0%) !important;
}


/* Show submenu on hover for desktop and keep it open */
@media (min-width: 992px) {
    .dropdown-submenu.active > .dropdown-menu {
        display: block !important; /* Keep submenu open */
    }
    .dropdown-submenu:hover > .dropdown-menu {
        display: block !important; /* Show on hover */
    }
    /* Ensure category link remains clickable */
    .dropdown-submenu > a.dropdown-toggle {
        pointer-events: auto;
    }
}

/* For mobile: adjust submenu display */
@media (max-width: 991px) {
    .dropdown-submenu > .dropdown-menu {
        position: static;
        left: 0;
        margin: 0;
        padding-left: 15px;
        display: none; /* Initially hidden */
    }
    .dropdown-submenu.show > .dropdown-menu {
        display: block; /* Show when toggled */
    }
}

/* Ensure dropdown items are clickable */
.dropdown-item {
    cursor: pointer;
    user-select: none;
}

/* Prevent text selection on double-click */
.nav-link, .dropdown-item {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Ensure only one submenu is visible at a time */
.dropdown-menu .dropdown-submenu .dropdown-menu {
    display: none;
}

.dropdown-menu .dropdown-submenu.show .dropdown-menu {
    display: block;
}

/* ========================================================
   SERVICES MEGA-MENU STYLES
   ======================================================== */
@media (min-width: 992px) {
    .dropdown-mega {
        position: static !important;
    }
    
    .dropdown-mega .mega-menu {
        position: absolute;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
        margin-top: 0 !important;
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.08);
        border-radius: 0 0 16px 16px;
        box-shadow: 0 24px 48px -12px rgba(15, 23, 42, 0.16), 0 4px 12px rgba(0, 0, 0, 0.04);
        display: none;
        opacity: 0;
        visibility: hidden;
        transform: translateY(8px);
        transition: opacity 0.22s ease, transform 0.22s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.22s ease;
        z-index: 1050;
        overflow: hidden;
    }

    .dropdown-mega:hover .mega-menu,
    .dropdown-mega.show .mega-menu {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) !important;
    }

    .mega-menu-desktop {
        display: flex;
        width: 100%;
        min-height: 480px;
    }

    .mega-sidebar {
        width: 320px;
        min-width: 320px;
        background: #f8fafc;
        border-right: 1px solid #eef2f6;
        padding: 22px 18px;
        display: flex;
        flex-direction: column;
    }

    .mega-cat-list {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .mega-cat-btn {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 10px;
        text-decoration: none;
        color: #1e293b;
        font-weight: 600;
        font-size: 0.88rem;
        transition: all 0.2s ease;
        background: transparent;
        border: 1px solid transparent;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }

    .mega-cat-btn:hover {
        background: #ffffff;
        color: #0056b3;
        border-color: #e2e8f0;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }

    .mega-cat-btn.active {
        background: #ffffff;
        color: #0056b3;
        border-color: rgba(0, 86, 179, 0.22);
        box-shadow: 0 4px 14px rgba(0, 86, 179, 0.08);
        position: relative;
    }

    .mega-cat-btn.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 4px;
        background: #0056b3;
        border-radius: 0 4px 4px 0;
    }

    .mega-cat-icon-box {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .mega-cat-info {
        display: flex;
        flex-direction: column;
        line-height: 1.25;
        overflow: hidden;
    }

    .mega-cat-title {
        font-weight: 600;
        font-size: 0.86rem;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .mega-cat-desc {
        font-size: 0.72rem;
        color: #64748b;
        font-weight: normal;
        margin-top: 2px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .mega-cat-chevron {
        font-size: 0.72rem;
        opacity: 0.35;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }

    .mega-cat-btn:hover .mega-cat-chevron,
    .mega-cat-btn.active .mega-cat-chevron {
        opacity: 1;
        transform: translateX(2px);
    }

    .mega-content {
        flex: 1;
        padding: 24px 28px;
        background: #ffffff;
        overflow-y: auto;
        max-height: 580px;
    }

    .mega-pane {
        display: none;
    }

    .mega-pane.active {
        display: block;
        animation: megaPaneFade 0.22s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes megaPaneFade {
        from { opacity: 0; transform: translateX(8px); }
        to { opacity: 1; transform: translateX(0); }
    }
}

.mega-group-title {
    font-size: 0.78rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
    padding-bottom: 6px;
    border-bottom: 2px solid #f1f5f9;
    display: flex;
    align-items: center;
}

.mega-service-link {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 0.84rem;
    color: #475569;
    padding: 6px 0;
    text-decoration: none;
    transition: all 0.18s ease;
    line-height: 1.35;
}

.mega-service-link:hover {
    color: #0056b3;
    transform: translateX(3px);
}

.mega-service-link i {
    font-size: 0.68rem;
    margin-top: 4px;
    opacity: 0.6;
    transition: transform 0.18s ease;
    flex-shrink: 0;
}

.mega-service-link:hover i {
    opacity: 1;
    transform: translateX(2px);
}

.mega-lead-banner {
    background: linear-gradient(135deg, rgba(0, 86, 179, 0.05) 0%, rgba(0, 123, 255, 0.02) 100%);
    border: 1px solid rgba(0, 86, 179, 0.12);
    border-radius: 12px;
    padding: 14px 18px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.iiot-featured-box {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    color: #ffffff;
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.16);
}

.ai-human-control-bar {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border: 1px solid #bbf7d0;
    border-left: 4px solid #16a34a;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 0.84rem;
}

.extra-small {
    font-size: 0.68rem;
    padding: 0.2em 0.5em;
    border-radius: 4px;
}

/* Mobile Mega Menu Styles */
@media (max-width: 991.98px) {
    .dropdown-mega .mega-menu {
        position: static;
        width: 100%;
        background: #f8fafc;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        margin-top: 8px;
        padding: 12px;
        box-shadow: none;
    }
    
    .mega-mobile-cat-header {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 10px 14px;
        margin-bottom: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        font-size: 0.88rem;
        color: #1e293b;
    }

    .mega-mobile-cat-header.active {
        color: #0056b3;
        border-color: rgba(0, 86, 179, 0.3);
    }

    .mega-mobile-cat-body {
        display: none;
        padding: 8px 12px 14px 12px;
        background: #ffffff;
        border-radius: 8px;
        margin-bottom: 12px;
        border: 1px solid #edf2f7;
    }

    .mega-mobile-cat-body.show {
        display: block;
    }
}
</style>



<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
    <div class="container position-relative">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="{{ route('home.index') }}" class="navbar-brand d-lg-none py-1">
                <h1 class="m-0 text-primary fs-3 fw-bold">TC SMART</h1>
            </a>

            <!-- Mobile Action Bar: Wishlist, Cart & Menu Toggler -->
            <div class="d-flex align-items-center gap-2 d-lg-none ms-auto">
                <!-- Mobile Wishlist Button -->
                <a href="{{ route('wishlist.index') }}" class="btn btn-light rounded-circle position-relative p-0 d-inline-flex align-items-center justify-content-center text-danger border shadow-2xs" style="width: 36px; height: 36px;" title="Wishlist">
                    <i class="fa fa-heart" style="font-size: 0.9rem;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger wishlist-count-badge" style="font-size: 0.65rem; padding: 0.22em 0.45em;">
                        0
                    </span>
                </a>

                <!-- Mobile Cart Button (Triggers Offcanvas Drawer) -->
                <button type="button" class="btn btn-light rounded-circle position-relative p-0 d-inline-flex align-items-center justify-content-center text-primary border shadow-2xs" style="width: 36px; height: 36px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" title="Cart">
                    <i class="fa fa-shopping-cart" style="font-size: 0.9rem;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary cart-count-badge" style="font-size: 0.65rem; padding: 0.22em 0.45em;">
                        0
                    </span>
                </button>

                <!-- Hamburger Menu Toggler -->
                <button type="button" class="navbar-toggler me-0 p-1 border shadow-2xs" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-label="Toggle navigation" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                    <span class="navbar-toggler-icon" style="width: 1.2em; height: 1.2em;"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('home.index') }}" class="nav-item nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about_us.index') }}" class="nav-item nav-link {{ request()->routeIs('about_us.index') ? 'active' : '' }}">About Us</a>

                    <!-- Services Mega-Menu Dropdown -->
                    <div class="nav-item dropdown dropdown-mega">
                        <a href="{{ route('services.index') }}" class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}" data-bs-toggle="dropdown" id="servicesMegaMenuToggle" aria-expanded="false">Services</a>
                        <div class="dropdown-menu mega-menu border-0 p-0 shadow-lg" aria-labelledby="servicesMegaMenuToggle">
                            <!-- Desktop Mega Menu Layout (d-none d-lg-flex) -->
                            <div class="mega-menu-desktop d-none d-lg-flex">
                                <!-- Left Navigation Sidebar: 4 Parent Categories -->
                                <div class="mega-sidebar">
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 0.08em; font-size: 0.72rem;">Parent Categories</span>
                                        <span class="badge bg-primary-subtle text-primary extra-small fw-semibold">4 Sectors</span>
                                    </div>
                                    <div class="mega-cat-list" role="tablist">
                                        <!-- Category 1 Tab: Embedded Systems -->
                                        <button type="button" class="mega-cat-btn active" data-pane="mega-pane-embedded" data-url="{{ route('services.embedded_systems') }}">
                                            <div class="mega-cat-icon-box bg-primary-subtle text-primary">
                                                <i class="fa fa-microchip"></i>
                                            </div>
                                            <div class="mega-cat-info">
                                                <span class="mega-cat-title">Embedded Systems</span>
                                                <small class="mega-cat-desc">Hardware, PCB & Firmware</small>
                                            </div>
                                            <i class="fa fa-chevron-right mega-cat-chevron ms-auto"></i>
                                        </button>

                                        <!-- Category 2 Tab: Industrial IoT Solutions -->
                                        <button type="button" class="mega-cat-btn" data-pane="mega-pane-iiot" data-url="{{ route('services.industrial_iot') }}">
                                            <div class="mega-cat-icon-box bg-info-subtle text-info">
                                                <i class="fa fa-network-wired"></i>
                                            </div>
                                            <div class="mega-cat-info">
                                                <span class="mega-cat-title">Industrial IoT Solutions</span>
                                                <small class="mega-cat-desc">Monitoring, OEE & Telemetry</small>
                                            </div>
                                            <i class="fa fa-chevron-right mega-cat-chevron ms-auto"></i>
                                        </button>

                                        <!-- Category 3 Tab: Industrial Automation Services -->
                                        <button type="button" class="mega-cat-btn" data-pane="mega-pane-automation" data-url="{{ route('services.industrial_automation') }}">
                                            <div class="mega-cat-icon-box bg-warning-subtle text-warning">
                                                <i class="fa fa-robot"></i>
                                            </div>
                                            <div class="mega-cat-info">
                                                <span class="mega-cat-title">Industrial Automation</span>
                                                <small class="mega-cat-desc">Control, Robotics & QA</small>
                                            </div>
                                            <i class="fa fa-chevron-right mega-cat-chevron ms-auto"></i>
                                        </button>

                                        <!-- Category 4 Tab: Custom AI Agent Development Services -->
                                        <button type="button" class="mega-cat-btn" data-pane="mega-pane-ai" data-url="{{ route('services.custom_ai_agents') }}">
                                            <div class="mega-cat-icon-box bg-success-subtle text-success">
                                                <i class="fa fa-brain"></i>
                                            </div>
                                            <div class="mega-cat-info">
                                                <span class="mega-cat-title">Custom AI Agent Development</span>
                                                <small class="mega-cat-desc">11 Approved Agents • Human Control</small>
                                            </div>
                                            <i class="fa fa-chevron-right mega-cat-chevron ms-auto"></i>
                                        </button>
                                    </div>

                                    <!-- Quick Engineering Contact Card -->
                                    <div class="mega-sidebar-cta mt-auto pt-3">
                                        <div class="p-3 rounded-3 bg-white border shadow-2xs">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="fa fa-headset text-primary me-2"></i>
                                                <span class="fw-bold small text-dark">Custom Engineering Inquiry</span>
                                            </div>
                                            <p class="text-muted extra-small mb-2" style="font-size: 0.74rem; line-height: 1.35;">Consult our embedded, IIoT & automation solution architects.</p>
                                            <a href="{{ route('appointment.index') }}" class="btn btn-outline-primary btn-sm w-100 py-1" style="font-size: 0.78rem;">Get A Quote <i class="fa fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Content Area: Dynamic Panes for Each Parent Category -->
                                <div class="mega-content">
                                    <!-- ============================================== -->
                                    <!-- Pane 1: Embedded Systems Design and Development Services -->
                                    <!-- Navigation behaviour: Lead with category page, then expose priority service links in grouped columns -->
                                    <!-- ============================================== -->
                                    <div class="mega-pane active" id="mega-pane-embedded">
                                        <!-- Lead with Category Page Banner -->
                                        <div class="mega-lead-banner">
                                            <div>
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <span class="badge bg-primary px-2 py-1" style="font-size: 0.68rem; font-weight: 600;">PARENT CATEGORY</span>
                                                    <h5 class="m-0 fw-bold text-dark">Embedded Systems Design and Development Services</h5>
                                                </div>
                                                <p class="m-0 text-muted small">Turnkey electronics engineering from schematic architecture and PCB fabrication to real-time firmware & turnkey validation.</p>
                                            </div>
                                            <a href="{{ route('services.embedded_systems') }}" class="btn btn-primary btn-sm text-nowrap px-3 py-2 fw-semibold">
                                                Category Page <i class="fa fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>

                                        <!-- Sub-Category Groups: 4 Columns -->
                                        <div class="row g-4">
                                            <!-- Group 1: Hardware and PCB -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-layer-group text-primary me-1"></i> Hardware & PCB
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ url('/services/embedded-design-development/embedded-hardware-design') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Circuit Designing & Analysis</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/pcb-design-layout') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>High-Speed PCB Designing</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/microcontroller-product-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>PCB & Power Engineering</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/embedded-hardware-design') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Mounting & PCB Assembly</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 2: Software and Platforms -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-code text-primary me-1"></i> Software & Platforms
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ url('/services/embedded-design-development/firmware-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>HW & Firmware Design</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/embedded-linux-rtos') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Embedded UX/UI Development</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/firmware-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Circuit Design & Security</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/embedded-linux-rtos') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Custom Software Platforms</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 3: IoT Devices and Interfaces -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-wifi text-primary me-1"></i> IoT Devices & Interfaces
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>IoT & Cloud Integration</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/sensor-data-acquisition-integration') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>IoT Device Integration</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/communication-protocol-integration') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Smart Mental Device Systems</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Edge Bus & Sensor Interfaces</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 4: Prototype, Testing and Lifecycle Support -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-vial text-primary me-1"></i> Prototype & Lifecycle
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ url('/services/embedded-design-development/prototype-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Testing Frameworks & QA</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/embedded-product-testing') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Automated Testing Development</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/product-troubleshooting-upgrade') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Medical R&D & Compliance</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/production-engineering-support') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Biomedical Lifecycle Support</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================== -->
                                    <!-- Pane 2: Industrial IoT Solutions -->
                                    <!-- Navigation behaviour: Feature monitoring product, approved use cases, smart manufacturing dashboards, OEE, energy management, machine IIoT -->
                                    <!-- ============================================== -->
                                    <div class="mega-pane" id="mega-pane-iiot">
                                        <!-- Featured Industrial IoT Monitoring Product Box -->
                                        <div class="iiot-featured-box">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="p-2 rounded-3 bg-primary text-white fs-4">
                                                    <i class="fa fa-satellite-dish"></i>
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <span class="badge bg-warning text-dark fw-bold px-2 py-0" style="font-size: 0.68rem;">FEATURED PRODUCT</span>
                                                        <h6 class="m-0 fw-bold text-white">Industrial IoT Monitoring Product</h6>
                                                    </div>
                                                    <p class="m-0 text-white-50 small">Plug-and-play machine telemetry appliance with real-time sensor telemetry, edge computing & cloud synchronization.</p>
                                                </div>
                                            </div>
                                            <a href="{{ route('services.industrial_iot') }}" class="btn btn-light btn-sm text-primary fw-bold text-nowrap px-3 py-2 ms-3">
                                                Explore IIoT <i class="fa fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>

                                        <!-- Sub-Category Groups: 4 Columns with prominent badges -->
                                        <div class="row g-4">
                                            <!-- Group 1: Industrial IoT Monitoring Product -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-microchip text-info me-1"></i> Monitoring Product
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ route('services.industrial_iot') }}" class="mega-service-link fw-semibold text-primary"><i class="fa fa-star text-warning"></i>IIoT Monitoring Appliance</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Edge Gateway Hardware</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Plug-and-Play Telemetry</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Cloud IoT Fleet Hub</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 2: Data Acquisition and Monitoring -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-database text-info me-1"></i> Data Acquisition (DAQ)
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/industrial-data-logging') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>High-Speed DAQ Systems</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/centralized-iot-dashboard') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Multi-Protocol (Modbus/OPC/MQTT)</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Remote Asset Health & Vibration</a></li>
                                                    <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Automated Threshold Alerting</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 3: Smart Manufacturing and Machine IIoT (Featured OEE & Dashboards) -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-industry text-info me-1"></i> Smart Manufacturing & Machine IIoT
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link fw-semibold">
                                                            <i class="fa fa-chart-line text-success"></i>Smart Manufacturing Dashboards
                                                            <span class="badge bg-success-subtle text-success ms-auto extra-small">Live</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link fw-semibold">
                                                            <i class="fa fa-tachometer-alt text-danger"></i>OEE & Downtime Tracking
                                                            <span class="badge bg-primary text-white ms-auto extra-small">OEE</span>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/injection-molding-machine-iiot') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Machine IIoT (CNC, VMC & Press)</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/production-machine-iot-connectivity') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Production Line Telemetry</a></li>
                                                </ul>
                                            </div>

                                            <!-- Group 4: Industry and Application Monitoring -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-bolt text-info me-1"></i> Industry & Energy Monitoring
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/industrial-iot-solutions/plant-energy-management') }}" class="mega-service-link fw-semibold">
                                                            <i class="fa fa-leaf text-success"></i>Energy Management Systems
                                                            <span class="badge bg-warning-subtle text-dark ms-auto extra-small">Power</span>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/multi-location-monitoring') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Industrial HVAC & Climate Telemetry</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/production-machine-iot-connectivity') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Approved Use Cases & Field ROI</a></li>
                                                    <li><a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link"><i class="fa fa-chevron-right"></i>Predictive Maintenance Auditing</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================== -->
                                    <!-- Pane 3: Industrial Automation Services -->
                                    <!-- Navigation behaviour: Present machine control, robotics, testing and traceability as focused automation capabilities -->
                                    <!-- ============================================== -->
                                    <div class="mega-pane" id="mega-pane-automation">
                                        <!-- Focused Capability Highlights Banner -->
                                        <div class="mega-lead-banner" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.08) 0%, rgba(217, 119, 6, 0.03) 100%); border-color: rgba(245, 158, 11, 0.2);">
                                            <div>
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <span class="badge bg-warning text-dark px-2 py-1 fw-bold" style="font-size: 0.68rem;">FOCUSED CAPABILITIES</span>
                                                    <h5 class="m-0 fw-bold text-dark">Industrial Automation Services</h5>
                                                </div>
                                                <p class="m-0 text-muted small">Specialized industrial engineering focused on <strong>Machine Control</strong>, <strong>Robotics Integration</strong>, <strong>Automated Test Benches</strong>, and <strong>End-to-End Traceability</strong>.</p>
                                            </div>
                                            <a href="{{ route('services.industrial_automation') }}" class="btn btn-warning btn-sm text-dark px-3 py-2 fw-bold text-nowrap">
                                                Category Page <i class="fa fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>

                                        <!-- Sub-Category Groups: 2 Focused Columns with Deep Feature Links -->
                                        <div class="row g-4">
                                            <!-- Column 1: Control and Robotics -->
                                            <div class="col-6">
                                                <div class="p-3 rounded-3 bg-light border h-100">
                                                    <div class="mega-group-title text-dark">
                                                        <i class="fa fa-cogs text-warning me-2 fs-6"></i> Control and Robotics
                                                        <span class="badge bg-dark text-white ms-auto extra-small">Focused Capability</span>
                                                    </div>
                                                    <p class="text-muted extra-small mb-3">Complete machine control architecture, PLC/SCADA logic, multi-axis robotic cells, and precision motion.</p>
                                                    
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-iot-solutions/centralized-iot-dashboard') }}" class="mega-service-link fw-semibold">
                                                                <i class="fa fa-microchip text-primary"></i>PLC, SCADA & HMI Control
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/industrial-robotics-integration') }}" class="mega-service-link fw-semibold">
                                                                <i class="fa fa-robot text-primary"></i>Robotics Integration Cells
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/industrial-robotics-integration') }}" class="mega-service-link">
                                                                <i class="fa fa-wrench"></i>Robotic Welding & Assembly
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-iot-solutions/industrial-data-logging') }}" class="mega-service-link">
                                                                <i class="fa fa-sliders-h"></i>Precision Motion & Servo
                                                            </a>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <a href="{{ url('/services/industrial-automation/plc-hmi-vfd-integration') }}" class="mega-service-link">
                                                                <i class="fa fa-bolt"></i>Switchgear Panel Design & Automated Power Distribution
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Column 2: Automated Test and Quality -->
                                            <div class="col-6">
                                                <div class="p-3 rounded-3 bg-light border h-100">
                                                    <div class="mega-group-title text-dark">
                                                        <i class="fa fa-check-double text-warning me-2 fs-6"></i> Automated Test and Quality
                                                        <span class="badge bg-primary text-white ms-auto extra-small">Traceability</span>
                                                    </div>
                                                    <p class="text-muted extra-small mb-3">High-speed machine vision inspection, automated test benches, high-voltage compliance & part serialization.</p>
                                                    
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/test-bench-end-of-line-testing-automation') }}" class="mega-service-link fw-semibold">
                                                                <i class="fa fa-desktop text-success"></i>Automated Test Bench Design
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/labview-automation') }}" class="mega-service-link fw-semibold">
                                                                <i class="fa fa-eye text-success"></i>Machine Vision Quality QA
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/teststand-automation') }}" class="mega-service-link">
                                                                <i class="fa fa-tachometer-alt"></i>High Voltage & Type Testing
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="{{ url('/services/industrial-automation/test-bench-end-of-line-testing-automation') }}" class="mega-service-link">
                                                                <i class="fa fa-barcode"></i>Part Serialization & Traceability
                                                            </a>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <a href="{{ url('/services/embedded-design-development/prototype-development') }}" class="mega-service-link">
                                                                <i class="fa fa-clipboard-check"></i>In-Line Quality Audit Frameworks & Zero-Defect Cells
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================== -->
                                    <!-- Pane 4: Custom AI Agent Development Services -->
                                    <!-- Navigation behaviour: Show ONLY the 11 approved AI Agents and retain human-control messaging -->
                                    <!-- ============================================== -->
                                    <div class="mega-pane" id="mega-pane-ai">
                                        <!-- Leading Category Header -->
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <span class="badge bg-success px-2 py-1 fw-bold" style="font-size: 0.68rem;">ENTERPRISE AGENTS</span>
                                                    <h5 class="m-0 fw-bold text-dark">Custom AI Agent Development Services</h5>
                                                </div>
                                                <p class="m-0 text-muted small">Autonomous enterprise agent systems built for real-world business execution with verifiable human-in-the-loop governance.</p>
                                            </div>
                                            <a href="{{ route('services.custom_ai_agents') }}" class="btn btn-success btn-sm text-nowrap px-3 py-2 fw-semibold">
                                                Category Page <i class="fa fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>

                                        <!-- Mandatory Human-Control Messaging Bar -->
                                        <div class="ai-human-control-bar">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-user-shield fs-5 text-success me-3"></i>
                                                <div>
                                                    <strong class="text-dark">Human-Control Architecture & Governance:</strong>
                                                    <span class="text-secondary ms-1">Every one of our 11 approved AI agents operates strictly under verified human-in-the-loop oversight, granular permission gates, and auditable safety parameters. Zero ungoverned actions.</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 4 Sub-Category Groups containing EXACTLY the 11 Approved AI Agents -->
                                        <div class="row g-3">
                                            <!-- Group 1: Marketing and Search (3 Approved Agents) -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-bullhorn text-success me-1"></i> Marketing & Search <span class="badge bg-light text-muted ms-auto" style="font-size: 0.65rem;">3 Agents</span>
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/seo-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-search text-primary"></i>Autonomous SEO & Search Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/marketing-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-pen-nib text-primary"></i>Content Strategy & Brand Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/website-audit-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-chart-pie text-primary"></i>Market & Competitor Intelligence
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Group 2: Knowledge and Productivity (3 Approved Agents) -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-lightbulb text-success me-1"></i> Knowledge & Productivity <span class="badge bg-light text-muted ms-auto" style="font-size: 0.65rem;">3 Agents</span>
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/rag-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-file-invoice text-primary"></i>Document & Workflow Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/rag-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-book-reader text-primary"></i>Enterprise Knowledge (RAG) Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/personal-ai-assistant-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-table text-primary"></i>Data Synthesis & Reporting Agent
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Group 3: Lead Generation and Outreach (3 Approved Agents) -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-user-plus text-success me-1"></i> Lead Gen & Outreach <span class="badge bg-light text-muted ms-auto" style="font-size: 0.65rem;">3 Agents</span>
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/lead-generation-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-address-card text-primary"></i>B2B Prospect Discovery Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/linkedin-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-paper-plane text-primary"></i>Multichannel Cold Outreach Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/lead-generation-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-filter text-primary"></i>Inbound Lead Scoring Agent
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Group 4: Customer Communication (2 Approved Agents) -->
                                            <div class="col-3">
                                                <div class="mega-group-title">
                                                    <i class="fa fa-comments text-success me-1"></i> Customer Communication <span class="badge bg-light text-muted ms-auto" style="font-size: 0.65rem;">2 Agents</span>
                                                </div>
                                                <ul class="mega-service-list list-unstyled mb-0">
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/whatsapp-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-headset text-primary"></i>24/7 Intelligent Support Agent
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/voice-calling-ai-agent') }}" class="mega-service-link">
                                                            <i class="fa fa-comment-dots text-primary"></i>Conversational Concierge Agent
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="mt-3 p-2 rounded bg-light border text-center">
                                                    <small class="text-muted fw-semibold" style="font-size: 0.72rem;">
                                                        <i class="fa fa-check-circle text-success me-1"></i> 11 Approved Production Agents
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Accordion Menu Layout (d-lg-none) -->
                            <div class="mega-menu-mobile d-lg-none">
                                <!-- Mobile Category 1: Embedded Systems -->
                                <div class="mega-mobile-cat-header" data-target="#mobileCatEmbedded">
                                    <span><i class="fa fa-microchip text-primary me-2"></i>Embedded Systems Design & Development</span>
                                    <i class="fa fa-chevron-down extra-small text-muted"></i>
                                </div>
                                <div class="mega-mobile-cat-body" id="mobileCatEmbedded">
                                    <a href="{{ route('services.embedded_systems') }}" class="btn btn-primary btn-sm w-100 mb-2 py-1" style="font-size: 0.8rem;">
                                        Explore Category Page <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                    <div class="fw-bold text-dark small mb-1 mt-2">Hardware and PCB</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/embedded-design-development/embedded-hardware-design') }}" class="mega-service-link">Circuit Designing & Analysis</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/pcb-design-layout') }}" class="mega-service-link">High-Speed PCB Designing</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/microcontroller-product-development') }}" class="mega-service-link">PCB & Power Engineering</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/embedded-hardware-design') }}" class="mega-service-link">Mounting & PCB Assembly</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Software and Platforms</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/embedded-design-development/firmware-development') }}" class="mega-service-link">HW & Firmware Design</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/embedded-linux-rtos') }}" class="mega-service-link">Embedded UX/UI Development</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/firmware-development') }}" class="mega-service-link">Circuit Design & Security</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">IoT Devices and Interfaces</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/embedded-design-development/iot-device-development') }}" class="mega-service-link">IoT & Cloud Integration</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/sensor-data-acquisition-integration') }}" class="mega-service-link">IoT Device Integration</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Prototype, Testing & Lifecycle</div>
                                    <ul class="list-unstyled mb-0 ms-2">
                                        <li><a href="{{ url('/services/embedded-design-development/prototype-development') }}" class="mega-service-link">Testing Frameworks & QA</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/embedded-product-testing') }}" class="mega-service-link">Automated Testing Development</a></li>
                                        <li><a href="{{ url('/services/embedded-design-development/product-troubleshooting-upgrade') }}" class="mega-service-link">Medical R&D & Compliance</a></li>
                                    </ul>
                                </div>

                                <!-- Mobile Category 2: Industrial IoT Solutions -->
                                <div class="mega-mobile-cat-header" data-target="#mobileCatIIoT">
                                    <span><i class="fa fa-network-wired text-info me-2"></i>Industrial IoT Solutions</span>
                                    <i class="fa fa-chevron-down extra-small text-muted"></i>
                                </div>
                                <div class="mega-mobile-cat-body" id="mobileCatIIoT">
                                    <a href="{{ route('services.industrial_iot') }}" class="btn btn-info text-white btn-sm w-100 mb-2 py-1" style="font-size: 0.8rem;">
                                        Explore IIoT Solutions Page <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                    <div class="p-2 rounded bg-dark text-white mb-2 small">
                                        <span class="badge bg-warning text-dark me-1 extra-small">FEATURED PRODUCT</span>
                                        <div class="fw-bold mt-1">Industrial IoT Monitoring Product</div>
                                        <small class="text-white-50">Plug-and-play machine connect & edge telemetry</small>
                                    </div>
                                    <div class="fw-bold text-dark small mb-1">Data Acquisition & Monitoring</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/industrial-iot-solutions/industrial-data-logging') }}" class="mega-service-link">High-Speed DAQ Systems</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/centralized-iot-dashboard') }}" class="mega-service-link">Multi-Protocol (Modbus/OPC/MQTT)</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Smart Manufacturing & Machine IIoT</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link fw-semibold text-primary">Smart Manufacturing Dashboards</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee') }}" class="mega-service-link fw-semibold text-primary">OEE & Downtime Tracking</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/injection-molding-machine-iiot') }}" class="mega-service-link">Machine IIoT (CNC, VMC & Press)</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Industry & Application Monitoring</div>
                                    <ul class="list-unstyled mb-0 ms-2">
                                        <li><a href="{{ url('/services/industrial-iot-solutions/plant-energy-management') }}" class="mega-service-link">Energy Management Systems</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/multi-location-monitoring') }}" class="mega-service-link">Industrial HVAC Telemetry</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/production-machine-iot-connectivity') }}" class="mega-service-link">Approved Use Cases & Field ROI</a></li>
                                    </ul>
                                </div>

                                <!-- Mobile Category 3: Industrial Automation Services -->
                                <div class="mega-mobile-cat-header" data-target="#mobileCatAutomation">
                                    <span><i class="fa fa-robot text-warning me-2"></i>Industrial Automation Services</span>
                                    <i class="fa fa-chevron-down extra-small text-muted"></i>
                                </div>
                                <div class="mega-mobile-cat-body" id="mobileCatAutomation">
                                    <a href="{{ route('services.industrial_automation') }}" class="btn btn-warning text-dark btn-sm w-100 mb-2 py-1 fw-bold" style="font-size: 0.8rem;">
                                        Explore Automation Category <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                    <div class="alert alert-warning py-1 px-2 small mb-2" style="font-size: 0.76rem;">
                                        <strong>Focused Capabilities:</strong> Machine Control, Robotics, Automated Testing & Traceability
                                    </div>
                                    <div class="fw-bold text-dark small mb-1">Control and Robotics</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/industrial-iot-solutions/centralized-iot-dashboard') }}" class="mega-service-link">PLC, SCADA & HMI Programming</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/industrial-robotics-integration') }}" class="mega-service-link">Industrial Robotics Integration</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/industrial-robotics-integration') }}" class="mega-service-link">Robotic Welding & Assembly Cells</a></li>
                                        <li><a href="{{ url('/services/industrial-iot-solutions/industrial-data-logging') }}" class="mega-service-link">Motion Control Solutions</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/plc-hmi-vfd-integration') }}" class="mega-service-link">Switchgear Panel Design</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Automated Test and Quality</div>
                                    <ul class="list-unstyled mb-0 ms-2">
                                        <li><a href="{{ url('/services/industrial-automation/test-bench-end-of-line-testing-automation') }}" class="mega-service-link">Automated Test Bench Design</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/labview-automation') }}" class="mega-service-link">Machine Vision & Quality Inspection</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/teststand-automation') }}" class="mega-service-link">High Voltage & Type Testing</a></li>
                                        <li><a href="{{ url('/services/industrial-automation/test-bench-end-of-line-testing-automation') }}" class="mega-service-link">Part Serialization & Traceability</a></li>
                                    </ul>
                                </div>

                                <!-- Mobile Category 4: Custom AI Agent Development Services -->
                                <div class="mega-mobile-cat-header" data-target="#mobileCatAI">
                                    <span><i class="fa fa-brain text-success me-2"></i>Custom AI Agent Development Services</span>
                                    <i class="fa fa-chevron-down extra-small text-muted"></i>
                                </div>
                                <div class="mega-mobile-cat-body" id="mobileCatAI">
                                    <a href="{{ route('services.custom_ai_agents') }}" class="btn btn-success btn-sm w-100 mb-2 py-1" style="font-size: 0.8rem;">
                                        Explore AI Agents Page <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                    <div class="alert alert-success py-1 px-2 small mb-2" style="font-size: 0.74rem;">
                                        <i class="fa fa-shield-alt me-1 text-success"></i><strong>Human-Control Guaranteed:</strong> All 11 approved AI agents operate under verified human-in-the-loop oversight.
                                    </div>
                                    <div class="fw-bold text-dark small mb-1">Marketing and Search (3 Agents)</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/seo-ai-agent') }}" class="mega-service-link">1. Autonomous SEO & Search Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/marketing-ai-agent') }}" class="mega-service-link">2. Content Strategy & Brand Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/website-audit-ai-agent') }}" class="mega-service-link">3. Market & Competitor Intelligence Agent</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Knowledge and Productivity (3 Agents)</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/rag-ai-agent') }}" class="mega-service-link">4. Document & Workflow Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/rag-ai-agent') }}" class="mega-service-link">5. Enterprise Knowledge (RAG) Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/personal-ai-assistant-agent') }}" class="mega-service-link">6. Data Synthesis & Reporting Agent</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Lead Generation & Outreach (3 Agents)</div>
                                    <ul class="list-unstyled mb-2 ms-2">
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/lead-generation-ai-agent') }}" class="mega-service-link">7. B2B Prospect Discovery Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/linkedin-ai-agent') }}" class="mega-service-link">8. Multichannel Cold Outreach Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/lead-generation-ai-agent') }}" class="mega-service-link">9. Inbound Lead Scoring Agent</a></li>
                                    </ul>
                                    <div class="fw-bold text-dark small mb-1">Customer Communication (2 Agents)</div>
                                    <ul class="list-unstyled mb-0 ms-2">
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/whatsapp-ai-agent') }}" class="mega-service-link">10. 24/7 Intelligent Support Agent</a></li>
                                        <li><a href="{{ url('/services/ai-solutions-custom-ai-agents/voice-calling-ai-agent') }}" class="mega-service-link">11. Conversational Concierge Agent</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Mega-Menu Dropdown -->
                    <div class="nav-item dropdown dropdown-mega">
                        <a href="{{ route('products.listing') }}" class="nav-link dropdown-toggle {{ (request()->routeIs('products.*') || request()->routeIs('product.*')) ? 'active' : '' }}" data-bs-toggle="dropdown" id="productsMegaMenuToggle" aria-expanded="false">Products</a>
                        <div class="dropdown-menu mega-menu border-0 p-0 shadow-lg" aria-labelledby="productsMegaMenuToggle">
                            <!-- Desktop Mega Menu Layout (d-none d-lg-flex) -->
                            <div class="mega-menu-desktop d-none d-lg-flex">
                                <!-- Left Navigation Sidebar: Product Categories -->
                                <div class="mega-sidebar">
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 0.08em; font-size: 0.72rem;">Product Categories</span>
                                        <span class="badge bg-primary-subtle text-primary extra-small fw-semibold">{{ isset($navbarCategories) ? $navbarCategories->count() : 0 }} Categories</span>
                                    </div>
                                    <div class="mega-cat-list" role="tablist">
                                        @if(isset($navbarCategories))
                                            @foreach($navbarCategories as $index => $navCat)
                                                @php
                                                    $catIcons = [
                                                        'embedded-systems-design-and-development-services' => ['icon' => 'fa-microchip', 'color' => 'bg-primary-subtle text-primary', 'short' => 'Boards, Hardware & Firmware'],
                                                        'industrial-iot-solutions' => ['icon' => 'fa-network-wired', 'color' => 'bg-info-subtle text-info', 'short' => 'Gateways, Sensors & Telemetry'],
                                                        'industrial-automation-services' => ['icon' => 'fa-robot', 'color' => 'bg-warning-subtle text-warning', 'short' => 'Controllers, Testing & PLC'],
                                                        'custom-ai-agent-development-services' => ['icon' => 'fa-brain', 'color' => 'bg-success-subtle text-success', 'short' => 'Edge AI & Intelligent Modules'],
                                                    ];
                                                    $meta = $catIcons[$navCat->slug] ?? ['icon' => 'fa-box-open', 'color' => 'bg-secondary-subtle text-secondary', 'short' => 'Turnkey Hardware & Devices'];
                                                @endphp
                                                <button type="button" class="mega-cat-btn {{ $index === 0 ? 'active' : '' }}" data-pane="mega-pane-prod-{{ $navCat->id }}" data-url="{{ route('products.category', $navCat->slug) }}">
                                                    <div class="mega-cat-icon-box {{ $meta['color'] }}">
                                                        <i class="fa {{ $meta['icon'] }}"></i>
                                                    </div>
                                                    <div class="mega-cat-info">
                                                        <span class="mega-cat-title" title="{{ $navCat->name }}">{{ $navCat->name }}</span>
                                                        <small class="mega-cat-desc">{{ $navCat->productModels->count() }} Sub-Categories • {{ $navCat->products->count() }} Products</small>
                                                    </div>
                                                    <i class="fa fa-chevron-right mega-cat-chevron ms-auto"></i>
                                                </button>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Quick Product Catalog CTA Card -->
                                    <div class="mega-sidebar-cta mt-auto pt-3">
                                        <div class="p-3 rounded-3 bg-white border shadow-2xs">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="fa fa-boxes text-primary me-2"></i>
                                                <span class="fw-bold small text-dark">Full Hardware Catalog</span>
                                            </div>
                                            <p class="text-muted extra-small mb-2" style="font-size: 0.74rem; line-height: 1.35;">Explore complete hardware inventory, sensors, boards & custom designs.</p>
                                            <a href="{{ route('products.listing') }}" class="btn btn-outline-primary btn-sm w-100 py-1" style="font-size: 0.78rem;">Browse All Products <i class="fa fa-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Content Area: Dynamic Panes for Each Product Category -->
                                <div class="mega-content">
                                    @if(isset($navbarCategories))
                                        @foreach($navbarCategories as $index => $navCat)
                                            <div class="mega-pane {{ $index === 0 ? 'active' : '' }}" id="mega-pane-prod-{{ $navCat->id }}">
                                                <!-- Category Lead Banner -->
                                                <div class="mega-lead-banner">
                                                    <div>
                                                        <div class="d-flex align-items-center gap-2 mb-1">
                                                            <span class="badge bg-primary px-2 py-1" style="font-size: 0.68rem; font-weight: 600;">PRODUCT CATEGORY</span>
                                                            <h5 class="m-0 fw-bold text-dark">{{ $navCat->name }}</h5>
                                                        </div>
                                                        <p class="m-0 text-muted small">
                                                            {{ $navCat->meta_description ?? 'Browse industry-grade hardware, sub-category models, modules and turnkey industrial products.' }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('products.category', $navCat->slug) }}" class="btn btn-primary btn-sm text-nowrap px-3 py-2 fw-semibold">
                                                            View Category <i class="fa fa-arrow-right ms-1"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!-- Sub-Category (Models) Groups -->
                                                @php
                                                    $modelCount = $navCat->productModels->count();
                                                    $colClass = $modelCount <= 2 ? 'col-6' : ($modelCount == 3 ? 'col-4' : 'col-3');
                                                @endphp
                                                <div class="row g-4">
                                                    @forelse($navCat->productModels as $model)
                                                        <div class="{{ $colClass }}">
                                                            <div class="mega-group-title">
                                                                <a href="{{ route('products.model', [$navCat->slug, $model->slug]) }}" class="text-dark text-decoration-none d-flex align-items-center">
                                                                    <i class="fa fa-layer-group text-primary me-2"></i>
                                                                    <span>{{ $model->name }}</span>
                                                                </a>
                                                            </div>
                                                            <ul class="mega-service-list list-unstyled mb-0">
                                                                @forelse($model->products as $prod)
                                                                    <li>
                                                                        <a href="{{ route('product.details', $prod->slug) }}" class="mega-service-link">
                                                                            <i class="fa fa-chevron-right"></i>
                                                                            <span>{{ $prod->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @empty
                                                                    <li>
                                                                        <a href="{{ route('products.model', [$navCat->slug, $model->slug]) }}" class="mega-service-link text-primary fw-medium">
                                                                            <i class="fa fa-arrow-circle-right"></i>
                                                                            <span>Explore {{ $model->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <span class="text-muted extra-small d-inline-block ps-3">Hardware & Specs Available</span>
                                                                    </li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 py-3 text-center text-muted">
                                                            <p class="mb-0">No sub-categories currently available under this category.</p>
                                                        </div>
                                                    @endforelse
                                                </div>

                                                <!-- Additional unassigned category products if any -->
                                                @php
                                                    $directProds = $navCat->products->whereNull('product_model_id');
                                                @endphp
                                                @if($directProds->count() > 0)
                                                    <div class="mt-4 pt-3 border-top">
                                                        <div class="mega-group-title mb-2">
                                                            <i class="fa fa-star text-warning me-2"></i> Featured Direct Hardware
                                                        </div>
                                                        <div class="row g-2">
                                                            @foreach($directProds as $dp)
                                                                <div class="col-md-4 col-sm-6">
                                                                    <a href="{{ route('product.details', $dp->slug) }}" class="d-flex align-items-center p-2 rounded border bg-light text-decoration-none text-dark hover-shadow transition">
                                                                        <i class="fa fa-microchip text-primary me-2 fs-5"></i>
                                                                        <div>
                                                                            <div class="small fw-semibold text-truncate" style="max-width: 220px;">{{ $dp->name }}</div>
                                                                            <div class="text-muted extra-small">Direct Category Product</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- Bottom Quality & Certification Assurance Strip -->
                                                <div class="mt-4 pt-3 border-top d-flex align-items-center justify-content-between text-muted small">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span><i class="fa fa-shield-alt text-success me-1"></i> Industrial Grade</span>
                                                        <span><i class="fa fa-check-circle text-primary me-1"></i> 100% Quality Tested</span>
                                                        <span><i class="fa fa-tools text-info me-1"></i> Custom Integration Ready</span>
                                                    </div>
                                                    <a href="{{ route('contact.index') }}" class="text-primary text-decoration-none fw-semibold">
                                                        Inquire for OEM / Bulk Orders <i class="fa fa-angle-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Mobile Mega Menu Layout (d-lg-none) -->
                            <div class="mega-menu-mobile d-lg-none">
                                @if(isset($navbarCategories))
                                    @foreach($navbarCategories as $navCat)
                                        <div class="mega-mobile-cat-header" data-target="#mega-mobile-prod-{{ $navCat->id }}">
                                            <span><i class="fa fa-boxes text-primary me-2"></i>{{ $navCat->name }}</span>
                                            <i class="fa fa-chevron-down ms-auto text-muted small"></i>
                                        </div>
                                        <div class="mega-mobile-cat-body" id="mega-mobile-prod-{{ $navCat->id }}">
                                            <div class="d-flex justify-content-between align-items-center mb-2 pb-1 border-bottom">
                                                <span class="small fw-bold text-dark">{{ $navCat->name }}</span>
                                                <a href="{{ route('products.category', $navCat->slug) }}" class="btn btn-primary btn-sm py-0 px-2" style="font-size: 0.72rem;">View Category</a>
                                            </div>
                                            @foreach($navCat->productModels as $model)
                                                <div class="fw-bold text-dark small mt-2 mb-1">
                                                    <a href="{{ route('products.model', [$navCat->slug, $model->slug]) }}" class="text-dark text-decoration-none">
                                                        <i class="fa fa-layer-group text-primary me-1"></i> {{ $model->name }}
                                                    </a>
                                                </div>
                                                @if($model->products && $model->products->count() > 0)
                                                    <ul class="list-unstyled mb-2 ms-2">
                                                        @foreach($model->products as $prod)
                                                            <li>
                                                                <a href="{{ route('product.details', $prod->slug) }}" class="mega-service-link">
                                                                    <i class="fa fa-chevron-right"></i> {{ $prod->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <div class="ms-2 mb-1">
                                                        <a href="{{ route('products.model', [$navCat->slug, $model->slug]) }}" class="extra-small text-muted text-decoration-none">
                                                            <i class="fa fa-chevron-right text-primary"></i> Browse {{ $model->name }}
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                                <div class="pt-2 text-center">
                                    <a href="{{ route('products.listing') }}" class="btn btn-outline-primary btn-sm w-100 py-2 fw-semibold">
                                        <i class="fa fa-boxes me-1"></i> Browse All Products
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('case_studies.index') }}" class="nav-item nav-link {{ request()->routeIs('case_studies.*') ? 'active' : '' }}">Case Studies</a>
                    <a href="{{ route('blogs.index') }}" class="nav-item nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">Blogs</a>
                    <a href="{{ route('contact.index') }}" class="nav-item nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">Contact Us</a>
                    
                    <!-- Mobile Cart & Wishlist Links -->
                    <div class="d-lg-none px-3 pt-2 pb-1 border-top mt-2 d-flex gap-2">
                        <a href="{{ route('wishlist.index') }}" class="btn btn-outline-danger flex-fill py-2 small fw-semibold position-relative">
                            <i class="fa fa-heart me-1"></i> Wishlist
                            <span class="badge bg-danger rounded-pill wishlist-count-badge ms-1">0</span>
                        </a>
                        <button type="button" class="btn btn-outline-primary flex-fill py-2 small fw-semibold position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart">
                            <i class="fa fa-shopping-cart me-1"></i> Cart
                            <span class="badge bg-primary rounded-pill cart-count-badge ms-1">0</span>
                        </button>
                    </div>

                    <!-- Mobile User Profile & Logout -->
                    <div class="d-lg-none mt-2 border-top pt-3">
                        @auth
                            @php
                                $nameParts = explode(' ', trim(Auth::user()->name));
                                $initials = strtoupper(substr($nameParts[0], 0, 1));
                                if (count($nameParts) > 1) {
                                    $initials .= strtoupper(substr(end($nameParts), 0, 1));
                                }
                            @endphp
                            <div class="d-flex align-items-center justify-content-between px-3 mb-3">
                                <a href="{{ route('frontend.dashboard.profile') }}" class="text-decoration-none d-flex align-items-center bg-light rounded p-2 border flex-grow-1 me-2 shadow-sm">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle" style="width: 36px; height: 36px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; font-size: 14px;">
                                            {{ $initials }}
                                        </div>
                                    @endif
                                    <div class="ms-3 d-flex flex-column">
                                        <span class="text-dark fw-bold" style="font-size: 14px;">{{ Auth::user()->name }}</span>
                                        <small class="text-muted" style="font-size: 11px;">View Profile</small>
                                    </div>
                                </a>
                                <form action="{{ route('frontend.auth.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-white rounded shadow-sm d-flex align-items-center justify-content-center" style="height: 55px; width: 55px;" title="Logout">
                                        <i class="fa fa-sign-out-alt fs-5"></i>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="px-3 mb-3">
                                <a href="{{ route('frontend.auth.login') }}" class="btn btn-primary w-100 py-3 shadow-sm rounded fw-bold"><i class="fa fa-user me-2"></i>Login / Register</a>
                            </div>
                        @endauth
                    </div>
                </div>
        
                        <!-- Desktop Header Actions: Wishlist, Cart & Quote -->
                        <div class="ms-auto d-none d-lg-flex align-items-center gap-2">
                            <!-- Wishlist Icon Button -->
                            <a href="{{ route('wishlist.index') }}" class="btn btn-light rounded-circle position-relative p-2 text-danger border shadow-2xs" style="width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center;" title="View Wishlist">
                                <i class="fa fa-heart fs-6"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger wishlist-count-badge" style="font-size: 0.68rem;">
                                    0
                                </span>
                            </a>

                            <!-- Cart Icon Button (Triggers Offcanvas Drawer) -->
                            <button type="button" class="btn btn-light rounded-circle position-relative p-2 text-primary border shadow-2xs" style="width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" title="View Cart">
                                <i class="fa fa-shopping-cart fs-6"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary cart-count-badge" style="font-size: 0.68rem;">
                                    0
                                </span>
                            </button>

                            <a href="{{ route('appointment.index') }}" class="btn btn-primary py-2 px-3 fw-semibold ms-2">Get A Quote</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.dropdown-submenu > a.dropdown-toggle');
    let activeSubmenu = null; // Track the currently active submenu

    dropdownToggles.forEach(toggle => {
        // Hover behavior for desktop
        toggle.addEventListener('mouseenter', function () {
            const isDesktop = window.innerWidth >= 992;
            if (isDesktop) {
                const submenu = this.nextElementSibling;
                const parentSubmenu = this.closest('.dropdown-submenu');

                // Close the previously active submenu
                if (activeSubmenu && activeSubmenu !== parentSubmenu) {
                    activeSubmenu.classList.remove('active');
                    activeSubmenu.querySelector('.dropdown-menu').classList.remove('show');
                }

                // Show the current submenu and mark it as active
                submenu.classList.add('show');
                parentSubmenu.classList.add('active');
                activeSubmenu = parentSubmenu;
            }
        });

        // Click behavior for redirect and mobile toggle
        toggle.addEventListener('click', function (e) {
            const submenu = this.nextElementSibling;
            const parentSubmenu = this.closest('.dropdown-submenu');
            const href = this.getAttribute('href');
            const isDesktop = window.innerWidth >= 992;

            if (isDesktop) {
                // On desktop: redirect immediately on click
                if (href && href !== '#') {
                    window.location.href = href;
                }
            } else {
                // On mobile: toggle submenu on click
                e.preventDefault();
                e.stopPropagation();

                const isShown = submenu.classList.contains('show');

                // Close all other submenus within the same parent dropdown
                const parentDropdownMenu = this.closest('.dropdown-menu');
                const allSubmenus = parentDropdownMenu.querySelectorAll('.dropdown-submenu .dropdown-menu');
                const allSubmenuContainers = parentDropdownMenu.querySelectorAll('.dropdown-submenu');
                allSubmenus.forEach(sub => {
                    if (sub !== submenu) {
                        sub.classList.remove('show');
                    }
                });
                allSubmenuContainers.forEach(container => {
                    if (container !== parentSubmenu) {
                        container.classList.remove('show');
                    }
                });

                // Toggle the current submenu
                submenu.classList.toggle('show', !isShown);
                parentSubmenu.classList.toggle('show', !isShown);
            }
        });

        // Add click event to redirect when clicking the category text (not the toggle)
        toggle.addEventListener('click', function (e) {
            const isDesktop = window.innerWidth >= 992;
            if (!isDesktop) {
                // On mobile, if the submenu is open, redirect on second click
                const submenu = this.nextElementSibling;
                const isShown = submenu.classList.contains('show');
                const href = this.getAttribute('href');

                if (isShown && href && href !== '#') {
                    window.location.href = href;
                }
            }
        });
    });

    // Close submenu when clicking anywhere else on the page
    document.addEventListener('click', function (e) {
        const dropdownMenu = e.target.closest('.dropdown-menu');
        const navbarToggler = e.target.closest('.navbar-toggler');
        if (!dropdownMenu && !navbarToggler) {
            // If click is outside the dropdown menu and not on the toggler, close all submenus
            const allSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-menu');
            const allSubmenuContainers = document.querySelectorAll('.dropdown-submenu');
            allSubmenus.forEach(submenu => {
                submenu.classList.remove('show');
            });
            allSubmenuContainers.forEach(container => {
                container.classList.remove('active');
                container.classList.remove('show');
            });
            activeSubmenu = null;
        }
    });

    // Close all submenus when the parent dropdown is hidden
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('hide.bs.dropdown', function () {
            const submenus = dropdown.querySelectorAll('.dropdown-menu.show');
            const submenuContainers = dropdown.querySelectorAll('.dropdown-submenu');
            submenus.forEach(submenu => {
                submenu.classList.remove('show');
            });
            submenuContainers.forEach(container => {
                container.classList.remove('show');
                container.classList.remove('active');
            });
            activeSubmenu = null;
        });
    });

    // Ensure submenu items are clickable
    document.querySelectorAll('.dropdown-item:not(.dropdown-toggle)[href]').forEach(item => {
        item.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href !== '#') {
                window.location.href = href;
            }
        });
    });

    // ==========================================
    // MEGA-MENU (SERVICES & PRODUCTS) DESKTOP & MOBILE INTERACTIONS
    // ==========================================
    // Desktop: Scope hover tab switching to each mega menu separately
    document.querySelectorAll('.mega-menu-desktop').forEach(menu => {
        const catBtns = menu.querySelectorAll('.mega-cat-btn');
        const panes = menu.querySelectorAll('.mega-pane');

        catBtns.forEach(btn => {
            // Switch tabs on hover
            btn.addEventListener('mouseenter', function () {
                const paneId = this.getAttribute('data-pane');
                catBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                panes.forEach(pane => {
                    pane.classList.remove('active');
                });
                const targetPane = menu.querySelector('#' + paneId);
                if (targetPane) {
                    targetPane.classList.add('active');
                }
            });

            // Click to navigate to category page directly
            btn.addEventListener('click', function (e) {
                const url = this.getAttribute('data-url');
                if (url && url !== '#') {
                    window.location.href = url;
                }
            });
        });
    });

    // Mobile: Scope Category Accordion Handlers to each mobile mega menu
    document.querySelectorAll('.mega-menu-mobile').forEach(mobileMenu => {
        const mobileCatHeaders = mobileMenu.querySelectorAll('.mega-mobile-cat-header');
        mobileCatHeaders.forEach(header => {
            header.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const targetId = this.getAttribute('data-target');
                const targetBody = mobileMenu.querySelector(targetId);
                const isShown = targetBody && targetBody.classList.contains('show');

                mobileCatHeaders.forEach(h => {
                    h.classList.remove('active');
                    const tId = h.getAttribute('data-target');
                    const tBody = mobileMenu.querySelector(tId);
                    if (tBody) tBody.classList.remove('show');
                });

                if (!isShown && targetBody) {
                    this.classList.add('active');
                    targetBody.classList.add('show');
                }
            });
        });
    });

    // Desktop: Allow clicking main Mega-Menu Nav links (Services / Products) to navigate directly
    document.querySelectorAll('#servicesMegaMenuToggle, #productsMegaMenuToggle').forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            if (window.innerWidth >= 992) {
                const href = this.getAttribute('href');
                if (href && href !== '#' && href !== 'javascript:;') {
                    window.location.href = href;
                }
            }
        });
    });
});
</script>
