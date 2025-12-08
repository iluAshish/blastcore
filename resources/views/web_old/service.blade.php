@extends('web.layouts.main')

@section('content')

    <!-- banner section starts here  -->
    <section class="bannerAllpages">
        <div class="bannerbackgroundBG">
            <img src="{{asset('web/images/services/banner.jpg')}}" alt="banner image">
        </div>
        <div class="container">
            <div class="row bannerserviceContent">
                <div class="bannerserviceontentLeft">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><img
                                        src="{{asset('web/images/breadcrumb.svg')}}" alt="">
                                    HOME</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">SERVICE</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h1>SERVICES</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    <!-- single services section starts here  -->
    <section class="servicesContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 servicescontentLeft">
                    <div class="row">
                        <div class="col-md-12 overlay_service">
                            <div class="servicescontentLeftImage">
                                <picture>
                                    @if($service->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/service/webp/'.rawurlencode($service->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $service->image ? asset('uploads/service/'.$service->image) : 'default image'}}"
                                        class="lazy loaded" data-ll-status="loaded"
                                        alt="{{ $service->image_meta_tag }}">
                                </picture>
                                <h3 class="textImage">{{ $service->title }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 servicescontentRight">
                    <p>{!! $service->home_description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- single services section starts here  -->


    <!-- brochure section starts here  -->
    <section class="brochureServices">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{!! $service->first_description !!}</p>
                    <h5>{{ $service->second_title }}</h5>
                    <p>{!! $service->second_description !!}</p>
                    @if($service->brochure || $siteInformation->service_brochure)
                        <a href="{{ $service->brochure ? asset('uploads/service/brochure/'. $service->brochure) : asset('uploads/site/service_brochure/'. $siteInformation->service_brochure) }}"
                           target="_blank">
                            <button class="primary_button">DOWNLOAD BROCHURE</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- brochure section ends here  -->

    <!-- enquiry section starts here  -->
    <section class="enquiryServices">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 enquiryServicesLeft">
                    <div class="enquiryServices_slider">
                        @if($service->activeGalleries->isNOtEmpty())
                            @foreach($service->activeGalleries as $gallery)
                                <div class="enquiryServices_card">
                                    <p class="imglist">
                                        @if($gallery->video_url)
                                            <a href="{{ $gallery->video_url }}" data-fancybox="group">
                                                <picture>
                                                    @if($gallery->webp_image)
                                                        <source type="image/webp"
                                                                srcset="{{ asset('uploads/service/gallery/webp/' . $service->id . '/'.rawurlencode($gallery->webp_image)) }}">
                                                    @endif
                                                    <img
                                                        src="{{ $gallery->image ? asset('uploads/service/gallery/' . $service->id . '/'.$gallery->image) : 'default image'}}"
                                                        class="lazy loaded" data-ll-status="loaded"
                                                        alt="{{ $gallery->image_meta_tag }}">
                                                </picture>
                                                <button type="button" class="videoPopup bounce"><img
                                                        src="{{asset('web/images/svg/videobutton.svg')}}" alt="">
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ asset('uploads/service/gallery/' . $service->id . '/'.$gallery->image) }}"
                                               data-fancybox="group">
                                                <picture>
                                                    @if($gallery->webp_image)
                                                        <source type="image/webp"
                                                                srcset="{{ asset('uploads/service/gallery/webp/' . $service->id . '/'.rawurlencode($gallery->webp_image)) }}">
                                                    @endif
                                                    <img
                                                        src="{{ $gallery->image ? asset('uploads/service/gallery/' . $service->id . '/'.$gallery->image) : 'default image'}}"
                                                        class="lazy loaded" data-ll-status="loaded"
                                                        alt="{{ $gallery->image_meta_tag }}">
                                                </picture>
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div class="OnlyTextRight">
                                <h2>HOW CAN WE HELP YOU?</h2>
                                <h6>LET'S DO GREAT WORK TOGETHER.</h6>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 enquiryForm">
                    <form action="#" id="serviceEnquiryForm">
                        <h5>Quick Enquiry.</h5>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formName.svg')}}" alt="">
                            <input class="form-control required" type="text" name="name" id="name" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formPhone.svg')}}" alt="">
                            <input class="form-control required" type="text" name="phone" id="phone"
                                   placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formMail.svg')}}" alt="">
                            <input class="form-control required" type="text" name="email" id="email"
                                   placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formMessage.svg')}}" alt="">
                            <textarea class="form-control required" name="message" id="message" rows="3"
                                      placeholder="Message*"></textarea>
                        </div>
                        <input type="hidden" name="service_id" id="service_id" class="required"
                               value="{{ $service->id }}">
                        <button type="submit" class="primary_button" data-url="/service/enquiry" id="contact_form_btn">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- enquiry section ends here  -->

    @if($otherServices->isNotEmpty())
        <!-- service section starts here      -->
        <section class="servicesWhatwedo">
            <div class="container">
                <div class="row what_we_do_section">
                    <div class="col-md-4">
                        <h6 class="smallHeading">Services</h6>
                        <h2>OTHER <br>SERVICES</h2>
                    </div>
                    <!-- what_we_do_slider -->
                    <div class="col-md-8">
                        <div class="slider what_we_do_slider">
                            @foreach($otherServices as $otherService)
                                <div class="servicesIcons">
                                    <picture>
                                        @if($otherService->icon_webp_image)
                                            <source type="image/webp"
                                                    srcset="{{ asset('uploads/service/icon/webp/'.rawurlencode($otherService->icon_webp_image)) }}">
                                        @endif
                                        <img
                                            src="{{ $otherService->icon_image ? asset('uploads/service/icon/'.$otherService->icon_image) : 'default image'}}"
                                            class="lazy loaded" data-ll-status="loaded"
                                            alt="{{ $otherService->icon_image_meta_tag }}">
                                    </picture>
                                    <h6>{{ $otherService->title }}</h6>
                                    <div class="mobileOnlyLink">
                                        <a href="{{ url('services/'.$otherService->short_url) }}">View Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service section ends here  -->
    @endif
@endsection
