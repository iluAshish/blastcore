$(document).ready(function () {

    if ($('#newsletter_subscription').length) {
        $(document).on('click', '#newsletter_subscription', function (e) {
            e.preventDefault();
            var _token = token;
            var email = $('#newsletter_email').val();
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                swal({
                    title: 'Error',
                    text: 'Please enter a valid email address.',
                    type: 'error'
                });
                $('#newsletter_email').removeClass('is-valid').addClass('is-invalid');
            } else {
                $.ajax({
                    type: 'POST',
                    url: base_url + '/newsletter/',
                    dataType: 'json',
                    data: {email: email, _token: _token},
                    success: function (response) {
                        if (response.status === "success") {
                            swal({
                                title: "Done it!",
                                text: response.message,
                                type: response.status
                            }, function () {
                                $('#newsletter_email').val('').removeClass('is-invalid').addClass('is-valid');
                            });
                        } else {
                            $('#newsletter_email').removeClass('is-valid').addClass('is-invalid');
                            swal({
                                title: response.status,
                                text: response.message,
                                type: response.status
                            });
                        }
                    }
                });
            }
        });
    }

    $(document).on('click', '#productEnquiryModalButton', function (e) {
        e.preventDefault();
        $('#productEnquiryModalForm input, textarea').removeClass('is-invalid is-valid');
        $('#productEnquiryModalForm span.error').remove();
        $('#productId').val($(this).data('product_id'));
    });


    $(document).on('click', '#contact_form_btn', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var form = $(this).closest("form").attr('id');
        var errors = false;

        $('form input, form textarea').removeClass('is-invalid is-valid');
        $('span.error').remove();
        $("#" + form + " .required").each(function (k, v) {
            errors = false;
            var field_name = $(v).attr('name');
            if (!$(v).val().length) {
                errors = true;
                var error = 'Please enter <strong>' + field_name + '</strong>.';
                var msg = '<span class="error invalid-feedback" for="' + field_name + '">' + error + '</span>';
                $('#' + form).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                    .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
            } else {
                if (field_name === 'email') {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(v).val())) {
                        errors = true;
                        msg = '<span class="error invalid-feedback" for="email">Please enter a valid email address</span>';
                        $('#' + form).find('input[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
            }
        });
        if (!errors) {
            $('#contact_form_btn').html('Please wait..!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('#' + form).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + url,
                success: function (response) {
                    $('#contact_form_btn').html('Contact Now');
                    if (response.status === "success") {
                        swal({
                            title: "Done it!",
                            text: response.message,
                            type: response.status
                        }, function () {
                            $("#" + form)[0].reset();
                        });
                    } else {
                        swal({
                            title: response.status,
                            text: response.message,
                            type: response.status
                        });
                    }
                },
                fail: function () {
                    $('#contact_form_btn').html('Contact Now');
                }
            });
        }
    });

    $(document).on('click', '#view_more_footer_service', function () {
        var limit = $('#service_limit').val();
        var offset = $('#service_offset').val();
        var btnHtml = $('#view_more_footer_service').html();
        $('#view_more_footer_service').html('Please wait..!');
        $.ajax({
            type: 'POST',
            data: {limit: limit, offset: offset},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/loadMoreFooterService',
            success: function (response) {
                $('#view_more_footer_service').html(btnHtml);
                if (response !== 0) {
                    $('.appendServiceHere' + offset).after(response);
                    var nextOffset = parseInt(offset) + parseInt(limit);
                    $('#service_offset').val(nextOffset);
                    if ($('#serviceCount').val() <= nextOffset) {
                        $('#view_more_footer_service').remove();
                    }
                } else {
                    swal({
                        title: 'Error',
                        text: 'Some error occurred',
                        type: 'error'
                    });
                }
            }
        });
    });

    $(document).on('click', '#view_more_blogs', function () {
        var limit = $('#loading_limit').val();
        var offset = $('#loading_offset').val();
        var btnHtml = $('#view_more_blogs').html();
        $('#view_more_blogs').html('Please wait..!');
        $.ajax({
            type: 'POST',
            data: {limit: limit, offset: offset},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/loadMoreBlogs',
            success: function (response) {
                $('#view_more_blogs').html(btnHtml);
                if (response !== 0) {
                    $('.appendHere' + offset).after(response);
                    var nextOffset = parseInt(offset) + parseInt(limit);
                    $('#loading_offset').val(nextOffset);
                    if ($('#totalCount').val() <= nextOffset) {
                        $('#view_more_blogs').remove();
                    }
                } else {
                    swal({
                        title: 'Error',
                        text: 'Some error occurred',
                        type: 'error'
                    });
                }
            }
        });
    });

    $(document).on('click', '#view_more_products', function () {
        var limit = $('#loading_limit').val();
        var offset = $('#loading_offset').val();
        var btnHtml = $('#view_more_products').html();
        $('#view_more_products').html('Please wait..!');
        $.ajax({
            type: 'POST',
            data: $('#filter-form').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/loadMoreProducts',
            success: function (response) {

                $('#view_more_products').html(btnHtml);
                if (response != 0) {
                    $('.appendHere' + offset).after(response);
                    var nextOffset = parseInt(offset) + parseInt(limit);
                    $('#loading_offset').val(nextOffset);
                    if ($('#totalCount').val() <= nextOffset) {
                        $('#view_more_products').remove();
                    }
                } else {
                    swal({
                        title: 'Error',
                        text: 'Some error occurred',
                        type: 'error'
                    });
                }
            }
        });
    });

    $(document).on('keyup', '#productSearch', function () {
        var search_term = $(this).val();
        var form = $(this).closest("form").attr('id');
        var _token = token;
        if (search_term) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {search_term: search_term, _token: _token},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + '/product-search',
                success: function (response) {
                    if (response.status === 'success') {
                        var result = '';
                        $.each(response.products, function (key, value) {
                            result += '<li><a href="' + base_url + '/shop/product/' + value.short_url + '">'
                                + '<div class="row"> <div class="col-md-3 col-3">'
                                + '<img src="' + base_url + '/uploads/product/image/' + value.id + '/'
                                + value.active_first_image.image + '"'
                                + ' alt="' + value.active_first_image.image_meta_tag + '"></div>'
                                + '<div class="col-md-9 col-9 contentRight">'
                                + '<p>Brand : <span>' + value.brand.title + '</span></p>'
                                + '<h6>' + value.title + '</h6></div>'
                                + "</div></a></li>";
                        });
                        $('#' + form + ' #searchResults').html(result);
                        $('#' + form + ' .results').show();
                    } else {
                        $('#' + form + ' #searchResults').html("<li>No products found.</li>");
                        $('#' + form + ' .results').show();
                    }
                }
            });
        } else {
            $('#' + form + ' .results').hide();
        }
    });

    $('.filterItem').on('change', function () {
        var label = $(this).data('label');
        var title = $(this).data('title');
        var id = $(this).val();
        //todo: showing filtering items
        filterProducts();
    });

    function filterProducts() {
        var fields = [];
        var values = [];
        $('.filterItem').each(function () {
            if ($(this).prop('checked') == true) {
                fields.push($(this).data('field'));
            }
        });
        $('#input_field').val($.unique(fields.sort()));
        $.ajax({
            type: 'POST',
            dataType: 'html',
            data: $('#filter-form').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/filter-product',
            success: function (response) {
                $('.productsListRight').html(response);
            }
        });
    }

    $(document).on('click', '.customClick', function () {
        var href = $(this).attr('href');
        window.location.href = href;
    });

    /*maintenance banner*/
    $(".main-banner").slick({
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 961,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    /*service boxes*/
    $(".services-banner").slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 581,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    /*testimonial boxes*/
    $(".testimonial-slider").slick({
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 920,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /*other services*/
    $(".other-services").slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 581,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /*our projects slider*/
    $(".projects-slider").slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 581,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    /*our blog slider*/
    $(".blog-slider").slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1176,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    dots: true
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 581,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });


    /*portfolio slider*/
    if ($(".portfolio-slider").length > 0) {
        $(".portfolio-slider").slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            speed: 1000,
            rows: 2,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1026,
                    settings: {
                        rows: 1,
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 581,
                    settings: {
                        rows: 1,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $('.portfolio-slider').slickLightbox({
            src: 'src',
            itemSelector: '.portfolio-slider-popup img',
            background: 'rgba(0, 0, 0, .7)'
        });
    }
});

