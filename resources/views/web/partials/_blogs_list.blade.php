<div class="blog-posts-old commonPadding-120 pb-0 d-flex flex-wrap">
    @foreach($blogs as $blog) 
        <a class="blog-posts-card" href="{{ route('blogDetail', ['short_url' => $blog->short_url]) }}">
            <picture>
                <img loading="lazy"  src="{{asset('uploads/blog/image/'. $blog->image)}}" width="546" height="288" alt="{{$blog->image_meta_tag}}" class="img-fluid">
            </picture>
            <h3>{{$blog->title}}</h3>
            <div class="blog-post-meta d-flex flex-wrap justify-content-between">
                <div class="d-flex flex-wrap" >
                    <div class="author-image"> 
                        <i>
                        @if($blog->author_image)
                            <img loading="lazy" src="{{asset('uploads/blog/image/' . $blog->author_image)}}" alt="{{$blog->author_name }}"> {{$blog->author_name }}
                        @else
                            <img loading="lazy" src="{{asset('uploads/blog/image/av.png')}}"> Admin
                        @endif
                        </i> 
                        
                    </div>
                    <span>{{ \Carbon\Carbon::parse($blog->posted_date)->format('M d, Y') }}</span>   
                </div>
                <button class="load-more mt-0 d-flex align-items-center">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
                </button>
            </div>
        </a>
        @if($loop->last)
            <div class="appendHere{{$nextOffset}}"></div>
        @endif
    @endforeach
</div>
<input type="hidden" id="loading_limit" name="limit" value="{{ $limit ?? 12 }}">

<input type="hidden" id="loading_offset" name="offset" value="{{ $offset ?? 0 }}">

<input type="hidden" id="totalCount" value="{{$totalBlogs ?? 0}}">

@if($totalBlogs > $offset)
    <div class="col-md-12 d-flex justify-content-center">
        <button class="load-more w-fit mx-auto d-flex align-items-center primary_button " id="view_more_blogs">
            Load More 
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none"> <path d="M17.3644 7.37629C17.5519 7.18876 17.6572 6.93445 17.6572 6.66929C17.6572 6.40412 17.5519 6.14982 17.3644 5.96229L11.7074 0.305288C11.6152 0.209778 11.5048 0.133596 11.3828 0.0811869C11.2608 0.0287779 11.1296 0.00119157 10.9968 3.77564e-05C10.8641 -0.00111606 10.7324 0.0241859 10.6095 0.0744668C10.4866 0.124748 10.3749 0.199001 10.281 0.292893C10.1872 0.386786 10.1129 0.498438 10.0626 0.621334C10.0123 0.74423 9.98704 0.87591 9.98819 1.00869C9.98934 1.14147 10.0169 1.27269 10.0693 1.39469C10.1217 1.5167 10.1979 1.62704 10.2934 1.71929L14.2434 5.66929L1.00044 5.66929C0.735224 5.66929 0.480869 5.77465 0.293333 5.96218C0.105797 6.14972 0.000440598 6.40407 0.000440598 6.66929C0.000440598 6.9345 0.105797 7.18886 0.293333 7.37639C0.480869 7.56393 0.735224 7.66929 1.00044 7.66929L14.2434 7.66929L10.2934 11.6193C10.1113 11.8079 10.0105 12.0605 10.0128 12.3227C10.015 12.5849 10.1202 12.8357 10.3056 13.0211C10.491 13.2065 10.7418 13.3117 11.004 13.314C11.2662 13.3162 11.5188 13.2154 11.7074 13.0333L17.3644 7.37629Z" fill="#304B9F"></path> </svg>
        </button>
    </div>
@endif
