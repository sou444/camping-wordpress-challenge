<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! birdily_is_inherit( birdily_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( birdily_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$birdily_copyright = birdily_get_theme_option( 'copyright' );
			if ( ! empty( $birdily_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$birdily_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $birdily_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$birdily_copyright = birdily_prepare_macros( $birdily_copyright );
				// Display copyright
				echo wp_kses( nl2br( $birdily_copyright ), 'birdily_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
