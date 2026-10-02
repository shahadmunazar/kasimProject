@extends('frontend.layouts.main')

@section('meta_title', 'Industrial Automation & Robotics Solutions | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Industrial Automation & Robotics Solutions',
        'breadcrumb' => ['Services', 'Automation & Robotics']
    ])

    <div class="container py-4">
        <!-- Row 1: Introduction with Image -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/automation-robotics.jpg') }}" alt="Robotic arm in smart factory" class="img-fluid mb-3" style="height: 400px; width: 500px; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <h5 class="text-uppercase mb-3">Smart Automation Solutions</h5>
                <p>We provide smart automation systems and robotics to help industries boost productivity and precision. Our solutions include:</p>
                <ul>
                    <li>Welding robots, pick-and-place robots, and stack-making robots</li>
                    <li>Conveyor systems and robotic arms</li>
                    <li>Custom Special Purpose Machines (SPM)</li>
                    <li>Factory digitization and intelligent production lines</li>
                    <li>Real-time monitoring, PLC programming, and SCADA integration</li>
                </ul>
                <p>With our smart automation, you reduce downtime, increase output, and future-proof your operations.</p>
                <div class="mt-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary me-2">Contact Us</a>
                    <a href="#solutions" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- TC Smart Technology Section -->
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Premier Industrial Automation & Robotics Solutions by TC Smart Technology – Your Innovation Partner</h2>
                <p>Welcome to TC Smart Technology, headquartered in Delhi NCR - Noida, where precision, innovation, and futuristic technology converge to redefine industrial automation. Our smart automation systems and robotics solutions empower industries to achieve unparalleled productivity, precision, and efficiency.</p>

                <h4 class="mt-5">Why Choose TC Smart Technology’s Automation & Robotics Solutions?</h4>
                <p>Based in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge automation systems tailored to your industry’s unique needs. Our solutions are designed to optimize operations, reduce costs, and ensure scalability for future growth.</p>

                <h4 class="mt-4">State-of-the-Art Automation Systems</h4>
                <p>Our automation systems feature advanced technologies, including high-precision robotic arms, IoT-enabled monitoring, and intelligent control systems for seamless production.</p>

                <h4 class="mt-4" id="solutions">Comprehensive Range of Solutions</h4>
                <ul>
                    <li><strong>Welding Robots:</strong> High-speed, precise welding for automotive and metal fabrication industries.</li>
                    <li><strong>Pick-and-Place Robots:</strong> Fast, reliable material handling for assembly lines.</li>
                    <li><strong>Stack-Making Robots:</strong> Automated stacking for efficient warehousing and logistics.</li>
                    <li><strong>Conveyor Systems:</strong> Custom-designed conveyors for smooth material flow.</li>
                    <li><strong>Robotic Arms:</strong> Versatile arms for diverse industrial applications.</li>
                </ul>

                <h4 class="mt-4">Specialty Automation Equipment</h4>
                <ul>
                    <li><strong>Custom Special Purpose Machines (SPM):</strong> Tailored machines for specific manufacturing processes.</li>
                    <li><strong>Factory Digitization:</strong> IoT-enabled production lines for real-time data and analytics.</li>
                    <li><strong>PLC & SCADA Integration:</strong> Advanced control systems for precise automation and monitoring.</li>
                </ul>

                <h4 class="mt-4">Most In-Demand Solutions</h4>
                <p>Our automation systems are trusted by global manufacturers for their reliability, precision, and performance, particularly in automotive, electronics, and logistics sectors.</p>

                <h4 class="mt-4">Affordable Automation Solutions</h4>
                <p>Our cost-effective automation systems deliver high performance at budget-friendly prices, making smart manufacturing accessible to businesses of all sizes.</p>

                <h4 class="mt-4">Complete Solutions for Every Industry</h4>
                <p>TC Smart Technology provides end-to-end automation solutions tailored to industries such as automotive, aerospace, electronics, food processing, and more.</p>

                <h4 class="mt-4">Machines, Service, and Support from One Provider</h4>
                <p>We simplify your operations by offering automation systems, installation, and ongoing support from a single source, ensuring seamless integration and performance.</p>

                <h4 class="mt-4">Why TC Smart Technology is Special</h4>
                <ul>
                    <li><strong>Robotic Integration:</strong> Advanced robotic systems for automated workflows.</li>
                    <li><strong>IoT & Smart Factory Integration:</strong> Real-time monitoring and data-driven insights.</li>
                    <li><strong>Custom Engineering:</strong> Bespoke solutions for unique industrial challenges.</li>
                    <li><strong>Global Standards:</strong> Compliance with international quality and safety standards.</li>
                </ul>

                <h4 class="mt-4">Technical Highlights of Our Automation Solutions</h4>
                <ul>
                    <li><strong>Robotic Precision:</strong> Sub-millimeter accuracy for critical tasks.</li>
                    <li><strong>Control Systems:</strong> PLC and SCADA systems for real-time control and monitoring.</li>
                    <li><strong>IoT Connectivity:</strong> Sensors and cloud integration for predictive maintenance.</li>
                    <li><strong>Scalability:</strong> Modular systems for easy upgrades and expansions.</li>
                </ul>

                <h4 class="mt-4">Large-Scale Project Support</h4>
                <p>For large-scale industrial projects, TC Smart Technology provides turnkey automation solutions, from design and installation to commissioning and training.</p>

                <!-- Service & Support Section with Image -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('images/robotics-integration.jpg') }}" alt="Technician integrating robotic system" class="img-fluid mb-3" style="height: 400px; width: 500px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3">Unmatched Service and Support</h4>
                        <p>Our commitment extends beyond delivering systems. We offer 24/7 support, preventive maintenance, and training to ensure your automation systems perform at their best.</p>
                    </div>
                </div>

                <h4 class="mt-4">Get Started with TC Smart Technology</h4>
                <p>Ready to revolutionize your industrial operations? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.</p>
                <p><strong>TC Smart Technology – Precision. Innovation. Future.</strong></p>
                <div class="mt-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary me-2">Contact Us</a>
                    <a href="#solutions" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
/* Color Combination from Previous Artifacts */
.btn-primary {
    background-color: #d81b60;
    border-color: #d81b60;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-primary:hover {
    background-color: #ad1457;
    border-color: #ad1457;
    transform: scale(1.05);
}
.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #5a6268;
    transform: scale(1.05);
}
.bg-light {
    background-color: #f5f5f5 !important;
}
.bg-white {
    background-color: #ffffff;
    transition: transform 0.3s, box-shadow 0.3s;
}
.bg-white:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
img.img-fluid {
    transition: opacity 0.3s;
}
img.img-fluid:hover {
    opacity: 0.9;
}
h2, h4, h5 {
    font-weight: 700;
    color: #333333;
}
.text-muted {
    color: #666666 !important;
}
.text-primary {
    color: #d81b60 !important;
}
</style>
