@extends('web.layouts.main')

@section('content')

    @if($homeBanners->isNotEmpty())
        <!-- banner section starts here  -->
        <section class="banner">
            <section class="banner_slider">

                @foreach($homeBanners as $homeBanner)
                    <div class="banner_slide_single">
                        <div class="banner_slide_singlebgImage">
                            <picture>
                                @if($homeBanner->webp_image)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/home/slider/webp/' .rawurlencode($homeBanner->webp_image))}}">
                                @endif
                                <img 
                                    src="{{ $homeBanner->image ? asset('uploads/home/slider/' .$homeBanner->image) : 'default image'}}"
                                    class="lazy loaded img-fluid" data-ll-status="loaded"
                                    alt="{{ $homeBanner->image_meta_tag }}" width="1905" height="614"      fetchpriority="high" >
                            </picture>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-6">
                                    <div class="banner_slide_content">
                                        <div class="h1">{{ $homeBanner->title }}<br> <span>{{ $homeBanner->sub_title }}</span></div>
                                        <p>{{ $homeBanner->tag_line }}</p>
                                        <a href="{{ $homeBanner->button_url }}">
                                            <button class="primary_button">{{ $homeBanner->button_text }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            <section class="slideDots">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-dots-box"></div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <div class="mouse_trigger"><a href="#" aria-label="scroll bottom"> <img loading='lazy'  src="{{asset('web/images/svg/mouse_trigger.svg')}}" alt="" width="14" height="22" class="img-fluid"> </a>
        </div>
        <!-- banner section ends here  -->
    @endif

    @if($homeAbout)
        <!-- about us section starts here  -->
        <section class="aboutUs aboutusInner" id="aboutUsSection">
            <section class="aboutBg">
                <div class="aboutBgimage">
                    <picture>
                        @if($homeAbout->second_webp_image)
                            <source type="image/webp"
                                    srcset="{{ asset('uploads/home_about/second_webp_image/' .rawurlencode($homeAbout->second_webp_image)) }}">
                        @endif
                        <img loading='lazy' 
                            src="{{ $homeAbout->second_image ? asset('uploads/home_about/second_image/'.$homeAbout->second_image) : 'default image'}}"
                            class="lazy loaded img-fluid" data-ll-status="loaded"
                            alt="{{ $homeAbout->second_image_meta_tag }}" width="1905" height="532">
                    </picture>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 aboutusLeft order-lg-1 order-md-1 order-2">
                            <div class="aboutusLeftContent">
                                <div class="smallHeading">About us</div>
                                <h1 class="h2">{{ $homeAbout->title }}</h1>
                                <div class="h6">{{ $homeAbout->sub_title }}</div>
                                <p>{!! $homeAbout->first_description !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 aboutusRight order-lg-2 order-md-2 order-1">
                            <picture>
                                @if($homeAbout->first_webp_image)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/home_about/first_webp_image/' .rawurlencode($homeAbout->first_webp_image)) }}">
                                @endif
                                <img loading='lazy' 
                                    src="{{ $homeAbout->first_image ? asset('uploads/home_about/first_image/'.$homeAbout->first_image) : 'default image'}}"
                                    class="lazy loaded img-fluid" data-ll-status="loaded"
                                    alt="{{ $homeAbout->first_image_meta_tag }}" width="1728" height="620">
                            </picture>
                            <ul class="animate__fadeInLeft">
                                <li>
                                    <div class="counterContent">

                                    <div class="counting h3" data-count="{{ $homeAboutHighlight->first_number }}"></div>
                                    <p>{{ $homeAboutHighlight->first_title }}</p>
                                     </div>
                                </li>
                                <li>
                                                                        <div class="counterContent">

                                    <div class="counting h3" data-count="{{ $homeAboutHighlight->second_number }}"></div>
                                    <p>{{ $homeAboutHighlight->second_title }}</p>
                                     </div>
                                </li>
                                <li>
                                                                        <div class="counterContent">

                                    <div class="counting h3" data-count="{{ $homeAboutHighlight->third_number }}"></div>
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
                                <p>{!! $homeAbout->second_description !!}</p>
                                <a href="{{ url('/'.$homeAbout->button_url) }}">
                                    <button class="primary_button">{{ $homeAbout->button_text }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- about us section ends here  -->
    @endif

    @include('web.includes.service_slider_large')

    @include('web.includes.popular_products_section')

    @include('web.includes.latest_news_section')

    @include('web.includes.clients_list_section')

    @include('web.includes.how_can_we_help_section')
@endsection
