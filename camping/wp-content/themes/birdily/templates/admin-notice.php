<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.1
 */

$birdily_theme_obj = wp_get_theme();
?>
<div class="birdily_admin_notice birdily_welcome_notice update-nag">
	<?php
	// Theme image
	$birdily_theme_img = birdily_get_file_url( 'screenshot.jpg' );
	if ( '' != $birdily_theme_img ) {
		?>
		<div class="birdily_notice_image"><img src="<?php echo esc_url( $birdily_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'birdily' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="birdily_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'birdily' ),
				$birdily_theme_obj->name . ( BIRDILY_THEME_FREE ? ' ' . __( 'Free', 'birdily' ) : '' ),
				$birdily_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="birdily_notice_text">
		<p class="birdily_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $birdily_theme_obj->description ) );
			?>
		</p>
		<p class="birdily_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'birdily' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="birdily_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=birdily_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'birdily' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="birdily_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="birdily_hide_notice_text"><?php esc_html_e( 'Dismiss', 'birdily' ); ?></span></a>
	</div>
</div>
