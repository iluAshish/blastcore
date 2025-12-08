@extends('web.layouts.main')
@section('content')

<section class="not-found">
    <div class="container-short text-center d-flex flex-column align-items-center">
        <img loading="lazy"  loading="lazy" src="{{asset('web/images/404.png')}}" class=" h-auto" width="511" height="250" alt="">
        <h1>Oops! Page not Found</h1>
        <p>The page you are looking for might have been removed
had its name changed or is temporarily unavailable.</p>
        <div class="d-flex flex-wrap justify-content-center">
            <a href="{{ route('index') }}" class="theme-btn  theme-bg">Back to home page</a>
            <a href="{{ route('contact') }}" class=" btn theme-btn theme-border">Contact Support</a>
        </div>
    </div>
</section>
@endsection