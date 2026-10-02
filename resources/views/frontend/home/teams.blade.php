@extends('frontend.layouts.main')

@section('meta_title', 'Our Team')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Our Team',
        'breadcrumb' => ['Pages', 'Our Team']
    ])

    {{-- Add your Team content here --}}
@endsection
