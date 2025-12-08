@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Blog</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active"><span>View</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <!-- Records Header Start -->
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Blog View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Blog - {{$blog->title}}</h6>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Image Information</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab03" data-toggle="tab" class="nav-link">Video Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab01">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Blog Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>{{ $blog->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Short URL:</th>
                                        <td>{{ $blog->short_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td>{!! $blog->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Quote Tag Line:</th>
                                        <td>{!! $blog->quote_tag_line !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Title:</th>
                                        <td>{{ $blog->second_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Description:</th>
                                        <td>{!! $blog->second_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Third Description:</th>
                                        <td>{!! $blog->third_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Fourth Description:</th>
                                        <td>{!! $blog->fourth_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Posted Date:</th>
                                        <td>{{ $blog->posted_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title:</th>
                                        <td>
                                            {{ $blog->meta_title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta keyword:</th>
                                        <td>
                                            {{ $blog->meta_keyword }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description:</th>
                                        <td>
                                            {{ $blog->meta_description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other Meta Tag:</th>
                                        <td>
                                            {{ $blog->other_meta_tag }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $blog->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($blog->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($blog->updated_at!=NULL)?date("d-M-Y", strtotime($blog->updated_at)):'' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab02">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Image Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th style="width: 40%">Image :</th>
                                        <td>
                                            @if($blog->image!=NULL)
                                                <a href="{{ $image_with_path }}" class="fancy">
                                                    <img src="{{ $image_with_path }}"/>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%">Webp image :</th>
                                        <td>
                                            @if($blog->webp_image!=NULL)
                                                <a href="{{ $image_with_webp_path }}" class="fancy">
                                                    <img src="{{ $image_with_webp_path }}"/>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%">Image Meta Tag :</th>
                                        <td>
                                            {!! $blog->image_meta_tag !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab03">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Video Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Video Url:</th>
                                        <td>{!! $blog->video_url !!}
                                            @if($blog->video_url)
                                                <a href="{{ $blog->video_url }}" target="_blank" class="fancy">
                                                    <img src="{{asset('app/img/videobutton.svg')}}" alt="">
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%">Video Thumbnail Image :</th>
                                        <td>
                                            @if($blog->video_thumbnail_image!=NULL)
                                                <a href="{{ $video_thumbnail_image_with_path }}" class="fancy">
                                                    <img src="{{ $video_thumbnail_image_with_path }}"/>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%">Video Thumbnail Image (webp) :</th>
                                        <td>
                                            @if($blog->webp_video_thumbnail_image!=NULL)
                                                <a href="{{ $webp_video_thumbnail_image_with_path }}" class="fancy">
                                                    <img src="{{ $webp_video_thumbnail_image_with_path }}"/>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%">Video Thumbnail Image Meta Tag :</th>
                                        <td>
                                            {!! $blog->video_thumbnail_image_meta_tag !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        th {
            width: 25%;
        }
    </style>
@endsection
