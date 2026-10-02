@extends('frontend.layouts.main')

@section('meta_title', 'Software Development Solutions')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Software Development Solutions',
        'breadcrumb' => ['Services', 'Software Development Solutions']
    ])

    <div class="container py-4">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets') }}/img/software.jpg" alt="Software Development" class="img-fluid mb-3" style="height: 400px; width: 500px; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <h5 class="text-uppercase">Software Development Solutions</h5>
                <p>Our experienced software team offers both standard and custom software development for various industries. Solutions include:</p>
                <ul>
                    <li>School, college, and hospital management systems</li>
                    <li>E-commerce and CRM platforms</li>
                    <li>Manufacturing traceability and quality control software</li>
                    <li>Android apps and full-stack web development</li>
                    <li>Cloud-based dashboards, APIs, and IoT apps</li>
                </ul>
                <p>We blend user-friendly design with secure, high-performance development to power your digital growth.</p>
            </div>
        </div>
    </div>
@endsection
