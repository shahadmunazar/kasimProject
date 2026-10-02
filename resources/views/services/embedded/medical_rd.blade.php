
@extends('frontend.layouts.main')

@section('meta_title', 'Medical Device R&D and Regulatory Compliance | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Medical Device R&D and Regulatory Compliance',
        'breadcrumb' => ['Services', 'Medical Device R&D and Regulatory Compliance']
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
                    <h1 class="display-4 mb-4">Engineering Health. Enabling Trust.</h1>
                    <p class="lead text-muted mb-4">
                        Developing embedded systems for healthcare requires strict adherence to medical standards, patient safety, and quality control. We help you develop and certify medical-grade devices, from prototypes to global launch.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Embedded_PCBDesign.jpg" alt="Engineering Health. Enabling Trust" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Healthcare Domain Expertise Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Healthcare Domain Expertise</h2>
                <p class="lead text-muted">
                    Specialized solutions for developing and certifying medical-grade devices with a focus on safety and compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-heartbeat fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Risk & Usability Engineering (ISO 14971, IEC 62366)</h5>
                        <p class="text-muted">
                            Focused design on patient safety, risk management, and human-centered usability.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-code fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">IEC 62304-Compliant Software Engineering</h5>
                        <p class="text-muted">
                            Life cycle management for Class A/B/C medical device software.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Biocompatibility, Sterilization & Environmental Considerations</h5>
                        <p class="text-muted">
                            Material selection and sterilization strategies for safe patient interaction.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-flask fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Clinical Trial Support & Data Logging</h5>
                        <p class="text-muted">
                            Prototyping, logging, and validating hardware for clinical environments.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-eye fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Post-Market Vigilance & Surveillance Systems</h5>
                        <p class="text-muted">
                            Setup of incident monitoring, compliance reporting, and continuous improvement loops.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-file-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">FDA & MDR Documentation</h5>
                        <p class="text-muted">
                            Preparation of DHF, DMR, and Technical File for global regulatory approvals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Develop Trusted Medical Devices with TC Smart Technology </h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to learn how our medical device R&D and regulatory compliance expertise can support your healthcare innovations.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
