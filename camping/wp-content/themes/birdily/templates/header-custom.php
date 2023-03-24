<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.06
 */

$birdily_header_css   = '';
$birdily_header_image = get_header_image();
$birdily_header_video = birdily_get_header_video();
if ( ! empty( $birdily_header_image ) && birdily_trx_addons_featured_image_override( is_singular() || birdily_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$birdily_header_image = birdily_get_current_mode_image( $birdily_header_image );
}

$birdily_header_id = birdily_get_custom_header_id();
$birdily_header_meta = get_post_meta( $birdily_header_id, 'trx_addons_options', true );
if ( ! empty( $birdily_header_meta['margin'] ) != '' ) {
	birdily_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( birdily_prepare_css_value( $birdily_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $birdily_header_id ); ?> top_panel_custom_<?php the_title_attribute( array('post' => $birdily_header_id  ) ); ?>
				<?php
				echo ! empty( $birdily_header_image ) || ! empty( $birdily_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
				if ( '' != $birdily_header_video ) {
					echo ' with_bg_video';
				}
				if ( '' != $birdily_header_image ) {
					echo ' ' . esc_attr( birdily_add_inline_css_class( 'background-image: url(' . esc_url( $birdily_header_image ) . ');' ) );
				}
				if ( is_single() && has_post_thumbnail() ) {
					echo ' with_featured_image';
				}
				if ( birdily_is_on( birdily_get_theme_option( 'header_fullheight' ) ) ) {
					echo ' header_fullheight birdily-full-height';
				}
				if ( ! birdily_is_inherit( birdily_get_theme_option( 'header_scheme' ) ) ) {
					echo ' scheme_' . esc_attr( birdily_get_theme_option( 'header_scheme' ) );
				}
				?>
">
	<?php

	// Background video
	if ( ! empty( $birdily_header_video ) ) {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-video' ) );
	}

	// Custom header's layout
	do_action( 'birdily_action_show_layout', $birdily_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
