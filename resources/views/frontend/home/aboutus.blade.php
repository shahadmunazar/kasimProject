@extends('frontend.layouts.main')

@section('meta_title', 'About TC Smart Technology | Innovations in Embedded & Automation')

@section('content')
<div class="container-fluid page-header pt-5 mb-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white p-5">
                    <h1 class="display-6 text-uppercase mb-3 animated slideInDown">About</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">

    {{-- Section 1: Image Left, Content Right --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
<img src="{{ asset('assets/img/HVAC.png') }}" alt="Web Development" class="img-fluid rounded shadow" style="height: 400px; width: 515px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">A professional and user-friendly website is the digital face of your business</h2>
            <p>At TC Smart Technology, we design and develop modern, responsive, and SEO-optimized websites that not only look stunning but also rank well in search engines.</p>
            <h5 class="mt-4">We specialize in:</h5>
            <ul>
                <li>Corporate Website Development</li>
                <li>E-commerce Website Development</li>
                <li>Educational Portals & LMS</li>
                <li>Healthcare Websites</li>
                <li>Custom Web Portals</li>
            </ul>
        </div>
    </div>
<br>
    {{-- Section 2: Content Left, Image Right --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('assets/img/Software APP Development  (1).png') }}" alt="Mobile App Development" class="img-fluid rounded shadow " >
        </div>
        <div class="col-md-6 order-md-1">
            <h3 class="mb-4">Mobile App Development – Reach Customers on Every Device</h3>
            <p>We help brands build intuitive and high-performance mobile applications that delight users across Android and iOS platforms.</p>
            <h5 class="mt-4">Our Mobile App Services Include:</h5>
            <ul>
                <li>Android & iOS App Development</li>
                <li>Cross-Platform Solutions</li>
                <li>IoT, Healthcare, E-learning Apps</li>
                <li>E-commerce, On-Demand, CRM Apps</li>
            </ul>
        </div>
    </div>
<br>
    {{-- Section 3: Image Center, Content Below --}}
    <div class="text-center mb-5">
        <img src="{{ asset('assets/img/HVACAMC.jpg') }}" alt="Desktop Development" class="img-fluid rounded shadow mb-4" style="max-width: 70%; height: 400px; width: 515px; object-fit: cover;">
        <h3 class="mt-4">Desktop Software Development – Powerful Solutions for Specific Tasks</h3>
        <p>Our desktop development team builds custom applications tailored to your exact workflow, ensuring performance, security, and offline access.</p>
        <h5 class="mt-4">We develop:</h5>
        <ul class="list-unstyled">
            <li>Windows Applications (C#, .NET, Electron)</li>
            <li>Industrial & Factory Interfaces</li>
            <li>Retail and Inventory Systems</li>
        </ul>
    </div>
<br>
    {{-- Section 4: Image Left, Content Right --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/img/HVACTermostateSetting.jpg') }}" alt="Full Cycle Development" class="img-fluid rounded shadow" style="height: 400px; width: 515px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h3 class="mt-4">Full-Cycle Software Development Services</h3>
            <p>We cover the entire lifecycle of your project—planning, development, testing, deployment, and maintenance.</p>
            <ul>
                <li>UI/UX Design & Wireframing</li>
                <li>Frontend & Backend Development</li>
                <li>Cloud Deployment, DevOps, CI/CD</li>
                <li>Software Testing & Cybersecurity</li>
            </ul>
        </div>
    </div>
<br>
    {{-- Section 5: Content Left, Image Right --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('assets/img/EmbeddedPCBDesign.jpg') }}" alt="Product Solutions" class="img-fluid rounded shadow" style="height: 400px; width: 515px; object-fit: cover;">
        </div>
        <div class="col-md-6 order-md-1">
            <h3 class="mt-4">Product Solutions from TC Smart Technology</h3>
            <ul>
                <li>Hospital Management Software</li>
                <li>School & College ERP</li>
                <li>Retail Billing & POS System</li>
                <li>HR & Payroll Software</li>
                <li>Online Exam Portals</li>
                <li>CRM Software</li>
                <li>Construction Project Tools</li>
            </ul>
        </div>
    </div>
<br>
    {{-- Section 6: Image Center, Content Below --}}
    <div class="text-center">
        <img src="{{ asset('assets/img/HVAC.png') }}" alt="Why Choose Us" class="img-fluid rounded shadow mb-4" style="max-width: 60%;">
        <h3 class="mt-4">Why Choose TC Smart Technology?</h3>
        <ul class="list-unstyled">
            <li>Skilled & Experienced Team</li>
            <li>Client-Centric Approach</li>
            <li>End-to-End Ownership</li>
            <li>Affordable Pricing</li>
            <li>Scalable Solutions</li>
        </ul>
    </div>
</div>
@endsection
