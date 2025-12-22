
document.addEventListener('DOMContentLoaded', function () {
    // Only run animations on screens wider than 1200px
    if (!window.matchMedia('(min-width: 1200px)').matches) return;

    gsap.registerPlugin(ScrollTrigger);

    const easeOut = "power3.out";

    /* =========================
       HERO / BANNER
    ==========================*/
    const heroTl = gsap.timeline({
        defaults: { duration: 1, ease: easeOut }
    });

    heroTl
        .from(".banner .image-banner", {
            autoAlpha: 0,
            y: 50
        })
        .from(".google-review", {
            autoAlpha: 0,
            x: -40
        }, "-=0.6")
        .from(".social-links li", {
            autoAlpha: 0,
            y: 20,
            stagger: 0.1
        }, "-=0.4");

    /* =========================
       CLIENT LOGOS
    ==========================*/
    gsap.from(".clients .clients-slider ", {
        autoAlpha: 0,
        y: 30,
        stagger: 0.08,
        duration: 0.8,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".clients",
            start: "top 80%",
            once: true
        }
    });

    /* =========================
       IMAGE SLIDER
    ==========================*/
    gsap.from(".image-slider .image-slider-init ", {
        autoAlpha: 0,
        y: 40,
        stagger: 0.07,
        duration: 0.8,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".image-slider",
            start: "top 80%",
            once: true
        }
    });

    /* =========================
       SERVICES
    ==========================*/
    gsap.from(".services .head", {
        autoAlpha: 0,
        y: 40,
        duration: 0.9,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".services",
            start: "top 85%",
            once: true
        }
    });

    gsap.from(".services .services-slider", {
        autoAlpha: 0,
        y: 50,
        stagger: 0.1,
        duration: 0.8,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".services .services-slider",
            start: "top 80%",
            once: true
        }
    });

    /* =========================
       ABOUT
    ==========================*/
    const aboutTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".about",
            start: "top 80%",
            once: true
        },
        defaults: { duration: 0.9, ease: easeOut }
    });

    aboutTl
        .from(".about .about-col picture", {
            autoAlpha: 0,
            x: -60
        })
        .from(".about .about-content", {
            autoAlpha: 0,
            x: 60
        }, "-=0.6")
        .from(".about > .container-ctn > div > picture", {
            autoAlpha: 0,
            y: 50
        }, "-=0.4");

    /* =========================
       MISSION & VISION
    ==========================*/
    gsap.from(".mission-vission .mission-vission-slider ", {
        autoAlpha: 0,
        y: 40,
        duration: 0.9,
        stagger: 0.2,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".mission-vission",
            start: "top 80%",
            once: true
        }
    });

    gsap.from(".mission-vission img", {
        autoAlpha: 0,
        scale: 0.8,
        duration: 0.8,
        ease: easeOut,
        scrollTrigger: {
            trigger: ".mission-vission",
            start: "top 80%",
            once: true
        }
    });

    /* =========================
       HIGHLIGHTS
    ==========================*/
    const highlightsTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".highlights",
            start: "top 80%",
            once: true
        },
        defaults: { ease: easeOut, duration: 0.9 }
    });

    highlightsTl
        .from(".highlights-first-image .highlights-card", {
            autoAlpha: 0,
            y: 60
        })
        .from(".highlights-row .highlights-card", {
            autoAlpha: 0,
            y: 40,
            stagger: 0.12
        }, "-=0.5");

    /* =========================
       PRODUCTS
    ==========================*/
    const productsTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".products",
            start: "top 80%",
            once: true
        },
        defaults: { ease: easeOut, duration: 0.9 }
    });

    productsTl
        .from(".products .products-intro .head", {
            autoAlpha: 0,
            y: 40
        })
        .from(".products .products-content", {
            autoAlpha: 0,
            y: 30
        }, "-=0.5")
        .from(".products .button-wrapper", {
            autoAlpha: 0,
            y: 20
        }, "-=0.4")
        .from(".products .products-slider", {
            autoAlpha: 0,
            y: 50,
            stagger: 0.1
        }, "-=0.2");

    /* =========================
       WHY CHOOSE US
    ==========================*/
    const whyTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".why-choose",
            start: "top 80%",
            once: true
        },
        defaults: { ease: easeOut, duration: 0.9 }
    });

    whyTl
        .from(".why-choose picture", {
            autoAlpha: 0,
            x: -60
        })
        .from(".why-choose .why-choose-col h2", {
            autoAlpha: 0,
            y: 30
        }, "-=0.6")
        .from(".why-choose .why-choose-box", {
            autoAlpha: 0,
            y: 30,
            stagger: 0.1
        }, "-=0.4")
        .from(".why-choose .video-container", {
            autoAlpha: 0,
            scale: 0.9
        }, "-=0.4");

    /* =========================
       TESTIMONIALS
    ==========================*/
    const testiTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".testimonial",
            start: "top 80%",
            once: true
        },
        defaults: { ease: easeOut, duration: 0.9 }
    });

    testiTl
        .from(".testimonial .testimonial-nav-wrapper ", {
            autoAlpha: 0,
            x: -60
        })
        .from(".testimonial .testimonial-nav", {
            autoAlpha: 0,
            scale: 0.8,
            stagger: 0.08
        }, "-=0.5")
        .from(".testimonial .head", {
            autoAlpha: 0,
            y: 30
        }, "-=0.5")
        .from(".testimonial .testimonial-slider", {
            autoAlpha: 0,
            y: 30,
            stagger: 0.15
        }, "-=0.4");

    /* =========================
       BLOG SECTION
    ==========================*/
    const blogTl = gsap.timeline({
        scrollTrigger: {
            trigger: ".blog",
            start: "top 80%",
            once: true
        },
        defaults: { ease: easeOut, duration: 0.9 }
    });

    blogTl
        .from(".blog .head", {
            autoAlpha: 0,
            y: 40
        })
        

});




/* ============================================================
   MAIN SCRIPT
============================================================ */

document.addEventListener("DOMContentLoaded", () => {
  /* ------------------------------
     1. Sticky Header
  ------------------------------ */
  const header = document.getElementById("header");
  if (header) {
    window.addEventListener("scroll", () => {
      header.classList.toggle("scrolled", window.scrollY >= 10);
    });
  }

  /* ============================================================
     2. Slick Sliders
  ============================================================ */

  // Helper: generic progress slider initializer
  const initProgressSlider = ({
    sliderSelector,
    trackSelector,
    labelSelector,
    options,
    nextSelector,
    prevSelector,
  }) => {
    const $slider = $(sliderSelector);
    const $track = $(trackSelector);
    const $label = $(labelSelector);

    if (!$slider.length || !$track.length || !$label.length) return;

    // Init slick
    $slider.slick(options);

    // Update progress bar on slide change
    $slider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
      const calc = (nextSlide / (slick.slideCount - 1)) * 100;

      $track
        .css("background-size", `${calc}% 100%`)
        .attr("aria-valuenow", calc);

      $label.text(`${Math.round(calc)}% completed`);
    });

    // Custom navigation
    if (nextSelector) {
      $(nextSelector).on("click", () => $slider.slick("slickNext"));
    }
    if (prevSelector) {
      $(prevSelector).on("click", () => $slider.slick("slickPrev"));
    }

    // Initial track state
    $track.css({
      "background-image": "linear-gradient(to right, #304B9F 100%, #ECEEF0 100%)",
      "background-size": "0% 100%",
      "background-repeat": "no-repeat",
    });
  };

  /* --- Banner Slider --- */
  $(".banner-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    cssEase: "linear",
    autoplay: true,
  });

  /* --- Clients Slider --- */
  $(".clients-slider").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    speed: 1000,
    autoplay: true,
    cssEase: "linear",
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [
      {
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

  /* --- History Slider --- */
  $(".history-slide-init").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    speed: 1000,
    autoplay: true,
    cssEase: "linear",
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [
      {
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

  /* --- Image Slider with pattern classes --- */
  (() => {
    const basePattern = [
      "size-lg",
      "size-md-op",
      "size-lg",
      "size-lg-op",
      "size-md",
      "size-lg-op",
    ];
    const repeatCount = 6;
    const pattern = [];

    for (let i = 0; i < repeatCount; i++) {
      pattern.push(...basePattern);
    }

    $(".image-slider-init picture").each(function (i) {
      const cls = pattern[i % pattern.length];
      $(this).addClass(cls);
    });

    $(".image-slider-init").slick({
      slidesToShow: 5,
      infinite: true,
      variableWidth: true,
      centerMode: false,
      autoplay: true,
      autoplaySpeed: 1,      // <- no delay between moves
      speed: 5000,           // <- higher = slower, smoother scroll
      cssEase: "linear",     // <- required for continuous effect
      pauseOnHover: true,
      pauseOnFocus: true,
      // swipeToSlide: true,
    });
  })();

  /* --- Services Slider with Progress --- */
  (() => {
    const $slider = $(".services .services-slider");
    const $track = $(".services .progress-track");
    const $label = $(".services .progress-fill");

    if ($slider.length) {
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

      $slider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
        const calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $track
          .css("background-size", `${calc}% 100%`)
          .attr("aria-valuenow", calc);

        $label.text(`${Math.round(calc)}% completed`);
      });

      $(".progress-next").on("click", () => $slider.slick("slickNext"));
      $(".progress-prev").on("click", () => $slider.slick("slickPrev"));

      $track.css({
        "background-image": "linear-gradient(to right, #304B9F 100%, #ECEEF0 100%)",
        "background-size": "0% 100%",
        "background-repeat": "no-repeat",
      });
    }
  })();

  /* --- Products Slider with Progress --- */
  initProgressSlider({
    sliderSelector: ".products-slider",
    trackSelector: ".products .services-slider-progress .progress-track",
    labelSelector: ".products .services-slider-progress .progress-fill",
    nextSelector: ".products-next",
    prevSelector: ".products-prev",
    options: {
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2500,
      speed: 500,
      cssEase: "linear",
      swipeToSlide: true,
      responsive: [
        {
          breakpoint: 1199,
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
    },
  });

  /* --- Testimonial Sliders (main + nav) --- */
  $(".testimonial-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    infinite: true,
    speed: 600,
    adaptiveHeight: true,
    asNavFor: ".testimonial-nav",
    accessibility: false,
  });

  $(".testimonial-nav").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: ".testimonial-slider",
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

  $(".testimonial-slider").on("beforeChange", () => {
    document.activeElement.blur();
  });

  /* --- Mission / Vision Slider --- */
  $(".mission-vission-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
     cssEase: "linear",
    autoplay: true,
  });

  /* --- Blog Slider with Progress --- */
  initProgressSlider({
    sliderSelector: ".blog-slider-init",
    trackSelector: ".blog .services-slider-progress .progress-track",
    labelSelector: ".blog .services-slider-progress .progress-fill",
    nextSelector: ".blog-list-next",
    prevSelector: ".blog-list-prev",
    options: {
      slidesToShow: 3,
      slidesToScroll: 1,
      variableWidth: true,
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2500,
      speed: 500,
      cssEase: "linear",
      swipeToSlide: true,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            variableWidth: false,
          },
        },
      ],
    },
  });

  /* --- Product Detail Slider (main + nav) --- */
  $(".product-detail-image").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    infinite: true,
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
    infinite: true,
    variableWidth: true,
  });

  /* --- Product Listing Slider with Progress --- */
  (() => {
    const $slider = $(".product-listing-slider-init");
    const $track = $(".product-listing .progress-track");
    const $label = $(".product-listing .progress-fill");

    if ($slider.length) {
      $slider.slick({
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

      $slider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
        const calc = (nextSlide / (slick.slideCount - 1)) * 100;

        $track
          .css("background-size", `${calc}% 100%`)
          .attr("aria-valuenow", calc);

        $label.text(`${Math.round(calc)}% completed`);
      });

      $(".progress-nextt").on("click", () => $slider.slick("slickNext"));
      $(".progress-prevv").on("click", () => $slider.slick("slickPrev"));

      $track.css({
        "background-image": "linear-gradient(to right, #304B9F 100%, #ECEEF0 100%)",
        "background-size": "0% 100%",
        "background-repeat": "no-repeat",
      });
    }
  })();

  /* ============================================================
     3. Accordions
  ============================================================ */

  // About section accordion
  (() => {
    const buttons = document.querySelectorAll(
      ".about-section-accordion-button"
    );
    const panels = document.querySelectorAll(".panel");

    if (!buttons.length || !panels.length) return;

    // Open the first panel
    panels[0].classList.add("open");
    buttons[0].classList.add("active");

    buttons.forEach((button, index) => {
      button.addEventListener("click", () => {
        const panel = button.nextElementSibling;

        // Toggle clicked
        button.classList.toggle("active");
        panel.classList.toggle("open");

        // Close others
        panels.forEach((otherPanel, otherIndex) => {
          if (otherIndex !== index) {
            otherPanel.classList.remove("open");
            buttons[otherIndex].classList.remove("active");
          }
        });
      });
    });
  })();

  // Product listing accordion
  (() => {
    const buttons = document.querySelectorAll(
      ".product-listing-accordion-button"
    );
    const panels = document.querySelectorAll(
      ".product-listinging .panel, .product-listing-accordion .panel"
    );

    if (!buttons.length || !panels.length) return;

    // Open first by default
    if (panels[0] && buttons[0]) {
      panels[0].classList.add("open");
      buttons[0].classList.add("active");
    }

    buttons.forEach((button, index) => {
      button.addEventListener("click", () => {
        const currentPanel = button.nextElementSibling;

        button.classList.toggle("active");
        currentPanel.classList.toggle("open");

        panels.forEach((panel, i) => {
          if (i !== index) {
            panel.classList.remove("open");
            buttons[i].classList.remove("active");
          }
        });
      });
    });
  })();

  /* ============================================================
     4. Equal Height Utility
  ============================================================ */

  const setEqualHeightFor = (selector) => {
    const items = document.querySelectorAll(selector);
    if (!items.length) return;

    let max = 0;
    items.forEach((el) => {
      el.style.height = "auto";
      if (el.offsetHeight > max) max = el.offsetHeight;
    });
    items.forEach((el) => {
      el.style.height = `${max}px`;
    });
  };

  const equalHeightTargets = [
    ".services-card, .service-card",
    ".products-slider-card",
    // ".product-listing .product-card",
  ];

  window.addEventListener("load", () => {
    setTimeout(() => {
      equalHeightTargets.forEach(setEqualHeightFor);
    }, 300);
  });

  window.addEventListener("resize", () => {
    equalHeightTargets.forEach(setEqualHeightFor);
  });

  /* ============================================================
     5. Lazy Loading for Images
  ============================================================ */

  const lazyImages = document.querySelectorAll("img[data-src][loading='lazy']");
  if (lazyImages.length) {
    const lazyObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const img = entry.target;
        img.src = img.dataset.src;
        if (img.dataset.alt) img.alt = img.dataset.alt;
        img.removeAttribute("data-src");
        img.removeAttribute("loading");
        obs.unobserve(img);
      });
    });

    lazyImages.forEach((img) => lazyObserver.observe(img));
  }

  /* ============================================================
     6. Filter Popup
  ============================================================ */

  (() => {
    const filterToggle = document.getElementById("filterToggle");
    const filterCard = document.querySelector(".filter-card");
    const filterOverlay = document.getElementById("filterOverlay");
    const closeFilter = document.getElementById("closeFilter");

    if (!filterToggle || !filterCard || !filterOverlay || !closeFilter) return;

    const toggleFilter = (show) => {
      filterCard.classList.toggle("active", show);
      filterOverlay.classList.toggle("active", show);
    };

    filterToggle.addEventListener("click", () => toggleFilter(true));
    closeFilter.addEventListener("click", () => toggleFilter(false));
    filterOverlay.addEventListener("click", () => toggleFilter(false));
  })();

  /* ============================================================
     7. Service Detail Picture State Marker
  ============================================================ */

  (() => {
    const markArticlePictures = () => {
      document.querySelectorAll(".service-detail-content").forEach((el) => {
        const pics = el.querySelectorAll(".service-detail-content picture");
        el.classList.remove("one-picture", "zero-picture", "multi-picture");

        if (pics.length === 0) el.classList.add("zero-picture");
        else if (pics.length === 1) el.classList.add("one-picture");
        else el.classList.add("multi-picture");
      });
    };

    // initial pass
    markArticlePictures();

    // watch for DOM changes inside .article-picture
    const observer = new MutationObserver(() => {
      markArticlePictures();
    });

    document.querySelectorAll(".article-picture").forEach((el) => {
      observer.observe(el, { childList: true, subtree: true });
    });
  })();
});


  /* ------------------------------
     8. Star Rating
  ------------------------------ */

  $(document).ready(function () {
    $(" .my-rating-readonly").starRating({
      starSize: 18,
      initialRating: 5,
      useFullStars: true,
      readOnly: true,
    });
  });

  
  /* ------------------------------
     9. Banner Option 2
  ------------------------------ */
$('.banner-slick').on('init', function (event, slick) {
    // add class to first slide on load
    $('.slick-slide.slick-current').addClass('is-active');
});

$('.banner-slick').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    $('.slick-slide').removeClass('is-active');
    $('.slick-slide[data-slick-index="' + nextSlide + '"]').addClass('is-active');
});

$('.banner-slick').slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    speed: 800,
    cssEase: 'ease-in-out',
    prevArrow: '<button class="slick-prev">‹</button>',
    nextArrow: '<button class="slick-next">›</button>'
});
