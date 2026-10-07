@extends('frontend.layouts.main')

@section('content')
<style>
    .auth-card { border-radius: 1rem; overflow: hidden; transition: all 0.3s ease; }
    .auth-card .card-body { padding: 3rem !important; }
    .input-group-text { background-color: #f8f9fa; border-right: none; }
    .form-control { border-left: none; box-shadow: none !important; }
    .form-control:focus { border-color: #0d6efd; }
    .input-group:focus-within .input-group-text, .input-group:focus-within .form-control { border-color: #0d6efd; }
    .btn-auth { border-radius: 0.5rem; padding: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    .divider { display: flex; align-items: center; text-align: center; color: #6c757d; margin: 1.5rem 0; }
    .divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px solid #dee2e6; }
    .divider:not(:empty)::before { margin-right: .5em; }
    .divider:not(:empty)::after { margin-left: .5em; }
    .otp-input { letter-spacing: 10px; font-weight: bold; border-radius: 0.5rem; text-align: center; }
</style>

<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body">
                    <div id="alertBox" class="alert d-none rounded-3 px-3 py-2"></div>

                    <!-- LOGIN FORM -->
                    <div id="loginView">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fa fa-sign-in-alt fa-2x"></i>
                            </div>
                            <h3 class="fw-bold">Welcome Back</h3>
                            <p class="text-muted">Sign in to continue.</p>
                        </div>

                        <form id="loginForm" onsubmit="handleLogin(event)">
                            <div class="mb-4">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope text-muted"></i></span>
                                    <input type="email" id="loginEmail" class="form-control form-control-lg" required placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock text-muted"></i></span>
                                    <input type="password" id="loginPassword" class="form-control form-control-lg" required placeholder="Enter password">
                                </div>
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-auth" id="btnLogin">Sign In</button>
                            </div>
                        </form>

                        <div class="divider text-uppercase small fw-bold text-muted">OR</div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="button" class="btn btn-outline-primary btn-auth" onclick="switchView('otpRequestView')">
                                <i class="fa fa-mobile-alt me-2"></i> Sign in with OTP
                            </button>
                        </div>

                        <div class="text-center mt-4 pt-3 border-top">
                            <span class="text-muted">Don't have an account? </span>
                            <a href="#" class="text-primary text-decoration-none fw-bold" onclick="switchView('registerView')">Register Now</a>
                        </div>
                    </div>

                    <!-- REGISTER FORM -->
                    <div id="registerView" class="d-none">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fa fa-user-plus fa-2x"></i>
                            </div>
                            <h3 class="fw-bold">Create Account</h3>
                        </div>

                        <form id="registerForm" onsubmit="handleRegister(event)">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user text-muted"></i></span>
                                    <input type="text" id="regName" class="form-control form-control-lg" required placeholder="John Doe">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-phone text-muted"></i></span>
                                    <input type="text" id="regPhone" class="form-control form-control-lg" required placeholder="Mobile number">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope text-muted"></i></span>
                                    <input type="email" id="regEmail" class="form-control form-control-lg" required placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock text-muted"></i></span>
                                    <input type="password" id="regPassword" class="form-control form-control-lg" required placeholder="Create password">
                                </div>
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-auth" id="btnRegister">Register</button>
                            </div>
                            <div class="text-center border-top pt-3">
                                <span class="text-muted">Already have an account? </span>
                                <a href="#" class="text-primary text-decoration-none fw-bold" onclick="switchView('loginView')">Sign In</a>
                            </div>
                        </form>
                    </div>

                    <!-- OTP REQUEST FORM -->
                    <div id="otpRequestView" class="d-none">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fa fa-envelope-open-text fa-2x"></i>
                            </div>
                            <h3 class="fw-bold">Login with OTP</h3>
                            <p class="text-muted">Enter your email to receive a code.</p>
                        </div>

                        <form id="otpRequestForm" onsubmit="handleOtpRequest(event)">
                            <div class="mb-4">
                                <label class="form-label text-secondary fw-semibold small text-uppercase">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope text-muted"></i></span>
                                    <input type="email" id="otpEmail" class="form-control form-control-lg" required placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-auth" id="btnSendOtp">Send Code</button>
                            </div>
                            <div class="text-center pt-3 border-top">
                                <a href="#" class="text-primary text-decoration-none fw-bold" onclick="switchView('loginView')"><i class="fa fa-arrow-left me-1"></i> Back to Password Login</a>
                            </div>
                        </form>
                    </div>

                    <!-- OTP VERIFY FORM -->
                    <div id="otpVerifyView" class="d-none">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fa fa-shield-alt fa-2x"></i>
                            </div>
                            <h3 class="fw-bold">Verify OTP</h3>
                            <p class="text-muted">Code sent to <br><strong class="text-dark" id="displayOtpEmail"></strong></p>
                        </div>

                        <form id="otpVerifyForm" onsubmit="handleOtpVerify(event)">
                            <div class="mb-4">
                                <input type="text" id="otpCode" class="form-control form-control-lg otp-input fs-3" required maxlength="6" placeholder="••••••" autocomplete="off">
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-auth" id="btnVerifyOtp">Verify & Login</button>
                            </div>
                            <div class="text-center pt-3 border-top">
                                <span class="text-muted">Didn't receive the code?</span>
                                <button type="button" class="btn btn-link text-primary text-decoration-none p-0 fw-bold ms-1" id="btnResendOtp" onclick="handleOtpRequest(event, true)">Resend Now</button>
                                <br><br>
                                <a href="#" class="text-muted text-decoration-none" onclick="switchView('otpRequestView')">Change Email</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentOtpEmail = '';

    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.pathname.includes('/register')) {
            switchView('registerView');
        }
    });

    function switchView(viewId) {
        ['loginView', 'registerView', 'otpRequestView', 'otpVerifyView'].forEach(id => {
            document.getElementById(id).classList.add('d-none');
        });
        document.getElementById(viewId).classList.remove('d-none');
        hideAlert();
    }

    function showAlert(message, type = 'danger') {
        const box = document.getElementById('alertBox');
        box.className = `alert alert-${type} rounded-3 px-3 py-2`;
        box.innerText = message;
        box.classList.remove('d-none');
    }

    function hideAlert() {
        document.getElementById('alertBox').classList.add('d-none');
    }

    function handleLogin(e) {
        e.preventDefault();
        hideAlert();
        const btn = document.getElementById('btnLogin');
        btn.disabled = true;
        btn.innerHTML = 'Signing In...';

        $.post("{{ route('frontend.auth.login-password') }}", {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val(),
            _token: '{{ csrf_token() }}'
        }).done(res => {
            window.location.href = res.redirect;
        }).fail(err => {
            showAlert(err.responseJSON?.message || 'Invalid credentials.');
            btn.disabled = false;
            btn.innerHTML = 'Sign In';
        });
    }

    function handleRegister(e) {
        e.preventDefault();
        hideAlert();
        const btn = document.getElementById('btnRegister');
        btn.disabled = true;
        btn.innerHTML = 'Registering...';

        $.post("{{ route('frontend.auth.register') }}", {
            name: $('#regName').val(),
            phone: $('#regPhone').val(),
            email: $('#regEmail').val(),
            password: $('#regPassword').val(),
            _token: '{{ csrf_token() }}'
        }).done(res => {
            if (res.require_otp) {
                currentOtpEmail = res.email;
                document.getElementById('displayOtpEmail').innerText = res.email;
                switchView('otpVerifyView');
                $('#otpCode').val('').focus();
                showAlert(res.message, 'success');
            } else {
                window.location.href = res.redirect;
            }
        }).fail(err => {
            showAlert(err.responseJSON?.message || 'Registration failed. Check inputs.');
            btn.disabled = false;
            btn.innerHTML = 'Register';
        });
    }

    function handleOtpRequest(e, isResend = false) {
        if(e) e.preventDefault();
        hideAlert();
        
        const email = isResend ? currentOtpEmail : $('#otpEmail').val();
        if(!email) return;

        const btn = isResend ? document.getElementById('btnResendOtp') : document.getElementById('btnSendOtp');
        btn.disabled = true;
        if(!isResend) btn.innerHTML = 'Sending...';

        $.post("{{ route('frontend.auth.send-otp') }}", {
            email: email,
            _token: '{{ csrf_token() }}'
        }).done(res => {
            currentOtpEmail = email;
            document.getElementById('displayOtpEmail').innerText = email;
            if(!isResend) {
                switchView('otpVerifyView');
                $('#otpCode').val('').focus();
            } else {
                showAlert('OTP resent successfully!', 'success');
            }
        }).fail(err => {
            showAlert(err.responseJSON?.message || 'Failed to send OTP.');
        }).always(() => {
            btn.disabled = false;
            if(!isResend) btn.innerHTML = 'Send Code';
        });
    }

    function handleOtpVerify(e) {
        e.preventDefault();
        hideAlert();
        const btn = document.getElementById('btnVerifyOtp');
        btn.disabled = true;
        btn.innerHTML = 'Verifying...';

        $.post("{{ route('frontend.auth.verify-otp') }}", {
            email: currentOtpEmail,
            otp: $('#otpCode').val(),
            _token: '{{ csrf_token() }}'
        }).done(res => {
            window.location.href = res.redirect;
        }).fail(err => {
            showAlert(err.responseJSON?.message || 'Invalid or expired OTP.');
            btn.disabled = false;
            btn.innerHTML = 'Verify & Login';
        });
    }
</script>
@endpush
