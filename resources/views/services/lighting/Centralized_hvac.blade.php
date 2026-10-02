@extends('frontend.layouts.main')

@section('meta_title', 'Intelligent Building Management Systems (BMS) & HVAC Installation Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Intelligent BMS & HVAC Installation Services',
        'breadcrumb' => ['Services', 'BMS & HVAC']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">BMS & HVAC Solutions by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers intelligent Building Management Systems (BMS) for HVAC optimization and expert HVAC installation services. Our solutions ensure energy efficiency, occupant comfort, and seamless integration for buildings of all sizes.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/bms-hvac.jpg') }}" alt="BMS and HVAC system interface" style="width: 100%; height: 400px; object-fit: cover;">
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
                    Located in Delhi NCR - Noida, we offer holistic BMS and HVAC solutions with brand-agnostic expertise, tailored designs, and a focus on energy savings. Our experienced team ensures reliability, compliance, and robust support across India.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Energy Efficiency</h4>
                        <p class="text-muted">
                            Smart strategies to reduce HVAC costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">End-to-End Services</h4>
                        <p class="text-muted">
                            From design to installation and BMS integration.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Scalable Solutions</h4>
                        <p class="text-muted">
                            Modular BMS for all building complexities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Components Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Core BMS & HVAC Components</h2>
                <p class="lead text-muted">
                    Advanced hardware and software for intelligent HVAC control.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">PLCs & DDCs</h5>
                        <p class="text-muted">
                            Control logic for AHUs, chillers, and boilers.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Sensors</h5>
                        <p class="text-muted">
                            Temperature, humidity, air quality, and pressure monitoring.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Actuators & Valves</h5>
                        <p class="text-muted">
                            Modulate dampers and control water flow.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">HMIs</h5>
                        <p class="text-muted">
                            Localized visualization and system overrides.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Networking</h5>
                        <p class="text-muted">
                            BACnet, Modbus, and Ethernet connectivity.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Software Platforms</h5>
                        <p class="text-muted">
                            SCADA-like supervision and IoT integration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Features Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key BMS & HVAC Service Features</h2>
                <p class="lead text-muted">
                    Optimize performance with intelligent control and monitoring.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automated Controls:</strong> Demand-based ventilation, chiller sequencing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Real-Time Monitoring:</strong> Live dashboards for system status.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Management:</strong> Load shedding and optimal setpoints.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Alarm Management:</strong> Instant fault notifications.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Data Logging:</strong> Historical data for compliance.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Remote Access:</strong> Secure web and mobile control.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>AHU Control:</strong> Fan speed and damper modulation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Chiller Optimization:</strong> Load balancing and efficiency.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>VAV Systems:</strong> Zone temperature control.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HVAC Installation Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive HVAC Installation</h2>
                <p class="lead text-muted">
                    Expert services from design to commissioning.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Design & Sourcing:</strong> Tailored HVAC systems and equipment procurement.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Installation:</strong> Professional setup of AHUs, chillers, and ductwork.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Integration:</strong> Sensors, actuators, and control panels.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Commissioning:</strong> System testing and configuration.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Training & Support:</strong> User manuals and operator training.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Maintenance:</strong> AMC and responsive after-sales support.</li>
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
                    Cutting-edge technologies for BMS and HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Brands:</strong> Siemens, Honeywell, Schneider, Daikin.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Protocols:</strong> BACnet, Modbus, LonWorks, Ethernet.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IoT Integration:</strong> Predictive maintenance and analytics.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> NBC, ECBC, ASHRAE standards.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scalability:</strong> Multi-building and campus-wide control.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Focus:</strong> Load shedding and economizer modes.</li>
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
                    From design to ongoing maintenance, we’re your BMS and HVAC partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hvac-engineer.jpg') }}" alt="Engineer configuring BMS and HVAC systems" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Installation</h5>
                        <p class="text-muted">
                            Expert setup and BMS integration.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Comprehensive training for system management.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Ongoing maintenance and rapid response.
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
                <h2 class="display-5 mb-3">Why Choose Our BMS & HVAC Solutions?</h2>
                <p class="lead text-muted">
                    Optimize comfort and efficiency with intelligent systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Savings</h5>
                        <p class="text-muted">
                            Reduce costs with smart HVAC controls.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reliable Systems</h5>
                        <p class="text-muted">
                            Predictive maintenance for uptime.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Designs</h5>
                        <p class="text-muted">
                            Tailored to your building’s needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Architecture</h5>
                        <p class="text-muted">
                            Adaptable for all building sizes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Optimize Your Building Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to enhance your HVAC system with intelligent BMS? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
    box-shadow: 0 10px 20px rgba(0,
