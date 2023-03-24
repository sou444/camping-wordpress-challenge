<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */

// Footer sidebar
$birdily_footer_name    = birdily_get_theme_option( 'footer_widgets' );
$birdily_footer_present = ! birdily_is_off( $birdily_footer_name ) && is_active_sidebar( $birdily_footer_name );
if ( $birdily_footer_present ) {
	birdily_storage_set( 'current_sidebar', 'footer' );
	$birdily_footer_wide = birdily_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $birdily_footer_name ) ) {
		dynamic_sidebar( $birdily_footer_name );
	}
	$birdily_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $birdily_out ) ) {
		$birdily_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $birdily_out );
		$birdily_need_columns = true;  
		if ( $birdily_need_columns ) {
			$birdily_columns = max( 0, (int) birdily_get_theme_option( 'footer_columns' ) );
			if ( 0 == $birdily_columns ) {
				$birdily_columns = min( 4, max( 1, substr_count( $birdily_out, '<aside ' ) ) );
			}
			if ( $birdily_columns > 1 ) {
				$birdily_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $birdily_columns ) . ' widget', $birdily_out );
			} else {
				$birdily_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $birdily_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $birdily_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $birdily_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'birdily_action_before_sidebar' );
				birdily_show_layout( $birdily_out );
				do_action( 'birdily_action_after_sidebar' );
				if ( $birdily_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $birdily_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
