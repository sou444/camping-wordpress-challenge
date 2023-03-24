<?php
/**
 * Itinerary Shortcode Contnet Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/shortcode/itinerary-item.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     wp-travel/Templates
 * @since       1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

$enable_sale 	= get_post_meta( get_the_ID(), 'wp_travel_enable_sale', true );
?>
<li>
<div class="wp-travel-post-item-wrapper">
    <div class="wp-travel-post-wrap-bg">
		
		<div class="wp-travel-post-thumbnail">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail( 'birdily-thumb-tour'); ?>
			</a>
			<?php wptravel_save_offer( get_the_ID() ); ?>
		</div>
		<div class="wp-travel-post-info clearfix">
			<?php wptravel_get_trip_duration( get_the_ID() ); ?>
			<h4 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array('before' => 'Permanent Link to ') ); ?>"><?php the_title(); ?></a></h4>
			<div class="travel-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="recent-post-bottom-meta">
				<a href="<?php the_permalink() ?>" class="sc_button sc_button_default sc_button_size_small sc_button_icon_left sc_button_hover_slide_left">
					<span class="sc_button_text">
						<span class="sc_button_title">get details</span>
					</span>
				</a>
				<?php wptravel_trip_price( get_the_ID(), true ); ?>
			</div>
		</div>
		
		
	<?php if ( $enable_sale ) : ?>
		<div class="wp-travel-offer">
			<span><?php esc_html_e( 'Offer', 'birdily' ); ?></span>
		</div>
	<?php endif; ?>

	</div>
</div>
</li>
