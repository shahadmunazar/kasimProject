@extends('frontend.layouts.main')

@section('meta_title', 'MLM and Network Marketing Software | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'MLM and Network Marketing Software',
        'breadcrumb' => ['Services', 'MLM Software']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">MLM Software by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology offers scalable MLM and Network Marketing Software to streamline direct selling, affiliate commissions, and distributor networks. Our solutions support diverse compensation plans with real-time analytics and secure operations.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
<img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/MLM and Network Marketing Software.png" alt="MLM Software by TC Smart Technology" style="width: 100%; height: 550px; object-fit: cover;">                  </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we provide customizable MLM software with support for all major compensation plans, secure payment integrations, and multi-language capabilities. Our platforms ensure scalability, compliance, and 24/7 uptime for global direct selling businesses.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-sitemap fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Customizable Plans</h4>
                        <p class="text-muted">
                            Support for Binary, Unilevel, Matrix, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Secure Operations</h4>
                        <p class="text-muted">
                            Compliant with local and international regulations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-chart-bar fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Real-Time Analytics</h4>
                        <p class="text-muted">
                            Track performance with advanced reporting tools.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Features Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Features of Our MLM Software</h2>
                <p class="lead text-muted">
                    Comprehensive tools to manage and scale your MLM business.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom MLM Plans</h5>
                        <p class="text-muted">
                            Tailored Binary, Unilevel, Matrix, and Hybrid plans.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Member Dashboard</h5>
                        <p class="text-muted">
                            View earnings, referrals, and genealogy tree.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Automated Payouts</h5>
                        <p class="text-muted">
                            Daily, weekly, or monthly commission calculations.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Genealogy Tree</h5>
                        <p class="text-muted">
                            Real-time view of downline network and activity.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">E-Wallet System</h5>
                        <p class="text-muted">
                            Secure fund transfers and transaction management.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Admin Control Panel</h5>
                        <p class="text-muted">
                            Full control over users, payouts, and plans.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Features Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Additional Features</h2>
                <p class="lead text-muted">
                    Enhance your MLM operations with advanced tools.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Marketing Tools:</strong> Referral links and email campaigns.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Multi-Currency:</strong> Global support for payments.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Multi-Language:</strong> Localized for international markets.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Mobile Access:</strong> Android and iOS apps available.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>White-Label:</strong> Custom branding for your business.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cloud Support:</strong> 24/7 uptime with secure hosting.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Health & Wellness:</strong> MLM for product sales.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cryptocurrency:</strong> Token-based MLM systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>E-commerce:</strong> Affiliate and direct selling.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Highlights Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Highlights</h2>
                <p class="lead text-muted">
                    Advanced technologies powering our MLM software.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Frameworks:</strong> Laravel, NodeJS, ReactJS.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cloud Hosting:</strong> AWS, Azure, Google Cloud.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Security:</strong> Encrypted transactions and secure APIs.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Integrations:</strong> Payment gateways, SMS, email.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scalability:</strong> Supports millions of users.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Analytics:</strong> Real-time performance reports.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service & Support Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End Support</h2>
                <p class="lead text-muted">
                    From deployment to ongoing maintenance, we’re your MLM partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
<img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Software Health APP.png" alt="End-to-End Support of MLM Software" style="width: 100%; height: 550px; object-fit: cover;">                  </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Deployment</h5>
                        <p class="text-muted">
                            Quick setup with custom configurations.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">User Training</h5>
                        <p class="text-muted">
                            Comprehensive training for platform management.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Ongoing support for updates and optimization.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose Our MLM Software?</h2>
                <p class="lead text-muted">
                    Scale your direct selling business with powerful tools.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Architecture</h5>
                        <p class="text-muted">
                            Supports small to enterprise-level networks.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Secure Transactions</h5>
                        <p class="text-muted">
                            Compliant and encrypted payment systems.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Global Reach</h5>
                        <p class="text-muted">
                            Multi-currency and language support.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Branding</h5>
                        <p class="text-muted">
                            White-label solutions for your brand.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Grow Your MLM Business Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to streamline your direct selling operations? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free demo.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-light py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="container-fluid bg-light py-3">
        <div class="container text-center">
            <p class="text-muted mb-0">
                <strong>Contact Information:</strong> Email: <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> | Location: Delhi NCR - Noida
            </p>
        </div>
    </div>
@endsection

<style>
/* Color Combination from Provided Artifact */
.container-fluid.bg-primary {
    background: linear-gradient(135deg, #ce9233, #ce9233);
}
.btn-primary {
    background-color: #d81b60;
    border-color: #d81b60;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-primary:hover {
    background-color: #ad1457;
    border-color: #ad1457;
    transform: scale(1.05);
}
.bg-light {
    background-color: #f5f5f5 !important;
}
.card, .bg-white {
    background-color: #ffffff;
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover, .bg-white:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
img.rounded {
    transition: opacity 0.3s;
}
img.rounded:hover {
    opacity: 0.9;
}
h1.display-4, h2.display-5 {
    font-weight: 700;
    color: #333333;
}
.text-muted {
    color: #666666 !important;
}
.text-primary {
    color: #d81b60 !important;
}
.btn-light {
    color: #333333;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-light:hover {
    background-color: #e0e0e0;
    transform: scale(1.05);
}
</style>
