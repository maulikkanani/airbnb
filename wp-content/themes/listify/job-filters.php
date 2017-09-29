<?php
/**
 * Search filters for the archive.
 *
 * @see https://github.com/Automattic/WP-Job-Manager/blob/master/templates/job-filters.php
 *
 * @since 1.8.0
 */

wp_enqueue_script( 'wp-job-manager-ajax-filters' );

global $listify_job_manager;

$filters = Listify_WP_Job_Manager_Template_Filters::get_filters( 'archive', $atts );

if ( empty( $filters ) ) {
	return;
}
?>

<?php do_action( 'job_manager_job_filters_before', $atts ); ?>

<form class="job_filters">
	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>

	<div class="search_jobs">
		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>
		
		<?php foreach ( $filters as $key => $filter ) : ?>
			<?php echo $filter; ?>
		<?php endforeach; ?>

		<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
	</div>

	<?php do_action( 'job_manager_job_filters_end', $atts ); ?>
</form>

<?php do_action( 'job_manager_job_filters_after', $atts ); ?>

<noscript><?php _e( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'wp-job-manager' ); ?></noscript>
