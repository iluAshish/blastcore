@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Image </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/image/'.$image->product->id) }}">
                                {{$image->product->title}} Image</a>
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
                    <h3 class="h3">Image View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Image View</h6>
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
                                <h4 class="subtitle">Overview</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Product:</th>
                                        <td>{!! $image->product->title !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Sort Number:</th>
                                        <td>{{ $image->sort_order }}</td>
                                    </tr>
                                    <tr>
                                        <th>ShowCase:</th>
                                        <td>{{ ($image->is_showcased == 1)? 'True': 'False'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $image->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($image->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($image->updated_at!=NULL)?date("d-M-Y", strtotime($image->updated_at)):'' }}</td>
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
                                        <td>{!! $image->image_meta_tag !!}</td>
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
