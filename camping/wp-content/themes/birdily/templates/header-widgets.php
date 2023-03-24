<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

// Header sidebar
$birdily_header_name    = birdily_get_theme_option( 'header_widgets' );
$birdily_header_present = ! birdily_is_off( $birdily_header_name ) && is_active_sidebar( $birdily_header_name );
if ( $birdily_header_present ) {
	birdily_storage_set( 'current_sidebar', 'header' );
	$birdily_header_wide = birdily_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $birdily_header_name ) ) {
		dynamic_sidebar( $birdily_header_name );
	}
	$birdily_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $birdily_widgets_output ) ) {
		$birdily_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $birdily_widgets_output );
		$birdily_need_columns   = strpos( $birdily_widgets_output, 'columns_wrap' ) === false;
		if ( $birdily_need_columns ) {
			$birdily_columns = max( 0, (int) birdily_get_theme_option( 'header_columns' ) );
			if ( 0 == $birdily_columns ) {
				$birdily_columns = min( 6, max( 1, substr_count( $birdily_widgets_output, '<aside ' ) ) );
			}
			if ( $birdily_columns > 1 ) {
				$birdily_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $birdily_columns ) . ' widget', $birdily_widgets_output );
			} else {
				$birdily_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $birdily_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $birdily_header_wide ) {
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
				birdily_show_layout( $birdily_widgets_output );
				do_action( 'birdily_action_after_sidebar' );
				if ( $birdily_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $birdily_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
