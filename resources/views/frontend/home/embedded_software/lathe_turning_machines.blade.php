@extends('frontend.layouts.main')

@section('meta_title', 'Lathe & Turning Machines (Manual & CNC) | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Lathe & Turning Machines (Manual & CNC)',
        'breadcrumb' => ['Services', 'Lathe & Turning Machines']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Lathe & Turning Machines by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where innovation delivers world-class Lathe & Turning Machines (Manual & CNC). We offer a comprehensive range of new machines, specialty equipment, and affordable solutions tailored to your turning needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/cnc-lathe-machine.jpg') }}" alt="CNC lathe machine in a workshop">
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
                    Based in Delhi NCR - Noida, our machines integrate advanced technologies like robot integration, IoT connectivity, AI-driven toolpath optimization, and AR for setup, enhancing productivity and precision.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Robot Integration</h3>
                        <p class="text-muted">
                            Automates part handling, reducing cycle times by 50%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">IoT Connectivity</h3>
                        <p class="text-muted">
                            Reduces downtime by 30% with real-time monitoring.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">AI Optimization</h3>
                        <p class="text-muted">
                            Improves toolpath efficiency, cutting cycle times by 25%.
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
                    Cutting-edge technology with spindle speeds up to 6,000 RPM and positional accuracy of ±0.005 mm.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/cnc-turning-center.jpg') }}" alt="CNC turning center with live tooling">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Equipped with FANUC, Siemens, or TC Smart controls, our machines support complex turning, threading, and milling operations, enabling rapid prototyping and high-volume production.
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
                    A variety of manual and CNC lathes for diverse turning applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Manual Lathes</h4>
                        <p class="text-muted">
                            Bed lengths up to 3,000 mm, speeds 50–2,500 RPM.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">CNC Lathes</h4>
                        <p class="text-muted">
                            Multi-axis capabilities for complex geometries.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Swiss-Type Lathes</h4>
                        <p class="text-muted">
                            Micro-machining with bar capacities up to 38 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Vertical Turning Lathes</h4>
                        <p class="text-muted">
                            High-stability machining for oversized parts.
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
                    Engineered for demanding turning applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Robot Integration</h5>
                        <p class="text-muted">
                            Automates part loading, enabling lights-out production.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Hybrid Turning-Milling</h5>
                        <p class="text-muted">
                            Single-setup machining with surface finishes of Ra 0.4 µm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">High-Speed Lathes</h5>
                        <p class="text-muted">
                            Spindle speeds up to 10,000 RPM for lightweight alloys.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Cryogenic Cooling</h5>
                        <p class="text-muted">
                            Enhances tool life for titanium and Inconel machining.
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
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/swiss-type-lathe.jpg') }}" alt="Swiss-type CNC lathe for micro-machining">
                        <p class="text-muted">
                            CNC turning centers and Swiss-type lathes reduce setup times by 50%.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/manual-lathe.jpg') }}" alt="Affordable manual lathe for small businesses">
                        <p class="text-muted">
                            Entry-level manual and CNC lathes for startups, with compact designs.
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
                    Tailored turning solutions for diverse sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Precision turning for turbine shafts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> High-volume production of crankshafts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Durable parts for irrigation systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Biocompatible components for implants.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Turbine rotors and generator shafts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Railcar axles and track fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Large structural components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Precision antenna mounts.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Connectors with EMI-shielding.</li>
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
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/technician-support.jpg') }}" alt="Technician providing support in a workshop">
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
                    Key specifications of our lathe and turning machines.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Spindle Performance:</strong> Up to 10,000 RPM, 50 kW power.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Machining Capacity:</strong> Diameters up to 2,000 mm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Precision:</strong> ±0.005 mm accuracy.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots, bar feeders.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Material Versatility:</strong> Metals, plastics, composites.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Advanced Features:</strong> Live tooling, Y-axis.</li>
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
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/turning-workshop.jpg') }}" alt="Modern turning workshop with CNC lathes">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to revolutionize your turning processes? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our solutions.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
