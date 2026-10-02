@extends('frontend.layouts.main')

@section('meta_title', 'Responsive HVAC Repair & Emergency Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Responsive HVAC Repair & Emergency Services',
        'breadcrumb' => ['Services', 'Responsive HVAC Repair & Emergency Services']
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
                    <h1 class="display-4 mb-4">Responsive HVAC Repair & Emergency Services</h1>
                    <p class="lead text-muted mb-4">
                        Even with the best preventive maintenance, HVAC systems can sometimes experience unexpected issues or breakdowns. TC Smart Technology offers prompt and reliable HVAC Repair and Emergency Services designed to get your systems back online quickly and efficiently, minimizing disruption to your comfort and operations.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Contact Us Now</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC AMC .png" alt="Responsive HVAC Repair & Emergency Services" style="width: 100%; height: 500px; object-fit: cover;">   
                </div>
            </div>
        </div>
    </div>

    <!-- Service Aims Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our HVAC Repair & Emergency Services Aim To</h2>
                <p class="lead text-muted">
                    Minimize downtime and ensure seamless HVAC operations.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC.png" alt="HVAC Repair & Emergency Services" style="width: 100%; height: 300px; object-fit: cover;">
                </div>
                <div class="col-lg-6 text-center text-lg-start mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa fa-tools text-primary me-2"></i><strong>Rapidly Restore Functionality:</strong> Quickly diagnose and resolve HVAC system faults.</li>
                        <li class="mb-2"><i class="fa fa-briefcase text-primary me-2"></i><strong>Ensure Business Continuity:</strong> Maintain critical environmental conditions.</li>
                        <li class="mb-2"><i class="fa fa-shield-alt text-primary me-2"></i><strong>Prevent Further Damage:</strong> Address issues promptly to avoid escalation.</li>
                        <li class="mb-2"><i class="fa fa-user-check text-primary me-2"></i><strong>Provide Expert Solutions:</strong> Experienced technicians for accurate fixes.</li>
                        <li class="mb-2"><i class="fa fa-heart text-primary me-2"></i><strong>Offer Peace of Mind:</strong> Trusted partner for urgent HVAC needs, 24/7.</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary py-3 px-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Key Benefits of Our HVAC Repair & Emergency Services</h2>
                <p class="lead text-muted">
                    Efficient solutions to keep your HVAC systems running smoothly.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Reduced Downtime</h5>
                        <p class="text-muted">
                            Fast response and efficient repair minimize interruptions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Cost-Effective Solutions</h5>
                        <p class="text-muted">
                            Accurate diagnosis prevents unnecessary replacements.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Expert Diagnosis</h5>
                        <p class="text-muted">
                            Skilled technicians pinpoint complex issues quickly.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Safety Assurance</h5>
                        <p class="text-muted">
                            Repairs adhere to industry best practices.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Access to Spares</h5>
                        <p class="text-muted">
                            Inventory of common parts or quick supplier access.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <h5 class="mb-3">Preservation of Comfort</h5>
                        <p class="text-muted">
                            Swift restoration of heating, cooling, and ventilation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Repair Capabilities Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Comprehensive HVAC Repair Capabilities</h2>
                <p class="lead text-muted">
                    We handle a wide range of HVAC issues and emergencies.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h4 class="mb-3">System Malfunctions</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-snowflake text-primary me-2"></i>AC/AHU not cooling or heating.</li>
                            <li class="mb-2"><i class="fa fa-exclamation-circle text-primary me-2"></i>Chiller tripping or not reaching setpoint.</li>
                            <li class="mb-2"><i class="fa fa-wind text-primary me-2"></i>Poor airflow or uneven temperature.</li>
                            <li class="mb-2"><i class="fa fa-volume-up text-primary me-2"></i>Unusual noises or vibrations.</li>
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i>Water leaks from units or piping.</li>
                            <li class="mb-2"><i class="fa fa-power-off text-primary me-2"></i>System cycling on/off frequently.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Component Failures</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-cog text-primary me-2"></i><strong>Compressor Issues:</strong> Replacement, oil, starting problems.</li>
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Motor Failures:</strong> Fan, pump, compressor motors.</li>
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i><strong>Refrigerant Leaks:</strong> Detection, repair, recharge.</li>
                            <li class="mb-2"><i class="fa fa-bolt text-primary me-2"></i><strong>Electrical Problems:</strong> Contactors, relays, breakers, wiring.</li>
                            <li class="mb-2"><i class="fa fa-microchip text-primary me-2"></i><strong>Control System Faults:</strong> Thermostats, sensors, PLC/DDC.</li>
                            <li class="mb-2"><i class="fa fa-snowflake text-primary me-2"></i><strong>Coil Damage/Leaks:</strong> Evaporator/condenser coil repair.</li>
                            <li class="mb-2"><i class="fa fa-valve text-primary me-2"></i><strong>Valve Malfunctions:</strong> Stuck or leaking valves.</li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Pump Failures:</strong> Chilled/condenser/hot water pumps.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm card">
                        <h4 class="mb-3">Emergency Situations</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-exclamation-triangle text-primary me-2"></i>Complete system breakdown.</li>
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i>Major refrigerant leaks.</li>
                            <li class="mb-2"><i class="fa fa-thermometer-full text-primary me-2"></i>Critical overheating or freezing issues.</li>
                            <li class="mb-2"><i class="fa fa-exclamation-circle text-primary me-2"></i>Risks to comfort, safety, or operations.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Equipment Repaired Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">HVAC Equipment We Repair</h2>
                <p class="lead text-muted">
                    Comprehensive repair services for all HVAC components.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-snowflake text-primary me-2"></i><strong>Air Conditioners:</strong> Split, Cassette, Ducted, VRF/VRV.</li>
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Air Handling Units:</strong> All components.</li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Chillers:</strong> Air-cooled and Water-cooled.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-tint text-primary me-2"></i><strong>Cooling Towers</strong></li>
                            <li class="mb-2"><i class="fa fa-water text-primary me-2"></i><strong>Pumps & Pumping Systems</strong></li>
                            <li class="mb-2"><i class="fa fa-thermometer-half text-primary me-2"></i><strong>Fan Coil Units</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-fan text-primary me-2"></i><strong>Ventilation Fans & Systems</strong></li>
                            <li class="mb-2"><i class="fa fa-cogs text-primary me-2"></i><strong>HVAC Control Panels & BMS</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Process Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Repair & Emergency Service Process</h2>
                <p class="lead text-muted">
                    A streamlined process for quick and effective repairs.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC AHU.png" alt="Repair & Emergency Service Process" style="width: 100%; height: 1200px; object-fit: cover;">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-phone fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">1. Service Call & Initial Assessment</h5>
                        <p class="text-muted">
                            Understand the reported problem and dispatch a technician.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-search fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">2. On-Site Diagnosis</h5>
                        <p class="text-muted">
                            Thorough inspection using diagnostic tools to identify the fault.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-file-invoice fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">3. Transparent Quotation</h5>
                        <p class="text-muted">
                            Detailed quote for repairs before work begins (non-emergency).
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">4. Efficient Repair Execution</h5>
                        <p class="text-muted">
                            Skilled technicians use quality parts with safety protocols.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card mb-4">
                        <i class="fa fa-check-circle fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">5. System Testing & Verification</h5>
                        <p class="text-muted">
                            Post-repair testing to ensure system functionality.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-file-alt fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">6. Client Confirmation & Report</h5>
                        <p class="text-muted">
                            Demonstrate functionality and provide a service report.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Emergency Commitment Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Emergency Service Commitment</h2>
                <p class="lead text-muted">
                    Rapid response for critical HVAC emergencies.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-clock fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Availability</h5>
                        <p class="text-muted">
                            For contracted clients or critical situations.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-exclamation-triangle fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Prioritized Response</h5>
                        <p class="text-muted">
                            Emergency calls receive top priority.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-truck fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Rapid Mobilization</h5>
                        <p class="text-muted">
                            Technician on-site as quickly as possible.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Trust Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Trust TC Smart Technology?</h2>
                <p class="lead text-muted">
                    Expert HVAC repair services with a customer-centric approach.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-users fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Skilled & Certified Technicians</h5>
                        <p class="text-muted">
                            Proficient in diagnosing and repairing HVAC systems.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-clock fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Prompt & Reliable Service</h5>
                        <p class="text-muted">
                            Quick response times to minimize inconvenience.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-search fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Accurate Diagnostics</h5>
                        <p class="text-muted">
                            Identify root causes for lasting solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Quality Workmanship & Parts</h5>
                        <p class="text-muted">
                            Durable and reliable repairs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Customer-Centric Approach</h5>
                        <p class="text-muted">
                            Keep you informed throughout the process.
                        </p>
                        </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-light rounded p-4 shadow-sm card">
                        <i class="fa fa-money-bill-wave fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Competitive & Transparent Pricing</h5>
                        <p class="text-muted">
                            Fair pricing for all repair services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Get Urgent HVAC Assistance with TC Smart Technology</h2>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
               
                <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.5s" style="margin-left: 400px;">
                    Contact us for urgent HVAC assistance: <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a><br>
                    📍 Delhi NCR, Noida
                </p>
                <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5 wow fadeInUp" data-wow-delay="0.7s" style="margin-left: 400px;">Contact Us Now</a>
            </div>
        </div>
    </div>
@endsection
