@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Contact Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/site/contact') }}">
                                Contact Information</a></li>
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
                    <h3 class="h3">Contact Information View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Contact Information - <span
                            class="text-lightergray"> {{ $contactContent->title }}</span>
                    </h6>
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
                                <h4 class="subtitle">Contact Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Address:</th>
                                        <td>
                                            {{ $contactContent->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email Id:</th>
                                        <td>
                                            {{ $contactContent->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alternate Email Id:</th>
                                        <td>
                                            {{ $contactContent->alternate_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone number:</th>
                                        <td>
                                            {{ $contactContent->phone_number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alternate Phone number:</th>
                                        <td>
                                            {{ $contactContent->alternate_phone_number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Working Hours:</th>
                                        <td>{{ $contactContent->working_hours }}</td>
                                    </tr>
                                    <tr>
                                        <th>Map Title:</th>
                                        <td>{{ $contactContent->map_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Map:</th>
                                        <td>{{ $contactContent->map }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $contactContent->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($contactContent->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($contactContent->updated_at!=NULL)?date("d-M-Y", strtotime($contactContent->updated_at)):'' }}</td>
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
