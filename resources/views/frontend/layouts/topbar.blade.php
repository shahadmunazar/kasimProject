<div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="d-flex align-items-center justify-content-between">
                <a href="/" class="text-decoration-none">
                    <h2 class="text-white fw-bold m-0" style="line-height: 1.1;">TC<br>SMART</h2>
                </a>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-map-marker-alt me-3"></i>
                        <small class="text-white" style="max-width: 240px; line-height: 1.3;">
                            D-364, Pocket 11, DDA Janta Flat, Jasola Vihar, New Delhi – 110025
                        </small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-envelope me-2"></i>
                        <small>tcsmarttechnology@gmail.com</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-envelope me-2"></i>
                        <small>info@tcsmarttechnology.com</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone-alt me-2"></i>
                        <small>+91-7065122884</small>
                    </div>
                    <div class="d-flex gap-2">
                       <a class="btn btn-sm-square btn-light text-primary" href="https://www.facebook.com/share/12L536bcJdV/?mibextid=wwXIfr" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                         <a class="btn btn-sm-square btn-light text-primary" href="https://www.instagram.com/tc_smart_technology?igsh=a2s2MWNoNGNvdTU1" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-sm-square btn-light text-primary" href="https://www.linkedin.com/company/tc-smart-technology/"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        @auth
                            @php
                                $nameParts = explode(' ', trim(Auth::user()->name));
                                $initials = strtoupper(substr($nameParts[0], 0, 1));
                                if (count($nameParts) > 1) {
                                    $initials .= strtoupper(substr(end($nameParts), 0, 1));
                                }
                            @endphp
                            <a href="{{ route('frontend.dashboard.profile') }}" title="My Profile" class="text-decoration-none d-flex align-items-center bg-light rounded p-1 border">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 14px;">
                                        {{ $initials }}
                                    </div>
                                @endif
                                <span class="ms-2 me-3 text-dark fw-bold small">{{ $nameParts[0] }}</span>
                            </a>
                            <form action="{{ route('frontend.auth.logout') }}" method="POST" class="d-inline ms-2">
                                @csrf
                                <button type="submit" class="btn btn-sm-square btn-danger text-white" title="Logout">
                                    <i class="fa fa-sign-out-alt"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('frontend.auth.login') }}" class="btn btn-sm-square btn-light text-primary" title="Login / Register">
                                <i class="fa fa-user"></i>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
