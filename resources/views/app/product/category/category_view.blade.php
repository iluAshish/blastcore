@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Product Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/category') }}">Product Category</a>
                        </li>
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
                    <h3 class="h3">Product Category View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product Category - {{$productCategory->title}}</h6>
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
                                <h4 class="subtitle">Product Category Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>{{ $productCategory->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Canonical URL:</th>
                                        <td>{{ $productCategory->short_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>Parent Category:</th>
                                        <td>
                                            @if(isset($productCategory->parent))
                                                {{ $productCategory->parent->title}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title:</th>
                                        <td>
                                            {{ $productCategory->meta_title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta keyword:</th>
                                        <td>
                                            {{ $productCategory->meta_keyword }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description:</th>
                                        <td>
                                            {{ $productCategory->meta_description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other Meta Tag:</th>
                                        <td>
                                            {{ $productCategory->other_meta_tag }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $productCategory->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($productCategory->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($productCategory->updated_at!=NULL)?date("d-M-Y", strtotime($productCategory->updated_at)):'' }}</td>
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
