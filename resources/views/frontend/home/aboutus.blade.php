@extends('frontend.layouts.main')

@section('meta_title', 'About TC Smart Technology | IoT, AI, PCB Design & Automation')
@section('meta_description', 'Discover TC Smart Technology, a New Delhi-based provider of Embedded Systems, PCB Design, Industrial IoT, Automation, AI Software, WhatsApp API and Temperature Monitoring solutions.')
@section('meta_keywords', 'TC Smart Technology, Embedded Systems Development Company, PCB Design Services, Industrial IoT Solutions, Industrial Automation Solutions, Custom AI Development, WhatsApp Business API Integration, AI Voice Calling API, Temperature Monitoring System, Temperature Data Logger')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        position: relative;
        overflow: hidden;
    }
    .about-hero::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: radial-gradient(circle at 80% 20%, rgba(223, 155, 21, 0.15), transparent 50%);
        pointer-events: none;
    }
    .badge-soft-primary {
        background-color: rgba(223, 155, 21, 0.12);
        color: #df9b15;
        border: 1px solid rgba(223, 155, 21, 0.25);
    }
    .service-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border: 1px solid #e2e8f0;
        background: #ffffff;
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08) !important;
        border-color: #cbd5e1;
    }
    .service-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .feature-check-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }
    .feature-check-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 10px;
        font-size: 0.95rem;
        color: #334155;
    }
    .feature-check-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #df9b15;
        font-size: 0.85rem;
    }
    .why-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
    }
    .why-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        border-color: #df9b15;
    }
    .mission-vision-card {
        border-radius: 1.25rem;
        position: relative;
        overflow: hidden;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid about-hero py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge bg-primary px-3 py-2 text-uppercase mb-3 fw-semibold" style="letter-spacing: 1px;">About Us</span>
        <h1 class="display-5 text-white fw-bold mb-3">About TC Smart Technology – Embedded Systems, IoT, AI &amp; Automation Solutions</h1>
        <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 820px;">
            Smart Technology. Innovative Engineering. Reliable Solutions.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Company Introduction Start -->
<div class="container py-4 py-lg-5">
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <span class="badge badge-soft-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-3">About Our Company</span>
            <h2 class="display-6 fw-bold text-dark mb-4">Smart Technology. Innovative Engineering. Reliable Solutions.</h2>
            <p class="text-secondary lead fs-6 mb-3" style="line-height: 1.8;">
                <strong>TC Smart Technology</strong> is a technology and engineering solutions company based in New Delhi, India, focused on delivering innovative solutions in <strong>Embedded Systems, PCB Design, Industrial IoT, Industrial Automation, AI Development, and Temperature Monitoring Systems</strong>.
            </p>
            <p class="text-secondary mb-3" style="line-height: 1.8;">
                We help businesses transform their ideas into practical, reliable, and scalable technology solutions. From custom electronic hardware and intelligent monitoring devices to AI-powered software and industrial automation, our goal is to make technology work smarter for businesses.
            </p>
            <p class="text-secondary mb-4" style="line-height: 1.8;">
                With a focus on engineering, innovation, and customer requirements, we develop customized solutions for industrial applications, manufacturing facilities, commercial businesses, and technology-driven organizations.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('services.index') }}" class="btn btn-primary px-4 py-3 rounded-pill fw-bold shadow-sm">
                    <i class="fa fa-layer-group me-2"></i>Explore Our Services
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-dark px-4 py-3 rounded-pill fw-bold">
                    <i class="fa fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                <div class="card-body p-4 p-md-5 text-white">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary text-white rounded-3 p-3 me-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                            <i class="fa fa-microchip fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-white">TC Smart Technology</h4>
                            <small class="text-white-50">New Delhi, India</small>
                        </div>
                    </div>
                    <hr class="border-secondary mb-4">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10">
                                <i class="fa fa-drafting-compass text-primary mb-2 fs-5"></i>
                                <h6 class="text-white fw-bold mb-1">Embedded &amp; PCB</h6>
                                <p class="text-white-50 small mb-0">Hardware, Firmware &amp; Prototyping</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10">
                                <i class="fa fa-network-wired text-primary mb-2 fs-5"></i>
                                <h6 class="text-white fw-bold mb-1">Industrial IoT</h6>
                                <p class="text-white-50 small mb-0">Telemetry, Dashboards &amp; SCADA</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10">
                                <i class="fa fa-robot text-primary mb-2 fs-5"></i>
                                <h6 class="text-white fw-bold mb-1">Custom AI &amp; Software</h6>
                                <p class="text-white-50 small mb-0">Agents, WhatsApp &amp; Voice API</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-white bg-opacity-10">
                                <i class="fa fa-temperature-high text-primary mb-2 fs-5"></i>
                                <h6 class="text-white fw-bold mb-1">Data Loggers</h6>
                                <p class="text-white-50 small mb-0">Cold Storage &amp; Temperature Systems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Company Introduction End -->

<!-- What We Do Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge badge-soft-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Our Capabilities</span>
            <h2 class="display-6 fw-bold text-dark">What We Do</h2>
            <p class="text-muted mx-auto" style="max-width: 750px;">
                End-to-end technology and engineering services designed to help businesses automate operations, monitor critical parameters, and innovate with confidence.
            </p>
        </div>

        <div class="row g-4">
            <!-- 1. Embedded Systems and PCB Design -->
            <div class="col-lg-6">
                <div class="card h-100 rounded-4 p-4 p-md-5 service-card shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-box bg-primary text-white me-3">
                            <i class="fa fa-microchip"></i>
                        </div>
                        <div>
                            <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Domain 01</span>
                            <h4 class="fw-bold text-dark mb-0">Embedded Systems and PCB Design</h4>
                        </div>
                    </div>
                    <p class="text-secondary mb-3" style="line-height: 1.7;">
                        We provide custom embedded systems and electronic product development services, including:
                    </p>
                    <ul class="feature-check-list mb-4">
                        <li>Custom PCB design and development</li>
                        <li>Embedded hardware and firmware development</li>
                        <li>Microcontroller-based solutions</li>
                        <li>Sensor integration and electronic circuit design</li>
                        <li>Custom electronic product development</li>
                        <li>Hardware prototyping and testing</li>
                    </ul>
                    <div class="p-3 rounded-3 bg-light border mt-auto mb-3">
                        <p class="small text-secondary mb-0">
                            <i class="fa fa-info-circle text-primary me-2"></i>We help turn electronic product concepts into functional and application-ready solutions.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.embedded_design_development') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-3">
                            Learn More About Embedded Services <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Industrial IoT and Automation -->
            <div class="col-lg-6">
                <div class="card h-100 rounded-4 p-4 p-md-5 service-card shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-box bg-primary text-white me-3">
                            <i class="fa fa-network-wired"></i>
                        </div>
                        <div>
                            <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Domain 02</span>
                            <h4 class="fw-bold text-dark mb-0">Industrial IoT and Automation</h4>
                        </div>
                    </div>
                    <p class="text-secondary mb-3" style="line-height: 1.7;">
                        Our Industrial IoT and automation solutions help businesses improve operational efficiency, monitor equipment, and make data-driven decisions:
                    </p>
                    <ul class="feature-check-list mb-4">
                        <li>Industrial IoT device development</li>
                        <li>Machine and equipment monitoring</li>
                        <li>Industrial automation solutions</li>
                        <li>PLC, HMI and VFD integration</li>
                        <li>SCADA and remote monitoring solutions</li>
                        <li>Real-time data acquisition and monitoring</li>
                        <li>Cloud-based industrial dashboards</li>
                    </ul>
                    <div class="p-3 rounded-3 bg-light border mt-auto mb-3">
                        <p class="small text-secondary mb-0">
                            <i class="fa fa-info-circle text-primary me-2"></i>We aim to connect industrial equipment and systems through intelligent monitoring and automation technologies.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.industrial_iot_solutions') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-3">
                            Learn More About IIoT &amp; Automation <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Custom AI and Software Development -->
            <div class="col-lg-6">
                <div class="card h-100 rounded-4 p-4 p-md-5 service-card shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-box bg-primary text-white me-3">
                            <i class="fa fa-robot"></i>
                        </div>
                        <div>
                            <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Domain 03</span>
                            <h4 class="fw-bold text-dark mb-0">Custom AI and Software Development</h4>
                        </div>
                    </div>
                    <p class="text-secondary mb-3" style="line-height: 1.7;">
                        We develop customized software and AI-powered solutions to help businesses automate operations, improve customer communication, and streamline workflows:
                    </p>
                    <ul class="feature-check-list mb-4">
                        <li>Custom AI agent development</li>
                        <li>AI-powered business automation</li>
                        <li>WhatsApp Business API integration</li>
                        <li>WhatsApp chatbot development</li>
                        <li>WhatsApp messaging automation</li>
                        <li>AI Voice Calling API integration</li>
                        <li>AI-powered voice calling agents</li>
                        <li>Automated inbound and outbound calling</li>
                        <li>Web and mobile application development</li>
                        <li>Custom ERP and CRM software</li>
                        <li>API and cloud dashboard development</li>
                    </ul>
                    <div class="p-3 rounded-3 bg-light border mt-auto mb-3">
                        <p class="small text-secondary mb-0">
                            <i class="fa fa-info-circle text-primary me-2"></i>We help businesses use AI, automation, and software to improve productivity and customer engagement.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.ai_solutions_custom_ai_agents') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-3">
                            Learn More About AI &amp; Software <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. Temperature Monitoring and Data Logger Solutions -->
            <div class="col-lg-6">
                <div class="card h-100 rounded-4 p-4 p-md-5 service-card shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="service-icon-box bg-primary text-white me-3">
                            <i class="fa fa-temperature-high"></i>
                        </div>
                        <div>
                            <span class="text-muted fw-bold small text-uppercase" style="letter-spacing: 0.05em;">Domain 04</span>
                            <h4 class="fw-bold text-dark mb-0">Temperature Monitoring and Data Logger Solutions</h4>
                        </div>
                    </div>
                    <p class="text-secondary mb-3" style="line-height: 1.7;">
                        TC Smart Technology develops temperature monitoring and data logging solutions for applications where accurate environmental monitoring and reliable data records are important:
                    </p>
                    <ul class="feature-check-list mb-4">
                        <li>Real-time temperature monitoring systems</li>
                        <li>Temperature and humidity monitoring</li>
                        <li>Wireless temperature monitoring</li>
                        <li>Industrial temperature data loggers</li>
                        <li>Cold storage monitoring solutions</li>
                        <li>Remote monitoring dashboards</li>
                        <li>Data recording, alerts, and reporting</li>
                    </ul>
                    <div class="p-3 rounded-3 bg-light border mt-auto mb-3">
                        <p class="small text-secondary mb-0">
                            <i class="fa fa-info-circle text-primary me-2"></i>These solutions support cold storage, warehouses, laboratories, manufacturing facilities, and temperature-sensitive environments.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('contact.index') }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold px-3">
                            Inquire for Monitoring Systems <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- What We Do Section End -->

<!-- Why Choose TC Smart Technology Start -->
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge badge-soft-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Our Value Proposition</span>
        <h2 class="display-6 fw-bold text-dark">Why Choose TC Smart Technology?</h2>
        <p class="text-muted mx-auto" style="max-width: 750px;">
            We engineer practical solutions designed around real-world industrial and commercial operations.
        </p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- 1. Customized Engineering -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-4 shadow-sm why-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-cogs fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0">Customized Engineering</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    Solutions designed specifically around your application, operating conditions, and distinct business requirements.
                </p>
            </div>
        </div>

        <!-- 2. Multiple Technology Domains -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-4 shadow-sm why-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-cubes fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0">Multiple Technology Domains</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    Comprehensive expertise across electronics, embedded systems, IoT, automation, AI, and enterprise software.
                </p>
            </div>
        </div>

        <!-- 3. Integrated Solutions -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-4 shadow-sm why-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-link fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0">Integrated Solutions</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    Hardware, firmware, software, and cloud technologies seamlessly working together into a unified architecture.
                </p>
            </div>
        </div>

        <!-- 4. Business-Focused Development -->
        <div class="col-md-6 col-lg-6">
            <div class="card h-100 p-4 shadow-sm why-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-chart-line fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0">Business-Focused Development</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    Technology purposefully built to address practical business challenges, reduce downtime, eliminate manual overhead, and maximize ROI.
                </p>
            </div>
        </div>

        <!-- 5. Scalable Solutions -->
        <div class="col-md-6 col-lg-6">
            <div class="card h-100 p-4 shadow-sm why-card bg-white">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-expand-arrows-alt fs-5"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-0">Scalable Solutions</h5>
                </div>
                <p class="text-secondary small mb-0" style="line-height: 1.7;">
                    Flexible, future-ready development tailored for proof-of-concept prototypes, initial pilots, and growing multi-site operations.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose TC Smart Technology End -->

<!-- Mission & Vision Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            <!-- Our Mission -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 p-md-5 mission-vision-card bg-white">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                            <i class="fa fa-bullseye fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-0">Our Mission</h3>
                    </div>
                    <p class="text-secondary lead fs-6 mb-0" style="line-height: 1.8;">
                        Our mission is to develop innovative, reliable, and practical technology solutions that help businesses improve efficiency, automate processes, and embrace digital transformation.
                    </p>
                </div>
            </div>

            <!-- Our Vision -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 p-md-5 mission-vision-card bg-white">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                            <i class="fa fa-eye fs-4"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-0">Our Vision</h3>
                    </div>
                    <p class="text-secondary lead fs-6 mb-0" style="line-height: 1.8;">
                        To become a trusted technology partner for businesses seeking advanced embedded electronics, Industrial IoT, automation, AI, and software development solutions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission & Vision Section End -->

<!-- Final CTA Start -->
<div class="container py-5">
    <div class="card border-0 rounded-4 p-4 p-md-5 text-center shadow-lg" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="mx-auto" style="max-width: 800px;">
            <span class="badge bg-primary px-3 py-2 text-uppercase mb-3 fw-semibold" style="letter-spacing: 1px;">Get in Touch</span>
            <h2 class="display-6 fw-bold text-white mb-3">Let's Build Something Smart Together</h2>
            <p class="text-white-50 lead mb-4 fs-6" style="line-height: 1.8;">
                Whether you need custom PCB design, an embedded electronics solution, an Industrial IoT monitoring system, AI-powered WhatsApp automation, AI voice calling, or a temperature data logger, TC Smart Technology is ready to discuss your requirements.
            </p>
            <p class="text-white mb-4 fw-semibold">
                Contact TC Smart Technology to explore a technology solution for your business.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-4 mb-4 text-white-50 small">
                <div>
                    <i class="fa fa-globe text-primary me-2"></i>
                    <strong>Website:</strong> <a href="https://tcsmarttechnology.com" class="text-white text-decoration-none">https://tcsmarttechnology.com</a>
                </div>
                <div>
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <strong>Location:</strong> <span class="text-white">B-598, Pocket 11, Jasola Vihar, New Delhi, India</span>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('contact.index') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow">
                    <i class="fa fa-paper-plane me-2"></i>Contact Us
                </a>
                <a href="tel:+917065122884" class="btn btn-outline-light px-4 py-3 rounded-pill fw-bold">
                    <i class="fa fa-phone-alt me-2"></i>Call: +91-7065122884
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Final CTA End -->
@endsection
