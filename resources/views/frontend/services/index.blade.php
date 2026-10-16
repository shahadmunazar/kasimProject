@extends('frontend.layouts.main')

@section('meta_title', 'Engineering & Technology Services | TC Smart Technology')
@section('meta_description', 'Explore our four core engineering domains: Embedded Design & Development, Industrial IoT Solutions, Industrial Automation, and Custom AI Agents.')
@section('meta_keywords', 'embedded systems, industrial IoT, industrial automation, custom AI agents, TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Our Services',
        'breadcrumb' => [
            ['label' => 'Services', 'url' => route('services.index')]
        ]
    ])

    <!-- Services Overview Hero -->
    <section class="py-5 bg-white border-bottom">
        <div class="container text-center py-2">
            <span class="badge bg-primary-subtle text-primary px-3 py-1 rounded-pill fw-bold text-uppercase mb-3" style="letter-spacing: 0.08em;">
                ENGINEERING SMARTER PRODUCTS, PROCESSES & BUSINESSES
            </span>
            <h1 class="display-5 fw-bold text-dark mb-3">Core Engineering & Technology Capabilities</h1>
            <p class="lead text-secondary mx-auto mb-4" style="max-width: 800px; line-height: 1.8;">
                TC Smart Technology helps businesses design embedded electronic products, connect industrial machinery through practical IoT solutions, automate production workflows, and deploy governed custom AI agents.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    Discuss Your Project <i class="fa fa-arrow-right ms-2"></i>
                </a>
                <a href="#categories" class="btn btn-outline-secondary px-4 py-2 fw-semibold">
                    Explore 4 Primary Domains <i class="fa fa-chevron-down ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 4 Primary Service Categories -->
    <section class="py-5 bg-light" id="categories">
        <div class="container py-3">
            <div class="row g-4">
                @php
                    $categories = \App\Services\ServiceCatalog::getCategories();
                @endphp
                @foreach($categories as $catSlug => $cat)
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white transition hover-translate-y d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="btn-square rounded-3 bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                        <i class="fa {{ $cat['icon'] }} fs-4"></i>
                                    </div>
                                    <span class="badge bg-light text-dark border px-3 py-1 rounded-pill small fw-semibold">
                                        {{ $cat['badge'] }}
                                    </span>
                                </div>

                                <h2 class="h4 fw-bold text-dark mb-2">
                                    <a href="{{ url('/services/' . $catSlug) }}" class="text-decoration-none text-dark hover-primary">
                                        {{ $cat['name'] }}
                                    </a>
                                </h2>

                                <p class="text-secondary small mb-3" style="line-height: 1.7;">
                                    {{ $cat['overview'] }}
                                </p>

                                <div class="p-3 bg-light rounded-3 border-start border-3 border-primary mb-4">
                                    <span class="extra-small fw-bold text-muted text-uppercase d-block mb-1" style="font-size: 0.7rem;">Domain Scope</span>
                                    <p class="m-0 text-dark extra-small fst-italic" style="font-size: 0.8rem;">{{ $cat['ai_hook'] }}</p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="extra-small fw-bold text-uppercase text-muted mb-2" style="font-size: 0.72rem; letter-spacing: 0.05em;">Sub-Category Groups:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($cat['subcategories'] as $sub)
                                            <span class="badge bg-secondary-subtle text-secondary small py-1 px-2">{{ $sub['name'] }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                <a href="{{ url('/services/' . $catSlug) }}" class="btn btn-primary btn-sm px-3 py-2 fw-semibold">
                                    Explore {{ $cat['short_name'] }} <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                                <a href="{{ route('appointment.index') }}" class="btn btn-outline-secondary btn-sm px-3 py-2">
                                    Consult Architect
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Priority Portfolio Spotlight Strip -->
    <section class="py-5 bg-white border-top border-bottom">
        <div class="container py-2">
            <div class="text-center mb-5">
                <span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-2">Primary Core Focus</span>
                <h3 class="fw-bold text-dark">Featured Priority Solutions</h3>
                <p class="text-muted small">Embedded product development and industrial IoT / smart manufacturing solutions.</p>
            </div>

            <div class="row g-4">
                @php
                    $priorities = array_slice(\App\Services\ServiceCatalog::getPriorityServices(), 0, 6, true);
                @endphp
                @foreach($priorities as $pSlug => $pService)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-light d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="fa {{ $pService['icon'] }} text-primary"></i>
                                    <h5 class="fw-bold text-dark m-0 small">{{ $pService['name'] }}</h5>
                                </div>
                                <p class="text-muted extra-small mb-3" style="line-height: 1.6;">{{ $pService['short_desc'] }}</p>
                            </div>
                            <a href="{{ url('/services/' . $pService['category_slug'] . '/' . $pSlug) }}" class="text-primary fw-semibold extra-small text-decoration-none">
                                View Full Solution <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Final Call to Action -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container py-3">
            <h3 class="fw-bold text-white mb-3">Have an Embedded, Automation, IoT or AI Project?</h3>
            <p class="text-light-50 mx-auto mb-4" style="max-width: 650px; color: #cbd5e1;">
                Share your product idea, industrial requirement, monitoring challenge or business workflow with our team. We will help you identify a practical technical approach based on your objectives.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                    Request a Consultation <i class="fa fa-calendar-alt ms-2"></i>
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-light px-4 py-2 fw-semibold">
                    Contact Our Team
                </a>
            </div>
        </div>
    </section>

    <!-- CollectionPage Schema -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => 'Engineering & Technology Services | TC Smart Technology',
        'description' => 'Explore our four core engineering domains: Embedded Design & Development, Industrial IoT Solutions, Industrial Automation, and Custom AI Agents.',
        'url' => route('services.index'),
        'provider' => [
            '@type' => 'Organization',
            'name' => 'TC Smart Technology',
            'url' => 'https://tcsmarttechnology.com/'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection
