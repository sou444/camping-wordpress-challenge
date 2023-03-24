<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */


// Socials
if ( birdily_is_on( birdily_get_theme_option( 'socials_in_footer' ) ) ) {
	$birdily_output = birdily_get_socials_links();
	if ( '' != $birdily_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php birdily_show_layout( $birdily_output ); ?>
			</div>
		</div>
		<?php
	}
}
