<div class="front_page_section front_page_section_subscribe<?php
	$birdily_scheme = birdily_get_theme_option( 'front_page_subscribe_scheme' );
	if ( ! birdily_is_inherit( $birdily_scheme ) ) {
		echo ' scheme_' . esc_attr( $birdily_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( birdily_get_theme_option( 'front_page_subscribe_paddings' ) );
?>"
		<?php
		$birdily_css      = '';
		$birdily_bg_image = birdily_get_theme_option( 'front_page_subscribe_bg_image' );
		if ( ! empty( $birdily_bg_image ) ) {
			$birdily_css .= 'background-image: url(' . esc_url( birdily_get_attachment_url( $birdily_bg_image ) ) . ');';
		}
		if ( ! empty( $birdily_css ) ) {
			echo ' style="' . esc_attr( $birdily_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$birdily_anchor_icon = birdily_get_theme_option( 'front_page_subscribe_anchor_icon' );
	$birdily_anchor_text = birdily_get_theme_option( 'front_page_subscribe_anchor_text' );
if ( ( ! empty( $birdily_anchor_icon ) || ! empty( $birdily_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_subscribe"'
									. ( ! empty( $birdily_anchor_icon ) ? ' icon="' . esc_attr( $birdily_anchor_icon ) . '"' : '' )
									. ( ! empty( $birdily_anchor_text ) ? ' title="' . esc_attr( $birdily_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_subscribe_inner
	<?php
	if ( birdily_get_theme_option( 'front_page_subscribe_fullheight' ) ) {
		echo ' birdily-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$birdily_css      = '';
			$birdily_bg_mask  = birdily_get_theme_option( 'front_page_subscribe_bg_mask' );
			$birdily_bg_color_type = birdily_get_theme_option( 'front_page_subscribe_bg_color_type' );
			if ( 'custom' == $birdily_bg_color_type ) {
				$birdily_bg_color = birdily_get_theme_option( 'front_page_subscribe_bg_color' );
			} elseif ( 'scheme_bg_color' == $birdily_bg_color_type ) {
				$birdily_bg_color = birdily_get_scheme_color( 'bg_color', $birdily_scheme );
			} else {
				$birdily_bg_color = '';
			}
			if ( ! empty( $birdily_bg_color ) && $birdily_bg_mask > 0 ) {
				$birdily_css .= 'background-color: ' . esc_attr(
					1 == $birdily_bg_mask ? $birdily_bg_color : birdily_hex2rgba( $birdily_bg_color, $birdily_bg_mask )
				) . ';';
			}
			if ( ! empty( $birdily_css ) ) {
				echo ' style="' . esc_attr( $birdily_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_subscribe_content_wrap content_wrap">
			<?php
			// Caption
			$birdily_caption = birdily_get_theme_option( 'front_page_subscribe_caption' );
			if ( ! empty( $birdily_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_subscribe_caption front_page_block_<?php echo ! empty( $birdily_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $birdily_caption,'birdily_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$birdily_description = birdily_get_theme_option( 'front_page_subscribe_description' );
			if ( ! empty( $birdily_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_subscribe_description front_page_block_<?php echo ! empty( $birdily_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $birdily_description ),'birdily_kses_content' ); ?></div>
				<?php
			}

			// Content
			$birdily_sc = birdily_get_theme_option( 'front_page_subscribe_shortcode' );
			if ( ! empty( $birdily_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_subscribe_output front_page_block_<?php echo ! empty( $birdily_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					birdily_show_layout( do_shortcode( $birdily_sc ) );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
