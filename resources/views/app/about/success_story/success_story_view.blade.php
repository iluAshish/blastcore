@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Success Story</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/success_story/list') }}">Success Story</a></li>
                                Us</a></li>
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
                    <h3 class="h3">Success Story View </h3>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Success Story - <span class="text-lightergray"> {{ $successStory->title }}</span>
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
                                <h4 class="subtitle">Success Story Information</h4>
                                <table class="table table-simple">
                                    <tbody>
                                    <tr>
                                        <th>Year:</th>
                                        <td>
                                            {{ $successStory->year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title:</th>
                                        <td>
                                            {{ $successStory->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>{{ $successStory->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created Date:</th>
                                        <td>{{ date("d-M-Y", strtotime($successStory->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($successStory->updated_at!=NULL)?date("d-M-Y", strtotime($successStory->updated_at)):'' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td>{!! $successStory->description !!}</td>
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
    <script type="text'javascript">

    </script>
@endsection
