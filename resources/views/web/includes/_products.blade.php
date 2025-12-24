<section class="products commonPadding">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between align-items-end products-intro">
            <div class="head">
                <span>Our Products</span>
                <h2>Discover our Featured Products</h2>
            </div>
            <div class="products-content">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.
            </div>
            <div class="button-wrapper">
                <a href="{{route('products')}}" class="btn theme-btn theme-bg">See all products</a>
            </div>
        </div>

        <div class="products-slider">
            <!-- Product cards (content unchanged, small cleanup) -->
            @foreach($featured_products as $product)
                <div class="products-slider-card">
                    <div class="products-slider-card-header">
                         <picture>
                            @if($product->activeFirstImage->webp_image)
                            <source  loading="lazy" src="{{ asset('uploads/product/image/webp/' . $product->id . '/'.rawurlencode($product->activeFirstImage->webp_image)) }}" width="93" height="129" class="img-fluid" alt="Coffee Machines">
                            @endif
                            <img loading="lazy" src="{{ $product->activeFirstImage->image ? asset('uploads/product/image/' . $product->id . '/'.$product->activeFirstImage->image) : 'default image'}}" width="93" height="129" class="img-fluid" alt="{{ $product->activeFirstImage->image_meta_tag }}">
                        </picture>
                        
                        <p>Featured Products</p>
                        <i>
                            <img loading="lazy" src="{{ $product->brand->image ? asset('uploads/product/brand/'.$product->brand->image) : asset('web/images/no-image.png') }}" width="65" height="35" alt="Brand logo 1">
                        </i>
                    </div>
                    <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                        <h3>{{$product->title}}</h3>
                        <a href="{{ route('productDetail', ['short_url' => $product->short_url, 'category' => $product->category->short_url]) }}" class="product-btn position-relative" aria-label="View {{$product->title}}"></a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Products slider progress -->
        <div class="services-slider-progress" aria-hidden="true">
            <div class="progress-track">
                <span class="progress-fill sr-only"></span>
            </div>

            <button class="progress-arrow products-prev" type="button" aria-label="Previous products">
                <!-- SVG unchanged -->
                <!-- ... -->
            </button>
            <button class="progress-arrow products-next" type="button" aria-label="Next products">
                <!-- SVG unchanged -->
                <!-- ... -->
            </button>
        </div>
    </div>
</section>