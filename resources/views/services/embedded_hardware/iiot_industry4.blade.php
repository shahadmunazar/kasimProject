@extends('frontend.layouts.main')

@section('meta_title', 'IIoT, Data Logging & Industry 4.0 Implementation | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'IIoT, Data Logging & Industry 4.0 Implementation',
        'breadcrumb' => ['Services', 'IIoT, Data Logging & Industry 4.0']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier IIoT, Data Logging & Industry 4.0 by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Headquartered in Delhi NCR - Noida, TC Smart Technology delivers advanced IIoT, data logging, and Industry 4.0 solutions to transform manufacturing. Our tailored systems ensure precision, efficiency, and comprehensive support for smart industries.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Industrial IIOT System.jpg" alt="Premier IIoT, Data Logging & Industry 4.0" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Partner with TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Based in Delhi NCR - Noida, our certified engineers use platforms like Siemens, ABB, and Rockwell Automation to deliver IIoT solutions that boost productivity by 30%, reduce energy use by 20%, and comply with IEC 62443 and ISO 22400.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cloud fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Real-Time Analytics</h4>
                        <p class="text-muted">
                            AI-driven insights improve efficiency by 30%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Cybersecurity</h4>
                        <p class="text-muted">
                            IEC 62443 compliance ensures secure operations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tools fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Predictive Maintenance</h4>
                        <p class="text-muted">
                            50% less downtime with AI-driven predictions.
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
                <h2 class="display-5 mb-3">Our IIoT & Industry 4.0 Services</h2>
                <p class="lead text-muted">
                    Comprehensive solutions for smart manufacturing, tailored for precision and efficiency.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom System Design</h5>
                        <p class="text-muted">
                            Tailored IIoT systems for your production needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Data Acquisition & Logging</h5>
                        <p class="text-muted">
                            High-precision data collection for optimization.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Real-Time Monitoring</h5>
                        <p class="text-muted">
                            Track performance with IIoT sensors instantly.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Predictive Maintenance</h5>
                        <p class="text-muted">
                            AI-driven predictions reduce downtime by 50%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Process Optimization</h5>
                        <p class="text-muted">
                            Data analytics boost efficiency by 30%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cybersecurity & Compliance</h5>
                        <p class="text-muted">
                            Secure data with IEC 62443 compliance.
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
                    IIoT and Industry 4.0 systems crafted for diverse industrial needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> AS9100-compliant component monitoring.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> 30% faster assembly with analytics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> ISO 13485-compliant sterile monitoring.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> Traceable circuit board assembly.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Pharmaceuticals:</strong> GMP-compliant batch tracking.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Wind turbine maintenance prediction.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Efficient railcar production.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Network uptime monitoring.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Pipeline flow monitoring.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Reliable assembly data logging.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Flexible prototyping analytics.</li>
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
                    Advanced features powering our IIoT and Industry 4.0 solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Platforms:</strong> Siemens, ABB, Rockwell Automation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Data Logging:</strong> 100 Hz sampling, 1 TB storage.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Analytics:</strong> 50% faster response with AI.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Edge Computing:</strong> 50% less latency.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cybersecurity:</strong> IEC 62443, GDPR compliance.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Interoperability:</strong> Modbus, OPC UA, MQTT.</li>
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
                    From installation to ongoing maintenance, we’re your smart manufacturing partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/IIoT%2C Data Logging %26 Industry 4.0 Implementation.png" alt="End to end support for iot industry" style="width: 100%; height: 570px; object-fit: cover;">                   </div>
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
                            Equip your team with hands-on IIoT expertise.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-secondary mb-3"></i>
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
                <h2 class="display-5 mb-3">Why Automate with Us?</h2>
                <p class="lead text-muted">
                    Unlock measurable benefits for your smart manufacturing processes.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Minimized Downtime</h5>
                        <p class="text-muted">
                            50% reduction with predictive maintenance.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Boosted Productivity</h5>
                        <p class="text-muted">
                            30% higher output with optimized processes.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Enhanced Security</h5>
                        <p class="text-muted">
                            IEC 62443-compliant data protection.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Efficiency</h5>
                        <p class="text-muted">
                            20% lower energy costs with smart systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Transform Your Manufacturing Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to transform your manufacturing with IIoT, data logging, and Industry 4.0 implementation? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
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
