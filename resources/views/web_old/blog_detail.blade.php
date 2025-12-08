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
                            <li class="breadcrumb-item"><a href="{{ url('/blogs') }}">
                                    Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h1>BLOG</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    <!-- blog section starts here  -->
    <section class="latestblogsSingle">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 latestblogsSingleLeft">
                    <div class="masterBlogs">
                        <div class="col-md-12">
                            <div class="topblogImg">
                                <picture>
                                    @if($blog->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/blog/webp_image/'.rawurlencode($blog->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $blog->image ? asset('uploads/blog/image/'.$blog->image) : 'default image'}}"
                                        class="lazy loaded"
                                        data-ll-status="loaded" alt="{{ $blog->image_meta_tag }}">
                                </picture>
                                <div class="dateNews">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h4>{{ date("d", strtotime($blog->posted_date)) }}</h4>
                                            <p>{{ date("M", strtotime($blog->posted_date)) }}</p>
                                            <p>{{ date("Y", strtotime($blog->posted_date)) }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h1>{{ $blog->title }}</h1>
                            <p>{!! $blog->description !!}</p>
                            <h2>{{ $blog->second_title }}</h2>
                            <p>{!! $blog->second_description !!}</p>
                            @if($blog->quote_tag_line)
                                <blockquote>{{ $blog->quote_tag_line }}</blockquote>
                            @endif
                            <p>{!! $blog->third_description !!}</p>
                            @if($blog->video_url)
                                <div class="videoBlog">
                                    <a href="{{ $blog->video_url }}" data-fancybox="group">
                                        <img
                                            src="{{ asset('uploads/blog/video_thumbnail_image/'.$blog->video_thumbnail_image) }}"
                                            alt="{{ $blog->video_thumbnail_image_meta_tag }}">
                                        <button type="button" class="videoPopup bounce"><img
                                                src="{{asset('web/images/svg/videobutton.svg') }}" alt=""></button>
                                    </a>
                                </div>
                            @endif
                            <p>{!! $blog->fourth_description !!}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-3 blogPagination">
                                <nav aria-label="Page navigation example">
                                    @foreach($blogs as $key => $blog_data)
                                        @if($blog_data == $blog)
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link prevBlog"
                                                       href="{{ url('/'.(($loop->iteration==1)?$blogs[$loop->count-1]->short_url:$blogs[$key -1]->short_url)) }}"
                                                       aria-label="Previous">
                                                        <img
                                                            src="{{ asset('uploads/blog/image/'.(($loop->iteration==1)?$blogs[$loop->count-1]->image:$blogs[$key -1]->image)) }}"
                                                            alt="{{ (($loop->iteration==1)?$blogs[$loop->count-1]->image_meta_tag:$blogs[$key -1]->image_meta_tag) }}">
                                                    </a>
                                                </li>
                                                <li class="page-item zoomBlogdetail">
                                                    <a class="page-link"
                                                       href="{{ url('/'.$blog_data->short_url) }}">
                                                        <img
                                                            src="{{ asset('uploads/blog/image/'.$blog->image) }}"
                                                            alt="{{ $blog->image_meta_tag }}">
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link nextBlog"
                                                       href="{{ url('/'.(($loop->iteration==$loop->count)?$blogs[0]->short_url:$blogs[$key +1]->short_url)) }}"
                                                       aria-label="Next">
                                                        <img
                                                            src="{{ asset('uploads/blog/image/'.(($loop->iteration==$loop->count)?$blogs[0]->image:$blogs[$key +1]->image)) }}"
                                                            alt="{{ (($loop->iteration==$loop->count)?$blogs[0]->image_meta_tag:$blogs[$key +1]->image_meta_tag) }}">
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-5 blogFixed">
                    <div class="blogsRight">
                        <div class="col-md-12">
                            <div class="topblogHead">
                                <div class="row">
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-12">
                                        <h4>RECENT POSTS</h4>
                                    </div>
                                </div>
                            </div>
                            @foreach($recentBlogs as $recentBlog)
                                <a href="{{ $recentBlog->short_url }}">
                                    <div class="row recentPosts {{($recentBlog->id == $blog->id)?'active':''}}">
                                        <div class="col-md-1 col-1"></div>
                                        <div class="col-md-3 col-3">
                                            <picture>
                                                @if($recentBlog->webp_image)
                                                    <source type="image/webp"
                                                            srcset="{{ asset('uploads/blog/webp_image/'.rawurlencode($recentBlog->webp_image)) }}">
                                                @endif
                                                <img
                                                    src="{{ $recentBlog->image ? asset('uploads/blog/image/'.$recentBlog->image) : 'default image'}}"
                                                    class="lazy loaded"
                                                    data-ll-status="loaded" alt="{{ $recentBlog->image_meta_tag }}">
                                            </picture>
                                        </div>
                                        <div class="col-md-7 col-7 recentpostcontentRight">
                                            <h6>{{ (strlen($recentBlog->title) > 50)?substr($recentBlog->title,0,50).'...':$recentBlog->title }}</h6>
                                            <p>{{ date("d M Y", strtotime($recentBlog->posted_date)) }}</p>
                                        </div>
                                        <div class="col-md-1 col-1"></div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="topblogFooter"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section ends here  -->

@endsection
