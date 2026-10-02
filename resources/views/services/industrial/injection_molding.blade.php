@extends('frontend.layouts.main')

@section('meta_title', 'Premier Injection Molding & Plastic Processing Machines | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Premier Injection Molding & Plastic Processing Machines',
        'breadcrumb' => ['Services', 'Injection Molding & Plastic Processing']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Injection Molding & Plastic Processing by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Headquartered in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge injection molding and plastic processing machines with advanced robotics, IoT connectivity, and ±0.01 mm precision. Our comprehensive solutions redefine plastic manufacturing for global industries.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Injection Molding %26 Plastic Processing Machines.png" alt="Injection Molding & Plastic Processing Machines" style="width: 100%; height: 500px; object-fit: cover;">
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
                    From Delhi NCR - Noida, we provide innovative machines with servo-driven precision, IoT integration, and up to 60% energy savings, ensuring scalability, sustainability, and Industry 4.0 compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">High Precision</h4>
                        <p class="text-muted">
                            Tolerances as tight as ±0.01 mm for complex parts.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Robotic Automation</h4>
                        <p class="text-muted">
                            6-axis robots reduce cycle times by up to 40%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Energy Efficiency</h4>
                        <p class="text-muted">
                            Up to 60% energy savings with servo systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Machine Offerings Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Injection Molding & Plastic Processing Machines</h2>
                <p class="lead text-muted">
                    A diverse range of new, specialty, and affordable machines for all plastic processing needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Servo-Hydraulic Machines</h5>
                        <p class="text-muted">
                            Clamping forces up to 4,000 tons for large parts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">All-Electric Machines</h5>
                        <p class="text-muted">
                            ±0.005 mm precision with 30% faster cycles.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Multi-Shot Machines</h5>
                        <p class="text-muted">
                            Multi-material molding for complex parts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Micro-Injection Machines</h5>
                        <p class="text-muted">
                            Precision molding for parts down to 0.1 grams.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Blow Molding Machines</h5>
                        <p class="text-muted">
                            Hollow parts with up to 500-liter capacity.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Extrusion Machines</h5>
                        <p class="text-muted">
                            High-output for pipes, profiles, and sheets.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Specialty Equipment Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Specialty Plastic Processing Equipment</h2>
                <p class="lead text-muted">
                    Advanced solutions for unique manufacturing challenges.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Robot Integration:</strong> 6-axis arms for automated molding.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IoT Connectivity:</strong> 25% less scrap with analytics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Gas-Assisted Molding:</strong> Lightweight, hollow parts.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>In-Mold Labeling:</strong> High-quality finishes for packaging.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Hybrid Systems:</strong> 50% faster prototyping.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>AI Optimization:</strong> 25% faster cycle times.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry Applications Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Industry-Specific Solutions</h2>
                <p class="lead text-muted">
                    Tailored plastic processing for diverse industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Lightweight PEEK components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> ±0.02 mm bumpers and dashboards.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> ISO 13485-compliant syringes.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Die & Mould:</strong> 60 HRC mold cavities.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> EMI-shielded housings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Recycled plastic fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> PTFE valve seals.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Flame-retardant housings.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Weather-resistant interiors.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Telecom:</strong> High-frequency connectors.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> UV-resistant fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Jewellery:</strong> Precision packaging molds.</li>
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
                    Advanced features driving our plastic processing solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Clamping Force:</strong> 50 to 4,000 tons.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Injection Precision:</strong> ±0.01 mm repeatability.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Controls:</strong> B&R, Beckhoff, Siemens with OPC UA.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots and vision systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Materials:</strong> ABS, PEEK, PTFE, and thermosets.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Savings:</strong> Up to 60% with servo drives.</li>
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
                    Complete solutions with machines, training, and 24/7 support.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Industrial Automation HMI.png" alt="Injection Molding Support Services" style="width: 100%; height: 580px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Expert setup for seamless integration.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            AR-based training for mold setup and operation.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response with <4-hour downtime.
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
                <h2 class="display-5 mb-3">Why Our Plastic Processing Solutions?</h2>
                <p class="lead text-muted">
                    Transform your operations with precision and sustainability.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">High Precision</h5>
                        <p class="text-muted">
                            Tolerances as tight as ±0.01 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Productivity</h5>
                        <p class="text-muted">
                            50% faster cycle times with automation.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Efficiency</h5>
                        <p class="text-muted">
                            Affordable machines with high ROI.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Sustainability</h5>
                        <p class="text-muted">
                            30% less energy with eco-friendly systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Revolutionize Your Plastic Manufacturing</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to elevate your production with our injection molding and plastic processing solutions? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
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
