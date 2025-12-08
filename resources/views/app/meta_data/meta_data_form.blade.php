@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} {{ $type }} Page SEO Details</h2>
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
                        <h3 class="h3">{{ $type }} Meta Details</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Meta Title*</label>
                                    <textarea class="form-control" required name="meta_title"
                                              id="meta_title">{{ isset($meta_data)?$meta_data->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Meta Description*</label>
                                    <textarea class="form-control" required name="meta_description"
                                              id="meta_description">{{ isset($meta_data)?$meta_data->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Meta Keywords*</label>
                                    <textarea class="form-control" required name="meta_keyword"
                                              id="meta_keyword">{{ isset($meta_data)?$meta_data->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag"
                                              id="other_meta_tag">{{ isset($meta_data)?$meta_data->other_meta_tag:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id"
                                           value="{{ isset($meta_data)?$meta_data->id:'0' }}">
                                    <input type="hidden" name="page_name" id="page_name" value="{{ $type }}">
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
