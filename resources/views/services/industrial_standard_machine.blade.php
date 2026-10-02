@extends('frontend.layouts.main')

@section('meta_title', 'Industrial Standard Machine')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HVAC System Solutions',
        'breadcrumb' => ['Services', 'Industrial Standard Machine']
    ])

    <div class="container py-4">
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <img src="/assets/img/HVAC.png" alt="HVAC Systems" class="img-fluid mb-3" style="height: 400px; width: 500px; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <h5 class="text-uppercase">HVAC System Solutions</h5>
                <p>We offer full-service HVAC solutions for residential, commercial, and industrial setups:</p>
                <ul>
                    <li>Centralized HVAC design, supply, and installation</li>
                    <li>Split AC systems with Annual Maintenance Contracts (AMC)</li>
                    <li>Smart climate control systems</li>
                    <li>IAQ (Indoor Air Quality) enhancement and energy recovery ventilation</li>
                    <li>System optimization, load calculation, and 24/7 emergency support</li>
                </ul>
                <p>Our focus is on comfort, efficiency, and long-term performance.</p>
            </div>
        </div>

        {{-- TC Smart Technology Section --}}
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Premier CNC, VMC, and HMC Machining Services by TC Smart Technology – Your Innovation Partner</h2>
                <p>Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where precision, innovation, and futuristic technology converge to redefine manufacturing...</p>
                {{-- Include the rest of the content similarly, broken into <p>, <ul>, <h4>, etc. --}}
                {{-- You may want to segment sections like "Why Choose TC Smart Technology", "State-of-the-Art New Machines", etc. --}}

                {{-- Example section formatting: --}}
                <h4 class="mt-5">Why Choose TC Smart Technology’s CNC, VMC, and HMC Machining Centers?</h4>
                <p>Based in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge CNC & VMC/HMC Machining Centers...</p>

                <h4 class="mt-4">State-of-the-Art New Machines</h4>
                <p>Our new machines feature high-speed spindles (up to 36,000 RPM)...</p>

                <h4 class="mt-4">Comprehensive Range of Machine Types</h4>
                <ul>
                    <li><strong>CNC Vertical Machining Centers (VMCs):</strong> Rigid C-frame designs...</li>
                    <li><strong>CNC Horizontal Machining Centers (HMCs):</strong> High-volume production with dual-pallet systems...</li>
                    <li><strong>CNC 5-Axis Machining Centers:</strong> Simultaneous 5-axis control...</li>
                    {{-- Add the rest accordingly --}}
                </ul>

                <h4 class="mt-4">Specialty CNC Equipment with Advanced Features</h4>
                <ul>
                    <li><strong>CNC Machines with Robot Integration:</strong> Automated part loading/unloading...</li>
                    <li><strong>CNC with IoT Connectivity:</strong> Real-time monitoring via IoT-enabled sensors...</li>
                    {{-- Continue listing all specialty features --}}
                </ul>

                {{-- Continue with remaining sections similarly --}}
                <h4 class="mt-4">Most In-Demand Machines</h4>
                <p>Our most in-demand machines are trusted by global manufacturers for their reliability and performance...</p>

                <h4 class="mt-4">Affordable CNC Machines</h4>
                <p>Our cheap CNC machines deliver high performance at budget-friendly prices...</p>

                <h4 class="mt-4">Complete Solutions for Every Industry</h4>
                <p>TC Smart Technology provides complete solutions tailored to your industry...</p>

                <h4 class="mt-4">Machines, Service, and Support from One Provider</h4>
                <p>At TC Smart Technology, we simplify your operations by offering machines, service, and support from a single source...</p>

                <h4 class="mt-4">Why TC Smart Technology is Special</h4>
                <ul>
                    <li><strong>CNC with Robot Integration:</strong> Our machines feature advanced robotic systems...</li>
                    <li><strong>CNC with IoT and Smart Factory Integration:</strong> IoT-enabled machines...</li>
                    {{-- Continue bullet list --}}
                </ul>

                <h4 class="mt-4">Technical Highlights of Our CNC, VMC, and HMC Machines</h4>
                <ul>
                    <li><strong>Spindle Performance:</strong> High-power spindles (10 kW to 60 kW)...</li>
                    <li><strong>Axis Precision:</strong> 3- to 5-axis systems...</li>
                    {{-- Continue list --}}
                </ul>

                <h4 class="mt-4">Large-Scale Project Support</h4>
                <p>For large-scale projects, TC Smart Technology provides...</p>

                <h4 class="mt-4">Unmatched Service and Support</h4>
                <p>Our commitment extends beyond delivering machines...</p>

                <h4 class="mt-4">Get Started with TC Smart Technology</h4>
                <p>Ready to revolutionize your manufacturing... Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a></p>
                <p><strong>TC Smart Technology – Precision. Innovation. Future.</strong></p>
            </div>
        </div>
    </div>
@endsection
