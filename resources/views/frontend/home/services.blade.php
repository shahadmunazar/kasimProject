@extends('frontend.layouts.main')

@section('meta_title', 'Our Services | Industrial Automation, Embedded & Software Solutions - TC Smart Technology')
@section('meta_description', 'Explore comprehensive services by TC Smart Technology: Embedded Hardware & Firmware, Industrial Automation & Robotics, HVAC Systems, and Custom Software Solutions.')
@section('meta_keywords', 'TC Smart Technology Services, Embedded Systems Solutions, Industrial Automation, HVAC Solutions, Software Development Solutions, Robotics Integration')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Services',
        'breadcrumb' => ['Pages', 'Services']
    ])
    @include('frontend.home.allHomepages.Service')
    {{-- @include('frontend.home.allHomepages.appointment')
    @include('frontend.home.allHomepages.teams')
    @include('frontend.home.allHomepages.Newsletter') --}}
    {{-- Add the rest of your Services content here --}}
@endsection
