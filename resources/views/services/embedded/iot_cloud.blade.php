
@extends('frontend.layouts.main')

@section('meta_title', 'IoT Device Integration & Cloud Connectivity | AI Coin Innovation')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'IoT Device Integration & Cloud Connectivity',
        'breadcrumb' => ['Services', 'IoT Device Integration & Cloud Connectivity']
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
                    <h1 class="display-4 mb-4">Connect. Monitor. Control. Analyze.</h1>
                    <p class="lead text-muted mb-4">
                        From edge to cloud, we deliver seamless IoT integrations that unlock intelligence and control over your devices. Our solutions cover embedded firmware, wireless protocols, cloud infrastructure, and secure data analytics.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/iot.jpg" alt="Connect. Monitor. Control. Analyze" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- End-to-End IoT Expertise Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End IoT Expertise</h2>
                <p class="lead text-muted">
                    Comprehensive IoT solutions for seamless device integration and intelligent data management.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-layer-group fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Full-Stack IoT Development</h5>
                        <p class="text-muted">
                            Embedded firmware, gateway design, cloud backend, analytics dashboards, and mobile applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Edge ML & On-Device Intelligence</h5>
                        <p class="text-muted">
                            Deploy AI models on constrained devices for local decision-making and real-time insights.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Cloud Integration & Scalable Architectures</h5>
                        <p class="text-muted">
                            Scalable architecture on AWS, Azure, or private cloud platforms for global device fleets.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Device Management Frameworks</h5>
                        <p class="text-muted">
                            Remote provisioning, health monitoring, configuration management, and OTA capabilities.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-exchange-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Interoperability & Protocol Support</h5>
                        <p class="text-muted">
                            Support for MQTT, CoAP, LwM2M, OPC UA, and Modbus for industrial-grade integrations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-map-marker-alt fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Geo-Intelligence & Location Services</h5>
                        <p class="text-muted">
                            GPS, LBS, and geofencing for asset tracking and logistics.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-chart-line fa-3x text-primary mb-3"></i>
                        <h5 class="mb-3">Advanced Analytics & Alerting</h5>
                        <p class="text-muted">
                            AI-driven analytics with real-time alerting, predictive maintenance, and anomaly detection.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Unlock IoT Potential with TC Smart Technology</h2>
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Contact us to discover how our IoT integration and cloud connectivity solutions can transform your devices.
            </p>
            <a href="#contact" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>
@endsection
