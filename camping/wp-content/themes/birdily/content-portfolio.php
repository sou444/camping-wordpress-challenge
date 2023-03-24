<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_portfolio'
										. ' post_layout_portfolio_' . esc_attr( $birdily_columns )
										. ' post_format_' . esc_attr( $birdily_post_format )
										. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
										. ( ! empty( $birdily_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! birdily_is_off( $birdily_animation ) && empty( $birdily_template_args['slider'] ) ? ' data-animation="' . esc_attr( birdily_get_animation_classes( $birdily_animation ) ) . '"' : '' );
									?>
	>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$birdily_image_hover = ! empty( $birdily_template_args['hover'] ) && ! birdily_is_inherit( $birdily_template_args['hover'] )
								? $birdily_template_args['hover']
								: birdily_get_theme_option( 'image_hover' );
	// Featured image
	birdily_show_post_featured(
		array(
			'singular'      => false,
			'hover'         => $birdily_image_hover,
			'no_links'      => ! empty( $birdily_template_args['no_links'] ),
			'thumb_size'    => birdily_get_thumb_size(
				strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false || $birdily_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $birdily_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $birdily_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!