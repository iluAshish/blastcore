@extends('web.layouts.main')

@section('content')

    <!-- banner section starts here  -->
    <section class="bannerAllpages">
        <div class="bannerbackgroundBG">
            <img src="{{asset('web/images/about/banner.jpg')}}" alt="banner image">
        </div>
        <div class="container">
            <div class="row bannerserviceContent">
                <div class="bannerserviceontentLeft">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><img
                                        src="{{asset('web/images/breadcrumb.svg')}}" alt="">
                                    HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ABOUT US</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h1>ABOUT US</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    <!-- about us section starts here  -->
    <section class="aboutUs aboutusInner">
        <section class="aboutBg">
            <div class="aboutBgimage">
                <picture>
                    @if($about->second_webp_image)
                        <source type="image/webp"
                                srcset="{{ asset('uploads/about/about_us/second_webp_image/' .rawurlencode($about->second_webp_image)) }}">
                    @endif
                    <img
                        src="{{ $about->second_image ? asset('uploads/about/about_us/second_image/'.$about->second_image) : 'default image'}}"
                        class="lazy loaded" data-ll-status="loaded"
                        alt="{{ $about->second_image_meta_tag }}">
                </picture>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 aboutusLeft order-lg-1 order-md-1 order-2">
                        <div class="aboutusLeftContent">
                            <h2>{{ $about->title }}</h2>
                            <h6>{{ $about->sub_title }}</h6>
                            <p>{!! $about->first_description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 aboutusRight order-lg-2 order-md-2 order-1">
                        <picture>
                            @if($about->first_webp_image)
                                <source type="image/webp"
                                        srcset="{{ asset('uploads/about/about_us/first_webp_image/' .rawurlencode($about->first_webp_image)) }}">
                            @endif
                            <img
                                src="{{ $about->first_image ? asset('uploads/about/about_us/first_image/'.$about->first_image) : 'default image'}}"
                                class="lazy loaded" data-ll-status="loaded"
                                alt="{{ $about->first_image_meta_tag }}">
                        </picture>
                        <ul>
                            <li>
                                <div class="counterContent">
                                    <h3 class="counting" data-count="{{ $homeAboutHighlight->first_number }}"></h3>
                                    <p>{{ $homeAboutHighlight->first_title }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="counterContent">
                                    <h3 class="counting" data-count="{{ $homeAboutHighlight->second_number }}">
                                        {{ $homeAboutHighlight->second_number }}+</h3>
                                    <p>{{ $homeAboutHighlight->second_title }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="counterContent">
                                    <h3 class="counting" data-count="{{ $homeAboutHighlight->third_number }}">
                                        {{ $homeAboutHighlight->third_number }}+</h3>
                                    <p>{{ $homeAboutHighlight->third_title }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aboutusCenter">
                            <p>{!! $about->second_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- about us section ends here  -->

    <!-- why choose us section starts here  -->
    <section class="whyChoose">
        <div class="whychooseimgRight">
            <div class="whychooseimgRightImage">
                <picture>
                    @if($about->webp_video_thumbnail_image)
                        <source type="image/webp"
                                srcset="{{ asset('uploads/about/about_us/webp_video_thumbnail_image/' .rawurlencode($about->webp_video_thumbnail_image)) }}">
                    @endif
                    <img
                        src="{{ $about->video_thumbnail_image ? asset('uploads/about/about_us/video_thumbnail_image/'.$about->video_thumbnail_image) : 'default image'}}"
                        class="lazy loaded" data-ll-status="loaded"
                        alt="{{ $about->video_thumbnail_image_meta_tag }}">
                </picture>
                <a href="{{ $about->video_url }}" data-fancybox="group">
                    <button type="button" class="videoPopup">
                        <img src="{{asset('web/images/svg/videobutton.svg')}}"
                             alt="">
                    </button>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if($whyChooseUs->isNotEmpty())
                    <div class="col-md-6 whychooseLeft">
                        <h2>WHY CHOOSE US ?</h2>
                        <div class="row counterChooseus">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($whyChooseUs as $item)
                                        <div
                                            class="col-lg-4 col-md-6 col-6 spaceBottom {{($loop->iteration%2 ==0)?'':'offset-lg-1'}}">
                                            <div class="card">
                                                <div class="circle_percent" data-percent="{{ $item->number }}">
                                                    <div class="circle_inner">
                                                        <div class="round_per"></div>
                                                    </div>
                                                </div>
                                                <h5>{{ $item->title }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12 mobileWhychoosee">
                    <div class="whychooseimgRightImage">
                        <picture>
                            @if($about->webp_video_thumbnail_image)
                                <source type="image/webp"
                                        srcset="{{ asset('uploads/about/about_us/webp_video_thumbnail_image/' .rawurlencode($about->webp_video_thumbnail_image)) }}">
                            @endif
                            <img
                                src="{{ $about->video_thumbnail_image ? asset('uploads/about/about_us/video_thumbnail_image/'.$about->video_thumbnail_image) : 'default image'}}"
                                class="lazy loaded" data-ll-status="loaded"
                                alt="{{ $about->video_thumbnail_image_meta_tag }}">
                        </picture>
                        <a href="{{ $about->video_url }}" data-fancybox="group">
                            <button type="button" class="videoPopup">
                                <img src="{{asset('web/images/svg/videobutton.svg')}}"
                                     alt="">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why choose us section ends here  -->

    <!-- our vision & mission section starts here  -->
    <section class="ourVisionandMission">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-12 ourVisionandMissionLeft">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                            <img src="{{asset('web/images/about/ourvision.svg')}}" alt=""
                                 class="rotateBtn">{{ $about->vision_title }}
                        </button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                            <img src="{{asset('web/images/about/ourmission.svg')}}" alt=""
                                 class="rotateBtn">{{ $about->mission_title }}
                        </button>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 ourVisionandMissionRight">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <img src="{{asset('web/images/about/ourvision.jpg')}}" alt="">
                            <p> {!! $about->vision_description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <img src="{{asset('web/images/about/ourvision.jpg')}}" alt="">
                            <p>{!! $about->mission_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our vision & mission section ends here  -->

    @if($ourBrand->title)
        <!-- our brand section starts here  -->
        <section class="ourBrand">
            <div class="ourbrandimageRight">
                <img src="{{ asset('uploads/about/our_brand/image/' .$ourBrand->image) }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 ourbrandLeft">
                        <h2 class="ourbrandHead">OUR BRAND</h2>

                        <div class="row ourbrandContent">
                            <div class="col-lg-3 col-md-4">
                                <h2>{{ $ourBrand->title }}</h2>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <p>{!! $ourBrand->small_description !!}</p>
                                <a href="{{ url('/'.$ourBrand->button_url) }}">
                                    <button class="secondary_button">{{ $ourBrand->button_text }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ourbrandRight">
                        <img src="{{ asset('uploads/about/our_brand/image/' .$ourBrand->image) }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="ourbrandbottomContent">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ourbrandbottomContentLeft">
                        <p>{!! $ourBrand->large_description !!}</p>
                    </div>
                    @if($brandHighlightList->isNotEmpty())
                        <div class="col-md-6 ourbrandbottomContentRight">
                            <ul>
                                @foreach($brandHighlightList as $brandHighlight)
                                    <li><h5>{{ $brandHighlight->title }}</h5></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- our brand section ends here  -->
    @endif

    @include('web.includes.service_slider_small')
@endsection
