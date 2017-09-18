<form method="post" id="job_preview" action="<?php echo esc_url( $form->get_action() ); ?>">
    <div class="job_listing_preview_title">
        <input type="submit" name="continue" id="job_preview_submit_button" class="button job-manager-button-submit-listing" value="<?php echo apply_filters( 'submit_job_step_preview_submit_text', __( 'Submit Listing', 'wp-job-manager' ) ); ?>" />
        <input type="submit" name="edit_job" class="button job-manager-button-edit-listing" value="<?php _e( 'Edit listing', 'wp-job-manager' ); ?>" />
        <h2><?php _e( 'Preview', 'wp-job-manager' ); ?></h2>
    </div>
    <div class="job_listing_preview single_job_listing">
        <h1><?php the_title(); ?></h1>
        
        <?php get_job_manager_template_part( 'content-single', 'job_listing' ); ?>

        <input type="hidden" name="job_id" value="<?php echo esc_attr( $form->get_job_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo $_POST['product_id']; ?>" />
        <input type="hidden" name="step" value="<?php echo esc_attr( $form->get_step() ); ?>" />
        <input type="hidden" name="job_manager_form" value="<?php echo $form->get_form_name(); ?>" />
        
        <!--General Tab-->
        <?php // echo "<pre>";print_r($_POST);echo "</pre>"; die('test'); ?>
        <input type="hidden" name="_wc_booking_duration_type" value="<?php echo $_POST['_wc_booking_duration_type']; ?>" />
        <input type="hidden" name="_wc_booking_duration" value="<?php echo $_POST['_wc_booking_duration']; ?>" />
        <input type="hidden" name="_wc_booking_duration_unit" value="<?php echo $_POST['_wc_booking_duration_unit']; ?>" />
        <input type="hidden" name="_wc_booking_min_duration" value="<?php echo $_POST['_wc_booking_min_duration']; ?>" />
        <input type="hidden" name="_wc_booking_max_duration" value="<?php echo $_POST['_wc_booking_max_duration']; ?>" />
        <input type="hidden" name="_wc_booking_enable_range_picker" value="<?php echo $_POST['_wc_booking_enable_range_picker']; ?>" />
        <input type="hidden" name="_wc_booking_requires_confirmation" value="<?php echo $_POST['_wc_booking_requires_confirmation']; ?>" />
        <input type="hidden" name="_wc_booking_user_can_cancel" value="<?php echo $_POST['_wc_booking_user_can_cancel']; ?>" />
        <input type="hidden" name="_wc_booking_cancel_limit" value="<?php echo $_POST['_wc_booking_cancel_limit']; ?>" />
        <input type="hidden" name="_wc_booking_cancel_limit_unit" value="<?php echo $_POST['_wc_booking_cancel_limit_unit']; ?>" />
        <input type="hidden" name="_wc_booking_calendar_display_mode" value="<?php echo $_POST['_wc_booking_calendar_display_mode']; ?>" />
        
        <!--Availability-->
        
        <input type="hidden" name="_wc_booking_qty" value="<?php echo $_POST['_wc_booking_qty']; ?>" />
        <input type="hidden" name="_wc_booking_min_date" value="<?php echo $_POST['_wc_booking_min_date']; ?>" />
        <input type="hidden" name="_wc_booking_min_date_unit" value="<?php echo $_POST['_wc_booking_min_date_unit']; ?>" />
        <input type="hidden" name="_wc_booking_max_date" value="<?php echo $_POST['_wc_booking_max_date']; ?>" />
        <input type="hidden" name="_wc_booking_max_date_unit" value="<?php echo $_POST['_wc_booking_max_date_unit']; ?>" />
        <input type="hidden" name="_wc_booking_buffer_period" value="<?php echo $_POST['_wc_booking_buffer_period']; ?>" />
        <input type="hidden" name="_wc_booking_default_date_availability" value="<?php echo $_POST['_wc_booking_default_date_availability']; ?>" />
        <input type="hidden" name="_wc_booking_check_availability_against" value="<?php echo $_POST['_wc_booking_check_availability_against']; ?>" />
        <input type="hidden" name="_wc_booking_first_block_time" value="<?php echo $_POST['_wc_booking_first_block_time']; ?>" />
        
        <!--Cost-->
        
        <input type="hidden" name="_wc_booking_cost" value="<?php echo $_POST['_wc_booking_cost']; ?>" />
        <input type="hidden" name="_wc_booking_base_cost" value="<?php echo $_POST['_wc_booking_base_cost']; ?>" />
        <input type="hidden" name="_wc_display_cost" value="<?php echo $_POST['_wc_display_cost']; ?>" />
        
       <!--persons-->
       
        <input type="hidden" name="_wc_booking_min_persons_group" value="<?php echo $_POST['_wc_booking_min_persons_group']; ?>" />
        <input type="hidden" name="_wc_booking_max_persons_group" value="<?php echo $_POST['_wc_booking_max_persons_group']; ?>" />
        <input type="hidden" name="_wc_booking_person_cost_multiplier" value="<?php echo $_POST['_wc_booking_person_cost_multiplier']; ?>" />
        <input type="hidden" name="_wc_booking_person_qty_multiplier" value="<?php echo $_POST['_wc_booking_person_qty_multiplier']; ?>" />
        <input type="hidden" name="_wc_booking_has_person_types" value="<?php echo $_POST['_wc_booking_has_person_types']; ?>" />
        <?php 
            foreach($_POST['person_id'] as $value){ 
                echo "<input type='hidden' name='person_id[]' value='".$value."' />";
            }
            foreach($_POST['person_menu_order'] as $value){ 
                echo "<input type='hidden' name='person_menu_order[]' value='".$value."' />";
            }
            foreach($_POST['person_name'] as $value){ 
                echo "<input type='hidden' name='person_name[]' value='".$value."' />";
            }
            foreach($_POST['person_cost'] as $value){ 
                echo "<input type='hidden' name='person_cost[]' value='".$value."' />";
            }
            foreach($_POST['person_block_cost'] as $value){ 
                echo "<input type='hidden' name='person_block_cost[]' value='".$value."' />";
            }
            foreach($_POST['person_description'] as $value){ 
                echo "<input type='hidden' name='person_description[]' value='".$value."' />";
            }
            foreach($_POST['person_min'] as $value){ 
                echo "<input type='hidden' name='person_min[]' value='".$value."' />";
            }
            foreach($_POST['person_max'] as $value){ 
                echo "<input type='hidden' name='person_max[]' value='".$value."' />";
            }
            foreach($availability['type'] as $key => $type_avail){
                echo "<option value='".$type_avail."'); ?></option>";
                echo 'option :'.$type_avail;
            }
            
    /****  Start Availability to get value on preview page *****/
            
    $availability_array = array();
    $row_size = isset($_POST["wc_booking_availability_type"]) ? sizeof($_POST["wc_booking_availability_type"]) : 0;
    for ($i = 0; $i < $row_size; $i ++) {
        $availability_array[$i]['type'] = $_POST['wc_booking_availability_type'][$i];

        $availability_array[$i]['bookable'] = wc_clean($_POST["wc_booking_availability_bookable"][$i]);
        $availability_array[$i]['priority'] = intval($_POST['wc_booking_availability_priority'][$i]);

        switch ($availability_array[$i]['type']) {
            case 'custom' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_date"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_date"][$i]);
                break;
            case 'months' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_month"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_month"][$i]);
                break;
            case 'weeks' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_week"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_week"][$i]);
                break;
            case 'days' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_day_of_week"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_day_of_week"][$i]);
                break;
            case 'time' :
            case 'time:1' :
            case 'time:2' :
            case 'time:3' :
            case 'time:4' :
            case 'time:5' :
            case 'time:6' :
            case 'time:7' :
                $availability_array[$i]['from'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_from_time"][$i]);
                $availability_array[$i]['to'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_to_time"][$i]);
                break;
            case 'time:range' :
                $availability_array[$i]['from'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_from_time"][$i]);
                $availability_array[$i]['to'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_to_time"][$i]);

                $availability_array[$i]['from_date'] = wc_clean($_POST['wc_booking_availability_from_date'][$i]);
                $availability_array[$i]['to_date'] = wc_clean($_POST['wc_booking_availability_to_date'][$i]);
                break;
        }
    }
    
    ?>
      <input type="hidden" name="_wc_booking_availability"  value="<?php echo htmlspecialchars(serialize($availability_array)); ?>">
      
        
    <!--  End Availability to get value on preview page -->
    <?php 

    
/*****************
 *  new cost range 
 * ***************/    
    
    $pricing = array();
		$row_size  =    isset( $_POST[ "wc_booking_pricing_type" ] ) ? sizeof( $_POST[ "wc_booking_pricing_type" ] ) : 0;
		for ( $i = 0; $i < $row_size; $i ++ ) {
			$pricing[ $i ]['type']          = wc_clean( $_POST[ "wc_booking_pricing_type" ][ $i ] );
			$pricing[ $i ]['cost']          = wc_clean( $_POST[ "wc_booking_pricing_cost" ][ $i ] );
			$pricing[ $i ]['modifier']      = wc_clean( $_POST[ "wc_booking_pricing_cost_modifier" ][ $i ] );
			$pricing[ $i ]['base_cost']     = wc_clean( $_POST[ "wc_booking_pricing_base_cost" ][ $i ] );
			$pricing[ $i ]['base_modifier'] = wc_clean( $_POST[ "wc_booking_pricing_base_cost_modifier" ][ $i ] );

			switch ( $pricing[ $i ]['type'] ) {
				case 'custom' :
					$pricing[ $i ]['from'] = wc_clean( $_POST[ "wc_booking_pricing_from_date" ][ $i ] );
					$pricing[ $i ]['to']   = wc_clean( $_POST[ "wc_booking_pricing_to_date" ][ $i ] );
				break;
				case 'months' :
					$pricing[ $i ]['from'] = wc_clean( $_POST[ "wc_booking_pricing_from_month" ][ $i ] );
					$pricing[ $i ]['to']   = wc_clean( $_POST[ "wc_booking_pricing_to_month" ][ $i ] );
				break;
				case 'weeks' :
					$pricing[ $i ]['from'] = wc_clean( $_POST[ "wc_booking_pricing_from_week" ][ $i ] );
					$pricing[ $i ]['to']   = wc_clean( $_POST[ "wc_booking_pricing_to_week" ][ $i ] );
				break;
				case 'days' :
					$pricing[ $i ]['from'] = wc_clean( $_POST[ "wc_booking_pricing_from_day_of_week" ][ $i ] );
					$pricing[ $i ]['to']   = wc_clean( $_POST[ "wc_booking_pricing_to_day_of_week" ][ $i ] );
				break;
				case 'time' :
				case 'time:1' :
				case 'time:2' :
				case 'time:3' :
				case 'time:4' :
				case 'time:5' :
				case 'time:6' :
				case 'time:7' :
					$pricing[ $i ]['from'] = wc_booking_sanitize_time( $_POST[ "wc_booking_pricing_from_time" ][ $i ] );
					$pricing[ $i ]['to']   = wc_booking_sanitize_time( $_POST[ "wc_booking_pricing_to_time" ][ $i ] );
				break;
				case 'time:range' :
					$pricing[ $i ]['from'] = wc_booking_sanitize_time( $_POST[ "wc_booking_pricing_from_time" ][ $i ] );
					$pricing[ $i ]['to']   = wc_booking_sanitize_time( $_POST[ "wc_booking_pricing_to_time" ][ $i ] );

					$pricing[ $i ]['from_date'] = wc_clean( $_POST[ 'wc_booking_pricing_from_date' ][ $i ] );
					$pricing[ $i ]['to_date']   = wc_clean( $_POST[ 'wc_booking_pricing_to_date' ][ $i ] );
				break;
				default :
					$pricing[ $i ]['from'] = wc_clean( $_POST[ "wc_booking_pricing_from" ][ $i ] );
					$pricing[ $i ]['to']   = wc_clean( $_POST[ "wc_booking_pricing_to" ][ $i ] );
				break;
			}

			if ( $pricing[ $i ]['cost'] > 0 ) {
				$has_additional_costs = true;
			}
		}

        ?>
        
        <input type="hidden" name="_wc_booking_pricing"  value="<?php echo htmlspecialchars(serialize($pricing)); ?>">      
        
        <?php     
        
        foreach($_POST['resource_id'] as $value){ 
                echo "<input type='hidden' name='resource_id[]' value='".$value."' />";
        }
        
        foreach($_POST['resource_cost'] as $value){ 
                echo "<input type='hidden' name='resource_cost[]' value='".$value."' />";
        }
        foreach($_POST['resource_block_cost'] as $value){ 
                echo "<input type='hidden' name='resource_block_cost[]' value='".$value."' />";
        }
        ?>
        <input type="hidden" name="_wc_booking_resouce_label"  value="<?php echo $_POST['_wc_booking_resouce_label']; ?>">      
        <input type="hidden" name="_wc_booking_resources_assignment"  value="<?php echo $_POST['_wc_booking_resources_assignment']; ?>">      
        <?php
        foreach ($_POST[''] as $value){
            
        }
        
        
        
        
            echo '<pre>';
                print_r($_POST);
            echo '</pre>'; 
            
        ?>
        
        
    </div>
</form>


