@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Client</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/client') }}">Client</a></li>
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
                        <h3 class="h3">{{ $key }} Client</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name"
                                           class="form-control" required
                                           autocomplete="off" value="{{ isset($client)?$client->name:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 1500X800</span>
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
                                           placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($client)?$client->image_meta_tag:'' }}">
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
                minImageWidth: 170,
                minImageHeight: 170,
                maxImageWidth: 172,
                maxImageHeight: 172,
                @if(isset($client) && $client->image != NULL)
                initialPreview: ["{{ $image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($client->image != NULL) ? $client->title : '' }}",
                        width: "120px",
                        key: "{{ ($client->image != NULL) ? '1' : '0' }}"
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
                @if(isset($client) && $client->webp_image != NULL)
                initialPreview: ["{{ $webp_image_with_path }}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($client->webp_image != NULL) ? $client->title : '' }}",
                        width: "120px",
                        key: "{{ ($client->webp_image != NULL) ? $client->id : '0' }}"
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
