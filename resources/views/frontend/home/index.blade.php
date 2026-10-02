@extends('frontend.layouts.main')
@section('meta_title', 'TC Smart Technology | Home - Advanced Industrial & Software Solutions')
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
