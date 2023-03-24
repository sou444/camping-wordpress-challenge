<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_link        = get_permalink();
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item related_item_style_1 post_format_' . esc_attr( $birdily_post_format ) ); ?>>
	<?php
	birdily_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'birdily_filter_related_thumb_size', birdily_get_thumb_size( (int) birdily_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => birdily_get_theme_setting( 'allow_no_image' ),
			'singular'      => false,
			'post_info'     => '<div class="post_header entry-header">'
						. '<div class="post_categories">' . wp_kses( birdily_get_post_categories( '' ), 'birdily_kses_content') . '</div>'
						. '<h6 class="post_title entry-title"><a href="' . esc_url( $birdily_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
						. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
								? '<span class="post_date"><a href="' . esc_url( $birdily_link ) . '">' . wp_kses_data( birdily_get_date() ) . '</a></span>'
								: '' )
					. '</div>',
		)
	);
	?>
</div>
