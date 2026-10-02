@extends('frontend.layouts.main')

@section('meta_title', 'Circuit Designing')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Circuit Designing',
        'breadcrumb' => ['Services', 'Embedded Hardware Development Services', 'Circuit Designing']
    ])

    <div class="container">
        <h2>Circuit Designing</h2>
        <p>Here you can describe your Circuit Designing service.</p>
        <!-- Add more details about the service -->
    </div>
@endsection
