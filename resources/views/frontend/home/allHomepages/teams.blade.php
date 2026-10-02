<div class="container-fluid team pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">Meet Our Professional and Experienced Welders</h1>
        </div>
        <div class="row g-4">
            @php
                $team = [
                    ['name' => 'Alex Robin', 'image' => 'team-1.jpg', 'position' => 'Welder'],
                    ['name' => 'Andrew Bon', 'image' => 'team-2.jpg', 'position' => 'Welder'],
                    ['name' => 'Martin Tompson', 'image' => 'team-3.jpg', 'position' => 'Welder'],
                    ['name' => 'Clarabelle Samber', 'image' => 'team-4.jpg', 'position' => 'Welder'],
                ];
            @endphp

            @foreach($team as $index => $member)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + ($index * 0.1) }}s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/' . $member['image']) }}" alt="{{ $member['name'] }}">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-square btn-dark mx-1" href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1">{{ $member['name'] }}</h5>
                            <span>{{ $member['position'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
