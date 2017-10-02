<?php
/*
Plugin Name: front-end bookable listing bkp
Description: Add product from frontend using listing form
Version: 1.0
Author: Mahen
Author URI: 
License: GPLv2 or later
Text Domain: Mahen
*/


function bookable_form(){
    include( 'main.php' );
}
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

function displaymenu(){
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
}
add_action('single_job_listing_start','displaymenu');

if(isset($_POST['product_id'])){
    if(!empty($_POST['product_id'])){
        add_action('job_manager_update_job_data','display_product_data',90);
    }
}

/******
 *  Display Product Name listing and added listing name in post as product name 
 ******/

function display_product_data($job_id,$value='') {
    global $wpdb;
    $person_ids = $_POST['person_id'];
    $product_id='';
    
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
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
              'ping_status' => 'closed',

          );

        $product_id = wp_insert_post($product);

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



function display_job() {
  global $post;

  $product_name = get_post_meta( $post->ID, '_job_title', true );
  $product_description = get_post_meta( $post->ID, '_job_description', true );
  
  if ( $product_name ) {
    echo '<li>' . __( 'Product_name : ' ) .  esc_html( $product_name ) . '</li>';
    
  }
}
add_action( 'single_job_listing_meta_start', 'display_job' );



