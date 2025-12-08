@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Contact Enquiry</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/contact_enquiry') }}">Contact List</a></li>
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
                    <h3 class="h3">Contact Enquiry View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Contact Enquiry</h6>
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
                                <h4 class="subtitle">Contact Enquiry Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td>
                                            {{ $contact->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number:</th>
                                        <td>{{ $contact->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email ID:</th>
                                        <td>{{ $contact->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Message:</th>
                                        <td>{!! $contact->message !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Request URL:</th>
                                        <td>{{ $contact->request_url}}</td>
                                    </tr>
                                    <tr>
                                        <th>Reply:</th>
                                        <td>{{ $contact->reply}}</td>
                                    </tr>
                                    <tr>
                                        <th>Replied Date:</th>
                                        <td>{{ ($contact->reply_date!=NULL)?date("d-M-Y", strtotime($contact->reply_date)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ ($contact->created_at!=NULL)?date("d-M-Y", strtotime($contact->created_at)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($contact->updated_at!=NULL)?date("d-M-Y", strtotime($contact->updated_at)):'' }}</td>
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
