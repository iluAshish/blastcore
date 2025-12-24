<section class="mission-vission">
    <div class="mission-vission-container d-flex flex-wrap justify-content-between">
        <div class="mission-vission-slider">
            <div>
                <h3>{{$homeAbout->mission_title }}</h3>
                {!! $homeAbout->mission_description !!}
            </div>
            <div>
                <h3>{{$homeAbout->vision_title }}</h3>
                {!! $homeAbout->vision_description !!}
            </div>
        </div>
        <picture>
            <img
                loading="lazy"
                src="{{asset('web/images/about-logo.png')}}"
                width="50"
                height="73"
                alt="Jetblast International logo"
            >
        </picture>
    </div>
</section>