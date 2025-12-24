@extends('web.layouts.main')
@section('content')
<section class="inner-banner text-center">
    <picture><img src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
        <h1>Our Products</h1>
        <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="#">{{$product->title}}</a></li>
        </ul>
    </div>
</section>



<section class="product-detail">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="product-detail-featured">
                <div class="product-detail-image">
                    @foreach($product->activeImages as $image)
                        <picture>
                            <img loading="lazy" src="{{asset('uploads/product/image/'.$product->id.'/'.$image->image)}}" alt="{{$image->image_meta_tag}}" width="415" height="321" class="img-fluid">
                        </picture>
                    @endforeach
                 </div>
                <div class="product-detail-image-nav">
                    @foreach($product->activeImages as $image)                    
                        <picture>
                            <img loading="lazy" src="{{asset('uploads/product/image/'.$product->id.'/'.$image->image)}}" alt="{{$image->image_meta_tag}}" width="145" height="112" class="img-fluid">
                        </picture>
                    @endforeach
                 </div>
            </div>
            <div class="product-detail-content list">
                <h2>{{$product->title}}</h2>
                <div class="brand d-flex-flex-wrap">
                    <picture>
                    <img src="{{asset('uploads/product/brand/webp/'.$product->brand->webp_image ??$product->brand->image )}}" width="167" height="87" alt="{{$product->brand->image_meta_tag}}">
                </picture>
                </div>
                  <div class="d-flex  buttonGroup p-0 w-100">
                        <button class="btn theme-btn theme-bg enquiryBtn"
                                data-bs-toggle="modal"
                                data-bs-target="#ProductEnquiryForm"
                                data-product-id="{{ $product->id }}"
                                data-product-name="{{ $product->title }}"
                                data-product-url="{{ route('productDetail',['category'=> $product->category->short_url, 'short_url'=>$product->short_url]) }}">
                            Quick Enquiry
                        </button>

                        @if($product->brochure || $siteInformation->product_brochure)
                            <div class="contentForm">
                                <a href="{{ $product->brochure ? asset('uploads/product/brochure/'. $product->brochure) : asset('uploads/site/product_brochure/' . $siteInformation->product_brochure) }}"
                                target="_blank">
                                    <button class=" btn theme-btn theme-border" data-bs-toggle="modal" href="#downloadBrochureForm" role="button">
                                    Download Brochure</button>
                                </a>
                            </div>
                        @endif                  
                </div>
                {!! $product->first_description !!}
          </div>
        </div>

        <div class="product-detail-long-description list">
            {!! $product->second_description !!}  
        </div>
    </div>
</section>

@push('scripts')
<script>
    let selectedProduct = {};

    $(document).on('click', '.enquiryBtn', function () {

        selectedProduct = {
            id: $(this).data('product-id'),
            name: $(this).data('product-name'),
            url: $(this).data('product-url')
        };

        $('#product_id').val(selectedProduct.id);
        $('#product_enquiry_name').val(selectedProduct.name);
    });
</script>
@endpush



@endsection