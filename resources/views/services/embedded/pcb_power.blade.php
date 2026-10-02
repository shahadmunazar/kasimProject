
@extends('frontend.layouts.main')

@section('meta_title', 'Advanced PCB Layout & Power Electronics Engineering | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Advanced PCB Layout & Power Electronics Engineering',
        'breadcrumb' => ['Services', 'PCB Layout & Power Electronics']
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
                    <h1 class="display-4 mb-4">Powering Intelligence, Designing for Excellence</h1>
                    <p class="lead text-muted mb-4">
                        The physical design of electronic circuits is vital to achieving superior performance and regulatory success. Our engineering team specializes in high-speed, power-dense, and EMI-optimized PCB layouts that meet stringent industrial, automotive, and consumer standards.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
             <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Embedded  PCB Design  (2).jpg" alt="Responsive HVAC Repair & Emergency Services" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Core Expertise Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Core Expertise</h2>
                <p class="lead text-muted">
                    Our PCB layout and power electronics engineering ensures high performance and compliance with industry standards.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-wifi fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">RF & Mixed-Signal Design</h5>
                        <p class="text-muted">
                            Expertise in RF, antenna matching, and mixed-signal systems for seamless analog-digital interoperability.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-bolt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">High-Current & High-Voltage Systems</h5>
                        <p class="text-muted">
                            Specialization in industrial-grade, automotive, and renewable energy applications demanding robust high-power designs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-layer-group fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">HDI & Multilayer Board Design</h5>
                        <p class="text-muted">
                            High-speed, multilayer stack-ups with HDI routing techniques for miniaturized yet powerful devices.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-signal fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Signal Integrity & Impedance Control</h5>
                        <p class="text-muted">
                            Precision tuning for high-speed traces using simulation-driven signal integrity techniques.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-thermometer-full fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Thermal Simulation & Cooling Design</h5>
                        <p class="text-muted">
                            Advanced thermal modeling and cooling strategies for high-power and heat-sensitive applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">EMC/EMI Compliance & Pre-Certification</h5>
                        <p class="text-muted">
                            Pre-compliance audits and design adjustments for successful CE, FCC, UL, and automotive certifications.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-industry fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Design for Manufacturability (DFM), Assembly (DFA), and Test (DFT)</h5>
                        <p class="text-muted">
                            Holistic PCB design considering manufacturing ease, reduced production costs, and efficient in-circuit testing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Elevate Your Designs with TC Smart Technology</h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to explore how our PCB layout and power electronics expertise can enhance your products.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
