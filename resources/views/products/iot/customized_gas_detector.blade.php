@extends('frontend.layouts.main')

@section('meta_title', 'Customized Gas Detector')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Customized Gas Detector',
        'breadcrumb' => ['Products', 'TC IOT Product', 'Customized Gas Detector']
    ])

    <div class="container">
        <h2>Customized Gas Detector</h2>
        <p>Here you can describe your Customized Gas Detector product.</p>
        <!-- Add more details about the product -->
    </div>
@endsection
