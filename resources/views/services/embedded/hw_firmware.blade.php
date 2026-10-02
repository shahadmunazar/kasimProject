@extends('frontend.layouts.main')

@section('meta_title', 'Precision | Performance | Scalability | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Precision | Performance | Scalability',
        'breadcrumb' => ['Services', 'Embedded Systems Solutions']
    ])

    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #0057b3;
            transform: scale(1.05);
        }
        h2.display-5 {
            font-weight: 700;
            letter-spacing: -1px;
        }
        .lead.text-muted {
            font-size: 1.2rem;
            line-height: 1.6;
        }
        @media (max-width: 767px) {
            .img-fluid {
                height: 300px !important;
            }
        }
    </style>

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Precision | Performance | Scalability</h1>
                    <p class="lead text-muted mb-4">
                        Every successful smart product begins with an embedded system that harmonizes cutting-edge hardware with intelligent firmware. At AI Coin Innovation, we specialize in building high-performance embedded solutions that are reliable, scalable, and cost-effective — engineered to meet today’s complex market demands while paving the way for tomorrow’s innovation.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/EmbeddedPCBDesigning.png" alt="Precision, performance and Scalability" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Key Strengths and Capabilities Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Strengths and Capabilities</h2>
                <p class="lead text-muted">
                    Our expertise in embedded systems ensures reliable, scalable, and high-performance solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-microchip fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Miniaturized & High-Density Design</h5>
                        <p class="text-muted">
                            Expert in designing ultra-compact, high-density PCBs ideal for wearables, IoT, and constrained form-factor applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-battery-half fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Low Power Design & Energy Harvesting</h5>
                        <p class="text-muted">
                            Specialist in ultra-low power electronics and energy harvesting techniques to maximize operational life for battery-operated and sustainable devices.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-tachometer-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">High-Speed Digital & Signal Integrity</h5>
                        <p class="text-muted">
                            Proficiency in managing DDR interfaces, SerDes, and high-speed signal design ensuring noise immunity and optimal performance.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Edge AI/ML Acceleration</h5>
                        <p class="text-muted">
                            Design of embedded platforms capable of running AI/ML inference locally for real-time data processing and low-latency analytics.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-industry fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Industrial-Grade Reliability</h5>
                        <p class="text-muted">
                            Robust designs tailored to withstand extreme temperatures, vibrations, and EMI for automotive, aerospace, and industrial sectors.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-microchip fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Custom SoC & ASIC Support</h5>
                        <p class="text-muted">
                            Seamless integration with custom silicon (SoCs/ASICs) to enable domain-specific functionality with optimized cost and performance.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-code fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Advanced RTOS & Middleware Stack</h5>
                        <p class="text-muted">
                            Proficient in RTOS like FreeRTOS, Zephyr, and VxWorks; development of custom middleware for real-time and mission-critical systems.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">FPGA/CPLD Development</h5>
                        <p class="text-muted">
                            FPGA/CPLD-based reconfigurable solutions for high-speed processing, prototyping, and custom logic acceleration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Strategic Enhancements Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Strategic Enhancements</h2>
                <p class="lead text-muted">
                    Advanced methodologies to accelerate development and ensure quality.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-laptop-code fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Model-Based Design (MBD)</h5>
                        <p class="text-muted">
                            Leverage MATLAB/Simulink for system-level simulation and auto-code generation to speed up development cycles.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">DevOps for Embedded Systems</h5>
                        <p class="text-muted">
                            Integrate CI/CD pipelines, automated builds, and testing for faster iteration and assured quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Partner with TC Smart Technology for Embedded Solutions</h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to explore how our embedded systems expertise can drive your next innovation.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
