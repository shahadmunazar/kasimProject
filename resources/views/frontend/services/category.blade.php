@extends('frontend.layouts.main')

@section('meta_title', $category['meta_title'] ?? $category['name'] . ' | TC Smart Technology')
@section('meta_description', $category['meta_description'] ?? $category['overview'])
@section('meta_keywords', $category['target_keyword'])

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => $category['short_name'],
        'breadcrumb' => [
            ['label' => 'Services', 'url' => route('services.index')],
            ['label' => $category['short_name'], 'url' => url('/services/' . $category['slug'])]
        ]
    ])

    <!-- Category Hero & Overview Section -->
    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-primary-subtle text-primary mb-3">
                        <i class="fa {{ $category['icon'] }}"></i>
                        <span class="fw-bold small text-uppercase" style="letter-spacing: 0.06em;">{{ $category['badge'] }}</span>
                    </div>
                    <h1 class="display-6 fw-bold text-dark mb-3">{{ $category['name'] }}</h1>
                    <p class="lead text-secondary mb-4" style="line-height: 1.8;">{{ $category['overview'] }}</p>

                    <div class="p-3 rounded-3 bg-light border-start border-4 border-primary mb-4">
                        <span class="text-uppercase fw-bold text-muted extra-small d-block mb-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">ENGINEERING SCOPE & AI SEARCH HOOK</span>
                        <p class="m-0 text-dark small fst-italic">{{ $category['ai_hook'] }}</p>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                            {{ $category['cta'] }} <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#subcategories" class="btn btn-outline-secondary px-4 py-2 fw-semibold">
                            Explore Service Groups <i class="fa fa-chevron-down ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-light p-4">
                        <h6 class="fw-bold text-dark text-uppercase mb-3" style="letter-spacing: 0.05em; font-size: 0.85rem;">
                            <i class="fa fa-layer-group text-primary me-2"></i>Portfolio Navigation
                        </h6>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                            @foreach($category['subcategories'] as $subKey => $sub)
                                <li>
                                    <a href="#sub-{{ $subKey }}" class="text-decoration-none d-flex align-items-center justify-content-between p-2 rounded-2 bg-white text-dark small border hover-shadow transition">
                                        <span class="fw-semibold">{{ $sub['name'] }}</span>
                                        <span class="badge bg-secondary-subtle text-secondary rounded-pill">{{ count($sub['services']) }}</span>
                                    </a>
                                </li>
                            @endforeach
                            @if($category['slug'] === 'industrial-iot-solutions')
                                <li>
                                    <a href="{{ url('/product/industrial-iot-monitoring-product') }}" class="text-decoration-none d-flex align-items-center justify-content-between p-2 rounded-2 bg-primary-subtle text-primary small border border-primary-subtle">
                                        <span class="fw-bold"><i class="fa fa-box me-1"></i> Featured Monitoring Product</span>
                                        <span class="badge bg-primary rounded-pill">5 Configs</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subcategories & Service Cards Directory -->
    <section class="py-5 bg-light" id="subcategories">
        <div class="container py-3">
            @if($category['slug'] === 'industrial-iot-solutions')
                <!-- Highlighted Monitoring Product Callout for Industrial IoT Category -->
                <div class="card border-primary border-2 shadow-sm rounded-4 mb-5 overflow-hidden">
                    <div class="card-body p-4 p-lg-5 bg-white">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-8">
                                <span class="badge bg-primary text-uppercase px-2 py-1 mb-2">Featured Hardware Product</span>
                                <h3 class="fw-bold text-dark mb-2">Industrial IoT Monitoring Product</h3>
                                <p class="text-secondary mb-3">
                                    TC Smart Technology offers one Industrial IoT monitoring product for collecting, transmitting, storing, visualizing and reporting approved environmental and facility data. Available in five approved configurations.
                                </p>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-light text-dark border"><i class="fa fa-thermometer-half text-danger me-1"></i> Temp</span>
                                    <span class="badge bg-light text-dark border"><i class="fa fa-tint text-info me-1"></i> Humidity</span>
                                    <span class="badge bg-light text-dark border"><i class="fa fa-smog text-secondary me-1"></i> AQI</span>
                                    <span class="badge bg-light text-dark border"><i class="fa fa-door-open text-warning me-1"></i> Door Status</span>
                                    <span class="badge bg-light text-dark border"><i class="fa fa-plug text-success me-1"></i> Power Status</span>
                                </div>
                                <a href="{{ url('/product/industrial-iot-monitoring-product') }}" class="btn btn-primary fw-semibold">
                                    View Monitoring Product Details <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="p-3 bg-light rounded-3 border">
                                    <div class="small fw-bold text-uppercase text-muted mb-2">Approved Site Deployments</div>
                                    <p class="small text-muted mb-0">Cold chain warehouses, pharma storage, manufacturing clean rooms, IT server rooms & controlled indoor facilities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @foreach($category['subcategories'] as $subKey => $sub)
                <div class="mb-5" id="sub-{{ $subKey }}">
                    <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom">
                        <div>
                            <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em; font-size: 0.75rem;">SUB-CATEGORY GROUP</span>
                            <h2 class="h3 fw-bold text-dark m-0">{{ $sub['name'] }}</h2>
                        </div>
                        <span class="badge bg-white text-muted border px-3 py-2 small fw-semibold">
                            {{ count($sub['services']) }} Solutions
                        </span>
                    </div>

                    <div class="row g-4">
                        @foreach($sub['services'] as $serviceSlug)
                            @php
                                $service = \App\Services\ServiceCatalog::getService($serviceSlug);
                            @endphp
                            @if($service)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white transition hover-translate-y d-flex flex-column justify-content-between">
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div class="btn-square rounded-3 bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                    <i class="fa {{ $service['icon'] }} fs-5"></i>
                                                </div>
                                                @if(!empty($service['is_priority']))
                                                    <span class="badge bg-danger-subtle text-danger extra-small fw-semibold py-1 px-2 rounded-pill">Priority Service</span>
                                                @endif
                                            </div>
                                            <h4 class="h5 fw-bold text-dark mb-2">
                                                <a href="{{ url('/services/' . $category['slug'] . '/' . $serviceSlug) }}" class="text-decoration-none text-dark hover-primary">
                                                    {{ $service['name'] }}
                                                </a>
                                            </h4>
                                            <p class="text-muted small mb-4" style="line-height: 1.6;">
                                                {{ $service['short_desc'] }}
                                            </p>
                                        </div>

                                        <div class="pt-3 border-top mt-auto d-flex align-items-center justify-content-between">
                                            <a href="{{ url('/services/' . $category['slug'] . '/' . $serviceSlug) }}" class="text-primary fw-semibold small text-decoration-none">
                                                Explore Service <i class="fa fa-arrow-right ms-1"></i>
                                            </a>
                                            <a href="{{ route('appointment.index') }}" class="btn btn-outline-secondary btn-sm py-1 px-2" style="font-size: 0.75rem;">
                                                Inquire
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Engineering Delivery Process Strip -->
    <section class="py-5 bg-white border-top">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold text-primary extra-small" style="letter-spacing: 0.08em;">METHODOLOGY</span>
                <h3 class="fw-bold text-dark">From Requirement to Deployment</h3>
                <p class="text-muted small">Our structured delivery lifecycle ensures reliable, maintainable systems.</p>
            </div>

            <div class="row g-4 text-center">
                <div class="col-md">
                    <div class="p-3 rounded bg-light h-100">
                        <div class="fw-bold text-primary mb-1">01</div>
                        <h6 class="fw-bold text-dark mb-1">Requirement Analysis</h6>
                        <p class="extra-small text-muted mb-0" style="font-size: 0.78rem;">Analyze the operational challenge, specifications & environment.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 rounded bg-light h-100">
                        <div class="fw-bold text-primary mb-1">02</div>
                        <h6 class="fw-bold text-dark mb-1">Solution Architecture</h6>
                        <p class="extra-small text-muted mb-0" style="font-size: 0.78rem;">Plan necessary hardware, firmware, protocols & cloud stacks.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 rounded bg-light h-100">
                        <div class="fw-bold text-primary mb-1">03</div>
                        <h6 class="fw-bold text-dark mb-1">Design & Development</h6>
                        <p class="extra-small text-muted mb-0" style="font-size: 0.78rem;">Execute schematics, code, automation & dashboard builds.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 rounded bg-light h-100">
                        <div class="fw-bold text-primary mb-1">04</div>
                        <h6 class="fw-bold text-dark mb-1">Integration & Testing</h6>
                        <p class="extra-small text-muted mb-0" style="font-size: 0.78rem;">Validate physical interfaces, boundary conditions & data fidelity.</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-3 rounded bg-light h-100">
                        <div class="fw-bold text-primary mb-1">05</div>
                        <h6 class="fw-bold text-dark mb-1">Deployment & Support</h6>
                        <p class="extra-small text-muted mb-0" style="font-size: 0.78rem;">Commission on-site with documentation, manuals & maintenance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Category Call To Action -->
    <section class="py-5 bg-dark text-white text-center">
        <div class="container py-3">
            <h3 class="fw-bold text-white mb-3">Discuss Your {{ $category['short_name'] }} Requirement</h3>
            <p class="text-light-50 mx-auto mb-4" style="max-width: 650px; color: #cbd5e1;">
                Share your engineering challenge, equipment specifications or monitoring requirement with our team for a practical architectural consultation.
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

    <!-- Structured Data (CollectionPage, ItemList, BreadcrumbList) -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => $category['name'],
        'description' => $category['meta_description'],
        'url' => url('/services/' . $category['slug']),
        'provider' => [
            '@type' => 'Organization',
            'name' => 'TC Smart Technology',
            'url' => 'https://tcsmarttechnology.com/'
        ],
        'breadcrumb' => [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home.index')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $category['short_name'], 'item' => url('/services/' . $category['slug'])]
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection
