<?php
/**
 * Itinerary Item List Shortcode Contnet Template
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
$group_size 	= wptravel_get_group_size( get_the_ID() );
$start_date 	= get_post_meta( get_the_ID(), 'wp_travel_start_date', true );
$end_date 		= get_post_meta( get_the_ID(), 'wp_travel_end_date', true );
?>
<article class="wp-travel-default-article">
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
                <?php echo apply_filters('the_content', get_post(get_the_ID())->post_excerpt ); ?>
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
        <div class="wp-travel-post-content">
            <div class="post-category">
                <div class="entry-meta">

                    <?php if ( wptravel_tab_show_in_menu( 'reviews' ) ) : ?>
                        <?php $average_rating = wptravel_get_average_rating() ?>
                        <div class="wp-travel-average-review" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'birdily' ), $average_rating ); ?>">
                            
                            <span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
                                <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average_rating ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'birdily' ), '<span itemprop="bestRating">', '</span>' ); ?>
                            </span>                     
                        </div>
                        <?php $count = (int) wptravel_get_review_count() ?>
                        <span class="wp-travel-review-text"> (<?php printf( esc_html( _n( '%d Review', '%d Reviews', $count, 'birdily' ) ), $count ); ?>)</span>
                    <?php endif; ?>
                    <?php $terms = get_the_terms( get_the_ID(), 'itinerary_types' ); ?>
                    <div class="category-list-items">
                        <?php if ( is_array( $terms ) && count( $terms ) > 0 ) : ?>
                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                            <?php
                            $first_term = array_shift( $terms );
                            $term_name = $first_term->name;
                            $term_link = get_term_link( $first_term->term_id, 'itinerary_types' ); ?>
                            <a href="<?php echo esc_url( $term_link ); ?>" rel="tag">
                                <?php echo esc_html( $term_name ); ?>
                            </a>
                            <?php if ( count( $terms ) > 0 ) : ?>
                            <div class="wp-travel-caret">
                                <i class="fa fa-caret-down"></i>
                                <div class="sub-category-menu">
                                    <?php foreach( $terms as $term ) : ?>
                                        <?php
                                            $term_name = $term->name;
                                            $term_link = get_term_link( $term->term_id, 'itinerary_types' ); ?>
                                        <a href="<?php echo esc_url( $term_link ); ?>">
                                            <?php echo esc_html( $term_name ); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</article>
