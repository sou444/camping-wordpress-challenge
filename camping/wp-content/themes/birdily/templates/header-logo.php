<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_args = get_query_var( 'birdily_logo_args' );

// Site logo
$birdily_logo_type   = isset( $birdily_args['type'] ) ? $birdily_args['type'] : '';
$birdily_logo_image  = birdily_get_logo_image( $birdily_logo_type );
$birdily_logo_text   = birdily_is_on( birdily_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$birdily_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $birdily_logo_image ) || ! empty( $birdily_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $birdily_logo_image ) ) {
			if ( empty( $birdily_logo_type ) && function_exists( 'the_custom_logo' ) && (is_numeric($birdily_logo_image) && (int) $birdily_logo_image > 0 )) {
				the_custom_logo();
			} else {
				$birdily_attr = birdily_getimagesize( $birdily_logo_image );
				echo '<img src="' . esc_url( $birdily_logo_image ) . '" alt="' . esc_attr( $birdily_logo_text ) . '"' . ( ! empty( $birdily_attr[3] ) ? ' ' . wp_kses_data( $birdily_attr[3] ) : '' ) . '>';
			}
		} else {
			birdily_show_layout( birdily_prepare_macros( $birdily_logo_text ), '<span class="logo_text">', '</span>' );
			birdily_show_layout( birdily_prepare_macros( $birdily_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}

