<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_header_css   = '';
$birdily_header_image = get_header_image();
$birdily_header_video = birdily_get_header_video();
if ( ! empty( $birdily_header_image ) && birdily_trx_addons_featured_image_override( is_singular() || birdily_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$birdily_header_image = birdily_get_current_mode_image( $birdily_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $birdily_header_image ) || ! empty( $birdily_header_video ) ? ' with_bg_image' : ' without_bg_image';
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

	// Main menu
	if ( birdily_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( birdily_is_on( birdily_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-title' ) );

	// Header widgets area
	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-widgets' ) );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-single' ) );

	?>
</header>
