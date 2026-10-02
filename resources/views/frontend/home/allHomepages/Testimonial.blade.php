<div class="container-fluid pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">What They’re Talking About Our Welding Work</h1>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-img">
                    @foreach (['testimonial-1.jpg', 'testimonial-2.jpg', 'testimonial-3.jpg', 'testimonial-4.jpg'] as $image)
                        <div class="animated flip infinite">
                            <img class="img-fluid" src="{{ asset('assets/img/' . $image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                <div class="owl-carousel testimonial-carousel">

                    @php
                        $testimonials = [
                            [
                                'name' => 'Alex Johnson',
                                'profession' => 'Construction Manager',
                                'image' => 'testimonial-1.jpg',
                                'message' => 'The welding job was exceptional. Delivered on time with superb quality!',
                            ],
                            [
                                'name' => 'Emily Clark',
                                'profession' => 'Project Supervisor',
                                'image' => 'testimonial-2.jpg',
                                'message' => 'Professional team and top-quality welding. Highly recommended.',
                            ],
                            [
                                'name' => 'Michael Smith',
                                'profession' => 'Engineer',
                                'image' => 'testimonial-3.jpg',
                                'message' => 'Great work ethic and excellent results. We’ll definitely return for future projects.',
                            ],
                            [
                                'name' => 'Sophie Brown',
                                'profession' => 'Architect',
                                'image' => 'testimonial-4.jpg',
                                'message' => 'Very impressed with the precision and attention to detail in their metalwork.',
                            ],
                        ];
                    @endphp

                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-4">
                                <img class="img-fluid" src="{{ asset('assets/img/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}">
                                <div class="ms-3">
                                    <div class="mb-2">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="far fa-star text-primary"></i>
                                        @endfor
                                    </div>
                                    <h5 class="text-uppercase">{{ $testimonial['name'] }}</h5>
                                    <span>{{ $testimonial['profession'] }}</span>
                                </div>
                            </div>
                            <p class="fs-5">{{ $testimonial['message'] }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
