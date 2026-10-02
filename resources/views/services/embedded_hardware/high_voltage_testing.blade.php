@extends('frontend.layouts.main')

@section('meta_title', 'Switchgear Components & Top Brands | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Switchgear Components & Top Brands',
        'breadcrumb' => ['Services', 'Switchgear Components']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Switchgear Components by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Located in Delhi NCR - Noida, TC Smart Technology is a premier supplier of high-quality electrical switchgear components, sensors, testing equipment, and auxiliary systems. Partnered with over 50 global and Indian brands, we deliver innovative, reliable solutions for industrial and commercial applications.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                     <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/High Voltage %26 Type Testing of Switchgear.png" alt="Premier Switchgear Components " style="width: 100%; height: 500px; object-fit: cover;">   
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
                    With partnerships from Siemens, ABB, Schneider Electric, and 50+ brands, we offer the largest inventory of LV/MV/HV components, sensors, and testing equipment in Delhi NCR, ensuring compliance with IEC, UL, and IS standards.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-globe fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">OEM Partnerships</h4>
                        <p class="text-muted">
                            Direct sourcing from 50+ global and Indian brands.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-warehouse fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Unmatched Inventory</h4>
                        <p class="text-muted">
                            Largest stock of components in Delhi NCR.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-secondary mb-3"></i>
                        <h4 class="mb-3">Compliance & Quality</h4>
                        <p class="text-muted">
                            Adheres to IEC, UL, ANSI, and IS standards.
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
                <h2 class="display-5 mb-3">Our Switchgear Component Categories</h2>
                <p class="lead text-muted">
                    Comprehensive range of electrical components, sensors, and testing equipment for all applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Protection & Control Devices</h5>
                        <p class="text-muted">
                            ACBs, MCCBs, MCBs, RCCBs, and protective relays from Siemens, ABB, Schneider Electric, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Power Distribution & Switching</h5>
                        <p class="text-muted">
                            Disconnectors, load break switches, RMUs, and busbar systems from Eaton, L&T, and others.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Measurement & Monitoring</h5>
                        <p class="text-muted">
                            CTs, VTs, energy meters, and IoT sensors from Schneider Electric, Siemens, and Honeywell.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Sensors & Testing Equipment</h5>
                        <p class="text-muted">
                            Temperature, pressure, and vibration sensors, plus insulation testers from Fluke and Megger.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Automation & Motor Control</h5>
                        <p class="text-muted">
                            MCCs, VFDs, PLCs, and SCADA systems from Rockwell Automation, Siemens, and ABB.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Renewable Energy & Smart Grid</h5>
                        <p class="text-muted">
                            Solar combiner boxes, smart meters, and BMS from ABB, Schneider Electric, and L&T.
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
                    Components designed for diverse industrial and commercial power needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> High-reliability components for manufacturing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> Robust solutions for assembly lines.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> ISO 13485-compliant power systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> EMI-protected components for data centers.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Pharmaceuticals:</strong> GMP-compliant cleanroom solutions.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Renewable energy integration components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Reliable power for signaling systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Uninterrupted power for networks.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Traceable electronics assembly solutions.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Flexible prototyping components.</li>
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
                    Advanced features powering our switchgear component solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Brands:</strong> Siemens, ABB, Schneider Electric, Eaton, L&T.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Standards:</strong> IEC, UL, ANSI, IS compliance.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IoT Integration:</strong> Smart sensors for real-time monitoring.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Durability:</strong> IP54–IP66 rated enclosures.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Testing:</strong> Advanced diagnostics with Fluke, Megger.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Modularity:</strong> Flexible for retrofits and upgrades.</li>
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
                    From sourcing to installation, we’re your trusted electrical components partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Industrial Automation HMI.png" alt="Responsive HVAC Repair & Emergency Services" style="width: 100%; height: 580px; object-fit: cover;">   
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-secondary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Expert integration tailored to your facility, locally or globally.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-secondary mb-3"></i>
                        <h5 class="mb-3">Comprehensive Training</h5>
                        <p class="text-muted">
                            Equip your team with hands-on component expertise.
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
                <h2 class="display-5 mb-3">Why Choose Our Components?</h2>
                <p class="lead text-muted">
                    Unlock measurable benefits for your electrical infrastructure.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reliable Performance</h5>
                        <p class="text-muted">
                            Genuine components ensure system reliability.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Solutions</h5>
                        <p class="text-muted">
                            Tailored retrofit kits and IoT upgrades.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Global Standards</h5>
                        <p class="text-muted">
                            IEC, UL, ANSI, and IS compliance.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Rapid Delivery</h5>
                        <p class="text-muted">
                            Large inventory ensures quick availability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Power Your Projects Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to source world-class switchgear components? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
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
