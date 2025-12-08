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
                <h2>Concerted Efforts to Build Better</h2>
                <p>Dream big with get more inspiring solutions from here.</p>
                
                <picture>
                    <img loading="lazy"  src="{{asset('web/images/about/about.jpg')}}" width="570" height="635" class="img-fluid" alt="">
                </picture>
            </div>
            <div class="about-section-description">
                <p>JETBLAST International Equipment LLC is engaged in designing, manufacturing and marketing of complete range of high quality CE Standard Sandblasting and Painting products to serve all kind of Industrial sectors in Middle East and Global market. Jet blast Provide the best service in the field of surface treatment technologies to you-valuable customer. Jet blast make in the service with its constantly improving dynamic team according to problems and needs occurred in totally different sectors.</p>
                <p>JETBLAST International Equipment LLC delivers on its promise- tangible, real results every time we work in partnership with our customers. Whether it is integrated manufacturing or customized designing, we ensure a level of certainty of results that no other firm can match. JETBLAST International Equipment LLC includes a number of diverse businesses where specialist products are sold to meet industrial applications other than the sandblasting, Airless Painting machine, Blasting cabinet Testing Equipment's, Blasting Booth, Painting Booth, Abrasive Recycling Machine, IBIX Machien, Automatic Internal Pipe Coating Machine we are specialist engineers are available to develop bespoke products to suit individual applications.</p>
                <p>JETBLAST International Equipment is providing solution for surface preparation equipment. During & after paints for surface preparation industries and market leader & global source for abrasive, blasting, painting, quality control and safety equipment & supplies.</p>
            
                
                <div class="about-section-accordion">
                    <div class="about-section-item">
                        <button class="about-section-accordion-button active">Our Vision</button>
                        <div class="panel" >
                        <p>To determine the targets and work on, according to the international vision, mission, and values in surface treatment technologies. Keeping customer requests at the forefront and always targeting for better action plans. To produce projects respectful to the environment, nature, and society. Mutual trust in our commercial and human relations, superior business ethics, never giving up the principle of honest behavior.</p>
                        </div>
                    </div>

                    <div class="about-section-item">
                            <button class="about-section-accordion-button">Our Mission</button>
                        <div class="panel">
                        <p>To provide innovative surface treatment solutions that meet customer needs with the highest standards of quality, efficiency, and sustainability. To create value for all stakeholders through dedication, collaboration, and a commitment to constant improvement in our processes.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="counter bg-theme-grey commonPadding">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="counter-col">
                <strong class="timer" data-to="23" data-speed="1000">23</strong>
                <p>Years of Experience</p>
            </div>
            <div class="counter-col">
                <strong class="timer" data-to="200" data-speed="3000">200</strong>
                <p>Products</p>
            </div>
            <div class="counter-col">
                <strong class="timer" data-to="1000" data-speed="3000">1000</strong>
                <p>Our Clients</p>
            </div>
        </div>
    </div>
</section>

<section class="whyChoose commonPadding-120">
    <div class="container-ctn ">
        <h2 class="text-center commonPadding pt-0">Why Choose Us</h2>
        <div class="d-flex flex-wrap commonPadding whyChoose-row justify-content-center pb-0">
            <div class="whyChoose-col text-center">
                <picture><img loading="lazy"  src="{{asset('web/images/icon/1.png')}}" width="82" height="82"  alt=""></picture>
                <div class="timer" data-to="100" data-speed="3000"></div>
                <p>Customer 
                    Service</p>
            </div>
            <div class="whyChoose-col text-center">
                <picture><img loading="lazy"  src="{{asset('web/images/icon/2.png')}}" width="82" height="82"  alt=""></picture>
                                    <div class="timer" data-to="87" data-speed="3000"></div>

                <p>Distribution  
                    Network</p>
            </div>
            <div class="whyChoose-col text-center">
                <picture><img loading="lazy"  src="{{asset('web/images/icon/3.png')}}" width="82" height="82"  alt=""></picture>
                                    <div class="timer" data-to="81" data-speed="3000"></div>

                <p>Availablity of spare 
                    Parts & Consumables  
                    </p>
            </div>
            <div class="whyChoose-col text-center">
                <picture><img loading="lazy"  src="{{asset('web/images/icon/4.png')}}" width="82" height="82"  alt=""></picture>
                                                        <div class="timer" data-to="87" data-speed="3000"></div>

                <p>Leader in 
                    Innovation  
                    </p>
            </div>
        </div>
    </div>
</section>

    <section class="clients commonPadding bg-theme-grey">
    <p class="h3">Trusted by <strong>1000+ happy customers</strong> from the whole world</p>
    <div class="clients-slider">
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/1.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/2.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/3.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/4.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/5.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/6.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
        <a href="" aria-label="visit website" target="_blank">
            <picture><img loading="lazy"  src="{{asset('web/images/logos/2.jpg')}}" width="167" height="39" alt="" class="img-fluid w-100">
            </picture>
        </a>
    </div>
</section>

<section class="history commonPadding-120">
    <div class="container-history">
        <h2 class="commonPadding pt-0 text-center m-0">Our Successful Journey</h2>
        <div class="history-row  history-slide-init d-flex flex-wrap">
            <div class="history-item">
                <div class="content">
                    <div class="year">2002</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            <div class="history-item">
                <div class="content">
                    <div class="year">2008</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            <div class="history-item">
                <div class="content">
                    <div class="year">2015</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            <div class="history-item">
                <div class="content">
                    <div class="year">2018</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            <div class="history-item">
                <div class="content">
                    <div class="year">2023</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            <div class="history-item">
                <div class="content">
                    <div class="year">2025</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>
            <div class="history-item">
                <div class="content">
                    <div class="year">2025</div>
                <span>Lorem Ipsum is simply dummy text </span>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="215" height="56" viewBox="0 0 215 56" fill="none"> <circle cx="28" cy="28" r="28" fill="#E97435"/> <circle cx="28" cy="28" r="13" fill="white"/> <circle cx="82" cy="28" r="13" fill="#EAEAEC"/> <circle cx="122" cy="28" r="13" fill="#EAEAEC"/> <circle cx="162" cy="28" r="13" fill="#EAEAEC"/> <circle cx="202" cy="28" r="13" fill="#EAEAEC"/> </svg>
            </div>

            
        </div>
    </div>
</section>

@endsection