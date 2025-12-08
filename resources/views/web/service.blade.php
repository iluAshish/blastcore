@extends('web.layouts.main')

@section('content')


<section class="inner-banner text-center">
    <picture><img src="{{asset('web/images/header.jpg')}}" alt=""></picture>
    <div class="container-ctn">
            <h1>Our Services</h1>
    <ul class="breadcrumb d-flex align-items-center justify-content-center m-0">
        <li><a href=""index.php>Home</a></li>
        <li><a href="">Services</a></li>
        <li><a href="">Foundry</a></li>
    </ul>
    </div>
</section>

<section class="service-detail commonPadding-120 pb-0">
    <div class="container-ctn">
            <div class="head text-center">
                <h2>Foundry</h2>
            </div>
           <picture><img src="{{asset('web/images/services/1.jpg')}}" width="1684" height="601" alt="" class="img-fluid"></picture>

           <div class="d-flex flex-wrap justify-content-between commonPadding service-detail-content list">
                <article>
                    <p>We are specialist in Foundry works in Cast iron, Brass, Bronze and Aluminium alloys. Specially casting all types of dewatering pumps spare parts etc…. Our foundry is equipped with conventional crucible furnace to carry out melting operations, for both ferrous casting as per standards and specialization. Having moulding process of molasses sand/green sand system for non ferrous (bronze, aluminium casting) and Sodium Silicate Co2 moulding process for Ci, Ductile Iron Castings. We have fully equipments, tools and accessories for making patterns in wood as well as aluminium.</p>
                    <p>The Foundry casters to the equipment of engineering sectors namely marine Eng., Crushing Industries, Process Industries, Oil Industries, Process Indutries etc. We also have facilities for heat treatment cycle for nitriding, hardening normalizing and annealing cycles.</p>
                        <ol>
                                <li>Aluminium Casting</li>
                                <li>Bronze Casting</li>
                                <li>Iron Casting</li>
                        </ol>
                    <button class=" btn theme-btn theme-bg" data-bs-toggle="modal" href="#downloadBrochureForm" role="button">Download Brochure</button>

                    <h3>Lorem Ipsum is simply dummy text </h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    <div class="d-flex flex-wrap article-picture ">
                         <picture>
                        <img src="{{asset('web/images/services/a.jpg')}}" width="478" height="462" alt="">
                        </picture>
                        <picture>
                            <img src="{{asset('web/images/services/b.jpg')}}" width="478" height="462" alt="">
                        </picture>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </article>
                <aside>
                    <div class="h2">Our Services</div>
                    <ul>
                        <li><a href="">Foundry</a></li>
                        <li><a href="">Machine Works</a></li>
                        <li><a href="">Heater</a></li>
                        <li><a href="">Motor Rewinding</a></li>
                        <li><a href="">Fabrications</a></li>
                        <li><a href="">Machinery</a></li>
                        <li><a href="">Electrical Control Pannel</a></li>
                        <li><a href="">Spring and Lock</a></li>
                        <li><a href="">Blower Manufacturing</a></li>
                        <li><a href="">Dynamic Balancing Machine</a></li>
                        <li><a href="">Rubber Parts Manufacturing</a></li>
                        <li><a href="">Gasket</a></li>
                        <li><a href="">Seals</a></li>
                    </ul>


                    <div class="contact-box">
                        <div class="h2">Contact us</div>
                        <a href="tel:+97142383844">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.48303 0.793297C3.70003 -0.416703 5.70403 -0.201703 6.72303 1.1603L7.98503 2.8443C8.81503 3.9523 8.74103 5.5003 7.75603 6.4793L7.51803 6.7173C7.49104 6.81721 7.4883 6.92211 7.51003 7.0233C7.57303 7.4313 7.91403 8.2953 9.34203 9.7153C10.77 11.1353 11.64 11.4753 12.054 11.5393C12.1583 11.5603 12.2661 11.5572 12.369 11.5303L12.777 11.1243C13.653 10.2543 14.997 10.0913 16.081 10.6803L17.991 11.7203C19.628 12.6083 20.041 14.8323 18.701 16.1653L17.28 17.5773C16.832 18.0223 16.23 18.3933 15.496 18.4623C13.686 18.6313 9.46903 18.4153 5.03603 14.0083C0.899027 9.8943 0.105027 6.3063 0.00402701 4.5383C-0.045973 3.6443 0.376027 2.8883 0.914027 2.3543L2.48303 0.793297ZM5.52303 2.0593C5.01603 1.3823 4.07203 1.3283 3.54003 1.8573L1.97003 3.4173C1.64003 3.7453 1.48203 4.1073 1.50203 4.4533C1.58203 5.8583 2.22203 9.0953 6.09403 12.9453C10.156 16.9833 13.907 17.1043 15.357 16.9683C15.653 16.9413 15.947 16.7873 16.222 16.5143L17.642 15.1013C18.22 14.5273 18.093 13.4813 17.275 13.0373L15.365 11.9983C14.837 11.7123 14.219 11.8063 13.835 12.1883L13.38 12.6413L12.85 12.1093C13.38 12.6413 13.379 12.6423 13.378 12.6423L13.377 12.6443L13.374 12.6473L13.367 12.6533L13.352 12.6673C13.3098 12.7065 13.2643 12.7419 13.216 12.7733C13.136 12.8263 13.03 12.8853 12.897 12.9343C12.627 13.0353 12.269 13.0893 11.827 13.0213C10.96 12.8883 9.81103 12.2973 8.28403 10.7793C6.75803 9.2613 6.16203 8.1193 6.02803 7.2533C5.95903 6.8113 6.01403 6.4533 6.11603 6.1833C6.17216 6.03137 6.25254 5.88953 6.35403 5.7633L6.38603 5.7283L6.40003 5.7133L6.40603 5.7073L6.40903 5.7043L6.41103 5.7023L6.69903 5.4163C7.12703 4.9893 7.18703 4.2823 6.78403 3.7433L5.52303 2.0593Z" fill="#2B398F"/>
                        </svg>
                            +971 - 4238 3844
                        </a>
                        <a href="mailto:info@jetblastintl.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                            <path d="M1 3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H3C2.46957 15 1.96086 14.7893 1.58579 14.4142C1.21071 14.0391 1 13.5304 1 13V3Z" stroke="#2B398F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 3L10 9L19 3" stroke="#2B398F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            info@jetblastintl.com
                        </a>
                        <a href="https://wa.me/+97142383844" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M9.48305 0.0125522C4.17305 0.262552 -0.0159543 4.65255 4.56812e-05 9.92955C0.00275272 11.4828 0.374641 13.0132 1.08505 14.3946L0.0270457 19.4956C0.0141366 19.5593 0.0175167 19.6253 0.0368734 19.6875C0.05623 19.7496 0.0909383 19.8058 0.137789 19.851C0.184639 19.8961 0.242119 19.9287 0.304913 19.9458C0.367707 19.9629 0.433788 19.9638 0.497046 19.9486L5.53105 18.7646C6.86455 19.4228 8.32807 19.7754 9.81505 19.7966C15.242 19.8796 19.766 15.6016 19.935 10.2166C20.117 4.44155 15.318 -0.264448 9.48305 0.0115522V0.0125522ZM15.49 15.3796C14.7647 16.1026 13.9036 16.6754 12.9564 17.0649C12.0091 17.4545 10.9943 17.6532 9.97005 17.6496C8.76518 17.6521 7.5761 17.3756 6.49605 16.8416L5.79505 16.4946L2.70805 17.2206L3.35805 14.0896L3.01205 13.4176C2.4504 12.3306 2.15949 11.1241 2.16405 9.90055C2.16405 7.83055 2.97605 5.88355 4.45005 4.42055C5.91924 2.96625 7.9028 2.15019 9.97005 2.14955C12.056 2.14955 14.016 2.95555 15.49 4.41955C16.2163 5.13512 16.7927 5.98832 17.1854 6.92925C17.5781 7.87018 17.7792 8.87997 17.777 9.89955C17.777 11.9516 16.952 13.9296 15.49 15.3806V15.3796Z" fill="#2B398F"/>
                            <path d="M14.8092 12.045L12.8782 11.495C12.7536 11.4589 12.6216 11.4571 12.4961 11.4899C12.3706 11.5226 12.2563 11.5886 12.1652 11.681L11.6932 12.159C11.5953 12.2576 11.4707 12.3253 11.3347 12.3537C11.1987 12.3822 11.0574 12.3701 10.9282 12.319C10.0152 11.952 8.09318 10.256 7.60218 9.407C7.53282 9.28725 7.50107 9.14941 7.51106 9.01138C7.52104 8.87335 7.5723 8.74152 7.65818 8.633L8.07018 8.103C8.14949 8.00145 8.19968 7.88023 8.21536 7.75234C8.23104 7.62445 8.21162 7.4947 8.15918 7.377L7.34718 5.553C7.30125 5.45105 7.23231 5.36114 7.14576 5.29034C7.05922 5.21954 6.95743 5.16979 6.8484 5.14498C6.73937 5.12017 6.62607 5.12098 6.51742 5.14736C6.40876 5.17374 6.3077 5.22496 6.22218 5.297C5.68318 5.75 5.04318 6.437 4.96618 7.2C4.82918 8.543 5.40918 10.236 7.60318 12.27C10.1382 14.619 12.1692 14.93 13.4902 14.611C14.2402 14.431 14.8402 13.708 15.2172 13.117C15.2775 13.0231 15.3149 12.9164 15.3264 12.8054C15.338 12.6945 15.3233 12.5823 15.2836 12.4781C15.2439 12.3738 15.1803 12.2803 15.0979 12.2051C15.0155 12.1299 14.9166 12.075 14.8092 12.045Z" fill="#2B398F"/>
                            </svg>
                            WhatsApp Call Now
                        </a>
                    </div>
                </aside>

           </div>
    </div>
</section>

<section class="service-form commonPadding pb-0">
    <div class="container-ctn pt-0 commonPadding-120">
        <div class="enquiry-wrapper">
            <h2>Enquire Now</h2>
            <p class="subtitle">Fill up the form and Our Team will get back to you within 24 hours</p>

            <form>
                <!-- Row 1 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group col--6">
                        <input type="text" id="name" placeholder=" " name="serviceName" />
                        <label for="name">Name<span class="required">*</span></label>
                        <span id="serviceNameError" class="error-message">Please enter your name</span>
                    </div>
                    <div class="form-group col--6">
                        <input type="email" id="email" placeholder=" "   name="serviceEmail"/>
                        <label for="email">Email<span class="required">*</span></label>
                        <span id="serviceEmailError" class="error-message">Please enter your email</span>
                    </div>
        
                    <div class="form-group col--6">
                        <input type="tel" id="phone" placeholder=" "  name="servicePhone"/>
                        <label for="phone">Phone<span class="required">*</span></label>
                                        <span id="servicePhoneError" class="error-message">Please enter your phone</span>

                    </div>
                    <div class="form-group col--6">
                        <input type="text" id="company" placeholder=" " />
                        <label for="company">Company</label>

                    </div>
        
                    <div class="form-group w-100">
                        <textarea id="message" placeholder=" " name="serviceMessage"></textarea>
                        <label for="message">Message<span class="required">*</span></label>
                        <span id="serviceMessageError" class="error-message">Please enter your message</span>

                    </div>
                </div>
                <div class="button-wrap d-flex flex-wrap ">
                    <button type="submit" class="btn service-btn btn-submit">SUBMIT</button>
                    <button type="button" class="btn  service-btn btn-cancel">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
