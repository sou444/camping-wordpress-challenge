<?php
/**
 * Itinerary Archive Contnet Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/content-archive-itineraries.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     WP_Travel
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$trip_id = get_the_ID();
do_action( 'wp_travel_before_archive_itinerary', $trip_id );
if ( post_password_required() ) {
	echo get_the_password_form(); //phpcs:ignore
	return;
}
global $wp_travel_itinerary;

$enable_sale = WP_Travel_Helpers_Trips::is_sale_enabled( array( 'trip_id' => $trip_id ) );
$group_size  = wptravel_get_group_size( $trip_id );
$start_date  = get_post_meta( $trip_id, 'wp_travel_start_date', true );
$end_date    = get_post_meta( $trip_id, 'wp_travel_end_date', true );

$args                             = $args_regular = array( 'trip_id' => $trip_id ); // phpcs:ignore
$args_regular['is_regular_price'] = true;
$trip_price                       = WP_Travel_Helpers_Pricings::get_price( $args );
$regular_price                    = WP_Travel_Helpers_Pricings::get_price( $args_regular );

$locations     = get_the_terms( $trip_id, 'travel_locations' );
$location_name = '';
$location_link = '';
if ( $locations && is_array( $locations ) ) {
	$first_location = array_shift( $locations );
	$location_name  = $first_location->name;
	$location_link  = get_term_link( $first_location->term_id, 'travel_locations' );
}
?>
	<!-- Contents Here -->
	<div class="view-box">
		<div class="view-image">
			<a href="<?php the_permalink(); ?>" class="image-thumb">
				<div class="image-overlay"></div>
				<?php echo wptravel_get_post_thumbnail( $trip_id ); ?>
			</a>
			<div class="offer">
				<span>#<?php echo esc_html( $wp_travel_itinerary->get_trip_code() ); ?></span>
			</div>
		</div>

		<div class="view-content">
			<div class="left-content">
				<header>
					<?php do_action( 'wp_travel_before_archive_content_title', $trip_id ); ?>
					<h2 class="entry-title">
						<a class="heading-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => __( 'Permalink to: ', 'wp-travel' ) ) ); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php do_action( 'wp_travel_after_archive_title', $trip_id ); ?>
				</header>
				<div class="trip-icons">
					<?php wptravel_get_trip_duration( $trip_id ); ?>
					<div class="trip-location">
						<i class="fas fa-map-marker-alt"></i>
						<span>
							<?php if ( $location_name ) : ?>
								<a href="<?php echo esc_url( $location_link ); ?>" ><?php echo esc_html( $location_name ); ?></a>
								<?php
							else :
								esc_html_e( 'N/A', 'wp-travel' );
							endif;
							?>
						</span>
					</div>
					<div class="group-size">
						<i class="fas fa-users"></i>
						<span><?php echo esc_html( wptravel_get_group_size( $trip_id ) ); ?></span>
					</div>
				</div>
				<div class="trip-desc">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<div class="right-content">
				<div class="footer-wrapper">
					<div class="trip-price">
						<?php wptravel_save_offer( $trip_id ); ?>
						<?php if ( $trip_price > 0 ) : ?>
							<span class="price-here">
								<?php echo wptravel_get_formated_price_currency( $trip_price ); //phpcs:ignore ?>
							</span>
						<?php endif; ?>
						<?php if ( $enable_sale ) : ?>
							<del><?php echo wptravel_get_formated_price_currency( $regular_price, true ); //phpcs:ignore ?></del>
						<?php endif; ?>

					</div>
					<div class="trip-rating">
						<?php if ( wptravel_tab_show_in_menu( 'reviews' ) ) : ?>
							<div class="wp-travel-average-review">
								<?php wptravel_trip_rating( $trip_id ); ?>
								<?php $count = (int) wptravel_get_review_count(); ?>
							</div>
							<span class="wp-travel-review-text"> (<?php printf( _n( '%d Review', '%d Reviews', $count, 'wp-travel' ), $count ); ?>)</span>
						<?php endif; ?>
					</div>
				</div>

				<a class="wp-block-button__link explore-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Explore', 'wp-travel' ); ?></span></a>
			</div>
		</div>
	</div>

<?php
do_action( 'wp_travel_after_archive_itinerary', $trip_id );
