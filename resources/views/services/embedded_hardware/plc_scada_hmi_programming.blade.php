@extends('frontend.layouts.main')

@section('meta_title', 'PLC, SCADA & HMI Programming Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'PLC, SCADA & HMI Programming Services',
        'breadcrumb' => ['Services', 'PLC, SCADA & HMI Programming Services']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Expert PLC, SCADA & HMI Programming Services by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where we deliver cutting-edge PLC, SCADA, and HMI programming services to optimize industrial automation. Our custom solutions enhance efficiency, reliability, and scalability for businesses worldwide.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/PLC%2C SCADA %26 HMI Programming Service .png" alt="Expert PLC, SCADA & HMI Programming Services" style="width: 100%; height: 500px; object-fit: cover;">   
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
                    Based in Delhi NCR - Noida, our certified automation engineers use industry-standard tools like Siemens TIA Portal and Rockwell Studio 5000, delivering solutions that reduce downtime by up to 25% and ensure compliance with ISO 9001 and IATF 16949.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-code fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Custom Programming</h3>
                        <p class="text-muted">
                            Tailored PLC, SCADA, and HMI solutions for precise control.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">IoT Integration</h3>
                        <p class="text-muted">
                            Real-time analytics for predictive maintenance and efficiency.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Secure Protocols</h3>
                        <p class="text-muted">
                            Modbus, Profibus, and Ethernet/IP for reliable data transfer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive PLC, SCADA & HMI Services</h2>
                <p class="lead text-muted">
                    Tailored programming and integration services for seamless industrial automation.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Custom PLC Programming</h5>
                        <p class="text-muted">
                            Precise automation for machinery like conveyors and robotic arms using Ladder Logic and IEC 61131-3 standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">SCADA System Integration</h5>
                        <p class="text-muted">
                            Centralized real-time monitoring and control for informed decision-making.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">HMI Development</h5>
                        <p class="text-muted">
                            Intuitive touchscreens and graphical interfaces for efficient operator control.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">System Upgrades</h5>
                        <p class="text-muted">
                            Modernizing legacy systems for enhanced performance and compatibility.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry-Specific Applications Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Solutions for Every Industry</h2>
                <p class="lead text-muted">
                    Tailored automation solutions for diverse sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Precision assembly automation with AS9100 compliance.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> Streamlined production with 30% faster cycle times.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Automated irrigation and harvesting systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Sterile production meeting ISO 13485 standards.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Real-time control for wind and solar systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Automated railcar assembly and signaling.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Centralized monitoring for construction equipment.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> Network infrastructure automation.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Robust systems for pipeline operations.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Traceable assembly for electronics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Flexible automation for prototyping.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>More:</strong> Diamond & Jewellery, Die & Mould.</li>
                        </ul>
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
                    Key features of our PLC, SCADA, and HMI programming services.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tools:</strong> Siemens TIA Portal, Rockwell Studio 5000, Wonderware.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Real-Time Analytics:</strong> IoT-enabled insights reduce downtime by 25%.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Protocols:</strong> Modbus, Profibus, Ethernet/IP for secure data transfer.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Modular Code:</strong> Scalable and easy-to-update programming.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Standards Compliance:</strong> IEC 61131-3, ISO 9001, IATF 16949.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Operator Interfaces:</strong> Intuitive HMIs with touchscreen displays.</li>
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
                <h2 class="display-5 mb-3">Service and Support from One Provider</h2>
                <p class="lead text-muted">
                    Comprehensive support for seamless automation integration.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                     <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/NGO and Donation Platforms.png" alt="Expert PLC, SCADA & HMI Programming Services" style="width: 100%; height: 580px; object-fit: cover;">  
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Installation & Setup</h5>
                        <p class="text-muted">
                            Tailored integration for your facility in Delhi NCR - Noida or globally.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Hands-on programs for programming and system operation.
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

    <!-- Benefits Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Benefits of Our Services</h2>
                <p class="lead text-muted">
                    Practical advantages for your automation projects.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Reduced Downtime</h5>
                        <p class="text-muted">
                            Reliable systems minimize interruptions, saving costs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Increased Productivity</h5>
                        <p class="text-muted">
                            Optimized processes boost output by up to 30%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Enhanced Safety</h5>
                        <p class="text-muted">
                            Automated controls reduce human error and improve compliance.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h5 class="mb-3">Cost Savings</h5>
                        <p class="text-muted">
                            Energy-efficient systems lower operating costs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Get Started with TC Smart Technology</h2>
           
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to optimize your operations with expert PLC, SCADA, and HMI programming? Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore our solutions.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
