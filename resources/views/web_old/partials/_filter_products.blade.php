<div class="topHeadcontent">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-8 order-md-1 order-2">
            <h4>Products <br>
                <span>
                    SHOWING @if($offset) 1-<span id="product_count">{{ $offset }}</span>OF @endif
                    {{ $totalProducts }} RESULTS
                </span>
            </h4>
        </div>
        <div class="col-4 filterIcon order-md-2 order-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSidebar">
                <img src="{{asset('web/images/products/filterbyicon.svg')}}" alt=""> Filter By
            </button>
        </div>
        <div class="col-lg-6 col-md-12 col-12 order-md-3 order-1 topHeadcontentForm">
            <form action="#" id="productPageSearch">
                <div class="form-group mb-4">
                    <input id="productSearch" type="text" placeholder="Search here ..."
                           class="form-control form-control-underlined search-input">
                    <button><img src="{{asset('web/images/svg/productsearch.svg')}}" alt="">
                    </button>
                    <ul class="results" id="searchResults"></ul>
                </div>
            </form>
        </div>
    </div>
</div>
@if($products->isNotEmpty())
    <div class="productslistItems">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        @if($product->activeFirstImage)
                            <picture>
                                @if($product->activeFirstImage->webp_image)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/product/image/webp/' . $product->id . '/'.rawurlencode($product->activeFirstImage->webp_image)) }}">
                                @endif
                                <img
                                    src="{{ $product->activeFirstImage->image ? asset('uploads/product/image/' . $product->id . '/'.$product->activeFirstImage->image) : 'default image'}}"
                                    class="card-img-top lazy loaded" data-ll-status="loaded"
                                    alt="{{ $product->activeFirstImage->image_meta_tag }}">
                            </picture>
                        @endif
                        <div class="card-body">
                            <p class="card-text">Brand : <span>{{ $product->brand->title }}</span></p>
                            <h6 class="card-title">{{ $product->title }}</h6>
                            <ul>
                                <li><a href="{{url('shop/'. $product->category->short_url.'/'.  $product->short_url)}}">VIEW
                                        DETAILS</a>
                                    <span> | </span>
                                    <a href="#">
                                        <button type="button" class="" data-bs-toggle="modal"
                                                data-product_id="{{ $product->id }}"
                                                id="productEnquiryModalButton"
                                                data-bs-target="#staticBackdrop">ENQUIRY
                                        </button>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if($loop->last)
                    <div class="appendHere{{ $offset }}"></div>
                @endif
            @endforeach
            <input type="hidden" id="loading_offset" name="offset" value="{{ $offset }}">
            <input type="hidden" id="totalCount" value="{{$totalProducts}}">
            @if($totalProducts>12)
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" class="primary_button" id="view_more_products">LOAD MORE</button>
                </div>
            @endif
        </div>
    </div>
@endif
