@extends('frontend.layouts.main')

@section('meta_title', 'Privacy & Data Protection Policy | TC Smart Technology')
@section('meta_description', 'Review TC Smart Technology\'s Privacy Policy covering user consent, tracking practices, cookie usage, data security, age restrictions, and statutory Grievance Officer details under Indian IT and DPDP laws.')
@section('meta_keywords', 'privacy policy, TC Smart Technology privacy, data protection, cookies policy, grievance officer, DPDP Act 2023, data security')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Privacy & Data Protection Policy',
        'breadcrumb' => [
            ['label' => 'Privacy Policy', 'url' => route('privacy.policy')]
        ]
    ])

    <section class="py-5 bg-white">
        <div class="container py-3" style="max-width: 960px;">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-light">
                <div class="border-bottom pb-4 mb-4">
                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill small fw-semibold text-uppercase mb-2">Legal & Compliance</span>
                    <h1 class="h3 fw-bold text-dark mb-2">Privacy & Data Governance Policy</h1>
                    <p class="text-muted small mb-0">Effective Date: October 2026 • Version 6.0 • Governed by Indian IT Act 2000 & Digital Personal Data Protection Act 2023</p>
                </div>

                <div class="text-secondary small d-flex flex-column gap-4" style="line-height: 1.85;">
                    <!-- 1. Introduction -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">1. Introduction & Company Overview</h5>
                        <p class="mb-0">
                            <strong>TC Smart Technology</strong> ("we", "us", "our", or "the Company") is an Indian engineering enterprise located at D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025. We specialize in Embedded Systems Design & Development, Industrial IoT Telemetry, Industrial Automation (PLC/HMI, LabVIEW & EOL Test Benches), Custom AI Agents, and smart electronic hardware products. This Privacy Policy discloses our privacy practices and describes how we collect, store, track, process, protect, and dispose of your personal and technical data when you access <strong>https://tcsmarttechnology.com</strong>, purchase hardware, or engage our engineering services.
                        </p>
                    </div>

                    <!-- 2. User Consent -->
                    <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-2xs">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-user-check text-primary me-2"></i>2. User Consent & Revocation</h5>
                        <p class="mb-2">
                            By accessing this website, creating a customer account, checking the "I agree to the Terms & Conditions and Privacy Policy" checkbox on our checkout, registration, contact, or inquiry forms, you provide <strong>express, informed, and unambiguous consent</strong> to the collection, tracking, and processing of your information as outlined herein.
                        </p>
                        <p class="mb-0">
                            <strong>Right to Withdraw Consent:</strong> You have the absolute right to revoke your consent at any time. To withdraw consent or request complete erasure of your profile and data, you may email our Grievance Officer at <a href="mailto:tcsmarttechnology@gmail.com" class="text-primary fw-semibold">tcsmarttechnology@gmail.com</a>. Upon receiving your verified request, we will stop processing your data within statutory timelines, except where retention is mandated by law (e.g., GST invoice retention).
                        </p>
                    </div>

                    <!-- 3. What We Track & Collect -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">3. What We Track and Collect on Our Website</h5>
                        <p class="mb-3">To maintain website security, prevent fraudulent transactions, compute regional courier charges, and provide engineering solutions, our platform automatically tracks and collects specific categories of data:</p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded-3 border h-100">
                                    <h6 class="fw-bold text-dark mb-2"><i class="fa fa-network-wired text-primary me-2"></i>A. Automatically Tracked Information</h6>
                                    <ul class="ps-3 mb-0 text-muted" style="font-size: 0.82rem;">
                                        <li><strong>IP Address & Geolocation:</strong> Your device IP address, country, and state are recorded to detect fraudulent checkout attempts and calculate regional pincode courier delivery fees.</li>
                                        <li><strong>Browser & System Data:</strong> User-agent header, browser type, device type (Mobile/Desktop), and operating system version.</li>
                                        <li><strong>Browsing & Activity Logs:</strong> URLs visited, referral sources, session duration, and recently viewed products (temporarily stored in session).</li>
                                        <li><strong>Reviewer Session ID:</strong> Encrypted browser session tokens associated with verified customer product reviews.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded-3 border h-100">
                                    <h6 class="fw-bold text-dark mb-2"><i class="fa fa-address-card text-primary me-2"></i>B. Voluntarily Submitted Information</h6>
                                    <ul class="ps-3 mb-0 text-muted" style="font-size: 0.82rem;">
                                        <li><strong>Customer Profile:</strong> Full name, verified mobile phone number, email address, and encrypted passwords.</li>
                                        <li><strong>Shipping Addresses:</strong> Consignee name, street address, landmarks, city, state, postal PIN code, and alternate contact numbers.</li>
                                        <li><strong>Orders & Payment Verification:</strong> Purchased items, quantities, transaction reference numbers (UTR), payment screenshot uploads, and delivery statuses.</li>
                                        <li><strong>Project Inquiries:</strong> Technical specifications for embedded engineering, PLC/HMI automation requirements, or custom AI agent parameters.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Cookies & Web Tracking Policy -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">4. Cookies and Web Tracking Policy</h5>
                        <p class="mb-2">Cookies are small alphanumeric files placed on your browser or device storage. Our website uses strictly necessary and functional cookies to ensure secure operation and smooth commerce workflows:</p>

                        <div class="table-responsive my-2">
                            <table class="table table-bordered table-sm bg-white mb-0" style="font-size: 0.82rem;">
                                <thead class="table-light">
                                    <tr>
                                        <th>Cookie Name</th>
                                        <th>Category</th>
                                        <th>Purpose</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>laravel_session</code></td>
                                        <td><span class="badge bg-primary-subtle text-primary">Essential</span></td>
                                        <td>Stores encrypted session data including active login authentication, shopping cart items, and recently viewed products.</td>
                                        <td>Session (2 hours inactivity)</td>
                                    </tr>
                                    <tr>
                                        <td><code>XSRF-TOKEN</code></td>
                                        <td><span class="badge bg-success-subtle text-success">Security</span></td>
                                        <td>Protects forms and API endpoints from Cross-Site Request Forgery (CSRF) exploits.</td>
                                        <td>Session (2 hours)</td>
                                    </tr>
                                    <tr>
                                        <td><code>remember_web_*</code></td>
                                        <td><span class="badge bg-secondary-subtle text-secondary">Functional</span></td>
                                        <td>Optional persistent authentication token created only if you select "Remember Me" during login.</td>
                                        <td>5 years (or until logout)</td>
                                    </tr>
                                    <tr>
                                        <td><code>google593c6f0cacafc57c</code></td>
                                        <td><span class="badge bg-info-subtle text-info">Verification</span></td>
                                        <td>Google Search Console indexing and webmaster domain ownership validation.</td>
                                        <td>Permanent server asset</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="mt-2 mb-0">
                            <strong>Managing Cookies:</strong> You can configure your browser (Google Chrome, Mozilla Firefox, Safari, Microsoft Edge) to reject or delete cookies. Please note that disabling essential cookies will prevent authentication, cart retention, and checkout from functioning properly.
                        </p>
                    </div>

                    <!-- 5. Age Factor / Children's Privacy -->
                    <div class="p-3 bg-white rounded-3 border-start border-4 border-warning shadow-2xs">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-child text-warning me-2"></i>5. Age Restriction & Protection of Minors (Age Factor)</h5>
                        <p class="mb-2">
                            Our website, engineering consultation services, and hardware store are intended exclusively for individuals who are at least <strong>18 years of age</strong> (or the legal age of majority in their jurisdiction) and capable of entering into legally binding contracts under the <strong>Indian Contract Act, 1872</strong>.
                        </p>
                        <p class="mb-0">
                            In strict compliance with the <strong>Digital Personal Data Protection (DPDP) Act 2023</strong>, we do not knowingly track, collect, or solicit personal information from children under 18 years of age. If a parent or legal guardian discovers that their minor child has registered an account or provided personal details without verified parental consent, please alert our Grievance Officer immediately. We will promptly delete such accounts and associated data.
                        </p>
                    </div>

                    <!-- 6. Data Security -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">6. Data Security & Technical Safeguards</h5>
                        <p class="mb-2">We treat the security of your information with paramount importance. We implement multi-layered industry-standard technical, administrative, and physical controls, including:</p>
                        <ul class="ps-3 mb-2">
                            <li><strong>Encryption in Transit:</strong> 256-bit TLS/HTTPS cryptographic protocol enforced across all website connections and endpoints.</li>
                            <li><strong>Password Hashing:</strong> All customer passwords are encrypted using one-way cryptographic Bcrypt hashing with random salt factors; plain text passwords are never stored or accessible by staff.</li>
                            <li><strong>Access Governance:</strong> Role-Based Access Control (RBAC) isolates backend customer details, orders, and payment records exclusively to vetted administrators.</li>
                            <li><strong>Session & CSRF Protection:</strong> Automated CSRF token verification on all POST/PUT/DELETE requests preventing unauthorized session actions.</li>
                            <li><strong>Payment Privacy:</strong> We do not store sensitive bank account login credentials or payment card CVV numbers. Payment verification relies on customer-uploaded UTR transaction reference IDs and slips verified against bank statements.</li>
                            <li><strong>Security Incident Response:</strong> In the unlikely event of an unauthorized data exposure, we maintain strict incident mitigation protocols and will notify affected data principals and statutory agencies (such as CERT-In) in compliance with Indian cyber laws.</li>
                        </ul>
                    </div>

                    <!-- 7. Industrial Telemetry & Custom AI Agent Confidentiality -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">7. Industrial IoT Telemetry & Custom AI Agent Confidentiality</h5>
                        <p class="mb-2">
                            <strong>Client Data Sovereignty:</strong> For enterprises utilizing our Industrial IoT, OEE logging, or Auto-Purging systems, telemetry captured by industrial gateways (temperatures, cycle counts, pressure, power consumption) remains the strict intellectual property of the client. Telemetry is routed exclusively to client-authorized private databases or on-premise servers. We never sell, monetize, or publicly disclose proprietary machine telemetry.
                        </p>
                        <p class="mb-0">
                            <strong>Governed AI Workflows:</strong> Our Custom AI Agents (including RAG, Marketing, and Lead workflows) operate within strictly approved parameters. Client documents, trade secrets, and customer logs processed by these agents are never used to train public foundational AI models.
                        </p>
                    </div>

                    <!-- 8. Third-Party Sharing -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">8. Data Sharing & Third-Party Logistics</h5>
                        <p class="mb-2">We do not sell, rent, or trade your personal information. Information is disclosed solely in the following limited operational scenarios:</p>
                        <ul class="ps-3 mb-0">
                            <li><strong>Logistics & Courier Partners:</strong> Your recipient name, shipping address, and phone number are shared with authorized courier partners (e.g., Delhivery, BlueDart, DTDC, India Post) solely to fulfill shipping and provide live package tracking.</li>
                            <li><strong>Legal & Statutory Compliance:</strong> When required by Indian law, judicial summons, police investigations, or GST tax filing mandates.</li>
                        </ul>
                    </div>

                    <!-- 9. Grievance Redressal Officer -->
                    <div class="p-4 bg-white rounded-3 border-start border-4 border-primary shadow-sm">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa fa-user-shield text-primary me-2"></i>9. Statutory Grievance Redressal Officer</h5>
                        <p class="mb-3">
                            In accordance with Rule 3(2) of the <strong>Information Technology (Intermediary Guidelines and Digital Media Ethics Code) Rules, 2021</strong> and the <strong>Digital Personal Data Protection Act, 2023</strong>, the details of our designated Grievance Officer and Data Protection Lead are provided below:
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
                                    <span class="text-secondary small">Lead Data Protection & Grievance Officer</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-2 bg-light rounded-2 border">
                                    <strong class="d-block text-dark small">Grievance Email:</strong>
                                    <a href="mailto:tcsmarttechnology@gmail.com" class="text-primary fw-semibold small">tcsmarttechnology@gmail.com</a>
                                    <span class="text-muted extra-small d-block">(cc: info@tcsmarttechnology.com)</span>
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
                                    <strong class="d-block text-dark small">Official Address:</strong>
                                    <span class="text-secondary small">TC Smart Technology, D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025, India</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted extra-small mb-0">
                            <strong>Response Timelines:</strong> We acknowledge all submitted grievances within <strong>24 hours</strong> of receipt and resolve verified complaints within <strong>15 to 30 business days</strong> as required by law.
                        </p>
                    </div>

                    <!-- 10. Policy Updates -->
                    <div>
                        <h5 class="fw-bold text-dark mb-2">10. Policy Revisions</h5>
                        <p class="mb-0">
                            We may periodically update this Privacy Policy to reflect technical platform enhancements or amendments in applicable cyber laws. Any revisions will be published on this page with an updated version number and effective date. Continued usage of our website or services constitutes acceptance of the revised policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
