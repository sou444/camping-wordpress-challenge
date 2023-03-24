<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_template_args = get_query_var( 'birdily_template_args' );
if ( is_array( $birdily_template_args ) ) {
	$birdily_columns    = empty( $birdily_template_args['columns'] ) ? 2 : max( 2, $birdily_template_args['columns'] );
	$birdily_blog_style = array( $birdily_template_args['type'], $birdily_columns );
} else {
	$birdily_blog_style = explode( '_', birdily_get_theme_option( 'blog_style' ) );
	$birdily_columns    = empty( $birdily_blog_style[1] ) ? 2 : max( 2, $birdily_blog_style[1] );
}
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );
$birdily_animation   = birdily_get_theme_option( 'blog_animation' );
$birdily_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_portfolio'
										. ' post_layout_gallery'
										. ' post_layout_gallery_' . esc_attr( $birdily_columns )
										. ' post_format_' . esc_attr( $birdily_post_format )
										. ( ! empty( $birdily_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! birdily_is_off( $birdily_animation ) && empty( $birdily_template_args['slider'] ) ? ' data-animation="' . esc_attr( birdily_get_animation_classes( $birdily_animation ) ) . '"' : '' );
									?>
	data-size="
	<?php
	if ( ! empty( $birdily_image[1] ) && ! empty( $birdily_image[2] ) ) {
		echo intval( $birdily_image[1] ) . 'x' . intval( $birdily_image[2] );}
	?>
	"
	data-src="
	<?php
	if ( ! empty( $birdily_image[0] ) ) {
		echo esc_url( $birdily_image[0] );}
	?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$birdily_image_hover = 'icon';  
if ( in_array( $birdily_image_hover, array( 'icons', 'zoom' ) ) ) {
	$birdily_image_hover = 'dots';
}
$birdily_components = birdily_array_get_keys_by_value( birdily_get_theme_option( 'meta_parts' ) );
$birdily_counters   = birdily_array_get_keys_by_value( birdily_get_theme_option( 'counters' ) );
birdily_show_post_featured(
	array(
		'hover'         => $birdily_image_hover,
		'singular'      => false,
		'no_links'      => ! empty( $birdily_template_args['no_links'] ),
		'thumb_size'    => birdily_get_thumb_size( strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false || $birdily_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $birdily_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $birdily_components )
								? birdily_show_post_meta(
									apply_filters(
										'birdily_filter_post_meta_args', array(
											'components' => $birdily_components,
											'counters' => $birdily_counters,
											'seo'      => false,
											'echo'     => false,
										), $birdily_blog_style[0], $birdily_columns
									)
								)
								: ''
								)
							. ( empty( $birdily_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $birdily_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'birdily' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
