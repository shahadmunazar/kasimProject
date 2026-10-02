
@extends('frontend.layouts.main')

@section('meta_title', '3D Printing & Additive Manufacturing Machines | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => '3D Printing & Additive Manufacturing Machines',
        'breadcrumb' => ['Services', '3D Printing & Additive Manufacturing Machines']
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
        .service-icon {
            font-size: 2.5rem;
        }
        @media (max-width: 767px) {
            .img-fluid {
                height: 300px !important;
            }
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            margin-top: 0;
        }
    </style>

    <!-- Navigation Dropdown -->
    <div class="container-fluid bg-light py-3">
        <div class="container">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="servicesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Explore Our Services
                </button>
                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                    <li><a class="dropdown-item" href="{{ route('services.embedded.hw_firmware') }}">HW & Firmware Design</a></li>
                    <li><a class="dropdown-item" href="{{ route('services.embedded.pcb_power') }}">PCB & Power Engineering</a></li>
                    <li><a class="dropdown-item" href="{{ route('services.embedded.security') }}">Circuit Design & Security</a></li>
                    <li><a class="dropdown-item" href="{{ route('services.embedded.iot_cloud') }}">IoT & Cloud Integration</a></li>
                    <li><a class="dropdown-item" href="{{ route('services.embedded.medical_rd') }}">Medical R&D Services</a></li>
                    <li><a class="dropdown-item" href="{{ route('services.embedded.testing') }}">Testing Frameworks</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Advanced 3D Printing & Additive Manufacturing Machines by TC Smart Technology – Pioneering Precision and Innovation</h1>
                    <p class="lead text-muted mb-4">
                        At TC Smart Technology, located in Delhi NCR - Noida, we lead the way in 3D Printing & Additive Manufacturing Machines, delivering cutting-edge solutions that redefine modern manufacturing. Our extensive portfolio includes new machines, specialty equipment, most in-demand machines, unique machines, and affordable machines, all designed to provide complete solutions for industries worldwide. With a big line of 3D printing and additive manufacturing machines, we combine precision, scalability, and service and support from one provider to ensure your success. Whether you need large-scale project support or tailored solutions for specific industries, TC Smart Technology is your trusted partner. Contact us at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to revolutionize your production processes.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/3d-printing-machine.jpg') }}" alt="3D printing machine in a manufacturing facility" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for 3D Printing & Additive Manufacturing?</h2>
                <p class="lead text-muted">
                    Headquartered in Delhi NCR - Noida, TC Smart Technology delivers state-of-the-art 3D Printing & Additive Manufacturing Machines that integrate advanced technologies like robot integration, IoT connectivity, and futuristic innovations. Our systems are engineered to meet the demands of precision, efficiency, and versatility, making us the preferred choice for businesses seeking to innovate and scale.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-robot service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Robot Integration for Automation</h5>
                        <p class="text-muted">
                            Our machines feature 6-axis robotic arms, vision systems, and automated post-processing, enabling lights-out production and reducing labor costs by up to 50%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-cloud service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">IoT and Smart Factory Integration</h5>
                        <p class="text-muted">
                            IoT-enabled systems with real-time analytics, predictive maintenance, and cloud connectivity optimize performance, reduce material waste by 30%, and achieve 99.5% uptime.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-lightbulb service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Futuristic Technologies</h5>
                        <p class="text-muted">
                            We leverage AI-driven build optimization, machine learning for adaptive printing parameters, and augmented reality (AR) for setup and training, cutting cycle times by up to 25%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-cogs service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Customized Solutions</h5>
                        <p class="text-muted">
                            Bespoke configurations with high-resolution print heads, multi-material capabilities, and tailored build volumes for unique applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-globe service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Global Expertise, Local Presence</h5>
                        <p class="text-muted">
                            From Delhi NCR - Noida, we provide large-scale project support worldwide, with localized service teams for rapid response within 4 hours.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-leaf service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Sustainability Commitment</h5>
                        <p class="text-muted">
                            Energy-efficient systems with closed-loop material recycling and low-emission printing reduce environmental impact by 30%.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-flask service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Innovation Leadership</h5>
                        <p class="text-muted">
                            Our R&D team pioneers unique machines with features like hybrid additive-subtractive systems, high-temperature printing, and advanced material science for next-generation applications.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Next-Generation New Machines Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Next-Generation New Machines</h2>
                <p class="lead text-muted">
                    Our new machines leverage the latest advancements in additive manufacturing, featuring high-resolution print heads (down to 10 µm layer thickness), build volumes up to 1,500 mm x 1,500 mm x 2,000 mm, and print speeds up to 300 mm/s. Equipped with advanced control systems (e.g., Siemens, B&R, or proprietary TC Smart interfaces), these machines support multi-material printing, real-time process monitoring, and seamless integration with CAD software, enabling rapid prototyping and full-scale production.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/metal-3d-printer.jpg') }}" alt="Metal 3D printer with advanced controls" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="text-muted mb-4">
                        Designed for precision and scalability, our new machines are perfect for industries requiring high-speed, high-accuracy manufacturing solutions.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Range of Machine Types Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive Range of Machine Types</h2>
                <p class="lead text-muted">
                    Our big line of 3D printing and additive manufacturing machines addresses diverse applications, ensuring there’s a solution for every manufacturing need.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-print service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Fused Deposition Modeling (FDM) Printers</h5>
                        <p class="text-muted">
                            High-speed systems for thermoplastics (ABS, PLA, PEEK) with dual-extruder setups and heated build chambers up to 200°C for large, durable parts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-laser-alt service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Stereolithography (SLA) Printers</h5>
                        <p class="text-muted">
                            Ultra-precise resin-based systems with laser resolutions down to 25 µm, ideal for intricate medical and jewelry applications.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-fire service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Selective Laser Sintering (SLS) Printers</h5>
                        <p class="text-muted">
                            Powder-based systems for functional prototypes and end-use parts, supporting nylon, TPU, and metal-filled polymers with build volumes up to 700 mm x 380 mm x 580 mm.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-tools service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Metal 3D Printers (DMLS/SLM)</h5>
                        <p class="text-muted">
                            Direct Metal Laser Sintering and Selective Laser Melting systems for metals like titanium, stainless steel, and Inconel, with accuracies of ±20 µm and laser powers up to 1 kW.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-spray-can service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Binder Jetting Printers</h5>
                        <p class="text-muted">
                            High-throughput systems for sand, ceramic, and metal powders, ideal for casting molds and large-scale production with print speeds up to 1,200 cm³/h.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-tint service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">PolyJet Printers</h5>
                        <p class="text-muted">
                            Multi-material, multi-color systems for high-resolution prototypes, with layer thicknesses as low as 16 µm and Shore hardness ranging from A20 to D85.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-cube service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Large-Format 3D Printers</h5>
                        <p class="text-muted">
                            Industrial systems with build volumes up to 2,000 mm x 1,500 mm x 1,500 mm for large-scale project support in infrastructure and aerospace.
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
                <h2 class="display-5 mb-3">Specialty Equipment with Cutting-Edge Features</h2>
                <p class="lead text-muted">
                    Our specialty equipment is designed for unique applications, offering advanced features to enhance manufacturing efficiency and precision.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-robot service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">3D Printers with Robot Integration</h5>
                        <p class="text-muted">
                            Automated part removal, post-processing, and material handling with 6-axis robotic arms and vision systems, reducing cycle times by up to 40% and enabling lights-out manufacturing.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-cloud service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">IoT-Enabled 3D Printers</h5>
                        <p class="text-muted">
                            Real-time monitoring via IoT sensors, cloud-based analytics, and predictive maintenance algorithms to optimize uptime and reduce material waste by 25%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-tools service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Hybrid Additive-Subtractive Systems</h5>
                        <p class="text-muted">
                            Combine 3D printing with CNC milling for finished parts with surface finishes as fine as Ra 0.4 µm, ideal for aerospace and medical components.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-layer-group service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Multi-Material Printing Systems</h5>
                        <p class="text-muted">
                            Support simultaneous printing of rigid, flexible, and conductive materials, enabling complex assemblies in a single build.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-thermometer-full service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">High-Temperature Printing Systems</h5>
                        <p class="text-muted">
                            For high-performance polymers like PEEK and PEI, with build chamber temperatures up to 300°C and laser-based heating for consistent material properties.
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
                <h2 class="display-5 mb-3">Most In-Demand and Affordable Machines</h2>
                <p class="lead text-muted">
                    Trusted by global manufacturers, our most in-demand and affordable machines deliver high performance for businesses of all sizes.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Most In-Demand Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/3d-printer-demand.jpg') }}" alt="High-demand 3D printer for production" style="width: 100%; height: 200px; object-fit: cover;">
                        <p class="text-muted mb-3">
                            Featuring advanced control systems with 15-inch touchscreens, real-time process optimization, and Industry 4.0 compatibility, these machines support seamless integration into smart factories, reducing production lead times by up to 50%.
                        </p>
                        <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-2 px-4">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Affordable Machines</h4>
                        <img class="img-fluid rounded mb-3" src="{{ asset('images/affordable-3d-printer.jpg') }}" alt="Affordable 3D printer for small businesses" style="width: 100%; height: 200px; object-fit: cover;">
                        <p class="text-muted mb-3">
                            With desktop and mid-range systems starting at 200 mm x 200 mm x 200 mm build volumes, print speeds up to 150 mm/s, and energy-efficient designs, these machines are ideal for startups and small businesses in Delhi NCR - Noida.
                        </p>
                        <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-2 px-4">Learn More</a>
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
                    TC Smart Technology provides complete solutions for rapid prototyping, small-batch production, and large-scale project support across various industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Aerospace:</strong> Lightweight, high-strength components like turbine blades and structural brackets using titanium and carbon-fiber-reinforced polymers, with tolerances of ±0.02 mm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automobile:</strong> Functional prototypes and end-use parts like intake manifolds and interior trims, with multi-material printing for integrated assemblies.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture:</strong> Durable parts for irrigation systems, tractor components, and seed planters, using UV-resistant and impact-resistant materials.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Medical:</strong> Biocompatible resin and metal printing for implants, prosthetics, and surgical guides, meeting ISO 13485 and FDA standards.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Power:</strong> Lightweight, heat-resistant parts for wind turbines, solar panel mounts, and electrical insulators, with flame-retardant materials.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Railways:</strong> Durable parts for railcar interiors, track fittings, and signaling equipment, with impact-resistant and weather-resistant materials.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Infrastructure:</strong> Large-format printing for structural components, architectural models, and construction fixtures, with build volumes up to 2,000 mm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Tele-Communication:</strong> High-precision printing for antenna housings, waveguides, and connectors, supporting high-frequency applications with tight tolerances.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Oil & Gas:</strong> Corrosion-resistant components like valve bodies and pipeline fittings, printed with high-performance alloys and polymers.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EMS:</strong> Micro-printing for circuit board enclosures, connectors, and flexible sensors using conductive and dielectric materials.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>General Engineering:</strong> Custom prototypes and functional parts for R&D, with support for multi-material and hybrid manufacturing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Diamond & Jewellery:</strong> High-resolution SLA printing for intricate jewelry molds and lost-wax casting patterns, with details down to 10 µm.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Die & Mould:</strong> Binder jetting for sand and metal molds, reducing lead times by 60% for injection molding and die-casting applications.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Pumps & Valves:</strong> Precision-printed impellers and valve components, ensuring leak-proof performance under high pressure.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Highlights Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Highlights of Our 3D Printing & Additive Manufacturing Machines</h2>
                <p class="lead text-muted">
                    Key specifications that ensure precision, speed, and versatility in manufacturing.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Build Volume:</strong> Ranges from 200 mm x 200 mm x 200 mm (desktop) to 2,000 mm x 1,500 mm x 1,500 mm (industrial), supporting small to large-scale project support.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Resolution and Accuracy:</strong> Layer thicknesses from 10 µm to 100 µm, with positional accuracies of ±10 µm for metal and ±25 µm for polymer printing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Control Systems:</strong> Siemens, B&R, or proprietary TC Smart controls with 15-inch touchscreens, Ethernet connectivity, and support for Industry 4.0 protocols like OPC UA.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Material Versatility:</strong> Supports thermoplastics (ABS, PLA, PEEK), resins, metals (titanium, stainless steel, aluminum), ceramics, and composites, with multi-material and hybrid printing capabilities.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Print Speed:</strong> Up to 300 mm/s for FDM, 1,200 cm³/h for binder jetting, and 100 mm³/s for metal printing, optimizing throughput for high-volume production.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automation Features:</strong> 6-axis robotic arms, automated powder recycling, and vision-guided part inspection for continuous operation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Advanced Features:</strong> Closed-loop thermal control, real-time laser modulation, and AI-optimized build strategies for consistent quality and reduced defects.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Large-Scale Project Support Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Large-Scale Project Support</h2>
                <p class="lead text-muted">
                    Comprehensive solutions for large-scale projects, ensuring efficiency and scalability.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Custom Machine Selection</h5>
                        <p class="text-muted">
                            Matching 3D printers to your project’s material, size, and production requirements.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-tachometer-alt service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Process Optimization</h5>
                        <p class="text-muted">
                            AI-driven build strategies and automation reduce print times by up to 50% and material costs by 20%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-server service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Scalable Production</h5>
                        <p class="text-muted">
                            Multi-printer farms with synchronized controls for high-volume output, supported by cloud-based management.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-users service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Dedicated Support</h5>
                        <p class="text-muted">
                            Project managers and technicians in Delhi NCR - Noida ensure on-time delivery and compliance with industry standards.
                        </p>
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
                    Why manage multiple vendors? TC Smart Technology offers machines, service, and support from a single source, ensuring a seamless experience from Delhi NCR - Noida and worldwide.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('images/3d-printing-technician-support.jpg') }}" alt="Technician providing support in a 3D printing facility" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4 card">
                        <i class="fa fa-tools service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Installation and Setup</h5>
                        <p class="text-muted">
                            Expert installation tailored to your facility in Delhi NCR - Noida or globally, with optimized workflow integration.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4 card">
                        <i class="fa fa-user-check service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Operator Training</h5>
                        <p class="text-muted">
                            Comprehensive training on 3D printing software, material handling, and post-processing, including AR-based tutorials for complex setups.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-headset service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Technical Support</h5>
                        <p class="text-muted">
                            Rapid-response support with remote diagnostics and on-site repairs, minimizing downtime to under 4 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Unmatched Service and Support Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Unmatched Service and Support</h2>
                <p class="lead text-muted">
                    Our commitment extends beyond delivering machines, ensuring long-term success for our clients.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-chalkboard-teacher service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Comprehensive Training</h5>
                        <p class="text-muted">
                            Hands-on training for operators, designers, and engineers, with AR-based tutorials for advanced setups and material handling.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-tools service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Proactive Maintenance</h5>
                        <p class="text-muted">
                            Predictive maintenance with IoT sensors and real-time diagnostics to achieve 99.5% uptime.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-globe service-icon text-primary mb-3"></i>
                        <h5 class="mb-3">Global Support Network</h5>
                        <p class="text-muted">
                            24/7 technical support with remote diagnostics and on-site repairs, ensuring rapid resolution for customers in Delhi NCR - Noida and worldwide.
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
            <img class="img-fluid rounded shadow-sm mb-4 wow fadeInUp" data-wow-delay="0.3s" src="{{ asset('images/3d-printing-facility.jpg') }}" alt="3D printing facility with advanced machines" style="width: 100%; height: 400px; object-fit: cover;">
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Ready to transform your manufacturing with our big line of 3D printing and additive manufacturing machines? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> to explore new machines, specialty equipment, or complete solutions tailored to your industry. Discover why we’re the preferred partner for businesses in Aerospace, Agriculture, Automobile, Diamond & Jewellery, Die & Mould, EMS, General Engineering, Infrastructure, Medical, Oil & Gas, Power, Pumps & Valves, Railways, and Tele-Communication.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>

    <!-- Timestamp -->
    <div class="container-fluid bg-light py-3">
        <div class="container text-center">
            <p class="text-muted mb-0">Last updated: 11:30 PM IST on Sunday, June 08, 2025</p>
        </div>
    </div>
@endsection
