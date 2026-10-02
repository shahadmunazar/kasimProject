@extends('frontend.layouts.main')

@section('meta_title', 'Automated Test Bench Design for Electrical Testing | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Automated Test Bench Design for Electrical Testing',
        'breadcrumb' => ['Services', 'Automated Test Bench Design']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Automated Test Bench Design by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Headquartered in Delhi NCR - Noida, TC Smart Technology offers advanced Automated Test Benches for electrical testing of switchgear, sensors, and power systems. Integrating TestStand, LabVIEW, and top-tier hardware, our solutions ensure precision, automation, and compliance with IEC, UL, and IS standards.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Automated Test Bench Design for Electrical Testing.png" alt="Automated Test Bench Design" style="width: 100%; height: 500px; object-fit: cover;">                   </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Partner with TC Smart Technology?</h2>
                <p class="lead text-muted">
                    With access to Siemens, ABB, Schneider Electric, and 50+ brands, our test benches leverage TestStand, LabVIEW, and IoT for automated, compliant, and scalable electrical testing solutions across LV, MV, and HV applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Advanced Automation</h4>
                        <p class="text-muted">
                            TestStand and LabVIEW streamline test sequences.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cloud fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">IoT Integration</h4>
                        <p class="text-muted">
                            Real-time monitoring via MQTT and IoT sensors.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Standards Compliance</h4>
                        <p class="text-muted">
                            Meets IEC 60947, UL 489, and IS 13947 standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Test Bench Capabilities</h2>
                <p class="lead text-muted">
                    Comprehensive solutions for automated electrical testing, tailored for precision and compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Circuit Breaker Testing</h5>
                        <p class="text-muted">
                            Trip time, overload, and short-circuit tests using TestStand.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Relay Testing</h5>
                        <p class="text-muted">
                            Pickup/drop-off and timing tests with Omicron sets and VEE Pro.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">SMPS Testing</h5>
                        <p class="text-muted">
                            Efficiency, ripple, and load tests via LabVIEW CVI.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Contactor Testing</h5>
                        <p class="text-muted">
                            Contact resistance and thermal tests using LabVIEW.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Power Quality Analysis</h5>
                        <p class="text-muted">
                            Harmonics and voltage tests with Fluke analyzers and VEE Pro.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Environmental Testing</h5>
                        <p class="text-muted">
                            Temperature and vibration tests using SKF sensors.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry Applications Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Industry-Tailored Solutions</h2>
                <p class="lead text-muted">
                    Test benches designed for diverse industrial testing needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Precision testing for avionics components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> Reliable relay and breaker testing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> ISO 13485-compliant device testing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> SMPS and sensor validation.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Pharmaceuticals:</strong> GMP-compliant equipment testing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> HV component and renewable energy tests.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Reliable signaling component tests.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Power supply validation.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Durable component testing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Traceable electronics testing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Flexible prototyping tests.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>More:</strong> Diamond & Jewellery, Die & Mould.</li>
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
                    Advanced features powering our automated test bench solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Software:</strong> TestStand, LabVIEW, VEE Pro, C#.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Hardware:</strong> Siemens, Fluke, Megger, Omicron.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IoT:</strong> Real-time monitoring with MQTT.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> IEC 60947, UL 489, IS 13947.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Safety:</strong> Arc flash and grounding protection.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Modularity:</strong> Scalable for HV and renewable tests.</li>
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
                    From design to maintenance, we’re your automated testing partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Industrial Test Bench .jpg" alt="End to end support for Automated Test Bench Design" style="width: 100%; height: 580px; object-fit: cover;">   
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-secondary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Seamless integration tailored to your facility, locally or globally.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-secondary mb-3"></i>
                        <h5 class="mb-3">Comprehensive Training</h5>
                        <p class="text-muted">
                            Equip your team with hands-on test bench expertise.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-secondary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response with technical guidance in under 4 hours.
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
                <h2 class="display-5 mb-3">Why Choose Our Test Benches?</h2>
                <p class="lead text-muted">
                    Unlock measurable benefits for your electrical testing processes.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Efficiency</h5>
                        <p class="text-muted">
                            Automated sequences reduce testing time.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Precise Measurements</h5>
                        <p class="text-muted">
                            LabVIEW CVI ensures accurate data acquisition.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Compliance Assurance</h5>
                        <p class="text-muted">
                            Meets IEC, UL, and IS standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Design</h5>
                        <p class="text-muted">
                            Modular for future testing needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Transform Your Testing Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to streamline electrical testing with our Automated Test Benches? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
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
/* Color Combination from First Artifact with Added #ce9233 */
.container-fluid.bg-primary {
    background: linear-gradient(135deg, #ce9233 !important, #ce9233 !important);
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
.text-secondary {
    color: #ce9233 !important;
}
.btn-light {
    color: #333333;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-light:hover {
    background-color: #e0e0e0;
    transform: scale(1.05);
}
i.fa {
    transition: color 0.3s;
}
i.fa:hover {
    color: #b07b2a !important;
}
</style>
