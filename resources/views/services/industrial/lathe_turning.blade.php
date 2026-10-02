@extends('frontend.layouts.main')

@section('meta_title', 'Premier Lathe & Turning Machines (Manual & CNC) | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Premier Lathe & Turning Machines (Manual & CNC)',
        'breadcrumb' => ['Services', 'Lathe & Turning Machines']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Lathe & Turning Machines by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Headquartered in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge lathe and turning machines (manual & CNC) with advanced robotics, IoT connectivity, and ±0.005 mm precision. Our comprehensive solutions redefine precision machining for global industries.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Lathe %26 Turning Machines (Manual %26 CNC).png" alt="Lathe & Turning Machines" style="width: 100%; height: 500px; object-fit: cover;">
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
                    From Delhi NCR - Noida, we provide innovative lathe and turning machines with AI-driven precision, IoT integration, and up to 50% cycle time reduction, ensuring versatility, scalability, and Industry 4.0 compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-bullseye fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Ultra-Precision</h4>
                        <p class="text-muted">
                            Positional accuracy of ±0.005 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Robotic Automation</h4>
                        <p class="text-muted">
                            6-axis robots reduce cycle times by 50%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Sustainability</h4>
                        <p class="text-muted">
                            25% less energy with efficient designs.
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
                <h2 class="display-5 mb-3">Our Lathe & Turning Machines</h2>
                <p class="lead text-muted">
                    A diverse range of new, specialty, and affordable machines for all turning and machining needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Manual Lathes</h5>
                        <p class="text-muted">
                            Bed lengths up to 3,000 mm for custom work.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">CNC Lathes</h5>
                        <p class="text-muted">
                            Multi-axis for complex geometries.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">CNC Turning Centers</h5>
                        <p class="text-muted">
                            Live tooling for multi-tasking.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Swiss-Type Lathes</h5>
                        <p class="text-muted">
                            Micro-machining with 38 mm bar capacity.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Heavy-Duty Lathes</h5>
                        <p class="text-muted">
                            Up to 2,000 mm diameter workpieces.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Vertical Turning Lathes</h5>
                        <p class="text-muted">
                            High stability for oversized parts.
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
                <h2 class="display-5 mb-3">Specialty Turning Equipment</h2>
                <p class="lead text-muted">
                    Advanced solutions for unique machining challenges.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Robot Integration:</strong> 6-axis arms for 50% faster cycles.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IoT Connectivity:</strong> 30% less downtime with analytics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Hybrid Systems:</strong> Turning-milling with Ra 0.4 µm finishes.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>High-Speed Lathes:</strong> 10,000 RPM for alloys.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cryogenic Cooling:</strong> Enhanced tool life for titanium.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Multi-Turret:</strong> Simultaneous machining.</li>
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
                    Tailored turning solutions for diverse industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> ±0.005 mm turbine shafts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> 40% faster crankshaft turning.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> ISO 13485-compliant implants.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Jewellery:</strong> 0.01 mm mold precision.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> EMI-shielded connectors.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Large bridge fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Turbine rotor machining.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Durable railcar axles.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Telecom:</strong> High-precision waveguides.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Plow shaft durability.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Die & Mould:</strong> 60 HRC mold bases.</li>
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
                    Advanced features driving our turning solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Spindle Performance:</strong> Up to 10,000 RPM, 50 kW.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Precision:</strong> ±0.005 mm positional accuracy.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Controls:</strong> FANUC, Siemens with OPC UA.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots and bar feeders.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Materials:</strong> Metals, plastics, composites.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Features:</strong> Live tooling, Y-axis support.</li>
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
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/3D Printing %26 Additive Manufacturing Machines.png" alt="Lathe & Turning Support Services" style="width: 100%; height: 580px; object-fit: cover;">
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
                            AR-based training for CNC programming.
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
                <h2 class="display-5 mb-3">Why Our Turning Solutions?</h2>
                <p class="lead text-muted">
                    Transform your operations with precision and efficiency.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">High Precision</h5>
                        <p class="text-muted">
                            Tolerances as tight as ±0.005 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Productivity</h5>
                        <p class="text-muted">
                            50% faster cycles with automation.
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
                        <h5 class="mb-3">Material Versatility</h5>
                        <p class="text-muted">
                            Metals, composites, and ceramics.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Revolutionize Your Manufacturing</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to transform your production with our lathe and turning machine solutions? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
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
