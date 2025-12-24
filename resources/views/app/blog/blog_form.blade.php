@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Blog</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
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
                        <h3 class="h3">{{ $key }} Blog</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control for_canonical_url" name="title"
                                           placeholder="Title"
                                           id="title" required value="{{ isset($blog)?$blog->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_url">Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required" autocomplete="off" required
                                           value="{{ isset($blog)?$blog->short_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="image">Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 814X429</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_image">Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_meta_tag">Image Meta Tag</label>
                                    <input type="text" name="image_meta_tag" id="image_meta_tag" required
                                           placeholder="Image Alternate Text" class="form-control placeholder-cls"
                                           autocomplete="off" value="{{ isset($blog)?$blog->image_meta_tag:'' }}">
                                </div>
                            </div>
                            <!-- new author image  -->
                             <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="author_image">Author image</label>
                                    <div class="file-loading">
                                        <input id="author_image" name="author_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Author size should be minimum of 30 x 30</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="author_webp_image">Author Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="author_webp_image" name="author_webp_image" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="author_name">Author Name</label>
                                    <input type="text" name="author_name" id="author_name" required
                                           placeholder="Author Name" class="form-control placeholder-cls"
                                           autocomplete="off" value="{{ isset($blog)?$blog->author_name:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description*</label>
                                    <textarea class="form-control textarea" required name="description"
                                              id="description">{{ isset($blog)?$blog->description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quote_tag_line">Quote Tag Line</label>
                                        <input type="text" class="form-control" name="quote_tag_line"
                                               placeholder="Quote Tag Line" id="quote_tag_line"
                                               value="{{ isset($blog)?$blog->quote_tag_line:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="second_title">Second Title</label>
                                        <input type="text" class="form-control" name="second_title"
                                               placeholder="Second Title" id="second_title"
                                               value="{{ isset($blog)?$blog->second_title:'' }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="second_description">Second Description</label>
                                    <textarea class="form-control textarea" name="second_description"
                                              id="second_description">{{ isset($blog)?$blog->second_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="third_description">Third Description</label>
                                    <textarea class="form-control textarea" name="third_description"
                                              id="third_description">{{ isset($blog)?$blog->third_description:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fourth_description">Fourth Description</label>
                                    <textarea class="form-control textarea" name="fourth_description"
                                              id="fourth_description">{{ isset($blog)?$blog->fourth_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="video_url">Video URL</label>
                                    <input type="text" name="video_url" id="video_url" placeholder="Video URL"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($blog)?$blog->video_url:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="posted_date">Posted Date*</label>
                                    <input type="date" name="posted_date" id="posted_date" placeholder="Posted Date"
                                           class="form-control required" required autocomplete="off"
                                           value="{{ isset($blog)?$blog->posted_date:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="video_thumbnail_image">Video Thumbnail Image</label>
                                    <div class="file-loading">
                                        <input id="video_thumbnail_image" name="video_thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 390X306</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_video_thumbnail_image">Video Thumbnail Image (webp)</label>
                                    <div class="file-loading">
                                        <input id="webp_video_thumbnail_image" name="webp_video_thumbnail_image"
                                               type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="video_thumbnail_image_meta_tag">Video Thumbnail Image Meta Tag</label>
                                    <input type="text" name="video_thumbnail_image_meta_tag"
                                           id="video_thumbnail_image_meta_tag" placeholder="Image Alternate Text"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($blog)?$blog->video_thumbnail_image_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title"
                                              placeholder="Meta Title">{{ isset($blog)?$blog->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              placeholder="Meta Description">{{ isset($blog)?$blog->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($blog)?$blog->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag" id="other_meta_tag"
                                              placeholder="other Meta Tag">{{ isset($blog)?$blog->other_meta_tag:'' }}</textarea>
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
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: true,
                minImageWidth: 814,
                minImageHeight: 429,
                maxImageWidth: 814,
                maxImageHeight: 429,
                @if(isset($blog) && $blog->image != NULL)
                initialPreview: [" {{$image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($blog->image != NULL) ? $blog->title : ''}}",
                        width: "120px",
                        key: " {{($blog->image != NULL) ? 'image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
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
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                @if(isset($blog) && $blog->webp_image != NULL)
                initialPreview: [" {{$image_with_webp_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($blog->webp_image != NULL) ? $blog->title : ''}}",
                        width: "120px",
                        key: " {{($blog->webp_image != NULL) ? 'webp_image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
                    }
                ],
                @endif
            });

            $("#author_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: true,
                minImageWidth: 30,
                minImageHeight: 30,
                maxImageWidth: 30,
                maxImageHeight: 30,
                @if(isset($blog) && $blog->author_image != NULL)
                initialPreview: [" {{$author_image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($blog->author_image != NULL) ? $blog->author_name : ''}}",
                        width: "120px",
                        key: " {{($blog->author_image != NULL) ? 'image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
                    }
                ]
                @endif
            });

            $("#author_webp_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                @if(isset($blog) && $blog->author_webp_image != NULL)
                initialPreview: [" {{$author_image_with_webp_path}}",],
                initialPreviewConfig: [
                    {
                        caption: " {{($blog->author_webp_image != NULL) ? $blog->title : ''}}",
                        width: "120px",
                        key: " {{($blog->author_webp_image != NULL) ? 'webp_image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
                    }
                ],
                @endif
            });

            $("#video_thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                minImageWidth: 390,
                minImageHeight: 306,
                maxImageWidth: 390,
                maxImageHeight: 306,
                @if(isset($blog) && $blog->video_thumbnail_image != NULL)
                initialPreview: ["{{$video_thumbnail_image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{($blog->video_thumbnail_image != NULL) ? $blog->title : ''}}",
                        width: "120px",
                        key: "{{($blog->video_thumbnail_image != NULL) ? 'video_thumbnail_image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
                    }
                ]
                @endif
            });

            $("#webp_video_thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: true,
                allowedFileExtensions: ["webp"],
                <?php if(isset($blog) && $blog->webp_video_thumbnail_image != NULL){?>
                initialPreview: ["{{$webp_video_thumbnail_image_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{($blog->webp_video_thumbnail_image != NULL) ? $blog->title : ''}}",
                        width: "120px",
                        key: "{{($blog->webp_video_thumbnail_image != NULL) ? 'webp_video_thumbnail_image/' . $blog->id : '0'}}",
                        url: 'blog/delete'
                    }
                ]
                <?php }?>
            });
        });
    </script>
@endsection
