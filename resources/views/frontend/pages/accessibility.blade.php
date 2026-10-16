@extends('frontend.layouts.main')

@section('meta_title', 'Accessibility Statement | TC Smart Technology')
@section('meta_description', 'Read TC Smart Technology\'s commitment to digital accessibility, inclusive design standards, keyboard navigation, and semantic web principles.')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Accessibility Statement',
        'breadcrumb' => [
            ['label' => 'Accessibility Statement', 'url' => route('accessibility.statement')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 900px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <h1 class="h3 fw-bold text-dark mb-3">Commitment to Digital Accessibility</h1>
                <p class="text-muted small mb-4">Published: October 2026 • WCAG 2.1 AA Compliance Effort</p>

                <div class="text-secondary small d-flex flex-column gap-3" style="line-height: 1.8;">
                    <p>TC Smart Technology is committed to ensuring digital accessibility for people of all abilities. We continuously improve the user experience for everyone and apply relevant accessibility standards to our website and web dashboard interfaces.</p>

                    <h5 class="fw-bold text-dark mt-2">Key Accessibility Measures</h5>
                    <ul class="mb-3">
                        <li><strong>Keyboard Navigation:</strong> All interactive elements, including mega-menus, service cards, accordions, and consultation forms, can be navigated using keyboard controls with visible focus indicators.</li>
                        <li><strong>Semantic Hierarchy:</strong> We employ logical heading nesting (one H1 per page, followed by H2 and H3 elements) and semantic HTML5 landmarks for screen-reader compatibility.</li>
                        <li><strong>Color Contrast:</strong> Text, badges, and interactive controls maintain sufficient contrast ratios against background elements to support users with low vision.</li>
                        <li><strong>Touch Targets & Mobile Usability:</strong> Minimum touch target sizes of 44x44 pixels are provided across mobile viewports, with responsive layout scaling that avoids horizontal scrolling.</li>
                        <li><strong>Alternative Text:</strong> Informative diagrams and technical imagery include descriptive alternative text attributes.</li>
                    </ul>

                    <h5 class="fw-bold text-dark mt-2">Feedback and Assistance</h5>
                    <p>If you encounter any difficulty accessing content or have suggestions to improve our website’s accessibility, please reach out to our team at <a href="mailto:info@tcsmarttechnology.com" class="text-primary fw-semibold">info@tcsmarttechnology.com</a>. We welcome your feedback and are dedicated to providing accessible solutions.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
