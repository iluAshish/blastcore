@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Feature </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ url('admin/product/feature/'. (isset($feature) ? $feature->product->id : $product->id)) }}">
                                {{ isset($feature) ? $feature->product->title : $product->title }} Feature
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><span>{{$key}}</li>
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
                        <h3 class="h3">{{ $key }} Feature Images
                            - {{ isset($feature) ? $feature->product->title : $product->title }}</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="Description">{{ isset($feature)?$feature->description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id"
                                           value="{{ isset($feature)?$feature->id:'0' }}">
                                    <input type="hidden" name="product_id" id="product_id"
                                           value="{{ isset($feature) ? $feature->product->id : $product->id }}">
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
