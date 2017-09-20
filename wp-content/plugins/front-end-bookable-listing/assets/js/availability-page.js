jQuery(document).ready(function () {

    jQuery('#bookings_availability, #bookings_pricing, .bookings_extension').on('change', '.wc_booking_availability_type select, .wc_booking_pricing_type select', function () {
        var value = jQuery(this).val();
        var row = jQuery(this).closest('tr');

        jQuery(row).find('.from_date, .from_day_of_week, .from_month, .from_week, .from_time, .from').hide();
        jQuery(row).find('.to_date, .to_day_of_week, .to_month, .to_week, .to_time, .to').hide();
        jQuery('.repeating-label').hide();
        jQuery('.bookings-datetime-select-to').removeClass('bookings-datetime-select-both');
        jQuery('.bookings-datetime-select-from').removeClass('bookings-datetime-select-both');
        jQuery('.bookings-to-label-row .bookings-datetimerange-second-label').hide();

        if (value == 'custom') {
            jQuery(row).find('.from_date, .to_date').show();
        }
        if (value == 'months') {
            jQuery(row).find('.from_month, .to_month').show();
        }
        if (value == 'weeks') {
            jQuery(row).find('.from_week, .to_week').show();
        }
        if (value == 'days') {
            jQuery(row).find('.from_day_of_week, .to_day_of_week').show();
        }
        if (value.match("^time")) {
            jQuery(row).find('.from_time, .to_time').show();
            if ('time:range' === value) {
                jQuery(row).find('.from_date, .to_date').show();
            }
        }
        if (value == 'persons' || value == 'duration' || value == 'blocks') {
            jQuery(row).find('.from, .to').show();
        }
    });

    jQuery('#availability_rows, #pricing_rows').sortable({
        items: 'tr',
        cursor: 'move',
        axis: 'y',
        handle: '.sort',
        scrollSensitivity: 40,
        forcePlaceholderSize: true,
        helper: 'clone',
        opacity: 0.65,
        placeholder: 'wc-metabox-sortable-placeholder',
        start: function (event, ui) {
            ui.item.css('background-color', '#f6f6f6');
        },
        stop: function (event, ui) {
            ui.item.removeAttr('style');
        }
    });

    jQuery(".from_date_picker").datepicker({dateFormat: "yy-mm-dd"});
    jQuery(".from_date_picker").on("change", function () {
        var selected_from_date = jQuery(this).val();
        jQuery('.from_date_picker').val(selected_from_date);
    });
    jQuery(".to_date_picker").datepicker({dateFormat: "yy-mm-dd"});
    jQuery(".to_date_picker").on("change", function () {
        var selected_to_date = jQuery(this).val();
        jQuery('.to_date_picker').val(selected_to_date);
    });

    jQuery('select#_wc_booking_duration_unit').change(function () {
        var set_duration_unit = jQuery(this).val();
        localStorage.setItem("text", set_duration_unit);
    });

    var get_duration_unit = localStorage.getItem("text");
    if ('month' == get_duration_unit) {
        jQuery('p._wc_booking_buffer_period').hide();
    } else if ('day' == get_duration_unit) {
        jQuery('p._wc_booking_first_block_time_field').hide();
    } else if ('month' == get_duration_unit) {
        jQuery('p._wc_booking_first_block_time_field').show();
        jQuery('p._wc_booking_buffer_period').hide();
    }

    jQuery('select#_wc_booking_duration_unit, select#_wc_booking_duration_type, input#_wc_booking_duration').change(function () {
        if ('day' === jQuery('select#_wc_booking_duration_unit').val() && '1' == jQuery('input#_wc_booking_duration').val() && 'customer' === jQuery('select#_wc_booking_duration_type').val()) {
            jQuery('._wc_booking_enable_range_picker_field').show();
        } else {
            jQuery('._wc_booking_enable_range_picker_field').hide();
        }
    });

    jQuery('select#_wc_booking_duration_type').change(function () {
        if (jQuery('select#_wc_booking_duration_type').val() == 'customer') {
            jQuery('#min_max_duration').show();
        } else {
            jQuery('#min_max_duration').hide();
        }
    });

    var cancel_checkedvalue = jQuery('#_wc_booking_user_can_cancel').val();
    if (cancel_checkedvalue == 'yes') {
        jQuery('p.booking-cancel-limit').show();
    } else {
        jQuery('p.booking-cancel-limit').hide();
    }

    jQuery('#_wc_booking_user_can_cancel').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_user_can_cancel').val('yes');
            jQuery('.booking-cancel-limit').show();
        } else {
            jQuery('.booking-cancel-limit').hide();
        }
    });

    jQuery('#_wc_booking_requires_confirmation').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_requires_confirmation').val('yes');
        }
    });

    jQuery('#_wc_booking_enable_range_picker').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_enable_range_picker').val('yes');
        }
    });
    
    jQuery('#has_resource').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('li .resource_front').show();
            jQuery('#has_resource').val('yes');
        } else {
            //jQuery('#bookings_resources').hide();
            jQuery('li .resource_front').hide();
        }
        
        if(jQuery('#bookings_resources').is(':visible')){
           jQuery('#bookings_resources').hide();
           jQuery('#general_tab').show();
       }
        
    });
    
    jQuery('#has_person').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('li .person_front').show();
            jQuery('#has_person').val('yes');
        }else {
            jQuery('li .person_front').hide();
        }
        
       if(jQuery('#bookings_persons').is(':visible')){
           jQuery('#bookings_persons').hide();
           jQuery('#general_tab').show();
       }
    });

    jQuery('#_wc_booking_person_cost_multiplier').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_person_cost_multiplier').val('yes');
        }
    });

    jQuery('#_wc_booking_person_qty_multiplier').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_person_qty_multiplier').val('yes');
        }
    });

    var has_person_type = jQuery('#_wc_booking_has_person_types').val();
    if (has_person_type == 'yes') {
        jQuery('#persons-types').show();
    } else {
        jQuery('#persons-types').hide();
    }

    jQuery('#_wc_booking_has_person_types').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#_wc_booking_has_person_types').val('yes');
        }
    });

    jQuery('#_wc_booking_has_person_types').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('#persons-types').show();
        } else {
            jQuery('#persons-types').hide();
        }
    });

    jQuery('.add_row').click(function (event) {
        event.preventDefault();
        var newRow = jQuery(this).data('row');
        jQuery(this).closest('table').find('tbody').append(newRow);
        jQuery('body').trigger('row_added');
        return false;
    });

    jQuery('body').on('row_added', function () {
        jQuery('.wc_booking_availability_type select, .wc_booking_pricing_type select').change();
        jQuery('.date-picker').datepicker({
            dateFormat: 'yy-mm-dd',
            numberOfMonths: 1,
        });
    });

    jQuery('body').on('click', 'td.remove', function () {
        jQuery(this).closest('tr').remove()
        return false;
    });

    function wc_bookings_trigger_change_events() {
        jQuery('.wc_booking_availability_type select, .wc_booking_pricing_type select, #_wc_booking_duration_type, #_wc_booking_user_can_cancel, #_wc_booking_duration_unit').change();
    }
    wc_bookings_trigger_change_events();

    jQuery('#bookings_persons').on('change', 'input.person_name', function () {
        jQuery(this).closest('.woocommerce_booking_person').find('span.person_name').text(jQuery(this).val());
    });

    if (jQuery('#has_resource').is(':checked')) {
        jQuery('.woocommerce-MyAccount-navigation-link--update-resource').show();
    } else {
        jQuery('.woocommerce-MyAccount-navigation-link--update-resource').hide();
    }

    jQuery('#has_resource').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('.woocommerce-MyAccount-navigation-link--update-resource').show();
        } else {
            jQuery('.woocommerce-MyAccount-navigation-link--update-resource').hide();
        }
    });
    
    //Add Person Type
    jQuery('#bookings_persons').on('click', 'button.add_person', function () {
        jQuery('.woocommerce_bookable_persons').block({message: null});

        var loop = jQuery('.woocommerce_booking_person').size();

        var data = {
            action: 'woocommerce_add_bookable_person',
            post_id: wc_bookings_writepanel_js_params.post,
            loop: loop,
            security: wc_bookings_writepanel_js_params.nonce_add_person
        };

        jQuery.post(wc_bookings_writepanel_js_params.ajax_url, data, function (response) {
            jQuery('.woocommerce_bookable_persons').append(response).unblock();
            jQuery('.woocommerce_bookable_persons #message').hide();
            jQuery('.woocommerce_bookable_persons').sortable(persons_sortable_options);
        });

        return false;
    });

    //Remove Person type
    jQuery('#bookings_persons').on('click', 'button.remove_booking_person', function (e) {
        e.preventDefault();
        var answer = confirm(wc_bookings_writepanel_js_params.i18n_remove_person);
        if (answer) {

            var el = jQuery(this).parent().parent();

            var person = jQuery(this).attr('rel');

            if (person > 0) {

                jQuery(el).block({message: null});

                var data = {
                    action: 'woocommerce_remove_bookable_person',
                    person_id: person,
                    security: wc_bookings_writepanel_js_params.nonce_delete_person
                };

                jQuery.post(wc_bookings_writepanel_js_params.ajax_url, data, function (response) {
                    jQuery(el).fadeOut('300', function () {
                        jQuery(el).remove();
                    });
                });

            } else {
                jQuery(el).fadeOut('300', function () {
                    jQuery(el).remove();
                });
            }

        }
        return false;
    });

    var persons_sortable_options = {
        items: '.woocommerce_booking_person',
        cursor: 'move',
        axis: 'y',
        handle: 'h3',
        scrollSensitivity: 40,
        forcePlaceholderSize: true,
        helper: 'clone',
        opacity: 0.65,
        placeholder: 'wc-metabox-sortable-placeholder',
        start: function (event, ui) {
            ui.item.css('background-color', '#f6f6f6');
        },
        stop: function (event, ui) {
            ui.item.removeAttr('style');
            person_row_indexes();
        }
    };

    jQuery('.woocommerce_bookable_persons').sortable(persons_sortable_options);

    function person_row_indexes() {
        jQuery('.woocommerce_bookable_persons .woocommerce_booking_person').each(function (index, el) {
            jQuery('.person_menu_order', el).val(parseInt(jQuery(el).index('.woocommerce_bookable_persons .woocommerce_booking_person'), 10));
        });
    }
    ;

    // Add a resource
    jQuery('#bookings_resources').on('click', 'button.add_resource', function () {
        var loop = jQuery('.woocommerce_booking_resource').size();
        var add_resource_id = jQuery('select.add_resource_id').val();
        var add_resource_name = '';

        if (!add_resource_id) {
            add_resource_name = prompt(wc_bookings_writepanel_js_params.i18n_new_resource_name);

            if (!add_resource_name) {
                return false;
            }
        }

        jQuery('.woocommerce_bookable_resources').block({message: null});
        var post_id = jQuery('#post_id_val').val();
        var data = {
            action: 'woocommerce_add_bookable_resource',
            post_id: post_id,
            loop: loop,
            add_resource_id: add_resource_id,
            add_resource_name: add_resource_name,
            security: wc_bookings_writepanel_js_params.nonce_add_resource
        };

        jQuery.post(wc_bookings_writepanel_js_params.ajax_url, data, function (response) {
            if (response.error) {
                alert(response.error);
            } else {
                jQuery('.woocommerce_bookable_resources').append(response.html).unblock();
                jQuery('.woocommerce_bookable_resources').sortable(resources_sortable_options);
                if (add_resource_id) {
                    jQuery('.add_resource_id').find('option[value=' + add_resource_id + ']').remove();
                }
            }
        });

        return false;
    });

    // Remove a resource
    jQuery('#bookings_resources').on('click', 'button.remove_booking_resource', function (e) {
        e.preventDefault();
        var answer = confirm(wc_bookings_writepanel_js_params.i18n_remove_resource);
        if (answer) {
            var post_id = jQuery('#product_id').val();            
            var el = jQuery(this).parent().parent();
            var resource = jQuery(this).attr('rel');
            jQuery(el).block({message: null, overlayCSS: {background: '#fff url(' + wc_bookings_writepanel_js_params.plugin_url + '/assets/images/ajax-loader.gif) no-repeat center', opacity: 0.6}});

            var data = {
                action: 'woocommerce_remove_bookable_resource',
                post_id: post_id,
                resource_id: resource,
                security: wc_bookings_writepanel_js_params.nonce_delete_resource
            };

            jQuery.post(wc_bookings_writepanel_js_params.ajax_url, data, function (response) {
                jQuery(el).fadeOut('300', function () {
                    jQuery(el).remove();
                });
            });
        }
        return false;
    });

    var resources_sortable_options = {
        items: '.woocommerce_booking_resource',
        cursor: 'move',
        axis: 'y',
        handle: 'h3',
        scrollSensitivity: 40,
        forcePlaceholderSize: true,
        helper: 'clone',
        opacity: 0.65,
        placeholder: 'wc-metabox-sortable-placeholder',
        start: function (event, ui) {
            ui.item.css('background-color', '#f6f6f6');
        },
        stop: function (event, ui) {
            ui.item.removeAttr('style');
            resource_row_indexes();
        }
    };

    jQuery('.woocommerce_bookable_resources').sortable(resources_sortable_options);

    function resource_row_indexes() {
        jQuery('.woocommerce_bookable_resources .woocommerce_booking_resource').each(function (index, el) {
            jQuery('.resource_menu_order', el).val(parseInt(jQuery(el).index('.woocommerce_bookable_resources .woocommerce_booking_resource'), 10));
        });
    }

    jQuery('#bookings_resources').on('change', 'input.resource_name', function () {
        jQuery(this).closest('.woocommerce_booking_resource').find('span.resource_name').text(jQuery(this).val());
    });

    // Open/close
    jQuery('.wc-metaboxes-wrapper').on('click', '.wc-metabox h3', function (event) {
        // If the user clicks on some form input inside the h3, like a select list (for variations), the box should not be toggled
        if (jQuery(event.target).filter(':input, option').length) {
            return;
        }

        jQuery(this).next('.wc-metabox-content').toggle();
    })
            .on('click', '.expand_all', function () {
                jQuery(this).closest('.wc-metaboxes-wrapper').find('.wc-metabox > table').show();
                return false;
            })
            .on('click', '.close_all', function () {
                jQuery(this).closest('.wc-metaboxes-wrapper').find('.wc-metabox > table').hide();
                return false;
            });

    jQuery('.wc-metabox.closed').each(function () {
        jQuery(this).find('.wc-metabox-content').hide();
    });

    jQuery('.wc-metabox > h3').on('click', function () {
        jQuery(this).parent('.wc-metabox').toggleClass('closed').toggleClass('open');
    });

    jQuery('#resources').click(function (e) {
        alert("hello");
        e.preventDefault();
        jQuery.ajax({
            type: "GET",
            url: "sample1.html",
            data: {},
            success: function (data) {
                jQuery('#maincont').html(data);
            }
        });
    });
//    C:\wamp64\www\front_end_WooBooking_plugin_test\wp-content\plugins\front-end-woobooking\sample.html
// 
    jQuery('#persons').click(function (e) {
        e.preventDefault();
        jQuery.ajax({
            type: "GET",
            url: "../hh/sample.html",
            data: {},
            success: function (data) {
                jQuery('#maincont').html(data);
            }
        });
    });
});
//Base cost is applied regardless of a customer’s choices on the booking form.
//Block cost is the cost per block that was assigned in the General tab. If a customer books multiple blocks, this cost is multiplied by the number of blocks booked.

//If multiple costs by person count is enabled, all costs are multiplied by the number of persons the customer defines.
//If count persons as bookings is enabled, the person count is used as the quantity against the block. Remember the max bookings per block setting above? That determines the upper limit for allowed persons per block. Once the limit is reached, more persons cannot book.