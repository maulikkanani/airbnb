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

function add_login_logout_register_menu( $items, $args ) {
 if ( $args->theme_location != 'primary' ) {
 return $items;
 }
 
 if ( is_user_logged_in() ) {
 $items .= '<li><a href="' . wp_logout_url(home_url()) . '">' . __( 'Log Out' ) . '</a></li>';
 } else {
 $items .= '<li><a href="' . wp_login_url(home_url()) . '">' . __( 'Log In' ) . '</a></li>';
 $items .= '<li><a href="' . wp_registration_url() . '">' . __( 'Sign Up' ) . '</a></li>';
 }
 
 return $items;
}
 
add_filter( 'wp_nav_menu_items', 'add_login_logout_register_menu', 199, 2 );
