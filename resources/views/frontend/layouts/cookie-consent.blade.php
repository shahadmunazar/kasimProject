<!-- ============================================== -->
<!-- COOKIE & TERMS CONSENT BANNER (DPDP & IT ACT COMPLIANT) -->
<!-- ============================================== -->
<style>
    .tc-cookie-banner {
        position: fixed;
        bottom: 24px;
        left: 50%;
        transform: translate(-50%, 120%);
        width: calc(100% - 32px);
        max-width: 980px;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.22), 0 6px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(223, 155, 21, 0.28);
        z-index: 10995;
        padding: 22px 26px;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;
        opacity: 0;
        pointer-events: none;
    }
    .tc-cookie-banner.show {
        transform: translate(-50%, 0);
        opacity: 1;
        pointer-events: auto;
    }
    .tc-cookie-icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(223, 155, 21, 0.12);
        color: var(--bs-primary, #df9b15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .tc-cookie-preferences-panel {
        display: none;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px dashed #e2e8f0;
    }
    .tc-cookie-pref-item {
        background: #f8fafc;
        border-radius: 10px;
        padding: 12px 14px;
        border: 1px solid #e2e8f0;
    }
    @media (max-width: 767.98px) {
        .tc-cookie-banner {
            bottom: 12px;
            width: calc(100% - 20px);
            padding: 18px;
            border-radius: 14px;
        }
    }
</style>

<div id="tcCookieConsentBanner" class="tc-cookie-banner" role="dialog" aria-labelledby="tcCookieTitle" aria-describedby="tcCookieDesc">
    <div class="d-flex flex-column flex-md-row align-items-start gap-3">
        <div class="tc-cookie-icon-wrap d-none d-sm-flex">
            <i class="fa fa-cookie-bite"></i>
        </div>

        <div class="flex-grow-1">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <h6 id="tcCookieTitle" class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa fa-cookie-bite text-primary d-sm-none"></i> We Value Your Privacy &amp; Cookies Choices
                </h6>
                <span class="badge bg-primary-subtle text-primary extra-small rounded-pill px-2 py-1">DPDP &amp; IT Act 2026</span>
            </div>

            <p id="tcCookieDesc" class="text-secondary small mb-2" style="font-size: 0.84rem; line-height: 1.6;">
                TC Smart Technology uses strictly necessary session cookies, functional cart tracking, and analytics to optimize your experience, secure order transactions, and compute regional shipping. By clicking <strong>"Accept All"</strong>, you agree to our 
                <a href="{{ route('terms.conditions') }}" target="_blank" class="text-primary text-decoration-underline fw-semibold">Terms &amp; Conditions</a>, 
                <a href="{{ route('privacy.policy') }}" target="_blank" class="text-primary text-decoration-underline fw-semibold">Privacy Policy</a>, and 
                <a href="{{ route('return.policy') }}" target="_blank" class="text-primary text-decoration-underline fw-semibold">Return Policy</a>.
            </p>

            <!-- Optional Granular Preferences Panel -->
            <div id="tcCookiePrefPanel" class="tc-cookie-preferences-panel">
                <div class="row g-2 mb-2">
                    <div class="col-md-4">
                        <div class="tc-cookie-pref-item h-100">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <strong class="small text-dark">Essential Cookies</strong>
                                <span class="badge bg-secondary extra-small">Always Active</span>
                            </div>
                            <p class="text-muted extra-small mb-0">CSRF security token (<code>XSRF-TOKEN</code>) and session authentication (<code>laravel_session</code>).</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tc-cookie-pref-item h-100">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <strong class="small text-dark">Functional &amp; Cart</strong>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" id="tcPrefFunctional" checked>
                                </div>
                            </div>
                            <p class="text-muted extra-small mb-0">Retains shopping cart products, wishlist items, and recently viewed products.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tc-cookie-pref-item h-100">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <strong class="small text-dark">Regional Analytics</strong>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" id="tcPrefAnalytics" checked>
                                </div>
                            </div>
                            <p class="text-muted extra-small mb-0">Computes regional pincode delivery charges and prevents fraudulent checkouts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex flex-row flex-md-column gap-2 align-self-stretch align-self-md-center justify-content-end" style="min-width: 190px;">
            <button type="button" class="btn btn-primary btn-sm px-3 py-2 rounded-pill fw-bold text-uppercase w-100 shadow-sm" onclick="tcHandleConsent('all')">
                Accept All
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-pill fw-semibold w-100" onclick="tcHandleConsent('essential')">
                Essential Only
            </button>
            <button type="button" class="btn btn-link text-muted extra-small text-decoration-none py-1 text-center w-100" id="tcPrefToggleBtn" onclick="tcTogglePreferences()">
                Customize <i class="fa fa-chevron-down ms-1" id="tcPrefChevron"></i>
            </button>
        </div>
    </div>
</div>

<script>
    (function() {
        const CONSENT_STORAGE_KEY = 'tc_cookie_consent_v1';
        const banner = document.getElementById('tcCookieConsentBanner');
        const prefPanel = document.getElementById('tcCookiePrefPanel');
        const prefChevron = document.getElementById('tcPrefChevron');

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        }

        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/;SameSite=Lax`;
        }

        function hasUserConsented() {
            return localStorage.getItem(CONSENT_STORAGE_KEY) !== null || getCookie(CONSENT_STORAGE_KEY) !== null;
        }

        // Show banner if not yet consented
        window.addEventListener('DOMContentLoaded', function() {
            if (!hasUserConsented()) {
                setTimeout(function() {
                    if (banner) banner.classList.add('show');
                }, 700);
            }
        });

        // Toggle Granular Preferences
        window.tcTogglePreferences = function() {
            if (!prefPanel) return;
            const isVisible = prefPanel.style.display === 'block';
            prefPanel.style.display = isVisible ? 'none' : 'block';
            if (prefChevron) {
                prefChevron.className = isVisible ? 'fa fa-chevron-down ms-1' : 'fa fa-chevron-up ms-1';
            }
        };

        // Handle Consent Submission
        window.tcHandleConsent = function(mode) {
            const consentData = {
                status: mode,
                timestamp: new Date().toISOString(),
                functional: mode === 'all' || (document.getElementById('tcPrefFunctional')?.checked ?? false),
                analytics: mode === 'all' || (document.getElementById('tcPrefAnalytics')?.checked ?? false)
            };

            try {
                localStorage.setItem(CONSENT_STORAGE_KEY, JSON.stringify(consentData));
                setCookie(CONSENT_STORAGE_KEY, mode, 365);
            } catch (e) {
                setCookie(CONSENT_STORAGE_KEY, mode, 365);
            }

            if (banner) {
                banner.classList.remove('show');
            }

            // Optional custom event for analytics integration
            window.dispatchEvent(new CustomEvent('tc_cookie_consent_saved', { detail: consentData }));
        };

        // Global function to re-open cookie preferences from footer or policy pages
        window.tcOpenCookieSettings = function() {
            if (banner) {
                banner.classList.add('show');
                if (prefPanel) {
                    prefPanel.style.display = 'block';
                    if (prefChevron) prefChevron.className = 'fa fa-chevron-up ms-1';
                }
            }
        };
    })();
</script>
