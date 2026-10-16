@extends('frontend.layouts.main')

@section('meta_title', 'Terms & Conditions | TC Smart Technology')
@section('meta_description', 'Review the terms and conditions governing engineering services, project milestones, intellectual property, and equipment integration with TC Smart Technology.')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Terms & Conditions',
        'breadcrumb' => [
            ['label' => 'Terms & Conditions', 'url' => route('terms.conditions')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 900px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <h1 class="h3 fw-bold text-dark mb-3">Terms and Conditions of Engagement</h1>
                <p class="text-muted small mb-4">Effective Date: October 2026 • Version 5</p>

                <div class="text-secondary small d-flex flex-column gap-3" style="line-height: 1.8;">
                    <h5 class="fw-bold text-dark mt-2">1. Scope of Engineering Services</h5>
                    <p>TC Smart Technology delivers specialized engineering services in Embedded Systems Design, Industrial IoT telemetry, Industrial Automation integration, and Custom AI Agents. Every project is defined by a mutually agreed Statement of Work (SOW) specifying deliverables, milestones, technical boundaries, and customer inputs.</p>

                    <h5 class="fw-bold text-dark mt-2">2. Industrial Machine & Operational Safety</h5>
                    <p>Our Industrial IoT, automation, and auto-purging solutions are designed to operate safely within manufacturer specifications. Clients and their qualified plant personnel are responsible for maintaining machine safety interlocks, physical guarding, emergency stop systems, and statutory electrical safety standards. Our software and IoT monitoring layers must never be used to bypass safety-critical machine controls.</p>

                    <h5 class="fw-bold text-dark mt-2">3. Intellectual Property</h5>
                    <p>Upon receipt of full payment for agreed milestones, custom engineering deliverables—including custom schematics, PCB layout files, firmware source code, and project documentation—are transferred to the customer as outlined in the project contract.</p>

                    <h5 class="fw-bold text-dark mt-2">4. Performance and Data Disclaimers</h5>
                    <p>OEE metrics, energy intensity calculations, and machine utilization figures reflect the accuracy and quality of physical signals and operator inputs provided at the customer facility. TC Smart Technology provides visibility and analytical tools but does not warrant guaranteed percentage savings, production yields, or tool lifespans.</p>

                    <h5 class="fw-bold text-dark mt-2">5. Governing Law</h5>
                    <p>These terms are governed by the laws of India. Any disputes arising from engagements shall be subject to the exclusive jurisdiction of the courts of New Delhi.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
