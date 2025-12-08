@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Service</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/service') }}">Service</a></li>
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
                    <h3 class="h3">Service View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Service - {{$service->title}}</h6>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Image Information</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab03" data-toggle="tab" class="nav-link">Brochure Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab01">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="subtitle">Service Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Title:</th>
                                        <td>{{ $service->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Canonical URL:</th>
                                        <td>{{ $service->short_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>Home Description:</th>
                                        <td>{!! $service->home_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>First Description:</th>
                                        <td>{!! $service->first_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Title:</th>
                                        <td>{{ $service->second_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Second Description:</th>
                                        <td>{!! $service->second_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Featured:</th>
                                        <td>{{ ($service->is_featured == 1)? 'Yes': 'No'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title:</th>
                                        <td>
                                            {{ $service->meta_title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta keyword:</th>
                                        <td>
                                            {{ $service->meta_keyword }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description:</th>
                                        <td>
                                            {{ $service->meta_description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Other Meta Tag:</th>
                                        <td>
                                            {{ $service->other_meta_tag }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $service->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($service->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($service->updated_at!=NULL)?date("d-M-Y", strtotime($service->updated_at)):'' }}</td>
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
                                        <th>Icon Image :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ $icon_image_with_path }}" class="fancy">
                                                <img src="{{ $icon_image_with_path }}"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Icon Image (Webp) :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ $icon_webp_image_with_path }}" class="fancy">
                                                <img src="{{ $icon_webp_image_with_path }}"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Icon Image Meta Tag :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!! $service->icon_image_meta_tag !!}
                                        </td>
                                    </tr>
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
                                            {!! $service->image_meta_tag !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab03">
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
