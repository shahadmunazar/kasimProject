@extends('frontend.layouts.main')

@section('meta_title', 'Advanced AI & Machine Learning Solutions | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Advanced AI & Machine Learning Solutions',
        'breadcrumb' => ['Services', 'AI & Machine Learning Solutions']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Advanced AI & Machine Learning by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers cutting-edge AI and Machine Learning solutions for intelligent automation, predictive analytics, and data-driven decisions. Our AI-powered systems enhance efficiency, reduce errors, and enable smarter operations across industries.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/AI %26 Machine Learning Solutions (2).jpg" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 500px; object-fit: cover;">

                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for AI & ML?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, our expert data scientists and AI engineers leverage frameworks like TensorFlow, PyTorch, and Scikit-learn to deliver solutions with over 95% prediction accuracy, seamless system integration, and ISO 27001/GDPR compliance.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-brain fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Custom AI Development</h4>
                        <p class="text-muted">
                            Tailored solutions using TensorFlow, PyTorch, and Scikit-learn.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-tachometer-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Real-Time Processing</h4>
                        <p class="text-muted">
                            Sub-second latency with edge and cloud AI deployment.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Data Compliance</h4>
                        <p class="text-muted">
                            ISO 27001 and GDPR standards for secure AI systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comprehensive Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our AI & Machine Learning Services</h2>
                <p class="lead text-muted">
                    End-to-end AI solutions tailored for intelligent automation and data-driven insights.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">AI-Powered Quality Inspection</h5>
                        <p class="text-muted">
                            Real-time defect detection with 99% accuracy using deep learning.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Predictive Maintenance</h5>
                        <p class="text-muted">
                            ML algorithms to predict failures, boosting uptime by 30%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Process Optimization</h5>
                        <p class="text-muted">
                            Fine-tune production with reinforcement learning algorithms.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Intelligent Document Processing</h5>
                        <p class="text-muted">
                            Automate data extraction with NLP and OCR technologies.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Chatbots & Virtual Assistants</h5>
                        <p class="text-muted">
                            AI-driven customer and technical support automation.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Computer Vision Solutions</h5>
                        <p class="text-muted">
                            Real-time object detection, facial recognition, and 3D vision.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Predictive Analytics</h5>
                        <p class="text-muted">
                            Forecast demand, supply, and production with ML models.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">AIoT Integration</h5>
                        <p class="text-muted">
                            Smart manufacturing with AI-powered IoT sensors.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industry Applications Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Industry-Specific AI Solutions</h2>
                <p class="lead text-muted">
                    Tailored AI applications delivering measurable ROI across industries.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Automotive:</strong> Predictive maintenance and defect detection.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Manufacturing:</strong> Visual inspection and resource optimization.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Healthcare:</strong> Medical image classification and diagnostics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Electronics:</strong> IC defect detection and PCB inspection.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Retail:</strong> Personalized recommendations and inventory forecasting.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Pharma:</strong> Drug discovery and compliance automation.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>E-commerce:</strong> Customer sentiment and demand prediction.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Semiconductors:</strong> Yield forecasting and SMT optimization.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Logistics:</strong> Route optimization and supply chain forecasting.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Energy:</strong> Predictive maintenance for renewable systems.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Telecom:</strong> Network optimization and anomaly detection.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>More:</strong> Agriculture, Finance, and Smart Cities.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technical Highlights Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Technical Highlights</h2>
                <p class="lead text-muted">
                    Cutting-edge technologies powering our AI solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Frameworks:</strong> TensorFlow, PyTorch, Scikit-learn, OpenCV.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>NLP Tools:</strong> NLTK, SpaCy, BERT for advanced text processing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Cloud Platforms:</strong> AWS, Azure AI, Google AI for scalability.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Edge AI:</strong> NVIDIA Jetson, Intel Movidius for real-time processing.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Visualization:</strong> Power BI, Tableau, Grafana for data insights.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Accuracy:</strong> 95%+ prediction accuracy in ML models.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service & Support Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">End-to-End AI Support</h2>
                <p class="lead text-muted">
                    From development to ongoing support, we’re your AI partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/AI %26 Machine Learning Solutions (2).png" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 570px; object-fit: cover;">                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Model Deployment</h5>
                        <p class="text-muted">
                            Seamless integration with SCADA, MES, ERP, and IoT systems.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">AI Training Programs</h5>
                        <p class="text-muted">
                            Hands-on training for your team to leverage AI tools.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response and model retraining in under 4 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose Our AI Solutions?</h2>
                <p class="lead text-muted">
                    Unlock transformative benefits with intelligent automation.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">High Accuracy</h5>
                        <p class="text-muted">
                            Up to 99% precision in defect detection and predictions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Cost Savings</h5>
                        <p class="text-muted">
                            Reduce inspection and labor costs by up to 40%.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Increased Throughput</h5>
                        <p class="text-muted">
                            Optimize operations for higher production speed.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Solutions</h5>
                        <p class="text-muted">
                            Expand AI capabilities as your business grows.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Revolutionize Your Operations with AI</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to transform your business with AI & Machine Learning? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida.
            </p>
            <a href="mailto:info@tcsmarttechnology.com" class="btn btn-light py-3 px-5 wow fadeInUp" data-wow-delay="0.5s">Contact Us Now</a>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="container-fluid bg-light py-3">
        <div class="container text-center">
            <p class="text-muted mb-0">
                <strong>Contact Information:</strong> Email: <a href="mailto:info@tcsmarttechnology.com">info@tcsmarttechnology.com</a> | Location: Delhi NCR - Noida
            </p>
        </div>
    </div>
@endsection

<style>
/* Color Combination from Provided Artifact */
.container-fluid.bg-primary {
    background: linear-gradient(135deg, #ce9233, #ce9233);
}
.btn-primary {
    background-color: #d81b60;
    border-color: #d81b60;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-primary:hover {
    background-color: #ad1457;
    border-color: #ad1457;
    transform: scale(1.05);
}
.bg-light {
    background-color: #f5f5f5 !important;
}
.card, .bg-white {
    background-color: #ffffff;
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover, .bg-white:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
img.rounded {
    transition: opacity 0.3s;
}
img.rounded:hover {
    opacity: 0.9;
}
h1.display-4, h2.display-5 {
    font-weight: 700;
    color: #333333;
}
.text-muted {
    color: #666666 !important;
}
.text-primary {
    color: #d81b60 !important;
}
.btn-light {
    color: #333333;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-light:hover {
    background-color: #e0e0e0;
    transform: scale(1.05);
}
</style>
