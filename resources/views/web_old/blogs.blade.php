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
                            <li class="breadcrumb-item active" aria-current="page">BLOG</li>
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
    <section class="latestBlogs">
        <div class="container">
            <div class="row latestNews_slider_blog">

                <!-- <div class=""> -->
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ url('/'.$blog->short_url)}}">
                            <div class="card">
                                <div class="dateNews">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h4>{{ date("d", strtotime($blog->posted_date)) }}</h4>
                                            <p>{{ date("M", strtotime($blog->posted_date)) }}</p>
                                            <p>{{ date("Y", strtotime($blog->posted_date)) }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <picture>
                                    @if($blog->webp_image)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/blog/webp_image/'.rawurlencode($blog->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $blog->image ? asset('uploads/blog/image/'.$blog->image) : 'default image'}}"
                                        class="card-img-top lazy loaded"
                                        data-ll-status="loaded" alt="{{ $blog->image_meta_tag }}">
                                </picture>

                                <div class="card-body ">
                                    <h5 class="card-title">{{ (strlen($blog->title) > 60)?substr($blog->title,0,60).'...':$blog->title }}</h5>
                                    <p>{!! substr($blog->description,0,80) !!}...</p>
                                    <a href="{{ url('/'.$blog->short_url) }}" class="btnBlog">READ MORE</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if($loop->last)
                        <div class="appendHere6"></div>
                    @endif
                @endforeach
                @if($totalBlogs>6)
                    <div class="col-md-12 d-flex justify-content-center">
                        <input type="hidden" id="loading_limit" value="3">
                        <input type="hidden" id="loading_offset" value="6">
                        <input type="hidden" id="totalCount" value="{{$totalBlogs}}">
                        <button class="primary_button" id="view_more_blogs">LOAD MORE</button>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- blog section ends here  -->
@endsection
