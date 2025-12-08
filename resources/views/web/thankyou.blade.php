@extends('web.layouts.main')
@section('content')
<section class="thank-you position-relative">
    <div class="container-ctn  text-center">
        <picture>
            <img loading="lazy" src="{{asset('web/images/thank-you.png')}}" class=" h-auto" width="928" height="180" alt="">
        </picture>


        <p>Your submission has been receive. We will be in touch and contact you soon.</p>
        <a href="{{route('index')}}" class="theme-btn  theme-bg mx-auto">Back to home page</a>
    </div>
</section>

@endsection