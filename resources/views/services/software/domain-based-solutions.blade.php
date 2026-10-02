@extends('frontend.layouts.main')

@section('meta_title', 'Domain-Based Standard Solutions | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Domain-Based Standard Solutions',
        'breadcrumb' => ['Services', 'Domain-Based Solutions']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Domain-Based Solutions by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Located in Delhi NCR - Noida, TC Smart Technology offers ready-to-deploy, customizable software solutions for industries like E-commerce, Healthcare, Education, and more. Our scalable, user-friendly platforms empower businesses to go digital quickly and efficiently.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Standard domain based  App and Web .png" alt="Domain based standard solutions" style="width: 100%; height: 550px; object-fit: cover;">  
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
                    Based in Delhi NCR - Noida, we provide over 20 ready-to-deploy solutions that are SEO-optimized, mobile-responsive, and customizable. Our platforms ensure quick deployment, scalability, and secure, cloud-compatible architecture for diverse industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-rocket fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Rapid Deployment</h4>
                        <p class="text-muted">
                            Launch solutions quickly with ready-to-use platforms.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-expand-arrows-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Scalable & Customizable</h4>
                        <p class="text-muted">
                            Tailored platforms that grow with your business.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Secure & Responsive</h4>
                        <p class="text-muted">
                            Mobile-friendly designs with robust security.
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
                <h2 class="display-5 mb-3">Our Domain-Based Solutions</h2>
                <p class="lead text-muted">
                    Ready-to-deploy platforms for diverse industries and use cases.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">E-commerce Platforms</h5>
                        <p class="text-muted">
                            Inventory, payments, and order management for online stores.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Healthcare Platforms</h5>
                        <p class="text-muted">
                            Appointment scheduling, EHR, and telemedicine solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">EdTech Platforms</h5>
                        <p class="text-muted">
                            Online courses, live classes, and performance analytics.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Real Estate Platforms</h5>
                        <p class="text-muted">
                            Property listings, CRM, and lead management.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Matrimonial Platforms</h5>
                        <p class="text-muted">
                            Profile creation and smart match suggestions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Travel & Tourism</h5>
                        <p class="text-muted">
                            Holiday packages, bookings, and itinerary planning.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Job Portals</h5>
                        <p class="text-muted">
                            Job postings, candidate resumes, and employer dashboards.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Restaurant & Food Delivery</h5>
                        <p class="text-muted">
                            Online ordering, delivery tracking, and menu management.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Fintech Solutions</h5>
                        <p class="text-muted">
                            Loan calculators, expense trackers, and KYC integration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Services Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">More Domain-Based Solutions</h2>
                <p class="lead text-muted">
                    Specialized platforms for diverse industry needs.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>NGO Platforms:</strong> Donation and volunteer management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Event Management:</strong> Event listings and ticketing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Fitness Platforms:</strong> Workout and class scheduling.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Agriculture Platforms:</strong> Crop and farm management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Media Platforms:</strong> News and content management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Logistics Platforms:</strong> Fleet and delivery tracking.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>E-commerce:</strong> Multi-vendor and grocery delivery.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Healthcare:</strong> Telemedicine and pharmacy apps.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>EdTech:</strong> Online learning and coaching.</li>
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
                    Advanced features powering our domain-based solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Frameworks:</strong> Laravel, ReactJS, Flutter, WordPress.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cloud Hosting:</strong> AWS, Google Cloud, Azure.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>SEO Optimized:</strong> Enhanced visibility and rankings.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Responsive Design:</strong> Mobile and desktop compatibility.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Security:</strong> Encrypted data and secure APIs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Scalability:</strong> Platforms that grow with your business.</li>
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
                <h2 class="display-5 mb-3">End-to-End Support</h2>
                <p class="lead text-muted">
                    From deployment to ongoing maintenance, we’re your digital partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
               <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Standard domain based  App and Web .jpg" alt="end to end support for domain based solutions" style="width: 100%; height: 570px; object-fit: cover;">  
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Quick Deployment</h5>
                        <p class="text-muted">
                            Ready-to-use platforms with seamless setup.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">User Training</h5>
                        <p class="text-muted">
                            Comprehensive training for platform management.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Ongoing support for updates and optimization.
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
                <h2 class="display-5 mb-3">Why Choose Our Solutions?</h2>
                <p class="lead text-muted">
                    Transform your business with industry-specific platforms.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Fast Deployment</h5>
                        <p class="text-muted">
                            Launch quickly with pre-built solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Customizable Platforms</h5>
                        <p class="text-muted">
                            Tailored to your brand and business needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">User-Friendly Design</h5>
                        <p class="text-muted">
                            Intuitive interfaces for seamless adoption.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Architecture</h5>
                        <p class="text-muted">
                            Platforms that grow with your business.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Go Digital with Our Solutions</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to launch your business idea with our domain-based platforms? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free demo.
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
/* Color Combination from Provided Artifact */
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
