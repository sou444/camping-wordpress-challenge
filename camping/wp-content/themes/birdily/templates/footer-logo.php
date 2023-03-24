<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */

// Logo
if ( birdily_is_on( birdily_get_theme_option( 'logo_in_footer' ) ) ) {
	$birdily_logo_image = birdily_get_logo_image( 'footer' );
	$birdily_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $birdily_logo_image ) || ! empty( $birdily_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $birdily_logo_image ) ) {
					$birdily_attr = birdily_getimagesize( $birdily_logo_image );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $birdily_logo_image ) . '"'
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'birdily' ) . '"'
								. ( ! empty( $birdily_attr[3] ) ? ' ' . wp_kses_data( $birdily_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $birdily_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $birdily_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
