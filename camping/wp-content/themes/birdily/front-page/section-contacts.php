<div class="front_page_section front_page_section_contacts<?php
	$birdily_scheme = birdily_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! birdily_is_inherit( $birdily_scheme ) ) {
		echo ' scheme_' . esc_attr( $birdily_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( birdily_get_theme_option( 'front_page_contacts_paddings' ) );
?>"
		<?php
		$birdily_css      = '';
		$birdily_bg_image = birdily_get_theme_option( 'front_page_contacts_bg_image' );
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
	$birdily_anchor_icon = birdily_get_theme_option( 'front_page_contacts_anchor_icon' );
	$birdily_anchor_text = birdily_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $birdily_anchor_icon ) || ! empty( $birdily_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $birdily_anchor_icon ) ? ' icon="' . esc_attr( $birdily_anchor_icon ) . '"' : '' )
									. ( ! empty( $birdily_anchor_text ) ? ' title="' . esc_attr( $birdily_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( birdily_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' birdily-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$birdily_css      = '';
			$birdily_bg_mask  = birdily_get_theme_option( 'front_page_contacts_bg_mask' );
			$birdily_bg_color_type = birdily_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $birdily_bg_color_type ) {
				$birdily_bg_color = birdily_get_theme_option( 'front_page_contacts_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$birdily_caption     = birdily_get_theme_option( 'front_page_contacts_caption' );
			$birdily_description = birdily_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $birdily_caption ) || ! empty( $birdily_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $birdily_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $birdily_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $birdily_caption,'birdily_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $birdily_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $birdily_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $birdily_description ),'birdily_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$birdily_content = birdily_get_theme_option( 'front_page_contacts_content' );
			$birdily_layout  = birdily_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $birdily_layout && ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $birdily_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $birdily_content,'birdily_kses_content' );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $birdily_layout && ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$birdily_sc = birdily_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $birdily_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $birdily_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					birdily_show_layout( do_shortcode( $birdily_sc ) );
				?>
				</div>
				<?php
			}

			if ( 'columns' == $birdily_layout && ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>
