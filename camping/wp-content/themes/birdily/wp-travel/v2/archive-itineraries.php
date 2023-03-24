<?php 
/**
 * Itinerary Archive Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/archive-itineraries.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     wp-travel/Templates
 * @since       1.0.0
 */

get_header( 'itinerary' );

$sanitized_get  = WP_Travel::get_sanitize_request( 'get', true );
$view_mode      = wptravel_get_archive_view_mode( $sanitized_get );

$col_per_row = '';
if ( 'grid' === $view_mode ) {
	$col_per_row = apply_filters( 'wp_travel_archive_itineraries_col_per_row', '3' );
	if ( is_active_sidebar( 'wp-travel-archive-sidebar' ) ) {
		$col_per_row = apply_filters( 'wp_travel_archive_itineraries_col_per_row', '2' );
	}
}

do_action( 'wp_travel_before_main_content' ); ?>
<?php if ( have_posts() ) :
	if ( 'grid' === $view_mode ) {
		echo '<div class="wp-travel-itinerary-items">
				<ul class="wp-travel-itinerary-list itinerary-' . esc_attr( $col_per_row ) . '-per-row grid-view">';
	}
	while ( have_posts() ) : the_post();
		wptravel_get_template_part( 'content', 'archive-itineraries' );
	endwhile; // end of the loop.
	if ( 'grid' === $view_mode ) :
		echo '</div>
				</ul>';
	endif;
	else :
		wptravel_get_template_part( 'content', 'archive-itineraries-none' );
endif;

do_action( 'wp_travel_after_main_content' );
do_action( 'wp_travel_archive_listing_sidebar' );
get_footer( 'itinerary' );

?>
