@extends('web.layouts.main')

@section('content')

    <!-- banner section starts here  -->
    <section class="bannerAllpages">
        <div class="bannerbackgroundBG">
            <img src="{{asset('web/images/blogs/banner.jpg')}}" alt="banner image">
        </div>
        <div class="container">
            <div class="row bannerserviceContent">
                <div class="bannerserviceontentLeft">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><img
                                        src="{{asset('web/images/breadcrumb.svg')}}" alt="">
                                    HOME</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/products') }}">
                                    PRODUCTS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h2>PRODUCTS</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    <section class="productimageSlider">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 order-lg-1 order-md-1 productSliderLeft">
                    <div class="row">
                        <div class="col-md-12 productSliderLeftHead">
                            <h6>{{ $product->category->title }}</h6>
                            <h1>{{ $product->title }}</h1>
                            <p class="card-text">Brand : <span>{{ $product->brand->title }}</span></p>
                        </div>
                    </div>
                    @if($product->activeImages->isNotEmpty())
                        <div class="slider-for-product">
                            @foreach($product->activeImages->sortBy('sort_order') as $image)
                                <picture>
                                    @if($image->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/product/image/webp/' . $product->id . '/'.rawurlencode($image->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $image->image ? asset('uploads/product/image/' . $product->id . '/'.$image->image) : 'default image'}}"
                                        class="item-slick lazy loaded" data-ll-status="loaded"
                                        alt="{{ $image->image_meta_tag }}">
                                </picture>
                            @endforeach
                        </div>
                        <div class="slider-nav-product">
                            @foreach($product->activeImages->sortBy('sort_order') as $image)
                                <picture>
                                    @if($image->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/product/image/webp/' . $product->id . '/'.rawurlencode($image->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $image->image ? asset('uploads/product/image/' . $product->id . '/'.$image->image) : 'default image'}}"
                                        class="item-slick lazy loaded" data-ll-status="loaded"
                                        alt="{{ $image->image_meta_tag }}">
                                </picture>
                            @endforeach
                        </div>
                    @endif

                </div>
                <div class="col-lg-2 order-lg-2 order-md-3 "></div>
                <div class="col-lg-5 col-md-6 order-lg-3 order-md-2  productSliderRight">
                    <h3>Quick Enquiry.</h3>
                    <form action="#" id="productEnquiryForm">
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formName.svg')}}" alt="">
                            <input class="form-control required" type="text" name="name" id="name" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formPhone.svg')}}" alt="">
                            <input class="form-control required" type="text" name="phone" id="phone"
                                   placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formMail.svg')}}" alt="">
                            <input class="form-control required" type="text" name="email" id="email"
                                   placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <img src="{{asset('web/images/svg/formMessage.svg')}}" alt="">
                            <textarea class="form-control required" name="message" id="message" rows="3"
                                      placeholder="Message*"></textarea>
                        </div>
                        <input type="hidden" name="product_id" id="product_id" class="required"
                               value="{{ $product->id }}">
                        <button type="submit" class="primary_button" data-url="/product/enquiry" id="contact_form_btn">
                            Contact Now
                        </button>
                    </form>
                    @if($product->brochure || $siteInformation->product_brochure)
                        <div class="contentForm">
                            <a href="{{ $product->brochure ? asset('uploads/product/brochure/'. $product->brochure) : asset('uploads/site/product_brochure/' . $siteInformation->product_brochure) }}"
                               target="_blank">
                                <h4>Brochure <img src="{{asset('web/images/products/broushurearrow.svg')}}" alt=""></h4>
                                <h4>Download <img src="{{asset('web/images/products/downloadarrow.svg')}}" alt=""></h4>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>


    <section class="singleproductsContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{!! $product->first_description !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- key features section starts here  -->
    @if($product->activeFeatures->isNotEmpty())
        <section class="keyFeature">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Key Features</h4>
                    </div>
                    <div class="col-md-12">
                        <ol>
                            @foreach($product->activeFeatures->sortBy('sort_order') as $feature)
                                <li><p>{!! $feature->description !!}</p></li>
                            @endforeach
                        </ol>
                    </div>

                </div>
            </div>
        </section>
    @endif

    <!-- key features section ends here  -->


    <section class="singleproductsanotherContent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ $product->second_title }}</h4>
                    <p>{!! $product->second_description !!}</p>
                </div>
            </div>
        </div>
    </section>

    @if($product->activeGalleries->isNotEmpty())
        <section class="fullproductsliderSection">
            <div class="productsSectionslider">
                @foreach($product->activeGalleries as $gallery)
                    <div class="products_card">
                        @if($gallery->video_url)
                            <a href="{{ $gallery->video_url }}" data-fancybox="group">
                                <picture>
                                    @if($gallery->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/product/gallery/webp/' . $product->id . '/'.rawurlencode($gallery->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $gallery->image ? asset('uploads/product/gallery/' . $product->id . '/'.$gallery->image) : 'default image'}}"
                                        class="lazy loaded" data-ll-status="loaded"
                                        alt="{{ $gallery->image_meta_tag }}">
                                </picture>
                                <button type="button" class="videoPopup"><img
                                        src="{{asset('web/images/svg/videobutton.svg')}}"
                                        alt=""></button>
                            </a>
                        @else
                            <a href="{{ asset('uploads/product/gallery/' . $product->id . '/'.$gallery->image) }}"
                               data-fancybox="group">
                                <picture>
                                    @if($gallery->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/product/gallery/webp/' . $product->id . '/'.rawurlencode($gallery->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $gallery->image ? asset('uploads/product/gallery/' . $product->id . '/'.$gallery->image) : 'default image'}}"
                                        class="lazy loaded" data-ll-status="loaded"
                                        alt="{{ $gallery->image_meta_tag }}">
                                </picture>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if($product->activeRelated->isNotEmpty())
        <!-- related products section starts here  -->
        <section class="relatedProdcts">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Related Products</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="relatedproductSlider">
                            @foreach($product->activeRelated as $related)
                                <div class="relatedCard">
                                    <div class="card">
                                        @if($related->activeFirstImage)
                                            <picture>
                                                @if($related->activeFirstImage->webp_image)
                                                    <source type="image/webp"
                                                            srcset="{{ asset('uploads/product/image/webp/' . $related->id . '/'.rawurlencode($related->activeFirstImage->webp_image)) }}">
                                                @endif
                                                <img
                                                    src="{{ $related->activeFirstImage->image ? asset('uploads/product/image/' . $related->id . '/'.$related->activeFirstImage->image) : 'default image'}}"
                                                    class="card-img-top lazy loaded" data-ll-status="loaded"
                                                    alt="{{ $related->activeFirstImage->image_meta_tag }}">
                                            </picture>
                                        @endif
                                        <div class="card-body">
                                            <p class="card-text">Brand : <span>{{ $related->brand->title }}</span></p>
                                            <h6 class="card-title">{{ $related->title }}</h6>
                                            <ul>
                                                <li>
                                                    <a href="{{url('shop/'. $related->category->short_url.'/'. $related->short_url)}}">VIEW
                                                        DETAILS</a>
                                                    <span> | </span>
                                                    <a href="#">
                                                        <button type="button" class="" data-bs-toggle="modal"
                                                                data-product_id="{{ $related->id }}"
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
                    </div>
                </div>
            </div>
        </section>
        <!-- related products section ends here  -->
    @endif

@endsection
