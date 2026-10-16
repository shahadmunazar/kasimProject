@extends('frontend.layouts.main')

@section('meta_title', 'About TC Smart Technology | Embedded Engineering & Industrial IoT Solutions')
@section('meta_description', 'Learn about TC Smart Technology: engineering smarter connected products and operations through Embedded Design & Development, Industrial IoT, Smart Manufacturing, Industrial Automation, and Governed AI Agents.')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
    <div class="container text-center py-5">
        <span class="badge bg-primary px-3 py-2 text-uppercase mb-3" style="letter-spacing: 1px;">Company Overview</span>
        <h1 class="display-4 text-white fw-bold mb-3">About TC Smart Technology</h1>
        <p class="text-white-50 fs-5 mb-4 max-w-750 mx-auto">Engineering and AI Solutions for Connected Products and Automated Industries</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Company Mission & Introduction Start -->
<div class="container py-5">
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <span class="badge bg-teal-soft text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-3">Who We Are</span>
            <h2 class="display-6 fw-bold text-dark mb-4">Engineering Smarter Products, Processes and Businesses</h2>
            <p class="text-secondary lead fs-6 mb-3" style="line-height: 1.8;">
                TC Smart Technology is an engineering and technology solutions company specializing in <strong>Embedded Design & Development</strong>, <strong>Industrial Automation</strong>, <strong>Industrial IoT</strong>, and <strong>Custom AI Solutions</strong>.
            </p>
            <p class="text-secondary mb-4" style="line-height: 1.8;">
                We work with product companies, startups, factories, cold storage facilities, warehouses, and industrial operations to transform product ideas and manual processes into connected, monitored, and intelligent solutions.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('services.index') }}" class="btn btn-primary px-4 py-3 rounded-pill fw-bold shadow-sm">
                    <i class="fa fa-layer-group me-2"></i>Explore Our Services
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-dark px-4 py-3 rounded-pill fw-bold">
                    <i class="fa fa-envelope me-2"></i>Contact Our Team
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa fa-shield-alt text-primary me-2"></i>Our Core Engineering Focus</h5>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-primary text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fa fa-microchip"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Embedded Design & Development</h6>
                            <p class="small text-muted mb-0">Hardware architecture, firmware, PCB design, microcontroller products, IoT devices, testing, and pilot production support.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-primary text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fa fa-network-wired"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Industrial IoT & Smart Manufacturing</h6>
                            <p class="small text-muted mb-0">Single approved monitoring product (5 configs), industrial data logging, centralized dashboards, OEE, and machine connectivity.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-primary text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Industrial Automation Services</h6>
                            <p class="small text-muted mb-0">PLC-HMI-VFD programming, industrial robotics integration, automated test systems (LabVIEW, TestStand, EOL), and production traceability.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fa fa-robot"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Custom AI Agent Development</h6>
                            <p class="small text-muted mb-0">Eleven governed AI Agents for marketing, SEO, knowledge retrieval, lead generation, WhatsApp, Gmail, and voice workflows with human control.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Company Mission & Introduction End -->

<!-- Primary Capabilities Overview Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge bg-teal-soft text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Our Capabilities</span>
            <h2 class="fw-bold text-dark">Comprehensive Engineering & IIoT Capabilities</h2>
            <p class="text-muted max-w-750 mx-auto">From circuit schematics to factory floor telemetry, we deliver verified solutions tailored to real-world operational environments.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift">
                    <div class="mx-auto mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fa fa-microchip"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Embedded Engineering</h5>
                    <p class="text-secondary small mb-3">Custom electronics, multi-layer PCB layouts, low-power microcontrollers, firmware in C/C++, Embedded Linux, RTOS, and validated prototypes.</p>
                    <a href="{{ route('services.embedded_design_development') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-auto fw-bold">Explore Embedded</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift">
                    <div class="mx-auto mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fa fa-chart-line"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Industrial IoT & OEE</h5>
                    <p class="text-secondary small mb-3">Environmental monitoring (5 configs), industrial data logging, centralized dashboards, multi-site visibility, mold tracking, and energy management.</p>
                    <a href="{{ route('services.industrial_iot_solutions') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-auto fw-bold">Explore IIoT</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift">
                    <div class="mx-auto mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Automation & Testing</h5>
                    <p class="text-secondary small mb-3">Integrated PLC/HMI/VFD logic, compatible robot integration, LabVIEW & TestStand test stations, EOL verification benches, and traceability.</p>
                    <a href="{{ route('services.industrial_automation_services') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-auto fw-bold">Explore Automation</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift">
                    <div class="mx-auto mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fa fa-brain"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Custom AI Agents</h5>
                    <p class="text-secondary small mb-3">Governed, human-supervised AI agents for marketing, search intent, knowledge retrieval (RAG), lead outreach, WhatsApp, and voice communications.</p>
                    <a href="{{ route('services.ai_solutions_custom_ai_agents') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-auto fw-bold">Explore AI Agents</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Primary Capabilities Overview End -->

<!-- Why Choose TC Smart Technology Start (Section 12) -->
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-teal-soft text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Our Value Proposition</span>
        <h2 class="fw-bold text-dark">Why Choose TC Smart Technology?</h2>
        <p class="text-muted max-w-750 mx-auto">We combine engineering rigor, hands-on industrial domain experience, and governed intelligent workflows.</p>
    </div>

    <div class="row g-4">
        @php
            $reasons = [
                ['icon' => 'fa-clipboard-check', 'title' => 'Requirement-Focused Engineering', 'desc' => 'We begin with the application, physical process, and commercial requirement before selecting microcontrollers, protocols, or cloud platforms.'],
                ['icon' => 'fa-cubes', 'title' => 'Combined Technical Capabilities', 'desc' => 'We unite embedded electronics, firmware development, industrial automation, IoT monitoring, and governed AI-assisted workflows under one roof.'],
                ['icon' => 'fa-drafting-compass', 'title' => 'Custom and Scalable Design', 'desc' => 'We plan functionality, hardware architecture, interface security, and future system expansion around your approved project scope.'],
                ['icon' => 'fa-vial', 'title' => 'Testing and Validation Support', 'desc' => 'We support communication checks, sensor calibration planning, environmental limit validation, and comprehensive regression test suites.'],
                ['icon' => 'fa-plug', 'title' => 'Existing-System Integration', 'desc' => 'We interface modern monitoring, automation, and AI functionality with legacy machinery, standard PLCs, and existing business software.'],
                ['icon' => 'fa-user-shield', 'title' => 'Human-Controlled AI', 'desc' => 'All AI agent solutions are engineered with transparent permissions, source citations, strict guardrails, and human sign-off for critical decisions.'],
                ['icon' => 'fa-file-alt', 'title' => 'Documentation and Support', 'desc' => 'We deliver complete design schematics, source repositories, register maps, deployment guides, operator manuals, and responsive technical support.']
            ];
        @endphp

        @foreach($reasons as $reason)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border rounded-4 p-4 shadow-sm hover-lift">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-3 p-3 me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fa {{ $reason['icon'] }}"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0 fs-6">{{ $reason['title'] }}</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">{{ $reason['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Why Choose TC Smart Technology End -->

<!-- Delivery Process Start (Section 13) -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge bg-teal-soft text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Methodology</span>
            <h2 class="fw-bold text-dark">From Requirement to Deployment</h2>
            <p class="text-muted max-w-750 mx-auto">Our structured, milestone-driven engineering approach ensures transparency, technical validity, and measurable results.</p>
        </div>

        <div class="row g-4">
            @php
                $steps = [
                    ['step' => '01', 'title' => 'Requirement Analysis', 'desc' => 'We understand the product concept, operating environment, industrial equipment, monitoring limits, or operational workflow.'],
                    ['step' => '02', 'title' => 'Solution Architecture', 'desc' => 'We plan the electronic architecture, firmware stacks, sensor interfaces, communication protocols, database schema, and cloud views.'],
                    ['step' => '03', 'title' => 'Design & Development', 'desc' => 'We develop schematics, PCB layouts, firmware code, PLC logic, telemetry pipelines, and agent prompts to agreed milestones.'],
                    ['step' => '04', 'title' => 'Integration & Testing', 'desc' => 'We verify hardware, firmware, sensors, communication robustness, safety interlocks, and end-to-end dashboard workflows.'],
                    ['step' => '05', 'title' => 'Deployment & Support', 'desc' => 'We deploy the system on-site or in the cloud with complete documentation, user training, revision records, and technical support.']
                ];
            @endphp

            @foreach($steps as $s)
            <div class="col-md-6 col-lg-4 col-xl">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center">
                    <div class="display-6 fw-bold text-primary mb-2">{{ $s['step'] }}</div>
                    <h6 class="fw-bold text-dark mb-2">{{ $s['title'] }}</h6>
                    <p class="text-secondary small mb-0">{{ $s['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Delivery Process End -->

<!-- Final CTA Start -->
<div class="container py-5">
    <div class="card border-0 rounded-4 p-5 text-center shadow-lg" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="max-w-750 mx-auto">
            <span class="badge bg-primary px-3 py-2 text-uppercase mb-3" style="letter-spacing: 1px;">Start Your Project</span>
            <h2 class="display-6 fw-bold text-white mb-3">Have an Embedded, Automation, IoT or AI Requirement?</h2>
            <p class="text-white-50 lead mb-4 fs-6">Share your product idea, monitoring challenge, or automation goal with our engineering team for a practical, requirement-focused technical consultation.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('contact.index') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow">
                    <i class="fa fa-calendar-check me-2"></i>Request a Consultation
                </a>
                <a href="{{ route('services.index') }}" class="btn btn-outline-light px-5 py-3 rounded-pill fw-bold">
                    <i class="fa fa-layer-group me-2"></i>Explore All Services
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Final CTA End -->
@endsection
