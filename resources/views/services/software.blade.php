@extends('frontend.layouts.main')

@section('meta_title', 'AI & Machine Learning Solutions')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'AI & Machine Learning Solutions',
        'breadcrumb' => ['Services', 'AI & Machine Learning Solutions']
    ])

    <div class="container py-4">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/HVAC AMC .png" alt="AI & Machine learning " style="width: 100%; height: 500px; object-fit: cover;">               </div>
            <div class="col-md-6">
                <h5 class="text-uppercase">AI & Machine Learning Solutions</h5>
                <p>We offer intelligent AI and ML-powered solutions tailored to help businesses automate, predict, and optimize operations. Our services include:</p>
                <ul>
                    <li>Predictive analytics and business forecasting</li>
                    <li>AI-driven chatbots and virtual assistants</li>
                    <li>Image and video recognition systems</li>
                    <li>Natural Language Processing (NLP) engines</li>
                    <li>Smart automation with real-time data analysis</li>
                </ul>
                <p>From smart factories to intelligent customer service, we empower innovation using next-gen AI technologies.</p>
            </div>
        </div>
    </div>
@endsection
