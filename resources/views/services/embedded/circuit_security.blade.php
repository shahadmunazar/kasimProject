
@extends('frontend.layouts.main')

@section('meta_title', 'Secure Circuit Design & Embedded Cybersecurity | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Secure Circuit Design & Embedded Cybersecurity',
        'breadcrumb' => ['Services', 'Secure Circuit Design & Cybersecurity']
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
                    <h1 class="display-4 mb-4">Fortify Your Edge Devices Against Threats</h1>
                    <p class="lead text-muted mb-4">
                        With rising threats to connected devices, cybersecurity is now a baseline requirement. Our services focus on secure embedded design from the silicon to the cloud, ensuring your intellectual property and devices are protected throughout the lifecycle.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Embedded  (2).jpg" alt="Fortify Your Edge Devices Against Threats" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Security-First Design Elements Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Security-First Design Elements</h2>
                <p class="lead text-muted">
                    Comprehensive security measures to protect your embedded systems from threats.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Security Threat Modeling (STRIDE/DREAD)</h5>
                        <p class="text-muted">
                            Risk assessment-driven design to proactively address potential vulnerabilities.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-lock fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Hardware Root of Trust & Secure Boot</h5>
                        <p class="text-muted">
                            Ensure unforgeable trust chains and verified firmware loading for endpoint security.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-key fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Cryptographic Acceleration & TPM Integration</h5>
                        <p class="text-muted">
                            Embedded support for AES, RSA, ECC, and secure key vaults.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-shield-virus fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Side-Channel Attack Mitigation</h5>
                        <p class="text-muted">
                            Hardware design techniques to mitigate power and timing-based information leakage.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-exclamation-triangle fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Tamper Detection & Physical Intrusion Response</h5>
                        <p class="text-muted">
                            Implementation of both active and passive anti-tamper mechanisms.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Secure FOTA (Firmware Over-the-Air)</h5>
                        <p class="text-muted">
                            End-to-end encrypted and authenticated firmware updates with rollback support.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-search fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Penetration Testing & Vulnerability Assessment (VAPT)</h5>
                        <p class="text-muted">
                            In-depth security testing including fuzzing, code auditing, and penetration testing.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-check-circle fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Compliance with ISO/IEC 27001, IEC 62443, FDA Cybersecurity Guidance</h5>
                        <p class="text-muted">
                            Expertise in regulatory requirements for medical, industrial, and automotive-grade secure systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Secure Your Devices with TC Smart Technology</h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to learn how our secure circuit design and embedded cybersecurity can protect your edge devices.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
