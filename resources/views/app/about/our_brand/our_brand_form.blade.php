@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5">{{ $key }} Our Brand</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/about/our_brand') }}">Our Brand</a></li>
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
               <h3 class="h3">{{ $key. ' Our Brand Contents' }} </h3>
            </div>
            <div class="panel-content">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" id="title"
                                   value="{{ !empty($ourBrand)?$ourBrand->title:'' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="button_text">Button text</label>
                            <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                   class="form-control" autocomplete="off"
                                   value="{{ !empty($ourBrand)?$ourBrand->button_text:'' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="button_url">Button Url</label>
                            <input type="text" name="button_url" id="button_url" placeholder="Button Url"
                                   class="form-control" autocomplete="off"
                                   value="{{ !empty($ourBrand)?$ourBrand->button_url:'' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="small_description">Small Description</label>
                            <textarea class="form-control textarea" name="small_description"
                                      id="small_description">{{ !empty($ourBrand)?$ourBrand->small_description:'' }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="large_description">Large Description</label>
                            <textarea class="form-control textarea" name="large_description"
                                      id="large_description">{{ !empty($ourBrand)?$ourBrand->large_description:'' }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image">Image</label>
                            <div class="file-loading">
                                <input id="image" name="image" type="file" accept="image/*">
                            </div>
                            <span class="caption_note">Note: Image size should be minimum of 488X535</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="webp_image">Image (webp)</label>
                            <div class="file-loading">
                                <input id="webp_image" name="webp_image" type="file"
                                       accept="image/*">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_meta_tag">Image Meta Tag</label>
                            <input type="text" name="image_meta_tag" id="image_meta_tag"
                                   placeholder="Image Alternate Text" class="form-control required placeholder-cls"
                                   autocomplete="off" value="{{ !empty($ourBrand)?$ourBrand->image_meta_tag:'' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-rounded btn-success form_submit_btn" value="Submit">
                            <input type="hidden" name="id" id="id" value="{{ !empty($ourBrand)?$ourBrand->id:'0' }}">
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
        $("#image").fileinput({
            'theme': 'explorer-fas',
            validateInitialCount: true,
            overwriteInitial: false,
            autoReplace: true,
            initialPreviewShowDelete: true,
            initialPreviewAsData: true,
            dropZoneEnabled: false,
            required: false,
            showRemove: true,
            minImageWidth: 488,
            minImageHeight: 535,
            maxImageWidth: 488,
            maxImageHeight: 535,
            @if(!empty($ourBrand) && $ourBrand->image != NULL)
            initialPreview: ["{{ $image_with_path }}",],
            initialPreviewConfig: [
                {
                    caption: "{{ ($ourBrand->image != NULL) ? $ourBrand->title : '' }}",
                    width: "120px",
                    key: "{{ ($ourBrand->image != NULL) ? 'image' : '0' }}",
                    url: 'about/our_brand/delete',
                }
            ]
            @endif
        });

        $("#webp_image").fileinput({
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
            @if(!empty($ourBrand) && $ourBrand->webp_image != NULL)
            initialPreview: ["{{ $webp_image_with_path }}",],
            initialPreviewConfig: [
                {
                    caption: "{{ ($ourBrand->webp_image != NULL) ? $ourBrand->title : '' }}",
                    key: "{{ ($ourBrand->webp_image != NULL) ? 'webp_image' : '0' }}",
                    url: 'about/our_brand/delete'
                }
            ]
            @endif
        });
    });
</script>
@endsection
