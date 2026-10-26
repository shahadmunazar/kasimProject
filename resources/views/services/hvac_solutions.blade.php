@extends('frontend.layouts.main')

@section('meta_title', 'Centralized HVAC & Climate Control Solutions | TC Smart Technology')
@section('meta_description', 'Full-service HVAC solutions for residential, commercial, and industrial facilities. Centralized HVAC design, AMC contracts, smart climate control, and indoor air quality.')
@section('meta_keywords', 'HVAC System Solutions, Centralized HVAC, Split AC AMC, Climate Control Systems, Indoor Air Quality, TC Smart Technology')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HVAC System Solutions',
        'breadcrumb' => ['Services', 'HVAC System Solutions']
    ])

    <div class="container py-4">
       <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
 <img class="img-fluid rounded shadow-sm" src="{{ asset('assets') }}/img/hvac.png" alt="HVAC System" style="width: 100%; height: 500px; object-fit: cover;">               </div>
            <div class="col-md-6">
                <h5 class="text-uppercase">HVAC System Solutions</h5>
                <p>We offer full-service HVAC solutions for residential, commercial, and industrial setups:</p>
                <ul>
                    <li>Centralized HVAC design, supply, and installation</li>
                    <li>Split AC systems with Annual Maintenance Contracts (AMC)</li>
                    <li>Smart climate control systems</li>
                    <li>IAQ (Indoor Air Quality) enhancement and energy recovery ventilation</li>
                    <li>System optimization, load calculation, and 24/7 emergency support</li>
                </ul>
                <p>Our focus is on comfort, efficiency, and long-term performance.</p>
            </div>
        </div>
    </div>
@endsection
