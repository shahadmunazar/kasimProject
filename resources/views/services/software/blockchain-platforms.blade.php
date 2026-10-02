@extends('frontend.layouts.main')

@section('meta_title', 'Blockchain and Cryptocurrency Platforms | TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Blockchain and Cryptocurrency Platforms',
        'breadcrumb' => ['Services', 'Blockchain and Cryptocurrency']
    ])

    <!-- Introduction Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-4 mb-4">Blockchain & Cryptocurrency Solutions by TC Smart Technology</h1>
                    <p class="lead text-muted mb-4">
                        Based in Delhi NCR - Noida, TC Smart Technology delivers secure, scalable blockchain and cryptocurrency platforms for startups, enterprises, and financial institutions. From crypto exchanges to NFT marketplaces, our solutions empower businesses with decentralized technology.
                    </p>
                    <a href="mailto:info@tcsmarttechnology.com" class="btn btn-primary py-3 px-5">Get in Touch</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Blockchain %26 Cryptocurrency Platforms.png" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 500px; object-fit: cover;"> 
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Why Choose TC Smart Technology for Blockchain?</h2>
                <p class="lead text-muted">
                    Located in Delhi NCR - Noida, our certified blockchain developers deliver secure, scalable platforms using Ethereum, Polygon, Binance Smart Chain, and more. We ensure regulatory compliance, seamless user experience, and enterprise-grade solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-lock fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Secure Platforms</h4>
                        <p class="text-muted">
                            Multi-layer security with audited smart contracts.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-expand-arrows-alt fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Scalable Solutions</h4>
                        <p class="text-muted">
                            Platforms designed for high transaction volumes.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 shadow-sm text-center h-100">
                        <i class="fa fa-user-shield fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Regulatory Compliance</h4>
                        <p class="text-muted">
                            AML/KYC integration for secure operations.
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
                <h2 class="display-5 mb-3">Our Blockchain & Cryptocurrency Services</h2>
                <p class="lead text-muted">
                    End-to-end solutions for decentralized applications and crypto platforms.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Custom Blockchain Apps</h5>
                        <p class="text-muted">
                            Scalable private and public blockchain solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Crypto Exchange</h5>
                        <p class="text-muted">
                            Secure platforms with trading and liquidity features.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Crypto Wallet</h5>
                        <p class="text-muted">
                            Multi-currency wallets with 2FA and QR code support.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Smart Contracts</h5>
                        <p class="text-muted">
                            Audited contracts for DeFi, NFTs, and DAOs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Token Development</h5>
                        <p class="text-muted">
                            Custom ERC20, BEP20, and NFT token creation.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">NFT Marketplace</h5>
                        <p class="text-muted">
                            Platforms for minting, trading, and managing NFTs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Supply Chain Blockchain</h5>
                        <p class="text-muted">
                            Transparent tracking and anti-counterfeiting solutions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">DeFi Applications</h5>
                        <p class="text-muted">
                            Lending, staking, and yield farming platforms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blockchain Products Section -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="display-5 mb-3">Our Blockchain Products</h2>
                <p class="lead text-muted">
                    Proven solutions for cryptocurrency and decentralized applications.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC CryptoX Exchange:</strong> Customizable trading platform.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>TC Vault Wallet:</strong> Multi-asset crypto wallet.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Smart Token Engine:</strong> Token creation and management.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>NFT SmartHub:</strong> Branded NFT marketplace solution.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>DeFi Platforms:</strong> Staking and lending applications.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Smart Contracts:</strong> Automation for multiple sectors.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Decentralized Exchange:</strong> High-demand P2P trading.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>NFT Marketplace:</strong> Popular for digital collectibles.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Crypto Wallet:</strong> Essential for DeFi and gaming.</li>
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
                    Advanced technologies powering our blockchain solutions.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Blockchains:</strong> Ethereum, Polygon, Binance Smart Chain.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Wallets:</strong> Metamask, Trust Wallet, Coinbase Wallet.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>APIs:</strong> RESTful APIs, GraphQL for integration.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Security:</strong> 2FA, cryptographic algorithms, audits.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Features:</strong> KYC/AML, real-time analytics.</li>
                            <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><strong>Compatibility:</strong> EVM and multi-chain support.</li>
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
                <h2 class="display-5 mb-3">End-to-End Blockchain Support</h2>
                <p class="lead text-muted">
                    From ideation to deployment, we’re your blockchain partner.
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.1s">
                     <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/Blockchain %26 Cryptocurrency Platforms.jpg" alt="AI and Machine Learning technology visualization" style="width: 100%; height: 570px; object-fit: cover;"> 
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-tools fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">Seamless Deployment</h5>
                        <p class="text-muted">
                            Full setup and integration with existing systems.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm mb-4">
                        <i class="fa fa-user-check fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">User Training</h5>
                        <p class="text-muted">
                            Comprehensive training for blockchain platforms.
                        </p>
                    </div>
                    <div class="bg-light rounded p-4 shadow-sm">
                        <i class="fa fa-headset fa-2x text-primary mb-3"></i>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="text-muted">
                            Rapid response with maintenance and audits.
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
                <h2 class="display-5 mb-3">Why Choose Our Blockchain Solutions?</h2>
                <p class="lead text-muted">
                    Unlock the power of decentralized technology for your business.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Enhanced Security</h5>
                        <p class="text-muted">
                            Robust encryption and audited smart contracts.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Scalable Architecture</h5>
                        <p class="text-muted">
                            Handle high transaction volumes with ease.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">Regulatory Compliance</h5>
                        <p class="text-muted">
                            AML/KYC integration for secure operations.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded p-4 shadow-sm h-100">
                        <h5 class="mb-3">User-Friendly Platforms</h5>
                        <p class="text-muted">
                            Intuitive interfaces for seamless adoption.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.1s">Launch Your Blockchain Journey Today</h2>
            <p class="lead mb-4 wow fadeInUp" data-wow-delay="0.3s">
                Ready to build a secure blockchain platform or cryptocurrency solution? Contact TC Smart Technology at <a href="mailto:info@tcsmarttechnology.com" class="text-white text-decoration-underline">info@tcsmarttechnology.com</a> or visit us in Delhi NCR - Noida for a free consultation.
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
