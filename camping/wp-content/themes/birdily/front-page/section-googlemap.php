<div class="front_page_section front_page_section_googlemap<?php
	$birdily_scheme = birdily_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! birdily_is_inherit( $birdily_scheme ) ) {
		echo ' scheme_' . esc_attr( $birdily_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( birdily_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$birdily_css      = '';
		$birdily_bg_image = birdily_get_theme_option( 'front_page_googlemap_bg_image' );
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
	$birdily_anchor_icon = birdily_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$birdily_anchor_text = birdily_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $birdily_anchor_icon ) || ! empty( $birdily_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $birdily_anchor_icon ) ? ' icon="' . esc_attr( $birdily_anchor_icon ) . '"' : '' )
									. ( ! empty( $birdily_anchor_text ) ? ' title="' . esc_attr( $birdily_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
	<?php
	if ( birdily_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
		echo ' birdily-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$birdily_css      = '';
			$birdily_bg_mask  = birdily_get_theme_option( 'front_page_googlemap_bg_mask' );
			$birdily_bg_color_type = birdily_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $birdily_bg_color_type ) {
				$birdily_bg_color = birdily_get_theme_option( 'front_page_googlemap_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
			$birdily_layout = birdily_get_theme_option( 'front_page_googlemap_layout' );
		if ( 'fullwidth' != $birdily_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$birdily_caption     = birdily_get_theme_option( 'front_page_googlemap_caption' );
			$birdily_description = birdily_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $birdily_caption ) || ! empty( $birdily_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $birdily_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $birdily_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $birdily_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $birdily_caption,'birdily_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $birdily_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $birdily_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $birdily_description ),'birdily_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $birdily_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$birdily_content = birdily_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $birdily_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $birdily_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $birdily_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $birdily_content,'birdily_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $birdily_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $birdily_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! birdily_exists_trx_addons() ) {
					birdily_customizer_need_trx_addons_message();
				} else {
					birdily_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $birdily_layout && ( ! empty( $birdily_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
