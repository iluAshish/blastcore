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

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('web/images/fav.png')}}" type="image/png" />
    <link rel="apple-touch-icon" sizes="128x128" href="{{asset('web/images/fav.png')}}" />

    <!-- Libraries -->
    <link rel="stylesheet" href="{{asset('web/css/lib/slick-full.css')}}" />
    <link rel="stylesheet" href="{{asset('web/css/lib/bootstrap.min.css')}}" />
    <!-- <link rel="stylesheet" href="public/css/lib/jquery.fancybox.min.css" /> -->

    <!-- Tel Input -->
    <!-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" /> -->

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
        rel="stylesheet" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('web/scss/style.css')}}" />

    @if (!Request::is('/'))
    <link rel="stylesheet" href="{{asset('web/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert-overrides.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('app/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/sweetalert-overrides.css')}}">

    <!--<style>header .dropdownnProducts .dropdownnproductsRight .brandsLog .brandsLogo{padding:0!important;} ul.results{z-index:3!important;}ul.results li, ul.results li a{height:90px!important}ul.results li .row { align-items: center; }</style>-->

    @yield('styles')
</head>
<body>

{!! isset($extra_meta_data)?$extra_meta_data->body_tag:'' !!}
<header id="header">
    <div class="container-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <!-- Left: Contact -->
            <div class="header-left">
                <div class="header-contact">
                    <a href="tel:{{$siteInformation->phone_number}}">
                        <i>
                            <!-- phone svg -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2.48303 0.793297C3.70003 -0.416703 5.70403 -0.201703 6.72303 1.1603L7.98503 2.8443C8.81503 3.9523 8.74103 5.5003 7.75603 6.4793L7.51803 6.7173C7.49104 6.81721 7.4883 6.92211 7.51003 7.0233C7.57303 7.4313 7.91403 8.2953 9.34203 9.7153C10.77 11.1353 11.64 11.4753 12.054 11.5393C12.1583 11.5603 12.2661 11.5572 12.369 11.5303L12.777 11.1243C13.653 10.2543 14.997 10.0913 16.081 10.6803L17.991 11.7203C19.628 12.6083 20.041 14.8323 18.701 16.1653L17.28 17.5773C16.832 18.0223 16.23 18.3933 15.496 18.4623C13.686 18.6313 9.46903 18.4153 5.03603 14.0083C0.899027 9.8943 0.105027 6.3063 0.00402701 4.5383C-0.045973 3.6443 0.376027 2.8883 0.914027 2.3543L2.48303 0.793297ZM5.52303 2.0593C5.01603 1.3823 4.07203 1.3283 3.54003 1.8573L1.97003 3.4173C1.64003 3.7453 1.48203 4.1073 1.50203 4.4533C1.58203 5.8583 2.22203 9.0953 6.09403 12.9453C10.156 16.9833 13.907 17.1043 15.357 16.9683C15.653 16.9413 15.947 16.7873 16.222 16.5143L17.642 15.1013C18.22 14.5273 18.093 13.4813 17.275 13.0373L15.365 11.9983C14.837 11.7123 14.219 11.8063 13.835 12.1883L13.38 12.6413L12.85 12.1093C13.38 12.6413 13.379 12.6423 13.378 12.6423L13.377 12.6443L13.374 12.6473L13.367 12.6533L13.352 12.6673C13.3098 12.7065 13.2643 12.7419 13.216 12.7733C13.136 12.8263 13.03 12.8853 12.897 12.9343C12.627 13.0353 12.269 13.0893 11.827 13.0213C10.96 12.8883 9.81103 12.2973 8.28403 10.7793C6.75803 9.2613 6.16203 8.1193 6.02803 7.2533C5.95903 6.8113 6.01403 6.4533 6.11603 6.1833C6.17216 6.03137 6.25254 5.88953 6.35403 5.7633L6.38603 5.7283L6.40003 5.7133L6.40603 5.7073L6.40903 5.7043L6.41103 5.7023L6.69903 5.4163C7.12703 4.9893 7.18703 4.2823 6.78403 3.7433L5.52303 2.0593Z" fill="white"></path> </svg>
                        </i>
                       {{$siteInformation->phone_number}}
                    </a>

                    <a href="mailto:{{$siteInformation->email}}">
                        <i>
                            <!-- email svg -->
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none"> <path d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H3C2.46957 15 1.96086 14.7893 1.58579 14.4142C1.21071 14.0391 1 13.5304 1 13V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M1 3.00001L10 9.00001L19 3.00001" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                        </i>
                        {{$siteInformation->email}}
                    </a>
                </div>
            </div>

            <!-- Center: Logo -->
            <a href="{{ route('index') }}" class="brand">
                <img src="{{asset('uploads/site/logo/'.$siteInformation->logo)}}" width="250" height="84" alt="Blast Core"
                     loading="lazy" class="img-fluid" />
            </a>

            <!-- Right: Buttons -->
            <div class="header-right">
                <div class="header-button">

                    <!-- Quote Button -->
                    <button class="btn theme-btn theme-bg"
                            data-bs-toggle="modal"
                            data-bs-target="#siteEnquiryForm">
                        Get A Quote
                    </button>

                    <!-- Mobile Menu Button -->
                    <button class="navbar-toggler"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#burgerMenu"
                            aria-label="Open Navigation Menu">

                        <svg width="21" height="15" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1.5H19.5M1.5 7.5H19.5M1.5 13.5H19.5"
                                  stroke="white" stroke-width="3" stroke-linecap="round" />
                        </svg>

                    </button>

                </div>
            </div>

        </div>
    </div>
</header>

@yield('content')
<footer role="contentinfo">
    <div class="footer-site-info">
        <div class="container-ctn">
            <div class="d-flex flex-wrap justify-content-between">
                <!-- About -->
                <div class="about-footer">
                    <a href="index.php">
                        <picture>
                            <img src="{{asset('web/images/footer-logo.png')}}"
                                 alt="Jetblast International Equipment LLC"
                                 width="120"
                                 height="41"
                                 class="img-fluid">
                        </picture>
                    </a>
                    <p>
                        JETBLAST International Equipment LLC delivers on its promise – tangible, real results
                        every time we work in partnership with our customers. Whether it is integrated manufacturing
                        or customized designing, we ensure a level of certainty of results that no other firm can match.
                    </p>
                </div>

                <!-- Quick links -->
                <nav class="quick-link" aria-label="Quick links">
                    <span>Quick Links</span>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('services')}}">Services</a></li>
                        <li><a href="{{ route('products')}}">Products</a></li>
                        <li><a href="{{ route('blogs') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </nav>

                <!-- Services -->
                <nav class="quick-link" aria-label="Services">
                    <span>Services</span>
                    <ul>
                        @foreach($services as $service)
                        <li><a href="{{ route('serviceDetail', ['short_url' => $service->short_url]) }}">{{ $service->title }}</a></li>
                        @endforeach

                    </ul>
                </nav>

                <!-- Featured products -->
                <nav class="quick-link" aria-label="Featured products">
                    <span>Featured Products</span>
                    <ul>
                        @foreach($featured_products as $featured_product)
                        <li>
                            <a href="{{ route('productDetail', ['short_url' => $featured_product->short_url, 'category'=>$featured_product->category->short_url]) }}">
                                {{ $featured_product->title }}
                        </a>
                                
                        </li>
                        @endforeach
                        
                        <li><a href="{{route('products')}}" class="view-btn">View More</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Contact details -->
    <div class="footer-contact-details">
        <div class="container-ctn">
            <div class="d-flex flex-wrap justify-content-between">

                <!-- Head office -->
                @if($contactsFooter->count() > 0)
                    @foreach($contactsFooter as $contact)
                    <address class="address">
                        <span>Address {{ $loop->iteration }}</span>
                        <a href="https://maps.google.com/?q=119+Al+Hilal+Bank+Building+Al+Nahda+St+Al+Qusais+Dubai+UAE"
                        class="location"
                        target="_blank"
                        rel="noopener">
                            <i aria-hidden="true">
                                <!-- Location icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12 2C7.6 2 4 5.6 4 10C4 15.4 11 21.5 11.3 21.8C11.5 21.9 11.8 22 12 22C12.2 22 12.5 21.9 12.7 21.8C13 21.5 20 15.4 20 10C20 5.6 16.4 2 12 2ZM12 19.7C9.9 17.7 6 13.4 6 10C6 6.7 8.7 4 12 4C15.3 4 18 6.7 18 10C18 13.3 14.1 17.7 12 19.7ZM12 6C9.8 6 8 7.8 8 10C8 12.2 9.8 14 12 14C14.2 14 16 12.2 16 10C16 7.8 14.2 6 12 6ZM12 12C10.9 12 10 11.1 10 10C10 8.9 10.9 8 12 8C13.1 8 14 8.9 14 10C14 11.1 13.1 12 12 12Z"
                                        fill="white"/>
                                </svg>
                            </i>
                            {!! $contact->address !!}
                        </a>

                        <a href="mailto:{{$contact->email}}" class="mail">
                            <i aria-hidden="true">
                                <!-- Mail icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16"
                                    viewBox="0 0 20 16" fill="none">
                                    <path
                                        d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H3C2.46957 15 1.96086 14.7893 1.58579 14.4142C1.21071 14.0391 1 13.5304 1 13V3Z"
                                        stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 3L10 9L19 3"
                                        stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </i>
                            <p>{{$contact->email}}</p>
                        </a>

                        <a href="tel:{{$contact->phone_number}}" class="phone">
                            <i aria-hidden="true">
                                <!-- Phone icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.73303 2.0433C6.95003 0.833297 8.95403 1.0483 9.97303 2.4103L11.235 4.0943C12.065 5.2023 11.991 6.7503 11.006 7.7293L10.768 7.9673C10.741 8.06721 10.7383 8.17211 10.76 8.2733C10.823 8.6813 11.164 9.5453 12.592 10.9653C14.02 12.3853 14.89 12.7253 15.304 12.7893C15.4083 12.8103 15.5161 12.8072 15.619 12.7803L16.027 12.3743C16.903 11.5043 18.247 11.3413 19.331 11.9303L21.241 12.9703C22.878 13.8583 23.291 16.0823 21.951 17.4153L20.53 18.8273C20.082 19.2723 19.48 19.6433 18.746 19.7123C16.936 19.8813 12.719 19.6653 8.28603 15.2583C4.14903 11.1443 3.35503 7.5563 3.25403 5.7883C3.20403 4.8943 3.62603 4.1383 4.16403 3.6043L5.73303 2.0433Z"
                                        fill="white"/>
                                </svg>
                            </i>
                            <p>{{$contact->phone_number}}</p>
                        </a>
                    </address>

                    @endforeach
                
                @endif

                <!-- Newsletter -->
                <div class="news-letter">
                    <div class="text">
                        Subscribe for the Exclusive Updates!
                    </div>
                    <form action="#">
                        <div class="form-group d-flex position-relative">
                            <label for="footer-email" class="visually-hidden">Email address</label>
                            <input
                                class="is-valid"
                                name="email" 
                                id="newsletter_email"
                                type="email"
                                placeholder="Enter Your Email Address"
                                required>
                                   
                            <button type="submit" id="newsletter_subscription">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path
                                        d="M22.4675 1.35575L6.10976 14.9877M9.96347 18.8586L13.6972 22.5786C13.9265 22.8136 14.2132 22.9847 14.5289 23.0749C14.8446 23.1651 15.1783 23.1713 15.4972 23.0929C15.8177 23.018 16.1136 22.8621 16.3565 22.6399C16.5993 22.4178 16.781 22.1369 16.884 21.8243L23.0143 3.44717C23.1435 3.1028 23.1709 2.72853 23.0932 2.36903C23.0155 2.00952 22.8359 1.67998 22.576 1.41972C22.3161 1.15946 21.9868 0.979476 21.6274 0.90126C21.268 0.823043 20.8937 0.849893 20.5492 0.978604L2.17204 7.1106C1.84869 7.22098 1.56066 7.41565 1.33765 7.67451C1.11465 7.93337 0.96477 8.24705 0.90347 8.58317C0.840485 8.88916 0.854507 9.206 0.944274 9.50522C1.03404 9.80444 1.19674 10.0767 1.41776 10.2975L6.10976 14.9895L5.95547 20.9312L9.96347 18.8586Z"
                                        stroke="white" stroke-width="1.71429"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Subscribe</span>
                            </button>
                        </div>
                        <div class="terms-wrapper d-flex align-items-center">
                            <input type="checkbox" name="privacy" id="privacy" required>
                            <label for="privacy">
                                I agree to the <a href="{{route('privacy')}}">Privacy Policy</a>
                            </label>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="copyrights">
        <div class="container-ctn">
            <div class="d-flex align-items-center justify-content-center justify-content-md-between copyrights-row flex-wrap">
                <div class="d-flex align-items-center flex-wrap">
                    <p>
                        Copyright © 2025 Blast Core LLC.
                        All Rights Reserved. Design by :
                        <a href="https://mightywarner.ae" target="_blank" rel="noopener">Mighty Warners</a>
                    </p>
                    <ul class="d-flex">
                        <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>

                <ul class="social d-flex align-items-center flex-wrap" aria-label="Social media">
                    @if($siteInformation->facebook_url)
                    <li>
                        <a href="{{ $siteInformation->facebook_url }}" target="_blank" class="Facebook" aria-label="Facebook">
                            <!-- Facebook SVG -->
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.238 1.538C5.22244 0.553396 6.55768 0.000164749 7.95 0L10.65 0C10.8489 0 11.0397 0.0790175 11.1803 0.21967C11.321 0.360322 11.4 0.551088 11.4 0.75V4.35C11.4 4.54891 11.321 4.73968 11.1803 4.88033C11.0397 5.02098 10.8489 5.1 10.65 5.1H7.95C7.9303 5.1 7.9108 5.10388 7.8926 5.11142C7.8744 5.11896 7.85786 5.13 7.84393 5.14393C7.83 5.15786 7.81896 5.1744 7.81142 5.1926C7.80388 5.2108 7.8 5.2303 7.8 5.25V7.2H10.65C10.764 7.19994 10.8766 7.22587 10.979 7.27583C11.0815 7.32579 11.1713 7.39846 11.2415 7.48832C11.3117 7.57817 11.3604 7.68285 11.3841 7.79439C11.4078 7.90593 11.4057 8.02139 11.378 8.132L10.478 11.732C10.4374 11.8943 10.3437 12.0384 10.2118 12.1413C10.0799 12.2442 9.91731 12.3001 9.75 12.3H7.8V18.75C7.8 18.9489 7.72098 19.1397 7.58033 19.2803C7.43968 19.421 7.24891 19.5 7.05 19.5H3.45C3.25109 19.5 3.06032 19.421 2.91967 19.2803C2.77902 19.1397 2.7 18.9489 2.7 18.75V12.3H0.75C0.551088 12.3 0.360322 12.221 0.21967 12.0803C0.0790175 11.9397 0 11.7489 0 11.55L0 7.95C0 7.85151 0.0193993 7.75398 0.0570903 7.66299C0.0947813 7.57199 0.150026 7.48931 0.21967 7.41967C0.289314 7.35003 0.371993 7.29478 0.462987 7.25709C0.553982 7.2194 0.651509 7.2 0.75 7.2H2.7V5.25C2.70016 3.85768 3.2534 2.52244 4.238 1.538ZM7.95 1.5C6.95544 1.5 6.00161 1.89509 5.29835 2.59835C4.59509 3.30161 4.2 4.25544 4.2 5.25V7.95C4.2 8.14891 4.12098 8.33968 3.98033 8.48033C3.83968 8.62098 3.64891 8.7 3.45 8.7H1.5V10.8H3.45C3.64891 10.8 3.83968 10.879 3.98033 11.0197C4.12098 11.1603 4.2 11.3511 4.2 11.55V18H6.3V11.55C6.3 11.3511 6.37902 11.1603 6.51967 11.0197C6.66032 10.879 6.85109 10.8 7.05 10.8H9.164L9.689 8.7H7.05C6.85109 8.7 6.66032 8.62098 6.51967 8.48033C6.37902 8.33968 6.3 8.14891 6.3 7.95V5.25C6.3 4.81239 6.47384 4.39271 6.78327 4.08327C7.09271 3.77384 7.51239 3.6 7.95 3.6H9.9V1.5H7.95Z" fill="white"></path> </svg>
                        </a>
                    </li>
                    @endif
                    @if($siteInformation->instagram_url)
                    <li>
                        <a href="{{$siteInformation->instagram_url}}" target="_blank" class="instagram" aria-label="Instagram">
                            <!-- Instagram SVG -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M11 15C13.2091 15 15 13.2091 15 11C15 8.79086 13.2091 7 11 7C8.79086 7 7 8.79086 7 11C7 13.2091 8.79086 15 11 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16 1H6C3.23858 1 1 3.23858 1 6V16C1 18.7614 3.23858 21 6 21H16C18.7614 21 21 18.7614 21 16V6C21 3.23858 18.7614 1 16 1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                    @endif
                    @if($siteInformation->linkedin_url)
                    <li>
                        <a href="{{$siteInformation->linkedin_url}}" target="_blank" class="linkedin" aria-label="LinkedIn">
                            <!-- LinkedIn SVG -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6.12698 3.02942C6.13163 3.6222 5.90278 4.19298 5.48991 4.61836C5.07705 5.04374 4.51334 5.28952 3.92069 5.30256C3.32928 5.28108 2.76874 5.03318 2.35492 4.61012C1.94111 4.18705 1.70567 3.62116 1.69727 3.02942C1.72282 2.45274 1.96682 1.90739 2.37974 1.50402C2.79266 1.10065 3.34358 0.86948 3.92069 0.857422C4.49611 0.869711 5.04507 1.10146 5.45522 1.50523C5.86536 1.90901 6.10568 2.45427 6.12698 3.02942ZM1.93555 9.34142C1.93555 8.03514 2.76698 8.23914 3.92069 8.23914C5.07441 8.23914 5.88869 8.03514 5.88869 9.34142V22.0683C5.88869 23.3917 5.05727 23.1209 3.92069 23.1209C2.78412 23.1209 1.93555 23.3917 1.93555 22.0683V9.34142ZM9.31727 9.34314C9.31727 8.61285 9.58812 8.34028 10.0116 8.25628C10.435 8.17228 11.8973 8.25628 12.4047 8.25628C12.9138 8.25628 13.1178 9.08771 13.1007 9.71514C13.5367 9.13142 14.1148 8.66901 14.7801 8.37194C15.4454 8.07487 16.1756 7.95302 16.9013 8.01799C17.614 7.97448 18.3279 8.08136 18.9966 8.3317C19.6653 8.58203 20.2739 8.97023 20.7828 9.47107C21.2917 9.97191 21.6896 10.5742 21.9506 11.2388C22.2116 11.9034 22.3299 12.6155 22.2978 13.3289V22.0169C22.2978 23.3403 21.4836 23.0694 20.3281 23.0694C19.1727 23.0694 18.3601 23.3403 18.3601 22.0169V15.23C18.39 14.8807 18.3444 14.5292 18.2263 14.1991C18.1083 13.8691 17.9206 13.5683 17.676 13.3172C17.4315 13.0661 17.1357 12.8706 16.8089 12.7439C16.482 12.6173 16.1317 12.5624 15.7818 12.5831C15.4333 12.574 15.0868 12.639 14.7652 12.7739C14.4437 12.9088 14.1545 13.1105 13.9169 13.3657C13.6793 13.6208 13.4986 13.9236 13.3868 14.2538C13.2751 14.5841 13.2348 14.9344 13.2687 15.2814V22.0683C13.2687 23.3917 12.4373 23.1209 11.2836 23.1209C10.1298 23.1209 9.31555 23.3917 9.31555 22.0683L9.31727 9.34314Z" stroke="white" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                        </a>
                    </li>
                    @endif
                    @if($siteInformation->twitter_url)
                    <li>
                        <a href="{{$siteInformation->twitter_url}}" target="_blank" class="twitter" aria-label="Twitter">
                            <!-- Twitter SVG -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0221 3.34248C15.5301 3.25548 16.0991 3.22648 16.6351 3.31748C17.5899 3.47875 18.4745 3.92211 19.1751 4.59048C19.6311 4.60048 20.0801 4.51048 20.4771 4.38248C20.8607 4.25703 21.229 4.08898 21.5751 3.88148L21.5841 3.87548C21.7281 3.77953 21.9009 3.73633 22.0731 3.7532C22.2453 3.77007 22.4064 3.84596 22.529 3.96802C22.6517 4.09009 22.7284 4.2508 22.7461 4.42293C22.7638 4.59506 22.7214 4.76802 22.6261 4.91248C22.4191 5.22748 22.1301 5.78948 21.8071 6.41948L21.6521 6.72048C21.4671 7.08048 21.2771 7.44448 21.1001 7.75648C20.9891 7.95248 20.8701 8.15148 20.7501 8.32348V8.59748C20.7624 10.2361 20.4482 11.8608 19.8259 13.3767C19.2035 14.8926 18.2855 16.2694 17.1253 17.4267C15.9651 18.5839 14.5861 19.4986 13.0686 20.1171C11.5512 20.7357 9.92574 21.0459 8.28713 21.0295C5.91241 21.0328 3.58751 20.3486 1.59313 19.0595C1.44996 18.9675 1.34233 18.8295 1.28791 18.6683C1.2335 18.5071 1.23553 18.3321 1.29369 18.1722C1.35185 18.0123 1.46266 17.8769 1.60794 17.7882C1.75322 17.6996 1.92431 17.663 2.09313 17.6845C2.39313 17.7211 2.6948 17.7395 2.99813 17.7395C4.07876 17.7355 5.14578 17.4981 6.12613 17.0435C5.51203 16.7641 4.96282 16.3599 4.51347 15.8567C4.06412 15.3535 3.72446 14.7622 3.51613 14.1205C3.47643 13.9977 3.46911 13.8667 3.49486 13.7402C3.52061 13.6137 3.57857 13.496 3.66313 13.3985L3.67313 13.3885C3.16574 12.9363 2.75906 12.3825 2.47946 11.763C2.19986 11.1435 2.05359 10.4721 2.05013 9.79248V9.73948C2.05006 9.57483 2.10417 9.41474 2.20411 9.28389C2.30405 9.15305 2.44427 9.05873 2.60313 9.01548C2.26466 8.34012 2.08897 7.59491 2.09013 6.83948C2.08956 5.98265 2.31368 5.14065 2.74013 4.39748C2.80072 4.29198 2.88606 4.20281 2.98879 4.13764C3.09153 4.07248 3.20857 4.03329 3.32983 4.02345C3.45109 4.01361 3.57292 4.03341 3.68482 4.08115C3.79672 4.12889 3.89532 4.20313 3.97213 4.29748C5.72198 6.45163 8.22764 7.85717 10.9781 8.22748C10.9542 7.32766 11.1812 6.43895 11.6337 5.66081C12.0862 4.88267 12.7463 4.2458 13.5401 3.82148C13.9421 3.60748 14.4741 3.43648 15.0221 3.34248ZM3.74213 10.8905C3.93632 11.437 4.26907 11.9237 4.70782 12.3031C5.14657 12.6824 5.67629 12.9413 6.24513 13.0545C6.40902 13.0871 6.55731 13.1736 6.66647 13.3001C6.77563 13.4266 6.8394 13.586 6.84767 13.7529C6.85595 13.9198 6.80824 14.0847 6.71212 14.2214C6.61601 14.3581 6.47699 14.4588 6.31713 14.5075C6.04447 14.5901 5.76646 14.6478 5.48313 14.6805C5.79048 15.0767 6.18261 15.3991 6.63077 15.6241C7.07894 15.849 7.57177 15.9708 8.07313 15.9805C8.22779 15.9834 8.37776 16.0341 8.5025 16.1255C8.62724 16.217 8.72065 16.3448 8.76992 16.4914C8.8192 16.638 8.82193 16.7963 8.77775 16.9446C8.73357 17.0928 8.64464 17.2238 8.52313 17.3195C7.47985 18.1391 6.26827 18.7179 4.97513 19.0145C6.04592 19.3576 7.16372 19.5313 8.28813 19.5295H8.29713C9.73715 19.5445 11.1657 19.2725 12.4995 18.7293C13.8332 18.1861 15.0453 17.3825 16.065 16.3656C17.0847 15.3487 17.8915 14.1388 18.4384 12.8066C18.9853 11.4744 19.2612 10.0465 19.2501 8.60648V8.07148C19.25 7.88937 19.3161 7.71342 19.4361 7.57648C19.5061 7.49748 19.6261 7.31548 19.7961 7.01648C19.9561 6.73448 20.1341 6.39448 20.3191 6.03548L20.3521 5.96948C19.8298 6.08689 19.2919 6.11965 18.7591 6.06648C18.579 6.04686 18.412 5.96267 18.2891 5.82948C17.7862 5.28416 17.1166 4.92118 16.3851 4.79748C16.0163 4.74493 15.6413 4.75338 15.2751 4.82248C14.9182 4.87796 14.5717 4.98685 14.2471 5.14548C13.5928 5.49508 13.073 6.052 12.7693 6.72887C12.4656 7.40574 12.3952 8.16427 12.5691 8.88548C12.5965 8.99889 12.597 9.11711 12.5707 9.23077C12.5444 9.34442 12.4919 9.45036 12.4174 9.54016C12.3429 9.62997 12.2485 9.70116 12.1417 9.74809C12.0349 9.79502 11.9186 9.81638 11.8021 9.81048C8.72994 9.65412 5.82554 8.36142 3.65313 6.18348C3.61087 6.39992 3.58978 6.61995 3.59013 6.84048V6.84248C3.58901 7.39322 3.72409 7.9357 3.98336 8.42161C4.24262 8.90751 4.61802 9.32177 5.07613 9.62748C5.21066 9.71802 5.31222 9.84973 5.36558 10.0029C5.41895 10.156 5.42125 10.3223 5.37214 10.4768C5.32302 10.6314 5.22515 10.7658 5.09318 10.8601C4.9612 10.9543 4.80225 11.0032 4.64013 10.9995C4.33842 10.99 4.0382 10.9531 3.74313 10.8895" fill="white"></path> </svg>
                        </a>
                    </li>
                    @endif
                    @if($siteInformation->youtube_url)
                    <li>
                        <a href="{{$siteInformation->youtube_url}}" target="_blank" class="youtube" aria-label="YouTube">
                            <!-- YouTube SVG -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                                <path d="M12.75 7.84961L9.25 9.84961V5.84961L12.75 7.84961Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M0.75 8.558V7.142C0.75 4.247 0.75 2.799 1.655 1.868C2.561 0.936 3.987 0.896 6.838 0.815C8.188 0.777 9.568 0.75 10.75 0.75C11.932 0.75 13.311 0.777 14.662 0.815C17.513 0.896 18.939 0.936 19.844 1.868C20.749 2.8 20.75 4.248 20.75 7.142V8.557C20.75 11.453 20.75 12.9 19.845 13.832C18.939 14.763 17.514 14.804 14.662 14.884C13.312 14.923 11.932 14.95 10.75 14.95C9.568 14.95 8.189 14.923 6.838 14.884C3.987 14.804 2.561 14.764 1.655 13.832C0.749 12.9 0.75 11.452 0.75 8.558Z" stroke="white" stroke-width="1.5"></path> </svg>
                        </a>
                    </li>
                    @endif
                    @if($siteInformation->whatsapp_number)
                    <li>
                        <a href="https://wa.me/{{ $siteInformation->whatsapp_number }}" target="_blank" class="whatsappp" aria-label="WhatsApp">
                            <!-- WhatsApp SVG -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <mask id="mask0_552_469" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                    <path d="M0 0L24 0V24H0L0 0Z" fill="white"></path>
                                </mask>
                                <g mask="url(#mask0_552_469)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.415 14.382C17.117 14.233 15.656 13.515 15.384 13.415C15.112 13.315 14.914 13.267 14.715 13.565C14.517 13.862 13.948 14.531 13.775 14.729C13.601 14.928 13.428 14.952 13.131 14.804C12.834 14.654 11.876 14.341 10.741 13.329C9.858 12.541 9.261 11.568 9.088 11.27C8.915 10.973 9.069 10.812 9.218 10.664C9.352 10.531 9.515 10.317 9.664 10.144C9.813 9.97103 9.862 9.84603 9.961 9.64703C10.061 9.44903 10.011 9.27603 9.936 9.12703C9.862 8.97803 9.268 7.51503 9.02 6.92003C8.779 6.34103 8.534 6.42003 8.352 6.41003C8.178 6.40203 7.98 6.40003 7.782 6.40003C7.584 6.40003 7.262 6.47403 6.99 6.77203C6.717 7.06903 5.95 7.78803 5.95 9.25103C5.95 10.713 7.014 12.126 7.163 12.325C7.312 12.524 9.258 15.525 12.239 16.812C12.949 17.118 13.502 17.301 13.933 17.437C14.645 17.664 15.293 17.632 15.805 17.555C16.375 17.47 17.563 16.836 17.811 16.142C18.059 15.448 18.058 14.853 17.984 14.729C17.91 14.605 17.712 14.531 17.414 14.382M11.992 21.785H11.988C10.2174 21.7854 8.47937 21.3094 6.956 20.407L6.596 20.193L2.854 21.175L3.853 17.527L3.618 17.153C2.62809 15.5774 2.10424 13.7538 2.107 11.893C2.109 6.44303 6.543 2.00903 11.996 2.00903C13.2948 2.00509 14.5814 2.25934 15.781 2.75702C16.9807 3.2547 18.0694 3.98587 18.984 4.90803C19.9045 5.82433 20.6341 6.91412 21.1305 8.11431C21.6269 9.3145 21.8803 10.6012 21.876 11.9C21.874 17.35 17.44 21.785 11.992 21.785ZM20.404 3.48803C19.3021 2.3793 17.9913 1.50013 16.5474 0.901413C15.1035 0.302696 13.5551 -0.0036753 11.992 3.32698e-05C5.438 3.32698e-05 0.102 5.33503 0.1 11.892C0.096774 13.9788 0.644198 16.0295 1.687 17.837L0 24L6.304 22.346C8.04817 23.2954 10.0022 23.7932 11.988 23.794H11.993C18.547 23.794 23.883 18.459 23.885 11.901C23.8899 10.3383 23.5848 8.79011 22.9875 7.34603C22.3902 5.90196 21.5124 4.59067 20.405 3.48803" fill="white"></path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>


<!-- menu mobile -->
<div class="offcanvas offcanvas-end mobile_left_menu"
     tabindex="-1"
     id="burgerMenu"
     aria-labelledby="mobileOffcanvasLabel"
     aria-modal="true"
     role="dialog">
    <div class="offcanvas-header">
                    <h2 class="visually-hidden" id="mobileOffcanvasLabel">Mobile Menu</h2>

        <button type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path d="M1.8125 22.3203L22.3203 1.8125M22.3203 22.3203L1.8125 1.8125" stroke="#0E11A9"
                    stroke-width="3.625" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="offcanvas-body container-ctn">
        <nav aria-label="Mobile primary navigation">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li class="submenu">
                    <ul>
                        <li class="nav-item mobDropDown dropdown">
                            <a href="{{route('services')}}">Services</a>
                                <button class="dropdown-toggle-btn"
                                    type="button"
                                    id="servicesMenuMobile"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    aria-label="Toggle services submenu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M2.4548 7.93918C2.7361 7.65797 3.11756 7.5 3.5153 7.5C3.91305 7.5 4.29451 7.65797 4.5758 7.93918L12.0008 15.3642L19.4258 7.93918C19.7087 7.66594 20.0876 7.51475 20.4809 7.51817C20.8742 7.52159 21.2504 7.67934 21.5285 7.95745C21.8066 8.23556 21.9644 8.61178 21.9678 9.00508C21.9712 9.39837 21.82 9.77728 21.5468 10.0602L13.0613 18.5457C12.78 18.8269 12.3986 18.9849 12.0008 18.9849C11.6031 18.9849 11.2216 18.8269 10.9403 18.5457L2.4548 10.0602C2.1736 9.77889 2.01562 9.39743 2.01562 8.99968C2.01562 8.60193 2.1736 8.22047 2.4548 7.93918Z"
                                            fill="white" stroke="#1A25A5" stroke-width="0.75" />
                                    </svg>
                                </button>
                            <ul class="dropdown-menu " aria-labelledby="servicesMenuMobile" style="">
                                @foreach($service_menus as $service_menu)
                                <li>
                                    <a href="{{ route('serviceDetail', ['short_url' => $service_menu->short_url]) }}">{{$service_menu->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
             <li class="nav-item mobDropDown dropdown"> <a href="products.php">Products</a> <button class="show" type="button" id="productsMenuMobile" data-bs-toggle="dropdown"
                                aria-expanded="false"
                                aria-label="Toggle products submenu"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <path d="M2.4548 7.93918C2.7361 7.65797 3.11756 7.5 3.5153 7.5C3.91305 7.5 4.29451 7.65797 4.5758 7.93918L12.0008 15.3642L19.4258 7.93918C19.7087 7.66594 20.0876 7.51475 20.4809 7.51817C20.8742 7.52159 21.2504 7.67934 21.5285 7.95745C21.8066 8.23556 21.9644 8.61178 21.9678 9.00508C21.9712 9.39837 21.82 9.77728 21.5468 10.0602L13.0613 18.5457C12.78 18.8269 12.3986 18.9849 12.0008 18.9849C11.6031 18.9849 11.2216 18.8269 10.9403 18.5457L2.4548 10.0602C2.1736 9.77889 2.01562 9.39743 2.01562 8.99968C2.01562 8.60193 2.1736 8.22047 2.4548 7.93918Z" fill="white" stroke="#1A25A5" stroke-width="0.75" /> </svg> </button>
                            <div class="dropdown-menu show" aria-labelledby="productsMenuMobile">

                                <div class="d-flex flex-wrap ">
                                    <div class="menu-col">
                                        <strong>Categories</strong>
                                        <ul>
                                            @foreach($main_product_categories as $productCategory)
                                            <li>
                                                <a href="{{ route('productCategory',['short_url' => $productCategory->short_url])}}">{{$productCategory->title}}</a>
                                            </li>
                                            @endforeach
                                           
                                        </ul>
                                    </div>
                                    <div class="menu-col">
                                        <strong>Featured Products</strong>
                                        <ul>
                                            @foreach($featured_products as $product)
                                            <li>
                                                <a href="{{ route('productDetail', ['short_url' => $product->short_url, 'category' => $product->category->short_url]) }}">
                                                    {{ $product->title ?? '' }}
                                                </a>
                                            </li>

                                            @endforeach
                                        </ul>
                                        <strong>Brands</strong>

                                        <div class="brands d-flex flex-wrap">
                                            @foreach($productBrands as $productBrand)
                                            <a href="{{ route('productBrand', ['short_url' => $productBrand->short_url]) }}" class="brand">
                                                <picture>
                                                    @if($productBrand->webp_image)
                                                    <img loading="lazy"
                                                        src="{{asset('uploads/product/brand/webp/'.rawurlencode($productBrand->webp_image))}}"
                                                        width="57"
                                                        height="56"
                                                        class="img-fluid"
                                                        alt="{{ $productBrand->image_meta_tag ?? '' }}">

                                                    @endif
                                                </picture>
                                                
                                            </a>
                                            @endforeach
                                            <!-- @foreach($productBrands as $productBrand)
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
                                            @endforeach -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </li>
                    </ul>
                </li>

                <li><a href="{{route('blogs')}}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>



            <!-- MOBILE SOCIAL LINKS -->

            </ul>
            <ul class="d-flex links dnone d-md-none justify-content-between flex-wrap align-items-center pe-3"
                aria-label="Mobile social links">
                
                <li>
                    <a href="#" class="facebook" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.488 3.788C11.4724 2.8034 12.8077 2.25016 14.2 2.25H16.9C17.0989 2.25 17.2897 2.32902 17.4303 2.46967C17.571 2.61032 17.65 2.80109 17.65 3V6.6C17.65 6.79891 17.571 6.98968 17.4303 7.13033C17.2897 7.27098 17.0989 7.35 16.9 7.35H14.2C14.1803 7.35 14.1608 7.35388 14.1426 7.36142C14.1244 7.36896 14.1079 7.38 14.0939 7.39393C14.08 7.40786 14.069 7.4244 14.0614 7.4426C14.0539 7.4608 14.05 7.4803 14.05 7.5V9.45H16.9C17.014 9.44994 17.1266 9.47587 17.229 9.52583C17.3315 9.57579 17.4213 9.64846 17.4915 9.73832C17.5617 9.82817 17.6104 9.93285 17.6341 10.0444C17.6578 10.1559 17.6557 10.2714 17.628 10.382L16.728 13.982C16.6874 14.1443 16.5937 14.2884 16.4618 14.3913C16.3299 14.4942 16.1673 14.5501 16 14.55H14.05V21C14.05 21.1989 13.971 21.3897 13.8303 21.5303C13.6897 21.671 13.4989 21.75 13.3 21.75H9.7C9.50109 21.75 9.31032 21.671 9.16967 21.5303C9.02902 21.3897 8.95 21.1989 8.95 21V14.55H7C6.80109 14.55 6.61032 14.471 6.46967 14.3303C6.32902 14.1897 6.25 13.9989 6.25 13.8V10.2C6.25 10.1015 6.2694 10.004 6.30709 9.91299C6.34478 9.82199 6.40003 9.73931 6.46967 9.66967C6.53931 9.60003 6.62199 9.54478 6.71299 9.50709C6.80398 9.4694 6.90151 9.45 7 9.45H8.95V7.5C8.95016 6.10768 9.5034 4.77244 10.488 3.788ZM14.2 3.75C13.2054 3.75 12.2516 4.14509 11.5483 4.84835C10.8451 5.55161 10.45 6.50544 10.45 7.5V10.2C10.45 10.3989 10.371 10.5897 10.2303 10.7303C10.0897 10.871 9.89891 10.95 9.7 10.95H7.75V13.05H9.7C9.89891 13.05 10.0897 13.129 10.2303 13.2697C10.371 13.4103 10.45 13.6011 10.45 13.8V20.25H12.55V13.8C12.55 13.6011 12.629 13.4103 12.7697 13.2697C12.9103 13.129 13.1011 13.05 13.3 13.05H15.414L15.939 10.95H13.3C13.1011 10.95 12.9103 10.871 12.7697 10.7303C12.629 10.5897 12.55 10.3989 12.55 10.2V7.5C12.55 7.06239 12.7238 6.64271 13.0333 6.33327C13.3427 6.02384 13.7624 5.85 14.2 5.85H16.15V3.75H14.2Z"
                                fill="#304B9F"></path>
                        </svg></a></li>
                <li>
                                     <a href="#" class="instagram" aria-label="Instagram">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20" fill="none">
                            <path
                                d="M14.75 4.25H15.25M0.75 7.15C0.75 4.91 0.75 3.79 1.186 2.934C1.56949 2.18139 2.18139 1.56949 2.934 1.186C3.79 0.75 4.91 0.75 7.15 0.75H12.35C14.59 0.75 15.71 0.75 16.566 1.186C17.3186 1.56949 17.9305 2.18139 18.314 2.934C18.75 3.79 18.75 4.91 18.75 7.15V12.35C18.75 14.59 18.75 15.71 18.314 16.566C17.9305 17.3186 17.3186 17.9305 16.566 18.314C15.71 18.75 14.59 18.75 12.35 18.75H7.15C4.91 18.75 3.79 18.75 2.934 18.314C2.18139 17.9305 1.56949 17.3186 1.186 16.566C0.75 15.71 0.75 14.59 0.75 12.35V7.15Z"
                                stroke="#304B9F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M13.212 9.23731C13.2793 9.69201 13.2565 10.1555 13.1447 10.6014C13.0329 11.0473 12.8344 11.4668 12.5606 11.8359C12.2867 12.2051 11.9428 12.5167 11.5484 12.7529C11.1541 12.9892 10.7172 13.1454 10.2625 13.2128C9.80775 13.2802 9.34424 13.2573 8.89837 13.1456C8.45249 13.0338 8.033 12.8353 7.66385 12.5614C6.91829 12.0083 6.42301 11.1816 6.28696 10.2633C6.1509 9.345 6.38522 8.41025 6.93835 7.6647C7.49149 6.91915 8.31814 6.42387 9.23646 6.28781C10.1548 6.15175 11.0895 6.38607 11.8351 6.93921C12.5806 7.49235 13.0759 8.319 13.212 9.23731Z"
                                stroke="#304B9F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg></a></li>
                <li>
           <a href="#" class="linkedin" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6.12686 3.02942C6.13151 3.6222 5.90265 4.19298 5.48979 4.61836C5.07692 5.04374 4.51322 5.28952 3.92057 5.30256C3.32916 5.28108 2.76862 5.03318 2.3548 4.61012C1.94099 4.18705 1.70555 3.62116 1.69714 3.02942C1.7227 2.45274 1.9667 1.90739 2.37962 1.50402C2.79254 1.10065 3.34345 0.86948 3.92057 0.857422C4.49599 0.869711 5.04495 1.10146 5.4551 1.50523C5.86524 1.90901 6.10556 2.45427 6.12686 3.02942ZM1.93543 9.34142C1.93543 8.03514 2.76686 8.23914 3.92057 8.23914C5.07429 8.23914 5.88857 8.03514 5.88857 9.34142V22.0683C5.88857 23.3917 5.05714 23.1209 3.92057 23.1209C2.784 23.1209 1.93543 23.3917 1.93543 22.0683V9.34142ZM9.31714 9.34314C9.31714 8.61285 9.588 8.34028 10.0114 8.25628C10.4349 8.17228 11.8971 8.25628 12.4046 8.25628C12.9137 8.25628 13.1177 9.08771 13.1006 9.71514C13.5366 9.13142 14.1147 8.66901 14.78 8.37194C15.4452 8.07487 16.1755 7.95302 16.9011 8.01799C17.6139 7.97448 18.3277 8.08136 18.9965 8.3317C19.6652 8.58203 20.2738 8.97023 20.7827 9.47107C21.2916 9.97191 21.6895 10.5742 21.9505 11.2388C22.2115 11.9034 22.3298 12.6155 22.2977 13.3289V22.0169C22.2977 23.3403 21.4834 23.0694 20.328 23.0694C19.1726 23.0694 18.36 23.3403 18.36 22.0169V15.23C18.3899 14.8807 18.3443 14.5292 18.2262 14.1991C18.1082 13.8691 17.9205 13.5683 17.6759 13.3172C17.4313 13.0661 17.1356 12.8706 16.8087 12.7439C16.4819 12.6173 16.1316 12.5624 15.7817 12.5831C15.4332 12.574 15.0866 12.639 14.7651 12.7739C14.4436 12.9088 14.1544 13.1105 13.9168 13.3657C13.6791 13.6208 13.4984 13.9236 13.3867 14.2538C13.2749 14.5841 13.2347 14.9344 13.2686 15.2814V22.0683C13.2686 23.3917 12.4371 23.1209 11.2834 23.1209C10.1297 23.1209 9.31543 23.3917 9.31543 22.0683L9.31714 9.34314Z"
                                stroke="#304B9F" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg></a></li>
                <li>
                                   <a href="#" class="twitter" aria-label="Twitter">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.022 3.34248C15.53 3.25548 16.099 3.22648 16.635 3.31748C17.5898 3.47875 18.4744 3.92211 19.175 4.59048C19.631 4.60048 20.08 4.51048 20.477 4.38248C20.8606 4.25703 21.2289 4.08898 21.575 3.88148L21.584 3.87548C21.728 3.77953 21.9008 3.73633 22.073 3.7532C22.2452 3.77007 22.4063 3.84596 22.5289 3.96802C22.6516 4.09009 22.7282 4.2508 22.7459 4.42293C22.7636 4.59506 22.7213 4.76802 22.626 4.91248C22.419 5.22748 22.13 5.78948 21.807 6.41948L21.652 6.72048C21.467 7.08048 21.277 7.44448 21.1 7.75648C20.989 7.95248 20.87 8.15148 20.75 8.32348V8.59748C20.7623 10.2361 20.4481 11.8608 19.8258 13.3767C19.2034 14.8926 18.2854 16.2694 17.1252 17.4267C15.965 18.5839 14.586 19.4986 13.0685 20.1171C11.5511 20.7357 9.92561 21.0459 8.28701 21.0295C5.91229 21.0328 3.58739 20.3486 1.59301 19.0595C1.44984 18.9675 1.3422 18.8295 1.28779 18.6683C1.23337 18.5071 1.23541 18.3321 1.29357 18.1722C1.35172 18.0123 1.46254 17.8769 1.60782 17.7882C1.75309 17.6996 1.92419 17.663 2.09301 17.6845C2.39301 17.7211 2.69468 17.7395 2.99801 17.7395C4.07864 17.7355 5.14566 17.4981 6.12601 17.0435C5.51191 16.7641 4.9627 16.3599 4.51335 15.8567C4.06399 15.3535 3.72434 14.7622 3.51601 14.1205C3.47631 13.9977 3.46898 13.8667 3.49474 13.7402C3.52049 13.6137 3.57845 13.496 3.66301 13.3985L3.67301 13.3885C3.16562 12.9363 2.75894 12.3825 2.47934 11.763C2.19974 11.1435 2.05347 10.4721 2.05001 9.79248V9.73948C2.04994 9.57483 2.10404 9.41474 2.20398 9.28389C2.30392 9.15305 2.44414 9.05873 2.60301 9.01548C2.26454 8.34012 2.08885 7.59491 2.09001 6.83948C2.08944 5.98265 2.31356 5.14065 2.74001 4.39748C2.8006 4.29198 2.88594 4.20281 2.98867 4.13764C3.09141 4.07248 3.20845 4.03329 3.32971 4.02345C3.45097 4.01361 3.5728 4.03341 3.6847 4.08115C3.7966 4.12889 3.8952 4.20313 3.97201 4.29748C5.72186 6.45163 8.22752 7.85717 10.978 8.22748C10.9541 7.32766 11.1811 6.43895 11.6336 5.66081C12.0861 4.88267 12.7462 4.2458 13.54 3.82148C13.942 3.60748 14.474 3.43648 15.022 3.34248ZM3.74201 10.8905C3.9362 11.437 4.26895 11.9237 4.7077 12.3031C5.14645 12.6824 5.67617 12.9413 6.24501 13.0545C6.4089 13.0871 6.55719 13.1736 6.66635 13.3001C6.77551 13.4266 6.83928 13.586 6.84755 13.7529C6.85582 13.9198 6.80812 14.0847 6.712 14.2214C6.61588 14.3581 6.47687 14.4588 6.31701 14.5075C6.04434 14.5901 5.76634 14.6478 5.48301 14.6805C5.79035 15.0767 6.18249 15.3991 6.63065 15.6241C7.07882 15.849 7.57165 15.9708 8.07301 15.9805C8.22767 15.9834 8.37764 16.0341 8.50238 16.1255C8.62712 16.217 8.72052 16.3448 8.7698 16.4914C8.81908 16.638 8.82181 16.7963 8.77763 16.9446C8.73345 17.0928 8.64451 17.2238 8.52301 17.3195C7.47973 18.1391 6.26815 18.7179 4.97501 19.0145C6.0458 19.3576 7.1636 19.5313 8.28801 19.5295H8.29701C9.73703 19.5445 11.1656 19.2725 12.4993 18.7293C13.833 18.1861 15.0451 17.3825 16.0648 16.3656C17.0845 15.3487 17.8914 14.1388 18.4383 12.8066C18.9852 11.4744 19.2611 10.0465 19.25 8.60648V8.07148C19.2499 7.88937 19.316 7.71342 19.436 7.57648C19.506 7.49748 19.626 7.31548 19.796 7.01648C19.956 6.73448 20.134 6.39448 20.319 6.03548L20.352 5.96948C19.8296 6.08689 19.2918 6.11965 18.759 6.06648C18.5789 6.04686 18.4119 5.96267 18.289 5.82948C17.7861 5.28416 17.1164 4.92118 16.385 4.79748C16.0161 4.74493 15.6411 4.75338 15.275 4.82248C14.9181 4.87796 14.5715 4.98685 14.247 5.14548C13.5927 5.49508 13.0729 6.052 12.7692 6.72887C12.4655 7.40574 12.3951 8.16427 12.569 8.88548C12.5964 8.99889 12.5969 9.11711 12.5706 9.23077C12.5442 9.34442 12.4918 9.45036 12.4173 9.54016C12.3428 9.62997 12.2484 9.70116 12.1416 9.74809C12.0348 9.79502 11.9185 9.81638 11.802 9.81048C8.72982 9.65412 5.82542 8.36142 3.65301 6.18348C3.61075 6.39992 3.58965 6.61995 3.59001 6.84048V6.84248C3.58889 7.39322 3.72397 7.9357 3.98324 8.42161C4.2425 8.90751 4.6179 9.32177 5.07601 9.62748C5.21054 9.71802 5.31209 9.84973 5.36546 10.0029C5.41883 10.156 5.42113 10.3223 5.37201 10.4768C5.3229 10.6314 5.22503 10.7658 5.09305 10.8601C4.96108 10.9543 4.80213 11.0032 4.64001 10.9995C4.3383 10.99 4.03808 10.9531 3.74301 10.8895"
                                fill="#304B9F"></path>
                        </svg></a></li>
                <li>
                        <a href="#" class="youtube" aria-label="YouTube">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 12L10.5 14V10L14 12Z" fill="#304B9F" stroke="#304B9F" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M2 12.7084V11.2924C2 8.39739 2 6.94939 2.905 6.01839C3.811 5.08639 5.237 5.04639 8.088 4.96539C9.438 4.92739 10.818 4.90039 12 4.90039C13.182 4.90039 14.561 4.92739 15.912 4.96539C18.763 5.04639 20.189 5.08639 21.094 6.01839C21.999 6.95039 22 8.39839 22 11.2924V12.7074C22 15.6034 22 17.0504 21.095 17.9824C20.189 18.9134 18.764 18.9544 15.912 19.0344C14.562 19.0734 13.182 19.1004 12 19.1004C10.818 19.1004 9.439 19.0734 8.088 19.0344C5.237 18.9544 3.811 18.9144 2.905 17.9824C1.999 17.0504 2 15.6024 2 12.7084Z"
                                stroke="#304B9F" stroke-width="1.5"></path>
                        </svg></a></li>
                <li>
             <a href="#" class="tiktok" aria-label="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M8.5225 10.3335C5.282 10.5585 2.5 12.868 2.5 16.4075C2.5 19.7725 5.1965 22.5 8.5225 22.5C11.8485 22.5 14.5455 19.7725 14.5455 16.4075L14.3715 8.8125C15.885 9.9805 18.3025 10.6865 20.5395 10.7995C20.9395 10.8195 21.3235 10.638 21.417 10.248C21.4645 10.0495 21.5 9.791 21.5 9.4615C21.5 9.132 21.465 8.8735 21.417 8.675C21.3235 8.285 20.939 8.116 20.54 8.076C17.515 7.7735 14.6665 5.326 14.2595 2.436C14.2075 2.071 14.003 1.7335 13.6455 1.6405C13.2838 1.54684 12.9116 1.49962 12.538 1.5C12.1639 1.4995 11.7912 1.54671 11.429 1.6405C11.0725 1.7335 10.8595 2.0685 10.851 2.4375L10.53 16.4075C10.53 17.529 9.6315 18.4385 8.5225 18.4385C7.4135 18.4385 6.515 17.529 6.515 16.4075C6.515 15.2415 7.49 14.491 8.5225 14.299"
                                stroke="#304B9F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg></a></li>
                <li>
                                       <a href="#" class="pinterest" aria-label="Pinterest">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M8.492 19.191C8.51533 18.8543 8.563 18.5207 8.635 18.19C8.698 17.895 8.889 17.06 9.169 15.85L9.176 15.82L9.563 14.152C9.642 13.812 9.703 13.548 9.744 13.46C9.55097 13.0107 9.45422 12.526 9.46 12.037C9.46 10.7 10.216 9.664 11.196 9.664C11.556 9.658 11.9 9.814 12.138 10.09C12.376 10.366 12.486 10.733 12.44 11.086C12.44 11.539 12.355 11.884 11.987 13.121C11.93 13.3107 11.875 13.5011 11.822 13.692C11.7734 13.8649 11.7291 14.0389 11.689 14.214C11.593 14.6 11.681 15.011 11.926 15.319C12.0448 15.4702 12.1982 15.5906 12.3733 15.6702C12.5483 15.7497 12.74 15.786 12.932 15.776C14.424 15.776 15.532 13.791 15.532 11.228C15.532 9.258 14.242 7.954 12.1 7.954C11.5638 7.93419 11.0293 8.0258 10.5303 8.22306C10.0314 8.42031 9.57871 8.71891 9.201 9.1C8.81526 9.48954 8.51094 9.95197 8.30577 10.4603C8.1006 10.9687 7.9987 11.5128 8.006 12.061C7.98089 12.6518 8.16188 13.2329 8.518 13.705C8.699 13.845 8.768 14.088 8.693 14.295C8.652 14.463 8.553 14.847 8.516 14.975C8.50567 15.0378 8.48087 15.0973 8.44355 15.1489C8.40623 15.2004 8.35743 15.2426 8.301 15.272C8.24621 15.3004 8.18546 15.3154 8.12374 15.3157C8.06203 15.3161 8.00111 15.3018 7.946 15.274C6.786 14.795 6.15 13.496 6.15 11.834C6.15 8.849 8.641 6.25 12.342 6.25C15.477 6.25 17.823 8.579 17.823 11.39C17.823 14.922 15.891 17.494 13.133 17.494C12.7406 17.506 12.3509 17.4255 11.9955 17.2588C11.64 17.0922 11.3288 16.8443 11.087 16.535L11.044 16.712L10.837 17.564L10.835 17.572C10.689 18.172 10.587 18.589 10.547 18.745C10.4403 19.101 10.307 19.4477 10.147 19.785C12.1368 20.2592 14.2327 19.9532 16.0038 18.9299C17.775 17.9066 19.0869 16.2437 19.6699 14.283C20.2528 12.3223 20.0626 10.2127 19.1383 8.38795C18.214 6.56317 16.6258 5.16177 14.7001 4.4718C12.7745 3.78182 10.6577 3.85568 8.78478 4.6782C6.91191 5.50073 5.42525 7.00942 4.63037 8.89419C3.83548 10.779 3.79276 12.8966 4.51099 14.8119C5.22922 16.7272 6.65382 18.2936 8.492 19.191ZM12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22Z"
                                fill="#304B9F"></path>
                        </svg></a></li>
                <li>
                                       <a href="#" class="snapchat" aria-label="Snapchat">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M18 8.75C18 -0.25 6 -0.25 6 8.75V10.25H4.372C3.789 10.25 3.549 10.999 4.024 11.338L6 12.75C5.667 13.917 4.3 16.45 1.5 17.25C1.833 17.75 2.8 18.75 4 18.75L5 20.25L7.5 19.75C8.333 20.417 10.4 21.75 12 21.75C13.6 21.75 15.667 20.417 16.5 19.75L19 20.25L20 18.75C21.2 18.75 22.167 17.75 22.5 17.25C19.7 16.45 18.333 13.917 18 12.75L19.976 11.338C20.451 10.999 20.211 10.25 19.628 10.25H18V8.75Z"
                                stroke="#304B9F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg></a></li>
                <li>
                                        <a href="#" class="whatsappp" aria-label="WhatsApp">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <mask id="mask0_440_1563" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="24" height="24">
                                <path d="M0 0L24 0V24H0L0 0Z" fill="white"></path>
                            </mask>
                            <g mask="url(#mask0_440_1563)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.415 14.382C17.117 14.233 15.656 13.515 15.384 13.415C15.112 13.315 14.914 13.267 14.715 13.565C14.517 13.862 13.948 14.531 13.775 14.729C13.601 14.928 13.428 14.952 13.131 14.804C12.834 14.654 11.876 14.341 10.741 13.329C9.858 12.541 9.261 11.568 9.088 11.27C8.915 10.973 9.069 10.812 9.218 10.664C9.352 10.531 9.515 10.317 9.664 10.144C9.813 9.97103 9.862 9.84603 9.961 9.64703C10.061 9.44903 10.011 9.27603 9.936 9.12703C9.862 8.97803 9.268 7.51503 9.02 6.92003C8.779 6.34103 8.534 6.42003 8.352 6.41003C8.178 6.40203 7.98 6.40003 7.782 6.40003C7.584 6.40003 7.262 6.47403 6.99 6.77203C6.717 7.06903 5.95 7.78803 5.95 9.25103C5.95 10.713 7.014 12.126 7.163 12.325C7.312 12.524 9.258 15.525 12.239 16.812C12.949 17.118 13.502 17.301 13.933 17.437C14.645 17.664 15.293 17.632 15.805 17.555C16.375 17.47 17.563 16.836 17.811 16.142C18.059 15.448 18.058 14.853 17.984 14.729C17.91 14.605 17.712 14.531 17.414 14.382M11.992 21.785H11.988C10.2174 21.7854 8.47937 21.3094 6.956 20.407L6.596 20.193L2.854 21.175L3.853 17.527L3.618 17.153C2.62809 15.5774 2.10424 13.7538 2.107 11.893C2.109 6.44303 6.543 2.00903 11.996 2.00903C13.2948 2.00509 14.5814 2.25934 15.781 2.75702C16.9807 3.2547 18.0694 3.98587 18.984 4.90803C19.9045 5.82433 20.6341 6.91412 21.1305 8.11431C21.6269 9.3145 21.8803 10.6012 21.876 11.9C21.874 17.35 17.44 21.785 11.992 21.785ZM20.404 3.48803C19.3021 2.3793 17.9913 1.50013 16.5474 0.901413C15.1035 0.302696 13.5551 -0.0036753 11.992 3.32698e-05C5.438 3.32698e-05 0.102 5.33503 0.1 11.892C0.096774 13.9788 0.644198 16.0295 1.687 17.837L0 24L6.304 22.346C8.04817 23.2954 10.0022 23.7932 11.988 23.794H11.993C18.547 23.794 23.883 18.459 23.885 11.901C23.8899 10.3383 23.5848 8.79011 22.9875 7.34603C22.3902 5.90196 21.5124 4.59067 20.405 3.48803"
                                    fill="#304B9F"></path>
                            </g>
                        </svg></a></li>
            </ul>

        </nav>

    </div>
</div>

<!-- FIXED BOTTOM MENU (MOBILE) -->
<div class="bottomFixedMenu d-lg-none">
    <ul class="d-flex flex-wrap justify-content-around">
        <li> <a href="https://wa.me/{{$siteInformation->whatsapp_number}}"
               aria-label="Chat with us on WhatsApp"
               target="_blank"
               rel="noopener">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                    width="20px" height="20px">
                    <g fill="#fff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(5.12,5.12)">
                            <path
                                d="M25,2c-12.682,0 -23,10.318 -23,23c0,3.96 1.023,7.854 2.963,11.29l-2.926,10.44c-0.096,0.343 -0.003,0.711 0.245,0.966c0.191,0.197 0.451,0.304 0.718,0.304c0.08,0 0.161,-0.01 0.24,-0.029l10.896,-2.699c3.327,1.786 7.074,2.728 10.864,2.728c12.682,0 23,-10.318 23,-23c0,-12.682 -10.318,-23 -23,-23zM36.57,33.116c-0.492,1.362 -2.852,2.605 -3.986,2.772c-1.018,0.149 -2.306,0.213 -3.72,-0.231c-0.857,-0.27 -1.957,-0.628 -3.366,-1.229c-5.923,-2.526 -9.791,-8.415 -10.087,-8.804c-0.295,-0.389 -2.411,-3.161 -2.411,-6.03c0,-2.869 1.525,-4.28 2.067,-4.864c0.542,-0.584 1.181,-0.73 1.575,-0.73c0.394,0 0.787,0.005 1.132,0.021c0.363,0.018 0.85,-0.137 1.329,1.001c0.492,1.168 1.673,4.037 1.819,4.33c0.148,0.292 0.246,0.633 0.05,1.022c-0.196,0.389 -0.294,0.632 -0.59,0.973c-0.296,0.341 -0.62,0.76 -0.886,1.022c-0.296,0.291 -0.603,0.606 -0.259,1.19c0.344,0.584 1.529,2.493 3.285,4.039c2.255,1.986 4.158,2.602 4.748,2.894c0.59,0.292 0.935,0.243 1.279,-0.146c0.344,-0.39 1.476,-1.703 1.869,-2.286c0.393,-0.583 0.787,-0.487 1.329,-0.292c0.542,0.194 3.445,1.604 4.035,1.896c0.59,0.292 0.984,0.438 1.132,0.681c0.148,0.242 0.148,1.41 -0.344,2.771z">
                            </path>
                        </g>
                    </g>
                </svg>
                <span>Whatsapp</span>
            </a></li>
        <li>
            <button  type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#enquiryForm"
                    aria-label="Open enquiry form">
                <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="17px" viewBox="0 0 512 513" fill="none">
                    <path
                        d="M277.333 0H106.667C47.8507 0 0 47.8507 0 106.667V380.885C0 397.803 9.28 413.291 24.192 421.291C30.976 424.939 38.4213 426.731 45.8453 426.731C54.72 426.731 63.5733 424.149 71.2533 419.051L155.797 362.667H277.333C336.149 362.667 384 314.816 384 256V106.667C384 47.8507 336.149 0 277.333 0ZM512 192V466.219C512 483.136 502.72 498.624 487.808 506.624C481.024 510.272 473.579 512.064 466.155 512.085C457.28 512.085 448.427 509.504 440.768 504.405L356.203 448H234.667C203.733 448 176.064 434.539 156.565 413.44L168.704 405.333H277.333C359.659 405.333 426.667 338.325 426.667 256V106.667C426.667 100.096 426.091 93.696 425.28 87.3387C474.581 96.7253 512 140.011 512 192Z"
                        fill="white" />
                </svg>
                <span>Enquiry</span>
            </button>
        </li>
        <li>
            <a href="tel:{{$siteInformation->phone_number }}" aria-label="Call us">
                <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="17px" viewBox="0 0 512 512" fill="none">
                    <path
                        d="M512 133.12C512 296.107 295.893 512 133.12 512C97.4934 512 64.2134 498.56 39.6801 474.027L18.3467 449.493C-6.39992 424.747 -6.39992 382.933 19.4134 357.12C20.0534 356.48 71.4667 317.013 71.4667 317.013C97.0668 292.693 137.387 292.693 162.773 317.013L193.92 341.973C262.187 312.96 310.613 264.32 341.76 193.707L317.013 162.56C292.48 137.173 292.48 96.6401 317.013 71.2534C317.013 71.2534 356.48 19.8401 357.12 19.2001C382.933 -6.61325 424.747 -6.61325 450.56 19.2001L472.96 38.6134C498.56 64.0001 512 97.2801 512 132.907V133.12Z"
                        fill="white" />
                </svg>
                <span>Phone</span>
            </a>
        </li>
    </ul>
</div>

<!-- LEFT FIXED BOX (DESKTOP) -->

<div class="leftFixedBox">
    <div class="btn-group dropstart"></div>
        <!-- WhatsApp side button -->
    <div class="QuickSideRightBar QuickSideRightBarWhatsapp">
         <a href="https://wa.me/{{$siteInformation->whatsapp_number}}"
           target="_blank"
           rel="noopener"
           aria-label="Chat with us on WhatsApp">
            <div class="iconBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 35 35" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M29.7568 5.08667C26.4814 1.80833 22.1268 0.00145833 17.4878 0C7.92846 0 0.148255 7.77875 0.14388 17.3425C0.142422 20.3992 0.941589 23.3829 2.45971 26.0137L-0.00195312 35L9.19138 32.5879C11.7245 33.9704 14.577 34.6981 17.4791 34.6996H17.4864C27.0443 34.6996 34.826 26.9194 34.8303 17.3556C34.8333 12.7225 33.0308 8.36354 29.7568 5.08667ZM17.4878 31.7698H17.482C14.8949 31.7698 12.3589 31.0742 10.1451 29.7602L9.61867 29.4481L4.16305 30.8788L5.61992 25.5587L5.27721 25.0133C3.83346 22.7179 3.07221 20.0652 3.07367 17.3425C3.07659 9.39458 9.5443 2.92833 17.4951 2.92833C21.3451 2.92833 24.9647 4.43042 27.686 7.15458C30.4072 9.88021 31.9049 13.5013 31.9035 17.3527C31.8991 25.3035 25.4328 31.7698 17.4878 31.7698ZM25.3949 20.9738C24.9618 20.7565 22.8312 19.7079 22.433 19.5635C22.0364 19.4192 21.7476 19.3463 21.4574 19.7794C21.1672 20.2125 20.3389 21.1896 20.0851 21.4798C19.8328 21.7685 19.5791 21.805 19.146 21.5877C18.7128 21.3704 17.3158 20.914 15.6605 19.4367C14.3728 18.2875 13.5022 16.8685 13.2499 16.434C12.9976 15.9994 13.2237 15.766 13.4395 15.5502C13.6349 15.3563 13.8726 15.0442 14.0899 14.7904C14.3087 14.5396 14.3801 14.3588 14.526 14.0685C14.6703 13.7798 14.5989 13.526 14.4895 13.3088C14.3801 13.0929 13.5139 10.9594 13.1537 10.0917C12.8022 9.24583 12.4449 9.36104 12.178 9.34792C11.9258 9.33479 11.637 9.33333 11.3468 9.33333C11.058 9.33333 10.5885 9.44125 10.1918 9.87583C9.79513 10.3104 8.67513 11.359 8.67513 13.491C8.67513 15.6246 10.2283 17.6852 10.4441 17.974C10.6599 18.2627 13.4993 22.6406 17.8466 24.5175C18.8805 24.9638 19.6885 25.2306 20.317 25.4304C21.3553 25.76 22.3003 25.7133 23.047 25.6025C23.8797 25.4785 25.6108 24.554 25.9724 23.5419C26.3341 22.5298 26.3341 21.6606 26.2247 21.4812C26.1168 21.299 25.828 21.191 25.3949 20.9738Z"
                        fill="white"></path>
                </svg>
            </div>
            <div class="slideLeft">
                <span class="textRight">{{$siteInformation->whatsapp_number}}</span>
            </div>
        </a>
    </div>
       <!-- Phone side button -->
    <div class="QuickSideRightBar QuickSideRightBarWhatsapp">
        <a href="tel:{{$siteInformation->phone_number}}" aria-label="Call us">
            <div class="iconBox animateBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 35 35" fill="none">
                    <path
                        d="M18.8994 1.46066C18.8994 1.07389 19.053 0.702955 19.3265 0.429465C19.6 0.155974 19.971 0.00232891 20.3577 0.00232891C24.2242 0.00657499 27.931 1.54439 30.665 4.27838C33.399 7.01236 34.9368 10.7192 34.9411 14.5857C34.9411 14.9724 34.7874 15.3434 34.5139 15.6169C34.2404 15.8904 33.8695 16.044 33.4827 16.044C33.096 16.044 32.725 15.8904 32.4515 15.6169C32.178 15.3434 32.0244 14.9724 32.0244 14.5857C32.0209 11.4925 30.7906 8.52709 28.6035 6.33992C26.4163 4.15275 23.4509 2.92247 20.3577 2.919C19.971 2.919 19.6 2.76535 19.3265 2.49186C19.053 2.21837 18.8994 1.84744 18.8994 1.46066V1.46066ZM20.3577 8.75233C21.9048 8.75233 23.3886 9.36691 24.4825 10.4609C25.5765 11.5548 26.1911 13.0386 26.1911 14.5857C26.1911 14.9724 26.3447 15.3434 26.6182 15.6169C26.8917 15.8904 27.2626 16.044 27.6494 16.044C28.0362 16.044 28.4071 15.8904 28.6806 15.6169C28.9541 15.3434 29.1077 14.9724 29.1077 14.5857C29.1054 12.2657 28.1828 10.0415 26.5424 8.40104C24.9019 6.7606 22.6777 5.83798 20.3577 5.83566C19.971 5.83566 19.6 5.98931 19.3265 6.2628C19.053 6.53629 18.8994 6.90722 18.8994 7.294C18.8994 7.68077 19.053 8.0517 19.3265 8.32519C19.6 8.59868 19.971 8.75233 20.3577 8.75233V8.75233ZM33.6184 24.4134C34.4635 25.2608 34.9381 26.4088 34.9381 27.6057C34.9381 28.8025 34.4635 29.9505 33.6184 30.798L32.2913 32.3277C20.3475 43.7625 -8.71707 14.7052 2.54127 2.72358L4.21835 1.26525C5.06676 0.443733 6.2045 -0.0107245 7.38542 0.000192222C8.56634 0.011109 9.69548 0.486522 10.5286 1.32358C10.5738 1.36879 13.2761 4.879 13.2761 4.879C14.0779 5.72137 14.5243 6.84035 14.5224 8.00333C14.5205 9.16632 14.0704 10.2838 13.2659 11.1236L11.5771 13.2469C12.5117 15.5177 13.8857 17.5814 15.6203 19.3196C17.355 21.0577 19.4159 22.4359 21.6848 23.375L23.8213 21.6761C24.6611 20.8721 25.7784 20.4226 26.9411 20.421C28.1037 20.4194 29.2223 20.8657 30.0644 21.6673C30.0644 21.6673 33.5731 24.3682 33.6184 24.4134ZM31.6117 26.5338C31.6117 26.5338 28.1219 23.849 28.0767 23.8038C27.7762 23.5059 27.3703 23.3388 26.9472 23.3388C26.5241 23.3388 26.1182 23.5059 25.8177 23.8038C25.7784 23.8446 22.8369 26.1882 22.8369 26.1882C22.6387 26.3459 22.4028 26.4494 22.1524 26.4882C21.9021 26.5271 21.6459 26.5001 21.4092 26.4098C18.4699 25.3155 15.8001 23.6022 13.5806 21.386C11.3612 19.1698 9.64394 16.5025 8.54523 13.5648C8.44781 13.3249 8.41605 13.0633 8.45321 12.807C8.49037 12.5507 8.59512 12.3089 8.75669 12.1065C8.75669 12.1065 11.1002 9.16358 11.1396 9.12566C11.4375 8.82522 11.6046 8.41927 11.6046 7.99618C11.6046 7.5731 11.4375 7.16714 11.1396 6.8667C11.0944 6.82295 8.4096 3.33025 8.4096 3.33025C8.10466 3.05682 7.70669 2.91038 7.29725 2.92096C6.88782 2.93153 6.49793 3.09832 6.20752 3.38712L4.53044 4.84545C-3.69748 14.7388 21.4894 38.5286 30.1592 30.3357L31.4877 28.8044C31.7991 28.516 31.986 28.1179 32.0092 27.6942C32.0323 27.2705 31.8898 26.8543 31.6117 26.5338V26.5338Z"
                        fill="white"></path>
                </svg>
            </div>
            <div class="slideLeft">
                <span class="textRight">{{$siteInformation->phone_number}}</span>
            </div>
        </a>
    </div>
   <!-- Enquiry side button -->
    <div class="QuickSideRightBar QuickSideRightBarWhatsapp">
        <a data-bs-toggle="modal"
           data-bs-target="#enquiryForm"
           role="button"
           aria-label="Open enquiry form">
            <div class="iconBox animateBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="17px" height="17px" viewBox="0 0 512 513" fill="none">
                    <path
                        d="M277.333 0H106.667C47.8507 0 0 47.8507 0 106.667V380.885C0 397.803 9.28 413.291 24.192 421.291C30.976 424.939 38.4213 426.731 45.8453 426.731C54.72 426.731 63.5733 424.149 71.2533 419.051L155.797 362.667H277.333C336.149 362.667 384 314.816 384 256V106.667C384 47.8507 336.149 0 277.333 0ZM512 192V466.219C512 483.136 502.72 498.624 487.808 506.624C481.024 510.272 473.579 512.064 466.155 512.085C457.28 512.085 448.427 509.504 440.768 504.405L356.203 448H234.667C203.733 448 176.064 434.539 156.565 413.44L168.704 405.333H277.333C359.659 405.333 426.667 338.325 426.667 256V106.667C426.667 100.096 426.091 93.696 425.28 87.3387C474.581 96.7253 512 140.011 512 192Z"
                        fill="white"></path>
                </svg>
            </div>
            <div class="slideLeft">
                <span class="textRight">Enquire </span>
            </div>
        </a>
    </div>
</div>

<!-- popup includes here  -->
@include('web.includes._brochure_popup')

@include('web.includes._enquiry_popup')

@include('web.includes._product_enquiry_popup')

<!-- popup include end here  -->



<!-- modal full screen for get a quote button ends here  -->

{!! isset($extra_meta_data)?$extra_meta_data->footer_tag:'' !!}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="public/js/lib/jquery.fancybox.min.js"></script> -->
<script src="{{asset('web/js/lib/countup.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js"></script>
<script src="{{asset('web/js/lib/jquery.star-rating-svg.min.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="{{asset('web/js/script.js')}}"></script>


@if (!Request::is('/'))
<script src="{{asset('web/js/jquery.fancybox.min.js')}}"></script>


@endif
<script src="{{asset('app/js/sweetalert.min.js')}}"></script>
<script src="{{asset('app/js/sweetalert-init.js')}}"></script>
<!-- <script src="{{asset('web/js/main.min.js')}}"></script> -->
<script src="{{asset('web/js/main.js')}}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var token = "{{ csrf_token() }}";
</script>
<script src="{{asset('web/js/scripts.min.js')}}"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>