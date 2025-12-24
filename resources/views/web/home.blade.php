@extends('web.layouts.main')

@section('content')
<section class="banner position-relative">
    <!-- Image banner -->
    <div class="image-banner">
        <div class="banner-slider">
            @foreach($homeBanners as $banner)
            <!-- Slide 1 (LCP - no lazy) -->
            <a data-bs-toggle="modal" href="#siteEnquiryForm" role="button" class="banner-slider-item" aria-label="Open enquiry form">
                <picture>
                    <!-- Desktop -->
                    <source media="(min-width: 768px)" srcset="{{asset('uploads/home/slider/'.$banner->image)}}" />
                    <!-- Mobile -->
                    <source media="(max-width: 767px)" srcset="{{asset('uploads/home/slider/'. $banner->mobile_image)}}" />
                    <!-- Fallback -->
                    <img
                        src="{{asset('uploads/home/slider/'.$banner->image)}}"
                        width="1440"
                        height="813"
                        class="img-fluid w-100"
                        alt="Jetblast International Equipment banner"
                    >
                </picture>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Google Review -->
    @if(!empty($siteInformation->google_review))
    <div class="google-review d-flex align-items-center" aria-label="Google reviews rating">
        <div class="image position-relative">
            <img loading="lazy" src="{{asset('web/images/review/1.png')}}" width="50" height="50" alt="Customer review avatar 1">
            <img loading="lazy" src="{{asset('web/images/review/2.png')}}" width="50" height="50" alt="Customer review avatar 2">
        </div>
        <div class="google-review-details d-flex flex-wrap">
            <div class="d-flex">
                <span>{{$siteInformation->google_review ?? 5}}</span>
                <div
                    id="star-rating"
                    data-rating="{{$siteInformation->google_review ?? 5}}"
                    class="my-rating-readonly d-flex align-items-center"
                    aria-label="5 out of 5 stars"
                ></div>
            </div>
            <p>Google Reviews</p>
        </div>
    </div>
    @endif

    <!-- Social Links -->
    @include('web.includes._social-links')
</section>



<!-- Clients -->
@include('web.includes._clients', ['clients' => $clients])

<!-- Image slider -->
 @if(isset($galleryImages) && $galleryImages->count() > 0)
    <section class="image-slider overflow-hidden">
        <div class="container-image-slider">
            <div class="image-slider-init">
                @foreach($galleryImages as $gallery)
                    <div class="image-slider-item">
                        <picture>
                            <img
                                loading="lazy"
                                src="{{ asset('uploads/home/gallery/' . $gallery->image) }}"
                                class="img-fluid"
                                width="317"
                                height="251"
                                alt="Project image {{ $loop->iteration }}"
                            >
                        </picture>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


<!-- Services -->
@include('web.includes._services',['services' => $services])
<!-- About -->
@include('web.includes._about', ['homeAbout' => $homeAbout])


<!-- Mission & Vision -->
@include('web.includes._mission-vision',['homeAbout' => $homeAbout])

<!-- Highlights -->
@include('web.includes._highlights',['homeAboutHighlight' => $homeAboutHighlight] )

<!-- Products -->
@include('web.includes._products',['featured_products' => $featured_products])

<!-- Why Choose Us -->
@include('web.includes._why-choose-us', ['whyChooseUs' => $whyChooseUs])

<!-- Testimonials -->
@include('web.includes._testimonials', ['testimonials' => $testimonials])
<!-- Blog -->
@include('web.includes._blog', ['blogs' => $blogs])

@endsection