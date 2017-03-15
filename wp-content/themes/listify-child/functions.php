<?php
/**
 * Listify child theme.
 */
function listify_child_styles() {
    wp_enqueue_style( 'listify-child', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'listify_child_styles', 999 );

/** Place any new code below this line */

/* Add New Product Tab in Product Details page */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['host_tab'] = array(
		'title' 	=> __( 'The Host', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_host'
	);
        
        $tabs['location_tab'] = array(
		'title' 	=> __( 'Location', 'woocommerce' ),
		'priority' 	=> 60,
		'callback' 	=> 'woo_new_product_tab_location'
	);

	return $tabs;

}
function woo_new_product_tab_host() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
function woo_new_product_tab_location() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
/* End New Product Tab in Product Details page */

/**
 * Customize Description tab to display in product details page
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
	global $post;
              $post_id = $post->ID;
     $mata_data = get_post_meta( $post_id, 'product_meta_data',true);   
     if ( !is_array($mata_data) ){
	$mata_data = array();
    }
?>
<div class="main-amenities">
    <div class="col-md-3">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.png" alt="" />
        <span><?php echo $mata_data['room-type'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Guests.png" alt="" />
        <span><?php echo $mata_data['guests'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bed.png" alt="" />
        <span><?php echo $mata_data['bedrooms'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/room.png" alt="" />
        <span><?php echo $mata_data['beds'];    ?></span>
    </div>
    <div class="clearfix"></div>  
</div>
<div class="listing-information"><?php the_content(); ?></div>
<button class="btn-link host-btn btn-link--bold" type="button"><span data-reactid="19">Contact host</span></button>
<div class="product-long-details">
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
                <a href="#house_rules">House Rules</a>
            </div>
        </div>
    </div>
<div class="clearfix"></div>  
</div>
<?php
}
/**
 * EndCustomize Description tab to display in product details page
 */



/**
	 * Add Meta box in Boat post
	 *
	 * @since  1.0.0
	 */
function product_post_add_metabox() {
    add_meta_box(
    'boat-meta-fieldx',
    __( 'Product Information', 'rightboat' ),
   'add_product_metaboxes',
    'product',
    'normal',
    'default'               
    );
}
add_action( 'add_meta_boxes', 'product_post_add_metabox' );

function add_product_metaboxes() {
     global $post;
              $post_id = $post->ID;
              $custom_box = get_post_meta( $post_id, 'product_meta_data',true);
			  
              if ( !is_array($custom_box) ){
				$custom_box = array();
			  }
    include_once 'product-meta-field.php';
}
function product_post_save_metabox_data(){
    global $post;
		
		if($post != null){
			$post_id =  $post->ID;
		}
    $post_type = get_post_type($post_id);
	if($post != null){
            $post_id =  $post->ID;
	}
    if ( "product" != $post_type ) return;    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}   
    
    update_post_meta( $post_id, 'product_meta_data',$_POST['list_data'] );            
}
add_action( 'save_post', 'product_post_save_metabox_data', 10, 3 );