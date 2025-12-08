@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--client_name h5">{{ $key }} Contact Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/site/contact') }}">
                                Contact Information</a></li>
                        <li class="breadcrumb-item active"><span>{{ $key }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main--content">
        <div class="row gutter-20">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="h3">Contact Information</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address*</label>
                                    <textarea class="form-control textarea" required name="address" placeholder="Address"
                                              id="address">{{ !empty($contactContent)?$contactContent->address:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID*</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email ID"
                                           id="email" required
                                           value="{{ !empty($contactContent)?$contactContent->email:'' }}">
                                    <label for="alternate_email" class="mt-3">Alternate Email ID</label>
                                    <input type="email" class="form-control" name="alternate_email"
                                           placeholder="Alternate Email ID" id="alternate_email"
                                           value="{{ !empty($contactContent)?$contactContent->alternate_email:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number*</label>
                                    <input type="text" class="form-control" name="phone_number"
                                           placeholder="Phone Number" id="phone_number" required
                                           value="{{ !empty($contactContent)?$contactContent->phone_number:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alternate_phone_number">Alternate Phone Number</label>
                                    <input type="text" class="form-control" name="alternate_phone_number"
                                           placeholder="Alternate Phone Number" id="alternate_phone_number"
                                           value="{{ !empty($contactContent)?$contactContent->alternate_phone_number:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="working_hours">Working Hours</label>
                                        <input type="text" class="form-control" name="working_hours"
                                               placeholder="Working Hours" id="working_hours" required
                                               value="{{ !empty($contactContent)?$contactContent->working_hours:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="map_title" class="mt-3">Map Title</label>
                                        <input type="text" class="form-control" name="map_title"
                                               placeholder="Map Title" id="map_title" required
                                               value="{{ !empty($contactContent)?$contactContent->map_title:'' }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="map">Map*</label>
                                    <textarea class="form-control" required name="map" placeholder="Map"
                                              id="map">{{ !empty($contactContent)?$contactContent->map:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-success form_submit_btn" value="Submit">
                                    <input type="reset" class="btn btn-default" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
