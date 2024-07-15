@extends('layouts.landing.app')


@section('content')
    <!-- Hero Section -->
    @include('layouts.landing.hero')

    <!-- About Section -->
    
    {{-- @include('layouts.landing.about') --}}

    <!-- Stats Section -->
    {{-- @include('layouts.landing.stat') --}}
    

    <!-- Services Section -->
    @include('layouts.landing.service')
    

    <!-- Appointment Section -->
    @include('layouts.landing.data')
    <!-- Contact Section -->
@endsection