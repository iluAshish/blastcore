@extends('web.layouts.main')

@section('content')

<section class="inner-banner text-center">
    <picture><img loading="lazy"  src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
            <h1>About Us</h1>
    <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="#">About Us</a></li>
    </ul>
    </div>
</section>

<section class="about-section commonPadding">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="about-section-col">
                <h2>{{$about->title}}</h2>
                <p>{{$about->sub_title}}</p>
                
                <picture>
                    <img loading="lazy"  src="{{asset('web/images/about/about.jpg')}}" width="570" height="635" class="img-fluid" alt="">
                </picture>
            </div>
            <div class="about-section-description">
                {!! $about->first_description !!}

                {!! $about->second_description !!}            
                
                <div class="about-section-accordion">
                    <div class="about-section-item">
                        <button class="about-section-accordion-button active">{{$about->vision_title}}</button>
                        <div class="panel" >
                        {!! $about->vision_description !!}
                        </div>
                    </div>

                    <div class="about-section-item">
                            <button class="about-section-accordion-button">{{$about->mission_title}}</button>
                        <div class="panel">
                        {!! $about->mission_description !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



@if(!empty($homeAboutHighlight))
<section class="counter bg-theme-grey commonPadding">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between">
            
            <div class="counter-col">
                <strong class="timer" data-to="{{$homeAboutHighlight->first_number}}" data-speed="1000">{{$homeAboutHighlight->first_number}}</strong>
                <p>{{$homeAboutHighlight->first_title}}</p>
            </div>
            <div class="counter-col">
                <strong class="timer" data-to="{{$homeAboutHighlight->second_number}}" data-speed="3000">{{$homeAboutHighlight->second_number}}</strong>
                <p>{{$homeAboutHighlight->second_title}}</p>
            </div>
            <div class="counter-col">
                <strong class="timer" data-to="{{$homeAboutHighlight->third_number}}" data-speed="3000">{{$homeAboutHighlight->third_number}}</strong>
                <p>{{$homeAboutHighlight->third_title}}</p>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($whyChooseUs))
<section class="whyChoose commonPadding-120">
    <div class="container-ctn ">
        <h2 class="text-center commonPadding pt-0">Why Choose Us</h2>
        <div class="d-flex flex-wrap commonPadding whyChoose-row justify-content-center pb-0">
            @foreach($whyChooseUs as $item)
            <div class="whyChoose-col text-center">
                <picture>
                    <img loading="lazy"  src="{{asset('web/images/icon/'.$loop->iteration.'.png')}}" width="82" height="82"  alt="">
                </picture>
                <div class="timer" data-to="{{$item->number}}" data-speed="3000"></div>

                <p>{{$item->title}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(!empty($clients))
<section class="clients commonPadding bg-theme-grey">
    <p class="h3">Trusted by <strong>1000+ happy customers</strong> from the whole world</p>
    <div class="clients-slider">
        @foreach ($clients as $client)
        <a href="#" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('/uploads/client/'.$client->image)}}" width="167" height="39" alt="{{$client->image_meta_tag}}" class="img-fluid w-100">
            </picture>
        </a>
        @endforeach
    </div>
</section>
@endif

<section class="history commonPadding-120">
    <div class="container-history">
        <h2 class="commonPadding pt-0 text-center m-0">Our Successful Journey</h2>
        <div class="history-row  history-slide-init d-flex flex-wrap">
            @foreach($successStories as $story)
                <div class="history-item">
                    <div class="content">
                        <div class="year">{{$story->year}}</div>
                    <span>{{$story->title}}</span>
                    <p>{!! Str::limit(strip_tags($story->description), 10) !!}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection