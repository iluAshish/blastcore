<section class="services commonPadding">
    <div class="container-side">
        <div class="head">
            <span>What we offer</span>
            <h2>Explore our services</h2>
        </div>

        <div class="services-slider">
            @foreach($services as $service)
                <div class="services-card">
                    <div class="services-description">
                        <h3>{{$service->title}}</h3>
                        {!! Str::limit(strip_tags($service->home_description), 50) !!}
                        
                    </div>
                    <a href="{{ route('serviceDetail', ['short_url' => $service->short_url]) }}" class="chevron-btn">Learn More</a>
                </div>

            @endforeach
        </div>
    </div>

    <div class="container-ctn">
        <!-- Services slider progress -->
        <div class="services-slider-progress" aria-hidden="true">
            <div class="progress-track">
                <span class="progress-fill sr-only"></span>
            </div>

            <button class="progress-arrow progress-prev" type="button" aria-label="Previous services">
                <!-- SVG unchanged -->
                <!-- ... -->
            </button>
            <button class="progress-arrow progress-next" type="button" aria-label="Next services">
                <!-- SVG unchanged -->
                <!-- ... -->
            </button>
        </div>
    </div>
</section>