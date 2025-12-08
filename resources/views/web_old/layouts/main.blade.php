<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{!! isset($meta_data)?$meta_data->meta_title:'' !!}">
    <meta name="description" content="{!! isset($meta_data)?$meta_data->meta_description:'' !!}"/>
    <meta name="keywords" content="{!! isset($meta_data)?$meta_data->meta_keyword:'' !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name') }} - {!! isset($meta_data)?$meta_data->meta_title:'' !!}</title>
    {!! isset($meta_data)?$meta_data->other_meta_tag:'' !!}
    {!! isset($extra_meta_data)?$extra_meta_data->header_tag:'' !!}
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/style.min.css')}}">
       @if (!Request::is('/'))
    <link rel="stylesheet" href="{{asset('web/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert-overrides.css')}}">
    @endif

    <!--<style>header .dropdownnProducts .dropdownnproductsRight .brandsLog .brandsLogo{padding:0!important;} ul.results{z-index:3!important;}ul.results li, ul.results li a{height:90px!important}ul.results li .row { align-items: center; }</style>-->

    @yield('styles')
</head>
<body>
{!! isset($extra_meta_data)?$extra_meta_data->body_tag:'' !!}
<!-- top header starts  -->
<section class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-6">
                <ul>
                    <li><a href="mailto:{{ $siteInformation->email }}">
                            <img src="{{asset('web/images/svg/mail.svg')}}" alt="mailIcon" class="svg" width="19" height="16" loading='lazy'>
                            <span>{{ $siteInformation->email }}</span></a></li>
                    <li><a href="tel:{{ $siteInformation->phone_number }}">
                            <img src="{{asset('web/images/svg/call.svg')}}" alt="callIcon" class="svg" width="19" height="20" loading='lazy'>
                            <span>{{ $siteInformation->phone_number }}</span></a></li>
                    <li><a href="{{ url('https://wa.me/'.$siteInformation->whatsapp_number) }}" target="_blank">
                            <img src="{{asset('web/images/svg/whatsapp.svg')}}" alt="whatsappIcon" class="svg" width="18" height="17" loading='lazy'>
                            <span>{{ $siteInformation->whatsapp_number }}</span></a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-4 col-6 d-flex justify-content-end">
                <ul class="working_time">
                    <li><img src="{{asset('web/images/svg/clock.svg')}}" alt="clockIcon" width="18" height="18" loading='lazy'>{{ $contacts[0]->working_hours }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- top header ends  -->

<!-- header starts here  -->
<header>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <picture>
                        @if($siteInformation->webp_logo)
                            <source type="image/webp"
                                    srcset="{{ asset('uploads/site/logo/webp/'.rawurlencode($siteInformation->webp_logo)) }}">
                        @endif
                        <img
                            src="{{ $siteInformation->logo ? asset('uploads/site/logo/'.$siteInformation->logo) : 'default image'}}"
                            class="logo_img lazy loaded" data-ll-status="loaded"
                            alt="{{ $siteInformation->logo_meta_tag }}" width="350" height="75">
                    </picture>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mobileContentnav" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/')?'active':'' }}" aria-current="page"
                               href="{{ url('/') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about')?'active':'' }}" href="{{ url('about')}}">ABOUT
                                US</a>
                        </li>
                        <!-- mobile only  -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ (Request::segment(1)=='service')?'active':'' }}"
                               href="{{ url('service')}}" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                SERVICES
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($service_menus as $service_menu)
                                    <li><a class="dropdown-item"
                                           href="{{ url('services/'.$service_menu->short_url)}}">
                                            {{ $service_menu->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- mobile only  -->
                        <li id="link-1" class="nav-item dropdown-hover dropdownnService">
                            <a class="nav-link dropdown-hover-button {{ (Request::segment(1)=='service')?'active':'' }}"
                               href="#">SERVICES<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown-hover-content">
                                <!-- <div class="row"> -->
                                <div class="row mb-3">
                                    @foreach($service_menus as $service_menu)
                                        <div class="col-md-3">
                                            <a href="{{ url('services/'.$service_menu->short_url)}}">
                                                <div class="servicedropImage">
                                                    <picture>
                                                        @if($service_menu->webp_image)
                                                            <source type="image/webp"
                                                                    srcset="{{ url('uploads/service/webp/'.rawurlencode($service_menu->webp_image)) }}" >
                                                        @endif
                                                        <img
                                                            src="{{ $service_menu->image ? asset('uploads/service/'.$service_menu->image) : 'default image'}}" 
                                                            class="lazy loaded img-fluid" data-ll-status="loaded"
                                                            alt="{{ $service_menu->image_meta_tag }}" width="251" height="50" loading='lazy'>
                                                    </picture>
                                                    <div class="iconService">
                                                        <div>
                                                            <picture>
                                                                @if($service_menu->icon_webp_image)
                                                                    <source type="image/webp"
                                                                            srcset="{{ asset('uploads/service/icon/webp/'.rawurlencode($service_menu->icon_webp_image)) }}">
                                                                @endif
                                                                <img
                                                                    src="{{ $service_menu->icon_image ? asset('uploads/service/icon/'.$service_menu->icon_image) : 'default image'}}"
                                                                    class="lazy loaded img-fluid" data-ll-status="loaded"
                                                                    alt="{{ $service_menu->icon_image_meta_tag }}" width="60" height="60" loading='lazy'>
                                                            <div class="h6">{{ $service_menu->title }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>

                        <!-- mobile only  -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ (Request::segment(1)=='product' || Request::segment(1)=='products')?'active':'' }}"
                               href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                PRODUCTS
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="dropdownproductCategories">
                                    <ul>
                                        <div class="h5">CATEGORIES</div>
                                        @foreach($main_product_categories as $main_product_category)
                                            <li><a class="dropdown-item"
                                                   href="{{ url('product-category/'.$main_product_category->short_url) }}">
                                                    {{ $main_product_category->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                                <div class="dropdownproductFeatured">
                                    <ul>
                                        <div class="h5">FEATURED PRODUCTS</div>
                                        @foreach($featured_products->take(6) as $featured_product)
                                            <a href="{{ url('shop/'. $featured_product->category->short_url.'/'. $featured_product->short_url)}}">
                                                <div class="row dropdownFeaturerow">
                                                    <div class="col-md-4 col-4 productslatestLogoLeft">
                                                        @if($featured_product->activeFirstImage)
                                                            <picture>
                                                                @if($featured_product->activeFirstImage->webp_image)
                                                                    <source type="image/webp"
                                                                            srcset="{{ asset('uploads/product/image/webp/' . $featured_product->id . '/'.rawurlencode($featured_product->activeFirstImage->webp_image)) }}">
                                                                @endif
                                                                <img
                                                                    src="{{ $featured_product->activeFirstImage->image ? asset('uploads/product/image/' . $featured_product->id . '/'.$featured_product->activeFirstImage->image) : 'default image'}}"
                                                                    class="card-img-top lazy loaded img-fluid"
                                                                    data-ll-status="loaded"
                                                                    alt="{{ $featured_product->activeFirstImage->image_meta_tag }}" width="72" height="56" loading='lazy'>
                                                            </picture> 
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8 col-8 productslatestLogoRight">
                                                        <p class="card-text">Brand :
                                                            <span>{{ $featured_product->brand->title }}</span></p>
                                                        <div class="card-title h6">{{ $featured_product->title }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-12 buttonFeature">
                                                <a href="{{ url('products')}}">VIEW MORE</a>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                <br>
                                <div class="dropdownproductBrands">
                                    <ul>
                                        <div class="h5">BRANDS</div>
                                        <div class="row">
                                            @foreach($productBrands as $productBrand)
                                                <div class="col-4">
                                                    <a href="{{ url('product-brand/'.$productBrand->short_url) }}">
                                                        <picture>
                                                            @if($productBrand->webp_image)
                                                                <source type="image/webp"
                                                                        srcset="{{ asset('uploads/product/brand/webp/'.rawurlencode($productBrand->webp_image)) }}">
                                                            @endif
                                                            <img
                                                                src="{{ $productBrand->image ? asset('uploads/product/brand/'.$productBrand->image) : 'default image'}}"
                                                                class="lazy loaded img-fluid" data-ll-status="loaded"
                                                                alt="{{ $productBrand->image_meta_tag }}" width="63" height="62" loading='lazy'>
                                                        </picture>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </ul>
                                </div>

                            </ul>
                        </li>
                        <!-- mobile only  -->

                        <li id="link-1" class="nav-item dropdown-hover dropdownnProducts">
                            <a class="nav-link dropdown-hover-button {{ (Request::segment(1)=='product' || Request::segment(1)=='products')?'active':'' }}"
                               href="#">PRODUCTS</a>
                            <div class="dropdown-hover-content">
                                <div class="row">
                                    @if($main_product_categories->isNotEmpty())
                                        <div class="col-lg-3 dropdownnproductsLeft">
                                            <div class="h5">CATEGORIES</div>
                                            <ul>
                                                @foreach($main_product_categories as $main_product_category)
                                                    <li>
                                                        <a href="{{ url('product-category/'.$main_product_category->short_url) }}">
                                                            {{ $main_product_category->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    @endif
                                    <div class="col-lg-4 dropdownnproductsCenter">
                                        <form action="#" id="megaMenuSearch">
                                            <div class="form-group mb-4">
                                                <input id="productSearch" type="text"
                                                       placeholder="Search here ..."
                                                       class="form-control form-control-underlined search-input">
                                                <button><img src="{{asset('web/images/svg/productsearch.svg')}}"
                                                             alt="" width="19" height="19" class="img-fluid" loading='lazy'>
                                                </button>
                                                <ul class="results" id="searchResults"></ul>
                                            </div>
                                        </form>

                                        @if($featured_products->isNotEmpty())
                                            <div class="h5">Featured Products</div>
                                            <div class="row">
                                                @foreach($featured_products->take(6) as $featured_product)
                                                    <div class="col-md-6">
                                                        <div class="productslatestLogo productslatestLogonoborder">
                                                            <a href="{{ url('shop/'. $featured_product->category->short_url.'/'. $featured_product->short_url)}}">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-md-4 col-4 productslatestLogoLeft">
                                                                        @if($featured_product->activeFirstImage)
                                                                            <picture>
                                                                                @if($featured_product->activeFirstImage->webp_image)
                                                                                    <source type="image/webp"
                                                                                            srcset="{{ asset('uploads/product/image/webp/' . $featured_product->id . '/'.rawurlencode($featured_product->activeFirstImage->webp_image)) }}">
                                                                                @endif
                                                                                <img
                                                                                    src="{{ $featured_product->activeFirstImage->image ? asset('uploads/product/image/' . $featured_product->id . '/'.$featured_product->activeFirstImage->image) : 'default image'}}"
                                                                                    class="card-img-top lazy loaded img-fluid"
                                                                                    data-ll-status="loaded"
                                                                                    alt="{{ $featured_product->activeFirstImage->image_meta_tag }}" width="72" height="56" loading='lazy'>
                                                                            </picture>
                                                                        @endif
                                                                    </div>
                                                                    <div
                                                                        class="col-md-8 col-8 productslatestLogoRight">
                                                                        <p class="card-text">Brand :
                                                                            <span>{{ $featured_product->brand->title }}</span>
                                                                        </p>
                                                                        <div class="card-title h6">{{ $featured_product->title }}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <a href="{{ url('products')}}" class="ViewMoreButtonArrow">VIEW
                                                    MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>

                                    @if($productBrands->isNotEmpty())
                                        <div class="col-lg-3 dropdownnproductsRight">
                                            <div class="row brandsLog">
                                                <div class="col-md-12">
                                                    <div class="h5">BRANDS</div>
                                                </div>
                                                <div class="row">
                                                    @foreach($productBrands as $productBrand)
                                                        <div class="col-md-3">
                                                            <div class="brandsLogo">
                                                                <a href="{{ url('product-brand/'.$productBrand->short_url) }}">
                                                                    <picture>
                                                                        @if($productBrand->webp_image)
                                                                            <source type="image/webp"
                                                                                    srcset="{{ asset('uploads/product/brand/webp/'.rawurlencode($productBrand->webp_image)) }}">
                                                                        @endif
                                                                        <img
                                                                            src="{{ $productBrand->image ? asset('uploads/product/brand/'.$productBrand->image) : 'default image'}}"
                                                                            class="lazy loaded img-fluid"
                                                                            data-ll-status="loaded"
                                                                            alt="{{ $productBrand->image_meta_tag }}" width="57" height="56" loading='lazy'>
                                                                    </picture>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ (Request::segment(1)=='blogs' || Request::segment(1)=='blog')?'active':'' }}"
                               href="{{ url('blogs')}}">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::segment(1)=='contact')?'active':'' }}"
                               href="{{ url('contact')}}">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link" >
                                <button class="primary_button bounceheaderbtn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">GET A QUOTE
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
</header>
<!-- header ends here  -->

<!-- fixed sidebar starts here  -->
<div class="sideRightBar">
    <div class="AnimeRightSideBar rightCall">
        <img src="{{ asset('web/images/svg/callFixed.svg') }}" alt="" width="19" height="19" class="img-fluid" loading='lazy'>
        <a href="tel:{{ $siteInformation->phone_number }}" target="_blank">CALL US</a>
    </div>
    <div class="AnimeRightSideBar rightWhatsapp">
        <img src="{{ asset('web/images/svg/whatsappFixed.svg') }}" alt="" width="18" height="17" class="img-fluid" loading='lazy'>
        <a href="{{ url('https://wa.me/'.$siteInformation->whatsapp_number) }}" target="_blank">WHATSAPP US</a>
    </div>
    <div class="AnimeRightSideBar rightMail">
        <img src="{{ asset('web/images/svg/mailFixed.svg') }}" alt="" width="19" height="16" class="img-fluid" loading='lazy'>
        <a href="mailto:{{ $siteInformation->email }}" target="_blank">MAIL US</a>
    </div>
</div>
<!-- fixed sidebar ends here  -->

@yield('content')

<!-- footer starts here  -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="footerLeft">
                    <div class="row">
                        <div class="col-lg-12 logoFooter">
                            <picture>
                                @if($siteInformation->webp_logo)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/site/logo/webp/'.rawurlencode($siteInformation->webp_logo)) }}">
                                @endif
                                <img
                                    src="{{ $siteInformation->logo ? asset('uploads/site/logo/'.$siteInformation->logo) : 'default image'}}"
                                    class="footerLogo lazy loaded" data-ll-status="loaded"
                                    alt="{{ $siteInformation->logo_meta_tag }}" width="380" height="81" loading='lazy'>
                            </picture>
                        </div>
                    </div>
                    <div class="h5_styled mt-5">CONTACT</div>
                    <div class="row pt-3">
                        @foreach($contacts as $contact)
                            <div class="col-lg-{{ ($contacts->count() == 1)?12:6 }} col-md-12 contactInfo">
                                <div class="h5">{{ $contact->map_title }}</div>
                                <ul>
                                    <li><a href="{{ url('contact#contactMap') }}"><img src="{{asset('web/images/svg/location.svg')}}" alt="" width="18" height="22" class="img-fluid" loading='lazy'>
                                            <div class="h6">{!! $contact->address !!}</div></a></li>
                                    <li><a href="mailto:{{ $contact->email }}"><img
                                                src="{{asset('web/images/svg/mailFooter.svg')}}" alt=""  width="22" height="22" class="img-fluid" loading='lazy'>
                                            <div class="h6">{{ $contact->email }}</div></a></li>
                                    <li><a href="tel:{{ $contact->phone_number }}"><img
                                                src="{{asset('web/images/svg/callFooter.svg')}}"
                                                alt=""  width="15" height="19" class="img-fluid" loading='lazy'><div class="h6">{{ $contact->phone_number }}</div></a></li>
                                </ul>
                            </div>
                        @endforeach
                        <div class="col-lg-12 socialMediaIcons">
                            <ul>
                                <li><a href="{{ $siteInformation->facebook_url }}" target="_blank"><img loading='lazy'
                                            src="{{asset('web/images/svg/facebookFooter.svg')}}" alt="Facebook" width="29" height="29"></a>
                                </li>
                                <li><a href="{{ $siteInformation->instagram_url }}" target="_blank"><img loading='lazy'
                                            src="{{asset('web/images/svg/instagramfooter.svg')}}" alt="Facebook" width="29" height="29"></a>
                                </li>
                                <li><a href="{{ $siteInformation->youtube_url }}" target="_blank"><img loading='lazy'
                                            src="{{asset('web/images/svg/youtubeFooter.svg')}}" alt="Youtube" width="29" height="29"></a>
                                </li>
                                <li><a href="{{ $siteInformation->linkedin_url }}" target="_blank"><img loading='lazy'
                                            src="{{asset('web/images/svg/linkedinFooter.svg')}}" alt="Linkedin" width="29" height="29"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 footerRightPd">
                <div class="footerRight">
                    <div class="footerHead">
                        <div class="h5">NEWSLETTER</div>
                        <p>Subscribe to our newsletter.</p>
                    </div>
                    <form action="#">
                        <input type="email" placeholder="Enter your Email ...." name="email" id="newsletter_email">
                        <button class="secondary_button" id="newsletter_subscription">SUBSCRIBE</button>
                    </form>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="h5_styled">Quick Links</div>
                            <ul>
                                <li><a href="{{ url('about') }}">About Company</a></li>
                                <li><a href="{{ url('products') }}">All Products</a></li>
                                <li><a href="{{ url('blogs') }}">Blogs</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        @if($footer_service_menus->isNotEmpty())
                            <div class="col-md-6 col-6">
                                <div class="h5_styled">SERVICES</div>
                                <ul>
                                    @foreach($footer_service_menus as $service_menu)
                                        <li>
                                            <a href="{{ url('services/'.$service_menu->short_url) }}">
                                                {{ $service_menu->title }}</a>
                                        </li>
                                        @if($loop->last)
                                            <div class="appendServiceHere6"></div>
                                        @endif
                                    @endforeach
                                </ul>
                                <input type="hidden" id="service_limit" value="5">
                                <input type="hidden" id="service_offset" value="6">
                                <input type="hidden" id="serviceCount" value="{{$service_menus->count()}}">
                                <button type="button" class="secondary_button View_nibin_button"
                                        id="view_more_footer_service">
                                    LOAD MORE
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</footer>

<!-- footer ends here  -->

<!-- bottom footer starts here  -->

<section class="bottomFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>All Rights Reserved By <span>{{ config('app.name') }}</span> - {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- bottom footer ends here  -->


<!-- products enquiry form model  -->
<div class="modal fade modalproductEnquiry" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="productEnquiryModalForm">
                    <h3>Quick Enquiry.</h3>
                    <div class="form-group">
                        <input class="form-control required" type="text" name="name" id="name" placeholder="Name*">
                    </div>
                    <div class="form-group">
                        <input class="form-control required" type="text" name="phone" id="phone" placeholder="Phone*">
                    </div>
                    <div class="form-group">
                        <input class="form-control required" type="text" name="email" id="email" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control required" name="message" id="message" rows="3"
                                  placeholder="Message*"></textarea>
                    </div>
                    <input type="hidden" name="product_id" id="productId" class="required"
                           value="">
                    <button type="submit" class="primary_button" data-url="/product/enquiry" id="contact_form_btn">
                        SUBMIT
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- products enquiry form model  -->

<!-- modal full screen for get a quote button starts here  -->
<div class="modal fade modalgetaquote" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-5 modalgetaquoteLeft">
                            <div class="h5_styled">CONTACT</div>
                            <div class="row">
                                @foreach($contacts as $contact)
                                    <div class="col-md-12 contactInfo">
                                        <ul class="contactinfoborder">
                                            <li><a href="#"><img src="{{asset('web/images/svg/location.svg')}}" alt=""  width="18" height="22" class="img-fluid" loading='lazy'>
                                                    <div class="h6">{!! $contact->address !!}</div></a></li>
                                            <li><a href="mailto:{{ $contact->email }}"><img
                                                        src="{{asset('web/images/svg/mailFooter.svg')}}" alt=""  width="22" height="22" class="img-fluid" loading='lazy'>
                                                    <div class="h6">{{ $contact->email }}</div></a></li>
                                            <li><a href="tel:{{ $contact->phone_number }}"><img
                                                        src="{{asset('web/images/svg/callFooter.svg')}}" alt=""  width="15" height="19" class="img-fluid" loading='lazy'>
                                                    <div class="h6">{{ $contact->phone_number }}</div></a></li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2"></div>
                        <div class="col-lg-2 col-md-4 modalgetaquoteCenter">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Get A Quote.</h3>
                                    <p>Fill up the form and Our Team will get back to you within 24 Hours</p>
                                </div>
                            </div>
                            <div class="row buttonsQuote">
                                <div class="col-md-12">
                                    <a href="{{ url('about') }}">
                                        <button class="primary_button">ABOUT US</button>
                                    </a>
                                    <div class="socialMediaIcons">
                                        <ul>
                                            <li><a href="{{ $siteInformation->facebook_url }}"><img
                                                        src="{{asset('web/images/svg/facebookFooter.svg')}}"
                                                        alt="facebook"  width="29" height="29" class="img-fluid" loading='lazy'></a></li>
                                            <li><a href="{{ $siteInformation->instagram_url }}"><img
                                                        src="{{asset('web/images/svg/instagramfooter.svg')}}"
                                                        alt="instagram"  width="29" height="29" class="img-fluid" loading='lazy'></a></li>
                                            <li><a href="{{ $siteInformation->youtube_url }}"><img
                                                        src="{{asset('web/images/svg/youtubeFooter.svg')}}"
                                                        alt="youtube"  width="29" height="29" class="img-fluid" loading='lazy'></a></li>
                                            <li><a href="{{ $siteInformation->linkedin_url }}"><img
                                                        src="{{asset('web/images/svg/linkedinFooter.svg')}}"
                                                        alt="linkedin"  width="29" height="29" class="img-fluid" loading='lazy'></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-5 col-md-12 modalgetaquoteRight">
                            <form action="#" id="getAQuoteForm">
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formName.svg')}}" alt="User"  width="20" height="20" class="img-fluid" loading='lazy'>
                                    <input class="form-control required" type="text" name="name" id="name"
                                           placeholder="Name*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formPhone.svg')}}" alt="Phone" width="20" height="20" class="img-fluid" loading='lazy'>
                                    <input class="form-control required" type="text" name="phone" id="phone"
                                           placeholder="Phone*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formMail.svg')}}" alt="Mail" width="20" height="20" class="img-fluid" loading='lazy'>
                                    <input class="form-control required" type="text" name="email" id="email"
                                           placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formMessage.svg')}}" alt="Message" width="20" height="20" class="img-fluid" loading='lazy'>
                                    <textarea class="form-control required" name="message" id="message" rows="3"
                                              placeholder="Message*"></textarea>
                                </div>
                                <button type="submit" class="secondary_button" data-url="/contact"
                                        id="contact_form_btn">CONTACT NOW
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<!-- modal full screen for get a quote button ends here  -->

{!! isset($extra_meta_data)?$extra_meta_data->footer_tag:'' !!}
<script src="{{asset('web/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('web/js/slick.min.js')}}"></script>
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
   @if (!Request::is('/'))
<script src="{{asset('web/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('app/js/sweetalert.min.js')}}"></script>
<script src="{{asset('app/js/sweetalert-init.js')}}"></script>

    @endif
<script src="{{asset('web/js/main.min.js')}}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var token = "{{ csrf_token() }}";
</script>
<script src="{{asset('web/js/scripts.min.js')}}"></script>
@yield('scripts')
</body>
</html>
