@extends('frontend.layouts.main')

@section('meta_title', 'Our Services | Industrial Automation, Embedded & Software Solutions')

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
