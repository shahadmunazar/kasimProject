```blade
@extends('frontend.layouts.main')

@section('meta_title', 'Robotic Welding & Automation Cells | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Robotic Welding & Automation Cells',
        'breadcrumb' => ['Services', 'Robotic Welding & Automation Cells']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Robotic Welding & Automation Cells by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where we redefine manufacturing with state-of-the-art Robotic Welding & Automation Cells. As a leading provider, we offer a comprehensive range of new machines, specialty equipment, and affordable solutions tailored to your welding and automation needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/robotic-welding-cell.jpg') }}" alt="Robotic welding cell in a manufacturing facility">
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
                    Based in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge Robotic Welding & Automation Cells engineered for precision, versatility, and scalability. Our systems integrate advanced technologies like robot integration, IoT connectivity, AI-driven weld path optimization, and AR for training.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Robot Integration</h3>
                        <p class="text-muted">
                            Multi-robot cells reduce cycle times by up to 50%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">IoT Connectivity</h3>
                        <p class="text-muted">
                            Reduces downtime by 30% with real-time analytics.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">AI Optimization</h3>
                        <p class="text-muted">
                            AI-driven weld path planning improves quality by 20%.
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
                    Our new machines support MIG, TIG, plasma, laser, and resistance welding with repeatability of ±0.05 mm, integrating seamlessly with Industry 4.0 standards.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/arc-welding-robot.jpg') }}" alt="Arc welding robot with advanced controls">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Equipped with KUKA, ABB, or Fanuc controls, our robotic welding systems support CAD/CAM integration and high-speed production for complex weld geometries.
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
                    A big line of robotic welding and automation cells for diverse applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Arc Welding Robots</h4>
                        <p class="text-muted">
                            High-precision MIG and TIG welding for automotive and aerospace.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Spot Welding Robots</h4>
                        <p class="text-muted">
                            Fast, reliable welding for high-volume automotive production.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Laser Welding Robots</h4>
                        <p class="text-muted">
                            High-speed, low-distortion welding for precision components.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Collaborative Robots</h4>
                        <p class="text-muted">
                            Safe, flexible cobots for small-scale and hybrid operations.
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
                    Engineered for unique and demanding welding applications with futuristic technologies.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Vision-Guided Welding</h5>
                        <p class="text-muted">
                            High-resolution cameras ensure real-time seam tracking and consistency.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Hybrid Welding</h5>
                        <p class="text-muted">
                            Combines laser and arc welding for superior strength and minimal distortion.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Fume Extraction Systems</h5>
                        <p class="text-muted">
                            Ensures safe, eco-friendly operations with OSHA compliance.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">AI Weld Path Planning</h5>
                        <p class="text-muted">
                            Optimizes weld paths, reducing material waste by 20%.
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
                    Trusted most in-demand and affordable solutions for manufacturers of all sizes.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Most In-Demand Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/welding-robot-demand.jpg') }}" alt="Robotic welding system for high-volume production">
                        <p class="text-muted">
                            Advanced robotic welding systems with 15-inch touchscreens reduce setup times by 50%.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/affordable-welding-robot.jpg') }}" alt="Affordable robotic welding system for small businesses">
                        <p class="text-muted">
                            Entry-level robotic welding systems for startups, with compact designs and energy efficiency.
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
                    Tailored welding solutions for prototyping, high-volume production, and large-scale projects.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> High-precision welds for titanium airframe components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> Body panels and chassis with 50% cycle time reduction.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Durable welds for tractor frames and equipment.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Biocompatible welds for surgical tools, ISO 13485 compliant.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Welded wind turbine bases and solar frames.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Railcar frames and track components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Structural welds for beams and fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Precision welds for antenna mounts.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant welds for pipelines and valves.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Precision welds for connectors with EMI-shielding.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Custom welded prototypes.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>More:</strong> Diamond & Jewellery, Die & Mould welding.</li>
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
                    A seamless experience with installation, training, and 24/7 support from Delhi NCR - Noida and worldwide.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/welding-technician-support.jpg') }}" alt="Technician providing support in a welding facility">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Tailored to your facility, optimizing workflows for maximum efficiency.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Comprehensive training with AR-based tutorials for weld programming.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Remote diagnostics and on-site repairs within 4 hours, ensuring 99.5% uptime.
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
                    Key specifications of our robotic welding and automation cells for precision manufacturing.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Welding Processes:</strong> MIG, TIG, plasma, laser, and resistance welding.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Robot Specs:</strong> Payloads from 5 kg to 500 kg, repeatability of ±0.05 mm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Control Systems:</strong> KUKA, ABB, Fanuc with MES/ERP integration.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> Vision-guided systems, automated part feeding, and NDT.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power Sources:</strong> Inverter-based welders with low-spatter modes.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Safety Standards:</strong> ISO 10218 and ISO 13849 compliance.</li>
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
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/welding-facility.jpg') }}" alt="Welding facility with robotic automation cells">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to automate your welding processes? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our big line of robotic welding and automation cells.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
```
