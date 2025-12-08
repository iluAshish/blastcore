@extends('web.layouts.main')

@section('content')

    <!-- banner section starts here  -->
    <section class="bannerAllpages">
        <div class="bannerbackgroundBG">
            <img src="{{asset('web/images/blogs/banner.jpg')}}" alt="banner image">
        </div>
        <div class="container">
            <div class="row bannerserviceContent">
                <div class="bannerserviceontentLeft">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><img
                                        src="{{asset('web/images/breadcrumb.svg')}}" alt="">
                                    HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CONTACT US</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 col-md-12 col-12 bannerserviceontentCenter">
                    <h1>CONTACT US</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section ends here  -->

    <!-- quick support section starts here  -->
    <section class="contactSupport">
        <img src="{{asset('web/images/contactusbackform.jpg')}}" alt="" class="contactSupportBg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 contactSupportLeft">
                    <div class="row adressContact">
                        <div class="col-md-12">
                            <h3>QUICK SUPPORT.</h3>
                        </div>
                        @foreach($contacts as $contact)
                            <div class="col-md-{{ ($contacts->count() == 1)?12:6 }} ">
                                <h4>{{ $contact->map_title }}</h4>
                                <ul>
                                    <li><h6><img src="{{asset('web/images/svg/locwhite.svg')}}" alt=""></h6>
                                        <h5>{!! $contact->address !!}</h5></li>
                                    <li><h6><img src="{{asset('web/images/svg/mailwhite.svg')}}" alt=""></h6>
                                        <h5>{{ $contact->email }}</h5>
                                    </li>
                                    <li><h6><img src="{{asset('web/images/svg/callwhite.svg')}}" alt=""></h6>
                                        <h5>{{ $contact->phone_number }}</h5>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="row timingContact">
                        <div class="col-md-12 timing">
                            <h4>Working Hours</h4>
                            <p>{{ $contacts[0]->working_hours }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 contactSupportRight">
                    <div class="row contactSuppportform">
                        <div class="col-md-12">
                            <form action="#" id="contactPageForm">
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formName.svg')}}" alt="">
                                    <input class="form-control required" type="text" name="name" id="name"
                                           placeholder="Name*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formPhone.svg')}}" alt="">
                                    <input class="form-control required" type="text" name="phone" id="phone"
                                           placeholder="Phone*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formMail.svg')}}" alt="">
                                    <input class="form-control required" type="text" name="email" id="email"
                                           placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <img src="{{asset('web/images/svg/formMessage.svg')}}" alt="">
                                    <textarea class="form-control required" name="message" id="message" rows="3"
                                              placeholder="Message*"></textarea>
                                </div>
                                <button type="submit" class="secondary_button" data-url="/contact"
                                        id="contact_form_btn">CONTACT NOW
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row timingContact">
                        <div class="col-md-12 socialMediaIcons">
                            <!-- <div class="col-md-5 socialMediaIcons"> -->
                            <ul>
                                <li><a href="{{ $siteInformation->facebook_url }}" target="_blank"><img
                                            src="{{asset('web/images/svg/facebookFooter.svg')}}" alt=""></a>
                                </li>
                                <li><a href="{{ $siteInformation->instagram_url }}" target="_blank"><img
                                            src="{{asset('web/images/svg/instagramfooter.svg')}}" alt=""></a>
                                </li>
                                <li><a href="{{ $siteInformation->youtube_url }}" target="_blank"><img
                                            src="{{asset('web/images/svg/youtubeFooter.svg')}}" alt=""></a>
                                </li>
                                <li><a href="{{ $siteInformation->linkedin_url }}" target="_blank"><img
                                            src="{{asset('web/images/svg/linkedinFooter.svg')}}" alt=""></a>
                                </li>
                            </ul>
                            <!-- </div> -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="row timingContact timingContactMobile">
                <!-- <div class="col-md-7 timing">
                    <h4>Working Hours</h4>
                    <p>Monday to Saturday - 8PM - 7PM</p>
                </div> -->
                <div class="col-md-5 socialMediaIcons">
                    <ul>
                        <li><a href="{{ $siteInformation->facebook_url }}"><img
                                    src="{{asset('web/images/svg/facebookFooter.svg')}}" alt=""></a></li>
                        <li><a href="{{ $siteInformation->instagram_url }}"><img
                                    src="{{asset('web/images/svg/instagramfooter.svg')}}" alt=""></a></li>
                        <li><a href="{{ $siteInformation->youtube_url }}"><img
                                    src="{{asset('web/images/svg/youtubeFooter.svg')}}" alt=""></a></li>
                        <li><a href="{{ $siteInformation->linkedin_url }}"><img
                                    src="{{asset('web/images/svg/linkedinFooter.svg')}}" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="row maps">
                @foreach($contacts as $contact)
                    <div class="col-lg-{{ ($contacts->count() == 1)?12:6 }} col-md-12">
                        <h4>{{ $contact->map_title }}</h4>
                        <div class="mapSize" id="contactMap">
                            <iframe
                                src="{{ $contact->map }}"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- quick support section ends here  -->

@endsection
