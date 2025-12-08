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
                <a href="products.php" class="btn theme-btn theme-bg">See all products</a>
            </div>
        </div>

        <div class="products-slider">
            <!-- Product cards (content unchanged, small cleanup) -->
            <div class="products-slider-card">
                <div class="products-slider-card-header">
                    <picture>
                        <img loading="lazy" src="{{asset('web/images/products/1.png')}}" width="282" height="219" class="img-fluid" alt="Air Manifold">
                    </picture>
                    <p>Featured Products</p>
                    <i>
                        <img loading="lazy" src="{{asset('web/images/products/logo-1.png')}}" width="65" height="35" alt="Brand logo 1">
                    </i>
                </div>
                <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                    <h3>Air Manifold</h3>
                    <a href="products.php" class="product-btn position-relative" aria-label="View Air Manifold"></a>
                </div>
            </div>

            <div class="products-slider-card">
                <div class="products-slider-card-header">
                    <picture>
                        <img loading="lazy" src="{{asset('web/images/products/2.png')}}" width="282" height="219" class="img-fluid" alt="Sand Blasting Machines and Accessories">
                    </picture>
                    <i>
                        <img loading="lazy" src="{{asset('web/images/products/logo-1.png')}}" width="65" height="35" alt="Brand logo 1">
                    </i>
                </div>
                <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                    <h3>Sand Blasting Machines and Accessories</h3>
                    <a href="products.php" class="product-btn position-relative" aria-label="View Sand Blasting Machines"></a>
                </div>
            </div>

            <div class="products-slider-card">
                <div class="products-slider-card-header">
                    <picture>
                        <img loading="lazy" src="{{asset('web/images/products/3.png')}}" width="282" height="219" class="img-fluid" alt="Astro Nova Helmet">
                    </picture>
                    <i>
                        <img loading="lazy" src="{{asset('web/images/products/logo-2.png')}}" width="65" height="35" alt="Brand logo 2">
                    </i>
                </div>
                <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                    <h3>Astro Nova Helmet</h3>
                    <a href="products.php" class="product-btn position-relative" aria-label="View Astro Nova Helmet"></a>
                </div>
            </div>

            <div class="products-slider-card">
                <div class="products-slider-card-header">
                    <picture>
                        <img loading="lazy" src="{{asset('web/images/products/4.png')}}" width="282" height="219" class="img-fluid" alt="CO2 Monitor">
                    </picture>
                    <i>
                        <img loading="lazy" src="{{asset('web/images/products/logo-3.png')}}" width="65" height="35" alt="Brand logo 3">
                    </i>
                </div>
                <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                    <h3>CO2 Monitor</h3>
                    <a href="products.php" class="product-btn position-relative" aria-label="View CO2 Monitor"></a>
                </div>
            </div>

            <!-- Duplicate example (can be removed or updated) -->
            <div class="products-slider-card">
                <div class="products-slider-card-header">
                    <picture>
                        <img loading="lazy" src="{{asset('web/images/products/1.png')}}" width="282" height="219" class="img-fluid" alt="Air Manifold">
                    </picture>
                    <p>Featured Products</p>
                    <i>
                        <img loading="lazy" src="{{asset('web/images/products/logo-1.png')}}" width="65" height="35" alt="Brand logo 1">
                    </i>
                </div>
                <div class="products-slider-details d-flex flex-wrap align-items-center justify-content-between">
                    <h3>Air Manifold</h3>
                    <a href="products.php" class="product-btn position-relative" aria-label="View Air Manifold"></a>
                </div>
            </div>
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