@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
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
                        <h3 class="h3">{{ $key }} Product</h3>
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
                                           id="title" required value="{{ isset($product)?$product->title:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_url">Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required" autocomplete="off" required
                                           value="{{ isset($product)?$product->short_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="first_description">First Description*</label>
                                  
                                    <textarea class="form-control textarea" required name="first_description"
                                              id="first_description">{{ isset($product)?$product->first_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="second_title">Second Title</label>
                                    <input type="text" class="form-control" name="second_title"
                                           placeholder="Second Title" id="second_title"
                                           value="{{ isset($product)?$product->second_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="second_description">Second Description</label>
                                    <textarea class="form-control textarea" name="second_description"
                                              id="second_description">{{ isset($product)?$product->second_description:'' }}</textarea>
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
                                    <label for="product_category_id">Product Category*</label>
                                    <select class="form-control select2" id="product_category_id"
                                            name="product_category_id" required>
                                        <option value="">Select Product Category</option>
                                        @foreach($product_category_options as $product_category)
                                            <option value="{{$product_category->id}}"
                                                {{(@$product->product_category_id==$product_category->id)?'selected':''}}>
                                                {{$product_category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="product_brand_id">Product Brand*</label>
                                    <select class="form-control select2" id="product_brand_id"
                                            name="product_brand_id" required>
                                        <option value="">Select Product Brand</option>
                                        @foreach($product_brand_options as $product_brand)
                                            <option value="{{$product_brand->id}}"
                                                {{(@$product->product_brand_id==$product_brand->id)?'selected':''}}>
                                                {{$product_brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="related_product">Related Products</label>
                                    <select class="form-control multiselect" id="related_products"
                                            name="related_products[]" multiple>
                                        @foreach($product_options as $related_product)
                                            <option value="{{$related_product->id}}">
                                                {{$related_product->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <textarea class="form-control" name="meta_title" id="meta_title"
                                              placeholder="Meta Title">{{ isset($product)?$product->meta_title:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description"
                                              placeholder="Meta Description">{{ isset($product)?$product->meta_description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($product)?$product->meta_keyword:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="other_meta_tag">Other Meta Tags</label>
                                    <textarea class="form-control" name="other_meta_tag" id="other_meta_tag"
                                              placeholder="other Meta Tag">{{ isset($product)?$product->other_meta_tag:'' }}</textarea>
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
            @if(isset($product) && $product->brochure != NULL)
            initialPreview: ["{{ $brochure_with_path }}",],
            initialPreviewConfig: [
                {
                    caption: "{{ ($product->brochure != NULL) ? $product->title : '' }}",
                    width: "120px",
                    key: "{{ ($product->brochure != NULL) ? 'brochure/'.$product->id : '0' }}",
                    url: 'product/delete-file'
                }
            ]
            @endif
        });

        @if(@$product)
        var array = [];
        @foreach($product->related as $related)
        array.push({{$related->id}})
        @endforeach
        $('#related_products').val(array).trigger('change');
        @endif
    </script>
@endsection
