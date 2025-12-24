@extends('web.layouts.main')
@section('content')
<section class="inner-banner text-center">
    <picture><img src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
            <h1>Terms & Conditions</h1>
    <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="#">Terms & Conditions</a></li>
    </ul>
    </div>
</section>


<section class="policy">
    <div class="container-ctn">
        {!! $siteInformation->terms_conditions !!}
    </div>
</section>

@endsection