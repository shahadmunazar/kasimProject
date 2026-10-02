@props(['title' => 'Page Title', 'breadcrumb' => []])
<div class="container-fluid page-header pt-5 mb-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white p-5">
                    <h1 class="display-6 text-uppercase mb-3 animated slideInDown">{{ $title }}</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            @foreach($breadcrumb as $crumb)
                                @if($loop->last)
                                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb }}</li>
                                @else
                                    <li class="breadcrumb-item"><a href="#">{{ $crumb }}</a></li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
