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
       <ol>
            <li>
                <h3>Acceptance Of Terms</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>

            <li>
                <h3>Using Our Products</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>

            <li>
                <h3>General Restrictions</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>

            <li>
                <h3>Privacy Pulicy</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>

            <li>
                <h3>Disclaimer Of Warranties</h3>
                <p><strong>5.1</strong> Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                <p><strong>5.2</strong> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p><strong>5.3</strong> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>

            <li>
                <h3>Content Pulicy</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </li>

            <li>
                <h3>Copyrights Pulicy</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </li>

            <li>
                <h3>Limitation Of Liability</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </li>

            <li>
                <h3>Changes To Terms And Conditions</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </li>

            <li>
                <h3>Contact Information</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Please contact us at <a href="mailto:info@blastcore.com">info@blastcore.com</a>.</p>
            </li>
        </ol>

    </div>
</section>

@endsection