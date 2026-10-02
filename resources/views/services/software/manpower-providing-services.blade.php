@extends('frontend.layouts.main')

@section('meta_title', 'Manpower Providing Services | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Manpower Providing Services',
        'breadcrumb' => ['Services', 'Manpower']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Build Your Team with TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology offers comprehensive manpower staffing solutions across India and abroad. We provide skilled and semi-skilled professionals for technical and non-technical roles, ensuring fast, reliable, and compliant hiring for your business needs.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Manpower Providing Services (2).png" alt="Build Your Team with TC Smart Technology manpower" style="width: 100%; height: 500px; object-fit: cover;">                  </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology?</h2>
                <p class="lead text-muted">
                    We deliver tailored staffing solutions with a vast candidate database, domain expertise, and compliance support, ensuring your workforce is productive and aligned with your business goals.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-users fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Large Talent Pool</h4>
                        <p class="text-muted">
                            Access to pre-screened, verified candidates.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-clock fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Fast Hiring</h4>
                        <p class="text-muted">
                            Quick turnaround for all staffing needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-check-circle fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Compliance</h4>
                        <p class="text-muted">
                            Adherence to labor laws and regulations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Manpower Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Manpower Solutions</h2>
                <p class="lead text-muted">
                    Skilled professionals for engineering and IT sectors.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Software Developers:</strong> Full-stack, mobile, and cloud experts.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>IT Support:</strong> System admins and network specialists.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary fa me-2"></i><strong>Automation Engineers:</strong> PLC, SCADA, and IoT professionals.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Project Managers:</strong> Experienced technical leads.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary fa me-2"></i><strong>Data Science:</strong> AI, ML, and big data specialists.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electrical Engineers:</strong> Power and electronics expertise.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Mechanical Engineers:</strong> Design and manufacturing roles.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Quality Engineers:</strong> Testing and compliance specialists.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Embedded Systems:</strong> LabVIEW and IoT professionals.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Industries:</strong> IT, telecom, automotive, and more.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Non-Technical Manpower Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Non-Technical Manpower Solutions</h2>
                <p class="lead text-muted">
                    Reliable staff for operational and support roles.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>HR & Admin:</strong> Recruitment and office management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Sales & Marketing:</strong> Executives and campaign staff.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Customer Support:</strong> Call center and service reps.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Data Entry:</strong> Accurate and efficient operators.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Logistics:</strong> Supply chain and warehouse staff.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Hospitality:</strong> Front desk and service personnel.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Security & Drivers:</strong> Trained and verified staff.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Housekeeping:</strong> Maintenance and cleaning teams.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry Focus Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Industry-Focused Placement</h2>
                <p class="lead text-muted">
                    Staffing solutions for diverse sectors and regions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Pan-India</h5>
                        <p class="text-muted">
                            Metro cities to industrial zones.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Overseas</h5>
                        <p class="text-muted">
                            Gulf, Europe, and Asia-Pacific markets.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">MNCs</h5>
                        <p class="text-muted">
                            Global corporate hiring standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Government & PSU</h5>
                        <p class="text-muted">
                            Tender-based manpower support.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Staffing Models Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Staffing Models Offered</h2>
                <p class="lead text-muted">
                    Flexible hiring options to meet your needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Permanent Hiring</h5>
                        <p class="text-muted">
                            Full-time staff on your payroll.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Contract Staffing</h5>
                        <p class="text-muted">
                            Short-term project-based workforce.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Third-Party Payroll</h5>
                        <p class="text-muted">
                            Fully managed staffing solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Bulk Hiring</h5>
                        <p class="text-muted">
                            Rapid recruitment for large projects.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service & Support Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End Staffing Support</h2>
                <p class="lead text-muted">
                    From recruitment to deployment, we’re your workforce partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Manpower Providing Services (3).png" alt="End-to-End Staffing Support of manpower" style="width: 100%; height: 600px; object-fit: cover;">  
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-search fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Candidate Screening</h5>
                        <p class="text-muted">
                            Verified profiles with reference checks.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-users fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Domain Expertise</h5>
                        <p class="text-muted">
                            Specialized recruitment for all sectors.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Post-Deployment Support</h5>
                        <p class="text-muted">
                            Monitoring and compliance management.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Partner with Us?</h2>
                <p class="lead text-muted">
                    Build a stronger workforce with our reliable staffing solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Fast Placement</h5>
                        <p class="text-muted">
                            Quick hiring for urgent needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Verified Talent</h5>
                        <p class="text-muted">
                            Background-checked candidates.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Global Reach</h5>
                        <p class="text-muted">
                            India and overseas staffing expertise.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Compliance</h5>
                        <p class="text-muted">
                            Adherence to labor regulations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Hire Smarter Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to build your dream team? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-light py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="container-fluid bg-light py-3">
        <div class="container text-center">
            <p class="text-muted mb-0">
                <strong>Contact Information:</strong> Email: <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> | Location: Delhi NCR - Noida
            </p>
        </div>
    </div>
@endsection

<style>
/* Color Combination from Previous Artifacts */
.container-fluid.bg-primary {
    background: linear-gradient(135deg, #ce9233, #ce9233);
}
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
.bg-light {
    background-color: #f5f5f5 !important;
}
.card, .bg-white {
    background-color: #ffffff;
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover, .bg-white:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
img.rounded {
    transition: opacity 0.3s;
}
img.rounded:hover {
    opacity: 0.9;
}
h1.display-4, h2.display-5 {
    font-weight: 700;
    color: #333333;
}
.text-muted {
    color: #666666 !important;
}
.text-primary {
    color: #d81b60 !important;
}
.btn-light {
    color: #333333;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-light:hover {
    background-color: #e0e0e0;
    transform: scale(1.05);
}
</style>
