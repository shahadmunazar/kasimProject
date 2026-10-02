@extends('frontend.layouts.main')

@section('meta_title', 'Automated Sheet Metal Bending & Shearing Machines | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Automated Sheet Metal Bending & Shearing Machines',
        'breadcrumb' => ['Services', 'Sheet Metal Machines']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Automated Sheet Metal Bending & Shearing Machines by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where innovation and precision deliver world-class Automated Sheet Metal Bending & Shearing Machines. We offer a comprehensive range of new machines, specialty equipment, and affordable solutions tailored to your sheet metal fabrication needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/sheet-metal-bending-machine.jpg') }}" alt="Automated sheet metal bending machine in a factory">
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Based in Delhi NCR - Noida, our machines integrate advanced technologies like robot integration, IoT connectivity, AI-driven bend optimization, and AR for setup, enhancing productivity and quality.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Robot Integration</h3>
                        <p class="text-muted">
                            Automates material handling, reducing cycle times by 40%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">IoT Connectivity</h3>
                        <p class="text-muted">
                            Reduces material waste by 25% with real-time monitoring.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">AI Optimization</h3>
                        <p class="text-muted">
                            Improves accuracy by 20% with machine learning algorithms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- State-of-the-Art Machines Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">State-of-the-Art New Machines</h2>
                <p class="lead text-muted">
                    Cutting-edge technology with bending capacities up to 6,000 kN and shearing thicknesses up to 25 mm, ensuring ±0.01 mm accuracy.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/cnc-press-brake.jpg') }}" alt="CNC press brake with servo-driven backgauges">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Equipped with Siemens, Fanuc, or TC Smart CNC controls, our machines support complex bending sequences, high-speed shearing, and CAD/CAM integration for rapid setup and high-volume production.
                    </p>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Range Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive Range of Machines</h2>
                <p class="lead text-muted">
                    A variety of systems designed for diverse sheet metal fabrication needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">CNC Press Brakes</h4>
                        <p class="text-muted">
                            Capacities from 50 to 6,000 kN with multi-axis backgauges.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Guillotine Shears</h4>
                        <p class="text-muted">
                            Cuts up to 25 mm thick with adjustable blade gaps.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Panel Benders</h4>
                        <p class="text-muted">
                            Multi-edge bending with 30-second cycle times.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Turret Punch Presses</h4>
                        <p class="text-muted">
                            Up to 1,200 hits per minute with 60 tool stations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Specialty Equipment Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Specialty Equipment with Advanced Features</h2>
                <p class="lead text-muted">
                    Engineered for demanding applications with cutting-edge technology.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Robot Integration</h5>
                        <p class="text-muted">
                            Automates handling with 6-axis robotic arms, enabling lights-out production.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">AI Bend Optimization</h5>
                        <p class="text-muted">
                            Machine learning improves accuracy by 20% on complex parts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Laser-Guided Shearing</h5>
                        <p class="text-muted">
                            Ensures ±0.1 mm tolerances with minimal edge distortion.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Hybrid Bending Systems</h5>
                        <p class="text-muted">
                            Combines servo-electric and hydraulic for high-speed, high-force operations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Most In-Demand & Affordable Machines Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Machines</h2>
                <p class="lead text-muted">
                    Trusted solutions for manufacturers of all sizes.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Most In-Demand Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/cnc-press-brake-demand.jpg') }}" alt="CNC press brake with multi-axis backgauges">
                        <p class="text-muted">
                            CNC press brakes and panel benders reduce cycle times by up to 50%.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/affordable-guillotine-shear.jpg') }}" alt="Affordable guillotine shear for small businesses">
                        <p class="text-muted">
                            Entry-level CNC press brakes and shears for startups, with a 10–15 year service life.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industries Served Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Complete Solutions for Every Industry</h2>
                <p class="lead text-muted">
                    Tailored fabrication solutions for diverse sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Precision bending for airframe components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> High-speed bending for body panels.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Durable parts for tractors.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Cleanroom-compatible fabrication.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Bending for solar panel frames.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Fabrication for railcar frames.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Structural beams bending.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Antenna mounts fabrication.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Pipeline fittings fabrication.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Circuit board enclosures.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Custom prototypes.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>More:</strong> Diamond & Jewellery, Die & Mould.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service & Support Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Machines, Service, and Support from One Provider</h2>
                <p class="lead text-muted">
                    A seamless experience with installation, training, and 24/7 support.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/technician-support.jpg') }}" alt="Technician providing support in a factory">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Tailored to your facility in Delhi NCR - Noida or globally.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Includes AR-based tutorials for complex setups.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Remote diagnostics and repairs within 4 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Highlights Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Highlights</h2>
                <p class="lead text-muted">
                    Key specifications of our sheet metal bending and shearing machines.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Bending Capacity:</strong> 50 to 6,000 kN, up to 20 mm thick.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Shearing Capacity:</strong> Up to 25 mm thick, 4,000 mm blades.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Precision:</strong> ±0.01 mm bending, ±0.1 mm shearing.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots, vision-guided systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Material Versatility:</strong> Steel, aluminum, titanium, composites.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Efficiency:</strong> Reduces power usage by 50%.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Get Started with TC Smart Technology</h2>
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/sheet-metal-fabrication.jpg') }}" alt="Sheet metal fabrication setup in an industrial setting">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to transform your sheet metal fabrication? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our solutions.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
