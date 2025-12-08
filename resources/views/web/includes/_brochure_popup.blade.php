<div class="modal fade downloadBrochureForm" id="downloadBrochureForm" tabindex="-1" aria-hidden="true"
  aria-labelledby="downloadBrochureFormLabel" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="downloadBrochureFormClose">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M7.75781 16.2419L16.2438 7.75586M16.2438 16.2419L7.75781 7.75586" stroke="#4B535D" stroke-width="1.5"
            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      <div class="modal-body p-0">
        <!-- Heading wired to aria-labelledby -->

        <p class="title">Complete Form to Download</p>
        <p>Fill up the form and download brochure </p>
        <!-- Tabs -->

        <form class="d-flex flex-wrap justify-content-between">
          <div class="form-group col--6">
            <input class="input" type="text" placeholder="Name*" id="ProductEnquiryName" name="name" autocomplete="name"
              requiredaria-describedby="ProductEnquiryNameError" />
            <span id="ProductEnquiryNameError" class="error-message">Please enter your name</span>

          </div>
          <div class="form-group col--6">
            <input class="input" type="email" placeholder="Email*" id="ProductEnquiryMail" name="email"
              autocomplete="email" required aria-describedby="ProductEnquiryMailError" /> <span
              id="ProductEnquiryMailError" class="error-message">Please enter your email</span>

          </div>
          <div class="form-group col--6">
            <input class="input" type="tel" placeholder="Phone*" id="ProductEnquiryPhone" name="phone"
              autocomplete="tel" required aria-describedby="ProductEnquiryPhoneError" /> <span
              id="ProductEnquiryPhoneError" class="error-message">Please enter your phone number</span>

          </div>
          <div class="form-group col--6">
            <input class="input" type="text" placeholder="Company" id="ProductEnquiryCompany" name="company"
              autocomplete="organization" aria-describedby="ProductEnquiryCompanyError" /> <span
              id="ProductEnquiryCompanyError" class="error-message">Please enter the company name</span>
          </div>

          <div class="form-group w-100">
            <textarea class="input" id="ProductEnquiryMessage" name="message" placeholder="Message"></textarea> </div>
          <div class="d-flex justify-content-end buttonGroup p-0 w-100">
            <button type="submit" class=" btn theme-btn theme-bg">Submit</button>
            <button type="button" class=" btn theme-btn theme-border boder-grey" data-bs-dismiss="modal"
              aria-label="Close">Cancel</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
