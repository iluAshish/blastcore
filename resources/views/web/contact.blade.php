@extends('web.layouts.main')

@section('content')

<section class="inner-banner text-center">
    <picture><img loading="lazy"  src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
        <h1>Contact Us</h1>
        <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="#">Contact Us </a></li>
        </ul>
    </div>
</section>

<section class="contact commonPadding-120">
    <div class="container-ctn">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="contact-location-container">
                <div class="contact-location-card d-flex justify-content-between flex-wrap">
                    <div class="left d-flex flex-wrap">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26" fill="none">
                                <path
                                    d="M19.8337 10.4993C19.8337 18.0827 10.5003 24.4994 10.5003 24.4994C10.5003 24.4994 1.16699 18.0827 1.16699 10.4993C1.16699 8.024 2.15032 5.65003 3.90066 3.89969C5.651 2.14935 8.02497 1.16602 10.5003 1.16602C12.9757 1.16602 15.3496 2.14935 17.1 3.89969C18.8503 5.65003 19.8337 8.024 19.8337 10.4993Z"
                                    stroke="#304B9F" stroke-width="2.33333" />
                                <path
                                    d="M14 10.498C14 11.4263 13.6313 12.3165 12.9749 12.9729C12.3185 13.6293 11.4283 13.998 10.5 13.998C9.57174 13.998 8.6815 13.6293 8.02513 12.9729C7.36875 12.3165 7 11.4263 7 10.498C7 9.56979 7.36875 8.67955 8.02513 8.02317C8.6815 7.3668 9.57174 6.99805 10.5 6.99805C11.4283 6.99805 12.3185 7.3668 12.9749 8.02317C13.6313 8.67955 14 9.56979 14 10.498Z"
                                    stroke="#304B9F" stroke-width="2.33333" /> </svg>
                        </i>
                        <div class="contact-location-card-details">
                            <h3>Address</h3>
                            <p>
                                Office No: 119 Al hilal bank building, 
                                Al Nahda St - Al Qusais, PB 624438 Al Qusais,  Dubai, United Arab Emirates
                            </p>
                            <div class="d-flex  buttonGroup p-0 w-100">
                                <a class=" btn theme-btn theme-bg" href="#">
                                    View Map</a>
                                <a class=" btn theme-btn theme-border" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                                        fill="none">
                                        <path
                                            d="M12.6441 0.0167363C5.56406 0.35007 -0.0212724 6.2034 6.09083e-05 13.2394C0.0036703 15.3105 0.499521 17.351 1.44673 19.1927L0.0360609 25.9941C0.0188488 26.0791 0.0233556 26.1671 0.0491645 26.2499C0.0749734 26.3328 0.121251 26.4078 0.183718 26.468C0.246186 26.5282 0.322825 26.5717 0.406551 26.5944C0.490276 26.6171 0.578384 26.6184 0.662728 26.5981L7.37473 25.0194C9.15273 25.8971 11.1041 26.3672 13.0867 26.3954C20.3227 26.5061 26.3547 20.8021 26.5801 13.6221C26.8227 5.92207 20.4241 -0.352597 12.6441 0.015403V0.0167363ZM20.6534 20.5061C19.6862 21.4702 18.5382 22.2339 17.2752 22.7533C16.0122 23.2727 14.659 23.5375 13.2934 23.5327C11.6869 23.5362 10.1015 23.1674 8.66139 22.4554L7.72673 21.9927L3.61073 22.9607L4.47739 18.7861L4.01606 17.8901C3.2672 16.4408 2.87933 14.8321 2.88539 13.2007C2.88539 10.4407 3.96806 7.84474 5.93339 5.89407C7.89232 3.955 10.5371 2.86692 13.2934 2.86607C16.0747 2.86607 18.6881 3.94074 20.6534 5.89274C21.6218 6.84683 22.3903 7.98442 22.9138 9.239C23.4374 10.4936 23.7056 11.84 23.7027 13.1994C23.7027 15.9354 22.6027 18.5727 20.6534 20.5074V20.5061Z"
                                            fill="#304B9F" />
                                        <path
                                            d="M19.7449 16.06L17.1703 15.3267C17.0041 15.2785 16.8281 15.2762 16.6608 15.3198C16.4935 15.3635 16.341 15.4515 16.2196 15.5747L15.5903 16.212C15.4598 16.3434 15.2936 16.4337 15.1122 16.4716C14.9309 16.5096 14.7425 16.4935 14.5703 16.4253C13.3529 15.936 10.7903 13.6747 10.1356 12.5427C10.0431 12.383 10.0008 12.1992 10.0141 12.0152C10.0274 11.8311 10.0958 11.6554 10.2103 11.5107L10.7596 10.804C10.8653 10.6686 10.9323 10.507 10.9532 10.3365C10.9741 10.1659 10.9482 9.99293 10.8783 9.836L9.79559 7.404C9.73435 7.26806 9.64243 7.14819 9.52703 7.05379C9.41164 6.95939 9.27592 6.89305 9.13055 6.85997C8.98518 6.82689 8.83412 6.82798 8.68924 6.86315C8.54436 6.89832 8.40961 6.96661 8.29559 7.06266C7.57692 7.66666 6.72359 8.58266 6.62092 9.6C6.43825 11.3907 7.21159 13.648 10.1369 16.36C13.5169 19.492 16.2249 19.9067 17.9863 19.4813C18.9863 19.2413 19.7863 18.2773 20.2889 17.4893C20.3693 17.3642 20.4192 17.2219 20.4346 17.0739C20.45 16.926 20.4304 16.7764 20.3775 16.6374C20.3246 16.4984 20.2398 16.3737 20.1299 16.2734C20.0201 16.1731 19.8882 16.1 19.7449 16.06Z"
                                            fill="#304B9F" /> </svg>
                                    WhatsApp us</a>
    
                            </div>
                        </div>
                    </div>
                    <div class="right d-flex flex-wrap ">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="17" height="24" viewBox="0 0 17 24" fill="none">
                                <path
                                    d="M11.9583 0.875H4.375C2.442 0.875 0.875 2.442 0.875 4.375V18.9583C0.875 20.8913 2.442 22.4583 4.375 22.4583H11.9583C13.8913 22.4583 15.4583 20.8913 15.4583 18.9583V4.375C15.4583 2.442 13.8913 0.875 11.9583 0.875Z"
                                    stroke="#304B9F" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 18.375H9.33333" stroke="#304B9F" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" /> </svg></i>
                        <div class="contact-location-contact-info">
                            <h3>Contact Info</h3>
                            <a href="mailto:info@jetblastintl.com">info@jetblastintl.com</a>
                            <a href="tel:+97142383844">+971 - 4238 3844</a>
    
                            <a href="mailto:info@jetblastintl.com">info@jetblastintl.com</a>
                            <a href="tel:+97142383844">+971 - 4238 3844</a>
    
                        </div>
                    </div>
                </div>
                <div class="contact-location-card d-flex justify-content-between flex-wrap">
                    <div class="left d-flex flex-wrap">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26" fill="none">
                                <path
                                    d="M19.8337 10.4993C19.8337 18.0827 10.5003 24.4994 10.5003 24.4994C10.5003 24.4994 1.16699 18.0827 1.16699 10.4993C1.16699 8.024 2.15032 5.65003 3.90066 3.89969C5.651 2.14935 8.02497 1.16602 10.5003 1.16602C12.9757 1.16602 15.3496 2.14935 17.1 3.89969C18.8503 5.65003 19.8337 8.024 19.8337 10.4993Z"
                                    stroke="#304B9F" stroke-width="2.33333" />
                                <path
                                    d="M14 10.498C14 11.4263 13.6313 12.3165 12.9749 12.9729C12.3185 13.6293 11.4283 13.998 10.5 13.998C9.57174 13.998 8.6815 13.6293 8.02513 12.9729C7.36875 12.3165 7 11.4263 7 10.498C7 9.56979 7.36875 8.67955 8.02513 8.02317C8.6815 7.3668 9.57174 6.99805 10.5 6.99805C11.4283 6.99805 12.3185 7.3668 12.9749 8.02317C13.6313 8.67955 14 9.56979 14 10.498Z"
                                    stroke="#304B9F" stroke-width="2.33333" /> </svg>
                        </i>
                        <div class="contact-location-card-details">
                            <h3>Address</h3>
                            <p>
                             Al Nouf Eng. Turning LLCPo Box 96780 Industrial area Sharjah, United Arab Emirates
                            </p>
                            <div class="d-flex   buttonGroup p-0 w-100">
                                <a class=" btn theme-btn theme-bg" href="#">
                                    View Map</a>
                                <a class=" btn theme-btn theme-border" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                                        fill="none">
                                        <path
                                            d="M12.6441 0.0167363C5.56406 0.35007 -0.0212724 6.2034 6.09083e-05 13.2394C0.0036703 15.3105 0.499521 17.351 1.44673 19.1927L0.0360609 25.9941C0.0188488 26.0791 0.0233556 26.1671 0.0491645 26.2499C0.0749734 26.3328 0.121251 26.4078 0.183718 26.468C0.246186 26.5282 0.322825 26.5717 0.406551 26.5944C0.490276 26.6171 0.578384 26.6184 0.662728 26.5981L7.37473 25.0194C9.15273 25.8971 11.1041 26.3672 13.0867 26.3954C20.3227 26.5061 26.3547 20.8021 26.5801 13.6221C26.8227 5.92207 20.4241 -0.352597 12.6441 0.015403V0.0167363ZM20.6534 20.5061C19.6862 21.4702 18.5382 22.2339 17.2752 22.7533C16.0122 23.2727 14.659 23.5375 13.2934 23.5327C11.6869 23.5362 10.1015 23.1674 8.66139 22.4554L7.72673 21.9927L3.61073 22.9607L4.47739 18.7861L4.01606 17.8901C3.2672 16.4408 2.87933 14.8321 2.88539 13.2007C2.88539 10.4407 3.96806 7.84474 5.93339 5.89407C7.89232 3.955 10.5371 2.86692 13.2934 2.86607C16.0747 2.86607 18.6881 3.94074 20.6534 5.89274C21.6218 6.84683 22.3903 7.98442 22.9138 9.239C23.4374 10.4936 23.7056 11.84 23.7027 13.1994C23.7027 15.9354 22.6027 18.5727 20.6534 20.5074V20.5061Z"
                                            fill="#304B9F" />
                                        <path
                                            d="M19.7449 16.06L17.1703 15.3267C17.0041 15.2785 16.8281 15.2762 16.6608 15.3198C16.4935 15.3635 16.341 15.4515 16.2196 15.5747L15.5903 16.212C15.4598 16.3434 15.2936 16.4337 15.1122 16.4716C14.9309 16.5096 14.7425 16.4935 14.5703 16.4253C13.3529 15.936 10.7903 13.6747 10.1356 12.5427C10.0431 12.383 10.0008 12.1992 10.0141 12.0152C10.0274 11.8311 10.0958 11.6554 10.2103 11.5107L10.7596 10.804C10.8653 10.6686 10.9323 10.507 10.9532 10.3365C10.9741 10.1659 10.9482 9.99293 10.8783 9.836L9.79559 7.404C9.73435 7.26806 9.64243 7.14819 9.52703 7.05379C9.41164 6.95939 9.27592 6.89305 9.13055 6.85997C8.98518 6.82689 8.83412 6.82798 8.68924 6.86315C8.54436 6.89832 8.40961 6.96661 8.29559 7.06266C7.57692 7.66666 6.72359 8.58266 6.62092 9.6C6.43825 11.3907 7.21159 13.648 10.1369 16.36C13.5169 19.492 16.2249 19.9067 17.9863 19.4813C18.9863 19.2413 19.7863 18.2773 20.2889 17.4893C20.3693 17.3642 20.4192 17.2219 20.4346 17.0739C20.45 16.926 20.4304 16.7764 20.3775 16.6374C20.3246 16.4984 20.2398 16.3737 20.1299 16.2734C20.0201 16.1731 19.8882 16.1 19.7449 16.06Z"
                                            fill="#304B9F" /> </svg>
                                    WhatsApp us</a>
    
                            </div>
                        </div>
                    </div>
                    <div class="right d-flex flex-wrap ">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="17" height="24" viewBox="0 0 17 24" fill="none">
                                <path
                                    d="M11.9583 0.875H4.375C2.442 0.875 0.875 2.442 0.875 4.375V18.9583C0.875 20.8913 2.442 22.4583 4.375 22.4583H11.9583C13.8913 22.4583 15.4583 20.8913 15.4583 18.9583V4.375C15.4583 2.442 13.8913 0.875 11.9583 0.875Z"
                                    stroke="#304B9F" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 18.375H9.33333" stroke="#304B9F" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" /> </svg></i>
                        <div class="contact-location-contact-info">
                            <h3>Contact Info</h3>
                            <a href="mailto:info@jetblastintl.com">info@jetblastintl.com</a>
                            <a href="tel:+97142383844">+971 - 4238 3844</a>
    
                            <a href="mailto:info@jetblastintl.com">info@jetblastintl.com</a>
                            <a href="tel:+97142383844">+971 - 4238 3844</a>
    
                        </div>
                    </div>
                </div>

            </div>

            <div class="contact-form">
                <h3>Get in touch</h3>
                <form id="contactPageForm" action="" method="post" enctype="multipart/form-data">
                    <div class="d-flex flex-wrap justify-content-between">
                            <div class="formGroup w-100">
                        <input type="text" id="name_enquiry" name="name_enquiry" placeholder="Name">
                        <span id="name_enquiryError" class="error-message">Please enter your name</span>
                    </div>
                    <div class="formGroup w-100">
                        <input type="email" id="email_enquiry" name="email_enquiry" placeholder="Email">
                        <span id="email_enquiryError" class="error-message">Please enter a valid email</span>
                    </div>
                    <div class="formGroup w-100">
                        <input type="tel" id="phone_enquiry" name="phone_enquiry" class="phone_number" placeholder="Phone">
                        <span id="phone_enquiryError" class="error-message">Please enter a valid phone number</span>
                    </div>
            
                    <div class="formGroup w-100">
                        <textarea id="message_enquiry" name="message_enquiry" rows="" cols="" placeholder="Message"></textarea>
                        <span id="message_enquiryError" class="error-message">Please enter your message</span>
                    </div>
                    <div class="d-flex buttonGroup p-0 w-100">
                        <button type="submit" class=" btn theme-btn theme-bg"> Send a message</button>  
                    </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</section>

@endsection