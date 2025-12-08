<section class="testimonial">
    <div class="testimonial-container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="testimonial-nav-wrapper d-flex flex-wrap align-items-center justify-content-center">
                <picture>
                    <img
                        loading="lazy"
                        src="{{asset('web/images/testimonial.jpg')}}"
                        width="498"
                        height="789"
                        class="img-fluid"
                        alt="Customer testimonials"
                    >
                </picture>
                <div class="testimonial-nav">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="testimonial-nav-item">
                            <picture>
                                <img
                                    loading="lazy"
                                    src="{{ asset('web/images/' . $i . '.png') }}"
                                    width="88"
                                    height="88"
                                    class="img-fluid"
                                    alt="Customer {{ $i }}"
                                >
                            </picture>
                        </div>
                    @endfor

                    <div class="testimonial-nav-item">
                        <picture>
                            <img
                                loading="lazy"
                                src="{{asset('web/images/2.png')}}"
                                width="88"
                                height="88"
                                class="img-fluid"
                                alt="Customer 2"
                            >
                        </picture>
                    </div>
                </div>
            </div>

            <div class="testimonial-wrapper">
                <div class="head">
                    <span>Testimonials</span>
                    <h2>Everything You Need to Know About
                        Our Happy Feedbacks</h2>
                </div>
                <div class="testimonial-slider">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="testimonial-slider-item">
                            <div class="testimonial-content">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s.
                            </div>

                            <div class="info">
                                <picture>
                                    <img
                                        loading="lazy"
                                        src="{{ asset('web/images/' . $i . '.png') }}"
                                        width="80"
                                        height="80"
                                        alt="Testimonial {{ $i }}"
                                    >
                                </picture>

                                <div>
                                    <p>Patrick Nerokie</p>
                                    <span>CEO of Kingdom Advisors</span>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</section>