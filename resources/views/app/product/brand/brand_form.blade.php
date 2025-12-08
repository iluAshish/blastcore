@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Product Brand</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/brand') }}">Product Brand</a></li>
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
                        <h3 class="h3">{{ $key }} Product Brand</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Title*</label>
                                    <input type="text" class="form-control for_canonical_url" name="title" placeholder="Title"
                                           id="title" required value="{{ isset($productBrand)?$productBrand->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_url">Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required" autocomplete="off" required
                                           value="{{ isset($productBrand)?$productBrand->short_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 57X56</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_image">Image (webp)*</label>
                                    <div class="file-loading">
                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_meta_tag">Image Meta Tag*</label>
                                    <input type="text" name="image_meta_tag" id="image_meta_tag"
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($productBrand)?$productBrand->image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title"
                                              placeholder="Meta Title">{{ isset($productBrand)?$productBrand->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              placeholder="Meta Description">{{ isset($productBrand)?$productBrand->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($productBrand)?$productBrand->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag" id="other_meta_tag"
                                              placeholder="other Meta Tag">{{ isset($productBrand)?$productBrand->other_meta_tag:'' }}</textarea>
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
                showRemove: false,
                minImageWidth: 57,
                minImageHeight: 56,
                maxImageWidth: 57,
                maxImageHeight: 56,
                @if(isset($productBrand) && $productBrand->image != NULL)
                initialPreview: ["{{ $image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($productBrand->image != NULL) ? $productBrand->title : '' }}",
                        width: "120px",
                        key: "{{ ($productBrand->image != NULL) ? '1' : '0' }}"
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
                showRemove: false,
                allowedFileExtensions: ["webp"],
                @if(isset($productBrand) && $productBrand->webp_image != NULL)
                initialPreview: ["{{ $webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($productBrand->webp_image != NULL) ? $productBrand->title : '' }}",
                        width: "120px",
                        key: "{{ ($productBrand->webp_image != NULL) ? $productBrand->id : '0' }}"
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
