@extends('frontend.layouts.main')

@section('meta_title', 'Privacy Policy | TC Smart Technology')
@section('meta_description', 'Read TC Smart Technology\'s privacy policy governing website data, customer inquiries, telemetry information, and data protection practices.')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Privacy Policy',
        'breadcrumb' => [
            ['label' => 'Privacy Policy', 'url' => route('privacy.policy')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 900px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <h1 class="h3 fw-bold text-dark mb-3">Privacy & Data Governance Policy</h1>
                <p class="text-muted small mb-4">Last Updated: October 2026 • Version 5</p>

                <div class="text-secondary small d-flex flex-column gap-3" style="line-height: 1.8;">
                    <h5 class="fw-bold text-dark mt-2">1. Overview</h5>
                    <p>TC Smart Technology ("we", "our", or "the Company") is committed to protecting the privacy and confidentiality of visitors, clients, and partners. This policy outlines how information is collected, processed, and safeguarded across our website and project engineering services.</p>

                    <h5 class="fw-bold text-dark mt-2">2. Information We Collect</h5>
                    <p>We collect information submitted voluntarily through our consultation forms, RFQ requests, customer support inquiries, and newsletter signups. This may include your name, company name, professional email address, telephone number, and engineering project requirements.</p>

                    <h5 class="fw-bold text-dark mt-2">3. Industrial Telemetry and Project Data</h5>
                    <p>For clients deploying our Industrial IoT, OEE, or data logging systems, data ownership remains strictly with the customer. Operational sensor telemetry, machine status logs, and production counts collected by edge gateways are routed solely to customer-authorized databases or private cloud instances. We do not sell or monetize client telemetry.</p>

                    <h5 class="fw-bold text-dark mt-2">4. Custom AI Workflows & Data Confidentiality</h5>
                    <p>Custom AI agents developed by TC Smart Technology operate strictly on authorized data sources with role-based access. Client documents, manuals, and correspondence processed through RAG or workflow agents are protected against unauthorized training on public LLM models.</p>

                    <h5 class="fw-bold text-dark mt-2">5. Data Retention and Security</h5>
                    <p>We implement industry-standard encryption (TLS/HTTPS), role-based permissions, and periodic access reviews to protect stored records. Data retention periods are defined based on contractual agreements and statutory requirements.</p>

                    <h5 class="fw-bold text-dark mt-2">6. Contact Information</h5>
                    <p>For questions or privacy requests regarding your personal or business data, contact our privacy officer at <a href="mailto:info@tcsmarttechnology.com" class="text-primary fw-semibold">info@tcsmarttechnology.com</a> or visit our office at D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
