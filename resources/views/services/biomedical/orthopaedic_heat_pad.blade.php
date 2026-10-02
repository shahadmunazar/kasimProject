@extends('frontend.layouts.main')

@section('meta_title', 'Orthopaedic Heat Pad Service')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Orthopaedic Heat Pad Service',
        'breadcrumb' => ['Services', 'TC Biomedical Services', 'Orthopaedic Heat Pad']
    ])

    <div class="container">
        <h2>Orthopaedic Heat Pad Service</h2>
        <p>Here you can describe your Orthopaedic Heat Pad Service.</p>
        <!-- Add more details about the service -->
    </div>
@endsection
