@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Testimonial</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/home/testimonial/list') }}">Testimonial</a></li>
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
                        <h3 class="h3">{{ $key }} Testimonial</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                           autocomplete="off" value="{{ isset($testimonial)?$testimonial->name:'' }}">
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="position">Position</label>
                                    <input type="text" name="position" id="position" placeholder="Position"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($testimonial)?$testimonial->position:'' }}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="Description">{{ isset($testimonial)?$testimonial->description:'' }}</textarea>
                                </div>
                            </div>
                            
                            

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Profile Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 88X88</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_image">Profile Image (webp)*</label>
                                    <div class="file-loading">
                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_attribute">Image Meta Tag*</label>
                                    <input type="text" name="image_attribute" id="image_attribute"
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($testimonial)?$testimonial->image_attribute:'' }}">
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
                minImageWidth: 88,
                minImageHeight: 88,
                maxImageWidth: 88,
                maxImageHeight: 88,
                @if(isset($testimonial) && $testimonial->image != NULL)
                initialPreview: ["{{ $image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($testimonial->image != NULL) ? $testimonial->name : '' }}",
                        width: "120px",
                        key: "{{ ($testimonial->image != NULL) ? '1' : '0' }}"
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
                @if(isset($testimonial) && $testimonial->image_webp != NULL)
                initialPreview: ["{{ $webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($testimonial->image_webp != NULL) ? $testimonial->name : '' }}",
                        width: "120px",
                        key: "{{ ($testimonial->image_webp != NULL) ? $testimonial->id : '0' }}"
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
