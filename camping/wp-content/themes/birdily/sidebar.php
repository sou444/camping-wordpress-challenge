<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

if ( birdily_sidebar_present() ) {
	ob_start();
	$birdily_sidebar_name = birdily_get_theme_option( 'sidebar_widgets' );
	birdily_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $birdily_sidebar_name ) ) {
		dynamic_sidebar( $birdily_sidebar_name );
	}
	$birdily_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $birdily_out ) ) {
		$birdily_sidebar_position = birdily_get_theme_option( 'sidebar_position' );
		?>
		<div class="sidebar widget_area
			<?php
			echo esc_attr( $birdily_sidebar_position );
			if ( ! birdily_is_inherit( birdily_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( birdily_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'birdily_action_before_sidebar' );
				birdily_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $birdily_out ) );
				do_action( 'birdily_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
