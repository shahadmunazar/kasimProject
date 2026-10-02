@extends('frontend.layouts.main')

@section('meta_title', 'IoT and Smart Automation Software | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'IoT and Smart Automation Software',
        'breadcrumb' => ['Services', 'IoT and Smart Automation']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">IoT and Smart Automation by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Headquartered in Delhi NCR - Noida, TC Smart Technology delivers advanced IoT and Smart Automation Software to optimize operations, monitor equipment, and drive real-time data insights. Our solutions connect machines, sensors, and cloud platforms for smarter, more efficient operations across industries.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/IoT %26 Smart Automation Software.png" alt="IoT and Smart Automation" style="width: 100%; height: 500px; object-fit: cover;">                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for IoT?</h2>
                <p class="lead text-muted">
                    Based in Delhi NCR - Noida, we provide scalable IoT platforms with seamless integration, supporting Industry 4.0 goals. Our solutions reduce downtime, enhance energy efficiency, and offer full remote control, backed by over 100 successful implementations across India.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-link fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Seamless Connectivity</h4>
                        <p class="text-muted">
                            Integrate machines, sensors, and cloud platforms with ease.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-chart-line fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Real-Time Insights</h4>
                        <p class="text-muted">
                            Web dashboards and mobile apps for instant data access.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Secure & Scalable</h4>
                        <p class="text-muted">
                            Future-ready platforms with robust security standards.
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
                <h2 class="display-5 mb-3">Our IoT & Smart Automation Services</h2>
                <p class="lead text-muted">
                    Comprehensive solutions for real-time monitoring, automation, and optimization.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Machine Monitoring</h5>
                        <p class="text-muted">
                            Track uptime, downtime, and OEE for CNC, VMC, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Management</h5>
                        <p class="text-muted">
                            Real-time energy tracking to reduce costs and inefficiencies.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">SCADA & PLC Monitoring</h5>
                        <p class="text-muted">
                            Cloud-based dashboards for remote system control.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Smart Lighting & HVAC</h5>
                        <p class="text-muted">
                            Automated control for offices, hospitals, and malls.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Environment & Safety</h5>
                        <p class="text-muted">
                            Monitor gas leaks, air quality, and noise levels.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Smart Agriculture</h5>
                        <p class="text-muted">
                            Automate irrigation and greenhouse monitoring.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- IoT Products Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our IoT Products</h2>
                <p class="lead text-muted">
                    Field-tested IoT solutions for diverse industrial applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC Edge 100:</strong> IoT Gateway for Modbus, OPC UA, MQTT.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>PowerTrack EMS:</strong> Energy monitoring and billing reports.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>AutoLog Pro:</strong> Machine usage and OEE tracking.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>SmartHUB Pro:</strong> Centralized multi-site monitoring.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC Vision AI:</strong> AI-powered defect detection.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Smart Irrigation:</strong> Automated agriculture solutions.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Monitoring:</strong> High-demand cost-saving solution.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Remote SCADA:</strong> Infrastructure and utility management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Environmental:</strong> Safety for critical industries.</li>
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
                    Advanced features powering our IoT solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Protocols:</strong> Modbus, OPC UA, MQTT for connectivity.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compatibility:</strong> Siemens, Allen Bradley, Schneider, and more.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Dashboards:</strong> Web and mobile access with real-time alerts.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Sensors:</strong> Temperature, pressure, humidity, and air quality.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scalability:</strong> Multi-site monitoring with centralized control.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Efficiency:</strong> Reduce energy costs and downtime significantly.</li>
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
                <h2 class="display-5 mb-3">End-to-End IoT Support</h2>
                <p class="lead text-muted">
                    From deployment to ongoing maintenance, we’re your IoT partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/IoT %26 Smart Automation Software (2).png" alt="End-to-End IoT Support" style="width: 100%; height: 570px; object-fit: cover;">                   </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Deployment</h5>
                        <p class="text-muted">
                            On-site setup and integration with existing systems.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">User Training</h5>
                        <p class="text-muted">
                            Hands-on programs to master IoT dashboards and tools.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response with remote diagnostics in under 4 hours.
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
                <h2 class="display-5 mb-3">Why Automate with Our IoT Solutions?</h2>
                <p class="lead text-muted">
                    Transform operations with intelligent, connected systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reduced Downtime</h5>
                        <p class="text-muted">
                            Real-time monitoring minimizes operational interruptions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Efficiency</h5>
                        <p class="text-muted">
                            Optimize consumption and lower costs significantly.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Visibility</h5>
                        <p class="text-muted">
                            Real-time insights via dashboards and mobile apps.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Platforms</h5>
 “

                        <p class="text-muted">
                            Expand solutions across multiple sites seamlessly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Transform Your Operations with IoT</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to automate and optimize with IoT? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
