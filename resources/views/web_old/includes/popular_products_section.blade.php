@if($featured_products->isNotEmpty())
    <!-- product section starts here  -->
    <section class="popularProducts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <div class="smallHeading h6">Products</div>
                        </li>
                        <li>
                            <h2>POPULAR PRODUCTS</h2>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- mobile view only  -->
            <div class="productSlider productCards">
                @foreach($featured_products as $featured_product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            @if($featured_product->activeFirstImage)
                                <picture>
                                    @if($featured_product->activeFirstImage->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/product/image/webp/' . $featured_product->id . '/'.rawurlencode($featured_product->activeFirstImage->webp_image)) }}">
                                    @endif
                                    <img loading='lazy' 
                                        src="{{ $featured_product->activeFirstImage->image ? asset('uploads/product/image/' . $featured_product->id . '/'.$featured_product->activeFirstImage->image) : 'default image'}}"
                                        class="card-img-top lazy loaded img-fluid" data-ll-status="loaded"
                                        alt="{{ $featured_product->activeFirstImage->image_meta_tag }}" width="197" height="153" >
                                </picture>
                            @endif
                            <div class="card-body">
                                <p class="card-text">Brand : <span>{{ $featured_product->brand->title }}</span></p>
                                <h3 class="card-title h6">{{ $featured_product->title }}</h3>
                                <ul>
                                    <li>
                                        <a href="{{url('shop/'. $featured_product->category->short_url.'/'.  $featured_product->short_url)}}">VIEW
                                            DETAILS</a>
                                        <span> | </span>
                                        <a href="#">
                                            <button type="button" class="" data-bs-toggle="modal"
                                                    data-product_id="{{ $featured_product->id }}"
                                                    id="productEnquiryModalButton"
                                                    data-bs-target="#staticBackdrop">ENQUIRY
                                            </button>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- mobile view only  -->

            <!-- desktop view  -->
            <div class="popularproductsSlider">
                <div class="productCards">
                    <div class="row">
                        @foreach($featured_products as $featured_product)
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card">
                                    @if($featured_product->activeFirstImage)
                                        <picture>
                                            @if($featured_product->activeFirstImage->webp_image)
                                                <source type="image/webp"
                                                        srcset="{{ asset('uploads/product/image/webp/' . $featured_product->id . '/'.rawurlencode($featured_product->activeFirstImage->webp_image)) }}">
                                            @endif
                                            <img loading='lazy' 
                                                src="{{ $featured_product->activeFirstImage->image ? asset('uploads/product/image/' . $featured_product->id . '/'.$featured_product->activeFirstImage->image) : 'default image'}}"
                                                class="card-img-top lazy loaded img-fluid" data-ll-status="loaded"
                                                alt="{{ $featured_product->activeFirstImage->image_meta_tag }}" width="222" height="172">
                                        </picture>
                                    @endif
                                    <div class="card-body">
                                        <p class="card-text">Brand : <span>{{ $featured_product->brand->title }}</span>
                                        </p>
                                        <h3 class="card-title h6">{{ $featured_product->title }}</h3>
                                        <ul>
                                            <li>
                                                <a href="{{url('shop/'. $featured_product->category->short_url.'/'.  $featured_product->short_url)}}">VIEW
                                                    DETAILS</a><span> | </span>
                                                <button type="button" class="" data-bs-toggle="modal"
                                                        data-product_id="{{ $featured_product->id }}"
                                                        id="productEnquiryModalButton"
                                                        data-bs-target="#staticBackdrop">ENQUIRY
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- desktop view  -->
        </div>
    </section>
    <!-- product section ends here  -->
@endif
