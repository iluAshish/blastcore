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
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                           autocomplete="off" value="{{ isset($slider)?$slider->title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($slider)?$slider->sub_title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tag_line">Tag Line</label>
                                    <input type="text" name="tag_line" id="tag_line" placeholder="Tag Line"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($slider)?$slider->tag_line:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="button_text">Button text</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($slider)?$slider->button_text:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="button_url">Button Url</label>
                                    <input type="text" name="button_url" id="button_url" placeholder="Button Url"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($slider)?$slider->button_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 992X614</span>
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
                minImageWidth: 992,
                minImageHeight: 614,
                maxImageWidth: 992,
                maxImageHeight: 614,
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
        });
    </script>
@endsection
