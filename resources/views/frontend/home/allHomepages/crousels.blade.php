<div class="container-fluid p-0 mb-6 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1">
                <img class="img-fluid" src="{{ asset('assets/img/Embedde.png') }}" alt="Slide 1">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-fluid" src="{{ asset('assets/img/hvac.png') }}" alt="Slide 2">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-fluid" src="{{ asset('assets/img/Industrial Automation HMI.png') }}" alt="Slide 3">
            </button>
             <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="3" aria-label="Slide 3">
                <img class="img-fluid" src="{{ asset('assets/img/Industral Automation and Robotics.png') }}" alt="Slide 4">
            </button>
             <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="4" aria-label="Slide 3">
                <img class="img-fluid" src="{{ asset('assets/img/Software APP Development  (1).png') }}" alt="Slide 5">
            </button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('assets/img/Embedde.png') }}" alt="Slide 1">
                <div class="carousel-caption">
                    <h5 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Embedded Systems Solutions</h5>
                    <a href="{{ route('services.embedded_systems') }}" class="btn btn-primary py-3 px-4">Explore More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/img/hvac.png') }}" alt="Slide 2">
                <div class="carousel-caption">
                    <h5 class="display-1 text-uppercase text-white mb-4 animated zoomIn">HVAC System Solutions</h5>
                    <a href="{{ route('services.hvac_solutions') }}" class="btn btn-primary py-3 px-4">Explore More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/img/Industrial Automation HMI.png') }}" alt="Slide 2">
                <div class="carousel-caption">
                    <h5 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Industrial Standard Machine</h5>
                    <a href="{{ route('services.hvac_solutions') }}" class="btn btn-primary py-3 px-4">Explore More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/img/Industral Automation and Robotics.png') }}" alt="Slide 3">
                <div class="carousel-caption">
                    <h5 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Industrial Automation, Robotics & Switchgear Testing</h5>
                    <a href="{{ route('services.software_development') }}" class="btn btn-primary py-3 px-4">Explore More</a>
                </div>
            </div>
             <div class="carousel-item">
                <img class="w-100" src="{{ asset('assets/img/Software APP Development  (1).png') }}" alt="Slide 3">
                <div class="carousel-caption">
                    <h5 class="display-1 text-uppercase text-white mb-4 animated zoomIn">Software Development Solutions</h5>
                    <a href="{{ route('services.software_development') }}" class="btn btn-primary py-3 px-4">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>
