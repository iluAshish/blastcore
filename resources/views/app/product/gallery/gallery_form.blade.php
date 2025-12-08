@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Gallery </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ url('admin/product/gallery/'. (isset($gallery) ? $gallery->product->id : $product->id)) }}">
                                {{ isset($gallery) ? $gallery->product->title : $product->title }} Gallery
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
                        <h3 class="h3">{{ $key }} Gallery Images
                            - {{ isset($gallery) ? $gallery->product->title : $product->title }}</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 710X410</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Image Meta Tag*</label>
                                    <input type="text" name="image_meta_tag" id="image_meta_tag"
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($gallery)?$gallery->image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="video_url">Video URL</label>
                                    <input type="text" name="video_url" id="video_url"
                                           placeholder="Video Url" class="form-control" autocomplete="off"
                                           value="{{ isset($gallery)?$gallery->video_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id"
                                           value="{{ isset($gallery)?$gallery->id:'0' }}">
                                    <input type="hidden" name="product_id" id="product_id"
                                           value="{{ isset($gallery) ? $gallery->product->id : $product->id }}">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                layoutTemplates: {actionDelete: ''},
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: true,
                minImageWidth: 710,
                minImageHeight: 410,
                maxImageWidth: 710,
                maxImageHeight: 410,
                @if(isset($gallery) && $gallery->image != NULL)
                initialPreview: ["{{ $image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{($gallery->image != NULL) ? $gallery->image : ''}}",
                        width: "120px",
                        key: "{{($gallery->image != NULL) ? '1' : '0'}}"
                    }
                ]
                @endif
            });

            $("#webp_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                layoutTemplates: {actionDelete: ''},
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                @if(isset($gallery) && $gallery->webp_image != NULL)
                initialPreview: ["{{$webp_image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($gallery->webp_image != NULL) ? $gallery->webp_image : ''}}",
                        width: "120px",
                        key: " {{($gallery->webp_image != NULL) ? '1' : '0'}}"
                    }
                ]
                @endif
            });
        })
        ;
    </script>
@endsection
