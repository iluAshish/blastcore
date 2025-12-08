@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Service Enquiry</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/service/enquiry') }}">Service Enquiry
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
                    <h3 class="h3">Service Enquiry View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Service Enquiry</h6>
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
                                <h4 class="subtitle">Service Enquiry Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td>
                                            {{ $serviceEnquiry->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number:</th>
                                        <td>{{ $serviceEnquiry->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email ID:</th>
                                        <td>{{ $serviceEnquiry->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Message:</th>
                                        <td>{!! $serviceEnquiry->message !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Service:</th>
                                        <td>{{ $serviceEnquiry->service->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Request URL:</th>
                                        <td>{{ $serviceEnquiry->request_url}}</td>
                                    </tr>
                                    <tr>
                                        <th>Reply:</th>
                                        <td>{{ $serviceEnquiry->reply}}</td>
                                    </tr>
                                    <tr>
                                        <th>Replied Date:</th>
                                        <td>{{ ($serviceEnquiry->reply_date!=NULL)?date("d-M-Y", strtotime($serviceEnquiry->reply_date)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ ($serviceEnquiry->created_at!=NULL)?date("d-M-Y", strtotime($serviceEnquiry->created_at)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($serviceEnquiry->updated_at!=NULL)?date("d-M-Y", strtotime($serviceEnquiry->updated_at)):'' }}</td>
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
