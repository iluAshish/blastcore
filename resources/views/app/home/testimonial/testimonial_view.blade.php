@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Testimonial</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/home/testimonial/list') }}">Testimonial</a></li>
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
                    <h3 class="h3">Testimonial View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Testimonial - <span class="text-lightergray"> {!! $testimonial->title !!}</span></h6>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Image Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab01">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Testimonial Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>
                                            {{ $testimonial->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Position:</th>
                                        <td>
                                            {{ $testimonial->position }}
                                        </td>
                                    </tr>
                                   
                                    
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $testimonial->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($testimonial->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($testimonial->updated_at!=NULL)?date("d-M-Y", strtotime($testimonial->updated_at)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td>{!! $testimonial->description !!}</td>
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
                                        <th>Image :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ $image_with_path }}" class="fancy">
                                                <img src="{{ $image_with_path }}"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image (Webp) :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ $webp_image_with_path }}" class="fancy">
                                                <img src="{{ $webp_image_with_path }}"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image Info :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!! $testimonial->image_attribute !!}
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
@endsection
