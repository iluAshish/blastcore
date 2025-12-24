<section class="about position-relative">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="about-col d-flex flex-wrap">
                <picture>
                    <img
                        loading="lazy"
                        src="{{asset('web/images/about.png')}}"
                        width="350"
                        height="511"
                        alt="Team working at Jetblast International"
                        class="img-fluid"
                    >
                </picture>
                <div class="about-content">
                    <div class="head">
                        <span>About us</span>
                        <h2>{{$homeAbout->title}}</h2>
                    </div>
                    {!! Str::limit(strip_tags($homeAbout->first_description), 450) !!}
                    <a href="{{route('about')}}" class="btn theme-btn theme-bg">Read more</a>
                </div>
            </div>
            <picture>
                <img
                    loading="lazy"
                    src="{{asset('web/images/about-featured.jpg')}}"
                    width="540"
                    height="531"
                    alt="Featured project by Jetblast International"
                    class="img-fluid"
                >
            </picture>
        </div>
    </div>
</section>