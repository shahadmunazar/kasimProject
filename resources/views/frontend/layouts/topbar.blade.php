<!-- TOPBAR STYLES & RESPONSIVE ARCHITECTURE -->
<style>
    .topbar-wrapper {
        background-color: var(--bs-primary, #df9b15);
        color: #ffffff;
        font-size: 0.82rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        position: relative;
        z-index: 1020;
    }

    .topbar-brand {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #ffffff;
        flex-shrink: 0;
        transition: opacity 0.2s ease;
    }
    .topbar-brand:hover {
        opacity: 0.95;
        color: #ffffff;
    }
    .topbar-brand-title {
        font-weight: 900;
        line-height: 1.05;
        font-size: 1.45rem;
        letter-spacing: -0.5px;
        margin: 0;
        color: #ffffff;
    }
    .topbar-brand-subtitle {
        font-weight: 800;
        font-size: 1.15rem;
        letter-spacing: 0.5px;
    }

    .topbar-divider {
        width: 1px;
        height: 22px;
        background-color: rgba(255, 255, 255, 0.25);
        margin: 0 8px;
        flex-shrink: 0;
    }

    .topbar-icon-badge {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        flex-shrink: 0;
        color: #ffffff;
    }

    .topbar-link {
        color: #ffffff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }
    .topbar-link:hover {
        color: #f8fafc;
        transform: translateY(-1px);
        text-decoration: none;
    }
    .topbar-link:hover .topbar-icon-badge {
        background: rgba(255, 255, 255, 0.35);
    }

    .topbar-address-text {
        max-width: 280px;
        line-height: 1.25;
        font-size: 0.76rem;
        color: rgba(255, 255, 255, 0.95);
        margin: 0;
    }

    .topbar-social-btn {
        width: 28px;
        height: 28px;
        border-radius: 6px;
        background: #ffffff;
        color: var(--bs-primary, #df9b15);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        text-decoration: none;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    .topbar-social-btn:hover {
        background: #ffffff;
        color: #0f172a;
        transform: translateY(-2px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }

    .topbar-user-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 32px;
        padding: 2px 10px 2px 3px;
        background: #ffffff;
        border-radius: 20px;
        text-decoration: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    .topbar-user-pill:hover {
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.18);
        transform: translateY(-1px);
    }
    .topbar-user-avatar {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        object-fit: cover;
    }
    .topbar-avatar-initials {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--bs-primary, #df9b15);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.76rem;
    }
    .topbar-user-name {
        color: #1e293b;
        font-weight: 700;
        font-size: 0.8rem;
        white-space: nowrap;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .topbar-logout-btn {
        height: 32px;
        width: 32px;
        border-radius: 6px;
        background: #dc3545;
        color: #ffffff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.82rem;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        flex-shrink: 0;
    }
    .topbar-logout-btn:hover {
        background: #b02a37;
        transform: translateY(-1px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    .topbar-login-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        height: 32px;
        padding: 0 12px;
        background: #ffffff;
        color: var(--bs-primary, #df9b15);
        border-radius: 20px;
        font-size: 0.78rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    .topbar-login-pill:hover {
        color: #0f172a;
        transform: translateY(-1px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }

    /* Screen-specific layout adjustments */
    @media (min-width: 1200px) {
        .topbar-desktop-single-row {
            display: flex !important;
        }
        .topbar-medium-two-row {
            display: none !important;
        }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
        .topbar-desktop-single-row {
            display: none !important;
        }
        .topbar-medium-two-row {
            display: block !important;
        }
    }
</style>

<!-- ========================================== -->
<!-- 1. LARGE DESKTOP VIEW (Width >= 1200px)     -->
<!-- ========================================== -->
<div class="topbar-wrapper d-none d-xl-block py-2">
    <div class="container-fluid px-3 px-xxl-5">
        <div class="d-flex align-items-center justify-content-between flex-nowrap">
            
            <!-- Left: Brand + Address -->
            <div class="d-flex align-items-center flex-shrink-0">
                <a href="{{ route('home.index') }}" class="topbar-brand me-3 me-xxl-4" title="TC SMART">
                    <h2 class="topbar-brand-title">TC<br><span class="topbar-brand-subtitle">SMART</span></h2>
                </a>

                <div class="d-flex align-items-center text-white">
                    <div class="topbar-icon-badge me-2" title="Location">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <p class="topbar-address-text">
                        B-598, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025
                    </p>
                </div>
            </div>

            <!-- Right: Contact, Socials, Account -->
            <div class="d-flex align-items-center gap-2 gap-xxl-3 ms-auto flex-nowrap">
                <a href="mailto:info@tcsmarttechnology.com" class="topbar-link" title="Email info@tcsmarttechnology.com">
                    <div class="topbar-icon-badge">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <span>info@tcsmarttechnology.com</span>
                </a>

                <a href="mailto:tcsmarttechnology@gmail.com" class="topbar-link d-none d-xxl-inline-flex" title="Email tcsmarttechnology@gmail.com">
                    <div class="topbar-icon-badge">
                        <i class="fa fa-envelope-open"></i>
                    </div>
                    <span>tcsmarttechnology@gmail.com</span>
                </a>

                <div class="topbar-divider"></div>

                <a href="tel:+917065122884" class="topbar-link" title="Call Us">
                    <div class="topbar-icon-badge">
                        <i class="fa fa-phone-alt"></i>
                    </div>
                    <span class="fw-semibold text-nowrap">+91-7065122884</span>
                </a>

                <div class="topbar-divider"></div>

                <div class="d-flex align-items-center gap-1">
                    <a class="topbar-social-btn" href="https://www.facebook.com/share/12L536bcJdV/?mibextid=wwXIfr" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="topbar-social-btn" href="https://www.instagram.com/tc_smart_technology?igsh=a2s2MWNoNGNvdTU1" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="topbar-social-btn" href="https://www.linkedin.com/company/tc-smart-technology/" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>

                <div class="topbar-divider"></div>

                <div class="d-flex align-items-center gap-2">
                    @auth
                        @php
                            $nameParts = explode(' ', trim(Auth::user()->name));
                            $initials = strtoupper(substr($nameParts[0], 0, 1));
                            if (count($nameParts) > 1) {
                                $initials .= strtoupper(substr(end($nameParts), 0, 1));
                            }
                        @endphp
                        <a href="{{ route('frontend.dashboard.profile') }}" title="My Profile" class="topbar-user-pill">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="topbar-user-avatar" alt="{{ Auth::user()->name }}">
                            @else
                                <div class="topbar-avatar-initials">
                                    {{ $initials }}
                                </div>
                            @endif
                            <span class="topbar-user-name">{{ $nameParts[0] }}</span>
                        </a>

                        <form action="{{ route('frontend.auth.logout') }}" method="POST" class="d-inline m-0 p-0">
                            @csrf
                            <button type="submit" class="topbar-logout-btn" title="Sign Out">
                                <i class="fa fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('frontend.auth.login') }}" class="topbar-login-pill" title="Sign In / Register">
                            <i class="fa fa-user"></i>
                            <span>Sign In</span>
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ====================================================== -->
<!-- 2. LAPTOP / MEDIUM DESKTOP VIEW (Width 992px - 1199px) -->
<!-- ====================================================== -->
<div class="topbar-wrapper d-none d-lg-block d-xl-none py-2">
    <div class="container-fluid px-3">
        <!-- Row 1: Quick Contacts, Socials & User Profile -->
        <div class="d-flex align-items-center justify-content-between pb-1 mb-1 border-bottom border-white border-opacity-10">
            <div class="d-flex align-items-center gap-3">
                <a href="tel:+917065122884" class="topbar-link" title="Call Us">
                    <i class="fa fa-phone-alt opacity-75"></i>
                    <span class="fw-semibold text-nowrap">+91-7065122884</span>
                </a>
                <a href="mailto:info@tcsmarttechnology.com" class="topbar-link" title="Email Us">
                    <i class="fa fa-envelope opacity-75"></i>
                    <span class="text-nowrap">info@tcsmarttechnology.com</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="d-flex align-items-center gap-1">
                    <a class="topbar-social-btn" href="https://www.facebook.com/share/12L536bcJdV/?mibextid=wwXIfr" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="topbar-social-btn" href="https://www.instagram.com/tc_smart_technology?igsh=a2s2MWNoNGNvdTU1" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="topbar-social-btn" href="https://www.linkedin.com/company/tc-smart-technology/" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>

                <div class="topbar-divider"></div>

                @auth
                    @php
                        $nameParts = explode(' ', trim(Auth::user()->name));
                        $initials = strtoupper(substr($nameParts[0], 0, 1));
                        if (count($nameParts) > 1) {
                            $initials .= strtoupper(substr(end($nameParts), 0, 1));
                        }
                    @endphp
                    <a href="{{ route('frontend.dashboard.profile') }}" title="My Profile" class="topbar-user-pill">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="topbar-user-avatar" alt="{{ Auth::user()->name }}">
                        @else
                            <div class="topbar-avatar-initials">
                                {{ $initials }}
                            </div>
                        @endif
                        <span class="topbar-user-name">{{ $nameParts[0] }}</span>
                    </a>
                    <form action="{{ route('frontend.auth.logout') }}" method="POST" class="d-inline m-0 p-0">
                        @csrf
                        <button type="submit" class="topbar-logout-btn" title="Sign Out">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('frontend.auth.login') }}" class="topbar-login-pill" title="Sign In / Register">
                        <i class="fa fa-user"></i>
                        <span>Sign In</span>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Row 2: Brand + Address -->
        <div class="d-flex align-items-center justify-content-between pt-1">
            <a href="{{ route('home.index') }}" class="topbar-brand" title="TC SMART">
                <h2 class="topbar-brand-title" style="font-size: 1.35rem;">TC <span class="topbar-brand-subtitle">SMART</span></h2>
            </a>

            <div class="d-flex align-items-center text-white ms-auto">
                <i class="fa fa-map-marker-alt me-2 opacity-75"></i>
                <span class="small" style="font-size: 0.78rem;">
                    B-598, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025
                </span>
            </div>
        </div>
    </div>
</div>

<!-- ============================================== -->
<!-- 3. TABLET & MOBILE VIEW (Width < 992px)       -->
<!-- ============================================== -->
<div class="topbar-wrapper d-block d-lg-none py-1">
    <div class="container-fluid px-2 px-sm-3">
        <!-- Main Mobile Row: Phone on left, Socials + Sign In / Profile on right -->
        <div class="d-flex align-items-center justify-content-between gap-1">
            <div class="d-flex align-items-center">
                <a href="tel:+917065122884" class="topbar-link text-white" title="Call Us">
                    <i class="fa fa-phone-alt small"></i>
                    <span class="fw-semibold text-nowrap" style="font-size: 0.76rem;">+91-7065122884</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-1 gap-sm-2">
                <!-- Social Icons on Mobile -->
                <div class="d-flex align-items-center gap-1">
                    <a class="topbar-social-btn" style="width: 22px; height: 22px; font-size: 0.65rem;" href="https://www.facebook.com/share/12L536bcJdV/?mibextid=wwXIfr" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="topbar-social-btn" style="width: 22px; height: 22px; font-size: 0.65rem;" href="https://www.instagram.com/tc_smart_technology?igsh=a2s2MWNoNGNvdTU1" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="topbar-social-btn" style="width: 22px; height: 22px; font-size: 0.65rem;" href="https://www.linkedin.com/company/tc-smart-technology/" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>

                <div class="topbar-divider" style="height: 16px; margin: 0 1px;"></div>

                <!-- Sign In / User Profile -->
                @auth
                    @php
                        $nameParts = explode(' ', trim(Auth::user()->name));
                        $initials = strtoupper(substr($nameParts[0], 0, 1));
                        if (count($nameParts) > 1) {
                            $initials .= strtoupper(substr(end($nameParts), 0, 1));
                        }
                    @endphp
                    <a href="{{ route('frontend.dashboard.profile') }}" title="My Profile" class="topbar-user-pill" style="height: 26px; padding: 1px 7px 1px 2px;">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" style="width: 22px; height: 22px; border-radius: 50%; object-fit: cover;">
                        @else
                            <div style="width: 22px; height: 22px; border-radius: 50%; background: var(--bs-primary, #df9b15); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.68rem; font-weight: 700;">
                                {{ $initials }}
                            </div>
                        @endif
                        <span class="topbar-user-name" style="font-size: 0.74rem; max-width: 65px;">{{ $nameParts[0] }}</span>
                    </a>
                    <form action="{{ route('frontend.auth.logout') }}" method="POST" class="d-inline m-0 p-0">
                        @csrf
                        <button type="submit" class="topbar-logout-btn" style="height: 26px; width: 26px; font-size: 0.7rem;" title="Sign Out">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('frontend.auth.login') }}" class="topbar-login-pill" style="height: 26px; padding: 0 9px; font-size: 0.72rem;" title="Sign In">
                        <i class="fa fa-user"></i>
                        <span>Sign In</span>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Row 2: Address & Email (visible on tablets/wider screens, hidden on phones) -->
        <div class="d-none d-sm-flex align-items-center justify-content-between pt-1 mt-1 border-top border-white border-opacity-10">
            <div class="d-flex align-items-center text-white text-opacity-90 pe-2" style="font-size: 0.72rem; line-height: 1.2;">
                <i class="fa fa-map-marker-alt me-1 text-white"></i>
                <span>B-598, Pocket 11, Jasola Vihar, New Delhi – 110025</span>
            </div>
            <a href="mailto:info@tcsmarttechnology.com" class="topbar-link text-white" title="Email Us">
                <i class="fa fa-envelope small"></i>
                <span class="text-nowrap" style="font-size: 0.74rem;">info@tcsmarttechnology.com</span>
            </a>
        </div>
    </div>
</div>
