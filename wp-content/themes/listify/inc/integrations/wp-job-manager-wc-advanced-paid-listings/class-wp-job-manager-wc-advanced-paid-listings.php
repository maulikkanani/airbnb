<?php
/**
 * WooCommerce
 */

class Listify_WP_Job_Manager_JWAPL extends Listify_Integration {

	public function __construct() {
		$this->includes = array();
		$this->integration = 'wp-job-manager-wc-advanced-paid-listings';

		parent::__construct();
	}

	public function setup_actions() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		add_filter( 'woocommerce_product_add_to_cart_url', array( $this, 'add_to_cart_url' ), 10, 2 );
		add_action( 'wp_footer', array( $this, 'package_selection' ) );
	}

	public function widgets_init() {
		// to avoid duplicating the entire pricing table widget
		include_once( get_template_directory() . '/inc/integrations/wp-job-manager-wc-paid-listings/widgets/class-widget-pricing-table.php' );
		include_once( Listify_Integration::get_dir() . 'widgets/class-widget-pricing-table.php' );

		register_widget( 'Listify_Widget_JWAPL_Pricing_Table' );
	}

	public function add_to_cart_url( $url, $product ) {
		if ( ! ( is_page_template( 'page-templates/template-plans-pricing.php' ) || listify_is_widgetized_page() ) ) {
			return $url;
		}

		if ( ! in_array( $product->product_type, array( 'subscription', 'job_package', 'job_package_subscription' ) ) ) {
			return $url;
		}

		if ( '' == ( $submit = job_manager_get_permalink( 'submit_job_form' ) ) ) {
			return $url;
		}

		$url = add_query_arg( 'selected_package', $product->id, $submit );

		return esc_url( $url );
	}

	public function package_selection() {
		if ( ! isset( $_GET[ 'selected_package' ] ) ) {
			return;
		}

		$package = absint( $_GET[ 'selected_package' ] );

		echo '<input type="hidden" id="listify_selected_package" value="' . $package . '" />';
	}

}

$GLOBALS[ 'listify_job_manager_wc_advanced_paid_listings' ] = new Listify_WP_Job_Manager_JWAPL();
