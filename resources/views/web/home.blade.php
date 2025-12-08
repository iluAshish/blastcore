@extends('web.layouts.main')

@section('content')
<section class="banner position-relative">
    <!-- Image banner -->
    <div class="image-banner">
        <div class="banner-slider">
            <!-- Slide 1 (LCP - no lazy) -->
            <a data-bs-toggle="modal" href="#siteEnquiryForm" role="button" class="banner-slider-item" aria-label="Open enquiry form">
                <picture>
                    <!-- Desktop -->
                    <source media="(min-width: 768px)" srcset="{{asset('web/images/banner.jpg')}}" />
                    <!-- Mobile -->
                    <source media="(max-width: 767px)" srcset="{{asset('web/images/mobile-banner.jpg')}}" />
                    <!-- Fallback -->
                    <img
                        src="{{asset('web/images/banner.jpg')}}"
                        width="1440"
                        height="813"
                        class="img-fluid w-100"
                        alt="Jetblast International Equipment banner"
                    >
                </picture>
            </a>

            <!-- Slide 2 -->
            <a data-bs-toggle="modal" href="#siteEnquiryForm" role="button" class="banner-slider-item" aria-label="Open enquiry form">
                <picture>
                    <source media="(min-width: 768px)" srcset="{{asset('web/images/banner.jpg')}}" />
                    <source media="(max-width: 767px)" srcset="{{asset('web/images/mobile-banner.jpg')}}" />
                    <img
                        loading="lazy"
                        src="{{asset('web/images/banner.jpg')}}"
                        width="1440"
                        height="813"
                        class="img-fluid w-100"
                        alt="Jetblast International Equipment banner"
                    >
                </picture>
            </a>

            <!-- Slide 3 -->
            <a data-bs-toggle="modal" href="#siteEnquiryForm" role="button" class="banner-slider-item" aria-label="Open enquiry form">
                <picture>
                    <source media="(min-width: 768px)" srcset="{{asset('web/images/banner.jpg')}}" />
                    <source media="(max-width: 767px)" srcset="{{asset('web/images/mobile-banner.jpg')}}" />
                    <img
                        loading="lazy"
                        src="{{asset('web/images/banner.jpg')}}"
                        width="1440"
                        height="813"
                        class="img-fluid w-100"
                        alt="Jetblast International Equipment banner"
                    >
                </picture>
            </a>
        </div>
    </div>

    <!-- Google Review -->
    <div class="google-review d-flex align-items-center" aria-label="Google reviews rating">
        <div class="image position-relative">
            <img loading="lazy" src="{{asset('web/images/review/1.png')}}" width="50" height="50" alt="Customer review avatar 1">
            <img loading="lazy" src="{{asset('web/images/review/2.png')}}" width="50" height="50" alt="Customer review avatar 2">
        </div>
        <div class="google-review-details d-flex flex-wrap">
            <div class="d-flex">
                <span>5.5</span>
                <div
                    id="star-rating"
                    data-rating="5"
                    class="my-rating-readonly d-flex align-items-center"
                    aria-label="5 out of 5 stars"
                ></div>
            </div>
            <p>Google Reviews</p>
        </div>
    </div>

    <!-- Social Links -->
    @include('web.includes._social-links')
</section>



<!-- Clients -->
@include('web.includes._clients')

<!-- Image slider -->
<section class="image-slider overflow-hidden">
    <div class="container-image-slider">
        <div class="image-slider-init">
            @for ($i = 1; $i <= 7; $i++)
                <picture>
                    <img
                        loading="lazy"
                        src="{{ asset('web/images/image/' . $i . '.jpg') }}"
                        class="img-fluid"
                        width="317"
                        height="251"
                        alt="Project image {{ $i }}"
                    >
                </picture>
            @endfor
        </div>
    </div>
</section>


<!-- Services -->
@include('web.includes._services')
<!-- About -->
@include('web.includes._about')


<!-- Mission & Vision -->
@include('web.includes._mission-vision')

<!-- Highlights -->
@include('web.includes._highlights')

<!-- Products -->
@include('web.includes._products')

<!-- Why Choose Us -->
@include('web.includes._why-choose-us')

<!-- Testimonials -->
@include('web.includes._testimonials')
<!-- Blog -->
@include('web.includes._blog')

@endsection