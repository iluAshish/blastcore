@if (isset($testimonials) && $testimonials->count() > 0)
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
                    @foreach ($testimonials as $i => $testimonial)
                        <div class="testimonial-nav-item">
                            <picture>
                                <img
                                    loading="lazy"
                                    src="{{ asset('uploads/home/testimonial/' . $testimonial->image) }}"
                                    width="88"
                                    height="88"
                                    class="img-fluid"
                                    alt="{{ $testimonial->image_attribute ?? $testimonial->name }}"
                                >
                            </picture>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="testimonial-wrapper">
                <div class="head">
                    <span>Testimonials</span>
                    <h2>Everything You Need to Know About
                        Our Happy Feedbacks</h2>
                </div>
                <div class="testimonial-slider">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-slider-item">
                            <div class="testimonial-content">
                                {!! $testimonial->description !!}
                            </div>

                            <div class="info">
                                <picture>
                                    <img
                                        loading="lazy"
                                        src="{{ asset('uploads/home/testimonial/' . $testimonial->image) }}"
                                        width="80"
                                        height="80"
                                        alt="{{ $testimonial->image_attribute ?? $testimonial->name }}"
                                    >
                                </picture>

                                <div>
                                    <p>{{ $testimonial->name }}</p>
                                    <span>{{ $testimonial->position }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
</section>

@endif