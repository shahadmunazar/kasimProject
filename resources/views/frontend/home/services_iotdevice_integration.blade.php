@extends('frontend.layouts.main')

@section('meta_title', 'Our Services')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'Services',
        'breadcrumb' => ['Pages', 'Software Iot Device Integration']
    ])
    
@endsection
