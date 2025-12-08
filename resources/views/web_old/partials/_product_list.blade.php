@if($products->isNotEmpty())
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
                        <li><a href="{{url('shop/'. $product->category->short_url.'/'. $product->short_url)}}">VIEW
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
            <div class="appendHere{{$nextOffset}}"></div>
        @endif
    @endforeach
    <script>
        $('#product_count').html({{ $offset+ $products->count()}});
    </script>
@endif
