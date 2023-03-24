<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */

$birdily_footer_id = birdily_get_custom_footer_id();
$birdily_footer_meta = get_post_meta( $birdily_footer_id, 'trx_addons_options', true );
if ( ! empty( $birdily_footer_meta['margin'] ) != '' ) {
	birdily_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( birdily_prepare_css_value( $birdily_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $birdily_footer_id ); ?> footer_custom_<?php the_title_attribute( array('post' => $birdily_footer_id ) ); ?>
						<?php
						if ( ! birdily_is_inherit( birdily_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( birdily_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'birdily_action_show_layout', $birdily_footer_id );
	?>
</footer><!-- /.footer_wrap -->
