@extends('layouts.contact')
@section('content')
    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <!-- <i class="bi bi-list mobile-nav-toggle d-lg-none"></i> -->
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
        @include('FrontPages.Header.navigation')
    </header><!-- End Header -->
    @include('FrontPages.Header.hero')
    <main id="main">
        @include('FrontPages.Main.about')
        {{-- @include('FrontPages.Main.facts') --}}
        @include('FrontPages.Main.areaofexpertise')
        @include('FrontPages.Main.skills')
        @include('FrontPages.Main.resume')
        {{-- @include('FrontPages.Main.portfolio') --}}
        @include('FrontPages.Main.services')
        {{-- @include('FrontPages.Main.testimonials') --}}
        {{-- @include('FrontPages.Main.contact') --}}
        @include('livewire.contact-form-controller')
    </main><!-- End #main -->
    @include('FrontPages.Footer.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
@endsection
