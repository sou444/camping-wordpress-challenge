<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( birdily_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'birdily_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$birdily_header_type = birdily_get_theme_option( 'header_type' );
			if ( 'custom' == $birdily_header_type && ! birdily_is_layouts_available() ) {
				$birdily_header_type = 'default';
			}
			get_template_part( apply_filters( 'birdily_filter_get_template_part', "templates/header-{$birdily_header_type}" ) );

			// Side menu
			if ( in_array( birdily_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/header-navi-mobile' ) );
			?>

			<div class="page_content_wrap">

				<?php if ( birdily_get_theme_option( 'body_style' ) != 'fullscreen' ) { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					birdily_create_widgets_area( 'widgets_above_page' );
					?>

					<div class="content">
						<?php
						// Widgets area inside page content
						birdily_create_widgets_area( 'widgets_above_content' );
