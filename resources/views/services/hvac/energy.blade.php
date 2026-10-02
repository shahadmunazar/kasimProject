@extends('frontend.layouts.main')

@section('meta_title', 'Intelligent Energy Optimization & HVAC System Design | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Energy Optimization & HVAC System Design',
        'breadcrumb' => ['Services', 'Energy Optimization']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Engineer Efficiency with TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers intelligent HVAC system designs and energy optimization strategies. Our holistic approach ensures maximum efficiency, reduced costs, and sustainable performance for your buildings.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/hvacsetup.png" alt="Engineer Efficiency with TC Smart Technology" style="width: 100%; height: 500px; object-fit: cover;">                  </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we combine advanced HVAC design with intelligent energy optimization to deliver sustainable, cost-effective solutions. Our expertise ensures long-term performance and compliance with green building standards.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Sustainability</h4>
                        <p class="text-muted">
                            Reduce environmental impact with green designs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-dollar-sign fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Cost Savings</h4>
                        <p class="text-muted">
                            Lower energy and operational expenses.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Intelligent Design</h4>
                        <p class="text-muted">
                            Tailored systems for optimal performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Pillars Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Pillars of Our Strategy</h2>
                <p class="lead text-muted">
                    Comprehensive solutions for energy-efficient HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Audits</h5>
                        <p class="text-muted">
                            Detailed assessments to identify efficiency opportunities.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">BMS Controls</h5>
                        <p class="text-muted">
                            Intelligent scheduling, DCV, and economizer strategies.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">High-Efficiency Equipment</h5>
                        <p class="text-muted">
                            Advanced chillers, AHUs, and EC motors.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Energy Recovery</h5>
                        <p class="text-muted">
                            HRVs/ERVs and waste heat recovery systems.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Variable Speed Control</h5>
                        <p class="text-muted">
                            VFDs from ABB, Siemens, and Danfoss for precise output.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Design Principles Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Core Design Principles</h2>
                <p class="lead text-muted">
                    Meticulous HVAC system design for lasting efficiency.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Accurate Sizing:</strong> Precise load calculations.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Holistic Approach:</strong> Integrated system design.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Future-Proofing:</strong> Scalable and adaptable systems.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> Meets ECBC, ASHRAE, LEED standards.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Lifecycle Costs:</strong> Long-term cost optimization.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Top Brands:</strong> Siemens, Honeywell, and more.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Advanced BMS:</strong> Sophisticated control logic.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EC Motors:</strong> High-efficiency components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Reliability:</strong> Trusted equipment selection.</li>
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
                    Advanced strategies for energy-efficient HVAC design.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Audits:</strong> Data-driven efficiency insights.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>BMS Strategies:</strong> DCV, economizer, load shedding.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>VFD Integration:</strong> ABB, Siemens, Danfoss brands.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Recovery:</strong> HRVs/ERVs and waste heat systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compliance:</strong> ECBC, LEED, ASHRAE standards.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scalability:</strong> Future-ready system designs.</li>
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
                    From design to optimization, we’re your efficiency partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC AMC .png" alt="end to end support from design to optimization" style="width: 100%; height: 580px; object-fit: cover;">                  </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Expert Design</h5>
                        <p class="text-muted">
                            Tailored HVAC systems for efficiency.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-cogs fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Advanced Optimization</h5>
                        <p class="text-muted">
                            Smart controls for energy savings.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-chart-line fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Ongoing Support</h5>
                        <p class="text-muted">
                            Continuous performance monitoring.
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
                <h2 class="display-5 mb-3">Why Optimize with Us?</h2>
                <p class="lead text-muted">
                    Achieve efficiency, sustainability, and comfort.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Savings</h5>
                        <p class="text-muted">
                            Reduced energy and operational costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Sustainability</h5>
                        <p class="text-muted">
                            Lower carbon footprint with green designs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Reliability</h5>
                        <p class="text-muted">
                            Robust systems for long-term performance.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Future-Proofing</h5>
                        <p class="text-muted">
                            Scalable designs for evolving needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Build a Smarter Future Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to optimize your HVAC systems? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
