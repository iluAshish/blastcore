@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Gallery </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/gallery/'.$gallery->product->id) }}">
                                {{$gallery->product->title}} Gallery</a>
                        </li>
                        <li class="breadcrumb-item active">View</li>
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
                    <h3 class="h3">Gallery View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Gallery View</h6>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Overview</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab01">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Gallery Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Image:</th>
                                        <td>
                                            <a href="{{$image_with_path}}" class="fancy"><img
                                                    src="{{$image_with_path}}" style="width: 50%"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image(webp):</th>
                                        <td>
                                            <a href="{{$webp_image_with_path}}" class="fancy"><img
                                                    src="{{$webp_image_with_path}}" style="width: 50%"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image Meta Tag:</th>
                                        <td>{!! $gallery->image_meta_tag !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Video Url:</th>
                                        <td>{!! $gallery->video_url !!}
                                            @if($gallery->video_url)
                                                <a href="{{ $gallery->video_url }}" target="_blank">
                                                    <img src="{{asset('app/img/videobutton.svg')}}" alt="">
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $gallery->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($gallery->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($gallery->updated_at!=NULL)?date("d-M-Y", strtotime($gallery->updated_at)):'' }}</td>
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
@endsection
