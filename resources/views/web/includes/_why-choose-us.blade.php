<section class="why-choose commonPadding">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <picture>
                <img loading="lazy" src="{{asset('web/images/mask-logo.png')}}" width="520" height="760" alt="Jetblast branding" class="img-fluid">
            </picture>
            <div class="why-choose-col">
                <h2>Why
                    Choose Us</h2>
                <div class="d-flex flex-wrap w-100">
                    @foreach($whyChooseUs as $item)
                        <div class="why-choose-box">
                            <span class="timer" data-to="{{$item->number}}" data-speed="3000">{{$item->number}}</span>
                            <p>{{$item->title}}</p>
                        </div>
                    @endforeach
                    <div class="video-container position-relative">
                        <video
                            id="heroVideo"
                            class="responsive-video"
                            preload="metadata"
                            playsinline
                            muted
                            loop
                            autoplay
                            width="100%"
                            height="auto"
                        >
                            <source src="{{asset('web/video/video.mp4')}}" type="video/mp4" />
                        </video>
                        <button class="video-button" id="playPauseBtn" type="button" aria-label="Play or pause video">
                            <img
                                loading="lazy"
                                id="playIcon"
                                src="{{asset('web/images/pause.webp')}}"
                                width="100"
                                height="100"
                                alt="Play video"
                            >
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>