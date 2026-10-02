@extends('frontend.layouts.main')

@section('meta_title', 'Smart Watch')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Smart Watch',
        'breadcrumb' => ['Products', 'TC Smart Solution', 'Smart Watch']
    ])

    <div class="container">
        <h2>Smart Watch</h2>
        <p>Here you can describe your Smart Watch product.</p>
        <!-- Add more details about the product -->
    </div>
@endsection
