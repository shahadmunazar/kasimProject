@extends('frontend.layouts.main')

@section('meta_title', 'Hydraulic & Servo Power Press Machines | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Hydraulic & Servo Power Press Machines',
        'breadcrumb' => ['Services', 'Hydraulic & Servo Power Press Machines']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Hydraulic & Servo Power Press Machines by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where innovation drives excellence in Hydraulic & Servo Power Press Machines. We offer a comprehensive range of new machines, specialty equipment, and affordable solutions tailored to your metal forming needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/hydraulic-power-press.jpg') }}" alt="Hydraulic power press in a manufacturing facility">
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
                    Based in Delhi NCR - Noida, our machines integrate advanced technologies like robot integration, IoT connectivity, AI-driven press optimization, and AR for setup, enhancing productivity and quality.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Robot Integration</h3>
                        <p class="text-muted">
                            Automates part handling, reducing cycle times by 40%.
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
                        <i class="fa fa-bolt fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Energy Efficiency</h3>
                        <p class="text-muted">
                            Servo presses save up to 40% energy.
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
                    Advanced technology with capacities from 50 to 5,000 tons and stroke precision of ±0.01 mm.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/servo-power-press.jpg') }}" alt="Servo power press with programmable controls">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Equipped with Siemens, Mitsubishi, or TC Smart controls, our presses support high-speed forming, deep drawing, and blanking, enabling rapid setup and high-volume production.
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
                    A variety of hydraulic and servo presses for diverse metal forming applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Hydraulic Presses</h4>
                        <p class="text-muted">
                            Up to 5,000 tons, bed sizes up to 4,000 mm x 2,500 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Servo Power Presses</h4>
                        <p class="text-muted">
                            Energy-efficient with cycle times as low as 0.5 seconds.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">C-Frame Presses</h4>
                        <p class="text-muted">
                            Compact design for small-scale operations.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Progressive Die Presses</h4>
                        <p class="text-muted">
                            Continuous stamping for high-volume production.
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
                    Engineered for demanding press applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Robot Integration</h5>
                        <p class="text-muted">
                            Automates part handling, enabling lights-out production.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Hybrid Servo-Hydraulic</h5>
                        <p class="text-muted">
                            Combines precision and power for complex forming tasks.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">High-Speed Servo Presses</h5>
                        <p class="text-muted">
                            Ram speeds up to 1,000 mm/s for precision stamping.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Multi-Station Presses</h5>
                        <p class="text-muted">
                            Sequential operations in a single setup for efficiency.
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
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/servo-press-demand.jpg') }}" alt="Servo power press for high-volume production">
                        <p class="text-muted">
                            Servo presses with adaptive control reduce setup times by 50%.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/affordable-hydraulic-press.jpg') }}" alt="Affordable hydraulic press for small businesses">
                        <p class="text-muted">
                            Entry-level hydraulic presses for startups, with compact designs.
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
                    Tailored press solutions for diverse sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Precision forming for airframe components.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> High-volume production of body panels.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Durable parts for tractor frames.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Biocompatible components for surgical tools.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Wind turbine bases and solar frames.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Railcar frames and track fittings.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Structural beams and fittings.</li>
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
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/technician-support.jpg') }}" alt="Technician providing support in a press facility">
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
                    Key specifications of our hydraulic and servo power press machines.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Press Capacity:</strong> 50 to 5,000 tons.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Precision Control:</strong> Stroke accuracy of ±0.01 mm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Control Systems:</strong> Siemens, Mitsubishi, TC Smart.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots, die changers.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Material Versatility:</strong> Steel, aluminum, titanium.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy Efficiency:</strong> Up to 40% power savings.</li>
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
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/metal-forming-facility.jpg') }}" alt="Metal forming facility with power presses">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to transform your metal forming processes? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our solutions.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
