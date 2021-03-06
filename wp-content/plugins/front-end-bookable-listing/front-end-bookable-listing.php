<?php
/*
Plugin Name: front-end bookable listing
Description: Add product from frontend using listing form
Version: 1.0
Author: Mahen
Author URI: 
License: GPLv2 or later
Text Domain: Mahen
*/

function bookable_form(){
    include( 'main.php' );
    include( 'product-meta-field.php' );
?>
    
<?php }
add_action('submit_job_form_job_fields_end','bookable_form');

/******
 *  Added cdd file and js file for plugin.
 ******/

function wpse_enqueue_js_css(){
    global $post, $wp_scripts;
    
    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

    wp_enqueue_style('wc_bookings_admin_styles', WC_BOOKINGS_PLUGIN_URL . '/assets/css/admin.css', null, WC_BOOKINGS_VERSION);

    if (version_compare(WOOCOMMERCE_VERSION, '2.1', '<')) {
        $jquery_version = isset($wp_scripts->registered['jquery-ui-core']->ver) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';

        wp_enqueue_style('woocommerce_admin_styles', WC()->plugin_url() . '/assets/css/admin.css', null, WC_VERSION);
    }
    
    wp_register_script('wc_bookings_writepanel_js', plugin_dir_url( __FILE__) . 'assets/js/availability-page.js', array('jquery'), '', true);
    wp_enqueue_script('wc_bookings_writepanel_js');
    
    wp_enqueue_style('admin-style', plugin_dir_url( __FILE__) . "assets/css/admin.css");
    $params = array(
        'i18n_remove_person' => esc_js(__('Are you sure you want to remove this person type?', 'woocommerce-bookings')),
        'nonce_delete_person' => wp_create_nonce('delete-bookable-person'),
        'nonce_add_person' => wp_create_nonce('add-bookable-person'),
        'i18n_remove_resource' => esc_js(__('Are you sure you want to remove this resource?', 'woocommerce-bookings')),
        'nonce_delete_resource' => wp_create_nonce('delete-bookable-resource'),
        'nonce_add_resource' => wp_create_nonce('add-bookable-resource'),
        'i18n_minutes' => esc_js(__('minutes', 'woocommerce-bookings')),
        'i18n_hours' => esc_js(__('hours', 'woocommerce-bookings')),
        'i18n_days' => esc_js(__('days', 'woocommerce-bookings')),
        'i18n_new_resource_name' => esc_js(__('Enter a name for the new resource', 'woocommerce-bookings')),
        'post' => isset($post->ID) ? $post->ID : '',
        'plugin_url' => WC()->plugin_url(),
        'ajax_url' => admin_url('admin-ajax.php'),
    );

    wp_localize_script('wc_bookings_writepanel_js', 'wc_bookings_writepanel_js_params', $params);
    ?>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php
    

    
}
add_action('wp_footer', 'wpse_enqueue_js_css');


/******** 
    Display menu in single listing page
********/

function displaymenu($product_id){
    ?>
    <div class="listing-nav">
        <ul>
            <li><a href="#listify_widget_panel_listing_content-1">Overview</a></li>
            <li><a href="#comments">Reviews</a></li>
            <li><a href="#wcpv_vendor_widget-2">The Host</a></li>
            <li><a href="#location">Location</a></li>
      </ul>
        <br/>
        <hr>
    </div>
    
    <?php 
        
//Get product id using current job list
        $id = get_the_ID();
        $products_id_amenities=get_post_meta($id,'_products',true);        
        $current_post_product = $products_id_amenities[0];
//create a new post meta for ammenities   
        $custom_boxs = get_post_meta( $current_post_product , 'product_meta_data', true );
// unserialize the data         
        $unserialize_data = maybe_unserialize($custom_boxs);
        
    ?>
<!--Display ammnenities on the product listing page if it is available-->     

    <aside id="listify_widget_panel_listing_tags-2" class="widget widget-job_listing listify_widget_panel_listing_tags">
        <h2 class="widget-title widget-title-job_listing ">Amenities</h2>
        <div class="job_listing_tag-list listing-ammenities ">
            <ul>
                <?php if($unserialize_data['elevator'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/elevator.png" alt="" /><strong>Elevator in building</strong></li> <?php } ?>
                <?php if($unserialize_data['wheelchair'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wheelchair.png" alt="" /><strong>Wheelchair accessible</strong></li> <?php } ?>
                <?php if($unserialize_data['internet'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/internet.png" alt="" /><strong>Internet</strong></li> <?php } ?>
                <?php if($unserialize_data['dryer'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hair-dryer.png" alt="" /><strong>Dryer</strong></li> <?php } ?>
                <?php if($unserialize_data['wireless'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wifi.png" alt="" /><strong>Wireless Internet</strong></li> <?php } ?>
                <?php if($unserialize_data['tv'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tv.png" alt="" /><strong>TV</strong></li> <?php } ?>
                <?php if($unserialize_data['free_parking'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/parked-car.png" alt="" /><strong>Free parking</strong></li> <?php } ?>
                <?php if($unserialize_data['cigarette'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cigarette.png" alt="" /><strong>Smoking Allowed</strong></li> <?php } ?>
                <?php if($unserialize_data['kitchen'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kitchen.png" alt="" /><strong>kitchen</strong></li> <?php } ?>
                <?php if($unserialize_data['air-conditioner'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/air-conditioner.png" alt="" /><strong>kitchen</strong></li> <?php } ?>
            </ul>
        </div>
    </aside>
    
    <?php 
}
add_action('single_job_listing_start','displaymenu',439);






if(isset($_POST['product_id'])){
    if(!empty($_POST['product_id'])){
        add_action('job_manager_update_job_data','display_product_data',90);
    }
}

/******
 *  Display Product Name listing and added listing name in post as product name 
 ******/

function display_product_data($job_id,$value='') {
   
//    echo $return_data;
    global $wpdb;

    $person_ids = $_POST['person_id'];
    
   // echo 'person_id'.$person_ids;
    $product_id='';
    
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";
    
    echo '<pre>'; 
        $_POST['list_data'];
    echo '</pre>'; 
    
//    die('test');
    $title =  get_the_title($job_id);
    $product_name = get_post_meta( $job_id, '_job_title', true );
    $product_description = get_post_meta( $job_id, '_job_description', true );
    
    
//    $person = $persons['person_id'][0];
    
    if(empty($_POST['product_id'])){        
        $product = array(
              'post_title' => $product_name,
              'post_content' => $product_description,
              'post_type' => 'product',
              'post_status' => 'publish',
              'ping_status' => 'closed'
          );
        $product_id = wp_insert_post($product);
    
    // to add guide files value in  format of " http://localhost/airbnb/?post_type=product&#038;p=317 "    
        $site_url = home_url('?post_type=product&#038;p='.$product_id);
        $post_guid= $wpdb->prefix . 'posts';
        $wpdb->query("UPDATE $post_guid SET guid='$site_url' WHERE id='$product_id'");

   // Added Term taxonomy of vender for product in "wp_term_taxonomy"  Table
        echo $vendor_id = $_COOKIE[ 'wcpv_vendor_id_' . COOKIEHASH ];
        $wpdb->query("insert into wp_term_relationships (object_id,term_taxonomy_id,term_order) values($product_id, $vendor_id, 0 )");
        
    // Added Product in listing.    
        array_push($product, $product_id);        
        
    }else{
       $product_id=(int)$_POST['product_id'] ;
    }
    
    
    update_post_meta( $job_id,'_products',array($product_id));
   
    //set product type
    wp_set_object_terms($product_id, 'booking', 'product_type');
    
    
    
    /****** Postmeta for general tab start ******/      
    
    update_post_meta($product_id, '_virtual', 'yes');
    
    if(isset($_POST['_wc_booking_duration_type']))
    {
       // echo $_POST['data'];
        $wc_booking_duration_type = $_POST['_wc_booking_duration_type'] ;
        update_post_meta($product_id,'_wc_booking_duration_type',$wc_booking_duration_type);
    }

    if(isset($_POST['_wc_booking_duration']))
    {
        $wc_booking_duration = $_POST['_wc_booking_duration'];
        update_post_meta($product_id,'_wc_booking_duration',$wc_booking_duration);
    }
    if(isset($_POST['_wc_booking_duration_unit'])){
        $wc_booking_duration_unit = $_POST['_wc_booking_duration_unit'];
        update_post_meta($product_id,'_wc_booking_duration_unit',$wc_booking_duration_unit);
    }
    if(isset($_POST['_wc_booking_min_duration']))
    {
        $wc_booking_min_duration = $_POST['_wc_booking_min_duration'];
        update_post_meta($product_id, '_wc_booking_min_duration', $wc_booking_min_duration);
    }

    if(isset($_POST['_wc_booking_max_duration']))
    {
        $wc_booking_max_duration = $_POST['_wc_booking_max_duration'];
        update_post_meta($product_id, '_wc_booking_max_duration', $wc_booking_max_duration);
    }
    if(isset($_POST['_wc_booking_enable_range_picker'])){
        $wc_booking_enable_range_picker = $_POST['_wc_booking_enable_range_picker'];
        update_post_meta($product_id,'_wc_booking_enable_range_picker',$wc_booking_enable_range_picker);
    }else{
        update_post_meta($product_id, '_wc_booking_enable_range_picker', 'no');
    }

    $wc_booking_calendar_display_mode = $_POST['_wc_booking_calendar_display_mode'];
    update_post_meta($product_id, '_wc_booking_calendar_display_mode', $wc_booking_calendar_display_mode);

    if (isset($_POST['_wc_booking_requires_confirmation'])) {
        $wc_booking_requires_confirmation = $_POST['_wc_booking_requires_confirmation'];
        update_post_meta($product_id, '_wc_booking_requires_confirmation', $wc_booking_requires_confirmation);
    }else {
        update_post_meta($product_id, '_wc_booking_requires_confirmation', 'no');
    }
     if(isset($_POST['_wc_booking_user_can_cancel']))
    {
        $wc_booking_user_can_cancel = $_POST['_wc_booking_user_can_cancel'];
        update_post_meta($product_id, '_wc_booking_user_can_cancel', $wc_booking_user_can_cancel);    
    }
    else {
        update_post_meta($product_id, '_wc_booking_user_can_cancel', 'no');    
    }
    if (isset($_POST['_wc_booking_cancel_limit'])) {
        $wc_booking_cancel_limit = $_POST['_wc_booking_cancel_limit'];
        update_post_meta($product_id, '_wc_booking_cancel_limit', $wc_booking_cancel_limit);
    }
    if (isset($_POST['_wc_booking_cancel_limit_unit'])) {
        $wc_booking_cancel_limit_unit = $_POST['_wc_booking_cancel_limit_unit'];
        update_post_meta($product_id, '_wc_booking_cancel_limit_unit', $wc_booking_cancel_limit_unit);
    }

    /****** 
     * Postmeta for general tab end 
     * ******/  
    
    /****** 
     * Postmeta for avaiabilty tab  start 
     * *****/        
        
    if (isset($_POST['_wc_booking_qty'])) {
    $booking_qty = $_POST['_wc_booking_qty'];
    update_post_meta($product_id, '_wc_booking_qty', $booking_qty);
    }
    if (isset($_POST['_wc_booking_min_date'])) {
        $book_min_date = $_POST['_wc_booking_min_date'];
        update_post_meta($product_id, '_wc_booking_min_date', $book_min_date);
    }
    if (isset($_POST['_wc_booking_min_date_unit'])) {
        $book_min_date_unit = $_POST['_wc_booking_min_date_unit'];
        update_post_meta($product_id, '_wc_booking_min_date_unit', $book_min_date_unit);
    }
    if (isset($_POST['_wc_booking_max_date'])) {
        $book_max_date = $_POST['_wc_booking_max_date'];
        update_post_meta($product_id, '_wc_booking_max_date', $book_max_date);
    }
    if (isset($_POST['_wc_booking_max_date_unit'])) {
        $book_max_date_unit = $_POST['_wc_booking_max_date_unit'];
        update_post_meta($product_id, '_wc_booking_max_date_unit', $book_max_date_unit);
    }
    if (isset($_POST['_wc_booking_buffer_period'])) {
        $book_buffer_period = $_POST['_wc_booking_buffer_period'];
        update_post_meta($product_id, '_wc_booking_buffer_period', $book_buffer_period);
    }
    if (isset($_POST['_wc_booking_default_date_availability'])) {
        $default_date_avail = $_POST['_wc_booking_default_date_availability'];
        update_post_meta($product_id, '_wc_booking_default_date_availability', $default_date_avail);
    }
    if (isset($_POST['_wc_booking_check_availability_against'])) {
        $book_check_availability_against = $_POST['_wc_booking_check_availability_against'];
        update_post_meta($product_id, '_wc_booking_check_availability_against', $book_check_availability_against);
    }
    if (isset($_POST['_wc_booking_first_block_time'])) {
        $book_first_block_time = $_POST['_wc_booking_first_block_time'];
        update_post_meta($product_id, '_wc_booking_first_block_time', $book_first_block_time);
    }
    
    /****** 
        Add Range in Availability
    ******/
    if(empty($_POST['product_id'])){
        if(isset($_POST['_wc_booking_availability'])){

            $_wc_booking_availability = $_POST['_wc_booking_availability'];

            add_post_meta($product_id, '_wc_booking_availability', $_wc_booking_availability,TRUE);

            $postmeta = $wpdb->prefix . 'postmeta';
            $wpdb->query("update $postmeta set meta_value='$_wc_booking_availability' where meta_key = '_wc_booking_availability' And post_id= '$product_id' ");

            //update_post_meta($product_id, '_wc_booking_availability',$_wc_booking_availability );        
        }
    }else{ 
        
        //execute when update listing.
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
        $_wc_booking_availability=serialize($availability_array);
        //echo "ser:". $_wc_booking_availability;
        
        add_post_meta($product_id, '_wc_booking_availability', $_wc_booking_availability);
        $postmeta = $wpdb->prefix . 'postmeta';
        $wpdb->query("update $postmeta set meta_value='$_wc_booking_availability' where meta_key = '_wc_booking_availability' And post_id=".$product_id);
    }
    
    /****** 
     * Postmeta for avaiabilty tab end 
     * *****/        
    
    
    /****** 
     * Postmeta for Cost tab Start 
     * *****/     
    
    if(empty($_POST['product_id'])){
            if(isset($_POST['_wc_booking_cost'])){
                    $wc_booking_cost = $_POST['_wc_booking_cost'];
                    update_post_meta($product_id,'_wc_booking_cost',$wc_booking_cost);
                }
                if(isset($_POST['_wc_booking_base_cost'])){
                    $wc_booking_base_cost = $_POST['_wc_booking_base_cost'];
                    update_post_meta($product_id,'_wc_booking_base_cost',$wc_booking_base_cost);
                }
                if(isset($_POST['_wc_display_cost'])){
                    $wc_display_cost = $_POST['_wc_display_cost'];
                    update_post_meta($product_id,'_wc_display_cost',$wc_display_cost);
                }
        
            if(isset($_POST['_wc_booking_pricing'])){
                    $_wc_booking_pricing = $_POST['_wc_booking_pricing'];
                    add_post_meta($product_id,'_wc_booking_pricing', $_wc_booking_pricing,TRUE);

                    $posmeta = $wpdb->prefix.'postmeta';
                    $wpdb->query("update $posmeta set meta_value='$_wc_booking_pricing' where meta_key='_wc_booking_pricing' And post_id='$product_id' ");
                    //update_post_meta( $product_id, '_wc_booking_pricing', $_wc_booking_pricing );    
                }
        } else {
        if(isset($_POST['_wc_booking_cost'])){
                    $wc_booking_cost = $_POST['_wc_booking_cost'];
                    update_post_meta($product_id,'_wc_booking_cost',$wc_booking_cost);
                }
                if(isset($_POST['_wc_booking_base_cost'])){
                    $wc_booking_base_cost = $_POST['_wc_booking_base_cost'];
                    update_post_meta($product_id,'_wc_booking_base_cost',$wc_booking_base_cost);
                }
                if(isset($_POST['_wc_display_cost'])){
                    $wc_display_cost = $_POST['_wc_display_cost'];
                    update_post_meta($product_id,'_wc_display_cost',$wc_display_cost);
                }
        
            if(isset($_POST['_wc_booking_pricing'])){
                    $_wc_booking_pricing = $_POST['_wc_booking_pricing'];
                    add_post_meta($product_id,'_wc_booking_pricing', $_wc_booking_pricing,TRUE);

                    $posmeta = $wpdb->prefix.'postmeta';
                    $wpdb->query("update $posmeta set meta_value='$_wc_booking_pricing' where meta_key='_wc_booking_pricing' And post_id='$product_id' ");
                    //update_post_meta( $product_id, '_wc_booking_pricing', $_wc_booking_pricing );    
                }
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
                
                $_wc_booking_pricing = serialize($pricing);
                add_post_meta($product_id,'_wc_booking_pricing', $_wc_booking_pricing,TRUE);

                $posmeta = $wpdb->prefix.'postmeta';
                $wpdb->query("update $posmeta set meta_value='$_wc_booking_pricing' where meta_key='_wc_booking_pricing' And post_id='$product_id' ");
    }
             
   
    /****** 
     * Postmeta for Cost tab End 
     * *****/       
    
    
    /****** 
     * Postmeta for Person tab Start 
     * *****/         
    
   // update_post_meta($product_id, '_wc_booking_has_persons', 'yes');
    
    
    if(isset($_POST['has_person'])){
        $_wc_booking_has_persons = $_POST['has_person'];
        update_post_meta($product_id, '_wc_booking_has_persons', $_wc_booking_has_persons);
    }else{
        update_post_meta($product_id,'_wc_booking_has_persons', 'no');
    }
    
   if (isset($_POST['_wc_booking_min_persons_group'])) {
        $_wc_booking_min_persons_group = $_POST['_wc_booking_min_persons_group'];
        update_post_meta($product_id, '_wc_booking_min_persons_group', $_wc_booking_min_persons_group);
    }
    if (isset($_POST['_wc_booking_max_persons_group'])) {
        $_wc_booking_max_persons_group = $_POST['_wc_booking_max_persons_group'];
        update_post_meta($product_id, '_wc_booking_max_persons_group', $_wc_booking_max_persons_group);
    }       
    
    if (isset($_POST['_wc_booking_person_cost_multiplier']) && !empty($_POST['_wc_booking_person_cost_multiplier'])) {
        $_wc_booking_person_cost_multiplier = $_POST['_wc_booking_person_cost_multiplier'];
        update_post_meta($product_id, '_wc_booking_person_cost_multiplier', $_wc_booking_person_cost_multiplier);
    }else{
        update_post_meta($product_id, '_wc_booking_person_cost_multiplier', 'no');
    }
    if (isset($_POST['_wc_booking_person_qty_multiplier']) && !empty($_POST['_wc_booking_person_qty_multiplier'])) {
        $_wc_booking_person_qty_multiplier = $_POST['_wc_booking_person_qty_multiplier'];
        update_post_meta($product_id, '_wc_booking_person_qty_multiplier', $_wc_booking_person_qty_multiplier);
    }else{
        update_post_meta($product_id, '_wc_booking_person_qty_multiplier', 'no');
    }
    if (isset($_POST['_wc_booking_has_person_types']) && !empty($_POST['_wc_booking_has_person_types'])) {
        $_wc_booking_has_person_types = $_POST['_wc_booking_has_person_types'];
        update_post_meta($product_id, '_wc_booking_has_person_types', $_wc_booking_has_person_types);        
    }else{
        update_post_meta($product_id, '_wc_booking_has_person_types', 'no');
    }
    
    /****** 
        Add person type 
    ******/
    if (isset($_POST['person_id'])) {
        $person_ids = $_POST['person_id'];
        $person_menu_order = $_POST['person_menu_order'];
        $person_name = $_POST['person_name'];
        $person_cost = $_POST['person_cost'];
        $person_block_cost = $_POST['person_block_cost'];
        $person_description = $_POST['person_description'];
        $person_min = $_POST['person_min'];
        $person_max = $_POST['person_max'];

        $max_loop = max(array_keys($_POST['person_id']));

        for ($i = 0; $i <= $max_loop; $i ++) {
            if (!isset($person_ids[$i])) {
                continue;
            }

            $person_id = absint($person_ids[$i]);

            if (empty($person_name[$i])) {
                $person_name[$i] = sprintf(__('Person Type #%d', 'woocommerce-bookings'), ( $i + 1));
            }

            $wpdb->update(
                    $wpdb->posts, array(
                'post_title' => stripslashes($person_name[$i]),
                'post_excerpt' => stripslashes($person_description[$i]),
                'post_parent' => $product_id,
                'menu_order' => $person_menu_order[$i]), 
                array(
                    'ID' => $person_id
                    ), 
                array(
                    '%s',
                    '%s',
                    '%d'
                    ), 
                array('%d')
            );
            update_post_meta($person_id, 'cost', wc_clean($person_cost[$i]));
            update_post_meta($person_id, 'block_cost', wc_clean($person_block_cost[$i]));
            update_post_meta($person_id, 'min', wc_clean($person_min[$i]));
            update_post_meta($person_id, 'max', wc_clean($person_max[$i]));

            if ($person_cost[$i] > 0 || $person_block_cost[$i] > 0) {
                $has_additional_costs = true;
            }
        }
    }
    /****** 
     * Postmeta for Person tab End 
     * *****/   

    /******
     *  Postmeta for Resources tab Start 
     * *****/
    
    //update_post_meta($product_id, '_wc_booking_has_resources', 'yes');
   
    if(isset($_POST['has_resource'])){
        $_wc_booking_has_persons = $_POST['has_resource'];
        update_post_meta($product_id, '_wc_booking_has_resources', $_wc_booking_has_persons);
    }else{
        update_post_meta($product_id,'_wc_booking_has_resources', 'no');
    }
    
    if (isset($_POST['_wc_booking_resouce_label'])) {
        $_wc_booking_resouce_label = $_POST['_wc_booking_resouce_label'];
        update_post_meta($product_id, '_wc_booking_resouce_label', $_wc_booking_resouce_label);
    }
    if (isset($_POST['_wc_booking_resources_assignment'])) {
        $_wc_booking_resources_assignment = $_POST['_wc_booking_resources_assignment'];
        update_post_meta($product_id, '_wc_booking_resources_assignment', $_wc_booking_resources_assignment);
    }
    
    if (isset($_POST['resource_id'])) {
        $resource_ids = $_POST['resource_id'];
//        $resource_menu_order = $_POST['resource_menu_order'];
        $resource_base_cost = $_POST['resource_cost'];
        $resource_block_cost = $_POST['resource_block_cost'];
        
        $max_loop = max(array_keys($_POST['resource_id']));
//        $resource_base_costs = array();
//        $resource_block_costs = array();

        for ($i = 0; $i <= $max_loop; $i ++) {
            if (!isset($resource_ids[$i])) {
                continue;
            }

            $resource_id = absint($resource_ids[$i]);
            $get_resource_id = $wpdb->get_var(" select ID from wp_wc_booking_relationships where  resource_id=' $resource_id ' and  product_id =0 ORDER BY ID DESC ");
            
           $wpdb->query("UPDATE wp_wc_booking_relationships SET product_id='$product_id' WHERE ID='$get_resource_id' and product_id=0 "); 
            $resource_base_costs[$resource_id] = wc_clean($resource_base_cost[$i]);
            $resource_block_costs[$resource_id] = wc_clean($resource_block_cost[$i]);

        }
        update_post_meta($product_id, '_resource_base_costs', $resource_base_costs);
        update_post_meta($product_id, '_resource_block_costs', $resource_block_costs);
        
    }
    
    
    /****** 
     * Postmeta for Resources tab End 
     * *****/
    
    /* Amenities */ 
    
    if(empty($_POST['product_id'])){
        if(isset($_POST['product_meta_data'])){
            add_post_meta( $product_id, 'product_meta_data',$_POST['product_meta_data'] );     
        }
    }else{
        $update_ammenities = $_POST['list_data'];
        update_post_meta( $product_id, 'product_meta_data', $update_ammenities);
    }
    
}
//add_action( 'single_job_listing_meta_after', 'display_product_data' );
add_action( 'job_manager_job_submitted', 'display_product_data' );


function remove_bookable_person_meta() {
		check_ajax_referer( 'delete-bookable-person', 'security' );
		$person_type_id = intval( $_POST['person_id'] );
		$person_type    = get_post( $person_type_id );

		if ( $person_type && 'bookable_person' == $person_type->post_type ) {
			delete_metadata( $person_type_id );
		}
		die();
	}
add_action( 'wp_ajax_woocommerce_remove_bookable_person',  'remove_bookable_person_meta' );

//function display_job() {
//  global $post;
//
//  $product_name = get_post_meta( $post->ID, '_job_title', true );
//  $product_description = get_post_meta( $post->ID, '_job_description', true );
//  
//  if ( $product_name ) {
//    echo '<li>' . __( 'Product_name : ' ) .  esc_html( $product_name ) . '</li>';
//  }
//}
//add_action( 'single_job_listing_meta_start', 'display_job' );

function display_Vender_order(){?>
<p style="font-weight: 600;font-size: 17px;padding: 0;margin: 0 0 5px;">Cutomer's order</p>
    <?php
    
    if ( WC_Product_Vendors_Utils::is_vendor()) {
        
       $order=new WC_Product_Vendors_Bookings();
       $order->render_bookings_dashboard_widget();
  }
}
add_action('woocommerce_account_content','display_Vender_order');
