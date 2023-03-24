<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.10
 */

// Footer menu
$birdily_menu_footer = birdily_get_nav_menu(
	array(
		'location' => 'menu_footer',
		'class'    => 'sc_layouts_menu sc_layouts_menu_default',
	)
);
if ( ! empty( $birdily_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php birdily_show_layout( $birdily_menu_footer ); ?>
		</div>
	</div>
	<?php
}
