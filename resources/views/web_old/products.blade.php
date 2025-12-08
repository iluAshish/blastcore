@extends('web.layouts.main')

@section('content')

    <!-- banner section starts here  -->
    <section class="bannerAllpages">
        <div class="bannerbackgroundBG">
            <img src="{{asset('web/images/products/banner.jpg')}}" alt="banner image">
        </div>
        <div class="container">
            <div class="row bannerserviceContent">
                <div class="bannerserviceontentLeft">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    <img src="{{asset('web/images/breadcrumb.svg')}}" alt="">
                                    HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">PRODUCTS</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h1>PRODUCTS</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    @if($featured_products)
        <!-- featured products section starts here  -->
        <section class="featuredProdcts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 featuredprodctsLeft">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Featured <br> Products</h4>
                                <img src="{{asset('web/images/products/featuredarrow.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 featuredprodctsRight">
                        <div class="featuredproductSlider">
                            @foreach($featured_products as $featured_product)
                                <div class="featuredCard">
                                    <div class="card">
                                        @if($featured_product->activeFirstImage)
                                            <picture>
                                                @if($featured_product->activeFirstImage->webp_image)
                                                    <source type="image/webp"
                                                            srcset="{{ asset('uploads/product/image/webp/' . $featured_product->id . '/'.rawurlencode($featured_product->activeFirstImage->webp_image)) }}">
                                                @endif
                                                <img
                                                    src="{{ $featured_product->activeFirstImage->image ? asset('uploads/product/image/' . $featured_product->id . '/'.$featured_product->activeFirstImage->image) : 'default image'}}"
                                                    class="card-img-top lazy loaded" data-ll-status="loaded"
                                                    alt="{{ $featured_product->activeFirstImage->image_meta_tag }}">
                                            </picture>
                                        @endif
                                        <div class="card-body">
                                            <p class="card-text">Brand :
                                                <span>{{ $featured_product->brand->title }}</span>
                                            </p>
                                            <h6 class="card-title">{{ $featured_product->title }}</h6>
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
                    </div>
                </div>
            </div>
        </section>
        <!-- featured products section ends here  -->
    @endif

    <form action="#" method="post" id="filter-form">
        <!-- modal full screen for product filter button starts here  -->
        <div class="modal fade modalSidebar" id="exampleModalSidebar" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container productsList">
                            <div class="row ">
                                <div class="col-12 productsListLeft">
                                    @if($main_product_categories->isNotEmpty())
                                        <div class="row productCategories">
                                            <h4>CATEGORIES</h4>
                                            <div class="accordion" id="accordionExample">
                                                @foreach($main_product_categories as $main_product_category)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="{{ $main_product_category->title }}">
                                                            <button
                                                                class="accordion-button {{ ($loop->iteration ==1)?'':'collapsed' }}"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#{{ $main_product_category->short_url }}"
                                                                aria-expanded="{{ ($loop->iteration ==1)?'true':'false' }}"
                                                                aria-controls="{{ $main_product_category->short_url }}">
                                                                {{ $main_product_category->title }}
                                                            </button>
                                                        </h2>
                                                        <div id="{{ $main_product_category->short_url }}"
                                                             class="accordion-collapse collapse {{ ($loop->iteration ==1)?'show':'' }}"
                                                             aria-labelledby="{{ $main_product_category->title }}">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox"
                                                                                   name="product_category_id[]"
                                                                                   id="category_{{$main_product_category->id}}"
                                                                                   data-field="product_category_id"
                                                                                   value="{{ $main_product_category->id }}"
                                                                                   data-label="Product-Category"
                                                                                   data-title="{{$main_product_category->title}}"
                                                                                   class="filterItem">
                                                                            {{ $main_product_category->title }}
                                                                        </label>
                                                                    </li>
                                                                    @if($main_product_category->activeChildren)
                                                                        <li>
                                                                            <ul class="">
                                                                                @foreach($main_product_category->activeChildren as $subCategory)
                                                                                    <li>
                                                                                        <label class="checkbox">
                                                                                            <input type="checkbox"
                                                                                                   name="product_category_id[]"
                                                                                                   id="category_{{$subCategory->id}}"
                                                                                                   data-field="product_category_id"
                                                                                                   value="{{ $subCategory->id }}"
                                                                                                   data-label="Product-Category"
                                                                                                   data-title="{{$subCategory->title}}"
                                                                                                   class="filterItem">
                                                                                            {{ $subCategory->title }}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- product categories ends here  -->
                                    @endif
                                    <br>
                                    @if($productBrands->isNotEmpty())
                                    <!-- brand starts here  -->
                                        <div class="row productBrands">
                                            <div class="clientsLogocards">
                                                <h5>BRANDS</h5>
                                                <div class="row">
                                                    @foreach($productBrands as $productBrand)
                                                        <div class="col-lg-4 col-md-6 col-4">
                                                            <label class="imageCheckbox">
                                                                <input type="checkbox" name="product_brand_id[]"
                                                                       id="brand_{{$productBrand->id}}"
                                                                       data-field="product_brand_id"
                                                                       value="{{ $productBrand->id }}"
                                                                       data-label="Product-Brand"
                                                                       data-title="{{$productBrand->title}}"
                                                                       class="filterItem">
                                                                <span class="checkmark"></span>
                                                                <picture>
                                                                    @if($productBrand->webp_image)
                                                                        <source type="image/webp"
                                                                                srcset="{{ asset('uploads/product/brand/webp/'.rawurlencode($productBrand->webp_image))}}">
                                                                    @endif
                                                                    <img
                                                                        src="{{ $productBrand->image ? asset('uploads/product/brand/'.$productBrand->image) : 'default image'}}"
                                                                        class="lazy loaded"
                                                                        data-ll-status="loaded"
                                                                        alt="{{ $productBrand->image_meta_tag }}">
                                                                </picture>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal full screen for product filter button ends here  -->

        <!-- products listing section starts here  -->
        <section class="productsList">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 productsListLeft">
                        @if($main_product_categories->isNotEmpty())
                            <div class="row productCategories">
                                <h4>CATEGORIES</h4>
                                <div class="accordion" id="accordionExample">
                                    @foreach($main_product_categories as $main_product_category)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="{{ $main_product_category->title }}">
                                                <button
                                                    class="accordion-button {{ ($loop->iteration ==1)?'':'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#{{ $main_product_category->short_url }}"
                                                    aria-expanded="{{ ($loop->iteration ==1)?'true':'false' }}"
                                                    aria-controls="{{ $main_product_category->short_url }}">
                                                    {{ $main_product_category->title }}
                                                </button>
                                            </h2>
                                            <div id="{{ $main_product_category->short_url }}"
                                                 class="accordion-collapse collapse {{ ($loop->iteration ==1)?'show':'' }}"
                                                 aria-labelledby="{{ $main_product_category->title }}">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>
                                                            <label class="checkbox">
                                                                <input type="checkbox"
                                                                       name="product_category_id[]"
                                                                       id="category_{{$main_product_category->id}}"
                                                                       data-field="product_category_id"
                                                                       value="{{ $main_product_category->id }}"
                                                                       data-label="Product-Category"
                                                                       data-title="{{$main_product_category->title}}"
                                                                       class="filterItem">
                                                                {{ $main_product_category->title }}
                                                            </label>
                                                        </li>
                                                        @if($main_product_category->activeChildren)
                                                            <li>
                                                                <ul class="">
                                                                    @foreach($main_product_category->activeChildren as $subCategory)
                                                                        <li>
                                                                            <label class="checkbox">
                                                                                <input type="checkbox"
                                                                                       name="product_category_id[]"
                                                                                       id="category_{{$subCategory->id}}"
                                                                                       data-field="product_category_id"
                                                                                       value="{{ $subCategory->id }}"
                                                                                       data-label="Product-Category"
                                                                                       data-title="{{$subCategory->title}}"
                                                                                       class="filterItem">
                                                                                {{ $subCategory->title }}
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- product categories ends here  -->
                        @endif
                        <br>
                        @if($productBrands->isNotEmpty())
                        <!-- brand starts here  -->
                            <div class="row productBrands">
                                <!-- <div class="productBrandsSlider"> -->
                                <div class="clientsLogocards">
                                    <h5>BRANDS</h5>
                                    <div class="row">
                                        @foreach($productBrands as $productBrand)
                                            <div class="col-lg-4 col-md-6 col-4 nopad text-center">
                                                <label class="imageCheckbox">
                                                    <input type="checkbox" name="product_brand_id[]"
                                                           id="brand_{{$productBrand->id}}"
                                                           data-field="product_brand_id"
                                                           value="{{ $productBrand->id }}"
                                                           data-label="Product-Brand"
                                                           data-title="{{$productBrand->title}}"
                                                           class="filterItem">
                                                    <span class="checkmark"></span>
                                                    <picture>
                                                        @if($productBrand->webp_image)
                                                            <source type="image/webp"
                                                                    srcset="{{ asset('uploads/product/brand/webp/'.rawurlencode($productBrand->webp_image)) }}">
                                                        @endif
                                                        <img
                                                            src="{{ $productBrand->image ? asset('uploads/product/brand/'.$productBrand->image) : 'default image'}}"
                                                            class="lazy loaded" data-ll-status="loaded"
                                                            alt="{{ $productBrand->image_meta_tag }}">
                                                    </picture>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- brand ends here  -->
                        @endif
                        <input type="hidden" id="loading_limit" name="limit" value="3">
                        <input type="hidden" id="input_field" name="input_field">
                        <input type="hidden" name="type" id="type" value="{{$type}}">
                        <input type="hidden" name="typeValue" id="typeValue" value="{{$typeValue}}">
                        <br>

                        @if($latest_products->isNotEmpty())
                        <!-- latest products starts here  -->
                            <div class="row productLatest">
                                <div class="productlatestSlider">
                                    <div class="latestproductcards">
                                        <h4>Latest Products</h4>
                                        <div class="row">
                                            @foreach($latest_products->take(5) as $latest_product)
                                                <div class="productslatestLogo">
                                                    <div class="row">
                                                        <div class="col-md-4 col-4 productslatestLogoLeft">
                                                            @if($latest_product->activeFirstImage)
                                                                <picture>
                                                                    @if($latest_product->activeFirstImage->webp_image)
                                                                        <source type="image/webp"
                                                                                srcset="{{ asset('uploads/product/image/webp/' . $latest_product->id . '/'.rawurlencode($latest_product->activeFirstImage->webp_image)) }}">
                                                                    @endif
                                                                    <img
                                                                        src="{{ $latest_product->activeFirstImage->image ? asset('uploads/product/image/' . $latest_product->id . '/'.$latest_product->activeFirstImage->image) : 'default image'}}"
                                                                        class="card-img-top lazy loaded"
                                                                        data-ll-status="loaded"
                                                                        alt="{{ $latest_product->activeFirstImage->image_meta_tag }}">
                                                                </picture>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-8 col-8 productslatestLogoRight">
                                                            <p class="card-text">Brand :
                                                                <span>{{ $latest_product->brand->title }}</span></p>
                                                            <h6 class="card-title">{{ $latest_product->title }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- latest products ends here  -->
                        @endif
                    </div>

                    <div class="col-lg-9 col-md-8 productsListRight">
                        @include('web.partials._filter_products')
                    </div>
                </div>
            </div>
        </section>
        <!-- products listing section ends here  -->
    </form>
@endsection
