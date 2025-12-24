@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Slider</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/home/slider') }}">Slider</a></li>
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
                        <h3 class="h3">{{ $key }} Slider</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                           autocomplete="off" value="{{ isset($slider)?$slider->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($slider)?$slider->sub_title:'' }}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 1920X1082</span>
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
                                           value="{{ isset($slider)?$slider->image_meta_tag:'' }}">
                                </div>
                            </div>

                            <!-- Mobile banner  -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="mobile_image">Mobile Image*</label>
                                    <div class="file-loading">
                                        <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 580X821</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile_webp_image">Mobile Image (webp)*</label>
                                    <div class="file-loading">
                                        <input id="mobile_webp_image" name="mobile_webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile_image_meta_tag">Mobile Image Meta Tag*</label>
                                    <input type="text" name="mobile_image_meta_tag" id="mobile_image_meta_tag"
                                           placeholder="Mobile image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($slider)?$slider->mobile_image_meta_tag:'' }}">
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
                minImageWidth: 1920,
                minImageHeight: 1082,
                maxImageWidth: 1920,
                maxImageHeight: 1082,
                @if(isset($slider) && $slider->image != NULL)
                initialPreview: ["{{ $image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($slider->image != NULL) ? $slider->title : '' }}",
                        width: "120px",
                        key: "{{ ($slider->image != NULL) ? '1' : '0' }}"
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
                @if(isset($slider) && $slider->webp_image != NULL)
                initialPreview: ["{{ $webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($slider->webp_image != NULL) ? $slider->title : '' }}",
                        width: "120px",
                        key: "{{ ($slider->webp_image != NULL) ? $slider->id : '0' }}"
                    }
                ]
                @endif
            });

            $("#mobile_image").fileinput({
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
                minImageWidth: 580,
                minImageHeight: 821,
                maxImageWidth: 580,
                maxImageHeight: 821,
                @if(isset($slider) && $slider->mobile_image != NULL)
                initialPreview: ["{{ $mobile_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($slider->mobile_image != NULL) ? $slider->title : '' }}",
                        width: "120px",
                        key: "{{ ($slider->mobile_image != NULL) ? '1' : '0' }}"
                    }
                ]
                @endif
            });

            $("#mobile_webp_image").fileinput({
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
                @if(isset($slider) && $slider->mobile_webp_image != NULL)
                initialPreview: ["{{ $mobile_webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($slider->mobile_webp_image != NULL) ? $slider->title : '' }}",
                        width: "120px",
                        key: "{{ ($slider->mobile_webp_image != NULL) ? $slider->id : '0' }}"
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
