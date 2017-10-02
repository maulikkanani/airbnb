<?php

    if(isset($_GET['job_id'])){
        
       $products=get_post_meta($_GET['job_id'],'_products',true);
        $product_id='';
        if(count($products)==1){
            $product_id=$products[0];
    
    if (isset($_POST['product_id'])){
      
        }
        echo "<input type='hidden' id='product_id' name='product_id' value='".$product_id."' />";
        ?>
            
<!-- General Menu Tab -->
<div id="general_tab" class="panel woocommerce_options_panel">
    <div class="options_group show_if_booking">        
        <?php     $duration_type = get_post_meta($product_id, '_wc_booking_duration_type', true);
            $duration = max(absint(get_post_meta($product_id, '_wc_booking_duration', true)), 1);
            $duration_unit = get_post_meta($product_id, '_wc_booking_duration_unit', true);  
        ?>
            <h2>Set General Availability of Product</h2>
            <p class="form-field">
                <label for="_wc_booking_duration_type"><?php _e('Booking duration', 'woocommerce-bookings'); ?></label>
                <select name="_wc_booking_duration_type" id="_wc_booking_duration_type" class="" style="width: auto; margin-right: 7px;">
                    <option value="fixed" <?php selected($duration_type, 'fixed'); ?>><?php _e('Fixed blocks of', 'woocommerce-bookings'); ?></option>
                    <option value="customer" <?php selected($duration_type, 'customer'); ?>><?php _e('Customer defined blocks of', 'woocommerce-bookings'); ?></option>
                </select>
                <input type="number" name="_wc_booking_duration" id="_wc_booking_duration" value="<?php echo $duration; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_duration_unit" id="_wc_booking_duration_unit" class="short" style="width: auto; margin-right: 7px;">
                    <option value="month" <?php selected($duration_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($duration_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($duration_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                    <option value="minute" <?php selected($duration_unit, 'minute'); ?>><?php _e('Minutes(s)', 'woocommerce-bookings'); ?></option>
                </select>
            </p>

            <div id="min_max_duration">
                <?php
                $min_duration = get_post_meta($product_id, '_wc_booking_min_duration', true);
                ?>
                <p class="form-field _wc_booking_min_duration_field ">
                    <label for="_wc_booking_min_duration">Minimum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_min_duration" id="_wc_booking_min_duration" value="<?php echo $min_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <?php
//                $max_duration = get_post_meta($product_id, '_wc_booking_max_duration', true);
                ?>
                <p class="form-field _wc_booking_max_duration_field ">
                    <label for="_wc_booking_max_duration">Maximum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_max_duration" id="_wc_booking_max_duration" value="<?php // echo $max_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <?php
//                $range_picker = get_post_meta($product_id, '_wc_booking_enable_range_picker', true);
                ?>
                <div id="enable-range-picker">
                    <p class="form-field _wc_booking_enable_range_picker_field " style="display: block;">
                        <label for="_wc_booking_enable_range_picker">Enable Calendar Range Picker?</label>
                         <input type="checkbox" class="checkbox" style="" name="_wc_booking_enable_range_picker" id="_wc_booking_enable_range_picker" value="yes" checked="checked">             
                        <span class="description">Lets the user select a start and end date on the calendar - duration will be calculated automatically.</span>
                    </p>
                </div>
            </div>
            <?php
//            $calendar_display_mode = get_post_meta($product_id, '_wc_booking_calendar_display_mode', true);
            ?>
            <p class="form-field _wc_booking_calendar_display_mode_field ">
                <label for="_wc_booking_calendar_display_mode">Calendar display mode</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_calendar_display_mode" name="_wc_booking_calendar_display_mode" class="select" style="">
                    <option value="always_visible" <?php // selected($calendar_display_mode, 'always_visible'); ?>><?php _e('Calendar always visible', 'woocommerce-bookings'); ?></option>
                    <option value="" <?php // selected($calendar_display_mode, ''); ?>><?php _e('Display calendar on click', 'woocommerce-bookings'); ?></option>
                </select> 
            </p>
            <?php
//            $booking_requires_conformation = get_post_meta($product_id, '_wc_booking_requires_confirmation', true);
            ?>
            <p class="form-field _wc_booking_requires_confirmation_field ">
                <label for="_wc_booking_requires_confirmation">Requires confirmation?</label>
                <?php
//                if ($booking_requires_conformation == "yes") {
//                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="yes" checked="checked">
                    //<?php
//                } else {
//                    ?>
                  
                    //<?php
//                }
                ?>
                <span class="description">Check this box if the booking requires admin approval/confirmation. Payment will not be taken during checkout.</span>
            </p>
            <?php
//            $booking_user_can_cancel = get_post_meta($product_id, '_wc_booking_user_can_cancel', true);
            ?>
            <p class="form-field _wc_booking_user_can_cancel_field ">
                <label for="_wc_booking_user_can_cancel">Can be cancelled?</label>
                <?php
//                if ($booking_user_can_cancel == "yes") {
//                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="no" checked="checked"> 
                    //<?php
//                } else {
//                    ?>
                   
                    //<?php
//                }
                ?>
                <span class="description">Check this box if the booking can be cancelled by the customer after it has been purchased. A refund will not be sent automatically.</span>
            </p>
            <?php
//            $cancel_limit = get_post_meta($product_id, '_wc_booking_cancel_limit', true);
//            $cancel_limit_unit = get_post_meta($product_id, '_wc_booking_cancel_limit_unit', true);
            ?>
            <p class="form-field booking-cancel-limit">
                <label for="_wc_booking_cancel_limit"><?php _e('Booking can be cancelled until', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_cancel_limit" id="_wc_booking_cancel_limit" value="<?php // echo $cancel_limit; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_cancel_limit_unit" id="_wc_booking_cancel_limit_unit" class="short" style="width: auto; margin-right: 7px;">
                    <option value="month" <?php // selected($cancel_limit_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php // selected($cancel_limit_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php // selected($cancel_limit_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                    <option value="minute" <?php // selected($cancel_limit_unit, 'minute'); ?>><?php _e('Minute(s)', 'woocommerce-bookings'); ?></option>
                </select>
                <span class="description"><?php _e('before the start date.', 'woocommerce-bookings'); ?></span>
            </p>

            <!--<input name="save" type="submit" class="" id="save_btn" value="Update">-->
    </div>

</div>
            <?php 
    }else
    {?>
    
<!-- General Menu Tab -->
<div id="general_tab" class="panel woocommerce_options_panel">
    <div class="options_group show_if_booking">        
       
            <h2>Set General Availability of Product</h2>
            <p class="form-field">
                <label for="_wc_booking_duration_type"><?php _e('Booking duration', 'woocommerce-bookings'); ?></label>
                <select name="_wc_booking_duration_type" id="_wc_booking_duration_type" class="" style="width: auto; margin-right: 7px;">
                    <option value="fixed" <?php // selected($duration_type, 'fixed'); ?>><?php _e('Fixed blocks of', 'woocommerce-bookings'); ?></option>
                    <option value="customer" <?php // selected($duration_type, 'customer'); ?>><?php _e('Customer defined blocks of', 'woocommerce-bookings'); ?></option>
                </select>
                <input type="number" name="_wc_booking_duration" id="_wc_booking_duration" value="<?php // echo $duration; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_duration_unit" id="_wc_booking_duration_unit" class="short" style="width: auto; margin-right: 7px;">
                    <option value="month" <?php // selected($duration_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php // selected($duration_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php // selected($duration_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                    <option value="minute" <?php // selected($duration_unit, 'minute'); ?>><?php _e('Minutes(s)', 'woocommerce-bookings'); ?></option>
                </select>
            </p>

            <div id="min_max_duration">
                <?php
//                $min_duration = get_post_meta($product_id, '_wc_booking_min_duration', true);
                ?>
                <p class="form-field _wc_booking_min_duration_field ">
                    <label for="_wc_booking_min_duration">Minimum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_min_duration" id="_wc_booking_min_duration" value="<?php // echo $min_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <?php
//                $max_duration = get_post_meta($product_id, '_wc_booking_max_duration', true);
                ?>
                <p class="form-field _wc_booking_max_duration_field ">
                    <label for="_wc_booking_max_duration">Maximum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_max_duration" id="_wc_booking_max_duration" value="<?php // echo $max_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <?php
//                $range_picker = get_post_meta($product_id, '_wc_booking_enable_range_picker', true);
                ?>
                <div id="enable-range-picker">
                    <p class="form-field _wc_booking_enable_range_picker_field " style="display: block;">
                        <label for="_wc_booking_enable_range_picker">Enable Calendar Range Picker?</label>
                         <input type="checkbox" class="checkbox" style="" name="_wc_booking_enable_range_picker" id="_wc_booking_enable_range_picker" value="yes" checked="checked">             
                        <span class="description">Lets the user select a start and end date on the calendar - duration will be calculated automatically.</span>
                    </p>
                </div>
            </div>
            <?php
//            $calendar_display_mode = get_post_meta($product_id, '_wc_booking_calendar_display_mode', true);
            ?>
            <p class="form-field _wc_booking_calendar_display_mode_field ">
                <label for="_wc_booking_calendar_display_mode">Calendar display mode</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_calendar_display_mode" name="_wc_booking_calendar_display_mode" class="select" style="">
                    <option value="always_visible" <?php // selected($calendar_display_mode, 'always_visible'); ?>><?php _e('Calendar always visible', 'woocommerce-bookings'); ?></option>
                    <option value="" <?php // selected($calendar_display_mode, ''); ?>><?php _e('Display calendar on click', 'woocommerce-bookings'); ?></option>
                </select> 
            </p>
            <?php
//            $booking_requires_conformation = get_post_meta($product_id, '_wc_booking_requires_confirmation', true);
            ?>
            <p class="form-field _wc_booking_requires_confirmation_field ">
                <label for="_wc_booking_requires_confirmation">Requires confirmation?</label>
                <?php
//                if ($booking_requires_conformation == "yes") {
//                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="yes" checked="checked">
                    //<?php
//                } else {
//                    ?>
                  
                    //<?php
//                }
                ?>
                <span class="description">Check this box if the booking requires admin approval/confirmation. Payment will not be taken during checkout.</span>
            </p>
            <?php
//            $booking_user_can_cancel = get_post_meta($product_id, '_wc_booking_user_can_cancel', true);
            ?>
            <p class="form-field _wc_booking_user_can_cancel_field ">
                <label for="_wc_booking_user_can_cancel">Can be cancelled?</label>
                <?php
//                if ($booking_user_can_cancel == "yes") {
//                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="no" checked="checked"> 
                    //<?php
//                } else {
//                    ?>
                   
                    //<?php
//                }
                ?>
                <span class="description">Check this box if the booking can be cancelled by the customer after it has been purchased. A refund will not be sent automatically.</span>
            </p>
            <?php
//            $cancel_limit = get_post_meta($product_id, '_wc_booking_cancel_limit', true);
//            $cancel_limit_unit = get_post_meta($product_id, '_wc_booking_cancel_limit_unit', true);
            ?>
            <p class="form-field booking-cancel-limit">
                <label for="_wc_booking_cancel_limit"><?php _e('Booking can be cancelled until', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_cancel_limit" id="_wc_booking_cancel_limit" value="<?php // echo $cancel_limit; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_cancel_limit_unit" id="_wc_booking_cancel_limit_unit" class="short" style="width: auto; margin-right: 7px;">
                    <option value="month" <?php // selected($cancel_limit_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php // selected($cancel_limit_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php // selected($cancel_limit_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                    <option value="minute" <?php // selected($cancel_limit_unit, 'minute'); ?>><?php _e('Minute(s)', 'woocommerce-bookings'); ?></option>
                </select>
                <span class="description"><?php _e('before the start date.', 'woocommerce-bookings'); ?></span>
            </p>

            <!--<input name="save" type="submit" class="" id="save_btn" value="Update">-->
    </div>

</div>

       <?php  
    }
    }
    
?>



<!-- Left side menus on the add listing page -->

<div class="woocommerce-MyAccount-navigation">
    <nav class="woocommerce-MyAccount-navigation"> 
        <ul class="product_data_tabs wc-tabs">
            <li class="general_options general_tab hide_if_grouped">
                <a href="#general_product_data" class="general_front">Generals</a>
            </li>
            <li class="bookings_tab bookings_resources_tab advanced_options show_if_booking" >
                <a href="#bookings_resources" class="resource_front">Resources</a>
            </li>
            <li class="bookings_tab bookings_availability_tab advanced_options show_if_booking" >
                <a href="#bookings_availability" class="availability_front">Availability</a>
            </li>
            <li class="bookings_tab bookings_pricing_tab advanced_options show_if_booking" >
                    <a href="#bookings_pricing" class="coast coast_front">Costs</a>
            </li>
            <li class="bookings_tab bookings_persons_tab advanced_options show_if_booking" >
                <a href="#bookings_persons" class="person person_front">Persons</a>
            </li>
        </ul>
    </nav>
</div>


 
<script>
    jQuery(document).ready(function(){
    
            jQuery("#general_tab").show();
            jQuery("#bookings_availability").hide();
            jQuery("#bookings_pricing").hide();
            jQuery("#bookings_persons").hide();
            jQuery('#bookings_resources').hide();
            
        
        jQuery('.general_front').click(function (){
            jQuery("#general_tab").show();
            jQuery("#bookings_availability").hide();
            jQuery("#bookings_pricing").hide();
            jQuery("#bookings_persons").hide();
            jQuery('#bookings_resources').hide();
        });
        
        jQuery('.availability_front').click(function (){
            jQuery("#bookings_availability").show();
            jQuery("#general_tab").hide();
            jQuery("#bookings_pricing").hide();
            jQuery("#bookings_persons").hide();
            jQuery('#bookings_resources').hide();
        });
        jQuery('.coast_front').click(function (){
            jQuery("#bookings_pricing").show();
            jQuery("#general_tab").hide();
            jQuery('#bookings_resources').hide();
            jQuery("#bookings_availability").hide();
            jQuery("#bookings_persons").hide();
        });
        jQuery('.person_front').click(function (){
            jQuery("#bookings_persons").show();
            jQuery("#bookings_pricing").hide();
            jQuery("#general_tab").hide();
            jQuery('#bookings_resources').hide();
            jQuery("#bookings_availability").hide();
        });
        jQuery('.resource_front').click(function (){
            jQuery('#bookings_resources').show();
            jQuery("#bookings_persons").hide();
            jQuery("#bookings_pricing").hide();
            jQuery("#general_tab").hide();
            jQuery("#bookings_availability").hide();
        })
        
    });
</script>
   

echo !empty($min_duration)? $min_duration : '';
echo !empty($max_duration)? $max_duration : '';









