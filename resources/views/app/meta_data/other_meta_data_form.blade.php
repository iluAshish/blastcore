@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Extra Tags</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
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
                        <h3 class="h3"> Extra Tags</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="header_tag">Header Tag</label>
                                    <textarea class="form-control" name="header_tag"
                                              id="header_tag">{{ isset($meta_data)?$meta_data->header_tag:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="body_tag">Body Tag</label>
                                    <textarea class="form-control" name="body_tag"
                                              id="body_tag">{{ isset($meta_data)?$meta_data->body_tag:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="footer_tag">Footer Tag</label>
                                    <textarea class="form-control" name="footer_tag"
                                              id="footer_tag">{{ isset($meta_data)?$meta_data->footer_tag:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id"
                                           value="{{ isset($meta_data)?$meta_data->id:'0' }}">
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
