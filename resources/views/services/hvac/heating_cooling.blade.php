@extends('frontend.layouts.main')

@section('meta_title', 'Comprehensive Heating & Cooling Solutions | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Heating & Cooling Solutions',
        'breadcrumb' => ['Services', 'Heating & Cooling']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Heating & Cooling by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology offers tailored heating and cooling solutions with top industry brands. Our energy-efficient systems ensure optimal comfort, reliability, and seamless integration with BMS for all your residential, commercial, or industrial needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC.jpg" alt="Heating & Cooling by TC Smart Technology" style="width: 100%; height: 500px; object-fit: cover;">                  </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we partner with leading global and Indian brands to deliver customized, energy-efficient HVAC solutions. Our turnkey approach and BMS integration ensure optimal performance and reliability for your spaces.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Energy Efficiency</h4>
                        <p class="text-muted">
                            High-efficiency systems to reduce costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Seamless Integration</h4>
                        <p class="text-muted">
                            BMS-compatible solutions for automation.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Turnkey Solutions</h4>
                        <p class="text-muted">
                            From design to commissioning.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Equipment Portfolio Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Equipment Portfolio</h2>
                <p class="lead text-muted">
                    High-quality heating and cooling systems from top brands.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Air Conditioners</h5>
                        <p class="text-muted">
                            Split, cassette, ducted, and window ACs from Daikin, Voltas, LG, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Chillers</h5>
                        <p class="text-muted">
                            Air-cooled and water-cooled chillers from Trane, Carrier, Kirloskar, and others.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Air Handling Units</h5>
                        <p class="text-muted">
                            Custom and modular AHUs from Systemair, Zeco, Blue Star, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Fan Coil Units</h5>
                        <p class="text-muted">
                            Ceiling, wall, and floor units from Carrier, Trane, Voltas, and others.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">VRF/VRV Systems</h5>
                        <p class="text-muted">
                            Multi-zone systems from Daikin, Mitsubishi Electric, LG, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Heating Systems</h5>
                        <p class="text-muted">
                            Heat pumps and boilers from Thermax, Bosch, and others.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Features Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Features of Our Solutions</h2>
                <p class="lead text-muted">
                    Tailored systems for optimal performance and efficiency.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Optimal Comfort:</strong> Precise temperature and humidity control.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Efficiency:</strong> High-efficiency equipment to lower costs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Reliability:</strong> Durable systems from trusted brands.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Diverse Options:</strong> Solutions for all building types.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Integration:</strong> Enhanced control and automation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Turnkey Delivery:</strong> End-to-end project management.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Top Brands:</strong> Daikin, Trane, Voltas, and more.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Expert Design:</strong> Tailored to your energy goals.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Unbiased Advice:</strong> Brand-agnostic recommendations.</li>
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
                    Advanced HVAC solutions for diverse applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Brand Portfolio:</strong> Daikin, Mitsubishi, Voltas, Trane.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>System Types:</strong> VRF, chillers, AHUs, FCUs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Applications:</strong> Residential, commercial, industrial.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Focus:</strong> High-efficiency designs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Compatibility:</strong> Seamless control integration.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Turnkey Service:</strong> Supply to commissioning.</li>
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
                    From system design to ongoing performance, we’re your HVAC partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC(1).png" alt="system design to ongoing performance" style="width: 100%; height: 580px; object-fit: cover;">                    </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Expert Design</h5>
                        <p class="text-muted">
                            Tailored solutions for your needs.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-cogs fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Installation</h5>
                        <p class="text-muted">
                            Professional setup and commissioning.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Reliable Support</h5>
                        <p class="text-muted">
                            Ongoing assistance for performance.
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
                <h2 class="display-5 mb-3">Why Choose Our HVAC Solutions?</h2>
                <p class="lead text-muted">
                    Optimize comfort and efficiency with industry-leading systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Top Brands</h5>
                        <p class="text-muted">
                            Access to Daikin, Trane, Voltas, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Savings</h5>
                        <p class="text-muted">
                            Efficient systems to reduce costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Designs</h5>
                        <p class="text-muted">
                            Tailored to your specific needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reliable Systems</h5>
                        <p class="text-muted">
                            Durable equipment for long-term performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Transform Your Space Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to upgrade your heating and cooling systems? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
/* Color Combination from Previous Artifacts */
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
