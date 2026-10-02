@extends('frontend.layouts.main')

@section('meta_title', 'Smart Packaging & Labeling Machines | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Smart Packaging & Labeling Machines',
        'breadcrumb' => ['Services', 'Smart Packaging & Labeling Machines']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Premier Smart Packaging & Labeling Machines by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where innovation drives excellence in Smart Packaging & Labeling Machines. We offer a comprehensive range of new machines, specialty equipment, and affordable solutions tailored to your packaging needs, ideal for FMCG, pharma, and logistics sectors.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/smart-labeling-machine.jpg') }}" alt="Smart labeling machine in a production line">
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
                    Based in Delhi NCR - Noida, our machines integrate advanced technologies like robot integration, IoT connectivity, AI-driven label placement, and AR for setup, enhancing productivity and compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-robot fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Robot Integration</h3>
                        <p class="text-muted">
                            Automates labeling, reducing cycle times by 40%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">IoT Connectivity</h3>
                        <p class="text-muted">
                            Reduces label waste by 25% with real-time monitoring.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">AI Label Placement</h3>
                        <p class="text-muted">
                            Improves accuracy by 20% on complex containers.
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
                    Advanced technology with labeling speeds up to 200 containers per minute and placement accuracy of ±0.5 mm.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/automatic-labeler.jpg') }}" alt="Automatic labeling machine with servo-driven applicators">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Equipped with Siemens, Mitsubishi, or TC Smart controls, our machines support automated label application, real-time printing, and seamless integration with existing lines for high-volume production.
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
                    A variety of systems for manual, semi-automatic, and fully automatic packaging needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Automatic Labelers</h4>
                        <p class="text-muted">
                            Up to 200 labels/min for wrap-around, top/bottom applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Shrink Sleeve Labelers</h4>
                        <p class="text-muted">
                            360-degree coverage with tamper-evident seals.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Print-and-Apply Labelers</h4>
                        <p class="text-muted">
                            Real-time coding for barcodes and expiration dates.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <h4 class="mb-3">Tamper-Evident Labelers</h4>
                        <p class="text-muted">
                            Secure closures for food and pharma safety.
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
                    Designed for unique and demanding packaging applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Robot Integration</h5>
                        <p class="text-muted">
                            Automates labeling with 6-axis robotic arms for lights-out production.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">AI Label Placement</h5>
                        <p class="text-muted">
                            Machine learning improves accuracy by 20% on irregular containers.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Smart Label Technology</h5>
                        <p class="text-muted">
                            QR codes and RFID tags for enhanced traceability.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Multi-Station Packaging Cells</h5>
                        <p class="text-muted">
                            Combines filling, capping, and labeling in one line.
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
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/wrap-around-labeler.jpg') }}" alt="Automatic wrap-around labeling machine">
                        <p class="text-muted">
                            Wrap-around and top/bottom labelers handle high-speed production up to 100 m/min.
                        </p>
                        <a href="#contact" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/semi-automatic-labeler.jpg') }}" alt="Affordable semi-automatic labeling machine">
                        <p class="text-muted">
                            Semi-automatic labelers for startups, with speeds up to 50 labels/min.
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
                    Tailored packaging solutions for diverse sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Labeling for component traceability.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> High-speed labeling for parts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Weatherproof labels for seed bags.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Tamper-evident labels for pharmaceuticals.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Labeling for solar panel packaging.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Labels for railcar parts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Labels for construction materials.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> QR-coded labels for connectors.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant labels.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> ESD-safe labels for electronics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Custom labels for prototypes.</li>
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
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/technician-support.jpg') }}" alt="Technician providing support in a packaging facility">
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
                    Key specifications of our smart packaging and labeling machines.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Labeling Speed:</strong> Up to 200 labels/min.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Accuracy:</strong> ±0.5 mm label placement.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Control Systems:</strong> Siemens, Mitsubishi, TC Smart.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation:</strong> 6-axis robots, vision systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Material Compatibility:</strong> Plastic, glass, metal, PP.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Smart Features:</strong> QR codes, RFID, real-time printing.</li>
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
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/packaging-production-line.jpg') }}" alt="Smart packaging production line in a factory">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to transform your packaging processes? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our solutions.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
