@extends('frontend.layouts.main')

@section('meta_title', 'HTML Sitemap & Complete Website Architecture | TC Smart Technology')
@section('meta_description', 'Navigate the complete directory of TC Smart Technology: Embedded Systems, Industrial IoT solutions, Industrial Automation, Custom AI Agents, and products.')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HTML Sitemap',
        'breadcrumb' => [
            ['label' => 'Sitemap', 'url' => route('sitemap.index')]
        ]
    ])

    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div>
                    <h3 class="fw-bold text-dark mb-1">Website Structure & Directory</h3>
                    <p class="text-muted small mb-0">Browse all major services, product catalogs, engineering blogs, and company pages.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                        <i class="fa fa-file-code me-2"></i>View XML Sitemap (<span class="small">sitemap.xml</span>)
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Col 1: Main Pages & Products -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            <i class="fa fa-compass text-primary me-2"></i>Main Navigation & Utility
                        </h5>
                        <ul class="list-unstyled d-flex flex-column gap-2 small">
                            <li><a href="{{ route('home.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-home text-muted me-2"></i>Home</a></li>
                            <li><a href="{{ route('about_us.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-users text-muted me-2"></i>About Us</a></li>
                            <li><a href="{{ route('services.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-cogs text-muted me-2"></i>All Services Landing</a></li>
                            <li><a href="{{ route('products.listing') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-box text-muted me-2"></i>Product Catalogue</a></li>
                            <li><a href="{{ url('/product/industrial-iot-monitoring-product') }}" class="text-decoration-none text-primary fw-semibold"><i class="fa fa-box-open text-primary me-2"></i>Industrial IoT Monitoring Product</a></li>
                            <li><a href="{{ route('case_studies.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-clipboard-check text-muted me-2"></i>Case Studies</a></li>
                            <li><a href="{{ route('blogs.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-rss text-muted me-2"></i>Engineering Blogs</a></li>
                            <li><a href="{{ route('contact.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-envelope text-muted me-2"></i>Contact Us</a></li>
                            <li><a href="{{ route('appointment.index') }}" class="text-decoration-none text-secondary hover-primary"><i class="fa fa-calendar-check text-muted me-2"></i>Request Consultation</a></li>
                            <li class="pt-2 border-top text-muted extra-small">Legal & Compliance</li>
                            <li><a href="{{ route('privacy.policy') }}" class="text-decoration-none text-muted hover-primary extra-small">Privacy Policy</a></li>
                            <li><a href="{{ route('terms.conditions') }}" class="text-decoration-none text-muted hover-primary extra-small">Terms & Conditions</a></li>
                            <li><a href="{{ route('accessibility.statement') }}" class="text-decoration-none text-muted hover-primary extra-small">Accessibility Statement</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Col 2: Embedded Systems & Industrial Automation -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <!-- Embedded Category -->
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="fa fa-microchip text-primary me-2"></i>Embedded Design & Development
                            </h5>
                            <a href="{{ url('/services/embedded-design-development') }}" class="fw-bold text-primary small d-block mb-2">Category Overview Page &rarr;</a>
                            <ul class="list-unstyled d-flex flex-column gap-1 small mb-4">
                                @php
                                    $embeddedServices = \App\Services\ServiceCatalog::getServicesByCategory('embedded-design-development');
                                @endphp
                                @foreach($embeddedServices as $eSlug => $eServ)
                                    <li>
                                        <a href="{{ url('/services/embedded-design-development/' . $eSlug) }}" class="text-decoration-none text-secondary hover-primary extra-small">
                                            &bull; {{ $eServ['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Industrial Automation Category -->
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="fa fa-robot text-warning me-2"></i>Industrial Automation
                            </h5>
                            <a href="{{ url('/services/industrial-automation') }}" class="fw-bold text-warning small d-block mb-2">Category Overview Page &rarr;</a>
                            <ul class="list-unstyled d-flex flex-column gap-1 small mb-0">
                                @php
                                    $autoServices = \App\Services\ServiceCatalog::getServicesByCategory('industrial-automation');
                                @endphp
                                @foreach($autoServices as $aSlug => $aServ)
                                    <li>
                                        <a href="{{ url('/services/industrial-automation/' . $aSlug) }}" class="text-decoration-none text-secondary hover-primary extra-small">
                                            &bull; {{ $aServ['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Industrial IoT & Custom AI Agents -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <!-- Industrial IoT Category -->
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="fa fa-network-wired text-info me-2"></i>Industrial IoT Solutions
                            </h5>
                            <a href="{{ url('/services/industrial-iot-solutions') }}" class="fw-bold text-info small d-block mb-2">Category Overview Page &rarr;</a>
                            <ul class="list-unstyled d-flex flex-column gap-1 small mb-4">
                                @php
                                    $iiotServices = \App\Services\ServiceCatalog::getServicesByCategory('industrial-iot-solutions');
                                @endphp
                                @foreach($iiotServices as $iSlug => $iServ)
                                    <li>
                                        <a href="{{ url('/services/industrial-iot-solutions/' . $iSlug) }}" class="text-decoration-none text-secondary hover-primary extra-small">
                                            &bull; {{ $iServ['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Custom AI Category -->
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                <i class="fa fa-brain text-success me-2"></i>Custom AI Agents (11 Workflows)
                            </h5>
                            <a href="{{ url('/services/ai-solutions-custom-ai-agents') }}" class="fw-bold text-success small d-block mb-2">Category Overview Page &rarr;</a>
                            <ul class="list-unstyled d-flex flex-column gap-1 small mb-0">
                                @php
                                    $aiServices = \App\Services\ServiceCatalog::getServicesByCategory('ai-solutions-custom-ai-agents');
                                @endphp
                                @foreach($aiServices as $aiSlug => $aiServ)
                                    <li>
                                        <a href="{{ url('/services/ai-solutions-custom-ai-agents/' . $aiSlug) }}" class="text-decoration-none text-secondary hover-primary extra-small">
                                            &bull; {{ $aiServ['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
