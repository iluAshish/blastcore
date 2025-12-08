@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
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
                    <h3 class="h3">Product View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product - {{$product->title}}</h6>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Brochure Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab01">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Product Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Canonical URL:</th>
                                        <td>{{ $product->short_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>First Description:</th>
                                        <td>{!! $product->first_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Title:</th>
                                        <td>{{ $product->second_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Description:</th>
                                        <td>{{ $product->second_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category:</th>
                                        <td>{{ $product->category->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand:</th>
                                        <td>{{ $product->brand->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title:</th>
                                        <td>{{ $product->meta_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta keyword:</th>
                                        <td>{{ $product->meta_keyword }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description:</th>
                                        <td>{{ $product->meta_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Other Meta Tag:</th>
                                        <td>{{ $product->other_meta_tag }}</td>
                                    </tr>
                                    <tr>
                                        <th>Featured:</th>
                                        <td>{{ ($product->is_featured == 1)? 'Yes': 'No'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Latest:</th>
                                        <td>{{ ($product->is_latest == 1)? 'Yes': 'No'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $product->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($product->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($product->updated_at!=NULL)?date("d-M-Y", strtotime($product->updated_at)):'' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab02">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Brochure Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Brochure :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ $brochure_with_path }}" target="_blank">
                                                <img src="{{asset('app/img/PDF_file_icon.png')}}" height="200"
                                                     width="200" alt="pdf icon"></a>
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
