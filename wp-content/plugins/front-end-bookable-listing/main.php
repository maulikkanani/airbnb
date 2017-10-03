<!-- get product for edit listing-->
<?php 

    $product_id=$max_duration='';
    
    if(isset($_GET['job_id'])){
        $products=get_post_meta($_GET['job_id'],'_products',true);
        
        if(count($products)==1){
            $product_id=$products[0];
        }
        
    }  
    echo "<input type='hidden' id='product_id' name='product_id' value='".$product_id."' />";
    
?>  

<div class="navandbookale">
    

<!-- Left side menus on the add listing page -->
<div class="woocommerce-MyAccount-navigation" id="tabs_menu_custom">
    <nav class="woocommerce-MyAccount-navigation"> 
        <ul class="product_data_tabs wc-tabs">
            <li class="general_options general_tab hide_if_grouped active_tab">
                <a class="general_front">General</a>
            </li>
            <li class="bookings_tab bookings_resources_tab advanced_options show_if_booking" >
                <a  class="resource_front">Resources</a>
            </li>
            <li class="bookings_tab bookings_availability_tab advanced_options show_if_booking" >
                <a  class="availability_front">Availability</a>
            </li>
            <li class="bookings_tab bookings_pricing_tab advanced_options show_if_booking" >
                    <a class="coast coast_front">Costs</a>
            </li>
            <li class="bookings_tab bookings_persons_tab advanced_options show_if_booking" >
                <a class="person person_front">Persons</a>
            </li>
        </ul>
    </nav>
</div>

<div id="bookablecontent"> 
<div id="has_person_checkbox">
    <?php 
        $has_person = get_post_meta($product_id, '_wc_booking_has_persons', true); 
        if($has_person=='yes'){?>
            <input type="checkbox" class="checkbox" style="" name="has_person" id="has_person" value="yes" checked="checked">Enable Persons
        <?php }else{ ?>
            <input type="checkbox" class="checkbox" style="" name="has_person" id="has_person" value="no">Enable Persons
        <?php } ?>
</div>
<div id="has_resource_checkbox">
    <?php 
        $has_resource = get_post_meta($product_id, '_wc_booking_has_resources', true); 
        if($has_resource=='yes'){?>
            <input type="checkbox" class="checkbox" style="" name="has_resource" id="has_resource" value="yes" checked="checked">Enable Resource
        <?php }else{ ?>
            <input type="checkbox" class="checkbox" style="" name="has_resource" id="has_resource" value="no">Enable Resource
        <?php } ?>
</div>
<hr>

<!-- General Menu Tab -->
<?php 

    if(empty($product_id)){
        ?>

     <!------- 
        GENERAL TAB FIELD START
     ------->
    <div id="general_tab" class="panel woocommerce_options_panel">
    <div class="options_group show_if_booking">        
          
            <h2>Set General Availability of Product</h2>
            <p class="form-field">
                <label for="_wc_booking_duration_type"><?php _e('Booking duration', 'woocommerce-bookings'); ?></label>
                <select name="_wc_booking_duration_type" id="_wc_booking_duration_type" class="" style="width: auto; margin-right: 7px;">
                    <option value="fixed" ><?php _e('Fixed blocks of', 'woocommerce-bookings'); ?></option>
                    <option value="customer" ><?php _e('Customer defined blocks of', 'woocommerce-bookings'); ?></option>
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
                
                <p class="form-field _wc_booking_min_duration_field ">
                    <label for="_wc_booking_min_duration">Minimum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_min_duration" id="_wc_booking_min_duration" value="<?php // echo $min_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <p class="form-field _wc_booking_max_duration_field ">
                    <label for="_wc_booking_max_duration">Maximum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_max_duration" id="_wc_booking_max_duration" value="<?php // echo $max_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                
                <div id="enable-range-picker">
                    <p class="form-field _wc_booking_enable_range_picker_field " style="display: block;">
                        <label for="_wc_booking_enable_range_picker">Enable Calendar Range Picker?</label>
                        <input type="checkbox" class="checkbox" style="" name="_wc_booking_enable_range_picker" id="_wc_booking_enable_range_picker" value="no">  
                        
                        <span class="description">Lets the user select a start and end date on the calendar - duration will be calculated automatically.</span>
                    </p>
                </div>
            </div>
            <p class="form-field _wc_booking_calendar_display_mode_field ">
                <label for="_wc_booking_calendar_display_mode">Calendar display mode</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_calendar_display_mode" name="_wc_booking_calendar_display_mode" class="select" style="">
                    <option value="always_visible" <?php // selected($calendar_display_mode, 'always_visible'); ?>><?php _e('Calendar always visible', 'woocommerce-bookings'); ?></option>
                    <option value="" <?php // selected($calendar_display_mode, ''); ?>><?php _e('Display calendar on click', 'woocommerce-bookings'); ?></option>
                </select> 
            </p>
            
            <p class="form-field _wc_booking_requires_confirmation_field ">
                <label for="_wc_booking_requires_confirmation">Requires confirmation?</label>
                <input type="checkbox" class="checkbox" style="" name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="yes" checked="checked">

                <span class="description">Check this box if the booking requires admin approval/confirmation. Payment will not be taken during checkout.</span>
            </p>
            
            <p class="form-field _wc_booking_user_can_cancel_field ">
                <label for="_wc_booking_user_can_cancel">Can be cancelled?</label>
            
                <input type="checkbox" class="checkbox" style="" name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="yes" checked="checked"> 
            
                <span class="description">Check this box if the booking can be cancelled by the customer after it has been purchased. A refund will not be sent automatically.</span>
            </p>
           
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
     <!------- 
        GENERAL TAB FIELD END
     ------->

         
    <!-------
        AVAILABILITY TAB MENU START 
    -------->

<div id="bookings_availability" class="panel woocommerce_options_panel">
        
        <div class="options_group">
            
            <h2>Set Availability of Product</h2>
            <p class="form-field _wc_booking_qty_field ">
                <label for="_wc_booking_qty">Max bookings per block</label>
                <span class="woocommerce-help-tip"></span>
                <input type="text" class="short" style="" name="_wc_booking_qty" id="_wc_booking_qty" value="<?php // echo get_post_meta($product_id, '_wc_booking_qty', true) ?>" placeholder="" min="" step="1">
            </p>            
            
            <p class="form-field">
                <label for="_wc_booking_min_date"><?php _e('Minimum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_min_date" id="_wc_booking_min_date" value="<?php // echo $min_date; ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_min_date_unit" id="_wc_booking_min_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php // selected($min_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php // selected($min_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php // selected($min_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php // selected($min_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>
            
            <p class="form-field">
                <label for="_wc_booking_max_date"><?php _e('Maximum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_max_date" id="_wc_booking_max_date" value="<?php // echo $max_date; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_max_date_unit" id="_wc_booking_max_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php // selected($max_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php // selected($max_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php // selected($max_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php // selected($max_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>

            <p class="form-field _wc_booking_buffer_period" id="_wc_booking_buffer_period">
                <label for="_wc_booking_buffer_period"><?php _e('Require a buffer period of', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_buffer_period" id="_wc_booking_buffer_period" value="<?php // echo esc_attr($buffer_period); ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <span class='_wc_booking_buffer_period_unit'></span>
                <?php _e('between bookings', 'woocommerce-bookings'); ?>
            </p>
            
            <p class="form-field _wc_booking_default_date_availability_field ">
                <label for="_wc_booking_default_date_availability">All dates are...</label>
                <select id="_wc_booking_default_date_availability" name="_wc_booking_default_date_availability" class="select short" style="">
                    <option value="available" <?php // selected($default_date_availability,'available'); ?>><?php _e('available by default', 'woocommerce-bookings'); ?></option>
                    <option value="non-available" <?php // selected($default_date_availability,'non-available'); ?>><?php _e('not-available by default', 'woocommerce-bookings'); ?></option>                   
                </select> 
                <span class="description">This option affects how you use the rules below.</span>
            </p>
            
            <p class="form-field _wc_booking_check_availability_against_field ">
                <label for="_wc_booking_check_availability_against">Check rules against...</label>
                <select id="_wc_booking_check_availability_against" name="_wc_booking_check_availability_against" class="select short" style="">
                    <option value="" <?php // selected($check_availability_against,''); ?>><?php _e('All blocks being booked', 'woocommerce-bookings'); ?></option>
                    <option value="start" <?php // selected($check_availability_against,'start'); ?>><?php _e('The starting block only', 'woocommerce-bookings'); ?></option>                   
                </select>
                <span class="description">This option affects how bookings are checked for availability.</span>
            </p>
            <?php
//            $wc_booking_first_block_time = get_post_meta($product_id, '_wc_booking_duration_unit', true);
            ?>
                <p class="form-field _wc_booking_first_block_time_field">
                    <label for="_wc_booking_first_block_time"><?php _e('First block starts at...', 'woocommerce-bookings'); ?></label>
                    <input type="time" name="_wc_booking_first_block_time" id="_wc_booking_first_block_time" value="<?php // echo get_post_meta($product_id, '_wc_booking_first_block_time', true); ?>" placeholder="HH:MM" />
                </p>
                <?php
            ?>
        </div>
        <div class="options_group">
            <div class="table_grid">
                <table class="widefat">
                    <thead>
                        <tr>
                            <th class="sort" width="1%">&nbsp;</th>
                            <th><?php _e('Range type', 'woocommerce-bookings'); ?></th>
                            <th><?php _e('Range', 'woocommerce-bookings'); ?></th>
                            <th></th>
                            <th></th>
                            <th><?php _e('Bookable', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('If not bookable, users won\'t be able to choose this block for their booking.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th><?php _e('Priority', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php esc_html_e('The lower the priority number, the earlier this rule gets applied. By default, global rules take priority over product rules which take priority over resource rules. By using priority numbers you can execute rules in different orders.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th class="remove" width="1%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="6">
                                <a href="#" class="add_row add_range_button" data-row="<?php
                                ob_start();
                                include( 'html-booking-availability-fields.php' );
                                $html = ob_get_clean();
                                echo esc_attr($html);
                                ?>"><?php _e('Add Range', 'woocommerce-bookings'); ?></a>
                                <span class="description"><?php _e('Rules with lower numbers will execute first. Rules further down this table with the same priority will also execute first.', 'woocommerce-bookings'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody id="availability_rows">
                        <?php
                        $values = get_post_meta($product_id, '_wc_booking_availability', true);
                        if (!empty($values) && is_array($values)) {
                            foreach ($values as $availability) {
                                include( 'html-booking-availability-fields.php' );                        
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div> 
        <!-------
            AVAILABILITY TAB MENU END 
        -------->
            
            
         <!-------
            COST TAB MENU START 
        -------->
        
<div id="bookings_pricing" class="panel woocommerce_options_panel">
    <!--<input type="hidden" id="post_id_val" name="post_id_val" value="<?php // echo $product_id; ?>">-->
	<div class="options_group">
            
            <p class="form-field _wc_booking_cost_field ">
                    <label for="_wc_booking_cost">Base cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_cost" id="_wc_booking_cost" value="<?php // echo $_wc_booking_cost; ?>" placeholder="" min="" step="0.01">
            </p>
            
            <p class="form-field _wc_booking_base_cost_field ">
                    <label for="_wc_booking_base_cost">Block cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_base_cost" id="_wc_booking_base_cost" value="<?php // echo $_wc_booking_base_cost; ?>" placeholder="" min="" step="0.01"> 
            </p>
            
            <p class="form-field _wc_display_cost_field ">
                    <label for="_wc_display_cost">Display cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_display_cost" id="_wc_display_cost" value="<?php // echo $_wc_display_cost; ?>" placeholder="" min="" step="0.01"> 
            </p>
	</div>
        <div class="options_group">
            <div class="table_grid">
                <table class="widefat">
                    <thead>
                        <tr>
                            <th class="sort" width="1%">&nbsp;</th>
                            <th><?php _e('Range type', 'woocommerce-bookings'); ?></th>
                            <th><?php _e('Range', 'woocommerce-bookings'); ?></th>
                            <th></th>
                            <th></th>
                            <th><?php _e('Base cost', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('Enter a cost for this rule. Applied to the booking as a whole.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th><?php _e('Block cost', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('Enter a cost for this rule. Applied to each booking block.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th class="remove" width="1%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="9">
                                <a href="#" class="button button-primary add_row" data-row="<?php
                                ob_start();
                                include( 'html-booking-pricing-fields.php' );
                                $html = ob_get_clean();
                                echo esc_attr($html);
                                ?>"><?php _e('Add Range', 'woocommerce-bookings'); ?></a>
                                <span class="description"><?php _e('All matching rules will be applied to the booking.', 'woocommerce-bookings'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody id="pricing_rows">
                        <?php
                       
                            include( 'html-booking-pricing-fields.php' );
                       
                        ?>
                    </tbody>
                </table>
            </div>
            <?php 
            do_action('woocommerce_bookings_after_bookings_pricing', $product_id); ?>

        </div>
</div>    
           
        <!-------
            COST TAB MENU END
        -------->    
        
        <!-------
            PERSON TAB START
        -------->       
         
        <div id="bookings_persons" class="woocommerce_options_panel panel wc-metaboxes-wrapper">
        
        <div class="options_group" id="persons-options">

        
            <h2>Set person of Product<?php   // echo $my_product_name; ?></h2>
            <p class="form-field _wc_booking_min_persons_group_field ">
                <label for="_wc_booking_min_persons_group">Min persons</label>
                <span class="woocommerce-help-tip"></span>
                <input type="number" class="short" style="" name="_wc_booking_min_persons_group" id="_wc_booking_min_persons_group" value="<?php // echo $_wc_booking_min_persons_group; ?>" placeholder="" min="1" step="1"> 
            </p>
            
            <p class="form-field _wc_booking_max_persons_group_field ">
                <label for="_wc_booking_max_persons_group">Max persons</label>
                <span class="woocommerce-help-tip"></span>
                <input type="number" class="short" style="" name="_wc_booking_max_persons_group" id="_wc_booking_max_persons_group" value="<?php // echo $_wc_booking_max_persons_group; ?>" placeholder="" min="1" step="1"> 
            </p>
            
            <p class="form-field _wc_booking_person_cost_multiplier_field ">
                <label for="_wc_booking_person_cost_multiplier">Multiply all costs by person count</label>
                <span class="woocommerce-help-tip"></span>
                
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_cost_multiplier" id="_wc_booking_person_cost_multiplier" value="no" > 
                   
                  
            </p>
            
            <p class="form-field _wc_booking_person_qty_multiplier_field ">
                <label for="_wc_booking_person_qty_multiplier">Count persons as bookings</label>
                <span class="woocommerce-help-tip"></span>
                
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_qty_multiplier" id="_wc_booking_person_qty_multiplier" value="no"> 
                  
            </p>
            <?php
            $_wc_booking_has_person_types = get_post_meta($product_id, '_wc_booking_has_person_types', true);
            ?>
            <p class="form-field _wc_booking_has_person_types_field ">
                <label for="_wc_booking_has_person_types">Enable person types</label>
                <span class="woocommerce-help-tip"></span>
                <?php
                if ($_wc_booking_has_person_types == 'yes') {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_has_person_types" id="_wc_booking_has_person_types" value="yes" checked="checked">
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_has_person_types" id="_wc_booking_has_person_types" value="no">
                  <?php
                }
                ?>  
            </p>

        </div>

        <div class="options_group" id="persons-types">

            <div class="toolbar">
                <h3><?php _e('Person types', 'woocommerce-bookings'); ?></h3>
                <span class="toolbar_links"><a href="#" class="close_all"><?php _e('Close all', 'woocommerce-bookings'); ?></a><a href="#" class="expand_all"><?php _e('Expand all', 'woocommerce-bookings'); ?></a></span>
            </div>

            <div class="woocommerce_bookable_persons wc-metaboxes">

                <?php
                        include( 'html-booking-person-page-first.php' );        
                ?>
            </div>

            <p class="toolbar">
                <button type="button" class="button button-primary add_person"><?php _e('Add Person Type', 'woocommerce-bookings'); ?></button>
            </p>
        </div>
</div>
            
        <!-------
            PERSON TAB END
        -------->  
        
            
        <!-------
            RESOURCE TAB START
        -------->
           
<div id="bookings_resources" class="woocommerce_options_panel panel wc-metaboxes-wrapper">
        <div class="options_group" id="resource_options">

            <p class="form-field _wc_booking_resouce_label_field ">
                <label for="_wc_booking_resouce_label">Label</label>
                <span class="woocommerce-help-tip"></span>
                <input type="text" class="short" style="" name="_wc_booking_resouce_label" id="_wc_booking_resouce_label" value="<?php // echo $_wc_booking_resouce_label; ?>" placeholder="Type"> 
            </p>
            
            <p class="form-field _wc_booking_resources_assignment_field ">
                <label for="_wc_booking_resources_assignment">Resources are...</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_resources_assignment" name="_wc_booking_resources_assignment" class="select short" style="">
                    <?php
                    if ($_wc_booking_resources_assignment == "customer") {
                        ?>
                        <option value="customer" selected="selected">Customer selected</option>
                        <option value="automatic">Automatically assigned</option>
                        <?php
                    } else {
                        ?>
                        <option value="customer">Customer selected</option>
                        <option value="automatic" selected="selected">Automatically assigned</option>
                        <?php
                    }
                    ?>
                </select>
            </p>
        </div>

        <div class="options_group">

            <div class="toolbar">
                <h3><?php _e('Resources', 'woocommerce-bookings'); ?></h3>
                <span class="toolbar_links"><a href="#" class="close_all"><?php _e('Close all', 'woocommerce-bookings'); ?></a><a href="#" class="expand_all"><?php _e('Expand all', 'woocommerce-bookings'); ?></a></span>
            </div>

            <div class="woocommerce_bookable_resources wc-metaboxes">

                <div id="message" class="inline woocommerce-message updated" style="margin: 1em 0;">
                    <p><?php _e('Resources are used if you have multiple bookable items, e.g. room types, instructors or ticket types. Availability for resources is global across all bookable products.', 'woocommerce-bookings'); ?></p>
                </div>

                <?php
                global $post, $wpdb;

                $all_resources = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID in (SELECT resource_id FROM `wp_wc_booking_relationships` )");
                
                if(!empty($product_id)){                    
                    $product_resources = $wpdb->get_col($wpdb->prepare("SELECT resource_id FROM {$wpdb->prefix}wc_booking_relationships WHERE product_id = '$product_id' ORDER BY sort_order;", $product_id));

                    $loop = 0;

                    if ($product_resources) {
                        $resource_base_costs = get_post_meta($product_id, '_resource_base_costs', true);
                        $resource_block_costs = get_post_meta($product_id, '_resource_block_costs', true);

                        foreach ($product_resources as $resource_id) {
                            $resource = get_post($resource_id);
                            $resource_base_cost = isset($resource_base_costs[$resource_id]) ? $resource_base_costs[$resource_id] : '';
                            $resource_block_cost = isset($resource_block_costs[$resource_id]) ? $resource_block_costs[$resource_id] : '';

                        //  include( 'html-booking-resource-page.php' );
                            include( 'html-booking-resource-page-first.php' );
                            
                            $loop++;
                        }
                    }
                }
                ?>
            </div>
            <p class="toolbar">
                <button type="button" class="button button-primary add_resource"><?php _e('Add/link Resource', 'woocommerce-bookings'); ?></button>
                <select name="add_resource_id" class="add_resource_id">
                    <option value=""><?php _e('New resource', 'woocommerce-bookings'); ?></option>
                    <?php
                    if ($all_resources) {
                        foreach ($all_resources as $resource) {
                            echo '<option value="' . esc_attr($resource->ID) . '">#' . $resource->ID . ' - ' . esc_html($resource->post_title) . '</option>';
                        }
                    }
                    ?>
                </select>
            </p>
        </div>        
</div> 
            
        <!-------
            RESOURCE TAB END
        -------->            
            
            
            
     
<?php

/******************************* 
****  ELSE CONDITION    *******
********************************/

    }else{  ?>
        
     <!------- 
        GENERAL TAB FIELD START
     ------->
        
<div id="general_tab" class="panel woocommerce_options_panel">
    <div class="options_group show_if_booking">        
           <?php            
            $duration_type = get_post_meta($product_id, '_wc_booking_duration_type', true);
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
                $max_duration = get_post_meta($product_id, '_wc_booking_max_duration', true);
                ?>
                <p class="form-field _wc_booking_max_duration_field ">
                    <label for="_wc_booking_max_duration">Maximum duration</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_max_duration" id="_wc_booking_max_duration" value="<?php echo $max_duration; ?>" placeholder="" min="" step="1"> 
                </p>
                <?php
                $range_picker = get_post_meta($product_id, '_wc_booking_enable_range_picker', true);
                ?>
                <div id="enable-range-picker">
                    <p class="form-field _wc_booking_enable_range_picker_field " style="display: block;">
                        <label for="_wc_booking_enable_range_picker">Enable Calendar Range Picker?</label>
                        <?php
                        if($range_picker == 'yes'){
                        ?>
                        <input type="checkbox" class="checkbox" style="" name="_wc_booking_enable_range_picker" id="_wc_booking_enable_range_picker" value="yes" checked="checked"> 
                        <?php
                        }
                        else {
                        ?>
                        <input type="checkbox" class="checkbox" style="" name="_wc_booking_enable_range_picker" id="_wc_booking_enable_range_picker" value="no"> 
                        <?php
                        }
                        ?>                    
                        <span class="description">Lets the user select a start and end date on the calendar - duration will be calculated automatically.</span>
                    </p>
                </div>
            </div>
            <?php
            $calendar_display_mode = get_post_meta($product_id, '_wc_booking_calendar_display_mode', true);
            ?>
            <p class="form-field _wc_booking_calendar_display_mode_field ">
                <label for="_wc_booking_calendar_display_mode">Calendar display mode</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_calendar_display_mode" name="_wc_booking_calendar_display_mode" class="select" style="">
                    <option value="always_visible" <?php selected($calendar_display_mode, 'always_visible'); ?>><?php _e('Calendar always visible', 'woocommerce-bookings'); ?></option>
                    <option value="" <?php selected($calendar_display_mode, ''); ?>><?php _e('Display calendar on click', 'woocommerce-bookings'); ?></option>
                </select> 
            </p>
            <?php
            $booking_requires_conformation = get_post_meta($product_id, '_wc_booking_requires_confirmation', true);
            ?>
            <p class="form-field _wc_booking_requires_confirmation_field ">
                <label for="_wc_booking_requires_confirmation">Requires confirmation?</label>
                <?php
                if ($booking_requires_conformation == "yes") {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="yes" checked="checked">
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="no">
                    <?php
                }
                ?>
                <span class="description">Check this box if the booking requires admin approval/confirmation. Payment will not be taken during checkout.</span>
            </p>
            <?php
            $booking_user_can_cancel = get_post_meta($product_id, '_wc_booking_user_can_cancel', true);
            ?>
            <p class="form-field _wc_booking_user_can_cancel_field ">
                <label for="_wc_booking_user_can_cancel">Can be cancelled?</label>
                <?php
                if ($booking_user_can_cancel == "yes") {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="yes" checked="checked"> 
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value=""> 
                    <?php
                }
                ?>
                <span class="description">Check this box if the booking can be cancelled by the customer after it has been purchased. A refund will not be sent automatically.</span>
            </p>
            <?php
            $cancel_limit = get_post_meta($product_id, '_wc_booking_cancel_limit', true);
            $cancel_limit_unit = get_post_meta($product_id, '_wc_booking_cancel_limit_unit', true);
            ?>
            <p class="form-field booking-cancel-limit">
                <label for="_wc_booking_cancel_limit"><?php _e('Booking can be cancelled until', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_cancel_limit" id="_wc_booking_cancel_limit" value="<?php echo $cancel_limit; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_cancel_limit_unit" id="_wc_booking_cancel_limit_unit" class="short" style="width: auto; margin-right: 7px;">
                    <option value="month" <?php selected($cancel_limit_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($cancel_limit_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($cancel_limit_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                    <option value="minute" <?php selected($cancel_limit_unit, 'minute'); ?>><?php _e('Minute(s)', 'woocommerce-bookings'); ?></option>
                </select>
                <span class="description"><?php _e('before the start date.', 'woocommerce-bookings'); ?></span>
            </p>

            <!--<input name="save" type="submit" class="" id="save_btn" value="Update">-->
    </div>

</div>

     <!------- 
        GENERAL TAB FIELD END
     ------->
        
        
    <!-------
        AVAILABILITY TAB MENU START 
    -------->

<div id="bookings_availability" class="panel woocommerce_options_panel">
        
        <div class="options_group">
            
            <h2>Set Availability of Product</h2>
            <p class="form-field _wc_booking_qty_field ">
                <label for="_wc_booking_qty">Max bookings per block</label>
                <span class="woocommerce-help-tip"></span>
                <input type="text" class="short" style="" name="_wc_booking_qty" id="_wc_booking_qty" value="<?php echo get_post_meta($product_id, '_wc_booking_qty', true) ?>" placeholder="" min="" step="1">
            </p>            
            <?php
            $min_date = absint(get_post_meta($product_id, '_wc_booking_min_date', true));
            $min_date_unit = get_post_meta($product_id, '_wc_booking_min_date_unit', true);
            ?>
            <p class="form-field">
                <label for="_wc_booking_min_date"><?php _e('Minimum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_min_date" id="_wc_booking_min_date" value="<?php echo $min_date; ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_min_date_unit" id="_wc_booking_min_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php selected($min_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php selected($min_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($min_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($min_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>
            <?php
            $max_date = get_post_meta($product_id, '_wc_booking_max_date', true);
            if ($max_date == '')
                $max_date = 12;
            $max_date = max(absint($max_date), 1);
            $max_date_unit = get_post_meta($product_id, '_wc_booking_max_date_unit', true);
            ?>
            <p class="form-field">
                <label for="_wc_booking_max_date"><?php _e('Maximum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_max_date" id="_wc_booking_max_date" value="<?php echo $max_date; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_max_date_unit" id="_wc_booking_max_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php selected($max_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php selected($max_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($max_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($max_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>

            <?php
            $buffer_period = get_post_meta($product_id, '_wc_booking_buffer_period', true);
            ?>
            <p class="form-field _wc_booking_buffer_period" id="_wc_booking_buffer_period">
                <label for="_wc_booking_buffer_period"><?php _e('Require a buffer period of', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_buffer_period" id="_wc_booking_buffer_period" value="<?php echo esc_attr($buffer_period); ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <span class='_wc_booking_buffer_period_unit'></span>
                <?php _e('between bookings', 'woocommerce-bookings'); ?>
            </p>
            <?php
            $default_date_availability = get_post_meta($product_id, '_wc_booking_default_date_availability', true);
            ?>
            <p class="form-field _wc_booking_default_date_availability_field ">
                <label for="_wc_booking_default_date_availability">All dates are...</label>
                <select id="_wc_booking_default_date_availability" name="_wc_booking_default_date_availability" class="select short" style="">
                    <option value="available" <?php selected($default_date_availability,'available'); ?>><?php _e('available by default', 'woocommerce-bookings'); ?></option>
                    <option value="non-available" <?php selected($default_date_availability,'non-available'); ?>><?php _e('not-available by default', 'woocommerce-bookings'); ?></option>                   
                </select> 
                <span class="description">This option affects how you use the rules below.</span>
            </p>
            <?php
            $check_availability_against = get_post_meta($product_id, '_wc_booking_check_availability_against', true);
            ?>
            <p class="form-field _wc_booking_check_availability_against_field ">
                <label for="_wc_booking_check_availability_against">Check rules against...</label>
                <select id="_wc_booking_check_availability_against" name="_wc_booking_check_availability_against" class="select short" style="">
                    <option value="" <?php selected($check_availability_against,''); ?>><?php _e('All blocks being booked', 'woocommerce-bookings'); ?></option>
                    <option value="start" <?php selected($check_availability_against,'start'); ?>><?php _e('The starting block only', 'woocommerce-bookings'); ?></option>                   
                </select>
                <span class="description">This option affects how bookings are checked for availability.</span>
            </p>
            <?php
            $wc_booking_first_block_time = get_post_meta($product_id, '_wc_booking_duration_unit', true);
            ?>
                <p class="form-field _wc_booking_first_block_time_field">
                    <label for="_wc_booking_first_block_time"><?php _e('First block starts at...', 'woocommerce-bookings'); ?></label>
                    <input type="time" name="_wc_booking_first_block_time" id="_wc_booking_first_block_time" value="<?php echo get_post_meta($product_id, '_wc_booking_first_block_time', true); ?>" placeholder="HH:MM" />
                </p>
                <?php
            ?>
        </div>
        <div class="options_group">
            <div class="table_grid">
                <table class="widefat">
                    <thead>
                        <tr>
                            <th class="sort" width="1%">&nbsp;</th>
                            <th><?php _e('Range type', 'woocommerce-bookings'); ?></th>
                            <th><?php _e('Range', 'woocommerce-bookings'); ?></th>
                            <th></th>
                            <th></th>
                            <th><?php _e('Bookable', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('If not bookable, users won\'t be able to choose this block for their booking.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th><?php _e('Priority', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php esc_html_e('The lower the priority number, the earlier this rule gets applied. By default, global rules take priority over product rules which take priority over resource rules. By using priority numbers you can execute rules in different orders.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th class="remove" width="1%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="6">
                                <a href="#" class="add_row add_range_button" data-row="<?php
                                ob_start();
                                include( 'html-booking-availability-fields.php' );
                                $html = ob_get_clean();
                                echo esc_attr($html);
                                ?>"><?php _e('Add Range', 'woocommerce-bookings'); ?></a>
                                <span class="description"><?php _e('Rules with lower numbers will execute first. Rules further down this table with the same priority will also execute first.', 'woocommerce-bookings'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody id="availability_rows">
                        <?php
                        $values = get_post_meta($product_id, '_wc_booking_availability', true);
                        if (!empty($values) && is_array($values)) {
                            foreach ($values as $availability) {
                                include( 'html-booking-availability-fields.php' );                        
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div> 
        <!-------
            AVAILABILITY TAB MENU END 
        -------->
            
            
        <!-------
            COST TAB MENU START 
        -------->
        
<div id="bookings_pricing" class="panel woocommerce_options_panel">
    
	<div class="options_group">
            <?php
                $_wc_booking_cost = get_post_meta($product_id, '_wc_booking_cost', true);
            ?>
            <p class="form-field _wc_booking_cost_field ">
                    <label for="_wc_booking_cost">Base cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_cost" id="_wc_booking_cost" value="<?php echo $_wc_booking_cost; ?>" placeholder="" min="" step="0.01">
            </p>
            <?php
                $_wc_booking_base_cost = get_post_meta($product_id, '_wc_booking_base_cost', true);
            ?>
            <p class="form-field _wc_booking_base_cost_field ">
                    <label for="_wc_booking_base_cost">Block cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_booking_base_cost" id="_wc_booking_base_cost" value="<?php echo $_wc_booking_base_cost; ?>" placeholder="" min="" step="0.01"> 
            </p>
            <?php
                $_wc_display_cost = get_post_meta($product_id, '_wc_display_cost', true);
            ?>
            <p class="form-field _wc_display_cost_field ">
                    <label for="_wc_display_cost">Display cost</label>
                    <span class="woocommerce-help-tip"></span>
                    <input type="number" class="short" style="" name="_wc_display_cost" id="_wc_display_cost" value="<?php echo $_wc_display_cost; ?>" placeholder="" min="" step="0.01"> 
            </p>
	</div>
        <div class="options_group">
            <div class="table_grid">
                <table class="widefat">
                    <thead>
                        <tr>
                            <th class="sort" width="1%">&nbsp;</th>
                            <th><?php _e('Range type', 'woocommerce-bookings'); ?></th>
                            <th><?php _e('Range', 'woocommerce-bookings'); ?></th>
                            <th></th>
                            <th></th>
                            <th><?php _e('Base cost', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('Enter a cost for this rule. Applied to the booking as a whole.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th><?php _e('Block cost', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('Enter a cost for this rule. Applied to each booking block.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th class="remove" width="1%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="9">
                                <a href="#" class="button button-primary add_row" data-row="<?php
                                ob_start();
                                include( 'html-booking-pricing-fields.php' );
                                $html = ob_get_clean();
                                echo esc_attr($html);
                                ?>"><?php _e('Add Range', 'woocommerce-bookings'); ?></a>
                                <span class="description"><?php _e('All matching rules will be applied to the booking.', 'woocommerce-bookings'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody id="pricing_rows">
                        <?php
                        $values = get_post_meta($product_id, '_wc_booking_pricing', true);                        
                        
                        if (!empty($values) && is_array($values)) {
                            foreach ($values as $pricing) {
                                include( 'html-booking-pricing-fields.php' );
                                do_action('woocommerce_bookings_pricing_fields', $pricing);
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php 
            do_action('woocommerce_bookings_after_bookings_pricing', $product_id); ?>

        </div>
</div>    
        
            
        <!-------
            COST TAB MENU END
        -------->    
            
         <!-------
            PERSON TAB START
        -------->       
         
        <div id="bookings_persons" class="woocommerce_options_panel panel wc-metaboxes-wrapper">
        <?php $my_product_name = get_the_title($product_id); ?>
        <div class="options_group" id="persons-options">

            <?php
            $_wc_booking_min_persons_group = get_post_meta($product_id, '_wc_booking_min_persons_group', true);
            ?>
            <h2>Set person of Product<?php   // echo $my_product_name; ?></h2>
            <p class="form-field _wc_booking_min_persons_group_field ">
                <label for="_wc_booking_min_persons_group">Min persons</label>
                <span class="woocommerce-help-tip"></span>
                <input type="number" class="short" style="" name="_wc_booking_min_persons_group" id="_wc_booking_min_persons_group" value="<?php echo $_wc_booking_min_persons_group; ?>" placeholder="" min="1" step="1"> 
            </p>
            <?php
            $_wc_booking_max_persons_group = get_post_meta($product_id, '_wc_booking_max_persons_group', true);
            ?>
            <p class="form-field _wc_booking_max_persons_group_field ">
                <label for="_wc_booking_max_persons_group">Max persons</label>
                <span class="woocommerce-help-tip"></span>
                <input type="number" class="short" style="" name="_wc_booking_max_persons_group" id="_wc_booking_max_persons_group" value="<?php echo $_wc_booking_max_persons_group; ?>" placeholder="" min="1" step="1"> 
            </p>
            <?php
            $_wc_booking_person_cost_multiplier = get_post_meta($product_id, '_wc_booking_person_cost_multiplier', true);
            ?>
            <p class="form-field _wc_booking_person_cost_multiplier_field ">
                <label for="_wc_booking_person_cost_multiplier">Multiply all costs by person count</label>
                <span class="woocommerce-help-tip"></span>
                <?php
                if ($_wc_booking_person_cost_multiplier == 'yes') {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_cost_multiplier" id="_wc_booking_person_cost_multiplier" value="yes" checked="checked"> 
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_cost_multiplier" id="_wc_booking_person_cost_multiplier" value="no">
                    <?php
                }
                ?>
            </p>
            <?php
            $_wc_booking_person_qty_multiplier = get_post_meta($product_id, '_wc_booking_person_qty_multiplier', true);
            ?>
            <p class="form-field _wc_booking_person_qty_multiplier_field ">
                <label for="_wc_booking_person_qty_multiplier">Count persons as bookings</label>
                <span class="woocommerce-help-tip"></span>
                <?php
                if ($_wc_booking_person_qty_multiplier == 'yes') {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_qty_multiplier" id="_wc_booking_person_qty_multiplier" value="yes" checked="checked"> 
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_person_qty_multiplier" id="_wc_booking_person_qty_multiplier" value="no"> 
                    <?php
                }
                ?>
            </p>
            <?php
            $_wc_booking_has_person_types = get_post_meta($product_id, '_wc_booking_has_person_types', true);
            ?>
            <p class="form-field _wc_booking_has_person_types_field ">
                <label for="_wc_booking_has_person_types">Enable person types</label>
                <span class="woocommerce-help-tip"></span>
                <?php
                if ($_wc_booking_has_person_types == 'yes') {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_has_person_types" id="_wc_booking_has_person_types" value="yes" checked="checked">
                    <?php
                } else {
                    ?>
                    <input type="checkbox" class="checkbox" style="" name="_wc_booking_has_person_types" id="_wc_booking_has_person_types" value="no">
                  <?php
                }
                ?>  
            </p>

        </div>

        <div class="options_group" id="persons-types">

            <div class="toolbar">
                <h3><?php _e('Person types', 'woocommerce-bookings'); ?></h3>
                <span class="toolbar_links"><a href="#" class="close_all"><?php _e('Close all', 'woocommerce-bookings'); ?></a><a href="#" class="expand_all"><?php _e('Expand all', 'woocommerce-bookings'); ?></a></span>
            </div>

            <div class="woocommerce_bookable_persons wc-metaboxes">

                <?php
                if(!empty($product_id)){
//                $person_types = get_posts(array(
//                    'post_type' => 'bookable_person',
//                    'post_status' => 'publish',
//                    'post_parent' => $product_id
//                ));
                    $person_args = array(
                        'post_type' => 'bookable_person',
                        'post_status' => 'publish',
                        'post_parent' => $product_id
                    );
                    $person_types = get_children($person_args);               
                }
                if (sizeof($person_types) == 0) {
                    echo '<div id="message" class="inline woocommerce-message" style="margin: 1em 0;">';
                    echo '<div class="squeezer">';
                    echo '<h4>' . __('Person types allow you to offer different booking costs for different types of individuals, for example, adults and children.', 'woocommerce-bookings') . '</h4>';
                    echo '</div>';
                    echo '</div>';
                }

                if ($person_types) {
                    $loop = 0;

                    foreach ($person_types as $person_type) {
                        $person_type_id = absint($person_type->ID);
                        include( 'html-booking-person-page-second.php' );
                        $loop++;
                    }
                }
                ?>
            </div>

            <p class="toolbar">
                <button type="button" class="button button-primary add_person"><?php _e('Add Person Type', 'woocommerce-bookings'); ?></button>
            </p>
        </div>
</div>
        <!-------
            PERSON TAB END
        -------->           
            
        <!-------
            RESOURCE TAB START
        -------->
           
<div id="bookings_resources" class="woocommerce_options_panel panel wc-metaboxes-wrapper">
        <div class="options_group" id="resource_options">
            <?php
            $_wc_booking_resouce_label = get_post_meta($product_id, '_wc_booking_resouce_label', true);
            ?>

            <p class="form-field _wc_booking_resouce_label_field ">
                <label for="_wc_booking_resouce_label">Label</label>
                <span class="woocommerce-help-tip"></span>
                <input type="text" class="short" style="" name="_wc_booking_resouce_label" id="_wc_booking_resouce_label" value="<?php echo $_wc_booking_resouce_label; ?>" placeholder="Type"> 
            </p>
            <?php
            $_wc_booking_resources_assignment = get_post_meta($product_id, '_wc_booking_resources_assignment', true);
            ?>
            <p class="form-field _wc_booking_resources_assignment_field ">
                <label for="_wc_booking_resources_assignment">Resources are...</label>
                <span class="woocommerce-help-tip"></span>
                <select id="_wc_booking_resources_assignment" name="_wc_booking_resources_assignment" class="select short" style="">
                    <?php
                    if ($_wc_booking_resources_assignment == "customer") {
                        ?>
                        <option value="customer" selected="selected">Customer selected</option>
                        <option value="automatic">Automatically assigned</option>
                        <?php
                    } else {
                        ?>
                        <option value="customer">Customer selected</option>
                        <option value="automatic" selected="selected">Automatically assigned</option>
                        <?php
                    }
                    ?>
                </select>
            </p>
        </div>

        <div class="options_group">

            <div class="toolbar">
                <h3><?php _e('Resources', 'woocommerce-bookings'); ?></h3>
                <span class="toolbar_links"><a href="#" class="close_all"><?php _e('Close all', 'woocommerce-bookings'); ?></a><a href="#" class="expand_all"><?php _e('Expand all', 'woocommerce-bookings'); ?></a></span>
            </div>

            <div class="woocommerce_bookable_resources wc-metaboxes">

                <div id="message" class="inline woocommerce-message updated" style="margin: 1em 0;">
                    <p><?php _e('Resources are used if you have multiple bookable items, e.g. room types, instructors or ticket types. Availability for resources is global across all bookable products.', 'woocommerce-bookings'); ?></p>
                </div>

                <?php
                global $post, $wpdb;

                $all_resources = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID in (SELECT resource_id FROM `wp_wc_booking_relationships` )");
                
                if(!empty($product_id)){                    
                    $product_resources = $wpdb->get_col($wpdb->prepare("SELECT resource_id FROM {$wpdb->prefix}wc_booking_relationships WHERE product_id = '$product_id' ORDER BY sort_order;", $product_id));

                    $loop = 0;

                    if ($product_resources) {
                        $resource_base_costs = get_post_meta($product_id, '_resource_base_costs', true);
                        $resource_block_costs = get_post_meta($product_id, '_resource_block_costs', true);

                        foreach ($product_resources as $resource_id) {
                            $resource = get_post($resource_id);
                            $resource_base_cost = isset($resource_base_costs[$resource_id]) ? $resource_base_costs[$resource_id] : '';
                            $resource_block_cost = isset($resource_block_costs[$resource_id]) ? $resource_block_costs[$resource_id] : '';

                        //  include( 'html-booking-resource-page.php' );
                            include( 'html-booking-resource-page-second.php' );
                            

                            $loop++;
                        }
                    }
                }
                ?>
            </div>

            <p class="toolbar">
                <button type="button" class="button button-primary add_resource"><?php _e('Add/link Resource', 'woocommerce-bookings'); ?></button>
                <select name="add_resource_id" class="add_resource_id">
                    <option value=""><?php _e('New resource', 'woocommerce-bookings'); ?></option>
                    <?php
                    if ($all_resources) {
                        foreach ($all_resources as $resource) {
                            echo '<option value="' . esc_attr($resource->ID) . '">#' . $resource->ID . ' - ' . esc_html($resource->post_title) . '</option>';
                        }
                    }
                    ?>
                </select>
            </p>
        </div>        
</div> 
            
        <!-------
            RESOURCE TAB END
        -------->
            
            
            
            
        
        <?php 
        
    }

?>

    </div>
</div> 


<div class="amenities">
        <h2 class="hndle ui-sortable-handle"><span>Product Information</span></h2>
        <div class="the-space">
        <div class="col-md-3">
            <span class="det-tit">The space</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                  <?php if($mata_data['accommodates'] != '') { ?> <li><label>Accommodates:</label><span class="bold"><?php echo $mata_data['accommodates']; ?></span></li> <?php } ?>
                  <?php if($mata_data['bathrooms'] != '') { ?> <li><label>Bathrooms:</label><span class="bold"><?php echo $mata_data['bathrooms']; ?></span></li> <?php } ?>
                  <?php if($mata_data['bedrooms'] != '') { ?> <li><label>Bedrooms:</label><span class="bold"><?php echo $mata_data['bedrooms']; ?></span></li> <?php } ?>
                  <?php if($mata_data['beds'] != '') { ?> <li><label>Beds:</label><span class="bold"><?php echo $mata_data['beds']; ?></span></li> <?php } ?>
                  </ul>
                </div>
                <div class="col-md-6">
                 <ul>   
                 <?php if($mata_data['check-in'] != '') { ?> <li><label>Check In:</label><span class="bold"><?php echo $mata_data['check-in']; ?></span></li> <?php } ?>
                 <?php if($mata_data['check-out'] != '') { ?> <li><label>Check Out:</label><span class="bold"><?php echo $mata_data['check-out']; ?></span></li> <?php } ?>
                 <?php if($mata_data['pet-owner'] != '') { ?> <li><label>Pet Owner:</label><span class="bold"><?php echo $mata_data['pet-owner']; ?></span></li> <?php } ?>
                 <?php if($mata_data['property-type'] != '') { ?> <li><label>Property type:</label><span class="bold"><?php echo $mata_data['property-type']; ?></span></li> <?php } ?>
                 <?php if($mata_data['room-type'] != '') { ?> <li><label>Room type:</label><span class="bold"><?php echo $mata_data['room-type']; ?></span></li> <?php } ?>
                </ul>
                </div>
            </div>
            <div class="row">
                <a class="btn-house" href="#">House Rules</a>
            </div>
        </div>
        <div class="clearfix"></div>  
    </div>    
        <div>
            
        </div>
</div>






<script>
    jQuery(document).ready(function(){
    
            jQuery("#general_tab").show();
            jQuery("#bookings_availability").hide();
            jQuery("#bookings_pricing").hide();
            jQuery("#bookings_persons").hide();
            jQuery('#bookings_resources').hide();
            jQuery('li .person_front').hide();
            jQuery('li .resource_front').hide();
        
        
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
   




