@extends('frontend.layouts.main')
@section('meta_title', 'TC Smart Technology | Home - Advanced Industrial & Software Solutions')
@section('meta_description', 'TC Smart Technology is a premier technology solutions provider specializing in Embedded Systems, Industrial Automation, Robotics, HVAC Systems, and Custom Software Development.')
@section('meta_keywords', 'TC Smart Technology, Embedded Systems, Industrial Automation, Robotics, HVAC System Solutions, Software Development, IoT Solutions, Delhi NCR')
@section('content')
    @include('frontend.home.allHomepages.crousels')
    @include('frontend.home.allHomepages.about')
    @include('frontend.home.allHomepages.shortsfeatures')
    @include('frontend.home.allHomepages.Features')
    @include('frontend.home.allHomepages.appointment') <br>
    {{-- @include('frontend.home.allHomepages.teams') --}}
    {{-- @include('frontend.home.allHomepages.Service') --}}
    {{-- @include('frontend.home.allHomepages.testimonial') --}}
    @include('frontend.home.allHomepages.Newsletter')
@endsection
