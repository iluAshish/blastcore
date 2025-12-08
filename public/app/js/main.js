/*

Project     : DAdmin - Responsive Bootstrap HTML Admin Dashboard
Version     : 1.1
Author      : ThemeLooks
Author URI  : https://themeforest.net/user/themelooks

*/

(function ($) {
    "use strict";

    /* ----------------------- COMMON VARIABLES ------------------------------- */

    var $wn = $(window),
        $document = $(document),
        $body = $('body');

    $(function () {

        if ($('#tabs').length) {
            var segments = $(location).attr('href').split('/');
            var id = segments[6];
            $("#tabs").tabs({active: id});
        }
        /* ------------------------ BACKGROUND IMAGE ------------------------------ */

        var $bgImg = $('[data-bg-img]');

        $bgImg.css('background-image', function () {
            return 'url("' + $(this).data('bg-img') + '")';
        }).addClass('bg--img').removeAttr('data-bg-img');

        $(document).ready(function () {

            $("a.fancy").fancybox({
                'zoomSpeedIn': 300,
                'zoomSpeedOut': 300,
                'overlayShow': false
            });

            $(".fancypdf").fancybox({
                width: 600,
                height: 1000,
                type: 'iframe'
            });

            $('.select2').select2({
                theme: "bootstrap4",
                dropdownAutoWidth: true,
                width: "auto",
            });
            $('.multiselect').select2({
                placeholder: "Select Options",
                allowClear: true,
                theme: "bootstrap4",
                dropdownAutoWidth: true,
                width: "auto",
            });
        });

        /* ------------------------------ SCROLLBAR --------------------------------- */

        var $scrollBar = $('[data-trigger="scrollbar"]');
        $scrollBar.each(function () {
            var $ps, $pos;
            $ps = new PerfectScrollbar(this);
            $pos = localStorage.getItem('ps.' + this.classList[0]);
            if ($pos !== null) {
                $ps.element.scrollTop = $pos;
            }
        });
        $scrollBar.on('ps-scroll-y', function () {
            localStorage.setItem('ps.' + this.classList[0], this.scrollTop);
        });

        $('.date').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd',
        });

        /*--------------------------- Menu bar ---------------------------------------*/

        var $sidebarNav = $('.sidebar--nav');

        $.each($sidebarNav.find('li'), function () {
            var $li = $(this);

            if ($li.children('a').length && $li.children('ul').length) {
                $li.addClass('is-dropdown');
            }
        });

        $sidebarNav.on('click', '.is-dropdown > a', function (e) {
            e.preventDefault();

            var $el = $(this),
                $es = $el.siblings('ul'),
                $ep = $el.parent(),
                $ps = $ep.siblings('.open');

            if ($ep.parent().parent('.sidebar--nav').length) {
                $es.slideToggle();
                $ep.toggleClass('open');

                return;
            }

            $es.add($ps.children('ul')).slideToggle();
            $ep.add($ps).toggleClass('open');
        });

        var $toggleSidebar = $('[data-toggle="sidebar"]');

        $toggleSidebar.on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-mini');
        });

        /*---------------------------------------------------- Editor --------------------------------------*/

        initTinyMceEditor();

        /* --------------------------- FORM WIZARD ---------------------------------- */

        $('.error').html('');
        var $formWizard = $('#formWizard');
        if ($formWizard.length) {
            var formWizardcontainer = $formWizard.validate({
                errorElement: 'div',
                ignore: ':hidden:not(.textarea),.note-editable.card-block',
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2') && element.next('.select2-container').length) {
                        error.insertAfter(element.next('.select2-container'));
                    } else if (element.hasClass("textarea")) {
                        var id_field = $(element).attr('id');
                        var editorContent = tinyMCE.get(id_field).getContent();
                        if (editorContent == '') {
                            $(element).siblings(".tox-tinymce").css({'border': '1px solid #e16123'});
                        } else {
                            $(element).siblings(".tox-tinymce").css({'border': '1px solid #28a745'});
                        }
                        error.insertAfter(element.siblings(".tox-tinymce"));
                    } else {
                        var elem = $(element);
                        error.insertAfter(element);
                    }
                }
            });
        }
        ;

        $('#back_to').on('click', function () {
            window.history.back();
        });

        if ($('.placeholder-cls').val() == '' || $('.placeholder-cls').val() == null) {
            $('.placeholder-cls').val('Jet Blast');
        }

        $('.fileinput-remove').html('<i class="fas fa-trash-alt"></i>  <span class="hidden-xs">Reset</span>');

        var $recordsList = $('.records--list'),
            $recordsListView = $('#recordsListView');
        if ($recordsListView.length) {
            $recordsListView.DataTable({
                "fnDrawCallback": function (oSettings) {
                    if ($(".status_check").length) {
                        $(".status_check").bootstrapSwitch();
                    }
                    if ($(".toggle_state").length) {
                        $(".toggle_state").bootstrapSwitch();
                    }
                    if ($(".status_check_highlight").length) {
                        $(".status_check_highlight").bootstrapSwitch();
                    }
                },
                "pageLength": 25,
                'bAutoWidth': false,
                responsive: true,
                language: {
                    "lengthMenu": "View _MENU_ records"
                },
                dom: '<"topbar"<"toolbar"><"right"li>>f<"table-responsive"t>p',
                order: [],
                columnDefs: [
                    {
                        targets: 'not-sortable',
                        orderable: true
                    }
                ]
            });
            $recordsList.find('.toolbar').text($recordsList.data('title'));
        }

        /* --------------------------------- Status switch ------------------------------ */

        if ($('.status_check').length) {
            $(document).on('switchChange.bootstrapSwitch', '.status_check', function (event, state) {
                var table = $(this).attr('title');
                var primary_key = $(this).attr('ref');
                var _token = token;
                state = state;
                $.ajax({
                    type: 'POST',
                    url: base_url + '/home/status_change/',
                    data: {state: state, table: table, primary_key: primary_key, _token: _token},
                    success: function (response) {
                        if (response === "1") {
                            swal('Success !', 'Status has been changed successfully', 'success');
                        } else {
                            swal('Error !', 'Error while changing the status', 'error');
                        }
                    }
                });
            });
        }


        /* --------------------------------- Toggle State ------------------------------ */

        if ($('.toggle_state').length) {
            $(document).on('switchChange.bootstrapSwitch', '.toggle_state', function (event, state) {
                var table = $(this).attr('title');
                var field = $(this).data('field');
                var id = $(this).attr('ref');
                var _token = token;
                $.ajax({
                    type: 'POST',
                    url: base_url + '/home/toggle_state/',
                    data: {table: table, field: field, id: id, _token: _token},
                    success: function (response) {
                        if (response.status === true) {
                            swal('Success !', response.message, 'success');
                        } else {
                            swal('Error !', response.message, 'error');
                        }
                    }
                });
            });
        }

        $(document).on('click', '.edit_category', function () {
            var title = $(this).data('title');
            var id = $(this).data('id');
            $('#title').val(title);
            $('#id').val(id);
            $("html, body").animate({scrollTop: 0}, "slow");
            return false;
        });

        $(document).on('blur', '.common_sort_order', function () {
            var sort_order = $(this).val();
            var table = $(this).data('table');
            var extra = $(this).data('extra');
            var extra_key = $(this).data('extra_key');
            var id = $(this).data('id');
            var _token = token;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: base_url + '/sort_order/',
                data: {
                    sort_order: sort_order,
                    table: table,
                    extra: extra,
                    extra_key: extra_key,
                    id: id,
                    _token: _token
                },
                success: function (data) {
                    if (data.status == false) {
                        swal('Error !', data.message, 'error');
                    } else {
                        swal('Success !', 'Sort order has been updated succesfully', 'success');
                    }
                }
            })
        });

        $(document).on('click', '.reply_modal', function () {
            var enquiry = $(this).data('enquiry');
            var id = $(this).data('id');
            var reply = $(this).data('reply');
            $('#reply-modal').modal('show');
            $('#enquiry_details').html('');
            $('#enquiry_details').html(enquiry);
            if (reply == '') {
                $('#id').val(id);
                $('#reply').html('');
                $('#reply_to_contact').show();
            } else {
                $('#reply').html(reply);
                $('#reply_to_contact').hide();
            }
        });

        $(document).on('click', '#reply_to_contact', function (e) {
            e.preventDefault();
            $('#reply_to_contact').val('Please Wait..!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('#formWizard').serialize(),
                url: base_url + '/contact_enquiry/reply/',
                success: function (response) {
                    $('#reply_to_contact').val('Update Reply');
                    if (response.status === true) {
                        swal({title: "Success", text: response.message, type: "success"},
                            function () {
                                location.reload();
                            }
                        );
                    } else {
                        swal('Error !', response.message, 'error');
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });

        $(document).on('click', '#reply_to_product_enquiry', function (e) {
            e.preventDefault();
            $('#reply_to_product_enquiry').val('Please Wait..!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('#formWizard').serialize(),
                url: base_url + '/product/enquiry/reply/',
                success: function (response) {
                    $('#reply_to_product_enquiry').val('Update Reply');
                    if (response.status === true) {
                        swal({title: "Success", text: response.message, type: "success"},
                            function () {
                                location.reload();
                            }
                        );
                    } else {
                        swal('Error !', response.message, 'error');
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });

        $(document).on('click', '#reply_to_service_enquiry', function (e) {
            e.preventDefault();
            $('#reply_to_service_enquiry').val('Please Wait..!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('#formWizard').serialize(),
                url: base_url + '/service/enquiry/reply/',
                success: function (response) {
                    $('#reply_to_service_enquiry').val('Update Reply');
                    if (response.status === true) {
                        swal({title: "Success", text: response.message, type: "success"},
                            function () {
                                location.reload();
                            }
                        );
                    } else {
                        swal('Error !', response.message, 'error');
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });

        $("#check_all").click(function () {
            $(".single_box").prop('checked', $(this).prop('checked'));
            checkbox_array();
        });

        $(".single_box").change(function () {
            if (!$(this).prop("checked")) {
                $("#check_all").prop("checked", false);
            }
        });

        $(document).on('click', '.single_box', function () {
            checkbox_array();
        });

        function checkbox_array() {
            var enquiry_ids = [];
            $('.single_box').each(function () {
                if ($(this).prop('checked') == true) {
                    enquiry_ids.push($(this).val());
                }
            });
            if (enquiry_ids.length > 0) {
                var ids = enquiry_ids.join(",");
                $('.delete_btn').show();
                $('#ids').val(ids);
            } else {
                $('.delete_btn').hide();
                $('#ids').val(0);
            }
        }

        $(document).on('click', '#delete_multiple_btn', function () {
            var _token = token;
            var id = $('#ids').val();
            var url = $('#delete_multiple_btn').data('action');
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plz!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + url,
                            data: {id: id, _token: _token},
                            success: function (data) {
                                if (data.status === false) {
                                    swal('Error !', data.message, 'error');
                                } else {
                                    swal({
                                            title: "Success",
                                            text: "Selected Entries has been deleted!",
                                            type: "success"
                                        },
                                        function () {
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        })
                    } else {
                        swal("Cancelled", "Entry remain safe :)", "error");
                    }
                });
        });


        /******************** Enquiry ajax starts here ***************************/

        $(document).on('click', '.enquiry_reply_modal', function () {
            var request = $(this).data('request');
            var id = $(this).data('id');
            var reply = $(this).data('reply');
            $('#reply-modal').modal('show');
            $('#request_details').val('');
            $('#request_details').val(request).attr('readonly', true);
            if (reply == '') {
                $('#id').val(id);
                $('#reply').html('');
                $('#reply_to_enquiry').show();
            } else {
                $('#reply').html(reply);
                $('#reply_to_enquiry').hide();
            }
        });

        $(document).on('click', '#reply_to_enquiry', function (e) {
            var url = $('#url').val();
            e.preventDefault();
            $('#reply_to_enquiry').val('Please Wait..!');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('#formWizard').serialize(),
                url: base_url + '/enquiry/' + url,
                success: function (response) {
                    $('#reply_to_enquiry').val('Update Reply');
                    if (response.status == true) {
                        swal({title: "Success", text: response.message, type: "success"},
                            function () {
                                location.reload();
                            }
                        );
                    } else {
                        swal('Error !', response.message, 'error');
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        });

        $(document).on('click', '#delete_enquiry_btn', function () {
            var _token = token;
            var id = $('#ids').val();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plz!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: base_url + '/enquiry/delete_multi_enquiry/',
                            data: {id: id, _token: _token},
                            success: function (data) {
                                if (data.status == false) {
                                    swal('Error !', data.message, 'error');
                                } else {
                                    swal({title: "Success", text: "Entry has been deleted!", type: "success"},
                                        function () {
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        })
                    } else {
                        swal("Cancelled", "Entry remain safe :)", "error");
                    }
                });
        });

        /******************** Enquiry ajax ends here ***************************/

        $(document).on('click', '.delete_entry', function () {
            var id = $(this).attr('id');
            var table = $(this).attr('ref');
            var method = $(this).attr('res');
            var _token = token;
            if (id) {
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to revert this!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plz!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: base_url + '/' + table + '/' + method + '/',
                                data: {id: id, table: table, _token: _token},
                                success: function (data) {
                                    if (data.status == false) {
                                        swal('Error !', data.message, 'error');
                                    } else {
                                        swal({title: "Success", text: "Entry has been deleted!", type: "success"},
                                            function () {
                                                location.reload();
                                            }
                                        );
                                    }
                                }
                            })
                        } else {
                            swal("Cancelled", "Entry remain safe :)", "error");
                        }
                    });
            } else {
                swal('Error !', 'Entry not found', 'error');
            }
        });

        $(document).on('click', '.kv-file-remove', function (e) {
            e.preventDefault();
            $('.kv-fileinput-error').remove();
            var type = $(this).data('key');
            var url = $(this).data('url');
            var _token = token;
            if (type) {
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to revert this!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plz!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: base_url + '/' + url,
                                data: {type: type, _token: _token},
                                success: function (data) {
                                    if (data.status == false) {
                                        swal('Error !', data.message, 'error');
                                    } else {
                                        swal({title: "Success", text: data.message, type: "success"},
                                            function () {
                                                location.reload();
                                            }
                                        );
                                    }
                                }
                            })
                        } else {
                            swal("Cancelled", "Entry remain safe :)", "error");
                        }
                    });
            } else {
                swal("Cancelled", "Parameter not found", "error");
            }
        });

        $('.for_canonical_url').on('blur', function () {
            var title = $(this).val();
            var cleaned_text = '';
            cleaned_text = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
            cleaned_text = cleaned_text.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
            $('#short_url').val(cleaned_text);
        });

        $('.file_type').on('change', function () {
            if ($(this).val() === "Image") {
                $('.videoDiv').hide();
                $('#video_url').attr('required', false);
            } else {
                $('#video_url').attr('required', true);
                $('.videoDiv').show();
            }
        });

        $('#video_url').on('blur', function () {
            if ($(this).val()) {
                // $('#video_thumbnail_image').attr('required', true);
                $('#video_thumbnail_image_meta_tag').attr('required', true);
            } else {
                $('#video_thumbnail_image').attr('required', false);
                $('#video_thumbnail_image_meta_tag').attr('required', false);
            }
        });

    });

    function check_category_empty() {
        if ($('#title').val() == '') {
            $('#title').removeClass('is-valid').addClass('is-invalid');
            return false;
        } else {
            $('#title').removeClass('is-invalid').addClass('is-valid');
            return true;
        }
    }

    function initTinyMceEditor() {
        tinymce.init({
            selector: '.textarea',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
                {title: 'My page 1', value: 'https://www.tiny.cloud'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_list: [
                {title: 'My page 1', value: 'https://www.tiny.cloud'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Some class', value: 'class-name'}
            ],
            importcss_append: true,
            templates: [
                {
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 200,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: 'oxide',
            content_css: 'default',
            relative_urls: false,
            document_base_url: fc_path,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            filebrowserUploadUrl: base_url + 'uploads/editor/',
            images_upload_base_path: base_url + 'public/uploads/editor/',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', base_url + '/home/image_process?_token=' + token);

                xhr.onload = function () {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };

                formData = new FormData();
                formData.append('upload', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
        });
    }
}(jQuery));
