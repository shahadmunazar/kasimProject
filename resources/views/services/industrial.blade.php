@extends('frontend.layouts.main')

@section('meta_title', 'Industrial Standard Machine')

@section('content')
    @include('frontend.layouts.page-header', [
        'title' => 'HVAC System Solutions',
        'breadcrumb' => ['Services', 'Industrial Standard Machine']
    ])


<div class="container">
    <h1>Industrial Standard Machine</h1>
    <p>This is the page for Industrial Standard Machine services.</p>
</div>


        @endsection
