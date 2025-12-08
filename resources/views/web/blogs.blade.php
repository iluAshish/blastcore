@extends('web.layouts.main')

@section('content')
<section class="inner-banner text-center">
    <picture><img loading="lazy"  src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
            <h1>Our Blog</h1>
        <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
            <li><a href="{{ route('index')}}">Home</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </div>
</section>


<section class="blog-posts commonPadding-120 ">
    <div class="container-ctn">
        <div class="blog-posts-latest d-flex flex-wrap justify-content-between">
            <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                <picture>
                    <img loading="lazy" src="{{asset('web/images/blog/0.jpg')}}" width="939" height="430" alt="" class="img-fluid">
                </picture>
                <h3>How Do Paint Booth Manufacturers Guarantee Consistent Paint Finishes Every Time?</h3>
                <p>What makes sure that every product leaving the paint line with perfect and consistent? A perfect paint finish in any space, like automotive and aerospace, is considered a reflection of quality and craftsmanship.</p>
                <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                    <div class="d-flex flex-wrap" >
                        <div class="author-image"><img loading="lazy"  src="{{asset('web/images/blog/author/3.png')}}" alt="">Stephen Robles</div>
                        <span>October 11, 2024</span>
                    </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                        </button>
                </div>
            </a>

            <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-industrial-blower-fans-in-dubai']) }}">
                <picture>
                    <img loading="lazy"  src="{{asset('web/images/blog/01.jpg')}}" width="939" height="430" alt="" class="img-fluid">
                </picture>
                <h3>How to Select the Perfect Compressor Size for Efficient Sandblasting</h3>
                <p>Nowadays, sandblasting is widely used in various industries in the UAE, like construction, marine, and oil & gas, for surface cleaning ....</p>
                <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                    <div class="d-flex flex-wrap" >
                        <div class="author-image"> <i><img loading="lazy"  src="{{asset('web/images/blog/author/2.png')}}" alt=""></i>Andrew John</div>
                        <span>September 29 2025</span>
                    </div>
                    <button class="load-more mt-0 d-flex align-items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                    </button>
                </div>
            </a>
            </div>

            <div class="blog-posts-old commonPadding-120 pb-0 d-flex flex-wrap">
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/1.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>What are the standard abrasive options for working on wood and painted surfaces?</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                            <div class="d-flex flex-wrap" >
                        <div class="author-image"> <i><img loading="lazy"  src="{{asset('web/images/blog/author/3.png')}}" alt=""></i> Aleena Jack</div>
                        <span>Aug 30,2025</span>   </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/2.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>How to Select the Right Grit Size for Your Sandblasting Material?</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <i><img loading="lazy"  src="{{asset('web/images/blog/author/4.png')}}" alt=""></i> Elita Betty</div>
                        <span>Aug 27,2025</span>   </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/3.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>What are the standard abrasive options for working on wood and painted surfaces?</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/5.png')}}" alt="">Sameera Lee</div>
                        <span>July 24, 2025</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/4.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>What Are the Best Paint Options to Use in Spray Booths for a Perfect Finish?</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/1.png')}}" alt=""> James Alen</div>
                        <span>July 18, 2025</span>   </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/5.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>Expert Tips for Avoiding Scratches by Using Coated Abrasives on Soft Metals</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/5.png')}}" alt=""> Albert Don</div>
                        <span>May 27, 2025</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/6.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>How Industrial Blower Fans in Dubai Are Transforming Ventilation Systems</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/5.png')}}" alt=""> James Alen</div>
                        <span>May 20, 2025</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/7.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>Surface Finishing Technology Utilizing Sandblasting Equipment in Dubai</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/2.png')}}" alt=""> Julia Mickle</div>
                        <span>February 14, 2025</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/8.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>The future of abrasives: trends to watch in the UAE market</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/5.png')}}" alt=""> Amez Jan</div>
                        <span>January 23, 2025</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>

                </a>
                <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => 'how-choosing-the-right-steel-shot-balance-increases-your-blasting-performance']) }}">
                    <picture>
                        <img loading="lazy"  src="{{asset('web/images/blog/9.jpg')}}" width="546" height="288" alt="" class="img-fluid">
                    </picture>
                    <h3>How to Select the Right Blast Room Supplier: Key Factors to Consider</h3>
                    <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                                         <div class="d-flex flex-wrap" >
                        <div class="author-image"> <img loading="lazy"  src="{{asset('web/images/blog/author/1.png')}}" alt=""> Nora Salomi</div>
                        <span>December 17, 2024</span>
                           </div>
                        <button class="load-more mt-0 d-flex align-items-center">
                                   Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                                </button>
                    </div>
                </a>
            </div>
            <button class="load-more w-fit mx-auto d-flex align-items-center">
                Load More 
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
            </button>

        </div>
</section>

@endsection