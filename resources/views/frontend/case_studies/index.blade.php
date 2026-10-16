@extends('frontend.layouts.main')

@section('meta_title', 'Engineering Case Studies & Project Evidence | TC Smart Technology')
@section('meta_description', 'Explore verified project case studies and implementation evidence across embedded electronics, Industrial IoT telemetry, automated testing and custom AI agents.')
@section('meta_keywords', 'engineering case studies, industrial IoT case studies, embedded electronics evidence, TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Case Studies',
        'breadcrumb' => [
            ['label' => 'Case Studies', 'url' => route('case_studies.index')]
        ]
    ])

    <!-- Introduction Section -->
    <section class="py-5 bg-white border-bottom">
        <div class="container text-center py-2">
            <span class="badge bg-primary-subtle text-primary px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-3" style="letter-spacing: 0.08em;">
                PROVEN ENGINEERING & AUDIT-SUPPORTING RECORDS
            </span>
            <h1 class="display-6 fw-bold text-dark mb-3">Project Case Studies & Implementation Evidence</h1>
            <p class="lead text-secondary mx-auto mb-4" style="max-width: 800px; line-height: 1.8;">
                Real-world deployments across embedded product engineering, manufacturing machine telemetry, automated end-of-line testing benches, and governed AI workflow automation.
            </p>
        </div>
    </section>

    <!-- Case Studies Grid -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-4">
                <!-- Case Study 1: Cold Storage IIoT -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-info-subtle text-info fw-semibold py-1 px-3 rounded-pill">Industrial IoT Solutions</span>
                                <span class="text-muted extra-small">Temperature & Door Status</span>
                            </div>
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Multi-Chamber Cold Storage Monitoring & Door-Open Duration Tracking
                            </h2>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                A multi-site pharmaceutical and seed storage facility required centralized monitoring across 12 cold chambers. We deployed the approved Industrial IoT monitoring product with precision temperature, humidity, and door-status sensors.
                            </p>
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <h6 class="extra-small fw-bold text-uppercase text-muted mb-2">Technical Delivery:</h6>
                                <ul class="list-unstyled mb-0 extra-small text-secondary d-flex flex-column gap-1">
                                    <li><i class="fa fa-check text-success me-1"></i> Multi-point RTD temperature sampling with continuous local buffering</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Door magnetic switch integration recording door-open duration</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Centralized web dashboard with automated daily temperature audit logs</li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted extra-small fst-italic">Field Implementation Evidence</span>
                            <a href="{{ url('/product/industrial-iot-monitoring-product') }}" class="btn btn-sm btn-outline-primary">View Product Specs</a>
                        </div>
                    </div>
                </div>

                <!-- Case Study 2: Smart Manufacturing OEE -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-primary-subtle text-primary fw-semibold py-1 px-3 rounded-pill">Smart Manufacturing & OEE</span>
                                <span class="text-muted extra-small">Plastics Injection Molding</span>
                            </div>
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Injection Molding Shopfloor Machine Connectivity & OEE Telemetry
                            </h2>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                An automotive injection molding plant with 18 machines sought to eliminate manual downtime tally sheets. We connected machine controllers to an industrial IoT platform, capturing cycle times, mold assignments, and stoppage categories.
                            </p>
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <h6 class="extra-small fw-bold text-uppercase text-muted mb-2">Technical Delivery:</h6>
                                <ul class="list-unstyled mb-0 extra-small text-secondary d-flex flex-column gap-1">
                                    <li><i class="fa fa-check text-success me-1"></i> Real-time machine status dashboard across all 18 molding presses</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Automatic shot counting and mold changeover duration analytics</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Agreed OEE calculation (Availability, Performance, Quality) with shift reports</li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted extra-small fst-italic">Production Plant Deployment</span>
                            <a href="{{ url('/services/industrial-iot-solutions/injection-molding-machine-iiot') }}" class="btn btn-sm btn-outline-primary">Explore Solution</a>
                        </div>
                    </div>
                </div>

                <!-- Case Study 3: Embedded Hardware & Firmware -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-danger-subtle text-danger fw-semibold py-1 px-3 rounded-pill">Embedded Product Engineering</span>
                                <span class="text-muted extra-small">Microcontroller & PCB</span>
                            </div>
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Low-Power Industrial Controller Board with RS-485 Modbus & Battery Backup
                            </h2>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                An industrial sensing company required a custom electronic board with 4-layer PCB layout, transient protection, ultra-low power standby, and dual RS-485 Modbus RTU ports for harsh electrical substation environments.
                            </p>
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <h6 class="extra-small fw-bold text-uppercase text-muted mb-2">Technical Delivery:</h6>
                                <ul class="list-unstyled mb-0 extra-small text-secondary d-flex flex-column gap-1">
                                    <li><i class="fa fa-check text-success me-1"></i> Complete schematic capture & 4-layer PCB layout with TVS surge protection</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Modular embedded C firmware with non-volatile logging in SPI Flash</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Functional bench verification & automated test fixture documentation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted extra-small fst-italic">Commercial Hardware Release</span>
                            <a href="{{ url('/services/embedded-design-development/embedded-hardware-design') }}" class="btn btn-sm btn-outline-primary">Hardware Specs</a>
                        </div>
                    </div>
                </div>

                <!-- Case Study 4: Automated EOL Testing & Traceability -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-warning-subtle text-warning fw-semibold py-1 px-3 rounded-pill">Industrial Automation</span>
                                <span class="text-muted extra-small">End-of-Line QA</span>
                            </div>
                            <h2 class="h4 fw-bold text-dark mb-3">
                                Automated End-of-Line Test Bench & 2D Barcode Traceability System
                            </h2>
                            <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                An automotive electronics manufacturer needed to screen 100% of finished control modules for voltage accuracy, firmware communication, and insulation resistance prior to packaging.
                            </p>
                            <div class="p-3 bg-light rounded-3 mb-4">
                                <h6 class="extra-small fw-bold text-uppercase text-muted mb-2">Technical Delivery:</h6>
                                <ul class="list-unstyled mb-0 extra-small text-secondary d-flex flex-column gap-1">
                                    <li><i class="fa fa-check text-success me-1"></i> Automated pneumatic clamping fixture with golden sample validation</li>
                                    <li><i class="fa fa-check text-success me-1"></i> NI LabVIEW measurement sequence executing in under 30 seconds</li>
                                    <li><i class="fa fa-check text-success me-1"></i> Direct database logging and automated barcode pass-label printer trigger</li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted extra-small fst-italic">Quality Station Commissioning</span>
                            <a href="{{ url('/services/industrial-automation/test-bench-end-of-line-testing-automation') }}" class="btn btn-sm btn-outline-primary">Testing Specs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation CTA -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container py-3">
            <h3 class="fw-bold text-white mb-3">Have a Similar Engineering Challenge?</h3>
            <p class="text-light-50 mx-auto mb-4" style="max-width: 650px; color: #cbd5e1;">
                Consult with our systems engineers to evaluate feasibility, architecture, and deployment schedules tailored to your facility.
            </p>
            <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                Request an Engineering Consultation <i class="fa fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>
@endsection
