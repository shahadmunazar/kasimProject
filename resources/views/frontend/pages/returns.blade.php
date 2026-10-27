@extends('frontend.layouts.main')

@section('meta_title', 'Return, Refund & Cancellation Policy | TC Smart Technology')
@section('meta_description', 'Read TC Smart Technology\'s Return, Refund, and Cancellation Policy. Learn about our 7-day return window, Dead on Arrival (DOA) protocol, refund timelines, and non-refundable custom engineering services.')
@section('meta_keywords', 'return policy, refund policy, cancellation policy, TC Smart Technology return, DOA warranty, electronic hardware returns')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Return & Refund Policy',
        'breadcrumb' => [
            ['label' => 'Return Policy', 'url' => route('return.policy')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 960px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <div class="border-bottom pb-4 mb-4">
                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-2">Customer Assurance</span>
                    <h1 class="h3 fw-bold text-dark mb-2">Return, Refund & Cancellation Policy</h1>
                    <p class="text-muted small mb-0">Effective Date: October 2026 • Version 2.0 • Governed by Consumer Protection (E-Commerce) Rules, 2020</p>
                </div>

                <div class="text-secondary small d-flex flex-column gap-4" style="line-height: 1.85;">
                    <!-- 1. Introduction -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">1. Overview</h5>
                        <p class="mb-0">
                            At <strong>TC Smart Technology</strong>, we are committed to delivering industrial-grade precision and reliability. We recognize that occasionally a standard hardware product may need to be returned or replaced. This Return, Refund & Cancellation Policy outlines the procedures, timelines, and conditions applicable to purchases made on <strong>https://tcsmarttechnology.com</strong>.
                        </p>
                    </div>

                    <!-- 2. Core 7-Day Policy Strip -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-white rounded-3 border h-100 text-center">
                                <div class="btn-square rounded-circle bg-primary-subtle text-primary mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="fa fa-calendar-alt fs-5"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">7-Day Window</h6>
                                <p class="text-muted extra-small mb-0">Eligible standard catalog products can be returned within 7 calendar days of verified courier delivery.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white rounded-3 border h-100 text-center">
                                <div class="btn-square rounded-circle bg-danger-subtle text-danger mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="fa fa-bolt fs-5"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">48-Hr DOA Report</h6>
                                <p class="text-muted extra-small mb-0">Dead on Arrival or transit-damaged items must be reported within 48 hours for immediate replacement.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-white rounded-3 border h-100 text-center">
                                <div class="btn-square rounded-circle bg-success-subtle text-success mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="fa fa-wallet fs-5"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">5–7 Day Refund</h6>
                                <p class="text-muted extra-small mb-0">Approved refunds are credited directly to your original payment mode (bank/UPI) within 5–7 business days.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Return Eligibility Conditions -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">2. Conditions for Return Eligibility</h5>
                        <p class="mb-2">To qualify for a valid return and refund, the returned hardware product must satisfy all of the following requirements:</p>
                        <ul class="ps-3 mb-0">
                            <li>The item must be in completely <strong>unused, original, and resaleable condition</strong>.</li>
                            <li>The product must be enclosed in its original manufacturer retail packaging, complete with all user manuals, warranty cards, power adapters, connecting cables, and accessories.</li>
                            <li>All factory security seals, serial number barcodes, and tamper-evident warranty stickers must be intact and fully legible. Serial numbers must match our dispatch records and original GST Tax Invoice.</li>
                            <li>The product must not show any signs of electrical abuse, high-voltage burning, improper wiring, reverse polarity, firmware modification, or physical trauma.</li>
                        </ul>
                    </div>

                    <!-- 4. Dead on Arrival (DOA) & Transit Damage -->
                    <div class="p-3 bg-white rounded-3 border-start border-4 border-danger shadow-2xs">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-shield-alt text-danger me-2"></i>3. Dead on Arrival (DOA) & In-Transit Damage</h5>
                        <p class="mb-2">
                            If your shipment arrives visibly damaged, tampered with, or if the hardware fails to power on out of the box (Dead on Arrival):
                        </p>
                        <ol class="ps-3 mb-2">
                            <li>You must report the issue within <strong>48 hours of delivery</strong> by sending an email to <a href="mailto:info@tcsmarttechnology.com" class="text-primary fw-semibold">info@tcsmarttechnology.com</a> or calling <a href="tel:+917065122884" class="text-primary fw-semibold">+91-7065122884</a>.</li>
                            <li>Attach clear photographic or video evidence showing the outer courier box, shipping label, damaged package seals, and the hardware device.</li>
                            <li>Once verified by our technical support team, we will immediately arrange reverse pickup or provide a prepaid return courier waybill, and dispatch a brand-new replacement at zero additional expense to you.</li>
                        </ol>
                    </div>

                    <!-- 5. Non-Returnable & Non-Refundable Items -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">4. Non-Returnable & Non-Refundable Products and Services</h5>
                        <p class="mb-2">The following categories of products and professional services are strictly non-returnable and non-refundable:</p>
                        <ul class="ps-3 mb-0">
                            <li><strong>Custom Engineering & R&D Milestones:</strong> Custom embedded hardware prototypes, bespoke multilayer PCB fabrication, customized enclosure 3D printing, and dedicated component procurement runs executed under customer approval.</li>
                            <li><strong>Firmware & Software Code:</strong> Custom firmware development in C/C++/RTOS, custom software source code, and intellectual property deliverables transferred to the client.</li>
                            <li><strong>Deployed Automation Solutions:</strong> On-site or remote PLC/HMI/VFD programming, NI LabVIEW/TestStand test bench integration, robotic cell commissioning, and consulting hours already rendered.</li>
                            <li><strong>Custom AI Agents:</strong> Deployed and trained proprietary AI agents or workflow automation instances configured for client databases.</li>
                            <li><strong>Clearance or Consumable Items:</strong> Soldering consumables, bare PCB boards, wire harnesses, or items explicitly sold as "Non-Returnable" or "Final Sale".</li>
                        </ul>
                    </div>

                    <!-- 6. Step-by-Step Return Process -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">5. Step-by-Step Return Procedure</h5>
                        <div class="d-flex flex-column gap-3 mt-3">
                            <div class="d-flex gap-3 align-items-start">
                                <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; flex-shrink: 0;">1</span>
                                <div>
                                    <strong class="text-dark d-block">Step 1: Initiate Return Request</strong>
                                    <p class="text-muted extra-small mb-0">Email <a href="mailto:info@tcsmarttechnology.com" class="text-primary">info@tcsmarttechnology.com</a> within 7 days of delivery with your Order ID, product serial number, and a brief explanation of the reason for return.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-start">
                                <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; flex-shrink: 0;">2</span>
                                <div>
                                    <strong class="text-dark d-block">Step 2: Return Authorization (RMA)</strong>
                                    <p class="text-muted extra-small mb-0">Our support desk will verify eligibility and issue a unique Return Merchandise Authorization (RMA) number along with reverse shipping instructions.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-start">
                                <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; flex-shrink: 0;">3</span>
                                <div>
                                    <strong class="text-dark d-block">Step 3: Secure Repackaging & Dispatch</strong>
                                    <p class="text-muted extra-small mb-0">Securely pack the product in its original box with all accessories. Hand over the package to our designated courier partner or dispatch via a reputable insured courier service to our New Delhi center.</p>
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-start">
                                <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; flex-shrink: 0;">4</span>
                                <div>
                                    <strong class="text-dark d-block">Step 4: Quality Inspection & Refund Credit</strong>
                                    <p class="text-muted extra-small mb-0">Our hardware engineers will inspect the item within 48 hours of physical arrival. Upon approval, your refund will be initiated to your bank account or original payment mode within 5 to 7 business days.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 7. Order Cancellation Policy -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">6. Order Cancellation Policy</h5>
                        <ul class="ps-3 mb-0">
                            <li><strong>Cancellation Before Dispatch:</strong> You may cancel a standard hardware product order free of charge at any time before the status transitions to "Dispatched" in your dashboard. Any prepaid amount will be refunded 100% within 3–5 business days.</li>
                            <li><strong>Cancellation After Dispatch:</strong> Once an order has been picked up by the courier partner, it cannot be intercepted in transit. The Customer must receive the shipment and then initiate a standard 7-day return request. Applicable two-way courier shipping costs may be deducted from the final refund.</li>
                        </ul>
                    </div>

                    <!-- 8. Contact & Assistance -->
                    <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-2xs">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-headset text-primary me-2"></i>7. Need Assistance with a Return?</h5>
                        <p class="mb-2">For any questions regarding product returns, warranty replacements, or refund statuses, our customer support and legal team are ready to assist you:</p>
                        <p class="mb-0 text-muted" style="font-size: 0.82rem;">
                            <strong>Email:</strong> <a href="mailto:info@tcsmarttechnology.com" class="text-primary fw-semibold">info@tcsmarttechnology.com</a> • 
                            <strong>Grievance Desk:</strong> <a href="mailto:grievance@tcsmarttechnology.com" class="text-primary fw-semibold">grievance@tcsmarttechnology.com</a> • 
                            <strong>Phone:</strong> <a href="tel:+917065122884" class="text-primary fw-semibold">+91-7065122884</a><br>
                            <strong>Return Processing Center:</strong> TC Smart Technology, D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025, India.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
