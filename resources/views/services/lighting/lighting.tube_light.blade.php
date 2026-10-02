@extends('frontend.layouts.main')

@section('meta_title', 'HVAC Repair & Emergency Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HVAC Repair & Emergency Services',
        'breadcrumb' => ['Services', 'HVAC Repair']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">HVAC Repair by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology provides prompt HVAC Repair and 24/7 Emergency Services to restore your systems quickly. Our skilled technicians ensure minimal downtime, reliable repairs, and lasting solutions for your HVAC needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hvac-repair.jpg') }}" alt="HVAC repair technician at work" style="width: 100%; height: 400px; object-fit: cover;">
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
                    Located in Delhi NCR - Noida, we offer rapid, reliable HVAC repair services with expert diagnostics, quality workmanship, and 24/7 emergency support. Our team ensures your systems are back online with minimal disruption and lasting performance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-bolt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Rapid Response</h4>
                        <p class="text-muted">
                            24/7 emergency service to minimize downtime.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Expert Diagnostics</h4>
                        <p class="text-muted">
                            Accurate fault identification for lasting fixes.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-check-circle fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Quality Repairs</h4>
                        <p class="text-muted">
                            Genuine parts and skilled workmanship.
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
                <h2 class="display-5 mb-3">Key Benefits of Our Repair Services</h2>
                <p class="lead text-muted">
                    Swift, reliable solutions to restore your HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reduced Downtime</h5>
                        <p class="text-muted">
                            Fast repairs to minimize operational disruptions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost-Effective</h5>
                        <p class="text-muted">
                            Accurate fixes to prevent repeat issues.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-100">
                        <h5 class="mb-3">Safety First</h5>
                        <p class="text-muted">
                            Repairs adhering to safety standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Expert Technicians</h5>
                        <p class="text-muted">
                            Skilled team for complex fault diagnosis.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Spare Parts Access</h5>
                        <p class="text-muted">
                            Quick sourcing of quality components.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Comfort Restoration</h5>
                        <p class="text-muted">
                            Swift fixes for heating and cooling issues.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Repair Capabilities Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive Repair Capabilities</h2>
                <p class="lead text-muted">
                    Expert solutions for all HVAC system issues.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>System Malfunctions:</strong> Cooling/heating failures, poor airflow.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Component Issues:</strong> Compressor, motor, and coil repairs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Refrigerant Leaks:</strong> Detection and recharge.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electrical Faults:</strong> Contactors, relays, wiring fixes.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Control Issues:</strong> Thermostats, sensors, PLC/DDC repairs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Valve/Pump Failures:</strong> Control valves and pump repairs.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Emergency Situations:</strong> Complete breakdowns, major leaks.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Equipment Covered:</strong> ACs, chillers, AHUs, FCUs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Integration:</strong> Repair of control interfaces.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Process Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Repair Process</h2>
                <p class="lead text-muted">
                    Efficient and transparent steps to restore your HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Initial Assessment:</strong> Understand and prioritize the issue.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>On-Site Diagnosis:</strong> Thorough fault identification.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Transparent Quotation:</strong> Clear repair cost details.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Efficient Repairs:</strong> Quality work with genuine parts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>System Testing:</strong> Verify restored functionality.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Client Confirmation:</strong> Detailed service report.</li>
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
                    Expert capabilities for reliable HVAC repairs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Equipment Expertise:</strong> ACs, chillers, AHUs, VRF systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Knowledge:</strong> Repair of integrated control systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>24/7 Availability:</strong> Emergency support for critical issues.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Genuine Parts:</strong> Access to quality spares.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Transparent Pricing:</strong> Fair and clear cost estimates.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Safety Standards:</strong> Compliant repair practices.</li>
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
                    From emergency repairs to ongoing reliability, we’re your HVAC partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hvac-emergency.jpg') }}" alt="Technician performing emergency HVAC repair" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-bolt fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Rapid Response</h5>
                        <p class="text-muted">
                            24/7 emergency service for urgent issues.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Expert Technicians</h5>
                        <p class="text-muted">
                            Skilled team for accurate repairs.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Customer Support</h5>
                        <p class="text-muted">
                            Transparent communication throughout.
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
                <h2 class="display-5 mb-3">Why Choose Our Repair Services?</h2>
                <p class="lead text-muted">
                    Reliable solutions to keep your HVAC systems running smoothly.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Minimized Downtime</h5>
                        <p class="text-muted">
                            Fast repairs to restore operations quickly.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost-Effective Fixes</h5>
                        <p class="text-muted">
                            Accurate diagnostics to avoid repeat costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Safety Assurance</h5>
                        <p class="text-muted">
                            Repairs meet industry safety standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reliable Support</h5>
                        <p class="text-muted">
                            24/7 availability for emergencies.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Resolve HVAC Issues Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Facing an HVAC emergency? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for rapid repair services.
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
