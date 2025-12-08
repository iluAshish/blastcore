/* ============================================================
 MAIN SCRIPT 
   ============================================================ */


  /* ------------------------------
     1. GSAP ANIMATIONS (Desktop only)
  ------------------------------ */


  /* ------------------------------
     2. Sticky Header
  ------------------------------ */
  const header = document.getElementById("header");
  if (header) {
    window.addEventListener("scroll", () => {
      header.classList.toggle("scrolled", window.scrollY >= 10);
    });
  }



  /* ------------------------------
     2. Star Rating
  ------------------------------ */



  /* ------------------------------
     4. Slick Sliders
  ------------------------------ */
  $(document).ready(function () {
    $(".banner-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      cssEase: "linear",
      autoplay: true,
    });


    $(".clients-slider").slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      //  cssEase: "linear", 
      // autoplaySpeed: 0, 
      speed: 1000,
      autoplay: true,
      cssEase: "linear",
      infinite: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      responsive: [{
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
    $(".history-slide-init").slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      //  cssEase: "linear", 
      // autoplaySpeed: 0, 
      speed: 1000,
      autoplay: true,
      cssEase: "linear",
      infinite: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      responsive: [{
          breakpoint: 1199,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
  });

  $(document).ready(function () {
    const basePattern = ['size-lg', 'size-md-op', 'size-lg', 'size-lg-op', 'size-md', 'size-lg-op'];
    const repeatCount = 6; // repeat pattern 6 times (adjust as needed)

    const pattern = [];
    for (let i = 0; i < repeatCount; i++) {
      pattern.push(...basePattern);
    }





    $('.image-slider-init picture').each(function (i) {
      const cls = pattern[i % pattern.length]; // repeat pattern
      $(this).addClass(cls);
    });

    $('.image-slider-init').slick({
      slidesToShow: 5,
      infinite: true,
      variableWidth: true,
      centerMode: false,
      autoplay: true,
      autoplaySpeed: 0,
      speed: 2000,
      cssEase: "linear",
      infinite: true,
      pauseOnHover: true,
      pauseOnFocus: true,
      swipeToSlide: true,

    });



    var $slider = $(".services  .services-slider");
    var $progressBar = $(".services  .progress-track ");
    var $progressBarLabel = $('.services  .progress-fill');

    $slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var calc = ((nextSlide) / (slick.slideCount - 1)) * 100;

      $progressBar
        .css('background-size', calc + '% 100%')
        .attr('aria-valuenow', calc);

      $progressBarLabel.text(calc + '% completed');
    });

    $slider.slick({
      slidesToShow: 4,
      slidesToScroll: 2,
      infinite: true,
      dots: false,
      arrows: false,
      cssEase: "linear",
      autoplay: true,
      autoplaySpeed: 2500,
      variableWidth: true,
      swipeToSlide: true,
    });

    $(".progress-next").on("click", function () {
      $slider.slick("slickNext");
    });
    $(".progress-prev").on("click", function () {
      $slider.slick("slickPrev");
    });




    // Product slider

    $(function () {
      // ---- Selectors (unique for products) ----
      var $slider = $(".products-slider");
      var $progressBar = $(".products .services-slider-progress .progress-track");
      var $progressLabel = $(".products .services-slider-progress .progress-fill");

      // ---- Initialize Slick ----
      $slider.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        // infinite: true,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2500,
        speed: 500,
        cssEase: "linear",
        swipeToSlide: true,
        responsive: [{
            breakpoint: 1199,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2
            }
          }
        ],
      });

      // ---- Progress update ----
      $slider.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        var calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $progressBar
          .css("background-size", calc + "% 100%")
          .attr("aria-valuenow", calc);

        $progressLabel.text(Math.round(calc) + "% completed");
      });

      // ---- Custom navigation ----
      $(".products-next").on("click", function () {
        $slider.slick("slickNext");
      });
      $(".products-prev").on("click", function () {
        $slider.slick("slickPrev");
      });

      // ---- Initial state ----
      $progressBar.css({
        "background-image": "linear-gradient(to right, #304B9F 100%, #ECEEF0 100%)",
        "background-size": "0% 100%",
        "background-repeat": "no-repeat",
      });
    });



  // Main testimonial content slider
  $('.testimonial-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true, // smooth crossfade for text/images
    infinite: true,
    speed: 600,
    adaptiveHeight: true,
    asNavFor: '.testimonial-nav',
    accessibility: false
  });

  // Thumbnail navigation slider
  $('.testimonial-nav').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.testimonial-slider',
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
    infinite: true, 
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 576,
        settings: {
          vertical: false,
          slidesToShow: 5,
        },
      },
    ],
  });

  // Prevent focus issues warning
  $('.testimonial-slider').on('beforeChange', function () {
    document.activeElement.blur();
  });
});

  

 



  $(document).ready(function () {
    $(".mission-vission-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      infinite: true,
      // cssEase: "linear",
      autoplay: true,
      swipeToSlide: true,
    });
  });
// Blog slider

      $(function () {
      // ---- Selectors (unique for products) ----
      var $slider = $(".blog-slider-init");
      var $progressBar = $(".blog .services-slider-progress .progress-track");
      var $progressLabel = $(".blog .services-slider-progress .progress-fill");

      // ---- Initialize Slick ----
      $slider.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        // infinite: true,
        variableWidth:true,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2500,
        speed: 500,
        cssEase: "linear",
        swipeToSlide: true,
        responsive: [{
            breakpoint: 1199,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
                      variableWidth:false,

            }
          }
        ],
      });




$(document).ready(function () {
    $(".product-detail-image").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        loop: true,
        infinit: true,
        swipeToSlide: true,
        asNavFor: ".product-detail-image-nav",
    });
    $(".product-detail-image-nav").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: $(".prev"),
        nextArrow: $(".next"),
        asNavFor: ".product-detail-image",
        arrows: true,
        dots: false,
        focusOnSelect: true,
        loop: true,
        infinit: true,
        variableWidth:true,
    });
    // $(".product-detail-image-nav").on("afterChange", function (event, slick, currentSlide) {
    //     if (currentSlide === 0) {
    //         $(".product-detail-image-nav .slick-track").css("transform", "translate3d(0, 0, 0)");
    //     }
    // });
});

      // ---- Progress update ----
      $slider.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        var calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $progressBar
          .css("background-size", calc + "% 100%")
          .attr("aria-valuenow", calc);

        $progressLabel.text(Math.round(calc) + "% completed");
      });

      // ---- Custom navigation ----
      $(".blog-list-next").on("click", function () {
        $slider.slick("slickNext");
      });
      $(".blog-list-prev").on("click", function () {
        $slider.slick("slickPrev");
      });

      // ---- Initial state ----
      $progressBar.css({
        "background-image": "linear-gradient(to right, #304B9F 100%, #ECEEF0 100%)",
        "background-size": "0% 100%",
        "background-repeat": "no-repeat",
      });
    });



    


    var $relatedSlider = $(".product-listing-slider-init");
    var $progressBarr = $(".product-listing  .progress-track ");
    var $progressBarLabell = $('.product-listing  .progress-fill');

    $relatedSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var calc = ((nextSlide) / (slick.slideCount - 1)) * 100;

      $progressBarr
        .css('background-size', calc + '% 100%')
        .attr('aria-valuenow', calc);

      $progressBarLabell.text(calc + '% completed');
    });

    $relatedSlider.slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: true,
      dots: false,
      arrows: true,
      cssEase: "linear",
      autoplay: true,
      autoplaySpeed: 2500,
      variableWidth: true,
      swipeToSlide: true,
    });

    $(".progress-nextt").on("click", function () {
      $relatedSlider.slick("slickNext");
    });
    $(".progress-prevv").on("click", function () {
      $relatedSlider.slick("slickPrev");
    });



//     $(document).ready(function () {
//     $(".product-listing-slider-init").slick({
//         slidesToShow: 4,
//         slidesToScroll: 1,
//         dots: false,
//         arrows: true,
//         cssEase: "linear",
//         autoplay: true,
//         swipeToSlide: true,
//         prevArrow: $(".product-listing-slider-prev"),
//         nextArrow: $(".product-listing-slider-next"),
//         responsive: [
//             { breakpoint: 1199, settings: { slidesToShow: 3 } },
//             { breakpoint: 767, settings: { variableWidth: false, slidesToShow: 2 } },
//         ],
//     });
// });


  /* ------------------------------
     5. Accordion 
  // ------------------------------ */
  // document.querySelectorAll(".accordion-toggle").forEach(btn => {
  //   btn.addEventListener("click", () => {
  //     const parent = btn.parentElement;
  //     document.querySelectorAll(".accordion-item").forEach(i => i !== parent && i.classList.remove("active"));
  //     parent.classList.toggle("active");
  //   });
  // });

document.addEventListener("DOMContentLoaded", function () {

  const buttons = document.querySelectorAll(".about-section-accordion-button");
  const panels = document.querySelectorAll(".panel");

  // STOP if no accordion exists (prevents ANY error)
  if (!buttons || buttons.length === 0 || !panels || panels.length === 0) {
    return;
  }

  // Open the first panel
  panels[0].classList.add("open");
  buttons[0].classList.add("active");

  buttons.forEach(function (button, index) {
    button.addEventListener("click", function () {
      this.classList.toggle("active");

      const panel = this.nextElementSibling;

      if (panel.classList.contains("open")) {
        panel.classList.remove("open");
      } else {
        panel.classList.add("open");
      }

      panels.forEach((otherPanel, otherIndex) => {
        if (otherIndex !== index) {
          otherPanel.classList.remove("open");
          buttons[otherIndex].classList.remove("active");
        }
      });
    });
  });

}); // ← MAKE SURE THIS IS NOT ACCIDENTALLY CLOSED EARLY



document.addEventListener("DOMContentLoaded", function() {
  const filterbuttons = document.querySelectorAll(".product-listing-accordion-button");
  const filterpanels = document.querySelectorAll(".product-listinging .panel, .product-listing-accordion .panel");

  // Open the first panel by default
  if (filterpanels[0] && filterbuttons[0]) {
    filterpanels[0].classList.add("open");
    filterbuttons[0].classList.add("active");
  }

  filterbuttons.forEach(function(button, index) {
    button.addEventListener("click", function() {

      // Toggle clicked button
      this.classList.toggle("active");

      const currentPanel = this.nextElementSibling;

      // Toggle clicked panel
      currentPanel.classList.toggle("open");

      // Close all other panels
      filterpanels.forEach((panel, i) => {
        if (i !== index) {
          panel.classList.remove("open");
          filterbuttons[i].classList.remove("active");
        }
      });
    });
  });
});




 
  /* ------------------------------
     9. Equal Height Utility
  ------------------------------ */
  const setEqualHeightFor = (selector) => {
    const items = document.querySelectorAll(selector);
    if (!items.length) return;
    let max = 0;
    items.forEach(el => {
      el.style.height = "auto";
      if (el.offsetHeight > max) max = el.offsetHeight;
    });
    items.forEach(el => el.style.height = max + "px");
  };
  window.addEventListener("load", () => setTimeout(() => setEqualHeightFor(".services-card"), 300));
  window.addEventListener("load", () => setTimeout(() => setEqualHeightFor(".products-slider-card"), 300));
  window.addEventListener("load", () => setTimeout(()=> setEqualHeightFor(".product-listing .product-card"),300));
  window.addEventListener("resize", () => setEqualHeightFor(".service-card"));
  window.addEventListener("resize", () => setEqualHeightFor(".products-slider-card"));
  window.addEventListener("resize", () => setEqualHeightFor(".product-listing .product-card"));

  /* ------------------------------
     10. Lazy Loading for Images
  ------------------------------ */
  const lazyImages = document.querySelectorAll("img[data-src][loading='lazy']");
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        if (img.dataset.alt) img.alt = img.dataset.alt;
        img.removeAttribute("data-src");
        img.removeAttribute("loading");
        obs.unobserve(img);
      }
    });
  });
  lazyImages.forEach(img => observer.observe(img));




  /* ------------------------------
     8. Filter Popup
  ------------------------------ */
  const filterToggle = document.getElementById("filterToggle");
  const filterCard = document.querySelector(".filter-card");
  const filterOverlay = document.getElementById("filterOverlay");
  const closeFilter = document.getElementById("closeFilter");

  if (filterToggle && filterCard && filterOverlay && closeFilter) {
    const toggleFilter = (show) => {
      filterCard.classList.toggle("active", show);
      filterOverlay.classList.toggle("active", show);
    };
    filterToggle.addEventListener("click", () => toggleFilter(true));
    closeFilter.addEventListener("click", () => toggleFilter(false));
    filterOverlay.addEventListener("click", () => toggleFilter(false));
  }




  document.addEventListener('DOMContentLoaded', () => {
  function markArticlePictures() {
    document.querySelectorAll('.service-detail-content').forEach(el => {
      const pics = el.querySelectorAll('.service-detail-content picture');
      // remove old state classes
      el.classList.remove('one-picture', 'zero-picture', 'multi-picture');
      // add correct state
      if (pics.length === 0) el.classList.add('zero-picture');
      else if (pics.length === 1) el.classList.add('one-picture');
      else el.classList.add('multi-picture');
    });
  }

  // initial pass
  markArticlePictures();

  // optional: watch for DOM changes inside .article-picture (useful if content is injected)
  const observer = new MutationObserver(mutations => {
    // you could be more selective, but this is simple and reliable
    markArticlePictures();
  });

  document.querySelectorAll('.article-picture').forEach(el => {
    observer.observe(el, { childList: true, subtree: true });
  });
});



  /* ------------------------------
     2. Star Rating
  ------------------------------ */

  $(document).ready(function () {
    $(" .my-rating-readonly").starRating({
      starSize: 18,
      initialRating: 5,
      useFullStars: true,
      readOnly: true,
    });
  });