@if($services->isNotEmpty())
    <!-- service section starts here      -->
    <section class="servicesWhatwedo">
        <div class="container">
            <div class="row what_we_do_section">
                <div class="col-md-4">
                    <div class="smallHeading h6">Services</div>
                    <h2>WHAT <br> WE DO ?</h2>
                </div>
                <!-- what_we_do_slider -->
                <div class="col-md-8">
                    <div class="slider slider-nav">
                        @foreach($services as $service)
                            <div class="servicesIcons">
                                <picture>
                                    @if($service->icon_webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/service/icon/webp/'.rawurlencode($service->icon_webp_image)) }}">
                                    @endif
                                    <img loading='lazy' 
                                        src="{{ $service->icon_image ? asset('uploads/service/icon/'.$service->icon_image) : 'default image'}}"
                                        class="lazy loaded" data-ll-status="loaded"
                                        alt="{{ $service->icon_image_meta_tag }}" width="63" height="63" class="img-fluid">
                                </picture>
                                <div class="h6">{{ $service->title }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section ends here      -->
    <!-- service foundry section starts here  -->
    <section class="servicesFoundry">
        <div class="container-fluid">
            <div class="row foundry_section">
                <div class="slider slider-for">
                    @foreach($services as $service)
                        <div>
                            <div class="row paddingSpace">
                                <div class="col-lg-6 col-md-12 imgfoundryLeft">
                                    <div class="imgfoundryLeftImage">
                                        <picture>
                                            @if($service->webp_image)
                                                <source type="image/webp"
                                                        srcset="{{ asset('uploads/service/webp/'.rawurlencode($service->webp_image)) }}">
                                            @endif
                                            <img loading='lazy' 
                                                src="{{ $service->image ? asset('uploads/service/'.$service->image) : 'default image'}}"
                                                class="lazy loaded img-fluid" data-ll-status="loaded"
                                                alt="{{ $service->image_meta_tag }}" width="950" height="576">
                                        </picture>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 foundryRight">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-12 foundryRightContent">
                                            <h3>{{ $service->title }}</h3>
                                            <p>{!! $service->home_description !!}</p>
                                            <a href="{{ url('services/'.$service->short_url) }}">
                                                <button class="primary_button">Read More</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- service foundry section ends here  -->
@endif
