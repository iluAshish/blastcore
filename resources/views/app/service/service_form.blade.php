@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Service</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/service') }}">Service</a></li>
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
                        <h3 class="h3">{{ $key }} Service</h3>
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
                                           id="title" required value="{{ isset($service)?$service->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_url">Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required" autocomplete="off" required
                                           value="{{ isset($service)?$service->short_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="icon_image">Icon Image*</label>
                                    <div class="file-loading">
                                        <input id="icon_image" name="icon_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="icon_webp_image">Icon Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="icon_webp_image" name="icon_webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="icon_image_meta_tag">Icon Image Meta Tag*</label>
                                    <input type="text" name="icon_image_meta_tag" id="icon_image_meta_tag"
                                           placeholder="Image Alternate Text"
                                           class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($service)?$service->icon_image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 613X372</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_image">Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_meta_tag">Image Meta Tag*</label>
                                    <input type="text" name="image_meta_tag" id="image_meta_tag"
                                           placeholder="Image Alternate Text"
                                           class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($service)?$service->image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="home_description">Home Description*</label>
                                    <textarea class="form-control textarea" name="home_description" required
                                              id="home_description">{{ isset($service)?$service->home_description:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="first_description">First Description</label>
                                    <textarea class="form-control textarea" name="first_description"
                                              id="first_description">
                                        {{ isset($service)?$service->first_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="second_title">Second Title</label>
                                    <input type="text" class="form-control" name="second_title"
                                           placeholder="Second Title" id="second_title"
                                           value="{{ isset($service)?$service->second_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="second_description">Second Description</label>
                                    <textarea class="form-control textarea" name="second_description"
                                              id="second_description">{{ isset($service)?$service->second_description:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="brochure">Brochure</label>
                                    <div class="file-loading">
                                        <input id="brochure" name="brochure" type="file" accept="application/pdf/*">
                                    </div>
                                    <span class="caption_note">Note: Brochure must be a pdf file</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title"
                                              placeholder="Meta Title">{{ isset($service)?$service->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              placeholder="Meta Description">{{ isset($service)?$service->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($service)?$service->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag" id="other_meta_tag"
                                              placeholder="other Meta Tag">{{ isset($service)?$service->other_meta_tag:'' }}</textarea>
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
            $("#icon_image").fileinput({
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
                @if(isset($service) && $service->icon_image != NULL)
                initialPreview: ["{{ $icon_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($service->image != NULL) ? $service->title : '' }}",
                        width: "120px",
                        key: "{{ ($service->image != NULL) ? '1' : '0' }}"
                    }
                ]
                @endif
            });

            $("#icon_webp_image").fileinput({
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
                @if(isset($service) && $service->icon_webp_image != NULL)
                initialPreview: ["{{ $icon_webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($service->icon_webp_image != NULL) ? $service->title : '' }}",
                        width: "120px",
                        key: "{{ ($service->icon_webp_image != NULL) ? $service->id : '0' }}"
                    }
                ]
                @endif
            });
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
                minImageWidth: 613,
                minImageHeight: 372,
                maxImageWidth: 613,
                maxImageHeight: 372,
                @if(isset($service) && $service->image != NULL)
                initialPreview: ["{{ $image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($service->image != NULL) ? $service->title : '' }}",
                        width: "120px",
                        key: "{{ ($service->image != NULL) ? '1' : '0' }}"
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
                @if(isset($service) && $service->webp_image != NULL)
                initialPreview: ["{{ $webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($service->webp_image != NULL) ? $service->title : '' }}",
                        width: "120px",
                        key: "{{ ($service->webp_image != NULL) ? $service->id : '0' }}"
                    }
                ]
                @endif
            });
            $("#brochure").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["pdf"],
                @if(isset($service) && $service->brochure != NULL)
                initialPreview: ["{{ $brochure_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($service->brochure != NULL) ? $service->title : '' }}",
                        width: "120px",
                        key: "{{ ($service->brochure != NULL) ? 'brochure/'.$service->id : '0' }}",
                        url: 'service/delete-file'
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
