@extends('frontend.layouts.main')

@section('meta_title', 'Get a Free Quote | TC Smart Technology - Industrial Solutions')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Get A Quote',
        'breadcrumb' => ['Pages', 'Appointment']
    ])

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-4">Request Your Free Quote Today!</h1>
                    <p class="mb-4">We offer top-notch industrial and automation solutions tailored to your needs. Whether it's for embedded systems, robotics, or software development, our team is ready to assist you.</p>
                    <p class="mb-4">Click the button below to fill out our contact form and get a detailed quote for your project.</p>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-primary py-3 px-5 me-3" href="{{ route('contact.index') }}">Get A Quote</a>
                        <div class="d-flex align-items-center">
                            <div class="btn-lg-square bg-primary rounded-circle me-2">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Call Us</h5>
                                <span>+91-7065122884</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative overflow-hidden rounded-4">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/service-1.jpg') }}" alt="Get a Quote">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
