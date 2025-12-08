@if($services->isNotEmpty())
    <!-- service section starts here      -->
    <section class="servicesWhatwedo">
        <div class="container">
            <div class="row what_we_do_section">
                <div class="col-md-4">
                    <h6 class="smallHeading">Services</h6>
                    <h2>WHAT <br> WE DO ?</h2>
                </div>
                <!-- what_we_do_slider -->
                <div class="col-md-8">
                    <div class="slider what_we_do_slider">
                        @foreach($services as $service)
                            <div class="servicesIcons">
                                <picture>
                                    @if($service->icon_webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/service/icon/webp/'.rawurlencode($service->icon_webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $service->icon_image ? asset('uploads/service/icon/'.$service->icon_image) : 'default image'}}"
                                        class="lazy loaded" data-ll-status="loaded"
                                        alt="{{ $service->icon_image_meta_tag }}">
                                </picture>
                                <h6>{{ $service->title }}</h6>
                                <div class="mobileOnlyLink">
                                    <a href="{{ url('services/'.$service->short_url) }}">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section ends here  -->
@endif
