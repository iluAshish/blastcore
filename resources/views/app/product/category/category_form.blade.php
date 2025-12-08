@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Product Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/category') }}">Product Category</a>
                        </li>
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
                        <h3 class="h3">{{ $key }} Product Category</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Title*</label>
                                    <input type="text" class="form-control for_canonical_url" name="title"
                                           placeholder="Title"
                                           id="title" required
                                           value="{{ isset($productCategory)?$productCategory->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_url">Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required" autocomplete="off" required
                                           value="{{ isset($productCategory)?$productCategory->short_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="parent_id">Parent Category</label>
                                    <select class="form-control select2" id="parent_id" name="parent_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach($productCategories as $category)
                                            <option value="{{$category->id}}"
                                                {{(@$productCategory->parent_id==$category->id)?'selected':''}}>
                                                {{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title"
                                              placeholder="Meta Title">{{ isset($productCategory)?$productCategory->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              placeholder="Meta Description">{{ isset($productCategory)?$productCategory->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($productCategory)?$productCategory->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag" id="other_meta_tag"
                                              placeholder="other Meta Tag">{{ isset($productCategory)?$productCategory->other_meta_tag:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
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
