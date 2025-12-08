@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} About</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/home/about') }}">About</a></li>
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
                        <h3 class="h3">{{ $key. ' About Information' }} </h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" id="title"
                                           required value="{{ !empty($about)?$about->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($about)?$about->sub_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_description">First Description*</label>
                                    <textarea class="form-control textarea" required name="first_description"
                                              id="first_description">{{ !empty($about)?$about->first_description:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="second_description">Second Description</label>
                                    <textarea class="form-control textarea" name="second_description"
                                              id="second_description">{{ !empty($about)?$about->second_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="button_text">Button text*</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control" autocomplete="off" required
                                           value="{{ !empty($about)?$about->button_text:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="button_url">Button Url*</label>
                                    <input type="text" name="button_url" id="button_url" placeholder="Button Url"
                                           class="form-control" autocomplete="off" required
                                           value="{{ !empty($about)?$about->button_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="first_image">First Image*</label>
                                    <div class="file-loading">
                                        <input id="first_image" name="first_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 720X434</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="first_webp_image">First Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="first_webp_image" name="first_webp_image" type="file"
                                               accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="first_image_meta_tag">First Image Meta Tag*</label>
                                    <input type="text" name="first_image_meta_tag" id="first_image_meta_tag"
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ !empty($about)?$about->first_image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="second_image">Second Image*</label>
                                    <div class="file-loading">
                                        <input id="second_image" name="second_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 1728X434</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="second_webp_image">Second Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="second_webp_image" name="second_webp_image" type="file"
                                               accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="second_image_meta_tag">Second Image Meta Tag*</label>
                                    <input type="text" name="second_image_meta_tag" id="second_image_meta_tag"
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ !empty($about)?$about->second_image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-rounded btn-success form_submit_btn"
                                           value="Submit">
                                    <input type="hidden" name="id" id="id" value="{{ !empty($about)?$about->id:'0' }}">
                                    <input type="reset" class="btn btn-rounded btn-default" value="Reset">
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
            $("#first_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: true,
                minImageWidth: 720,
                minImageHeight: 434,
                maxImageWidth: 720,
                maxImageHeight: 434,
                @if(!empty($about) && $about->first_image != NULL)
                initialPreview: ["{{ $first_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($about->first_image != NULL) ? $about->title : '' }}",
                        width: "120px",
                        key: "{{ ($about->first_image != NULL) ? 'first_image' : '0' }}",
                        url: 'home-about/delete',
                    }
                ]
                @endif
            });

            $("#first_webp_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                @if(!empty($about) && $about->first_webp_image != NULL)
                initialPreview: ["{{ $first_webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($about->first_webp_image != NULL) ? $about->title : '' }}",
                        key: "{{ ($about->first_webp_image != NULL) ? 'first_webp_image' : '0' }}",
                        url: 'home-about/delete'
                    }
                ]
                @endif
            });
            $("#second_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: true,
                minImageWidth: 1728,
                minImageHeight: 434,
                maxImageWidth: 1728,
                maxImageHeight: 434,
                @if(!empty($about) && $about->second_image != NULL)
                initialPreview: ["{{ $second_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($about->second_image != NULL) ? $about->title : '' }}",
                        width: "120px",
                        key: "{{ ($about->second_image != NULL) ? 'second_image' : '0' }}",
                        url: 'home-about/delete',
                    }
                ]
                @endif
            });

            $("#second_webp_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                @if(!empty($about) && $about->second_webp_image != NULL)
                initialPreview: ["{{ $second_webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($about->second_webp_image != NULL) ? $about->title : '' }}",
                        key: "{{ ($about->second_webp_image != NULL) ? 'second_webp_image' : '0' }}",
                        url: 'home-about/delete'
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
