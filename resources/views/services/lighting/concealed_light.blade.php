@extends('frontend.layouts.main')

@section('meta_title', 'HVAC Maintenance & Annual Maintenance Contracts | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HVAC Maintenance & AMC Services',
        'breadcrumb' => ['Services', 'HVAC Maintenance']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">HVAC Maintenance by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology offers comprehensive HVAC Maintenance and Annual Maintenance Contract (AMC) services to ensure optimal performance, energy efficiency, and longevity of your HVAC systems. Protect your investment with our proactive care.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hvac-maintenance.jpg') }}" alt="HVAC maintenance technician at work" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we provide tailored HVAC maintenance and AMC services with a focus on reliability, efficiency, and longevity. Our skilled technicians and BMS integration expertise ensure your systems run smoothly with minimal downtime.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Energy Efficiency</h4>
                        <p class="text-muted">
                            Maintain peak performance to reduce utility costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Proactive Care</h4>
                        <p class="text-muted">
                            Prevent issues with regular maintenance.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Reliable Support</h4>
                        <p class="text-muted">
                            Prompt service and customized AMC plans.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Benefits of HVAC Maintenance</h2>
                <p class="lead text-muted">
                    Ensure reliability, efficiency, and comfort with our services.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Reliability</h5>
                        <p class="text-muted">
                            Reduce system failures and downtime.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Savings</h5>
                        <p class="text-muted">
                            Optimize performance to lower energy costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Extended Lifespan</h5>
                        <p class="text-muted">
                            Prolong equipment life with regular care.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Improved Air Quality</h5>
                        <p class="text-muted">
                            Maintain clean filters for healthier environments.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Savings</h5>
                        <p class="text-muted">
                            Prevent costly repairs with early detection.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Consistent Comfort</h5>
                        <p class="text-muted">
                            Stable temperature and humidity control.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AMC Packages Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our AMC Packages</h2>
                <p class="lead text-muted">
                    Comprehensive maintenance tailored to your HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scheduled PM Visits:</strong> Quarterly or bi-annual inspections.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>System Cleaning:</strong> Filters, coils, and drain pans.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Operational Checks:</strong> Refrigerant levels and controls.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Emergency Support:</strong> Priority response for breakdowns.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Service Reports:</strong> Detailed post-visit documentation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Preferential Service:</strong> Priority scheduling and discounts.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Equipment Covered:</strong> ACs, AHUs, chillers, FCUs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Predictive Analysis:</strong> Leverage BMS data for insights.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance Checks:</strong> Adhere to safety standards.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance Approach Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Maintenance Approach</h2>
                <p class="lead text-muted">
                    Proactive, predictive, and responsive care for your HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Proactive:</strong> Prevent issues with regular checks.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Predictive:</strong> Use BMS data to anticipate faults.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Responsive:</strong> Fast diagnosis and repairs.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Skilled Technicians:</strong> Certified and experienced team.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Genuine Spares:</strong> Quality parts for lasting repairs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Transparent Reports:</strong> Clear service documentation.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Highlights Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Highlights</h2>
                <p class="lead text-muted">
                    Advanced expertise for comprehensive HVAC maintenance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Equipment Expertise:</strong> ACs, chillers, AHUs, VRF systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Integration:</strong> Leverage data for predictive care.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> Adhere to ECBC, ASHRAE standards.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Custom Plans:</strong> Tailored maintenance schedules.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Quality Work:</strong> Genuine spares and skilled service.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Rapid Response:</strong> Priority support for AMC clients.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service & Support Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End Support</h2>
                <p class="lead text-muted">
                    From scheduled maintenance to emergency repairs, we’re your HVAC partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hvac-technician.jpg') }}" alt="Technician servicing HVAC system" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Proactive Maintenance</h5>
                        <p class="text-muted">
                            Prevent issues with regular servicing.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Train staff for system management.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response for emergencies.
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
                <h2 class="display-5 mb-3">Why Choose Our Maintenance Services?</h2>
                <p class="lead text-muted">
                    Protect your HVAC investment with expert care.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Maximized Uptime</h5>
                        <p class="text-muted">
                            Minimize disruptions with reliable service.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Efficiency</h5>
                        <p class="text-muted">
                            Reduce energy and repair expenses.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Healthy Air Quality</h5>
                        <p class="text-muted">
                            Ensure clean and comfortable environments.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Tailored Plans</h5>
                        <p class="text-muted">
                            Customized maintenance for your needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Secure Your HVAC Systems Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to protect your HVAC investment with expert maintenance? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
