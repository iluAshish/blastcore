@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Brand Highlight</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/our_brand') }}">Our Brand</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/our_brand/brand_highlight/list') }}">
                                <span>Brand Highlight</span></a></li>
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
                    <h3 class="h3">Brand Highlight View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Brand Highlight - <span
                            class="text-lightergray"> {!! $brandHighlight->title !!}</span></h6>
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
                                <h4 class="subtitle">Brand Highlight Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>
                                            {{ $brandHighlight->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sort Order:</th>
                                        <td>
                                            {{ $brandHighlight->sort_order }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $brandHighlight->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($brandHighlight->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($brandHighlight->updated_at!=NULL)?date("d-M-Y", strtotime($brandHighlight->updated_at)):'' }}</td>
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
