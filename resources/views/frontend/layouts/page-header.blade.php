@props(['title' => 'Page Title', 'breadcrumb' => []])
<div class="container-fluid page-header pt-5 mb-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white p-5 rounded-4 shadow-sm">
                    <h1 class="display-6 text-uppercase mb-3 animated slideInDown fw-bold text-dark">{{ $title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ route('home.index') }}" itemprop="item">
                                    <span itemprop="name">Home</span>
                                </a>
                                <meta itemprop="position" content="1" />
                            </li>
                            @php $crumbPos = 2; @endphp
                            @foreach($breadcrumb as $crumb)
                                @if($loop->last)
                                    <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                        <span itemprop="name">{{ is_array($crumb) ? $crumb['label'] : $crumb }}</span>
                                        <meta itemprop="position" content="{{ $crumbPos++ }}" />
                                    </li>
                                @else
                                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                        <a href="{{ is_array($crumb) && isset($crumb['url']) ? $crumb['url'] : '#' }}" itemprop="item">
                                            <span itemprop="name">{{ is_array($crumb) ? $crumb['label'] : $crumb }}</span>
                                        </a>
                                        <meta itemprop="position" content="{{ $crumbPos++ }}" />
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
