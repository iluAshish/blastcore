@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Product Brand</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/brand') }}">Product Brand</a></li>
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
                    <h3 class="h3">Product Brand View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product Brand - {{$productBrand->title}}</h6>
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
                                <h4 class="subtitle">Product Brand Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>{{ $productBrand->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Canonical URL:</th>
                                        <td>{{ $productBrand->short_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title:</th>
                                        <td>
                                            {{ $productBrand->meta_title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta keyword:</th>
                                        <td>
                                            {{ $productBrand->meta_keyword }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description:</th>
                                        <td>
                                            {{ $productBrand->meta_description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other Meta Tag:</th>
                                        <td>
                                            {{ $productBrand->other_meta_tag }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $productBrand->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($productBrand->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($productBrand->updated_at!=NULL)?date("d-M-Y", strtotime($productBrand->updated_at)):'' }}</td>
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
                                        <th>Image Meta Tag :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!! $productBrand->image_meta_tag !!}
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
