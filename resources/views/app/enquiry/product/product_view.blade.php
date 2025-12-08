@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Product Enquiry</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/enquiry') }}">Product Enquiry
                                List</a></li>
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
                    <h3 class="h3">Product Enquiry View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product Enquiry</h6>
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
                                <h4 class="subtitle">Product Enquiry Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td>
                                            {{ $productEnquiry->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number:</th>
                                        <td>{{ $productEnquiry->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email ID:</th>
                                        <td>{{ $productEnquiry->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Message:</th>
                                        <td>{!! $productEnquiry->message !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Product:</th>
                                        <td>{{ $productEnquiry->product->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Request URL:</th>
                                        <td>{{ $productEnquiry->request_url}}</td>
                                    </tr>
                                    <tr>
                                        <th>Reply:</th>
                                        <td>{{ $productEnquiry->reply}}</td>
                                    </tr>
                                    <tr>
                                        <th>Replied Date:</th>
                                        <td>{{ ($productEnquiry->reply_date!=NULL)?date("d-M-Y", strtotime($productEnquiry->reply_date)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ ($productEnquiry->created_at!=NULL)?date("d-M-Y", strtotime($productEnquiry->created_at)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($productEnquiry->updated_at!=NULL)?date("d-M-Y", strtotime($productEnquiry->updated_at)):'' }}</td>
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
    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
