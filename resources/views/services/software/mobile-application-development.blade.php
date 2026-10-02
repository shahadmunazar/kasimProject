@extends('frontend.layouts.main')

@section('meta_title', 'Mobile and Web Application Development | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Mobile and Web Application Development',
        'breadcrumb' => ['Services', 'Mobile and Web Apps']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Mobile & Web Apps by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge mobile and web applications for startups, enterprises, and institutions. Our fast, secure, and user-friendly apps transform business processes and enhance user engagement across platforms.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
<img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Mobile %26 Web Application Development (2).png" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 600px; object-fit: cover;">                       </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for App Development?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, we leverage modern frameworks like Flutter, React Native, Laravel, and ReactJS to build scalable, secure apps. Our agile methodology ensures timely delivery, seamless user experiences, and ongoing support for your digital transformation.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-mobile-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Cross-Platform Apps</h4>
                        <p class="text-muted">
                            Seamless performance on Android and iOS with a single codebase.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Secure & Scalable</h4>
                        <p class="text-muted">
                            Robust security and scalability for enterprise-grade solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-users fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">User-Centric Design</h4>
                        <p class="text-muted">
                            Intuitive UI/UX for enhanced user engagement.
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
                <h2 class="display-5 mb-3">Our Mobile & Web App Services</h2>
                <p class="lead text-muted">
                    End-to-end solutions for seamless digital experiences.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Android App Development</h5>
                        <p class="text-muted">
                            Feature-rich apps for Android smartphones and tablets.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">iOS App Development</h5>
                        <p class="text-muted">
                            Sleek apps for iPhones and iPads using Swift.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Hybrid Apps</h5>
                        <p class="text-muted">
                            Cost-effective apps using Flutter and React Native.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enterprise Mobility</h5>
                        <p class="text-muted">
                            Streamline operations with secure enterprise apps.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Web Apps</h5>
                        <p class="text-muted">
                            Tailored web solutions for CRM, ERP, and more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Progressive Web Apps</h5>
                        <p class="text-muted">
                            Fast, installable web apps with offline support.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">E-commerce Platforms</h5>
                        <p class="text-muted">
                            Robust online stores with secure payment integration.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">CMS & Websites</h5>
                        <p class="text-muted">
                            Professional websites with WordPress, Drupal, and more.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Applications Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Popular Applications</h2>
                <p class="lead text-muted">
                    Widely adopted solutions for diverse industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC EduApp:</strong> Education management for schools.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC HealthTrack:</strong> Healthcare app for clinics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC RetailPOS:</strong> Billing and inventory for retailers.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC ServicePlus:</strong> Service booking and management.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>E-learning Apps:</strong> Live classes and assessments.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Healthcare Apps:</strong> Telemedicine and EHR.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>E-commerce Apps:</strong> Online stores and delivery.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Service Booking:</strong> On-demand urban services.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Fintech Apps:</strong> Digital wallets and UPI.</li>
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
                    Cutting-edge technologies powering our app solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Mobile Tech:</strong> Kotlin, Swift, Flutter, React Native.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Web Tech:</strong> ReactJS, Angular, Laravel, Django.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cloud Hosting:</strong> AWS, Google Cloud, Azure.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Security:</strong> High-end encryption and secure APIs.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Design:</strong> Responsive UI/UX for all devices.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Integration:</strong> Fast and reliable API connectivity.</li>
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
                <h2 class="display-5 mb-3">End-to-End App Support</h2>
                <p class="lead text-muted">
                    From development to maintenance, we’re your app partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Mobile %26 Web Application Development.jpg" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 550px; object-fit: cover;">  
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Development</h5>
                        <p class="text-muted">
                            Agile methodology for timely and quality delivery.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">User Training</h5>
                        <p class="text-muted">
                            Comprehensive training for app management.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Ongoing maintenance and performance optimization.
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
                <h2 class="display-5 mb-3">Why Choose Our App Solutions?</h2>
                <p class="lead text-muted">
                    Transform your business with user-friendly, scalable apps.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">High Performance</h5>
                        <p class="text-muted">
                            Fast-loading apps with seamless functionality.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Secure Platforms</h5>
                        <p class="text-muted">
                            Robust security for user data and transactions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">User Engagement</h5>
                        <p class="text-muted">
                            Intuitive designs for better user retention.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Solutions</h5>
                        <p class="text-muted">
                            Apps that grow with your business needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Build Your App Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to transform your business with a custom mobile or web app? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
