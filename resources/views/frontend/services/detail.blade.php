@extends('frontend.layouts.main')

@section('meta_title', $service['meta_title'] ?? $service['name'] . ' | TC Smart Technology')
@section('meta_description', $service['meta_description'] ?? $service['short_desc'])
@section('meta_keywords', $service['target_keyword'])

@section('content')
    <!-- 1. Breadcrumb and compact context label -->
    @include('frontend.layouts.page-header', [
        'title' => $service['name'],
        'breadcrumb' => [
            ['label' => 'Services', 'url' => route('services.index')],
            ['label' => $category['short_name'], 'url' => url('/services/' . $category['slug'])],
            ['label' => $service['name'], 'url' => url('/services/' . $category['slug'] . '/' . $serviceSlug)]
        ]
    ])

    <!-- 2. Hero Section -->
    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-primary-subtle text-primary mb-3">
                        <i class="fa {{ $service['icon'] }}"></i>
                        <span class="fw-bold small text-uppercase" style="letter-spacing: 0.06em;">{{ $category['short_name'] }}</span>
                    </div>
                    <!-- One H1 -->
                    <h1 class="display-6 fw-bold text-dark mb-3">{{ $service['name'] }}</h1>
                    <p class="lead text-secondary mb-4" style="line-height: 1.8;">
                        {{ $service['short_desc'] }}
                    </p>

                    <!-- Trust and evidence strip -->
                    <div class="d-flex flex-wrap gap-3 align-items-center py-2 px-3 bg-light rounded-3 border mb-4">
                        <span class="fw-bold extra-small text-uppercase text-muted" style="letter-spacing: 0.05em; font-size: 0.72rem;">Engineering Standard:</span>
                        <span class="badge bg-white text-dark border small fw-normal"><i class="fa fa-check text-success me-1"></i> Tailored Architecture</span>
                        <span class="badge bg-white text-dark border small fw-normal"><i class="fa fa-check text-success me-1"></i> Audit-Supporting Records</span>
                        <span class="badge bg-white text-dark border small fw-normal"><i class="fa fa-check text-success me-1"></i> Industrial Commissioning</span>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                            {{ $service['cta'] }} <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#technical-approach" class="btn btn-outline-secondary px-4 py-2 fw-semibold">
                            Technical Approach <i class="fa fa-chevron-down ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                        <h6 class="fw-bold text-dark text-uppercase mb-3" style="font-size: 0.85rem; letter-spacing: 0.05em;">
                            <i class="fa fa-info-circle text-primary me-2"></i>Quick Service Summary
                        </h6>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">
                            <li class="pb-2 border-bottom">
                                <span class="text-muted d-block">Parent Domain:</span>
                                <strong class="text-dark">{{ $category['name'] }}</strong>
                            </li>
                            <li class="pb-2 border-bottom">
                                <span class="text-muted d-block">Execution Model:</span>
                                <strong class="text-dark">Custom Engineering Scope</strong>
                            </li>
                            <li class="pb-2 border-bottom">
                                <span class="text-muted d-block">Verification:</span>
                                <strong class="text-dark">Bench & Functional Testing</strong>
                            </li>
                            <li>
                                <span class="text-muted d-block">Delivery Deliverables:</span>
                                <strong class="text-dark">Schematics, Code & Documentation</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Customer Problem & Desired Outcome -->
    <section class="py-5 bg-light border-bottom">
        <div class="container py-3">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white border-start border-4 border-danger">
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-square rounded-circle bg-danger-subtle text-danger me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <h3 class="h5 fw-bold text-dark m-0">The Engineering Challenge</h3>
                        </div>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            {{ $service['problem'] }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white border-start border-4 border-success">
                        <div class="d-flex align-items-center mb-3">
                            <div class="btn-square rounded-circle bg-success-subtle text-success me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <h3 class="h5 fw-bold text-dark m-0">The Desired Outcome</h3>
                        </div>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            {{ $service['outcome'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Core Capabilities (3 to 6 scannable cards) -->
    <section class="py-5 bg-white border-bottom">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">SPECIFICATION</span>
                <h2 class="h3 fw-bold text-dark">Core Technical Capabilities</h2>
                <p class="text-muted small">Application-specific engineering focused on reliability, performance, and maintainability.</p>
            </div>

            <div class="row g-4">
                @foreach($service['capabilities'] as $cap)
                    <div class="col-lg-4 col-md-6">
                        <div class="p-4 rounded-4 bg-light border h-100 d-flex align-items-start gap-3">
                            <i class="fa fa-check-circle text-primary mt-1 fs-5"></i>
                            <div>
                                <p class="text-dark fw-semibold small mb-0" style="line-height: 1.5;">{{ $cap }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. Technical Approach & Workflow -->
    <section class="py-5 bg-light border-bottom" id="technical-approach">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">ARCHITECTURE & WORKFLOW</span>
                    <h2 class="h3 fw-bold text-dark mb-3">Technical Approach</h2>
                    <p class="text-secondary mb-4" style="line-height: 1.8;">
                        {{ $service['technical_approach'] }}
                    </p>

                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-3">
                        <h6 class="fw-bold text-dark mb-2">Required Customer Inputs</h6>
                        <p class="text-muted small mb-0">{{ $service['inputs_needed'] }}</p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white border-top border-4 border-primary">
                        <h5 class="fw-bold text-dark mb-3"><i class="fa fa-box-open text-primary me-2"></i>Project Deliverables</h5>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                            @foreach($service['deliverables'] as $deliv)
                                <li class="d-flex align-items-start gap-2 small text-secondary">
                                    <i class="fa fa-arrow-circle-right text-primary mt-1"></i>
                                    <span>{{ $deliv }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Safeguards, Limitations & Scope Boundaries -->
    <section class="py-4 bg-white border-bottom">
        <div class="container">
            <div class="alert alert-secondary border-0 rounded-4 p-4 d-flex align-items-start gap-3 mb-0">
                <i class="fa fa-shield-alt text-primary fs-3 mt-1"></i>
                <div>
                    <h6 class="fw-bold text-dark mb-1">Scope Boundaries & Safety Safeguards</h6>
                    <p class="small text-muted mb-0" style="line-height: 1.6;">
                        {{ $service['limitations'] }} TC Smart Technology adheres to transparent engineering standards: solutions do not bypass machine safety interlocks, and all AI features retain human-in-the-loop governance.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Process: 5 Standard Steps -->
    <section class="py-5 bg-light border-bottom">
        <div class="container py-3">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">EXECUTION LIFECYCLE</span>
                <h3 class="fw-bold text-dark">From Requirement to Deployment</h3>
                <p class="text-muted small">Standardized stages ensuring every milestone is verified against agreed criteria.</p>
            </div>

            <div class="row g-3 text-center">
                <div class="col-md">
                    <div class="p-3 bg-white rounded-3 border h-100">
                        <span class="fw-bold text-primary">Step 01</span>
                        <h6 class="fw-bold text-dark mt-2 mb-1">Requirement Analysis</h6>
                        <p class="extra-small text-muted mb-0">Define functionality, inputs, operational boundaries & success criteria.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 bg-white rounded-3 border h-100">
                        <span class="fw-bold text-primary">Step 02</span>
                        <h6 class="fw-bold text-dark mt-2 mb-1">Solution Architecture</h6>
                        <p class="extra-small text-muted mb-0">Engineer schematic, firmware, protocol mapping or AI workflow design.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 bg-white rounded-3 border h-100">
                        <span class="fw-bold text-primary">Step 03</span>
                        <h6 class="fw-bold text-dark mt-2 mb-1">Design & Development</h6>
                        <p class="extra-small text-muted mb-0">Build approved deliverables in iterative, reviewable milestones.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 bg-white rounded-3 border h-100">
                        <span class="fw-bold text-primary">Step 04</span>
                        <h6 class="fw-bold text-dark mt-2 mb-1">Integration & Testing</h6>
                        <p class="extra-small text-muted mb-0">Verify edge cases, signal fidelity, fault handling & compliance checks.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 bg-white rounded-3 border h-100">
                        <span class="fw-bold text-primary">Step 05</span>
                        <h6 class="fw-bold text-dark mt-2 mb-1">Deployment & Handover</h6>
                        <p class="extra-small text-muted mb-0">Deliver code, documentation, commissioning assistance & post-release support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. Interactive Visible FAQs -->
    @if(!empty($service['faqs']))
        <section class="py-5 bg-white border-bottom">
            <div class="container py-3">
                <div class="text-center mb-5">
                    <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">FREQUENTLY ASKED QUESTIONS</span>
                    <h2 class="h3 fw-bold text-dark">Technical & Integration FAQs</h2>
                    <p class="text-muted small">Answers to common feasibility, architecture, and deployment questions.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="accordion" id="faqAccordion">
                            @foreach($service['faqs'] as $index => $faq)
                                <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-2xs">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button fw-bold text-dark {{ $index == 0 ? '' : 'collapsed' }} bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                            {{ $faq['q'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-white text-secondary small" style="line-height: 1.7;">
                                            {{ $faq['a'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 13. Related Services and Complementary Solutions -->
    <section class="py-5 bg-light border-bottom">
        <div class="container py-3">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">EXPLORE MORE</span>
                    <h3 class="h4 fw-bold text-dark m-0">Related Solutions in {{ $category['short_name'] }}</h3>
                </div>
                <a href="{{ url('/services/' . $category['slug']) }}" class="btn btn-outline-primary btn-sm">
                    View All {{ $category['short_name'] }} <i class="fa fa-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @php
                    $siblings = \App\Services\ServiceCatalog::getServicesByCategory($category['slug']);
                    unset($siblings[$serviceSlug]);
                    $relatedServices = array_slice($siblings, 0, 3, true);
                @endphp
                @foreach($relatedServices as $relSlug => $relService)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fa {{ $relService['icon'] }} text-primary"></i>
                                <h5 class="fw-bold text-dark m-0 small">{{ $relService['name'] }}</h5>
                            </div>
                            <p class="text-muted extra-small mb-3" style="line-height: 1.5;">{{ $relService['short_desc'] }}</p>
                            <a href="{{ url('/services/' . $category['slug'] . '/' . $relSlug) }}" class="text-primary fw-semibold extra-small text-decoration-none mt-auto">
                                Read Solution Specs <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 14. Final Call to Action -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container py-3">
            <h3 class="fw-bold text-white mb-3">Discuss Your {{ $service['name'] }} Requirement</h3>
            <p class="text-light-50 mx-auto mb-4" style="max-width: 650px; color: #cbd5e1;">
                Share your product idea, equipment parameters, or operational workflow with our engineering team. We will help you identify a practical, robust technical architecture.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    Request Consultation <i class="fa fa-calendar-alt ms-2"></i>
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-light px-4 py-2 fw-semibold">
                    Contact Engineering Team
                </a>
            </div>
        </div>
    </section>

    <!-- Schema.org Structured Data (Service, BreadcrumbList, FAQPage) -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['short_desc'],
        'provider' => [
            '@type' => 'Organization',
            'name' => 'TC Smart Technology',
            'url' => 'https://tcsmarttechnology.com/'
        ],
        'url' => url('/services/' . $category['slug'] . '/' . $serviceSlug)
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home.index')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $category['short_name'], 'item' => url('/services/' . $category['slug'])],
            ['@type' => 'ListItem', 'position' => 4, 'name' => $service['name'], 'item' => url('/services/' . $category['slug'] . '/' . $serviceSlug)]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @if(!empty($service['faqs']))
        @php
            $faqEntities = [];
            foreach($service['faqs'] as $faq) {
                $faqEntities[] = [
                    '@type' => 'Question',
                    'name' => $faq['q'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['a']
                    ]
                ];
            }
        @endphp
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqEntities
        ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif
@endsection
