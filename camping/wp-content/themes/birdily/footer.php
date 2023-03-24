<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

						// Widgets area inside page content
						birdily_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$birdily_body_style = birdily_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $birdily_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$birdily_widgets_name = birdily_get_theme_option( 'widgets_below_page' );
					$birdily_show_widgets = ! birdily_is_off( $birdily_widgets_name ) && is_active_sidebar( $birdily_widgets_name );
					$birdily_show_related = is_single() && birdily_get_theme_option( 'related_position' ) == 'below_page';
					if ( $birdily_show_widgets || $birdily_show_related ) {
						if ( 'fullscreen' != $birdily_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $birdily_show_related ) {
							do_action( 'birdily_action_related_posts' );
						}

						// Widgets area below page content
						if ( $birdily_show_widgets ) {
							birdily_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $birdily_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$birdily_footer_type = birdily_get_theme_option( 'footer_type' );
			if ( 'custom' == $birdily_footer_type && ! birdily_is_layouts_available() ) {
				$birdily_footer_type = 'default';
			}
			get_template_part( apply_filters( 'birdily_filter_get_template_part', "templates/footer-{$birdily_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>
