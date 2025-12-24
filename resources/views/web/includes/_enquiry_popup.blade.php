<div class="modal fade siteEnquiryForm" id="siteEnquiryForm" aria-hidden="true" aria-labelledby="siteEnquiryFormLabel"
    tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                id="siteEnquiryFormClose">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <path d="M0.75 9.236L9.236 0.75M9.236 9.236L0.75 0.75" stroke="#414A66" stroke-width="1.5"
                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <div class="modal-body p-0">
                <!-- Label used by aria-labelledby -->
                <p class="title " id="siteEnquiryFormLabel">
                    Get A Quote
                </p>
                <p class="mb-4">
                    Fill up the form and Our Team will get back to you within 24 Hours
                </p>

                <form action="#" id="getAQuoteForm" class="d-flex flex-wrap justify-content-between" novalidate>
                    <div class="formGroup col--4">
                        <input type="text"  name="name" id="name" placeholder="Name*" autocomplete="name"
                            required aria-describedby="nameError">
                        <span id="nameError" class="error-message d-none">
                            Please enter your name
                        </span>
                    </div>

                    <div class="formGroup col--4">
                        <input type="email" id="email" name="email" placeholder="Email*"
                            autocomplete="email" required aria-describedby="emailError">
                        <span id="emailError" class="error-message d-none">
                            Please enter a valid email
                        </span>
                    </div>

                    <div class="formGroup col--4">
                        <input type="tel" id="phone" name="phone" class="phone_number"
                            placeholder="Phone*" autocomplete="tel" required aria-describedby="phoneError" >
                        <span id="phoneError" class="error-message d-none">
                            Please enter a valid phone number
                        </span>
                    </div>

                    <div class="formGroup col-12">
                        <textarea id="message" name="message" placeholder="Message" rows="4"></textarea>
                    </div>

                    <div class="d-flex justify-content-end buttonGroup p-0 w-100">
                        <button type="submit" class="btn theme-btn theme-bg me-2" data-url="/contact" id="contact_form_btn">
                            Submit
                        </button>
                        <button type="button" class="btn theme-btn theme-border boder-grey" data-bs-dismiss="modal"
                            aria-label="Close" id="getAQuoteForm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>
