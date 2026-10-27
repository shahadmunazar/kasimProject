@extends('frontend.layouts.main')

@section('meta_title', 'Client Testimonials & Engineering Reviews | TC Smart Technology')
@section('meta_description', 'Read verified reviews and testimonials from companies that partnered with TC Smart Technology for embedded systems, factory automation, and IIoT.')
@section('meta_keywords', 'client testimonials, engineering reviews, customer feedback, TC Smart Technology reviews, industrial automation case reviews')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Testimonials',
        'breadcrumb' => ['Pages', 'Testimonials']
    ])

    {{-- Add your Testimonial content here --}}
@endsection
