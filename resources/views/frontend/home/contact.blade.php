@extends('frontend.layouts.main')

@section('meta_title', 'Contact Us | TC Smart Technology - Get a Quote')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Contact',
        'breadcrumb' => ['Pages', 'Contact']
    ])

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-lg rounded-4 card-hover">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center fw-bold text-dark">Let’s Talk</h2>
                        <p class="text-center text-muted mb-5">
                            Fill out the form below and our team will contact you shortly to discuss your needs.
                        </p>

                        <form id="contactForm">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="mobile" id="mobile" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="service_type" class="form-label">Type of Service</label>
                                    <select class="form-select" name="service_type" id="service_type">
                                        <option value="" disabled selected>Choose a service</option>
                                        <option>Embedded service </option>
                                        <option>Standard machine </option>
                                        <option>Industrial automation &Robotics </option>
                                        <option>Software solution </option>
                                        <option>Sales team </option>
                                        <option>Service team  </option>
                                        <option>Career team  </option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject">
                                </div>

                                <div class="col-md-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control rounded-4" name="message" id="message" rows="5" required></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-animated px-5 py-2 mt-4">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div id="formResponse" class="mt-4 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery & AJAX Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#contactForm').on('submit', function (e) {
                e.preventDefault();

                let formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    message: $('#message').val(),
                    service_type: $('#service_type').val(),
                    address: $('#address').val(),
                    subject: $('#subject').val(),
                };

                $('#formResponse').html('<div class="text-primary">Sending message...</div>');

                $.ajax({
                    url: "{{ route('contact.submit') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function (response) {
                        if (response.success) {
                            $('#formResponse').html(`<div class="alert alert-success">${response.message}</div>`);
                            $('#contactForm')[0].reset();
                        } else {
                            $('#formResponse').html(`<div class="alert alert-danger">Something went wrong!</div>`);
                        }
                    },
                    error: function (xhr) {
                        let errorHtml = '<div class="alert alert-danger"><ul>';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                errorHtml += `<li>${value}</li>`;
                            });
                        } else {
                            errorHtml += `<li>Unexpected error occurred.</li>`;
                        }
                        errorHtml += '</ul></div>';
                        $('#formResponse').html(errorHtml);
                    }
                });
            });
        });
    </script>
@endsection
