@extends('web.layouts.main')

@section('content')

{{-- =================== TOP BANNER (NEW DESIGN) =================== --}}
<section class="inner-banner text-center">
    <picture>
        <img loading="lazy" src="{{ asset('web/images/header.jpg') }}" alt="">
    </picture>
    <div class="container-ctn">
        <h1>Our Products</h1>
        <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="#">Our Products</a></li>
        </ul>
    </div>
</section>

{{-- =================== FILTER + LISTING FORM =================== --}}
<form action="#" method="post" id="filter-form">
    @csrf

    <section class="product-listing commonPadding-120">
        <div class="container-ctn">
            <div class="d-flex flex-wrap justify-content-between">

                {{-- ========== LEFT FILTER (Sidebar) ========== --}}
                <aside class="filter-card productsListLeft" aria-labelledby="filterTitle">
                    <button class="close-filter d-md-none" id="closeFilter">&times;</button>

                    {{-- CATEGORY TITLE --}}
                    <p>
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 10C18.6569 10 20 8.65685 20 7C20 5.34315 18.6569 4 17 4C15.3431 4 14 5.34315 14 7C14 8.65685 15.3431 10 17 10Z"
                                    stroke="#304B9F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M7 20C8.65685 20 10 18.6569 10 17C10 15.3431 8.65685 14 7 14C5.34315 14 4 15.3431 4 17C4 18.6569 5.34315 20 7 20Z"
                                    stroke="#304B9F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M14 14H20V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H15C14.7348 20 14.4804 19.8946 14.2929 19.7071C14.1054 19.5196 14 19.2652 14 19V14ZM4 4H10V9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10H5C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9V4Z"
                                    stroke="#304B9F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        Category
                    </p>

                    <div class="product-listing-accordion">
                        @if($main_product_categories->isNotEmpty())
                            <div class="accordion" id="accordionExample">
                                @foreach($main_product_categories as $main_product_category)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_{{ $main_product_category->id }}">
                                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#cat_{{ $main_product_category->id }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                                    aria-controls="cat_{{ $main_product_category->id }}">
                                                {{ $main_product_category->title }}
                                            </button>
                                        </h2>
                                        <div id="cat_{{ $main_product_category->id }}"
                                             class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                             aria-labelledby="heading_{{ $main_product_category->id }}">
                                            <div class="accordion-body">
                                                <ul>
                                                    {{-- MAIN CATEGORY --}}
                                                    <li>
                                                        <label class="checkbox filter-option">
                                                            <input type="checkbox"
                                                                   name="product_category_id[]"
                                                                   id="category_{{ $main_product_category->id }}"
                                                                   data-field="product_category_id"
                                                                   value="{{ $main_product_category->id }}"
                                                                   data-label="Product-Category"
                                                                   data-title="{{ $main_product_category->title }}"
                                                                   class="filterItem">
                                                            <span class="fake-radio" aria-hidden="true"></span>
                                                            <span class="label-text">
                                                                {{ $main_product_category->title }}
                                                            </span>
                                                        </label>
                                                    </li>

                                                    {{-- SUB CATEGORIES --}}
                                                    @if($main_product_category->activeChildren)
                                                        <li>
                                                            <ul>
                                                                @foreach($main_product_category->activeChildren as $subCategory)
                                                                    <li>
                                                                        <label class="checkbox filter-option ms-3">
                                                                            <input type="checkbox"
                                                                                   name="product_category_id[]"
                                                                                   id="category_{{ $subCategory->id }}"
                                                                                   data-field="product_category_id"
                                                                                   value="{{ $subCategory->id }}"
                                                                                   data-label="Product-Category"
                                                                                   data-title="{{ $subCategory->title }}"
                                                                                   class="filterItem">
                                                                            <span class="fake-radio" aria-hidden="true"></span>
                                                                            <span class="label-text">
                                                                                {{ $subCategory->title }}
                                                                            </span>
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
                        @endif
                    </div>

                    {{-- ========== BRANDS ========== --}}
                    @if($productBrands->isNotEmpty())
                        <div class="brands productBrands mt-4">
                            <p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                        <path d="M9 7C9 7.79565 9.31607 8.55871 9.87868 9.12132C10.4413 9.68393 11.2044 10 12 10C12.7956 10 13.5587 9.68393 14.1213 9.12132C14.6839 8.55871 15 7.79565 15 7C15 6.20435 14.6839 5.44129 14.1213 4.87868C13.5587 4.31607 12.7956 4 12 4C11.2044 4 10.4413 4.31607 9.87868 4.87868C9.31607 5.44129 9 6.20435 9 7ZM14 16C14 16.7956 14.3161 17.5587 14.8787 18.1213C15.4413 18.6839 16.2044 19 17 19C17.7956 19 18.5587 18.6839 19.1213 18.1213C19.6839 17.5587 20 16.7956 20 16C20 15.2044 19.6839 14.4413 19.1213 13.8787C18.5587 13.3161 17.7956 13 17 13C16.2044 13 15.4413 13.3161 14.8787 13.8787C14.3161 14.4413 14 15.2044 14 16ZM4 16C4 16.394 4.0776 16.7841 4.22836 17.1481C4.37913 17.512 4.6001 17.8427 4.87868 18.1213C5.15726 18.3999 5.48797 18.6209 5.85195 18.7716C6.21593 18.9224 6.60603 19 7 19C7.39397 19 7.78407 18.9224 8.14805 18.7716C8.51203 18.6209 8.84274 18.3999 9.12132 18.1213C9.3999 17.8427 9.62087 17.512 9.77164 17.1481C9.9224 16.7841 10 16.394 10 16C10 15.606 9.9224 15.2159 9.77164 14.8519C9.62087 14.488 9.3999 14.1573 9.12132 13.8787C8.84274 13.6001 8.51203 13.3791 8.14805 13.2284C7.78407 13.0776 7.39397 13 7 13C6.60603 13 6.21593 13.0776 5.85195 13.2284C5.48797 13.3791 5.15726 13.6001 4.87868 13.8787C4.6001 14.1573 4.37913 14.488 4.22836 14.8519C4.0776 15.2159 4 15.606 4 16Z"
                                              stroke="#304B9F" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                Brands
                            </p>
                            <div class="brand-logos row">
                                @foreach($productBrands as $productBrand)
                                        <label class="imageCheckbox brand">
                                            <input type="checkbox"
                                                   name="product_brand_id[]"
                                                   id="brand_{{ $productBrand->id }}"
                                                   data-field="product_brand_id"
                                                   value="{{ $productBrand->id }}"
                                                   data-label="Product-Brand"
                                                   data-title="{{ $productBrand->title }}"
                                                   class="filterItem">
                                            <span class="checkmark"></span>
                                            <picture>
                                                @if($productBrand->webp_image)
                                                    <source type="image/webp"
                                                            srcset="{{ asset('uploads/product/brand/webp/' . rawurlencode($productBrand->webp_image)) }}">
                                                @endif
                                                <img loading="lazy"
                                                     src="{{ $productBrand->image ? asset('uploads/product/brand/'.$productBrand->image) : asset('web/images/no-image.png') }}"
                                                     width="57" height="56"
                                                     class="img-fluid w-100"
                                                     alt="{{ $productBrand->image_meta_tag ?? $productBrand->title }}">
                                            </picture>
                                        </label>
                                  
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Hidden inputs for AJAX / load more --}}
                    <input type="hidden" id="loading_limit" name="limit" value="3">
                    <input type="hidden" id="input_field" name="input_field">
                    <input type="hidden" name="type" id="type" value="{{ $type ?? '' }}">
                    <input type="hidden" name="typeValue" id="typeValue" value="{{ $typeValue ?? '' }}">
                </aside>

                {{-- ========== RIGHT SIDE: PRODUCT LIST (AJAX target) ========== --}}
                <div class="product-listing-body d-flex flex-wrap productsListRight">
                    @include('web.partials._filter_products')

                </div>

            </div>
        </div>
    </section>

    <div class="filter-overlay" id="filterOverlay"></div>

    <div class="product-listing-header w-100 d-flex flex-wrap align-items-center justify-content-between">
        <button id="filterToggle" class="filter-btn d-lg-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none">
                <path d="M3 6h18M6 12h12M9 18h6" stroke="#333" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            Filter
        </button>
    </div>

</form>

@endsection
