<div class="modal fade ProductEnquiryForm" id="ProductEnquiryForm" aria-hidden="true"
  aria-labelledby="ProductEnquiryFormLabel" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="ProductEnquiryFormClose">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M7.75781 16.2419L16.2438 7.75586M16.2438 16.2419L7.75781 7.75586" stroke="#4B535D" stroke-width="1.5"
            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      <div class="modal-body p-0">
        <p class="title " id="ProductEnquiryFormLabel">
          Quick Enquiry
        </p>
        <p class="mb-4">
          Fill up the form and Our Team will get back to you within 24 Hours
        </p>

        <!-- Form -->
        <form id="ProductEnquiryFormValidation" class="d-flex flex-wrap justify-content-between" method="post" action=""
          novalidate>
          <div class="form-group col--6">
            <input class="input" type="text" placeholder="Name*" id="ProductEnquiryName" name="product_enquiry_name"
              autocomplete="name" required aria-describedby="ProductEnquiryNameError" />
            <span id="ProductEnquiryNameError" class="error-message d-none">
              Please enter your name
            </span>
          </div>

          <div class="form-group col--6">
            <input class="input" type="email" placeholder="Email*" id="ProductEnquiryMail" name="product_enquiry_email"
              autocomplete="email" required aria-describedby="ProductEnquiryMailError" />
            <span id="ProductEnquiryMailError" class="error-message d-none">
              Please enter a valid email
            </span>
          </div>

          <div class="form-group col--6">
            <input class="input" type="tel" placeholder="Phone*" id="ProductEnquiryPhone" name="product_enquiry_phone"
              autocomplete="tel" required aria-describedby="ProductEnquiryPhoneError" />
            <span id="ProductEnquiryPhoneError" class="error-message d-none">
              Please enter your phone number
            </span>
          </div>

          <div class="form-group col--6">
            <input class="input" type="text" placeholder="" id="ProductEnquiryCompany"
              name="product_enquiry_product_name_display" value="Industrial Pneumatic blower fan" readonly />
            <!-- Hidden field to actually submit product name reliably -->
            <input type="hidden" name="product_enquiry_product_name" value="Industrial Pneumatic blower fan" />
            <!-- If you ever want validation here, uncomment and adjust:
                        <span id="ProductEnquiryCompanyError" class="error-message d-none">
                            Please enter the company name
                        </span>
                        -->
          </div>

          <div class="form-group w-100">
            <textarea class="input" id="ProductEnquiryMessage" name="product_enquiry_message" placeholder="Message"
              rows="4"></textarea>
          </div>

          <div class="d-flex justify-content-end buttonGroup p-0 w-100">
            <button type="submit" class="btn theme-btn theme-bg me-2">
              Submit
            </button>
            <button type="button" class="btn theme-btn theme-border boder-grey" data-bs-dismiss="modal"
              aria-label="Close">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
