
@if($products->isNotEmpty())
        <div class="d-flex flex-wrap w-100">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        <picture>
                            @if($product->activeFirstImage->webp_image)
                            <source  loading="lazy" src="{{ asset('uploads/product/image/webp/' . $product->id . '/'.rawurlencode($product->activeFirstImage->webp_image)) }}" width="93" height="129" class="img-fluid" alt="Coffee Machines">
                            @endif
                            <img loading="lazy" src="{{ $product->activeFirstImage->image ? asset('uploads/product/image/' . $product->id . '/'.$product->activeFirstImage->image) : 'default image'}}" width="93" height="129" class="img-fluid" alt="{{ $product->activeFirstImage->image_meta_tag }}">
                        </picture>
                        <i>
                            <img loading="lazy"  src="{{ $product->brand->image ? asset('uploads/product/brand/'.$product->brand->image) : asset('web/images/no-image.png') }}" width="65" height="35" alt="">
                        </i>
                    </div>
                    <div class="product-details">
                        <h3>{{$product->title}}</h3>
                
                    </div>
                    <div class="product-button-wrap">
                        <a href="{{ route('productDetail', ['short_url' => $product->short_url, 'category' => $product->category->short_url]) }}" class="arrow-btn" tabindex="0">Learn More</a>
                        <a  data-bs-toggle="modal" href="#ProductEnquiryForm" role="button" class="ebtn theme-btn theme-bg"
                            tabindex="0">Enquiry</a>
                    </div>
                </div>

            @endforeach
            
        </div>
        <input type="hidden" id="loading_offset" name="offset" value="{{ $offset }}">
        <input type="hidden" id="totalCount" value="{{$totalProducts}}">
        @if($totalProducts>12)
            <div class="col-md-12 d-flex justify-content-center">

                <button type="button" class="load-more w-fit mx-auto d-flex align-items-center primary_button" id="view_more_products">
                    Load More
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14"
                            viewBox="0 0 18 14" fill="none">
                        <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z"
                                fill="#304B9F"/>
                    </svg>
                </button>
            </div>
        @endif

 

@endif
