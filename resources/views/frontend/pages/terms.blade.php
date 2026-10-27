@extends('frontend.layouts.main')

@section('meta_title', 'Terms & Conditions of Service & Sale | TC Smart Technology')
@section('meta_description', 'Review the Terms & Conditions governing engineering services, hardware purchases, return and refund policy, age eligibility, tracking consent, data security, and dispute resolution with TC Smart Technology.')
@section('meta_keywords', 'terms and conditions, return policy, refund policy, age factor, data security, TC Smart Technology terms, grievance officer')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Terms & Conditions',
        'breadcrumb' => [
            ['label' => 'Terms & Conditions', 'url' => route('terms.conditions')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 960px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <div class="border-bottom pb-4 mb-4">
                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-2">Legal Agreement</span>
                    <h1 class="h3 fw-bold text-dark mb-2">Terms and Conditions of Service & Sale</h1>
                    <p class="text-muted small mb-0">Effective Date: October 2026 • Version 6.0 • Governed by the Laws of the Republic of India</p>
                </div>

                <div class="text-secondary small d-flex flex-column gap-4" style="line-height: 1.85;">
                    <!-- 1. Preamble & Acceptance -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">1. Acceptance of Terms & Eligibility (Age Factor)</h5>
                        <p class="mb-2">
                            Welcome to <strong>TC Smart Technology</strong> ("Company", "we", "us", or "our"), having its registered operations at D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025, India. These Terms and Conditions ("Terms") constitute a legally binding agreement between you ("User", "Customer", or "Client") and TC Smart Technology regarding your access to our website (<strong>https://tcsmarttechnology.com</strong>), purchase of electronic products, and engagement with our engineering solutions.
                        </p>
                        <p class="mb-0">
                            <strong>Age Factor & Capacity to Contract:</strong> You affirm that you are at least <strong>18 years of age</strong> (or the legal age of majority in your jurisdiction) and possess full legal capacity to enter into binding legal agreements under the <strong>Indian Contract Act, 1872</strong>. If you are under 18 years of age, you may browse this website only under the direct supervision and active consent of a parent or legal guardian. Minors are strictly prohibited from submitting payment transactions or placing purchase orders.
                        </p>
                    </div>

                    <!-- 2. Consent & Privacy Policy Integration -->
                    <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-2xs">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-handshake text-primary me-2"></i>2. User Consent & Privacy Policy Integration</h5>
                        <p class="mb-0">
                            By checking the agreement box on our forms, registering an account, or submitting purchase orders, you provide explicit consent to these Terms and our companion <a href="{{ route('privacy.policy') }}" class="text-primary fw-semibold">Privacy Policy</a>. You acknowledge that our platform employs technical tracking (including IP logging, geographical state detection, and session cookies) as necessary to maintain website security, prevent fraud, and calculate regional delivery charges.
                        </p>
                    </div>

                    <!-- 3. Scope of Offerings -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">3. Scope of Offerings: Services & Hardware Products</h5>
                        <p class="mb-2">TC Smart Technology operates across two distinct commercial segments:</p>
                        <ul class="ps-3 mb-0">
                            <li><strong>Engineering Solutions & Consulting:</strong> Custom Embedded Systems Design (schematics, multilayer PCB, firmware in C/C++/RTOS), Industrial IoT telemetry and OEE dashboards, Industrial Automation (PLC/HMI, LabVIEW & EOL Test Benches), and Custom AI Agents. All client service projects are governed by mutually agreed Statements of Work (SOW) defining milestones, deliverables, and acceptance criteria.</li>
                            <li><strong>Electronic & IoT Hardware Store:</strong> Commercial sale of standard monitoring appliances, industrial IoT controllers, sensor nodes, and smart devices advertised on our catalog.</li>
                        </ul>
                    </div>

                    <!-- 4. User Account & Data Security -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">4. User Account Responsibility & Data Security</h5>
                        <p class="mb-2">
                            When you register an account, you are responsible for maintaining the confidentiality of your login credentials, password, and one-time passwords (OTP). You agree to immediately notify us at <a href="mailto:info@tcsmarttechnology.com" class="text-primary fw-semibold">info@tcsmarttechnology.com</a> upon suspecting any unauthorized access to your account.
                        </p>
                        <p class="mb-0">
                            <strong>Data Security Architecture:</strong> We protect all platform transmissions using industry-standard 256-bit TLS/HTTPS encryption, hash user passwords using salted Bcrypt algorithms, and enforce Role-Based Access Control (RBAC). However, users are responsible for utilizing secure network connections and updating passwords regularly.
                        </p>
                    </div>

                    <!-- 5. Orders, Pricing, Taxes & Payment Verification -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">5. Orders, Pricing, Taxes & Payment Verification</h5>
                        <ul class="ps-3 mb-0">
                            <li><strong>Currency & Taxes:</strong> All hardware product prices are quoted in Indian Rupees (INR) and are subject to statutory Goods and Services Tax (GST) as detailed during checkout.</li>
                            <li><strong>Tax Invoices:</strong> Upon confirmed order delivery, a verified computer-generated GST Tax Invoice is available for download as a PDF within your customer dashboard.</li>
                            <li><strong>Payment Verification:</strong> For orders processed via Bank Transfer or UPI/QR, customers must provide a genuine Transaction Reference ID (UTR) and upload an unedited payment confirmation receipt. The Company reserves the right to hold or cancel orders where payment cannot be matched against our designated bank accounts within 48 hours.</li>
                            <li><strong>Inventory Restrictions:</strong> All hardware orders are subject to stock availability and real-time inventory limits. If an ordered item becomes unavailable due to unexpected supply constraints, the Customer will be offered a full refund or an equivalent replacement.</li>
                        </ul>
                    </div>

                    <!-- 6. Comprehensive Return, Refund & Cancellation Policy -->
                    <div class="p-4 bg-white rounded-3 border-start border-4 border-warning shadow-sm">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-undo-alt text-warning me-2"></i>6. Comprehensive Return, Refund & Cancellation Policy</h5>
                        <p class="mb-3">
                            We take pride in our precision engineering standards. For hardware products purchased directly from our website, our Return & Refund Policy operates as follows:
                        </p>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-2 border h-100">
                                    <strong class="d-block text-dark small mb-1"><i class="fa fa-calendar-check text-success me-1"></i>7-Day Standard Return Window:</strong>
                                    <p class="text-muted extra-small mb-0">Customers may initiate a return request for eligible standard catalog hardware within <strong>7 calendar days</strong> from the official delivery date recorded by our courier partners.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-2 border h-100">
                                    <strong class="d-block text-dark small mb-1"><i class="fa fa-box-open text-primary me-1"></i>Return Condition Requirements:</strong>
                                    <p class="text-muted extra-small mb-0">Products must be unused, in pristine original condition, with factory warranty/tamper seals intact, matching serial numbers, complete original packaging, cables, documentation, and the GST invoice copy.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-2 border h-100">
                                    <strong class="d-block text-dark small mb-1"><i class="fa fa-exclamation-triangle text-danger me-1"></i>Dead on Arrival (DOA) / In-Transit Damage:</strong>
                                    <p class="text-muted extra-small mb-0">Any item delivered physically damaged or non-functional upon first boot must be reported within <strong>48 hours of delivery</strong> with unboxing photographs or video proof. We will coordinate a swift replacement at zero additional shipping cost.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-2 border h-100">
                                    <strong class="d-block text-dark small mb-1"><i class="fa fa-money-bill-wave text-success me-1"></i>Refund Processing Timeline:</strong>
                                    <p class="text-muted extra-small mb-0">Once returned hardware is inspected and approved at our facility, the refund will be credited to the original payment source (bank account / UPI) within <strong>5 to 7 business days</strong>.</p>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-secondary py-2 px-3 small mb-0" style="font-size: 0.8rem;">
                            <strong>Non-Returnable Items:</strong> Custom-engineered prototype hardware, specialized PCB fabrication runs, bespoke firmware source code deliverables, commissioned PLC/HMI automation routines, custom AI agent workflows, and completed engineering labor hours are non-returnable and non-refundable. For full details, review our <a href="{{ route('return.policy') }}" class="text-primary fw-bold">Dedicated Return & Refund Policy</a>.
                        </div>
                    </div>

                    <!-- 7. Machine Safety & Operational Disclaimers -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">7. Industrial Machine & Operational Safety Disclaimer</h5>
                        <p class="mb-2">
                            TC Smart Technology's Industrial IoT gateways, automation software, machine monitoring appliances, and auto-purging controllers are engineered to operate strictly within manufacturer equipment specifications.
                        </p>
                        <p class="mb-0">
                            <strong>Client Responsibility:</strong> Clients and their certified factory personnel remain solely responsible for the physical guarding, emergency stop (E-Stop) circuitry, electrical grounding, high-voltage compliance, and operational machine safety interlocks. Under no circumstances should our software, PLC integration, or IoT monitoring layers be deployed to bypass or override safety-critical machinery protection devices.
                        </p>
                    </div>

                    <!-- 8. Intellectual Property -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">8. Intellectual Property & Deliverables</h5>
                        <p class="mb-2">
                            All website content, user interfaces, branding, graphics, product photography, and documentation are the exclusive intellectual property of TC Smart Technology and protected under Indian and international copyright laws.
                        </p>
                        <p class="mb-0">
                            For custom engineering engagements, transfer of ownership of project deliverables (such as custom PCB layout files, schematic diagrams, and custom application code) occurs only upon full receipt of all contractually agreed milestone payments.
                        </p>
                    </div>

                    <!-- 9. Limitation of Liability -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">9. Limitation of Liability</h5>
                        <p class="mb-0">
                            To the fullest extent permissible under Indian law, TC Smart Technology, its directors, and technical staff shall not be liable for any indirect, incidental, punitive, or consequential damages—including plant production downtime, loss of anticipated profits, or equipment wear—arising from the use or inability to use our products or software telemetry. In any event, the Company's aggregate liability shall not exceed the actual amount paid by the Customer for the specific product or service giving rise to the claim.
                        </p>
                    </div>

                    <!-- 10. Grievance Redressal & Governing Law -->
                    <div class="p-4 bg-white rounded-3 border-start border-4 border-primary shadow-sm">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-balance-scale text-primary me-2"></i>10. Grievance Redressal & Jurisdiction</h5>
                        <p class="mb-2">
                            In accordance with the <strong>Information Technology Act, 2000</strong> and the <strong>Consumer Protection Act, 2019</strong>, any complaints or grievances regarding orders, terms, services, or technical practices must be directed to our appointed Grievance Officer:
                        </p>
                        <div class="row g-2 mb-3">
                            <div class="col-sm-6">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Grievance Officer:</strong>
                                    <span class="text-secondary small">Er. Shahad Munazar</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Designation:</strong>
                                    <span class="text-secondary small">Legal & Grievance Redressal Lead</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Grievance Email:</strong>
                                    <a href="mailto:grievance@tcsmarttechnology.com" class="text-primary fw-semibold small">grievance@tcsmarttechnology.com</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Helpline Phone:</strong>
                                    <a href="tel:+917065122884" class="text-primary fw-semibold small">+91-7065122884</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Corporate Address:</strong>
                                    <span class="text-secondary small">TC Smart Technology, D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025, India</span>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">
                            <strong>Governing Law & Exclusive Jurisdiction:</strong> These Terms shall be construed and governed in accordance with the laws of India. Any legal dispute, arbitration, or proceeding arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the competent courts of <strong>New Delhi, India</strong>.
                        </p>
                    </div>

                    <!-- 11. Amendments -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">11. Amendments to Terms</h5>
                        <p class="mb-0">
                            We reserve the right to revise or amend these Terms at our discretion. Notice of substantial revisions will be posted on this page. Your continued engagement with our platform subsequent to any updates signifies your irrevocable acceptance of the modified Terms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
