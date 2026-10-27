@extends('frontend.layouts.main')

@section('meta_title', 'Engineering Leadership & Development Team | TC Smart Technology')
@section('meta_description', 'Meet the multidisciplinary engineering team at TC Smart Technology specializing in embedded firmware, multilayer PCB layout, industrial IoT telemetry, and AI systems.')
@section('meta_keywords', 'engineering team, embedded engineers, PCB designers, automation specialists, TC Smart Technology leadership')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Our Team',
        'breadcrumb' => ['Pages', 'Our Team']
    ])

    {{-- Add your Team content here --}}
@endsection
