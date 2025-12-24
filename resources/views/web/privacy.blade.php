@extends('web.layouts.main')

@section('content')

<section class="inner-banner text-center">
    <picture><img loading="lazy"  src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
        <h1>Privacy Policy</h1>
        <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </div>
</section>


<section class="policy">
    <div class="container-ctn">
        {!! $siteInformation->privacy !!}
    </div>
</section>

@endsection