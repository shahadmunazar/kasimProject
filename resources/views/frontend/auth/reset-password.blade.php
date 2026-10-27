@extends('frontend.layouts.main')

@section('content')
<style>
    .auth-card { border-radius: 1rem; overflow: hidden; transition: all 0.3s ease; }
    .auth-card .card-body { padding: 3rem !important; }
    .input-group-text { background-color: #f8f9fa; border-right: none; }
    .form-control { border-left: none; box-shadow: none !important; }
    .form-control:focus { border-color: #df9b15; }
    .input-group:focus-within .input-group-text, .input-group:focus-within .form-control { border-color: #df9b15; }
    .btn-auth { border-radius: 0.5rem; padding: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
</style>

<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body">
                    <div id="alertBox" class="alert d-none rounded-3 px-3 py-2"></div>

                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fa fa-key fa-2x"></i>
                        </div>
                        <h3 class="fw-bold">Create New Password</h3>
                        <p class="text-muted">Enter your new password below for <br><strong class="text-dark">{{ $email }}</strong></p>
                    </div>

                    <form id="resetPasswordForm" onsubmit="handleResetPassword(event)">
                        <input type="hidden" id="resetToken" value="{{ $token }}">
                        <input type="hidden" id="resetEmail" value="{{ $email }}">

                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small text-uppercase">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-lock text-muted"></i></span>
                                <input type="password" id="newPassword" class="form-control form-control-lg" required minlength="6" placeholder="Enter new password">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary fw-semibold small text-uppercase">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-check-double text-muted"></i></span>
                                <input type="password" id="newPasswordConfirm" class="form-control form-control-lg" required minlength="6" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-auth" id="btnResetPassword">Update Password</button>
                        </div>

                        <div class="text-center pt-3 border-top">
                            <a href="{{ route('frontend.auth.login') }}" class="text-primary text-decoration-none fw-bold">
                                <i class="fa fa-arrow-left me-1"></i> Back to Sign In
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showAlert(message, type = 'danger') {
        const box = document.getElementById('alertBox');
        box.className = `alert alert-${type} rounded-3 px-3 py-2 mb-4`;
        box.innerText = message;
        box.classList.remove('d-none');
    }

    function hideAlert() {
        document.getElementById('alertBox').classList.add('d-none');
    }

    function handleResetPassword(e) {
        e.preventDefault();
        hideAlert();

        const password = $('#newPassword').val();
        const confirm = $('#newPasswordConfirm').val();

        if (password !== confirm) {
            showAlert('Passwords do not match. Please check again.');
            return;
        }

        if (password.length < 6) {
            showAlert('Password must be at least 6 characters.');
            return;
        }

        const btn = document.getElementById('btnResetPassword');
        btn.disabled = true;
        btn.innerHTML = 'Updating Password...';

        $.post("{{ route('frontend.auth.password.update') }}", {
            token: $('#resetToken').val(),
            email: $('#resetEmail').val(),
            password: password,
            password_confirmation: confirm,
            _token: '{{ csrf_token() }}'
        }).done(res => {
            showAlert(res.message || 'Password reset successfully! Redirecting...', 'success');
            setTimeout(() => {
                window.location.href = res.redirect || "{{ route('frontend.auth.login') }}";
            }, 1500);
        }).fail(err => {
            showAlert(err.responseJSON?.message || 'Failed to reset password. Please try again or request a new link.');
            btn.disabled = false;
            btn.innerHTML = 'Update Password';
        });
    }
</script>
@endpush
