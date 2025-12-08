$('.banner_slider').slick({
    pauseOnHover: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    focusOnSelect: true,
    appendDots: $('.slider-dots-box'),
    dotsClass: 'slider-dots',
});

$('.banner_slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    $('.slider-dots-box button').html('');
}).trigger('beforeChange');

$('.banner_slider').on('afterChange', function (event, slick, currentSlide) {
    $('.slider-dots-box button').html('');
    $('.slider-dots-box .slick-active button')
        .html(`<svg class="progress-svg" width="40" height="40">
        <g transform="translate(20,20)">
          <circle class="circle-go" r="19" cx="0" cy="0"></circle>
        </g>
        </svg>`);
}).trigger('afterChange');


$(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});

$(document).on('click', '.navbar-collapse.in', function (e) {
    if ($(e.target).is('a') && $(e.target).attr('class') !== 'dropdown-toggle') {
        $(this).collapse('hide');
    }
});



$(document).ready(function () {
    $('.enquiryServices_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        speed: 300,
        centerMode: true,
        centerPadding: '20px',
        infinite: true,
        autoplaySpeed: 3000,
        autoplay: true,
        responsive: [
            {
                breakpoint: 960,
                settings: {slidesToShow: 3, slidesToScroll: 1,}
            },
            {
                breakpoint: 765,
                settings: {slidesToShow: 1,}
            },
        ]
    });
});



$('.slider-for').slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.slider-nav',
});
$('.slider-nav').slick({
    slidesToShow: 4, slidesToScroll: 1, asNavFor: '.slider-for', dots: false, focusOnSelect: true, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});



$('.what_we_do_slider').slick({
    infinite: true, slidesToShow: 4, slidesToScroll: 1, autoplay: true,
    responsive: [
        {
            breakpoint: 1025,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 960,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.our_clients_slider').slick({
    infinite: true, slidesToShow: 3, slidesToScroll: 1, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.latestNews_slider').slick({
    infinite: true, slidesToShow: 3, slidesToScroll: 1, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.counting').each(function () {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({countNum: $this.text()}).animate({
            countNum: countTo
        },
        {
            duration: 5000,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
            }
        });
});

$('.productSlider').slick({
    infinite: true, slidesToShow: 2, slidesToScroll: 1, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$(".circle_percent").each(function () {
    var $this = $(this),
        $dataV = $this.data("percent"),
        $dataDeg = $dataV * 3.6,
        $round = $this.find(".round_per");
    $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
    $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
    $this.prop('Counter', 0).animate({Counter: $dataV},
        {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $this.find(".percent_text").text(Math.ceil(now) + "%");
            }
        });
    if ($dataV >= 51) {
        $round.css("transform", "rotate(" + 360 + "deg)");
        setTimeout(function () {
            $this.addClass("percent_more");
        }, 1000);
        setTimeout(function () {
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
        }, 1000);
    }
});



function inVisible(element) {
    //Checking if the element is
    //visible in the viewport
    var WindowTop = $(window).scrollTop();
    var WindowBottom = WindowTop + $(window).height();
    var ElementTop = element.offset().top;
    var ElementBottom = ElementTop + element.height();
    //animating the element if it is
    //visible in the viewport
    if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
        animate(element);
}

function animate(element) {
    //Animating the element if not animated before
    if (!element.hasClass('ms-animated')) {
        var maxval = element.data('max');
        var html = element.html();
        element.addClass("ms-animated");
        $({
            countNum: element.html()
        }).animate({
            countNum: maxval
        }, {
            //duration 5 seconds
            duration: 5000,
            easing: 'linear',
            step: function () {
                element.html(Math.floor(this.countNum) + html);
            },
            complete: function () {
                element.html(this.countNum + html);
            }
        });
    }

}

//When the document is ready
$(function () {
    //This is triggered when the
    //user scrolls the page
    $(window).scroll(function () {
        //Checking if each items to animate are
        //visible in the viewport
        $("h3[data-max]").each(function () {
            inVisible($(this));
        });
        $("h2[data-max]").each(function () {
            inVisible($(this));
        });
    })
});


$('.featuredproductSlider').slick({
    infinite: true, slidesToShow: 3, slidesToScroll: 1, dots: true, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});

$('.relatedproductSlider').slick({
    infinite: true, slidesToShow: 4, slidesToScroll: 1, autoplay: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 960,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.productlatestSlider').slick({
    infinite: true, slidesToShow: 1, slidesToScroll: 1, dots: true, autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});

$('.productsSectionslider').slick({
    infinite: true, slidesToShow: 3, slidesToScroll: 1, centerMode: true, centerPadding: '-5px', autoplay: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.slider-for-product').slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.slider-nav-product',
});

$('.slider-nav-product').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for-product',
    dots: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: '20px',
    autoplay: true,

    responsive: [
        {
            breakpoint: 960,
            settings: {slidesToShow: 5, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 3,}
        },
    ]
});

$('.blogpaginationSlider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    // focusOnSelect: true,
    centerMode: true,
    centerPadding: '10px',
    responsive: [
        {
            breakpoint: 1025,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 960,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 765,
            settings: {slidesToShow: 3,}
        },
    ]
});

$('[data-fancybox]').fancybox({
    // Options will go here
    buttons: [
        'close'
    ],
    wheel: false,
    transitionEffect: "slide",
    // thumbs          : false,
    // hash            : false,
    loop: true,
    // keyboard        : true,
    toolbar: false,
    // animationEffect : false,
    // arrows          : true,
    clickContent: false
});

$('body').click(function () {
    $('.results').hide();
});
$('.results').click(function (event) {
    event.stopPropagation();
});
