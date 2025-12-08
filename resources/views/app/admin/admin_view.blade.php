@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5">Admin</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><span>{{ $key }}</span></li>
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
                <h3 class="h3">Admin </h3>
            </div>
        </div>
    </div>
                
    <div class="panel">
    <div class="records--body">
        <div class="title">
            <h6 class="h6">Admin</h6>
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
                        <h4 class="subtitle">Admin Information - {{$admin->name}}</h4>
                        <table class="table table-simple">
                            <thody>
                                <tr>
                                    <th>Name:</th>
                                    <td>
                                        {{$admin->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone Number:</th>
                                    <td>
                                        {{$admin->phone_number}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td>
                                        {{$admin->username}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>{{ $admin->status }}</td>
                                </tr>
                                <tr>
                                    <th>Created Date:</th>
                                    <td>{{ date("d-M-Y", strtotime($admin->created_at))}}</td>
                                </tr>
                                <?php if($admin->updated_at!=NULL){?>
                                    <tr>
                                        <th>Updated Date:</th>
                                        <td>{{ ($admin->updated_at!=NULL)?date("d-M-Y", strtotime($admin->updated_at)):'' }}</td>
                                    </tr>
                                <?php }?>
                            </thody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection