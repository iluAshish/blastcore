@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Image </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ url('admin/product/image/'. (isset($image) ? $image->product->id : $product->id)) }}">
                                {{ isset($image) ? $image->product->title : $product->title }} Image
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
                        <h3 class="h3">{{ $key }} Images
                            - {{ isset($image) ? $image->product->title : $product->title }}</h3>
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
                                    <span class="caption_note">Note: Image size should be minimum of 400X310</span>
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
                                           placeholder="Image Alternate Text"
                                           class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($image)?$image->image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id"
                                           value="{{ isset($image)?$image->id:'0' }}">
                                    <input type="hidden" name="product_id" id="product_id"
                                           value="{{ isset($image) ? $image->product->id : $product->id }}">
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
                minImageWidth: 400,
                minImageHeight: 310,
                maxImageWidth: 400,
                maxImageHeight: 310,
                @if(isset($image) && $image->image != NULL)
                initialPreview: ["{{ $image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{($image->image != NULL) ? $image->image : ''}}",
                        width: "120px",
                        key: "{{($image->image != NULL) ? '1' : '0'}}"
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
                @if(isset($image) && $image->webp_image != NULL)
                initialPreview: ["{{$webp_image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($image->webp_image != NULL) ? $image->webp_image : ''}}",
                        width: "120px",
                        key: " {{($image->webp_image != NULL) ? '1' : '0'}}"
                    }
                ]
                @endif
            });
        })
        ;
    </script>
@endsection
