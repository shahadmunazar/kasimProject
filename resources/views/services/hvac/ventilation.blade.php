@extends('frontend.layouts.main')

@section('meta_title', 'Advanced Indoor Air Quality & Ventilation Solutions | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Indoor Air Quality & Ventilation Solutions',
        'breadcrumb' => ['Services', 'IAQ & Ventilation']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Breathe Healthier with TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers advanced IAQ and ventilation solutions to ensure cleaner, healthier indoor environments. Our systems integrate cutting-edge purification, ventilation, and monitoring technologies for enhanced comfort and compliance.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC.png" alt="Breathe Healthier with TC Smart Technology" style="width: 100%; height: 500px; object-fit: cover;">                  </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we specialize in holistic IAQ and ventilation solutions, integrating advanced technologies with BMS for healthier, energy-efficient indoor spaces. Our expertise ensures compliance with WELL and LEED standards.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-lungs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Healthier Air</h4>
                        <p class="text-muted">
                            Reduce pollutants for occupant well-being.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Energy Efficiency</h4>
                        <p class="text-muted">
                            Smart ventilation to minimize energy waste.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">BMS Integration</h4>
                        <p class="text-muted">
                            Automated IAQ control for optimal performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Components Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Components of Our Solutions</h2>
                <p class="lead text-muted">
                    Comprehensive systems for cleaner, fresher indoor air.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Mechanical Ventilation</h5>
                        <p class="text-muted">
                            Exhaust fans, FAUs, and HRVs/ERVs from Systemair, Daikin, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Air Purification</h5>
                        <p class="text-muted">
                            HEPA, UVGI, and ionization systems from Camfil, Philips, and others.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">IAQ Monitoring</h5>
                        <p class="text-muted">
                            CO2, VOC, and PM sensors from Siemens, Honeywell, and Kaiterra.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Humidity Control</h5>
                        <p class="text-muted">
                            Humidifiers and dehumidifiers from Condair, Bry-Air, and Munters.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Benefits of Our IAQ Solutions</h2>
                <p class="lead text-muted">
                    Healthier, more comfortable indoor environments.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Healthier Air:</strong> Reduced allergens and pathogens.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Productivity:</strong> Improved focus and performance.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Comfort:</strong> Odor-free, balanced humidity.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Savings:</strong> Smart ventilation reduces costs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Asset Protection:</strong> Prevents mold and material damage.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> Meets WELL and LEED standards.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Brand Image:</strong> Commitment to occupant health.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Monitoring:</strong> Real-time IAQ data insights.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Integration:</strong> Seamless BMS control.</li>
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
                    Cutting-edge solutions for superior air quality.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Technologies:</strong> HEPA, UVGI, ionization, DCV.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Brands:</strong> Camfil, Siemens, Condair, Systemair.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Monitoring:</strong> CO2, VOC, PM2.5 sensors.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Efficiency:</strong> HRV/ERV and DCV systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Customization:</strong> Tailored to building needs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Integration:</strong> Automated air quality control.</li>
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
                    From design to monitoring, we’re your IAQ partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVACAMC.jpg" alt="design to monitoring" style="width: 100%; height: 580px; object-fit: cover;">                  </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Expert Design</h5>
                        <p class="text-muted">
                            Customized IAQ and ventilation solutions.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-cogs fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Installation</h5>
                        <p class="text-muted">
                            Professional setup for optimal performance.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-chart-line fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Real-Time Monitoring</h5>
                        <p class="text-muted">
                            Continuous IAQ data for proactive control.
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
                <h2 class="display-5 mb-3">Why Prioritize IAQ with Us?</h2>
                <p class="lead text-muted">
                    Create healthier, more productive indoor spaces.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Health Benefits</h5>
                        <p class="text-muted">
                            Reduced illness and allergies.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Savings</h5>
                        <p class="text-muted">
                            Efficient ventilation lowers costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Compliance</h5>
                        <p class="text-muted">
                            Meet WELL and LEED standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Productivity</h5>
                        <p class="text-muted">
                            Cleaner air boosts focus and performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Create Healthier Indoor Spaces Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to improve your indoor air quality? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
