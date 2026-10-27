@extends('frontend.layouts.main')

@section('meta_title', 'Embedded & Industrial IoT Solutions | TC Smart Technology')
@section('meta_description', 'Embedded engineering plus an approved Industrial IoT monitoring product, data logging, dashboards, OEE and machine-IIoT services for connected manufacturing.')
@section('meta_keywords', 'embedded systems; embedded hardware development; firmware development; PCB design; IoT product development; industrial automation; Industrial IoT monitoring product; temperature humidity AQI monitoring; smart manufacturing dashboard; OEE monitoring; machine IIoT; custom AI Agents; Delhi NCR')

@section('content')
    <!-- ============================================== -->
    <!-- 2. Hero Section (Brief V5 Section 4) -->
    <!-- Two-column hero with single visible H1, eyebrow, copy, CTAs, trust line -->
    <!-- ============================================== -->
    <section class="py-5 bg-gradient-light border-bottom position-relative overflow-hidden" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container py-4 py-lg-5">
            <div class="row align-items-center g-5">
                <!-- Left Column: Copy & Actions -->
                <div class="col-lg-7">
                    <!-- Eyebrow / badges -->
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                        <span class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-primary-subtle text-primary border border-primary-subtle">
                            <i class="fa fa-microchip"></i>
                            <span class="fw-bold small text-uppercase" style="letter-spacing: 0.08em; font-size: 0.76rem;">Schematics, Multilayer PCB, Firmware</span>
                        </span>
                        <span class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-secondary-subtle text-secondary border">
                            <i class="fa fa-robot"></i>
                            <span class="fw-bold small text-uppercase" style="letter-spacing: 0.08em; font-size: 0.76rem;">PLC/HMI, LabVIEW &amp; EOL Test Benches</span>
                        </span>
                    </div>

                    <!-- Single Visible H1 -->
                    <h1 class="display-5 fw-bold text-dark mb-3" style="letter-spacing: -0.02em; line-height: 1.2;">
                        Embedded Design and Industrial IoT Solutions for Connected Manufacturing
                    </h1>

                    <!-- Hero Copy -->
                    <p class="lead text-secondary mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                        TC Smart Technology helps businesses design embedded products and connect manufacturing operations through practical Industrial IoT solutions. Our primary capabilities include embedded hardware, firmware, PCB design, microcontroller and IoT device development, sensor integration, product testing, the approved Industrial IoT Monitoring Product, industrial data logging, smart manufacturing dashboards, OEE, machine IIoT, mold management and plant energy management.
                    </p>

                    <!-- CTAs -->
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-3 fw-semibold shadow-sm">
                            Discuss Your Project <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary px-4 py-3 fw-semibold">
                            Explore Our Services <i class="fa fa-chevron-right ms-1"></i>
                        </a>
                    </div>

                    <!-- Trust line -->
                    <div class="pt-3 border-top border-secondary-subtle">
                        <p class="extra-small fw-semibold text-uppercase text-secondary mb-0" style="font-size: 0.78rem; letter-spacing: 0.05em;">
                            <i class="fa fa-check-circle text-success me-2"></i><strong>Schematics, Multilayer PCB, Firmware</strong> &nbsp;|&nbsp; Industrial IoT &nbsp;|&nbsp; <strong>PLC/HMI, LabVIEW &amp; EOL Test Benches</strong> &nbsp;|&nbsp; Custom AI Agents
                        </p>
                    </div>
                </div>

                <!-- Right Column: Hero Visual Graphic -->
                <div class="col-lg-5">
                    <div class="position-relative">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-dark text-white p-4 p-md-5" style="background: radial-gradient(circle at 80% 20%, #1e293b 0%, #0f172a 100%);">
                            <div class="d-flex align-items-center justify-content-between mb-4 border-bottom border-secondary pb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="btn-square rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="fa fa-network-wired"></i>
                                    </div>
                                    <span class="fw-bold small text-light">Connected Architecture</span>
                                </div>
                                <span class="badge bg-success-subtle text-success small">Live Telemetry</span>
                            </div>

                            <!-- Mini Graphic Representation of 4 Core Pillars -->
                            <div class="d-flex flex-column gap-3">
                                <div class="p-3 rounded-3 bg-secondary bg-opacity-25 border border-secondary border-opacity-50 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa fa-microchip text-primary fs-5"></i>
                                        <div>
                                            <strong class="d-block small text-white">Embedded Product Engineering</strong>
                                            <span class="d-block extra-small text-light" style="font-size: 0.82rem; color: #e2e8f0 !important; font-weight: 500;">Schematics, Multilayer PCB, Firmware</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary-subtle text-primary extra-small">Priority</span>
                                </div>

                                <div class="p-3 rounded-3 bg-secondary bg-opacity-25 border border-secondary border-opacity-50 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa fa-chart-line text-info fs-5"></i>
                                        <div>
                                            <strong class="d-block small text-white">Industrial IoT & Smart Manufacturing</strong>
                                            <span class="d-block extra-small text-light" style="font-size: 0.82rem; color: #e2e8f0 !important; font-weight: 500;">10-Module OEE & Machine Telemetry</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-info-subtle text-info extra-small">Priority</span>
                                </div>

                                <div class="p-3 rounded-3 bg-secondary bg-opacity-25 border border-secondary border-opacity-50 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa fa-robot text-warning fs-5"></i>
                                        <div>
                                            <strong class="d-block small text-white">Industrial Automation & Robotics</strong>
                                            <span class="d-block extra-small text-light" style="font-size: 0.82rem; color: #e2e8f0 !important; font-weight: 500;">PLC/HMI, LabVIEW & EOL Test Benches</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning-subtle text-warning extra-small">Core</span>
                                </div>

                                <div class="p-3 rounded-3 bg-secondary bg-opacity-25 border border-secondary border-opacity-50 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="fa fa-brain text-success fs-5"></i>
                                        <div>
                                            <strong class="d-block small text-white">Custom AI Solutions & Agents</strong>
                                            <span class="d-block extra-small text-light" style="font-size: 0.82rem; color: #e2e8f0 !important; font-weight: 500;">11 Approved Agents • Human Oversight</span>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success extra-small">Governed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 3. Short Trust or Capability Strip -->
    <!-- ============================================== -->
    <section class="py-3 bg-white border-bottom">
        <div class="container">
            <div class="row g-3 text-center align-items-center">
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <i class="fa fa-microchip text-primary"></i>
                        <span class="small fw-semibold text-dark">Schematics, Multilayer PCB, Firmware</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <i class="fa fa-check-circle text-info"></i>
                        <span class="small fw-semibold text-dark">5 Approved IIoT Configs</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <i class="fa fa-check-circle text-warning"></i>
                        <span class="small fw-semibold text-dark">Automated EOL Verification</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <i class="fa fa-check-circle text-success"></i>
                        <span class="small fw-semibold text-dark">Human-in-the-Loop AI</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 4. Company Introduction (Brief V5 Section 5) -->
    <!-- Approved H2 and paragraph text -->
    <!-- ============================================== -->
    <section class="py-5 bg-white border-bottom">
        <div class="container py-3">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-10">
                    <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">COMPANY CAPABILITY OVERVIEW</span>
                    <h2 class="h3 fw-bold text-dark mt-2 mb-4">
                        Engineering and AI Solutions for Connected Products and Automated Industries
                    </h2>
                    <p class="text-secondary" style="line-height: 1.9; font-size: 1.05rem;">
                        TC Smart Technology is an engineering and technology solutions company specializing in Embedded Design & Development, Industrial Automation, Industrial IoT and Custom AI Solutions. We work with product companies, startups, factories, cold storage facilities, warehouses and service-based businesses to transform product ideas and manual processes into connected, monitored and intelligent solutions. Our capabilities cover embedded hardware design, firmware development, PCB development, IoT connectivity, product prototyping, PLC-HMI-VFD programming and integration, industrial robotics, automated testing, production traceability, smart manufacturing dashboards, environmental monitoring, automated reporting and approved AI workflows. Whether a customer is developing a new electronic product, automating production equipment, connecting manufacturing data, implementing environmental monitoring or building an approved custom AI Agent, our team can support the project from requirement analysis and system design to development, integration, testing and deployment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 5. Four Primary Service-Category Cards (Section 3.4 & 20) -->
    <!-- ============================================== -->
    <section class="py-5 bg-light border-bottom" id="categories">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">CORE TAXONOMY</span>
                <h3 class="h2 fw-bold text-dark">Four Core Engineering Domains</h3>
                <p class="text-muted small">Explore our structured service hierarchy from parent categories down to focused individual service pages.</p>
            </div>

            <div class="row g-4">
                @php
                    $categories = \App\Services\ServiceCatalog::getCategories();
                @endphp
                @foreach($categories as $catSlug => $cat)
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white transition hover-translate-y d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="btn-square rounded-3 bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="fa {{ $cat['icon'] }} fs-4"></i>
                                    </div>
                                    <span class="badge bg-light text-dark border px-3 py-1 rounded-pill small fw-semibold">
                                        {{ $cat['badge'] }}
                                    </span>
                                </div>
                                <h4 class="h4 fw-bold text-dark mb-2">
                                    <a href="{{ url('/services/' . $catSlug) }}" class="text-decoration-none text-dark hover-primary">
                                        {{ $cat['name'] }}
                                    </a>
                                </h4>
                                <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                    {{ $cat['overview'] }}
                                </p>
                                <div class="p-3 bg-light rounded-3 border-start border-3 border-primary mb-4">
                                    <span class="extra-small fw-bold text-muted text-uppercase d-block mb-1" style="font-size: 0.7rem;">Verified Domain Scope</span>
                                    <p class="m-0 text-dark extra-small fst-italic" style="font-size: 0.8rem;">{{ $cat['ai_hook'] }}</p>
                                </div>
                            </div>
                            <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                <a href="{{ url('/services/' . $catSlug) }}" class="btn btn-primary btn-sm px-3 py-2 fw-semibold">
                                    Explore {{ $cat['short_name'] }} <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                                <a href="{{ route('appointment.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2">
                                    Consult Engineer
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 6. Featured Priority Service Cards (Priority Group 1 & 2) -->
    <!-- Embedded Design & Development + Industrial IoT & Smart Manufacturing -->
    <!-- ============================================== -->
    <section class="py-5 bg-white border-bottom">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
                <div>
                    <span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-2">Priority Focus</span>
                    <h3 class="h3 fw-bold text-dark m-0">Featured Priority Engineering Services</h3>
                </div>
                <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-sm mt-3 mt-md-0">
                    View Complete Catalog (29 Services) <i class="fa fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @php
                    $priorities = \App\Services\ServiceCatalog::getPriorityServices();
                    $featuredSelection = array_slice($priorities, 0, 6, true);
                @endphp
                @foreach($featuredSelection as $pSlug => $pService)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-light d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="btn-square rounded-3 bg-white text-primary border d-inline-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                        <i class="fa {{ $pService['icon'] }} fs-5"></i>
                                    </div>
                                    <span class="badge bg-danger-subtle text-danger extra-small py-1 px-2 rounded-pill">Priority</span>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">
                                    <a href="{{ url('/services/' . $pService['category_slug'] . '/' . $pSlug) }}" class="text-decoration-none text-dark hover-primary">
                                        {{ $pService['name'] }}
                                    </a>
                                </h5>
                                <p class="text-muted extra-small mb-3" style="line-height: 1.6;">
                                    {{ $pService['short_desc'] }}
                                </p>
                            </div>
                            <div class="pt-3 border-top mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ url('/services/' . $pService['category_slug'] . '/' . $pSlug) }}" class="text-primary fw-semibold extra-small text-decoration-none">
                                    Full Solution Specs <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                                <a href="{{ route('appointment.index') }}" class="text-muted extra-small text-decoration-none">Inquire &rarr;</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 7. Featured Hardware Product from Existing Catalogue -->
    <!-- Featuring the Industrial IoT Monitoring Product (5 Configs) -->
    <!-- ============================================== -->
    <section class="py-5 bg-light border-bottom">
        <div class="container py-3">
            <div class="card border-primary border-2 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-body p-4 p-lg-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-8">
                            <span class="badge bg-primary text-uppercase px-3 py-1 rounded-pill mb-2">FEATURED HARDWARE APPLIANCE</span>
                            <h3 class="display-6 fw-bold text-dark mb-2">Industrial IoT Monitoring Product</h3>
                            <p class="lead text-secondary mb-3" style="font-size: 1rem; line-height: 1.7;">
                                TC Smart Technology offers one Industrial IoT monitoring product for collecting, transmitting, storing, visualizing and reporting approved environmental and facility data. Available strictly in five approved configurations.
                            </p>

                            <div class="row g-2 mb-4">
                                <div class="col-md-6">
                                    <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                        <i class="fa fa-thermometer-half text-danger"></i>
                                        <span>1. Temperature Monitoring</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                        <i class="fa fa-tint text-info"></i>
                                        <span>2. Temp & Humidity Monitoring</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                        <i class="fa fa-smog text-secondary"></i>
                                        <span>3. Temp, Humidity & AQI</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                        <i class="fa fa-door-open text-warning"></i>
                                        <span>4. Temp, Humidity, AQI & Door</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                        <i class="fa fa-plug text-success"></i>
                                        <span>5. Temp, Humidity, AQI, Door Status & Power On/Off Status</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ url('/product/industrial-iot-monitoring-product') }}" class="btn btn-primary fw-semibold px-4 py-2">
                                    Request Configuration & Quote <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                                <a href="{{ route('products.listing') }}" class="btn btn-outline-secondary fw-semibold px-4 py-2">
                                    View Full Product Catalogue
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="p-4 bg-light rounded-4 border text-center">
                                <i class="fa fa-satellite-dish text-primary fs-1 mb-3"></i>
                                <h6 class="fw-bold text-dark mb-2">Multi-Location Telemetry</h6>
                                <p class="extra-small text-muted mb-3" style="font-size: 0.8rem; line-height: 1.5;">
                                    Real-time dashboards, historical trend logs, configurable threshold alerts, and automated audit-supporting shift reports.
                                </p>
                                <span class="badge bg-success-subtle text-success extra-small">Plug-and-Play Setup</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 8. Why Choose TC Smart Technology (Brief V5 Section 12) -->
    <!-- Exact 7 approved capability pillars -->
    <!-- ============================================== -->
    <section class="py-5 bg-white border-bottom">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">ENGINEERING DIFFERENTIATION</span>
                <h3 class="h2 fw-bold text-dark">Why Choose TC Smart Technology?</h3>
                <p class="text-muted small">Our systems engineering mindset brings hardware, cloud connectivity, and controls together seamlessly.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Requirement-Focused Engineering</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Begin with the application, operational process, and business requirement before recommending technology or hardware platforms.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Combined Technical Capabilities</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Bring together embedded electronics, real-time firmware, industrial automation, IoT monitoring, and AI-assisted workflows under one roof.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-expand-arrows-alt"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Custom and Scalable Design</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Plan functionality, integration interfaces, multi-location deployment, and future expansion around the approved project scope.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-vial"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Testing and Validation Support</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Support communication checks, sensor validation, functional boundary testing, and workflow verification before volume release.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-plug"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Existing-System Integration</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Integrate monitoring, automation, or AI functionality with existing legacy equipment and approved business systems where technically feasible.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="btn-square rounded-circle bg-primary text-white mb-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="fa fa-user-shield"></i>
                        </div>
                        <h5 class="fw-bold text-dark h6 mb-2">Human-Controlled AI</h5>
                        <p class="small text-muted mb-0" style="line-height: 1.6;">Use approval workflows, granular access control, and human review for important customer, business, and operational actions.</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="p-3 rounded-4 bg-light border text-center">
                        <h5 class="fw-bold text-dark h6 mb-1"><i class="fa fa-file-alt text-primary me-2"></i>Documentation and Support</h5>
                        <p class="small text-muted mb-0">Provide agreed documentation, deployment guidance, troubleshooting, and post-deployment technical support across all engagements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 9. Development and Delivery Process (Section 13) -->
    <!-- "From Requirement to Deployment" - 5 Steps -->
    <!-- ============================================== -->
    <section class="py-5 bg-light border-bottom">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">DELIVERY LIFECYCLE</span>
                <h3 class="h2 fw-bold text-dark">From Requirement to Deployment</h3>
                <p class="text-muted small">A disciplined five-stage engineering workflow from concept qualification to on-site commissioning.</p>
            </div>

            <div class="row g-4 text-center">
                <div class="col-lg col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-2xs border h-100">
                        <div class="display-6 fw-bold text-primary mb-2">01</div>
                        <h5 class="fw-bold text-dark h6 mb-2">Requirement Analysis</h5>
                        <p class="extra-small text-muted mb-0" style="line-height: 1.5;">Understand the product idea, industrial process, monitoring challenge or business workflow.</p>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-2xs border h-100">
                        <div class="display-6 fw-bold text-primary mb-2">02</div>
                        <h5 class="fw-bold text-dark h6 mb-2">Solution Architecture</h5>
                        <p class="extra-small text-muted mb-0" style="line-height: 1.5;">Plan the necessary hardware, firmware, automation, communication, cloud and AI components.</p>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-2xs border h-100">
                        <div class="display-6 fw-bold text-primary mb-2">03</div>
                        <h5 class="fw-bold text-dark h6 mb-2">Design and Development</h5>
                        <p class="extra-small text-muted mb-0" style="line-height: 1.5;">Develop the approved deliverables according to the defined scope and milestones.</p>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-2xs border h-100">
                        <div class="display-6 fw-bold text-primary mb-2">04</div>
                        <h5 class="fw-bold text-dark h6 mb-2">Integration and Testing</h5>
                        <p class="extra-small text-muted mb-0" style="line-height: 1.5;">Integrate and test hardware, firmware, sensors, automation, dashboards and workflows.</p>
                    </div>
                </div>

                <div class="col-lg col-md-6">
                    <div class="p-4 rounded-4 bg-white shadow-2xs border h-100">
                        <div class="display-6 fw-bold text-primary mb-2">05</div>
                        <h5 class="fw-bold text-dark h6 mb-2">Deployment and Support</h5>
                        <p class="extra-small text-muted mb-0" style="line-height: 1.5;">Deploy the solution with agreed documentation, training and technical support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 10. Case Studies / Project Evidence Callout -->
    <!-- ============================================== -->
    <section class="py-5 bg-white border-bottom">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">VERIFIED IMPLEMENTATIONS</span>
                    <h3 class="h2 fw-bold text-dark mb-3">Field Evidence & Client Case Studies</h3>
                    <p class="text-secondary mb-4" style="line-height: 1.8;">
                        Review our documented deployments across cold chain monitoring, injection molding shopfloor OEE telemetry, custom microcontroller PCB designs, and automated test benches. All case studies respect client confidentiality and reflect genuine audit-supporting records.
                    </p>
                    <a href="{{ route('case_studies.index') }}" class="btn btn-outline-primary px-4 py-2 fw-semibold">
                        Explore Project Case Studies <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-light border-start border-4 border-primary">
                        <h6 class="fw-bold text-dark mb-3">Recent Engineering Highlights</h6>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small text-secondary">
                            <li><i class="fa fa-check text-success me-2"></i> 12-Chamber Cold Storage Telemetry & Door Audit Logging</li>
                            <li><i class="fa fa-check text-success me-2"></i> 18-Press Injection Molding Machine OEE & Downtime System</li>
                            <li><i class="fa fa-check text-success me-2"></i> Custom 4-Layer RS-485 Modbus Industrial Controller Board</li>
                            <li><i class="fa fa-check text-success me-2"></i> Automated NI LabVIEW End-of-Line Quality Test Bench</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 11. Homepage FAQs (Brief V5 Section 14) -->
    <!-- Exactly the 12 approved Q&A entries -->
    <!-- ============================================== -->
    <section class="py-5 bg-light border-bottom" id="faqs">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">FREQUENTLY ASKED QUESTIONS</span>
                <h3 class="h2 fw-bold text-dark">Frequently Asked Questions</h3>
                <p class="text-muted small">Direct, verified answers to common questions about our services and capabilities.</p>
            </div>

            @php
                $homepageFaqs = [
                    [
                        'q' => 'What embedded development services does TC Smart Technology provide?',
                        'a' => 'TC Smart Technology provides embedded hardware design, firmware development, PCB design, microcontroller programming, sensor integration, IoT device development, communication integration, prototyping, testing and existing-product improvement services.'
                    ],
                    [
                        'q' => 'Do you provide an Industrial IoT monitoring product?',
                        'a' => 'We offer one Industrial IoT Monitoring Product with five approved configurations for temperature, humidity, AQI, door status and power on/off status. Broader data, dashboard and machine requirements are assessed under the relevant project-based Industrial IoT service.'
                    ],
                    [
                        'q' => 'Can you develop a cold storage monitoring system?',
                        'a' => 'Yes. We can develop temperature and humidity monitoring solutions based on the number of chambers, sensor locations, connectivity, alert rules, dashboard and reporting requirements.'
                    ],
                    [
                        'q' => 'Do you provide PLC, HMI and VFD programming and integration?',
                        'a' => 'Yes. We provide a combined PLC, HMI and VFD programming and integration service covering control logic, machine sequencing, operator screens, parameters, alarms, trends, motor-speed control, drive status and faults, industrial communication, commissioning support and functional testing. Final scope depends on the selected platforms, machine requirements, electrical design and safety responsibilities.'
                    ],
                    [
                        'q' => 'What types of AI agents can you develop?',
                        'a' => 'TC Smart Technology offers the eleven approved AI Agents listed in this brief: Marketing, SEO, Website Audit, Google Business Profile, RAG, Personal AI Assistant, Lead Generation, WhatsApp, LinkedIn, Gmail and Voice Calling AI Agents. Each solution is configured around an approved purpose, data sources, permissions, review stages and escalation rules.'
                    ],
                    [
                        'q' => 'Can you develop a Google Business Profile AI solution?',
                        'a' => 'We can develop an AI-assisted solution for business-description drafts, service content, post ideas, review-response drafts, profile checks and performance summaries. An authorized business representative should review and approve profile changes and responses.'
                    ],
                    [
                        'q' => 'Do you provide a LinkedIn AI Agent?',
                        'a' => 'We provide AI-assisted LinkedIn profile content, lead-research frameworks, personalized message drafts, post planning and follow-up support. We do not recommend unauthorized scraping, automatic bulk messaging or inauthentic engagement.'
                    ],
                    [
                        'q' => 'Do you provide standard machines or HVAC services?',
                        'a' => 'No. TC Smart Technology focuses on Embedded Design & Development, Industrial Automation, Industrial IoT and Custom AI Solutions.'
                    ],
                    [
                        'q' => 'Can you connect existing production machines to an Industrial IoT dashboard?',
                        'a' => 'Yes, subject to technical assessment and approved access. Compatible machines may be connected through PLC communication, existing controller protocols, digital or analogue signals, counters, sensors or edge gateways. Available data may support machine status, counts, cycle time, downtime, alarms, selected process values, OEE and reports without bypassing machine safety controls.'
                    ],
                    [
                        'q' => 'Can you develop OEE and smart manufacturing dashboards?',
                        'a' => 'Yes. We can develop dashboards for production status, target versus actual output, downtime, cycle-time trends, rejection data and OEE. Availability, Performance and Quality formulas and their source data must be agreed with the customer so the displayed OEE reflects the approved production rules.'
                    ],
                    [
                        'q' => 'Do you provide mold and plant energy management solutions?',
                        'a' => 'Yes. Mold management may cover identity, allocation, usage, shot count, maintenance and repair history. Plant energy management may collect approved meter and machine data for consumption, demand, load and energy-intensity dashboards. Final capabilities depend on available data, meters, interfaces and site requirements.'
                    ],
                    [
                        'q' => 'Can you automate the purging sequence of an injection molding machine?',
                        'a' => 'Yes, subject to machine compatibility, approved controller access and a validated purging procedure. The solution may provide recipe-based steps, machine-ready and temperature interlocks, operator prompts, configurable sequence timing, progress indication, alarm handling and event records. It must not bypass machine safety systems, and the final process must be approved for the machine and material.'
                    ]
                ];
            @endphp

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="homepageFaqAccordion">
                        @foreach($homepageFaqs as $fIndex => $hFaq)
                            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-2xs">
                                <h2 class="accordion-header" id="hFaqHeading{{ $fIndex }}">
                                    <button class="accordion-button fw-bold text-dark {{ $fIndex == 0 ? '' : 'collapsed' }} bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#hFaqCollapse{{ $fIndex }}" aria-expanded="{{ $fIndex == 0 ? 'true' : 'false' }}" aria-controls="hFaqCollapse{{ $fIndex }}">
                                        {{ $hFaq['q'] }}
                                    </button>
                                </h2>
                                <div id="hFaqCollapse{{ $fIndex }}" class="accordion-collapse collapse {{ $fIndex == 0 ? 'show' : '' }}" aria-labelledby="hFaqHeading{{ $fIndex }}" data-bs-parent="#homepageFaqAccordion">
                                    <div class="accordion-body bg-white text-secondary small" style="line-height: 1.8;">
                                        {{ $hFaq['a'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- 12. Final Call to Action (Brief V5 Section 15) -->
    <!-- Exact approved title, copy, and buttons -->
    <!-- ============================================== -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container py-4">
            <h3 class="display-6 fw-bold text-white mb-3">Have an Embedded, Automation, IoT or AI Project?</h3>
            <p class="text-light-50 mx-auto mb-4" style="max-width: 750px; color: #cbd5e1; font-size: 1.05rem; line-height: 1.8;">
                Share your product idea, industrial requirement, monitoring challenge or business workflow with our team. We will help you identify a practical technical approach based on your objectives, operating environment and application requirements.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-3 fw-semibold">
                    Request a Consultation <i class="fa fa-calendar-alt ms-2"></i>
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-light px-4 py-3 fw-semibold">
                    Send Your Requirement
                </a>
                <a href="tel:+917065122884" class="btn btn-outline-light px-4 py-3 fw-semibold">
                    <i class="fa fa-phone-alt me-2"></i>Contact Our Team
                </a>
            </div>
        </div>
    </section>

    <!-- Schema.org Organization, WebSite & FAQPage JSON-LD -->
@endsection

@push('schema')
@php
    $schemaFaqs = [];
    foreach($homepageFaqs as $hf) {
        $schemaFaqs[] = [
            '@type' => 'Question',
            'name' => $hf['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $hf['a']
            ]
        ];
    }
@endphp
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $schemaFaqs
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush
