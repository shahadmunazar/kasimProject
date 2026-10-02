
@extends('frontend.layouts.main')

@section('meta_title', 'Automated Testing, Verification & Validation (V&V) | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Automated Testing, Verification & Validation (V&V)',
        'breadcrumb' => ['Services', 'Automated Testing, Verification & Validation']
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
                    <h1 class="display-4 mb-4">Test Early. Fix Faster. Ship Confidently.</h1>
                    <p class="lead text-muted mb-4">
                        Quality is embedded into the product through systematic testing. Our frameworks automate every layer of the V&V process, reducing time-to-market while improving reliability.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                     <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Testing Equipment.png" alt="Test Early. Fix Faster. Ship Confidently." style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- End-to-End Automation Capabilities Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End Automation Capabilities</h2>
                <p class="lead text-muted">
                    Automated testing frameworks to ensure reliability and accelerate product delivery.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Embedded CI/CD Pipelines</h5>
                        <p class="text-muted">
                            Integrated tools to auto-build, test, and validate firmware with each iteration.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-laptop-code fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Model/SIL/MIL Testing</h5>
                        <p class="text-muted">
                            Early-stage validation through simulations before physical hardware is ready.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-microchip fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">HIL Simulation & Real-Time Testing</h5>
                        <p class="text-muted">
                            Real-world emulation using HIL systems for high-fidelity testing.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-exclamation-circle fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Fault Injection & Robustness Tests</h5>
                        <p class="text-muted">
                            Verify fail-safe responses under stress, power loss, or sensor failures.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-check-circle fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Compliance Testing & Certification Assistance</h5>
                        <p class="text-muted">
                            Preparing for safety and EMC certifications through pre-qualified test setups.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-industry fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Production-Grade EoL Testers</h5>
                        <p class="text-muted">
                            Design and deploy automated End-of-Line testers for volume manufacturing environments.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Ensure Quality with TC Smart Technology</h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to learn how our automated testing and V&V solutions can enhance your product reliability.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
