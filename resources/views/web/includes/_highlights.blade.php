<section class="highlights commonPadding-120">
    <div class="container-ctn">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="highlights-first-image">
                <div class="highlights-card">
                    <picture>
                        <img
                            loading="lazy"
                            src="{{asset('web/images/highlights-1.jpg')}}"
                            width="413"
                            height="670"
                            class="img-fluid"
                            alt="Highlight image"
                        >
                    </picture>
                </div>
            </div>
            <div class="highlights-row d-flex flex-wrap">
                <div class="highlights-card">
                    <p>{{$homeAboutHighlight->first_title}}</p>
                    <span class="timer" data-to="23" data-speed="3000">{{$homeAboutHighlight->first_number}}</span>
                </div>
                <div class="highlights-card">
                    <p>{{$homeAboutHighlight->second_title}}</p>
                    <span class="timer" data-to="1000" data-speed="3000">{{$homeAboutHighlight->second_number}}</span>
                </div>
                <div class="highlights-card">
                    <p>{{$homeAboutHighlight->third_title}}</p>
                    <span class="timer" data-to="200" data-speed="3000">{{$homeAboutHighlight->third_number}}</span>
                </div>
                <div class="highlights-card">
                    <picture>
                        <img
                            loading="lazy"
                            src="{{asset('web/images/highlights-2.jpg')}}"
                            width="406"
                            height="334"
                            class="img-fluid"
                            alt="Manufacturing highlight"
                        >
                    </picture>
                </div>
                <div class="highlights-card">
                    <picture>
                        <img
                            loading="lazy"
                            src="{{asset('web/images/highlights-3.jpg')}}"
                            width="406"
                            height="334"
                            class="img-fluid"
                            alt="Team highlight"
                        >
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>