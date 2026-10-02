
@extends('frontend.layouts.main')

@section('meta_title', 'Intelligent BMS for HVAC & Expert HVAC Installation Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Intelligent Building Management Systems (BMS) for HVAC & Expert HVAC Installation Services',
        'breadcrumb' => ['Services', 'Intelligent BMS for HVAC & Expert HVAC Installation Services']
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
                    <h1 class="display-4 mb-4">Intelligent Building Management Systems (BMS) for HVAC & Expert HVAC Installation Services</h1>
                    <p class="lead text-muted mb-4">
                        TC Smart Technology delivers cutting-edge Building Management System (BMS) solutions, specializing in the sophisticated control and optimization of HVAC (Heating, Ventilation, and Air Conditioning) systems. We pair this with comprehensive HVAC Installation Services, ensuring your building's climate control is efficient, reliable, and tailored to your needs. From AC units and AHUs to complex chiller plants, our solutions enhance comfort, reduce energy consumption, and streamline operations.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                  <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC Installation Services.png" alt="Intelligent Building Management Systems (BMS) for HVAC" style="width: 100%; height: 600px; object-fit: cover;">    
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for Your HVAC & BMS Needs?</h2>
                <p class="lead text-muted">
                    Based in Delhi NCR - Noida, TC Smart Technology offers holistic solutions for HVAC system design, installation, and intelligent BMS control with a focus on energy savings, reliability, and customer satisfaction.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Holistic Solutions</h3>
                        <p class="text-muted">
                            One-stop provider for HVAC system design, installation, and intelligent BMS control.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Brand Agnostic Expertise</h3>
                        <p class="text-muted">
                            We work with leading global and Indian brands like Daikin, Carrier, Siemens, and Honeywell.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-bolt fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Energy Savings Focus</h3>
                        <p class="text-muted">
                            Proven strategies to reduce your HVAC operational expenditure.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-tools fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Expert Team</h3>
                        <p class="text-muted">
                            Experienced engineers and technicians dedicated to quality and satisfaction.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-headset fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Reliability & Support</h3>
                        <p class="text-muted">
                            Robust systems backed by responsive technical assistance across India.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center card">
                        <i class="fa fa-building fa-3x text-primary mb-3"></i>
                        <h3 class="mb-3">Customized for You</h3>
                        <p class="text-muted">
                            Solutions tailored to your specific building type, operational needs, and budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Solutions Aim Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our BMS & HVAC Solutions Aim To</h2>
                <p class="lead text-muted">
                    Deliver intelligent, scalable, and efficient HVAC management for optimal building performance.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVACAMC.jpg" alt="IDeliver intelligent, scalable, and efficient HVAC management" style="width: 100%; height: 500px; object-fit: cover;">    
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automate & Optimize:</strong> Intelligently control Air Conditioners (ACs), Air Handling Units (AHUs), Fan Coil Units (FCUs), Chillers, Boilers, VAVs, and related HVAC equipment.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Enhance Comfort:</strong> Precisely manage temperature, humidity, and air quality for optimal occupant well-being.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Maximize Energy Efficiency:</strong> Implement smart control strategies to significantly reduce HVAC energy consumption and operational costs.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Improve Operational Insight:</strong> Provide real-time monitoring, data logging, and insightful reporting for HVAC system performance.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Ensure Reliability:</strong> Support IoT-based predictive maintenance and early fault detection for HVAC components.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Deliver Seamless Integration:</strong> Offer expert HVAC Installation Services for new constructions and retrofits, fully integrated with our BMS.</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Guarantee Scalability:</strong> Provide modular solutions adaptable to diverse building sizes and complexities.</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Components Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Core Components of Our BMS for HVAC Systems</h2>
                <p class="lead text-muted">
                    Advanced hardware and software for precise HVAC control and optimization.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h4 class="mb-3">HVAC Control Hardware & Field Devices</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-microchip text-primary me-2"></i><strong>PLCs & DDCs:</strong> Siemens SIMATIC, Allen-Bradley, Schneider Modicon, Delta Electronics, Honeywell for AHUs, chillers, and boilers.</li>
                            <li class="mb-2"><i class="fa fa-thermometer-half text-primary me-2"></i><strong>Sensors:</strong> Temperature, humidity, air quality (CO2, VOCs), pressure, flow, occupancy, and current sensors from Siemens, Honeywell, and more.</li>
                            <li class="mb-2"><i class="fa fa-cog text-primary me-2"></i><strong>Actuators & Valves:</strong> Belimo, Siemens, Honeywell, Johnson Controls for dampers, chilled/hot water, and VAV boxes.</li>
                            <li class="mb-2"><i class="fa fa-desktop text-primary me-2"></i><strong>HMIs:</strong> Delta, Siemens, Schneider Electric, Weintek for visualization and overrides.</li>
                            <li class="mb-2"><i class="fa fa-plug text-primary me-2"></i><strong>Relays & Contactors:</strong> Omron, Schneider, Siemens, Finder, L&T for switching HVAC loads.</li>
                            <li class="mb-2"><i class="fa fa-network-wired text-primary me-2"></i><strong>Networking:</strong> BACnet, Modbus, LonWorks, Ethernet gateways by Moxa, Siemens, HMS Networks.</li>
                            <li class="mb-2"><i class="fa fa-bolt text-primary me-2"></i><strong>Power Supplies & Wiring:</strong> Mean Well, Phoenix Contact, Rittal, Elmex, Polycab, Finolex for reliable infrastructure.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h4 class="mb-3">BMS Software & Control Platforms</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-chart-line text-primary me-2"></i><strong>Centralized Supervision:</strong> SCADA-like software with real-time dashboards, trend logging, and energy reporting.</li>
                            <li class="mb-2"><i class="fa fa-code text-primary me-2"></i><strong>PLC/DDC Programming:</strong> Logic block programming, sequence control, PID loop configuration.</li>
                            <li class="mb-2"><i class="fa fa-cloud text-primary me-2"></i><strong>IoT Platforms:</strong> Remote monitoring, data analytics, secure transmission, and predictive analytics.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Features Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key BMS & HVAC Service Features</h2>
                <p class="lead text-muted">
                    Advanced features for automated control, monitoring, and energy management.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Automated HVAC Control Strategies</h5>
                        <p class="text-muted">
                            Optimized start/stop, demand-based ventilation, temperature/humidity regulation, economizer modes, chiller plant sequencing.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Real-Time System Monitoring</h5>
                        <p class="text-muted">
                            Live dashboards showing temperatures, pressures, flow rates, equipment status, and energy consumption.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Energy Management</h5>
                        <p class="text-muted">
                            Strategies for load shedding, optimal setpoints, and minimizing wastage.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Alarm & Event Management</h5>
                        <p class="text-muted">
                            Instant notifications for critical faults, maintenance reminders, and setpoint deviations.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Data Logging & Reporting</h5>
                        <p class="text-muted">
                            Comprehensive historical data for analysis, compliance, and performance verification.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Scalable Architecture</h5>
                        <p class="text-muted">
                            From single AHU control to multi-building campus-wide BMS integration.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Remote Accessibility</h5>
                        <p class="text-muted">
                            Secure web-based or mobile access for monitoring and control.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HVAC Capabilities Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our HVAC BMS Capabilities</h2>
                <p class="lead text-muted">
                    Comprehensive control and optimization for all HVAC components.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Air Handling Units (AHUs):</strong> Fan speed, dampers, filter status, heating/cooling coils.</li>
                            <li class="mb-2"><i class="fa fa-snowflake text-primary me-2"></i><strong>Chillers & Boiler Plants:</strong> Sequencing, load balancing, pump control, efficiency monitoring.</li>
                            <li class="mb-2"><i class="fa fa-wind text-primary me-2"></i><strong>Variable Air Volume (VAV) Systems:</strong> Zone temperature control, airflow modulation.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-thermometer-half text-primary me-2"></i><strong>Fan Coil Units (FCUs):</strong> Individual room temperature control.</li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Pumping Systems:</strong> Chilled water, hot water, condenser water pumps.</li>
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i><strong>Cooling Towers:</strong> Fan speed, water level, and bypass control.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Exhaust & Ventilation Fans:</strong> Based on air quality or occupancy schedules.</li>
                            <li class="mb-2"><i class="fa fa-cogs text-primary me-2"></i><strong>Integration with AC Units:</strong> Centralized scheduling and setpoint limits.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Installation Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive HVAC Installation Services</h2>
                <p class="lead text-muted">
                    Expert installation and integration for seamless HVAC performance.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                      <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/hvac.png" alt="Comprehensive HVAC Installation Services" style="width: 100%; height: 1415px; object-fit: cover;">    
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-drafting-compass fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Consultation & Design</h5>
                        <p class="text-muted">
                            Tailored HVAC system design to meet building loads and energy goals.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-truck fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Equipment Sourcing & Supply</h5>
                        <p class="text-muted">
                            Procurement of AHUs, chillers, ACs, ductwork, and piping from leading brands.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Professional Installation</h5>
                        <p class="text-muted">
                            Expert installation of all HVAC equipment by certified technicians.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-cogs fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">BMS Integration</h5>
                        <p class="text-muted">
                            Seamless installation of sensors, actuators, and network cabling, integrated with the HVAC system.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-check-circle fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">System Programming & Commissioning</h5>
                        <p class="text-muted">
                            Configuration of BMS software, thorough testing, and system handover.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-book fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Documentation & Training</h5>
                        <p class="text-muted">
                            Comprehensive user manuals and operator training.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">After-Sales Support & Maintenance</h5>
                        <p class="text-muted">
                            AMC options and responsive support for ongoing system performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compliance & Standards Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Compliance & Standards</h2>
                <p class="lead text-muted">
                    Adhering to industry standards for quality and efficiency.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-building text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Building Codes</h5>
                        <p class="text-muted">
                            Adherence to relevant building codes (e.g., National Building Code of India).
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-leaf text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Energy Efficiency</h5>
                        <p class="text-muted">
                            Focus on energy efficiency standards and guidelines (e.g., ECBC, ASHRAE).
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-network-wired text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Communication Protocols</h5>
                        <p class="text-muted">
                            Utilization of industry-standard protocols (e.g., BACnet, Modbus).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance & AMC Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive HVAC Maintenance & Annual Maintenance Contracts (AMC)</h2>
                <p class="lead text-muted">
                    Proactive care to maximize uptime, efficiency, and lifespan of your HVAC systems.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Our HVAC Maintenance & AMC Services Aim To</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-clock text-primary me-2"></i><strong>Maximize Uptime:</strong> Minimize unexpected breakdowns and costly disruptions.</li>
                            <li class="mb-2"><i class="fa fa-bolt text-primary me-2"></i><strong>Sustain Peak Efficiency:</strong> Keep systems at designed energy efficiency levels.</li>
                            <li class="mb-2"><i class="fa fa-hourglass-half text-primary me-2"></i><strong>Extend Equipment Lifespan:</strong> Protect assets through regular care.</li>
                            <li class="mb-2"><i class="fa fa-wind text-primary me-2"></i><strong>Ensure Optimal Indoor Air Quality (IAQ):</strong> Maintain healthy environments.</li>
                            <li class="mb-2"><i class="fa fa-shield-alt text-primary me-2"></i><strong>Provide Peace of Mind:</strong> Reliable, scheduled service and prompt support.</li>
                            <li class="mb-2"><i class="fa fa-money-bill-wave text-primary me-2"></i><strong>Optimize Operational Costs:</strong> Prevent minor issues from escalating.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Key Benefits of Regular HVAC Maintenance</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Enhanced Reliability:</strong> Reduces the likelihood of system failures.</li>
                            <li class="mb-2"><i class="fa fa-bolt text-primary me-2"></i><strong>Improved Energy Efficiency:</strong> Lower energy consumption with clean components.</li>
                            <li class="mb-2"><i class="fa fa-hourglass-half text-primary me-2"></i><strong>Extended Equipment Life:</strong> Well-maintained systems last longer.</li>
                            <li class="mb-2"><i class="fa fa-wind text-primary me-2"></i><strong>Better Air Quality:</strong> Regular cleaning of filters, coils, and drain pans.</li>
                            <li class="mb-2"><i class="fa fa-money-bill-wave text-primary me-2"></i><strong>Reduced Repair Costs:</strong> Early detection prevents costly repairs.</li>
                            <li class="mb-2"><i class="fa fa-thermometer-half text-primary me-2"></i><strong>Consistent Comfort:</strong> Delivers desired temperature and humidity.</li>
                            <li class="mb-2"><i class="fa fa-shield-alt text-primary me-2"></i><strong>Compliance & Safety:</strong> Meets operational guidelines and ensures safety.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AMC Packages Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Comprehensive AMC Packages</h2>
                <p class="lead text-muted">
                    Tailored maintenance plans for all HVAC equipment.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Scheduled Preventive Maintenance (PM) Visits</h5>
                        <p class="text-muted">
                            Regular inspections and servicing (e.g., quarterly, bi-annually) with detailed checklists.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">System Inspections & Cleaning</h5>
                        <p class="text-muted">
                            Cleaning/replacement of filters, coils, drain lines, blowers, fans, and motors.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Operational Checks & Adjustments</h5>
                        <p class="text-muted">
                            Monitoring pressures, temperatures, refrigerant levels, thermostats, electrical connections, lubrication, and belts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Emergency Breakdown Support</h5>
                        <p class="text-muted">
                            Defined response times for urgent calls, troubleshooting, and fault diagnosis.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Reporting & Recommendations</h5>
                        <p class="text-muted">
                            Detailed service reports and recommendations for repairs or upgrades.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Preferential Service</h5>
                        <p class="text-muted">
                            Priority scheduling and potential discounts for AMC clients.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Equipment Serviced Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">HVAC Equipment We Service Under AMC</h2>
                <p class="lead text-muted">
                    Comprehensive maintenance for all HVAC components.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-snowflake text-primary me-2"></i><strong>Air Conditioners:</strong> Split ACs, Cassette ACs, Ducted Split ACs, VRF/VRV systems.</li>
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Air Handling Units (AHUs):</strong> Fans, motors, coils, filters, dampers.</li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Chillers:</strong> Air-cooled and water-cooled, including compressors and condensers.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i><strong>Cooling Towers:</strong> Fans, motors, fill media, water distribution.</li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Pumps:</strong> Chilled water, condenser water, hot water pumps.</li>
                            <li class="mb-2"><i class="fa fa-thermometer-half text-primary me-2"></i><strong>Fan Coil Units (FCUs):</strong> Fans, coils, filters, control valves.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Ventilation Systems:</strong> Exhaust fans, fresh air fans.</li>
                            <li class="mb-2"><i class="fa fa-cogs text-primary me-2"></i><strong>Controls & Electrical Panels:</strong> Related to HVAC equipment.</li>
                            <li class="mb-2"><i class="fa fa-pipe-section text-primary me-2"></i><strong>Ductwork & Piping:</strong> Visual inspection for integrity and insulation.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance Approach Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Maintenance Approach</h2>
                <p class="lead text-muted">
                    Proactive, predictive, and responsive strategies for HVAC maintenance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Proactive & Preventive</h5>
                        <p class="text-muted">
                            Prevent problems through systematic checks and servicing.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Predictive (Leveraging BMS Data)</h5>
                        <p class="text-muted">
                            Analyze performance trends to anticipate potential issues.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Responsive & Efficient</h5>
                        <p class="text-muted">
                            Diagnose faults and perform repairs efficiently to minimize downtime.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Skilled & Certified Technicians</h5>
                        <p class="text-muted">
                            Experienced technicians for a wide range of HVAC equipment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Partner for Maintenance Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Partner with TC Smart Technology for HVAC Maintenance?</h2>
                <p class="lead text-muted">
                    Expert maintenance services for efficiency and longevity.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-cogs text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">System-Wide Expertise</h5>
                        <p class="text-muted">
                            Deep understanding of HVAC components and BMS interactions.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-users text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Qualified Professionals</h5>
                        <p class="text-muted">
                            Experienced and trained technicians dedicated to quality service.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-cog text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Customizable AMC Plans</h5>
                        <p class="text-muted">
                            Tailored maintenance schedules to your needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-tools text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Genuine Spares & Quality Workmanship</h5>
                        <p class="text-muted">
                            Ensuring long-lasting repairs and reliable operation.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-comments text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Transparent Communication</h5>
                        <p class="text-muted">
                            Clear service reports and proactive recommendations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <i class="fa fa-headset text-primary fa-2x mb-3"></i>
                        <h5 class="mb-3">Reliable Support Network</h5>
                        <p class="text-muted">
                            Prompt service across Delhi NCR and Noida.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Optimize Your Building's Climate with TC Smart Technology</h2>
            <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC.jpg" alt="COptimize Your Building's Climate with TC Smart Technology" style="width: 100%; height: 600px; object-fit: cover;">    
            <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s">
                Contact us to secure your HVAC investment: <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a><br>
                📍 Delhi NCR, Noida<br>
                Optimize your building's climate and efficiency with TC Smart Technology!
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Contact Us Now</a>
        </div>
    </div>
@endsection
